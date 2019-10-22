<?php

// includes/plugins/items-testimonial-rotator

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_testimonial_rotator', 115 );
/**
 * Items for Add-On: Testimonial Rotator (free, by Hal Gatewood)
 *
 * @since 1.2.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_testimonial_rotator( $admin_bar ) {

	/** For: Theme Creative items */
	$admin_bar->add_group(
		array(
			'id'     => 'group-testimonial-rotator',
			'parent' => 'theme-creative',
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'testimonial-rotator-all',
			'parent' => 'group-testimonial-rotator',
			'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'testimonial-rotator-new',
			'parent' => 'group-testimonial-rotator',
			'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' ),
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'testimonial' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'testimonial-rotator-builder',
				'parent' => 'group-testimonial-rotator',
				'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' ),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'testimonial' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' ),
				)
			)
		);

		/** For: WordPress "New Content" section within the Toolbar */
		$admin_bar->add_node(
			array(
				'id'     => 'testimonial-rotator-with-builder',
				'parent' => 'new-testimonial',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'testimonial' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

	$admin_bar->add_node(
		array(
			'id'     => 'testimonial-rotator-settings',
			'parent' => 'group-testimonial-rotator',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=testimonial&page=testimonial-rotator' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			)
		)
	);

	/** For: Manage Content in Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-testimonial-rotator',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=testimonial' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' ),
			)
		)
	);

}  // end function
