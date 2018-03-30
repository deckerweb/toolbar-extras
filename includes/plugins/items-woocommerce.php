<?php

//items-woocommerce

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_woocommerce', 15 );
/**
 * Site items for Plugin: WooCommerce (free, by Automattic)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_woocommerce() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-products',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Products', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=product' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Products', 'toolbar-extras' )
			)
		)
	);

	/** For: New Content */
	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'product' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'product-with-builder',
				'parent' => 'new-product',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'product' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_wc_shopmanager', 15 );
/**
 * User items for Plugin: WooCommerce
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_user_items_wc_shopmanager() {

	/** Optional: Shop Manager Users (WooCommerce) */
	$wc_shop_managers = get_users( array( 'role' => 'shop_manager' ) );

	if ( ! empty( $wc_shop_managers ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'user-wcshopmanagers',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Shop Managers', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=shop_manager' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Shop Managers', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function