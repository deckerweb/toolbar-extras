<?php

// includes/themes-genesis/items-genesis-agent-focused-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_agent_focused_pro_customize', 90 );
/**
 * Customize items for Genesis Child Theme:
 *   Agent Focused Pro (Premium, by Marcy Diaz for Winning Agent)
 *
 * @since 1.4.9
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_agent_focused_pro_customize( array $items ) {

	/** Declare child theme's items */
	$afpro_items = array(
		'agentfocused-image' => array(
			'type'  => 'section',
			'title' => __( 'Front Page Image', 'toolbar-extras' ),
			'id'    => 'agentfocusedpro-front-page-image',
		),
		'colors' => array(
			'type'  => 'section',
			'title' => __( 'Colors', 'toolbar-extras' ),
			'id'    => 'agentfocusedpro-colors',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background Image', 'toolbar-extras' ),
			'id'    => 'agentfocusedpro-background-image',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $afpro_items );

}  // end function
