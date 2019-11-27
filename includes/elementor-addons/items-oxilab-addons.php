<?php

// includes/elementor-addons/items-oxilab-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_oxilab_addons', 100 );
/**
 * Add-On Items from Plugin:
 *   Elementor Addons – Premium Elementor Addons with Templates & Blocks (free, by Oxilab/ biplob018)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_oxilab_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	$admin_bar->add_node(
		array(
			'id'     => 'oxilabaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elementor Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-extensions' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Elementor Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'oxilabaddons-elements',
				'parent' => 'oxilabaddons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sa-el-addons&rand=' . $rand . '#tabs-elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'oxilabaddons-extensions',
				'parent' => 'oxilabaddons',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sa-el-addons&rand=' . $rand . '#tabs-extention' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'oxilabaddons-modules',
				'parent' => 'oxilabaddons',
				'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sa-el-addons&rand=' . $rand . '#tabs-addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'oxilabaddons-cache',
				'parent' => 'oxilabaddons',
				'title'  => esc_attr__( 'Cache', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sa-el-addons&rand=' . $rand . '#tabs-cache' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cache', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'oxilabaddons-info',
				'parent' => 'oxilabaddons',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sa-el-addons&rand=' . $rand . '#tabs-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-oxilabaddons-resources',
				'parent' => 'oxilabaddons',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'oxilabaddons-support',
			'group-oxilabaddons-resources',
			'https://wordpress.org/support/plugin/sb-image-hover-effects/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'oxilabaddons-docs',
			'group-oxilabaddons-resources',
			'https://www.sa-elementor-addons.com/docs/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'oxilabaddons-translate',
			'group-oxilabaddons-resources',
			'https://translate.wordpress.org/projects/wp-plugins/sb-image-hover-effects/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'oxilabaddons-site',
			'group-oxilabaddons-resources',
			'https://www.sa-elementor-addons.com/'
		);

	}  // end if

}  // end function
