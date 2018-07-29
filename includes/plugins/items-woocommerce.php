<?php

// includes/plugins/items-woocommerce

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
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_wc_plugin', 500 );
/**
 * Customizer items for Plugin: WooCommerce - plus optional Add-Ons
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_wc_plugin() {

	//$shop_page_id = get_option( 'woocommerce_shop_page_id' );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-woocommerce-plugin',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'WooCommerce (Plugin)', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'woocommerce', get_post_type_archive_link( 'product' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'WooCommerce (Plugin)', 'toolbar-extras' ) )
			)
		)
	);

	/**
	 * Additional Plugin item from: Decorator – WooCommerce Email Customizer (free, by RightPress)
	 * @since 1.3.1
	 * @uses  RP_Decorator_Customizer::get_customizer_url()
	 */
	if ( defined( 'RP_DECORATOR_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-decorator-woocommerce-emails',
				'parent' => 'theme-creative-customize',
				'title'  => esc_attr__( 'WooCommerce Emails', 'toolbar-extras' ),
				'href'   => RP_Decorator_Customizer::get_customizer_url(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'WooCommerce Emails', 'toolbar-extras' ) )
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