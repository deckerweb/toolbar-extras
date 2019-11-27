<?php

// includes/elementor-addons/items-jetcomparewishlist

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetcomparewishlist', 100 );
/**
 * Items for Add-On: JetCompareWishlist (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetcomparewishlist( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetcomparewishlist',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetCompareWishlist', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-cw-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetCompareWishlist', 'toolbar-extras' ) ),
			)
		)
	);

		/** Get the page settings */
		$cw_settings = get_option( 'jet-cw-settings' );
		$cw_compare  = ( 'true' === sanitize_key( $cw_settings[ 'enable_compare' ] ) ) ? absint( $cw_settings[ 'compare_page' ] ) : null;
		$cw_wishlist = ( 'true' === sanitize_key( $cw_settings[ 'enable_wishlist' ] ) ) ? absint( $cw_settings[ 'wishlist_page' ] ) : null;

		/** Compare */
		if ( 'true' === sanitize_key( $cw_settings[ 'enable_compare' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetcomparewishlist-compare',
					'parent' => 'ao-jetcomparewishlist',
					'title'  => esc_attr__( 'Compare', 'toolbar-extras' ),
					'href'   => esc_url( get_permalink( $cw_compare ) ),
					'meta'   => array(
						'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Compare', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetcomparewishlist-compare-view',
						'parent' => 'ao-jetcomparewishlist-compare',
						'title'  => esc_attr__( 'View Page', 'toolbar-extras' ),
						'href'   => esc_url( get_permalink( $cw_compare ) ),
						'meta'   => array(
							'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'View Page', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetcomparewishlist-compare-edit',
						'parent' => 'ao-jetcomparewishlist-compare',
						'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
						'href'   => esc_url( get_edit_post_link( $cw_compare ) ),
						'meta'   => array(
							'target' => is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
						)
					)
				);

				/** For WooCommerce Shop item - as sub item */
				$admin_bar->add_node(
					array(
						'id'     => 'woo-shop-compare-view',
						'parent' => 'view-store',
						'title'  => esc_attr__( 'Compare Page', 'toolbar-extras' ),
						'href'   => esc_url( get_permalink( $cw_compare ) ),
						'meta'   => array(
							'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Compare Page', 'toolbar-extras' ),
						)
					)
				);

		}  // end if

		/** Wishlist */
		if ( 'true' === sanitize_key( $cw_settings[ 'enable_wishlist' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetcomparewishlist-wishlist',
					'parent' => 'ao-jetcomparewishlist',
					'title'  => esc_attr__( 'Wishlist', 'toolbar-extras' ),
					'href'   => esc_url( get_permalink( $cw_wishlist ) ),
					'meta'   => array(
						'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Wishlist', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetcomparewishlist-wishlist-view',
						'parent' => 'ao-jetcomparewishlist-wishlist',
						'title'  => esc_attr__( 'View Page', 'toolbar-extras' ),
						'href'   => esc_url( get_permalink( $cw_wishlist ) ),
						'meta'   => array(
							'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'View Page', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetcomparewishlist-wishlist-edit',
						'parent' => 'ao-jetcomparewishlist-wishlist',
						'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
						'href'   => esc_url( get_edit_post_link( $cw_wishlist ) ),
						'meta'   => array(
							'target' => is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
						)
					)
				);

				/** For WooCommerce Shop item - as sub item */
				$admin_bar->add_node(
					array(
						'id'     => 'woo-shop-wishlist-view',
						'parent' => 'view-store',
						'title'  => esc_attr__( 'Wishlist Page', 'toolbar-extras' ),
						'href'   => esc_url( get_permalink( $cw_wishlist ) ),
						'meta'   => array(
							'target' => ! is_admin() ? '' : ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Wishlist Page', 'toolbar-extras' ),
						)
					)
				);

		}  // end if

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetcomparewishlist-settings',
				'parent' => 'ao-jetcomparewishlist',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-cw-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetcomparewishlist-resources',
					'parent' => 'ao-jetcomparewishlist',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetcomparewishlist-docs',
				'group-jetcomparewishlist-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetcomparewishlist'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetcomparewishlist-facebook',
				'group-jetcomparewishlist-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetcomparewishlist-site',
				'group-jetcomparewishlist-resources',
				'https://crocoblock.com/woocommerce/compare-wishlist/'
			);

		}  // end if

}  // end function
