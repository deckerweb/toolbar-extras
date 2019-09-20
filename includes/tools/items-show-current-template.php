<?php

// includes/tools/items-show-current-template

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Load the class
 * @since 1.4.7
 */
require_once TBEX_PLUGIN_DIR . 'includes/tools/class-show-current-template.php';


add_action( 'init', 'ddw_tbex_display_current_template_file_info', 15 );
/**
 * Show the used template for the current page document. This will display a new
 *   top-level Toolbar item - but only on the frontend.
 *
 *   Note: As of Toolbar Extras v1.4.7 this can only be used of the "Dev Mode"
 *         is activated and, if theme support was added via:
 *         add_theme_support( 'tbex-show-current-template' );
 *
 * @todo Settings intgration
 *
 * @since 1.4.7
 *
 * @uses \DDW\TBEX\Show_Current_Template()
 */
function ddw_tbex_display_current_template_file_info() {

	new \DDW\TBEX\Show_Current_Template();

}  // end function
