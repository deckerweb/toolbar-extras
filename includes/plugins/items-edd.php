<?php

// includes/plugins/items-edd

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_edd', 15 );
/**
 * Items for Plugin: Easy Digital Downloads (EDD) (free, by Easy Digital Downloads)
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_edd() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-edd',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Download Products', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=download' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Download Products', 'toolbar-extras' )
			)
		)
	);

	/** For: New Content */
	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'download' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'edd-with-builder',
				'parent' => 'new-download',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'download' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_edd_shopuser', 15 );
/**
 * User items for Plugin: EDD
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_user_items_edd_shopuser() {

	/** Optional: Shop Worker Users (EDD) */
	$edd_shop_worker = get_users( array( 'role' => 'shop_worker' ) );

	if ( ! empty( $edd_shop_worker ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'user-eddshopworker',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Shop Workers', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=shop_worker' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Shop Workers', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Optional: Shop Vendor Users (EDD) */
	$edd_shop_vendor = get_users( array( 'role' => 'shop_vendor' ) );

	if ( ! empty( $edd_shop_vendor ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'user-eddshopvendor',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Shop Vendors', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=shop_vendor' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Shop Vendors', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Optional: Shop Accountant Users (EDD) */
	$edd_shop_accountant = get_users( array( 'role' => 'shop_accountant' ) );

	if ( ! empty( $edd_shop_accountant ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'user-eddshopaccountant',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Shop Accountants', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=shop_accountant' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Shop Accountants', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_filter( 'tbex_filter_color_items', 'ddw_tbex_add_color_items_edd' );
/**
 * Add additional color item to any instance of a Toolbar Extras color picker
 *   on its setting page.
 *
 * @link https://easydigitaldownloads.com/brand-assets/
 *
 * @since 1.4.4
 *
 * @param array $color_items Array holding all color items.
 * @return array Modified array of color items.
 */
function ddw_tbex_add_color_items_edd( $color_items ) {

	$color_items[ 'edd-cello' ] = array(
		'color' => '#35495c',
		'name'  => __( 'EDD Cello', 'toolbar-extras' ),
	);

	$color_items[ 'edd-blue' ] = array(
		'color' => '#2794da',
		'name'  => __( 'EDD Blue', 'toolbar-extras' ),
	);

	return $color_items;

}  // end function
