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
 */
require_once( TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-general.php' );
require_once( TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-smart-tweaks.php' );
require_once( TBEX_PLUGIN_DIR . 'includes/admin/tbex-settings-development.php' );


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
	require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/notice-settings-welcome.php' );
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
 * Enqueue various needed admin styles and scripts, including WordPress Color
 *   Picker Script (Iris) and Dashicons Picker.
 *
 * @since 1.0.0
 * @since 1.4.0 Added toggle script.
 *
 * @see ddw_tbex_settings_add_admin_page()
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
 *
 * @uses wp_localize_script()
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

}  // end function


/**
 * Callback function to create admin page after adding it.
 *
 * @since 1.0.0
 *
 * @see ddw_tbex_settings_add_admin_page()
 *
 * @uses ddw_tbex_string_save_changes()
 */
function ddw_tbex_settings_create_admin_page() {

	$url_general       = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'general' ), admin_url( 'options-general.php' ) ) );
	$url_smart_tweaks  = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'smart-tweaks' ), admin_url( 'options-general.php' ) ) );
	$url_development   = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'development' ), admin_url( 'options-general.php' ) ) );
	$url_about_support = esc_url( add_query_arg( array( 'page' => 'toolbar-extras', 'tab'  => 'about-support' ), admin_url( 'options-general.php' ) ) );

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

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-general.php' );

							settings_fields( 'tbex_group_general' );
							do_settings_sections( 'tbex_group_general' );

							do_action( 'tbex_after_settings_general_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 2) Tab Smart Tweaks */
						case 'smart-tweaks' :
							do_action( 'tbex_before_settings_tweaks_view' );

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-smart-tweaks.php' );

							settings_fields( 'tbex_group_smart_tweaks' );
							do_settings_sections( 'tbex_group_smart_tweaks' );

							do_action( 'tbex_after_settings_tweaks_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 3) Tab Development */
						case 'development' :
							do_action( 'tbex_before_settings_development_view' );

							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-development.php' );

							settings_fields( 'tbex_group_development' );
							do_settings_sections( 'tbex_group_development' );

							do_action( 'tbex_after_settings_development_view' );

							submit_button( ddw_tbex_string_save_changes() );
						break;

						/** 4) Tab Tools (upcoming) 'tools' */

						/** 5) Add-On: Toolbar Extras for Multisite */
						case 'multisite' :
							do_action( 'tbex_settings_tab_addon_multisite' );
						break;

						/** 6) Add-On: Toolbar Extras for MainWP */
						case 'mainwp' :
							do_action( 'tbex_settings_tab_addon_mainwp' );
						break;

						/** 7) Tab Export & Import (upcoming) 'export-import' */

						/** 8) Tab About & Support - only text, no submit button! */
						case 'about-support' :
							do_action( 'tbex_before_settings_about_support_view' );
							require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/settings-tab-about-support.php' );
							do_action( 'tbex_after_settings_about_support_view' );

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
 *
 * @uses ddw_tbex_is_addon_mainwp_active()
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

	/** Button: Settings General */
	$settings_general = sprintf(
		'<a class="button dashicons-before dashicons-admin-generic tbex-user-profile" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=general' ) ),
		esc_attr__( 'Go to the Toolbar Extras General settings tab', 'toolbar-extras' ),
		_x( 'General Settings', 'Plugin settings tab title', 'toolbar-extras' )
	);

	/** Button: Smart Tweaks */
	$settings_smart_tweaks = sprintf(
		'<a class="button dashicons-before dashicons-lightbulb tbex-user-profile" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ) ),
		esc_attr__( 'Go to the Toolbar Extras Smart Tweaks settings tab', 'toolbar-extras' ),
		_x( 'Smart Tweaks', 'Plugin settings tab title', 'toolbar-extras' )
	);

	/** Button: For Development */
	$settings_development = sprintf(
		'<a class="button dashicons-before dashicons-editor-code tbex-user-profile" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=development' ) ),
		esc_attr__( 'Go to the Toolbar Extras Development settings tab', 'toolbar-extras' ),
		_x( 'For Development', 'Plugin settings tab title', 'toolbar-extras' )
	);

	/** Optional, button for Add-On: MainWP */
	$settings_mainwp = sprintf(
		'<a class="button dashicons-before dashicons-networking tbex-user-profile" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ) ),
		esc_attr__( 'Go to the Toolbar Extras MainWP Add-On settings tab', 'toolbar-extras' ),
		_x( 'MainWP', 'Plugin settings tab title', 'toolbar-extras' )
	);

	$settings_mainwp = ( ddw_tbex_is_addon_mainwp_active() ) ? ' &nbsp; ' . $settings_mainwp : '';

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
		<p>%2$s &nbsp; %3$s &nbsp; %4$s%5$s</p>',
		$explanation,
		$settings_general,
		$settings_smart_tweaks,
		$settings_development,
		$settings_mainwp
	);

	/** Build the output in form of a settings form table */
	$output = sprintf(
		'<table class="form-table">
			<tr>
				<th><span class="dashicons-before dashicons-info"></span> %1$s</th>
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
