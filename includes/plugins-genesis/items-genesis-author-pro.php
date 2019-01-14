<?php

// includes/plugins-genesis/items-genesis-author-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_author_pro', 115 );
/**
 * Items for Add-On: Genesis Author Pro (free, by StudioPress/ copyblogger)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_author_pro() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'genesis-authorpro',
			'parent' => 'group-genesisplugins-creative'
		)
	);

	$type = 'books';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gapro-all',
			'parent' => 'genesis-authorpro',
			'title'  => esc_attr__( 'All Books', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Books', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gapro-new',
			'parent' => 'genesis-authorpro',
			'title'  => esc_attr__( 'New Book', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Book', 'toolbar-extras' )
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gapro-builder',
				'parent' => 'genesis-authorpro',
				'title'  => esc_attr__( 'New Book Builder', 'toolbar-extras' ),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Book Builder', 'toolbar-extras' )
				)
			)
		);

		/** For: WordPress "New Content" section within the Toolbar */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gapro-with-builder',
				'parent' => 'new-' . $type,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	if ( post_type_supports( $type, 'genesis-cpt-archives-settings' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gapro-archive',
				'parent' => 'genesis-authorpro',
				'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=genesis-cpt-archive-' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function
