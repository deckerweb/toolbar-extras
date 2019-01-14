<?php

// dev-mode
// includes/plugins/items-cobalt-instant-ide

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_instantide' );
/**
 * Items for Plugin: Instant IDE (Premium, by Cobalt Apps)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_instantide() {

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-instant-ide',
			'parent' => 'rapid-dev'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'iide',
			'parent' => 'group-instant-ide',
			'title'  => esc_attr__( 'Instant IDE', 'toolbar-extras' ),
			'href'   => esc_url( get_home_url() . '/' . IIDEM_IIDE_DIR_NAME . '/' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Instant IDE (Code Editor)', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'iide-preview',
			'parent' => 'group-instant-ide',
			'title'  => esc_attr__( 'Instant IDE Preview', 'toolbar-extras' ),
			'href'   => esc_url( get_home_url() . '/' . IIDEM_IIDE_DIR_NAME . '/?sitePreview=true' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Instant IDE - Site Preview', 'toolbar-extras' )
			)
		)
	);

}  // end function
