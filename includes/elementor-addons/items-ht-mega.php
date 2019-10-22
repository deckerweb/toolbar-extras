<?php

// includes/elementor-addons/items-ht-mega

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_htmega', 100 );
/**
 * Items for Add-On:
 *   HT Mega - Ultimate Addons for Elementor (free, by HT Plugins)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_htmega( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'ao-htmega-addons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'HT Mega', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=htmega_addons_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'HT Mega', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-htmega-addons-general',
				'parent' => 'ao-htmega-addons',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htmega_addons_options#htmega_general_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-htmega-addons-elements',
				'parent' => 'ao-htmega-addons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htmega_addons_options#htmega_element_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-htmega-addons-thirdparty',
				'parent' => 'ao-htmega-addons',
				'title'  => esc_attr__( 'Third Party', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htmega_addons_options#htmega_thirdparty_element_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Third Party', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-htmega-resources',
					'parent' => 'ao-htmega-addons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'htmega-support',
				'group-htmega-resources',
				'https://wordpress.org/support/plugin/ht-mega-for-elementor'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'htmega-kb',
				'group-htmega-resources',
				'https://premiumaddons.com/support/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'htmega-facebook',
				'group-htmega-resources',
				'https://www.facebook.com/groups/PremiumAddons/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'htmega-translate',
				'group-htmega-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ht-mega-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'htmega-site',
				'group-htmega-resources',
				'http://demo.wphash.com/htmega/'
			);

		}  // end if

}  // end function
