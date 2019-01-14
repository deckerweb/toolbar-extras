<?php

// includes/block-editor-addons/items-elegant-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elegant_blocks', 150 );
/**
 * Site items for Plugin: Elegant Blocks (free, by ravisakya, cyclonetheme)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_elegant_blocks() {
	
	$string_elegant_blocks = esc_attr__( 'Elegant Blocks', 'toolbar-extras' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-elegantblocks',
			'parent' => 'group-creative-content',
			'title'  => $string_elegant_blocks,
			'href'   => esc_url( admin_url( 'admin.php?page=elegant-blocks-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( $string_elegant_blocks )
			)
		)
	);

		/** Group for the post type stuff */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-elegantblocks-creative',
				'parent' => 'tbex-elegantblocks',
			)
		);

		/** Services */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-services',
				'parent' => 'group-elegantblocks-creative',
				'title'  => esc_attr__( 'Services', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=cp_services' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_elegant_blocks . ': ' . esc_attr__( 'Services', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-services-all',
					'parent' => 'elegantblocks-services',
					'title'  => esc_attr__( 'All Services', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=cp_services' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Services', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-services-new',
					'parent' => 'elegantblocks-services',
					'title'  => esc_attr__( 'New Service', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=cp_services' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Service', 'toolbar-extras' )
					)
				)
			);

		/** Teams */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-teams',
				'parent' => 'group-elegantblocks-creative',
				'title'  => esc_attr__( 'Teams', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ct_teams' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_elegant_blocks . ': ' . esc_attr__( 'Teams', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-teams-all',
					'parent' => 'elegantblocks-teams',
					'title'  => esc_attr__( 'All Teams', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ct_teams' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Teams', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-teams-new',
					'parent' => 'elegantblocks-teams',
					'title'  => esc_attr__( 'New Team', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ct_teams' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Team', 'toolbar-extras' )
					)
				)
			);

		/** Sliders */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-sliders',
				'parent' => 'group-elegantblocks-creative',
				'title'  => esc_attr__( 'Sliders', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ct_slider' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_elegant_blocks . ': ' . esc_attr__( 'Sliders', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-sliders-all',
					'parent' => 'elegantblocks-sliders',
					'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ct_slider' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-sliders-new',
					'parent' => 'elegantblocks-sliders',
					'title'  => esc_attr__( 'New Slider', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ct_slider' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Slider', 'toolbar-extras' )
					)
				)
			);

		/** Testimonials */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-testmonials',
				'parent' => 'group-elegantblocks-creative',
				'title'  => esc_attr__( 'Testimonials', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ct_testmonial' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_elegant_blocks . ': ' . esc_attr__( 'Testimonials', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-testmonials-all',
					'parent' => 'elegantblocks-testmonials',
					'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ct_testmonial' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-testmonials-new',
					'parent' => 'elegantblocks-testmonials',
					'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ct_testmonial' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' )
					)
				)
			);

		/** Galleries */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-galleries',
				'parent' => 'group-elegantblocks-creative',
				'title'  => esc_attr__( 'Galleries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ct_gallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_elegant_blocks . ': ' . esc_attr__( 'Galleries', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-galleries-all',
					'parent' => 'elegantblocks-galleries',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ct_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elegantblocks-galleries-new',
					'parent' => 'elegantblocks-galleries',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ct_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elegantblocks-settings',
				'parent' => 'tbex-elegantblocks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elegant-blocks-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-elegantblocks-resources',
					'parent' => 'tbex-elegantblocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'elegantblocks-support',
				'group-elegantblocks-resources',
				'https://wordpress.org/support/plugin/elegant-blocks'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'elegantblocks-translate',
				'group-elegantblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/elegant-blocks'
			);

		}  // end if

}  // end function
