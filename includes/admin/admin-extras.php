<?php

// includes/admin/admin-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add user onboarding welcome notice on plugins page - dismissible!
 *   Gets displayed and once dismissed will never show again.
 *
 * @since 1.0.0
 */
require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/notice-plugins-welcome.php' );
add_action( 'admin_notices', 'ddw_tbex_notice_plugins_welcome' );
add_action( 'network_admin_notices', 'ddw_tbex_notice_plugins_welcome' );	// also show message on Multisite


/**
 * Add "Settings" and Custom Menu" links to Plugins page.
 *
 * @since  1.0.0
 *
 * @param  array $tbex_links (Default) Array of plugin action links.
 * @return strings $tbex_links Settings & Menu Admin links.
 */
function ddw_tbex_custom_settings_links( $tbex_links ) {

	$tbex_settings_link = '';
	$tbex_menu_link     = '';

	/** Add settings link only if user can 'manage_options' */
	if ( current_user_can( 'edit_theme_options' ) ) {

		/** Settings Page link */
		$tbex_settings_link = sprintf(
			'<a class="dashicons-before dashicons-admin-generic" href="%s" title="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
			/* translators: Title attribute for Toolbar Extras "Plugin settings" link */
			esc_html__( 'Toolbar Extras Settings', 'toolbar-extras' ),
			esc_attr_x( 'Settings', 'For Toolbar Extras Plugin', 'toolbar-extras' )
		);

	}  // end if

	/** Add menu link only if user can 'edit_theme_options' */
	if ( current_user_can( 'edit_theme_options' ) ) {

		/** Menus Page link */
		$tbex_menu_link = sprintf(
			'<a class="dashicons-before dashicons-menu" href="%s" title="%s">%s</a>',
			esc_url( admin_url( 'nav-menus.php' ) ),
			esc_html__( 'Setup a custom toolbar menu', 'toolbar-extras' ),
			esc_attr__( 'Custom Menu', 'toolbar-extras' )
		);

	}  // end if

	/** Set the order of the links */
	array_unshift( $tbex_links, $tbex_settings_link, $tbex_menu_link );

	/** Display plugin settings links */
	return apply_filters(
		'tbex_filter_menu_page_link',
		$tbex_links
	);

}  // end function


add_filter( 'plugin_row_meta', 'ddw_tbex_plugin_links', 10, 2 );
/**
 * Add various support links to Plugins page.
 *
 * @since  1.0.0
 * @since  1.3.4 Added more Dashicons.
 *
 * @uses   ddw_tbex_get_info_link()
 *
 * @param  array  $tbex_links (Default) Array of plugin meta links
 * @param  string $tbex_file  URL of base plugin file
 * @return array $tbex_links Array of plugin link strings to build HTML markup.
 */
function ddw_tbex_plugin_links( $tbex_links, $tbex_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $tbex_links;
	}

	/** List additional links only for this plugin */
	if ( $tbex_file === TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php' ) {

		?>
			<style type="text/css">
				tr[data-slug="toolbar-extras"] .plugin-version-author-uri a.dashicons-before:before {
					font-size: 17px;
					margin-right: 2px;
					opacity: .85;
					vertical-align: sub;
				}
			</style>
		<?php

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Plugins page listing', 'toolbar-extras' ), 'dashicons-before dashicons-sos' );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Plugins page listing', 'toolbar-extras' ), 'dashicons-before dashicons-facebook' );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Plugins page listing', 'toolbar-extras' ), 'dashicons-before dashicons-translation' );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Plugins page listing', 'toolbar-extras' ), 'button-primary dashicons-before dashicons-thumbs-up' );

	}  // end if plugin links

	/** Output the links */
	return apply_filters(
		'tbex_filter_plugin_links',
		$tbex_links
	);

}  // end function


add_action( 'admin_head-nav-menus.php', 'ddw_tbex_widgets_help_content', 15 );
add_action( 'load-settings_page_toolbar-extras', 'ddw_tbex_widgets_help_content' );
/**
 * Create and display plugin help tab content.
 *   Load it after core help tabs on Menus admin page.
 *   Load on plugin's on settings page.
 *   Some plugin menu instructions for super_admins plus general plugin info.
 *
 * @since  1.0.0
 *
 * @uses   WP_Screen::add_help_tab()
 *
 * @global mixed $GLOBALS[ 'tbex_menu_screen' ]
 */
function ddw_tbex_widgets_help_content() {

	$GLOBALS[ 'tbex_menu_screen' ] = get_current_screen();

	/** Check for proper admin screen & permissions */
	if ( ! $GLOBALS[ 'tbex_menu_screen' ]
		|| ! is_super_admin()
	) {
		return;
	}

	/** Add the new help tab */
	$GLOBALS[ 'tbex_menu_screen' ]->add_help_tab(
		array(
			'id'       => 'tbex-menus-help',
			'title'    => esc_html__( 'Toolbar Extras', 'toolbar-extras' ),
			'callback' => apply_filters(
				'tbex_filter_help_tab_menus',
				'ddw_tbex_help_tab_content_menus'
			),
		)
	);

	require_once( TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-menus.php' );

}  // end function


add_action( 'after_menu_locations_table', 'ddw_tbex_help_info_menu_locations' );
/**
 * Help info content on "Menu Locations" tab on nav-menus.php as well as in the
 *   Customizer's Nav Menu panel.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_super_admin_nav_menu()
 * @uses   ddw_tbex_string_maybe_super_admin()
 * @uses   ddw_tbex_string_super_admin_menu_location()
 *
 * @return string HTML content.
 */
function ddw_tbex_help_info_menu_locations() {

	/** Bail early if no Super Admin */
	if ( ! is_super_admin() || ! ddw_tbex_display_items_super_admin_nav_menu() ) {
		return;
	}

	//$super_menu = ddw_tbex_display_items_super_admin_nav_menu() ? TRUE : FALSE;

	$output = sprintf(
		/* translators: %1$s - Term: 'The following menu location above is' / %2$s - "Super Admins" or "Admins" / %3$s - Name of plugin ("Toolbar Extras") */
		'<br />&nbsp;<p>' . __( '%1$s only for %2$s.', 'toolbar-extras' ) . ' ' . __( 'This is provided by the plugin %3$s.', 'toolbar-extras' ) . '</p>',
		__( 'The following menu location above is', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( TRUE ),
		'<em>' . __( 'Toolbar Extras', 'toolbar-extras' ) . '</em>'
	);

	$output .= sprintf(
		'<p>%s</p>',
		'&rarr; ' . ddw_tbex_string_super_admin_menu_location()
	);

	$output .= sprintf(
		'<p class="description">%s</p>',
		__( 'See help tab on top right corner for more usage instructions.', 'toolbar-extras' )
	);

	/** Echo the HTML output */
	echo $output;

}  // end function


add_filter( 'admin_footer_text', 'ddw_tbex_admin_footer_text' );
/**
 * Modifies the "Thank you" text displayed in the WP Admin footer.
 *   Fired by 'admin_footer_text' filter.
 *
 * @since  1.3.2
 *
 * @param  string $footer_text The content that will be printed.
 * @return string The content that will be printed.
 */
function ddw_tbex_admin_footer_text( $footer_text ) {

	$current_screen = get_current_screen();
	$is_tbex_screen = ( $current_screen && FALSE !== strpos( $current_screen->id, 'toolbar-extras' ) );

	if ( $is_tbex_screen ) {

		$footer_text = sprintf(
			/* translators: 1 - Toolbar Extras / 2 - Link to plugin review */
			__( 'Enjoyed %1$s? Please leave us a %2$s rating. We really appreciate your support!', 'toolbar-extras' ),
			'<strong>' . __( 'Toolbar Extras', 'toolbar-extras' ) . '</strong>',
			'<a href="https://wordpress.org/support/plugin/toolbar-extras/reviews/?filter=5#new-post" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
		);

	}  // end if

	return $footer_text;

}  // end function


/**
 * Inline CSS fix for Plugins page update messages.
 *
 * @since 1.3.4
 *
 * @see   ddw_tbex_plugin_update_message()
 * @see   ddw_tbex_multisite_subsite_plugin_update_message()
 */
function ddw_tbex_plugin_update_message_style_tweak() {

	?>
		<style type="text/css">
			.tbex-update-message p:before,
			.update-message.notice p:empty {
				display: none !important;
			}
		</style>
	<?php

}  // end function


add_action( 'in_plugin_update_message-' . TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php', 'ddw_tbex_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for regular single site installs, and for Multisite
 *         installs where the plugin is activated Network-wide.
 *
 * @since  1.3.4
 *
 * @param  object $data
 * @param  object $response
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbex_plugin_update_message( $data, $response ) {

	if ( isset( $data[ 'upgrade_notice' ] ) ) {

		ddw_tbex_plugin_update_message_style_tweak();

		printf(
			'<div class="update-message tbex-update-message">%s</div>',
			wpautop( $data[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


add_action( 'after_plugin_row_wp-' . TBEX_PLUGIN_BASEDIR . 'toolbar-extras.php', 'ddw_tbex_multisite_subsite_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for Multisite installs where the plugin is
 *         activated on a per site basis.
 *
 * @since  1.3.4
 *
 * @param  string $file
 * @param  object $plugin
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_tbex_multisite_subsite_plugin_update_message( $file, $plugin ) {

	if ( is_multisite() && version_compare( $plugin[ 'Version' ], $plugin[ 'new_version' ], '<' ) ) {

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

		ddw_tbex_plugin_update_message_style_tweak();

		printf(
			'<tr class="plugin-update-tr"><td colspan="%s" class="plugin-update update-message notice inline notice-warning notice-alt"><div class="update-message tbex-update-message"><h4 style="margin: 0; font-size: 14px;">%s</h4>%s</div></td></tr>',
			$wp_list_table->get_column_count(),
			$plugin[ 'Name' ],
			wpautop( $plugin[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


/**
 * Optionally tweaking Plugin API results to make more useful recommendations to
 *   the user.
 *
 * @since 1.0.0
 * @since 1.3.2 Added Block Editor specifications for results.
 * @since 1.3.4 Complete refactoring, using library class DDWlib Plugin
 *              Installer Recommendations
 */

add_filter( 'ddwlib_plir/filter/plugins', 'ddw_tbex_register_extra_plugin_recommendations' );
/**
 * Register specific plugins for the class "DDWlib Plugin Installer
 *   Recommendations".
 *   Note: The top-level array keys are plugin slugs from the WordPress.org
 *         Plugin Directory.
 *
 * @since  1.3.4
 *
 * @param  array $plugins Array holding all plugin recommendations, coming from
 *                        the class and the filter.
 * @return array Filtered and merged array of all plugin recommendations.
 */
function ddw_tbex_register_extra_plugin_recommendations( array $plugins ) {
  
	/** Remove our own slug when we are already active :) */
	if ( isset( $plugins[ 'toolbar-extras' ] ) ) {
		$plugins[ 'toolbar-extras' ] = null;
	}

  	/** Add new keys to recommendations */
  	$plugins[ 'custom-css-js' ] = array(
		'featured'    => 'yes',
		'recommended' => 'yes',
		'popular'     => 'no',
	);

  	/** Register additional Elementor plugin recommendations */
  	$plugins_elementor = array();

  	if ( ddw_tbex_is_elementor_active() ) {

		$plugins_elementor = array(
			'flexible-elementor-panel' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'debug-elementor' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'custom-icons-for-elementor' => array(
				'featured'    => 'no',
				'recommended' => 'no',
				'popular'     => 'yes',
			),
			'sticky-header-effects-for-elementor' => array(
				'featured'    => 'no',
				'recommended' => 'no',
				'popular'     => 'yes',
			),
		);

	}  // end if

  	/** Register additional Block Editor (Gutenberg) plugin recommendations */
  	$plugins_block_editor = array();

  	if ( ddw_tbex_is_block_editor_active() ) {

		$plugins_block_editor = array(
			'classic-editor' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
			'classic-editor-addon' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'yes',
			),
			'custom-fields-gutenberg' => array(
				'featured'    => 'yes',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
			'manager-for-gutenberg' => array(
				'featured'    => 'no',
				'recommended' => 'yes',
				'popular'     => 'no',
			),
		);

	}  // end if

	/** Merge with the existing recommendations and return */
	return array_merge( $plugins, $plugins_elementor, $plugins_block_editor );
  
}  // end function

/** Include class DDWlib Plugin Installer Recommendations */
require_once( TBEX_PLUGIN_DIR . 'includes/admin/classes/ddwlib-plugin-installer-recommendations.php' );