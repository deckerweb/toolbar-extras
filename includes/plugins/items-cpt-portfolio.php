<?php

// includes/plugins/items-cpt-portfolio

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_cpt_items_portfolio', 115 );
/**
 * Items for Custom Post Type: "Portfolio" ('portfolio')
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_cpt_items_portfolio() {

	$type = 'portfolio';

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-cpt-' . $type,
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Portfolio Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'class'  => 'tbex-mc-cpt-' . $type,
				'target' => '',
				'title'  => esc_attr__( 'Edit Portfolio Items', 'toolbar-extras' )
			)
		)
	);

	/** For: Theme Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'posttype-' . $type,
			'parent' => 'theme-creative'
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'cpt' . $type . '-all',
			'parent' => 'posttype-' . $type,
			'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'cpt' . $type . '-new',
			'parent' => 'posttype-' . $type,
			'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' )
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cpt' . $type . '-builder',
				'parent' => 'posttype-' . $type,
				'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' )
				)
			)
		);

		/** For: WordPress "New Content" section within the Toolbar */
		if ( ddw_tbex_display_items_new_content() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'new-cpt' . $type . '-with-builder',
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

	}  // end if

	/** Genesis specific */
	if ( post_type_supports( $type, 'genesis-cpt-archives-settings' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cpt' . $type . '-archive',
				'parent' => 'posttype-' . $type,
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
