<?php

// includes/elementor-addons/items-jetwooproductgallery

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetwooproductgallery', 100 );
/**
 * Items for Add-On: JetWooProductGallery for Elementor (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetwooproductgallery( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetwooproductgallery',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetWooProductGallery', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-woo-product-gallery-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetWooProductGallery', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwooproductgallery-settings',
				'parent' => 'ao-jetwooproductgallery',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-woo-product-gallery-settings' ) ),
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
					'id'     => 'group-jetwooproductgallery-resources',
					'parent' => 'ao-jetwooproductgallery',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetwooproductgallery-docs',
				'group-jetwooproductgallery-resources',
				'http://documentation.zemez.io/wordpress/index.php?project=jetproductgallery'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetwooproductgallery-facebook',
				'group-jetwooproductgallery-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetwooproductgallery-site',
				'group-jetwooproductgallery-resources',
				'https://crocoblock.com/woocommerce/jetproductgallery/?ref=3'
			);

		}  // end if

}  // end function
