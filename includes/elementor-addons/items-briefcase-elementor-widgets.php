<?php

// includes/elementor-addons/items-briefcase-elementor-widgets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_briefcase_elementor_widgets', 100 );
/**
 * Items for Add-On: Briefcase Elementor Widgets (Premium, by BriefcaseWP)
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_briefcase_elementor_widgets() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-briefcasewp',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Briefcase Widgets', 'toolbar-extras' ),
			'href'   => 'https://briefcasewp.com/your-account/',
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Briefcase Widgets', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-briefcasewp-templates',
				'parent' => 'ao-briefcasewp',
				'title'  => esc_attr__( 'Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Templates', 'toolbar-extras' )
				)
			)
		);

		if ( class_exists( 'WooCommerce' ) ) {

			$woo_products_title = sprintf(
				/* translator: %s - "WooCommerce" porducts */
				esc_attr__( '%s Products', 'toolbar-extras' ),
				__( 'WooCommerce', 'toolbar-extras' )
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-briefcasewp-woo-products',
					'parent' => 'ao-briefcasewp',
					'title'  => $woo_products_title,
					'href'   => esc_url( admin_url( 'edit.php?post_type=product' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => $woo_products_title
					)
				)
			);

		}  // end if

		if ( class_exists( 'Easy_Digital_Downloads' ) ) {

			$edd_products_title = sprintf(
				/* translator: %s - "Downloads" products */
				esc_attr__( '%s Products', 'toolbar-extras' ),
				__( 'Downloads', 'toolbar-extras' )
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-briefcasewp-edd-products',
					'parent' => 'ao-briefcasewp',
					'title'  => $edd_products_title,
					'href'   => esc_url( admin_url( 'edit.php?post_type=download' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => $edd_products_title
					)
				)
			);

		}  // end if

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-briefcasewp-resources',
					'parent' => 'ao-briefcasewp',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'briefcasewp-contact',
				'group-briefcasewp-resources',
				'https://briefcasewp.com/contact/'
			);

			ddw_tbex_resource_item(
				'tutorials',
				'briefcasewp-tutorials',
				'group-briefcasewp-resources',
				'https://briefcasewp.com/blog/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'briefcasewp-site',
				'group-briefcasewp-resources',
				'https://briefcasewp.com/'
			);

		}  // end if

}  // end function