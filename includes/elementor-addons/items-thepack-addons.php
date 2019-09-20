<?php

// includes/elementor-addons/items-thepack-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_thepack_addons', 100 );
/**
 * Items for Add-On:
 *   The Pack Addons (Premium, by XLDevelopment/ Web Angon/ Ashraf)
 *
 * @since 1.4.7
 *
 * @see ddw_tbex_aoitems_thepack_addons_portfolio_cpt()
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_thepack_addons( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-thepack',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'The Pack Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=tb_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'The Pack Addons', 'toolbar-extras' ),
			)
		)
	);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-thepack-settings',
				'parent' => 'ao-thepack',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=tb_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Demo Imoorter */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-thepack-demo-import',
				'parent' => 'ao-thepack',
				'title'  => esc_attr__( 'Demo Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=thepack_demo_import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Demo Import', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-thepackaddons-resources',
					'parent' => 'ao-thepack',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'thepackaddons-support-contact',
				'group-thepackaddons-resources',
				'https://codecanyon.net/item/the-pack-elementor-page-builder-addon/22271382/support'
			);

			ddw_tbex_resource_item(
				'documentation',
				'thepackaddons-docs',
				'group-thepackaddons-resources',
				'http://doc.webangon.com/thepack/doc/configuration/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'thepackaddons-site',
				'group-thepackaddons-resources',
				'https://codecanyon.net/item/the-pack-elementor-page-builder-addon/22271382'
			);

		}  // end if

}  // end function


add_action( 'init', 'ddw_tbex_aoitems_thepack_addons_portfolio_cpt', 100 );
/**
 * Portfolio CPT items (generic post type) for The Pack Addons.
 *
 * @since 1.4.7
 *
 * @uses \DDW\TBEX\Items_CPT_Generic()
 */
function ddw_tbex_aoitems_thepack_addons_portfolio_cpt() {

	/** Portfolio CPT (Generic) */
	$thepack_items_cpt_portfolio = new \DDW\TBEX\Items_CPT_Generic();
	$thepack_items_cpt_portfolio->init( 'portfolio', '', 10, 'ao-thepack', 'thepack' );

}  // end function
