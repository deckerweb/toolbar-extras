<?php

// includes/elementor-addons/items-dhwc-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_dhwc_elementor', 100 );
/**
 * Items for Add-On: DHWC Elementor (Premium, by Sitesao Team)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_dhwc_elementor() {

	/** Plugin's Templates Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-dhwce',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Product Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=dhwc_template' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'WooCommerce Product Templates', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dhwce-all',
				'parent' => 'ao-dhwce',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=dhwc_template' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dhwce-new',
				'parent' => 'ao-dhwce',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=dhwc_template' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'dhwc_template' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-dhwce-builder',
					'parent' => 'ao-dhwce',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'dhwc_template' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dhwce-settings',
				'parent' => 'ao-dhwce',
				'title'  => esc_attr__( 'Template Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wc-settings&tab=products' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-dhwce-resources',
					'parent' => 'ao-dhwce',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'dhwce-support',
				'group-dhwce-resources',
				'http://sitesao.com/support/forums/forum/plugin-extension/woocommerce-shortcodes-custom-product-page-with-elementor/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'dhwce-site',
				'group-dhwce-resources',
				'https://toolbarextras.com/go/dhwc-elementor/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_dhwc_elementor' );
/**
 * Items for "New Content" section: New Product Template
 *
 * @since  1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_dhwc_elementor() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'dhwc_template' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'dhwce-with-builder',
			'parent' => 'new-dhwc_template',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'dhwc_template' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder()
			)
		)
	);

}  // end if