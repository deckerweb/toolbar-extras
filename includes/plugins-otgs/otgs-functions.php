<?php

// OTGS: for Toolset - "global", shared functions
// includes/plugins-otgs/otgs-functions

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_color_items', 'ddw_tbex_add_color_items_otgs' );
/**
 * Add additional color item to any instance of a Toolbar Extras color picker
 *   on its setting page.
 *
 * @link https://www.onthegosystems.com/press-resources/
 * @link https://toolset.com/home/press-resources/
 *
 * @since 1.4.9
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbex_add_color_items_otgs( $color_items ) {

	/** For Toolset Suite */
	if ( ddw_tbex_detect_toolset_plugins() ) {

		$color_items[ 'toolset-red' ] = array(
			'color' => '#f15d30',
			'name'  => __( 'Toolset Red', 'toolbar-extras' ),
		);

	}  // end if

	/** For WPML */
	if ( ddw_tbex_is_wpml_active() ) {

		$color_items[ 'wpml-red' ] = array(
			'color' => '#c9471f',
			'name'  => __( 'WPML Red', 'toolbar-extras' ),
		);

		$color_items[ 'wpml-green' ] = array(
			'color' => '#33879e',
			'name'  => __( 'WPML Green', 'toolbar-extras' ),
		);

	}  // end if

	return $color_items;

}  // end function


/**
 * Build string "Toolset Suite".
 *
 *   With optional string addition, plus prefix, suffix parameters.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_dynamic()
 *
 * @param array $args Array holding all arguments for the string.
 * @return string Modified string with optional parameters.
 */
function ddw_tbex_string_toolset_suite( array $args = [] ) {

	$args[ 'string' ] = __( 'Toolset Suite', 'toolbar-extras' );

	return ddw_tbex_string_dynamic( $args );

}  // end function


/**
 * Build string "WPML Suite".
 *
 *   With optional string addition, plus prefix, suffix parameters.
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_dynamic()
 *
 * @param array $args Array holding all arguments for the string.
 * @return string Modified string with optional parameters.
 */
function ddw_tbex_string_wpml_suite( array $args = [] ) {

	$args[ 'string' ] = __( 'WPML Suite', 'toolbar-extras' );

	return ddw_tbex_string_dynamic( $args );

}  // end function
