<?php

// includes/admin/tbex-settings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Load default settings, settings fields declaration and validation for each
 *   settings tab page.
 *
 * @since 1.0.0
 * @since 1.4.0 Splitted into individual files.
 * @since 1.4.2 Added "Add-Ons" tab.
 */
require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-general.php';
require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-smart-tweaks.php';
require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-development.php';
require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-addons.php';


add_action( 'admin_menu', 'ddw_tbex_settings_add_admin_page' );
/**
 * Add our own plugin settings page under "Settings" in Admin.
 *   Used capability: 'manage_options'
 *
 * @since 1.0.0
 *
 * @uses add_options_page()
 * @uses ddw_tbex_string_toolbar_extras()
 */
function ddw_tbex_settings_add_admin_page() {

	/** This page will be under "Settings" */
	$bex_settings_page = add_options_page(
		/* translators: Settings page title in browser */
		esc_attr__( 'Toolbar Extras Settings', 'toolbar-extras' ),	// Title Tag (in Browser)
		/* translators: Settings page title in WP-Admin left-hand menu */
		esc_attr( ddw_tbex_string_toolbar_extras() ),				// Page Title (in Menu)
		'manage_options',											// capability
		'toolbar-extras',											// page slug/ID
		'ddw_tbex_settings_create_admin_page'						// callback function
	);

	/** Let helper styles load only on this admin page */
	add_action( 'load-' . $bex_settings_page, 'ddw_tbex_load_admin_styles_scripts' );

	/** Welcome - New user onboarding */
	add_action( 'load-' . $bex_settings_page, 'ddw_tbex_settings_page_welcome', 5 );

}  // end function


/**
 * Load the welcome notice only on our own admin page.
 *   Using 'load-{admin-page-slug}' action, therefore we need this in-between
 *   step here.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_page_welcome() {

	/** Welcome - New user onboarding */
	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/notice-settings-welcome.php';
	add_action( 'admin_notices', 'ddw_tbex_notice_settings_welcome' );

}  // end function


/**
 * Load Admin styles & scrips only on our own admin page.
 *   Using 'load-{admin-page-slug}' action, therefore we need this in-between
 *   step here.
 *
 * @since 1.0.0
 */
function ddw_tbex_load_admin_styles_scripts() {

	add_action( 'admin_enqueue_scripts', 'ddw_tbex_enqueue_admin_styles_scripts' );

	add_action( 'admin_enqueue_scripts', 'ddw_tbex_admin_localize_script', 15 );

}  // end function


/**
 * Get all registered colors for the Iris Color Picker configuration. These are
 *   then passed to wp_localize_script().
 *
 * @see ddw_tbex_enqueue_admin_styles_scripts()
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_get_color_items()
 */
function ddw_tbex_get_iris_color_palette() {

	$color_items = (array) ddw_tbex_get_color_items();

	$iris_palette = [];

	foreach ( $color_items as $color => $color_data ) {
		$iris_palette[] = sanitize_hex_color( $color_data[ 'color' ] );
	}

	return $iris_palette;

}  // end function


add_action( 'admin_head', 'ddw_tbex_styles_color_items', 200 );
/**
 * Add the color styles for all registered color items as inline head styles.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_get_color_items()
 *
 * @return string Echoing string with CSS style rules.
 */
function ddw_tbex_styles_color_items() {

	$color_items = (array) ddw_tbex_get_color_items();

	$output = '<style type="text/css">';

	foreach ( $color_items as $color => $color_data ) {

		$output .= sprintf(
			'.bg-local-%1$s { background-color: %2$s; }',
			sanitize_key( $color ),
			sanitize_hex_color( $color_data[ 'color' ] )
		);

	}  // end foreach

	$output .= '</style>';

	echo $output;

}  // end function


/**
 * Enqueue various needed admin styles and scripts, including WordPress Color
 *   Picker Script (Iris) and Dashicons Picker.
 *
 * @since 1.0.0
 * @since 1.4.0 Added toggle script.
 * @since 1.4.2 Added wp_localize_script to Iris Config.
 *
 * @see ddw_tbex_settings_add_admin_page()
 *
 * @uses ddw_tbex_get_iris_color_palette()
 */
function ddw_tbex_enqueue_admin_styles_scripts() {

	/** Styles: TBEX Settings */
	wp_register_style(
		'tbex-settings-page',
		plugins_url( '/assets/css/tbex-settings.css', dirname( dirname( __FILE__ ) ) ),
		array(),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-settings-page' );

	/** Styles: WP Color Picker (Iris) */
	wp_enqueue_style( 'wp-color-picker' );

	/** Script: Our Iris config */
	wp_register_script(
		'tbex-iris-config',
		plugins_url( '/assets/js/iris-config.js', dirname( dirname( __FILE__ ) ) ),
		array( 'wp-color-picker' ),
		TBEX_PLUGIN_VERSION,
		TRUE
	);

	/** Prepare colors array & fallback */
	$colors  = ddw_tbex_get_iris_color_palette();
	$palette = ( ! empty( $colors ) && is_array( $colors ) ) ? $colors : [ '#0073aa', '#ff8c00', '#7e49c2', '#d30c5c', '#555d66', '#7fb100', '#000' ];

	wp_localize_script(
		'tbex-iris-config',
		'palette',
		$palette
	);

	wp_enqueue_script( 'tbex-iris-config' );

	/** Styles: Dashicons picker */
	wp_register_style(
		'tbex-dashicons-picker',
		plugins_url( '/assets/css/dashicons-picker.css', dirname( dirname( __FILE__ ) ) ),
		array( 'dashicons' ),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-dashicons-picker' );

	/** Script: Dashicons picker */
	wp_register_script(
		'tbex-dashicons-picker',
		plugins_url( '/assets/js/dashicons-picker.js', dirname( dirname( __FILE__ ) ) ),
		array( 'jquery' ),
		TBEX_PLUGIN_VERSION,
		TRUE
	);

	wp_enqueue_script( 'tbex-dashicons-picker' );

	/** Optionally add Thickbox JS & CSS (for video tour) */
	add_thickbox();

}  // end function


/**
 * Localize strings for the settings JavaScript (toggles etc.).
 *
 * @since 1.4.0
 * @since 1.4.4 Added Dashicons script: icons list & search string.
 *
 * @uses wp_localize_script()
 * @uses ddw_tbex_is_wp52_install()
 */
function ddw_tbex_admin_localize_script() {

	/** Script: TBEX Settings */
	wp_register_script(
		'tbex-settings-js',
		plugins_url( '/assets/js/tbex-settings.js', dirname( dirname( __FILE__ ) ) ),
		array( 'jquery' ),
		TBEX_PLUGIN_VERSION,
		TRUE
	);

	wp_enqueue_script( 'tbex-settings-js' );

	/** Localize script strings */
	$strings = array(
		'saveAlert' => __( 'The changes you made will be lost if you navigate away from this page.', 'toolbar-extras' ),
	);

	wp_localize_script(
		'tbex-settings-js',
		'tbexL10n',
		$strings
	);

	/** Localize script toggles, filterable */
	$toggles = array(
		/** General settings */
		'builder_name_title'    => array( '#tbex-options-general-default_page_builder', '.tbex-heading-builder-name', array( 'elementor', 'block-editor' ) ),
		'builder_name_desc'     => array( '#tbex-options-general-default_page_builder', '.tbex-desc-builder-name', array( 'elementor', 'block-editor' ) ),
		'builder_name_set_el'   => array( '#tbex-options-general-default_page_builder', '.tbex-setting-elementor-name', 'elementor' ),
		'builder_name_set_be'   => array( '#tbex-options-general-default_page_builder', '.tbex-setting-block-editor-name', 'block-editor' ),

		'items_demo_import'     => array( '#tbex-options-general-display_items_demo_import', '.tbex-setting-demo-import-icon', 'yes' ),

		/** Smart Tweaks settings */
		'wplogo'                => array( '#tbex-options-tweaks-use_web_group', '.tbex-setting-remove-wp-logo', 'no' ),

		'myaccount_tweak_howdy' => array( '#tbex-options-tweaks-use_myaccount_tweak', '.tbex-setting-use-howdy-replace', 'yes' ),
		'myaccount_url'         => array( '#tbex-options-tweaks-use_myaccount_tweak', '.tbex-setting-custom-myaccount-url', 'yes' ),
		'myaccount_target'      => array( '#tbex-options-tweaks-use_myaccount_tweak', '.tbex-setting-custom-myaccount-target', 'yes' ),

		'welcome_howdy_replace' => array( '#tbex-options-tweaks-use_howdy_replace', '.tbex-setting-howdy-replacement', 'replace' ),
		'welcome_custom'        => array( '#tbex-options-tweaks-use_howdy_replace', '.tbex-setting-custom-welcome', 'custom' ),

		/** Development settings */
		'local_dev_color'       => array( '.tbex-is-local-dev', '.tbex-setting-local-dev-bg-color', array( 'auto', 'yes' ) ),
		'local_dev_icon'        => array( '.tbex-is-local-dev', '.tbex-setting-local-dev-icon', array( 'auto', 'yes' ) ),
		'local_dev_name'        => array( '.tbex-is-local-dev', '.tbex-setting-local-dev-name', array( 'auto', 'yes' ) ),
		'local_dev_viewport'    => array( '.tbex-is-local-dev', '.tbex-setting-local-dev-viewport', array( 'auto', 'yes' ) ),

		'dev_mode_icon'         => array( '#tbex-options-development-use_dev_mode', '.tbex-setting-rapid-dev-icon', 'yes' ),
		'dev_mode_name'         => array( '#tbex-options-development-use_dev_mode', '.tbex-setting-rapid-dev-name', 'yes' ),
		'dev_mode_ids'          => array( '#tbex-options-development-use_dev_mode', '.tbex-setting-use-element-ids', 'yes' ),
		'dev_mode_uploaders'    => array( '#tbex-options-development-use_dev_mode', '.tbex-setting-use-uploader-menus', 'yes' ),
	);

	wp_localize_script(
		'tbex-settings-js',
		'tbex_toggles',
		apply_filters(
			'tbex_filter_settings_toggles',
			$toggles
		)
	);

	/** Regular Core Dashicons list */
	$dashicons_core = [
		'text',
		'menu',
		'admin-site',
		'dashboard',
		'admin-media',
		'admin-page',
		'admin-comments',
		'admin-appearance',
		'admin-plugins',
		'admin-users',
		'admin-tools',
		'admin-settings',
		'admin-network',
		'admin-generic',
		'admin-home',
		'admin-collapse',
		'filter',
		'admin-customizer',
		'admin-multisite',
		'admin-links',
		'format-links',
		'admin-post',
		'format-standard',
		'format-image',
		'format-gallery',
		'format-audio',
		'format-video',
		'format-chat',
		'format-status',
		'format-aside',
		'format-quote',
		'welcome-write-blog',
		'welcome-edit-page',
		'welcome-add-page',
		'welcome-view-site',
		'welcome-widgets-menus',
		'welcome-comments',
		'welcome-learn-more',
		'image-crop',
		'image-rotate',
		'image-rotate-left',
		'image-rotate-right',
		'image-flip-vertical',
		'image-flip-horizontal',
		'image-filter',
		'undo',
		'redo',
		'editor-bold',
		'editor-italic',
		'editor-ul',
		'editor-ol',
		'editor-quote',
		'editor-alignleft',
		'editor-aligncenter',
		'editor-alignright',
		'editor-insertmore',
		'editor-spellcheck',
		'editor-distractionfree',
		'editor-expand',
		'editor-contract',
		'editor-kitchensink',
		'editor-ltr',
		'editor-underline',
		'editor-justify',
		'editor-textcolor',
		'editor-paste-word',
		'editor-paste-text',
		'editor-removeformatting',
		'editor-video',
		'editor-customchar',
		'editor-outdent',
		'editor-indent',
		'editor-help',
		'editor-strikethrough',
		'editor-unlink',
		'editor-rtl',
		'editor-break',
		'editor-code',
		'editor-paragraph',
		'editor-table',
		'align-left',
		'align-right',
		'align-center',
		'align-none',
		'lock',
		'unlock',
		'calendar',
		'calendar-alt',
		'visibility',
		'hidden',
		'post-status',
		'edit',
		'post-trash',
		'trash',
		'sticky',
		'external',
		'arrow-up',
		'arrow-down',
		'arrow-left',
		'arrow-right',
		'arrow-up-alt',
		'arrow-down-alt',
		'arrow-left-alt',
		'arrow-right-alt',
		'arrow-up-alt2',
		'arrow-down-alt2',
		'arrow-left-alt2',
		'arrow-right-alt2',
		'leftright',
		'sort',
		'randomize',
		'list-view',
		'excerpt-view',
		'grid-view',
		'hammer',
		'art',
		'migrate',
		'performance',
		'universal-access',
		'universal-access-alt',
		'tickets',
		'nametag',
		'clipboard',
		'heart',
		'megaphone',
		'schedule',
		'wordpress',
		'wordpress-alt',
		'pressthis',
		'update',
		'screenoptions',
		'cart',
		'feedback',
		'cloud',
		'translation',
		'tag',
		'category',
		'archive',
		'tagcloud',
		'media-archive',
		'media-audio',
		'media-code',
		'media-default',
		'media-document',
		'media-interactive',
		'media-spreadsheet',
		'media-text',
		'media-video',
		'playlist-audio',
		'playlist-video',
		'controls-play',
		'controls-pause',
		'controls-forward',
		'controls-skipforward',
		'controls-back',
		'controls-skipback',
		'controls-repeat',
		'controls-volumeon',
		'controls-volumeoff',
		'yes',
		'no',
		'no-alt',
		'plus',
		'plus-alt',
		'plus-alt2',
		'minus',
		'dismiss',
		'marker',
		'star-filled',
		'star-half',
		'star-empty',
		'flag',
		'info',
		'warning',
		'share',
		'share1',
		'share-alt',
		'share-alt2',
		'twitter',
		'rss',
		'email',
		'email-alt',
		'email-alt2',
		'facebook',
		'facebook-alt',
		'networking',
		'googleplus',
		'location',
		'location-alt',
		'camera',
		'images-alt',
		'images-alt2',
		'video-alt',
		'video-alt2',
		'video-alt3',
		'vault',
		'shield',
		'shield-alt',
		'sos',
		'search',
		'slides',
		'analytics',
		'chart-pie',
		'chart-bar',
		'chart-line',
		'chart-area',
		'groups',
		'businessman',
		'id',
		'id-alt',
		'products',
		'awards',
		'forms',
		'testimonial',
		'portfolio',
		'book',
		'book-alt',
		'download',
		'upload',
		'backup',
		'paperclip',
		'clock',
		'lightbulb',
		'microphone',
		'desktop',
		'laptop',
		'tablet',
		'smartphone',
		'phone',
		'smiley',
		'index-card',
		'carrot',
		'building',
		'store',
		'album',
		'palmtree',
		'tickets-alt',
		'money',
		'thumbs-up',
		'thumbs-down',
		'layout',
		'move',
	];

	/** New Dashicons list for WP 5.2+ */
	$dashicons_new = [];

	if ( ddw_tbex_is_wp52_install() ) {

		$dashicons_new = [
			'buddicons-activity',
			'buddicons-bbpress-logo',
			'buddicons-buddypress-logo',
			'buddicons-community',
			'buddicons-forums',
			'buddicons-friends',
			'buddicons-groups',
			'buddicons-pm',
			'buddicons-replies',
			'buddicons-topics',
			'buddicons-tracking',
			'editor-ol-rtl',
			'editor-ltr',
			'tide',
			'rest-api',
			'code-standards',
			'admin-site-alt',
			'admin-site-alt2',
			'admin-site-alt3',
			'menu-alt',
			'menu-alt2',
			'menu-alt3',
			'instagram',
			'businesswoman',
			'businessperson',
			'email-alt2',
			'yes-alt',
			'camera-alt',
			'plugins-checked',
			'update-alt',
			'text-page',
		];

	}  // end if

	$dashicons_list = apply_filters(
		'tbex_filter_dashicons_list',
		array_merge( $dashicons_core, $dashicons_new )
	);

	$dashicons_list = array_map( 'sanitize_key', $dashicons_list );

	/** Localize script with dynamic Dashicons list */
	wp_localize_script(
		'tbex-dashicons-picker',
		'dashicons_list',
		$dashicons_list
	);

	/** String: Search icons */
	$dashicons_search = esc_html__( 'Search icon', 'toolbar-extras' );

	/** Localize script with search string */
	wp_localize_script(
		'tbex-dashicons-picker',
		'dashicons_search',
		$dashicons_search
	);

}  // end function


/**
 * Callback function to create admin page after adding it.
 *
 * @since 1.0.0
 * @since 1.4.2 Added "Add-Ons" tab.
 *
 * @see ddw_tbex_settings_add_admin_page()
 *
 * @uses ddw_tbex_string_save_changes()
 */
function ddw_tbex_settings_create_admin_page() {

	$settings_base = admin_url( 'options-general.php' );

	$url_general       = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'general' ), $settings_base ) );
	$url_smart_tweaks  = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'smart-tweaks' ), $settings_base ) );
	$url_development   = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'development' ), $settings_base ) );
	$url_addons        = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'addons' ), $settings_base ) );
	$url_about_support = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'about-support' ), $settings_base ) );

	/** Render settings page */
	?>
		<div class="wrap">
			<h1>
				<span class="dashicons-before dashicons-arrow-up-alt tbex-icon"></span>
				<span class="tbex-label">
					<?php
						/* translators: Settings page title in WP-Admin */
						_e( 'Toolbar Extras - Settings', 'toolbar-extras' );
					?>
				</span>
				<span class="tbex-version"><?php echo ( defined( 'TBEX_PLUGIN_VERSION' ) ) ? 'v' . TBEX_PLUGIN_VERSION : ''; ?></span>
			</h1>

			<div class="tbex-intro">
				<h2><?php _e( 'Let the Toolbar Work for You!', 'toolbar-extras' ); ?></h2>
				<p>
					<?php _e( 'Decide which additional items should be displayed or not. Also use some smart tweaks or enable development modes.', 'toolbar-extras' ); ?>
				<p>
			</div>

			<?php $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) : 'general'; ?>

			<h2 class="nav-tab-wrapper">
				<a href="<?php echo $url_general; ?>" class="dashicons-before dashicons-admin-generic nav-tab <?php echo ( 'general' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'General Settings', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_smart_tweaks; ?>" class="dashicons-before dashicons-lightbulb nav-tab <?php echo ( 'smart-tweaks' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'Smart Tweaks', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_development; ?>" class="dashicons-before dashicons-editor-code nav-tab <?php echo ( 'development' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'For Development', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<?php
					/**
					 * Action hook to make additional tabs for Add-Ons possible.
					 * @since 1.4.0
					 */
					do_action( 'tbex_settings_tab_addons', $active_tab );
				?>
				<a href="<?php echo $url_addons; ?>" class="dashicons-before dashicons-plus-alt nav-tab <?php echo ( 'addons' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'Add-Ons', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
				<a href="<?php echo $url_about_support; ?>" class="dashicons-before dashicons-info nav-tab <?php echo ( 'about-support' === $active_tab ) ? 'nav-tab-active' : ''; ?>">
					<?php
						/* translators: Settings tab title in WP-Admin */
						_ex( 'About &amp; Support', 'Plugin settings tab title', 'toolbar-extras' );
					?>
				</a>
			</h2>
			<form action="options.php" method="post" class="tbex-settings-page">
				<?php
					switch ( $active_tab ) :

						/** 1) Tab General */
						case 'general' :
							do_action( 'tbex_before_settings_general_view' );

							require_once TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-general.php';

							settings_fields( 'tbex_group_general' );
							do_settings_sections( 'tbex_group_general' );

							do_action( 'tbex_after_settings_general_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 2) Tab Smart Tweaks */
						case 'smart-tweaks' :
							do_action( 'tbex_before_settings_tweaks_view' );

							require_once TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-smart-tweaks.php';

							settings_fields( 'tbex_group_smart_tweaks' );
							do_settings_sections( 'tbex_group_smart_tweaks' );

							do_action( 'tbex_after_settings_tweaks_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 3) Tab Development */
						case 'development' :
							do_action( 'tbex_before_settings_development_view' );

							require_once TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-development.php';

							settings_fields( 'tbex_group_development' );
							do_settings_sections( 'tbex_group_development' );

							do_action( 'tbex_after_settings_development_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 4) Tab Tools (upcoming) 'tools' */
						// coming...

						/** 5) Tab "Add-Ons" 'addons' */
						case 'addons' :
							do_action( 'tbex_settings_tab_addons_list' );
							require_once TBEX_PLUGIN_DIR . 'includes/admin/tbex-addons.php';
						break;

						/** 6) Tab Export & Import (upcoming) 'export-import' */

						/** 7) Tab About & Support - only text, no submit button! */
						case 'about-support' :
							do_action( 'tbex_before_settings_about_support_view' );
							require_once TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-about-support.php';
							do_action( 'tbex_after_settings_about_support_view' );
						break;

						/** 8) For Add-Ons */
						case $active_tab :
							do_action( 'tbex_settings_tab_addon_' . $active_tab );
						break;

					endswitch;
				?>
			</form>
		</div>
	<?php

}  // end function


add_action( 'personal_options', 'ddw_tbex_user_profile_settings_link' );
/**
 * Add additional buttons/links to the plugin's settings tabs on the user
 *   profile settings page, at the end of "Personal Options" section.
 *
 * @since 1.4.0
 * @since 1.4.2 Tweaked to make it Add-On friendly.
 *
 * @uses ddw_tbex_string_toolbar_extras()
 *
 * @param int $user_id The ID of the user profile being edited.
 * @return string Echoing string of markup.
 */
function ddw_tbex_user_profile_settings_link( $user_id ) {

	/** Bail early if current user doesn't have administrative permissions */
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$settings_buttons = apply_filters(
		'tbex_filter_user_profile_buttons',
		array(
			'general'      => array(
				'title_attr' => esc_attr__( 'Go to the Toolbar Extras General settings tab', 'toolbar-extras' ),
				'label'      => _x( 'General Settings', 'Plugin settings tab title', 'toolbar-extras' ),
				'dashicon'   => 'admin-generic',
			),
			'smart-tweaks' => array(
				'title_attr' => esc_attr__( 'Go to the Toolbar Extras Smart Tweaks settings tab', 'toolbar-extras' ),
				'label'      => _x( 'Smart Tweaks', 'Plugin settings tab title', 'toolbar-extras' ),
				'dashicon'   => 'lightbulb',
			),
			'development'  => array(
				'title_attr' => esc_attr__( 'Go to the Toolbar Extras Development settings tab', 'toolbar-extras' ),
				'label'      => _x( 'For Development', 'Plugin settings tab title', 'toolbar-extras' ),
				'dashicon'   => 'editor-code',
			),
		)
	);

	$settings_buttons[ 'addons' ] = array(
		'title_attr' => esc_attr__( 'Go to the Toolbar Extras Add-Ons settings tab', 'toolbar-extras' ),
		'label'      => _x( 'Add-Ons', 'Plugin settings tab title', 'toolbar-extras' ),
		'dashicon'   => 'plus-alt',
	);

	$settings_buttons_render = '';

	foreach ( $settings_buttons as $settings_key => $settings_data ) {
		
		$settings_buttons_render .= sprintf(
			'<a class="button dashicons-before dashicons-%1$s tbex-user-profile" href="%2$s" title="%3$s">%4$s</a>',
			sanitize_html_class( $settings_data[ 'dashicon' ] ),
			esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=' . sanitize_key( $settings_key ) ) ),
			$settings_data[ 'title_attr' ],
			$settings_data[ 'label' ]
		);

	}  // end foreach

	/** Toolbar explanation (abbr) */
	$explanation = sprintf(
		/* translators: %s - word "Toolbar" and further explanation via abbr tag (title tag) */
		__( 'Way more options for the %s you\'ll find in Toolbar Extras\' plugin settings:', 'toolbar-extras' ),
		sprintf(
			'<abbr title="%1$s">%2$s</abbr>',
			esc_attr__( 'The WordPress Admin Bar', 'toolbar-extras' ),
			__( 'Toolbar', 'toolbar-extras' )
		)
	);

	/** Section description */
	$description = sprintf(
		'<p>%1$s</p>
		<p>%2$s</p>',
		$explanation,				// 1
		$settings_buttons_render	// 2
	);

	/** Build the output in form of a settings form table */
	$output = sprintf(
		'<table class="form-table">
			<tr>
				<th class="tbex-user-profile-title"><span class="dashicons-before dashicons-info"></span> %1$s</th>
				<td>%2$s</td>
			</tr>
		</table>',
		ddw_tbex_string_toolbar_extras(),
		$description
	);

	/** Render the full output */
	echo $output;

	/** Add few subtle CSS inline styles */
	?>
		<style type='text/css'>
			.form-table th.tbex-user-profile-title {
				color: #7443c0;
			}
			.tbex-user-profile.button {
				color: #A741BD;
				/* opacity: .5; */
			}
			.tbex-user-profile.button:hover {
				color: #7443c0;
			}
			.tbex-user-profile {
				margin-right: 10px !important;
			}
			.tbex-user-profile.dashicons-before:before {
				font-size: 18px;
				opacity: .8;
				margin-right: 3px;
				margin-top: 4px;
			}
			abbr[title]:after {
				content: " (" attr(title) ")";
			}

			@media screen and (min-width: 1025px) {
				abbr[title] {
					border-bottom: 1px dashed #ADADAD;
					cursor: help;
				}
				abbr[title]:after {
					content: "";
				}
			}
		</style>
	<?php

}  // end function


add_action( 'admin_menu', 'ddw_tbex_add_tools_submenu' );
/**
 * Add additional admin menu items to make Toolbar settings more accessable.
 *
 * @since 1.4.0
 *
 * @uses add_management_page()
 */
function ddw_tbex_add_tools_submenu() {

	/** Add to Core's Tools left-hand admin menu */
	$menu_title = esc_html_x( 'Toolbar Tools', 'Admin menu title', 'toolbar-extras' );

	add_management_page(
		$menu_title,
		$menu_title,
		'manage_options',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ) )
	);

}  // end function


add_filter( 'tbex_filter_color_items', 'ddw_tbex_add_color_item_wordpress', 100 );
/**
 * Add additional color item to any instance of a Toolbar Extras color picker
 *   on its setting page.
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_classicpress_install()
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbex_add_color_item_wordpress( $color_items ) {

	$color_items[ 'wp-dark-grey' ] = array(
		'color' => '#555',
		'name'  => sprintf(
			/* translators: %s - name of CMS, "WordPress" or "ClassicPress" */
			__( '%s Dark Grey', 'toolbar-extras' ),
			ddw_tbex_is_classicpress_install() ? 'ClassicPress' : 'WordPress'
		),
	);

	return $color_items;

}  // end function


add_filter( 'tbex_filter_set_builder_is_active', 'ddw_tbex_builder_logic_for_builtin' );
/**
 * This logic is needed for our Main Item: it checks if the default Builder set
 *   in our settings is really active. This avoids any notices, and can also
 *   properly trigger the fallback mode for the Main Item.
 *
 *   Note: Add-Ons need to opt-in into this filter and check for themselves.
 *
 * @since 1.4.5
 *
 * @see plugin file: /includes/main-item.php
 *
 * @param bool $is_active
 * @return bool TRUE if the set builder is active, FALSE otherwise.
 */
function ddw_tbex_builder_logic_for_builtin( $is_active ) {

	$is_active = (bool) $is_active;

	$default_builder = ddw_tbex_get_default_pagebuilder();

	/** Check for Block Editor/ Gutenberg */
	if ( 'block-editor' === $default_builder
		&& ( ! ddw_tbex_is_block_editor_active() || ! ddw_tbex_is_block_editor_wanted() )
	) {
		return FALSE;
	}

	/** Check for Elementor */
	if ( 'elementor' === $default_builder && ! ddw_tbex_is_elementor_active() ) {
		return FALSE;
	}

	/** Default: return TRUE */
	return TRUE;

}  // end function
