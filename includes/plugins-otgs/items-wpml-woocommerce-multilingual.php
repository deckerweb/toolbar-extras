<?php

// OTGS: WPML WooCommerce Multilingual
// includes/plugins-otgs/items-wpml-cms-nav

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_woocommerce_multilingual', 20 );
/**
 * Items for plugin: WooCommerce Multilingual (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_string_wpml_suite()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_woocommerce_multilingual( $admin_bar ) {

	$string_wooml = esc_attr__( 'WooCommerce Multilingual', 'toolbar-extras' );

	$admin_bar->add_node(
		array(
			'id'     => 'wpml-suite-wooml',
			'parent' => 'group-wpml-wpelements',
			'title'  => $string_wooml,
			'href'   => esc_url( admin_url( 'admin.php?page=wpml-wcml' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_wpml_suite( [ 'addition' => __( 'Integration', 'toolbar-extras' ), 'suffix' => ': ' ] ) . $string_wooml,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpml-suite-wooml-products',
				'parent' => 'wpml-suite-wooml',
				'title'  => esc_attr__( 'Products', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpml-wcml' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $string_wooml . ': ' . esc_attr__( 'Products', 'toolbar-extras' ),
				)
			)
		);

		$wooml_tabs = array(
			'product_cat'            => __( 'Product Categories', 'toolbar-extras' ),
			'product_tag'            => __( 'Product Tags', 'toolbar-extras' ),
			'product-attributes'     => __( 'Attributes', 'toolbar-extras' ),
			'product_shipping_class' => __( 'Shipping Classes', 'toolbar-extras' ),
			'settings'               => __( 'Settngs', 'toolbar-extras' ),
			'multi-currency'         => __( 'Multi Currency', 'toolbar-extras' ),
			'slugs'                  => __( 'Store URLs', 'toolbar-extras' ),
			'status'                 => __( 'Status', 'toolbar-extras' ),
		);

		foreach ( $wooml_tabs as $wooml_tab => $wooml_tab_label ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpml-suite-wooml-' . $wooml_tab,
					'parent' => 'wpml-suite-wooml',
					'title'  => esc_attr( $wooml_tab_label ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpml-wcml&tab=' . $wooml_tab ) ),
					'meta'   => array(
						'target' => '',
						'title'  => $string_wooml . ': ' . esc_attr( $wooml_tab_label ),
					)
				)
			);

		}  // end foreach

}  // end function
