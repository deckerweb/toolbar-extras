<?php

// includes/block-editor-addons/items-ab-testing

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ab_testing_forwp', 150 );
/**
 * Add-On items for Plugin: A/B Testing for WordPress (free, by CleverNode)
 *
 * @since 1.4.2
 * @since 1.4.3 Added new item.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ab_testing_forwp( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'abtesting-forwp',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'A/B Testing', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ab-testing-for-wp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'A/B Testing', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'abtesting-forwp-all',
				'parent' => 'abtesting-forwp',
				'title'  => esc_attr__( 'All A/B Tests', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ab-testing-for-wp' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All A/B Tests', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'abtesting-forwp-new',
				'parent' => 'abtesting-forwp',
				'title'  => esc_attr__( 'New A/B Test', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=abt4wp-test' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New A/B Test', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'abtesting-forwp-usage',
				'parent' => 'abtesting-forwp',
				'title'  => esc_attr__( 'How to Use', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ab-testing-for-wp_howto' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'How to Use', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-abtestingfwp-resources',
					'parent' => 'abtesting-forwp',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'abtestingfwp-support',
				'group-abtestingfwp-resources',
				'https://wordpress.org/support/plugin/ab-testing-for-wp'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'abtestingfwp-translate',
				'group-abtestingfwp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ab-testing-for-wp'
			);

			ddw_tbex_resource_item(
				'github',
				'abtestingfwp-github',
				'group-abtestingfwp-resources',
				'https://github.com/Gaya/ab-testing-for-wp'
			);

			ddw_tbex_resource_item(
				'official-site',
				'abtestingfwp-site',
				'group-abtestingfwp-resources',
				'https://abtestingforwp.com/'
			);

		}  // end if

}  // end function
