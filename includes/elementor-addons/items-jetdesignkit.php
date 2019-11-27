<?php

// includes/elementor-addons/items-jetdesignkit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetdesignkit', 100 );
/**
 * Items for Add-On:
 *   JetDesignKit for Elementor (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetdesignkit( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetdesignkit',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetDesignKit', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-design-kit' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetDesignKit', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetdesignkit-settings',
				'parent' => 'ao-jetdesignkit',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-design-kit' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetdesignkit-resources',
					'parent' => 'ao-jetdesignkit',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetdesignkit-docs',
				'group-jetdesignkit-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetdesignkit'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetdesignkit-facebook',
				'group-jetdesignkit-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetdesignkit-site',
				'group-jetdesignkit-resources',
				'https://jetdesignkit.zemez.io/'
			);

		}  // end if

}  // end function


add_filter( 'tbex_filter_is_update_addon', '__return_empty_string' );

add_action( 'admin_bar_menu', 'ddw_tbex_site_items_jetdesignkit_updates', 30 );
/**
 * Items for Site Group: JetDesignKit Updates/ Sync
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_jetdesignkit_updates( $admin_bar ) {

	/** Group: JetDesignKit Update Checks */
	$admin_bar->add_group(
		array(
			'id'     => 'group-jetdesignkit-updates',
			'parent' => 'update-check',
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'jetdesignkit-sync-library',
				'parent' => 'group-jetdesignkit-updates',
				'title'  => esc_attr__( 'Sync DesignKit Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-design-kit' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Synchronize JetDesignKit Templates Library', 'toolbar-extras' ),
				)
			)
		);

}  // end function
