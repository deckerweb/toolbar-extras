<?php

// includes/elementor-addons/items-woocommerce-pbfe

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_woo_pbfe', 100 );
/**
 * Items for Add-On:
 *   DT WooCommerce Page Builder for Elementor (Premium, by DawnThemes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_woo_pbfe( $admin_bar ) {

	$type = 'dtwcbe_woo_library';

	/** Plugin's Templates Content */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-dtwoopbfe',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'WooCommerce Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'WooCommerce Page Builder for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		/** All templates */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-dtwoopbfe-all',
				'parent' => 'ao-dtwoopbfe',
				'title'  => esc_attr__( 'All Shop Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Shop Templates', 'toolbar-extras' ),
				)
			)
		);

		/** Template types */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-dtwoopbfe-types',
				'parent' => 'ao-dtwoopbfe',
				'title'  => esc_attr__( 'Template Types', 'toolbar-extras' ),
				'href'   => FALSE,
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WooCommerce Shop Template Types', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-single',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'Single Product', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=product' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Single Product', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-archive',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'Product Archive', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=product-archive' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Product Archive', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-cart',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'Cart Page', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=cart-page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Cart Page', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-checkout',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'Checkout Page', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=checkout-page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Product Archive', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-thankyou',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'Thank You Page', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=thankyou' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Thank You Page', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-types-myaccount',
					'parent' => 'ao-dtwoopbfe-types',
					'title'  => esc_attr__( 'My Account Page', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&dtwcbe_woo_library_type=my-account' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'My Account Page', 'toolbar-extras' ),
					)
				)
			);

		/** New template */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-dtwoopbfe-new',
				'parent' => 'ao-dtwoopbfe',
				'title'  => esc_attr__( 'New Shop Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '#add_new' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Shop Template', 'toolbar-extras' ),
				)
			)
		);

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() && version_compare( 'BTC_PLUGIN_VERSION', '1.5.1', '>' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-dtwoopbfe-categories',
					'parent' => 'ao-dtwoopbfe',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
					)
				)
			);

		}  // end if

		/** Group: Resources for JetWooBuilder */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-dtwoopbfe-resources',
					'parent' => 'ao-dtwoopbfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

				ddw_tbex_resource_item(
					'documentation',
					'dtwoopbfe-docs',
					'group-dtwoopbfe-resources',
					'http://help.dawnthemes.com/woocommerce-builder-elementor/'
				);

				ddw_tbex_resource_item(
					'official-site',
					'dtwoopbfe-site',
					'group-dtwoopbfe-resources',
					'http://demo.dawnthemes.com/woocommerce-builder-elementor/'
				);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_new_content_dtwoopbfe', 80 );
/**
 * Items for "New Content" section: New WooCommerce Shop Template
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_dtwoopbfe( $admin_bar ) {

	$type = 'dtwcbe_woo_library';

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {
		return $admin_bar;
	}

	/** New template */
	$admin_bar->add_node(
		array(
			'id'     => 'new-' . $type,
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Shop Template', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '#add_new' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Shop Template', 'toolbar-extras' ) ),
			)
		)
	);

}  // end if
