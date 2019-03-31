<?php

// includes/admin/admin-help

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'load-nav-menus.php', 'ddw_tbex_prepare_menu_help_styles' );
/**
 * Prepare enqueuing of help tab styles for the "Nav Menu" admin screens.
 *   Necessary in-between step to load at the proper hooks and priorities.
 *
 * @since 1.4.0
 */
function ddw_tbex_prepare_menu_help_styles() {

	add_action( 'admin_enqueue_scripts', 'ddw_tbex_register_styles_help_tabs', 20 );

}  // end function


//add_action( 'admin_enqueue_scripts', 'ddw_tbex_register_styles_help_tabs', 20 );
/**
 * Register CSS styles for our help tabs.
 *
 * @since 1.4.0
 */
function ddw_tbex_register_styles_help_tabs() {

	wp_register_style(
		'tbex-help-tabs',
		plugins_url( '/assets/css/tbex-help.css', dirname( dirname( __FILE__ ) ) ),
		array(),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-help-tabs' );

}  // end function


/**
 * Space helper to achieve some white space - for help tabs.
 *
 * @since 1.4.0
 *
 * @param int $height Height whitespace.
 * @param int $width  Width whitespace.
 * @return string String with HTML markup.
 */
function ddw_tbex_space_helper( $height = 10, $width = 1 ) {

	return sprintf(
		'<div style="width: %1$spx; height: %2$spx;"></div>',
		absint( $width ),
		absint( $height )
	);

}  // end function


add_action( 'load-settings_page_toolbar-extras', 'ddw_tbex_toolbar_extras_help_content' );
/**
 * Create and display plugin help tab content.
 *   Load it after core help tabs on Menus admin page.
 *   Load on plugin's on settings page.
 *   Some plugin menu instructions for super_admins plus general plugin info.
 *
 * @since 1.0.0
 * @since 1.4.0 Reworking the help tab organizing and content.
 * @since 1.4.2 Added "Add-Ons" help tab.
 *
 * @uses ddw_tbex_string_maybe_super_admin()
 * @uses WP_Screen::add_help_tab()
 *
 * @global mixed  $GLOBALS[ 'tbex_screen' ]
 * @global string $GLOBALS[ 'pagenow' ]
 */
function ddw_tbex_toolbar_extras_help_content() {

	$GLOBALS[ 'tbex_screen' ] = get_current_screen();

	/** Check for proper admin screen & permissions */
	if ( ! $GLOBALS[ 'tbex_screen' ]
		|| ! is_super_admin()
	) {
		return;
	}

	$menus_title = sprintf(
		/* translators: %s - String "Super Admin" (for Multisite) or "Admin" */
		esc_html_x( '%s Toolbar Menu', 'Help tab label', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( 'singular' )
	);

	$help_tabs = array();
	$help_tabs[ 'getstarted' ][ 'label' ]  = esc_html_x( 'Getting Started', 'Help tab label', 'toolbar-extras' );
	$help_tabs[ 'general' ][ 'label' ]     = esc_html_x( 'General Settings', 'Help tab label', 'toolbar-extras' );
	$help_tabs[ 'tweaks' ][ 'label' ]      = esc_html_x( 'Smart Tweaks', 'Help tab label', 'toolbar-extras' );
	$help_tabs[ 'development' ][ 'label' ] = esc_html_x( 'For Development', 'Help tab label', 'toolbar-extras' );
	$help_tabs[ 'menus' ][ 'label' ]       = $menus_title;
	$help_tabs[ 'addons' ][ 'label' ]      = esc_html_x( 'Add-Ons', 'Help tab label', 'toolbar-extras' );
	$help_tabs[ 'about' ][ 'label' ]       = esc_html_x( 'About', 'Help tab label', 'toolbar-extras' );

	foreach ( $help_tabs as $help_tab => $tab_data ) {

		$GLOBALS[ 'tbex_screen' ]->add_help_tab(
			array(
				'id'       => 'tbex-' . $help_tab . '-help',
				'title'    => $tab_data[ 'label' ],
				'callback' => apply_filters(
					'tbex/filter/content/help_tab_' . $help_tab,
					'ddw_tbex_help_tab_content_' . $help_tab
				),
			)
		);

		require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-' . $help_tab . '.php';

	}  // end foreach

	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-header.php';
	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-footer.php';

	/** Add additional help sidebar */
	if ( 'nav-menus.php' !== $GLOBALS[ 'pagenow' ] ) {

		require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-sidebar.php';

		$GLOBALS[ 'tbex_screen' ]->set_help_sidebar( ddw_tbex_content_help_sidebar() );

	}  // end foreach

	/** CSS style tweaks */
	add_action( 'admin_enqueue_scripts', 'ddw_tbex_register_styles_help_tabs', 20 );

}  // end function


add_action( 'admin_head-nav-menus.php', 'ddw_tbex_help_content_admin_menu', 15 );
/**
 * Add help tab to Nav Menus Admin page.
 *
 * @since 1.0.0
 * @since 1.4.0 Reworking as dedicated help tab for admin menu only.
 *
 * @see ddw_tbex_prepare_menu_help_styles()
 * @see plugin file /includes/admin/views/help-content-menus.php
 */
function ddw_tbex_help_content_admin_menu() {

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
			'title'    => esc_html__( 'Toolbar Extras: Admin Menu', 'toolbar-extras' ),
			'callback' => apply_filters(
				'tbex/filter/content/help_tab_menus',
				'ddw_tbex_help_tab_content_menus'
			),
		)
	);

	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-header.php';
	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-menus.php';
	require_once TBEX_PLUGIN_DIR . 'includes/admin/views/help-content-footer.php';

}  // end function


add_action( 'after_menu_locations_table', 'ddw_tbex_help_info_menu_locations' );
/**
 * Help info content on "Menu Locations" tab on nav-menus.php as well as in the
 *   Customizer's Nav Menu panel.
 *
 * @since 1.0.0
 * @since 1.4.0 Code enhanced and optimized.
 *
 * @uses ddw_tbex_display_items_super_admin_nav_menu()
 * @uses ddw_tbex_string_maybe_super_admin()
 * @uses ddw_tbex_string_super_admin_menu_location()
 * @uses ddw_tbex_string_toolbar_extras()
 *
 * @return string HTML content.
 */
function ddw_tbex_help_info_menu_locations() {

	/** Bail early if no Super Admin */
	if ( ! is_super_admin() || ! ddw_tbex_display_items_super_admin_nav_menu() ) {
		return;
	}

	$output = sprintf(
		/* translators: %1$s - Term: 'The following menu location above is' / %2$s - "Super Admins" or "Admins" / %3$s - Name of the plugin, "Toolbar Extras" */
		'<br />&nbsp;<p>' . __( '%1$s only for %2$s.', 'toolbar-extras' ) . ' ' . __( 'This is provided by the plugin %3$s.', 'toolbar-extras' ) . '</p>',
		__( 'The following menu location above is', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( 'plural' ),
		'<em>' . ddw_tbex_string_toolbar_extras() . '</em>'
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
