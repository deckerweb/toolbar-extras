<?php

// includes/elementor-addons/items-woolentor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_woolentor', 100 );
/**
 * Add-On Items for these plugins:
 *   - WooLentor (free, by HasThemes/ HT Plugins)
 *   - WooLentor Pro (Premium, by HasThemes/ HT Plugins)
 *
 * @since 1.4.3
 * @since 1.4.5 New items & resources; tweaks & improvements.
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_woolentor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'woolentor',
			'parent' => 'tbex-addons',
			'title'  => 'WooLentor',
			'href'   => esc_url( admin_url( 'admin.php?page=woolentor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'WooLentor',
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'woolentor-elements',
				'parent' => 'woolentor',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=woolentor#woolentor_elements_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'woolentor-woocommerce-template',
				'parent' => 'woolentor',
				'title'  => esc_attr__( 'WooCommerce Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=woolentor#woolentor_woo_template_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WooCommerce Template', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'woolentor-theme-library',
				'parent' => 'woolentor',
				'title'  => esc_attr__( 'Theme Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=woolentor#woolentor_themes_library_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Theme Library', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'woolentor-template-library',
				'parent' => 'woolentor',
				'title'  => esc_attr__( 'Template Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=woolentor_templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Library', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-woolentor-resources',
				'parent' => 'woolentor',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'woolentor-support',
			'group-woolentor-resources',
			'https://wordpress.org/support/plugin/woolentor-addons/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'woolentor-docs',
			'group-woolentor-resources',
			'https://demo.hasthemes.com/doc/woolentor/index.html'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'woolentor-translate',
			'group-woolentor-resources',
			'https://translate.wordpress.org/projects/wp-plugins/woolentor-addons/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'woolentor-site',
			'group-woolentor-resources',
			'http://demo.wphash.com/woolentor/'
		);

	}  // end if

}  // end function
