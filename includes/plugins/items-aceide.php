<?php

// dev-mode
// includes/plugins/items-aceide

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_aceide' );
/**
 * Items for Plugin: AceIDE (free, by AceIDE)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_aceide() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-aceide',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'aceide',
			'parent' => 'group-aceide',
			'title'  => esc_attr__( 'AceIDE', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=aceide' ) ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'AceIDE (Code Editor)', 'toolbar-extras' )
			)
		)
	);

}  // end function
