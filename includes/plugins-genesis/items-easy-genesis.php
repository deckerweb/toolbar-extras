<?php

// includes/plugins-genesis/items-easy-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_easy_genesis', 115 );
/**
 * Items for Add-Ons:
 *   - Easy Genesis (free, by Doug Yuen)
 *   - Easy Genesis - Pages Extension (free, by Doug Yuen)
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_easy_genesis( $admin_bar ) {

	/** For: Genesis Creative items */
	$admin_bar->add_node(
		array(
			'id'     => 'dy-easy-genesis',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Easy Genesis', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=egwp_easy_genesis' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Easy Genesis', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'dy-easy-genesis-settings',
				'parent' => 'dy-easy-genesis',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=egwp_easy_genesis' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Extension: Pages */
		if ( function_exists( 'egwp_activation_pages' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'dy-easy-genesis-pages',
					'parent' => 'dy-easy-genesis',
					'title'  => esc_attr__( 'Pages', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=egwp_easy_genesis#egwp_page_setting_section_nav' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Settings for Pages', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'dy-easy-genesis-import-export',
				'parent' => 'dy-easy-genesis',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=egwp_easy_genesis#egwp_import_export_setting_section_nav' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-easygenesis-resources',
					'parent' => 'dy-easy-genesis',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'easygenesis-support',
				'group-easygenesis-resources',
				'https://wordpress.org/support/plugin/genesis-simple-customizations'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'easygenesis-translate',
				'group-easygenesis-resources',
				'https://translate.wordpress.org/projects/wp-plugins/genesis-simple-customizations'
			);

			ddw_tbex_resource_item(
				'official-site',
				'easygenesis-site',
				'group-easygenesis-resources',
				'https://efficientwp.com/plugins/easy-genesis'
			);

		}  // end if

}  // end function
