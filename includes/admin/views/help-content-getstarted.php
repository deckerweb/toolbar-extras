<?php

// includes/admin/views/help-content-getstarted

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Create and display plugin help tab content.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_string_maybe_super_admin()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_getstarted() {

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	/** Title */
	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-admin-users"></span> %s</h2>',
		__( 'Getting Started - First Steps', 'toolbar-extras' )
	);


	/** Build the content - basic steps */
	$output .= sprintf(
		'<p class="tbex-help-step tbex-step-inline">' . __( 'In %s set your Default Page Builder and its name.', 'toolbar-extras' ) . '</p>',
		'<a href="' . esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=general' ) ) . '">' . __( 'General Settings', 'toolbar-extras' ) . '</a>'
	);

	$output .= sprintf(
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Futher set the %1$s or alternatively the %2$s.', 'toolbar-extras' ) . '</p>',
		'<em>' . __( 'Main Item', 'toolbar-extras' ) . '</em>',
		'<em>' . __( 'Fallback Item', 'toolbar-extras' ) . '</em>'
	);

	$output .= sprintf(
		/* translators: 1 - word "Group" / 2 - word "single" */
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Decide which %1$s or %2$s items you want to display or not.', 'toolbar-extras' ) . '</p>',
		'<em>' . __( 'Group', 'toolbar-extras' ) . '</em>',
		'<em>' . __( 'single', 'toolbar-extras' ) . '</em>'
	);


	/** Optional steps */
	$output .= '<p class="description">' . __( 'If that all works well setup some more options', 'toolbar-extras' ) . ':</p>';

	$output .= sprintf(
		/* translators: 1 - label "custom menu" / 2 - String "Super Admins" (for Multisite) or "Admins" */
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Optionally setup a special %1$s for %2$s', 'toolbar-extras' ) . '</p>',
		'<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . __( 'custom menu', 'toolbar-extras' ) . '</a>',
		'<em>' . ddw_tbex_string_maybe_super_admin( 'plural' ) . '</em>'
	);

	$output .= sprintf(
		/* translators: %s - linked label, "Smart Tweaks" */
		'<p class="tbex-help-step tbex-step-inline">' . __( 'Additionally enable %s to adjust behavior of WordPress or third-party Toolbar items.', 'toolbar-extras' ) . '</p>',
		'<a href="' . esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ) ) . '">' . __( 'Smart Tweaks', 'toolbar-extras' ) . '</a>'
	);


	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
