<?php

// includes/elementor-addons/items-portfolio-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_portfolio_for_elementor', 100 );
/**
 * Items for Add-On: Portfolio for Elementor (free, by WpPug)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_portfolio_for_elementor() {

	/** Portfolio Items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-pffel',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Portfolio Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elemenfolio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Portfolio for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-pffel-all',
				'parent' => 'ao-pffel',
				'title'  => esc_attr__( 'All Items', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elemenfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Items', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-pffel-new',
				'parent' => 'ao-pffel',
				'title'  => esc_attr__( 'New Portfolio', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=elemenfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Portfolio', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'elemenfolio' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-pffel-builder',
					'parent' => 'ao-pffel',
					'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elemenfolio' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-pffel-settings',
				'parent' => 'ao-pffel',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor_portfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Portfolio for Elementor */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-pffel-resources',
					'parent' => 'ao-pffel',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'pffel-support',
				'group-pffel-resources',
				'https://wordpress.org/support/plugin/portfolio-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'pffel-translate',
				'group-pffel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/portfolio-elementor'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_elemenfolio' );
/**
 * Items for "New Content" section: New Portfolio Item
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_elemenfolio() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'elemenfolio' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elemenfolio-with-builder',
			'parent' => 'new-elemenfolio',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elemenfolio' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder()
			)
		)
	);

}  // end if