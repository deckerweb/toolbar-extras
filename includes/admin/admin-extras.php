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

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Plugins page listing', 'toolbar-extras' ) );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Plugins page listing', 'toolbar-extras' ) );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Plugins page listing', 'toolbar-extras' ) );

		/* translators: Plugins page listing */
		$tbex_links[] = ddw_tbex_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Plugins page listing', 'toolbar-extras' ), 'button' );

	}  // end if plugin links

	/** Output the links */
	return apply_filters(
		'tbex_filter_plugin_links',
		$tbex_links
	);

}  // end function


add_action( 'admin_head-nav-menus.php', 'ddw_tbex_widgets_help_content', 15 );
/**
 * Create and display plugin help tab content.
 *
 * Load it after core help tabs on Menus admin page.
 * Some plugin menu instructions for super_admins plus general plugin info.
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
			'title'    => __( 'Toolbar Extras', 'toolbar-extras' ),
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


add_filter( 'plugins_api_result', 'ddw_tbex_add_mstba_api_result', 11, 3 );
/**
 * Filter plugin fetching API results to inject plugin "Multisite Toolbar Additions".
 *
 * @since   1.0.0
 *
 * Original code by Remy Perona/ WP-Rocket.
 * @author  Remy Perona
 * @link    https://wp-rocket.me/
 * @license GPL-2.0+
 * 
 * @param   object|WP_Error $result Response object or WP_Error.
 * @param   string          $action The type of information being requested from the Plugin Install API.
 * @param   object          $args   Plugin API arguments.
 *
 * @return array Updated array of results.
 */
function ddw_tbex_add_mstba_api_result( $result, $action, $args ) {

	if ( empty( $args->browse ) ) {
		return $result;
	}

	if ( 'featured' !== $args->browse
		&& 'recommended' !== $args->browse
		&& 'popular' !== $args->browse
	) {
		return $result;
	}

	if ( ! isset( $result->info[ 'page' ] ) || 1 < $result->info[ 'page' ] ) {
		return $result;
	}

	/** Check if plugin active */
	if ( is_plugin_active( 'multisite-toolbar-additions/multisite-toolbar-additions.php' )
		|| is_plugin_active_for_network( 'multisite-toolbar-additions/multisite-toolbar-additions.php' )
	) {
		return $result;
	}

	/** Grab all slugs from the api results. */
	$result_slugs = wp_list_pluck( $result->plugins, 'slug' );

	if ( in_array( 'multisite-toolbar-additions', $result_slugs, TRUE ) ) {
		return $result;
	}

	$query_args = array(
		'slug'   => 'multisite-toolbar-additions',	// plugin slug from wordpress.org
		'fields' => array(
			'icons'             => TRUE,
			'active_installs'   => TRUE,
			'short_description' => TRUE,
			'group'             => TRUE,
		),
	);

	$mstba_data = plugins_api( 'plugin_information', $query_args );

	if ( is_wp_error( $mstba_data ) ) {
		return $result;
	}

	if ( 'featured' === $args->browse ) {
		array_push( $result->plugins, $mstba_data );
	} else {
		array_unshift( $result->plugins, $mstba_data );
	}

	return $result;

}  // end function