<?php

// includes/compatibility/plugin-compatibility

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'plugins_loaded', 'ddw_tbex_plugin_compatibility', -1 );
/**
 * Plugin compat.
 *   More compat tweaks may come up in the future here.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_is_mstba_active()
 */
function ddw_tbex_plugin_compatibility() {

	/** Plugin compatibility with "Multisite Toolbar Additions" */
	if ( ddw_tbex_is_mstba_active() ) {
		
		/**
		 * Let not display the "Site Group" of Multisite Toolbar Additions"
		 *   as Toolbar Extras is hooking in similar items.
		 */
		define( 'MSTBA_DISPLAY_SITE_GROUP', FALSE );

		/** Remove (otherwise) doubled item */
		add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_mstba_items' );

	}  // end if

}  // end function


/**
 * Remove (otherwise) doubled items by Plugin "Multisite Toolbar Additions".
 *
 * @since 1.0.0
 * @since 1.3.4 Tweak for BackWPup plugin support in MSTBA.
 *
 * @uses ddw_tbex_use_tweak_mstba_siteextgroup()
 */
function ddw_tbex_remove_mstba_items() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'ddw-mstba-new-navmenu' );
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'ddw-mstba-newcontent_backwpup_add' );

	/** Optionally remove MSTBA's Site Extend Group */
	if ( ddw_tbex_use_tweak_mstba_siteextgroup() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'ddw-mstba-siteextgroup' );
	}

}  // end function
