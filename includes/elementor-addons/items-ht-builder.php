<?php

// includes/elementor-addons/items-ht-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_htbuilder', 100 );
/**
 * Add-On Items for these plugins:
 *   - HT Builder (free, by HasThemes)
 *   - HT Builder Pro (Premium, by HasThemes)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_htbuilder( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-htbuilder',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'HT Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=htbuilder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'HT Builder', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-htbuilder-template-builder',
				'parent' => 'tbex-htbuilder',
				'title'  => esc_attr__( 'Template Builder', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htbuilder#htbuilder_templatebuilder_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Builder', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-htbuilder-elements',
				'parent' => 'tbex-htbuilder',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htbuilder#htbuilder_element_tabs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-htbuilder-template-library',
				'parent' => 'tbex-htbuilder',
				'title'  => esc_attr__( 'Template Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=htbuilder#htbuilder_template_tabs' ) ),
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
				'id'     => 'group-htbuilder-resources',
				'parent' => 'tbex-htbuilder',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'htbuilder-support',
			'group-htbuilder-resources',
			'https://wordpress.org/support/plugin/ht-builder/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'htbuilder-translate',
			'group-htbuilder-resources',
			'https://translate.wordpress.org/projects/wp-plugins/ht-builder/'
		);

	}  // end if

}  // end function
