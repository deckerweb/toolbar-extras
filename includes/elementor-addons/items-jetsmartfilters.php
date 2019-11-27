<?php

// includes/elementor-addons/items-jetsmartfilters

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetsmartfilters', 100 );
/**
 * Items for Add-On: JetSmartFilters (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetsmartfilters( $admin_bar ) {

	$post_type = 'jet-smart-filters';

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetsmartfilters',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'JetSmartFilters', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetSmartFilters', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetsmartfilters-all',
				'parent' => 'ao-jetsmartfilters',
				'title'  => esc_attr__( 'All Filters', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Filters', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetsmartfilters-new',
				'parent' => 'ao-jetsmartfilters',
				'title'  => esc_attr__( 'New Filter', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Filter', 'toolbar-extras' ),
				)
			)
		);

		/** Filter categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetsmartfilters-categories',
					'parent' => 'ao-jetsmartfilters',
					'title'  => ddw_btc_string_template( 'filter' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'filter' ) ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetsmartfilters-settings',
				'parent' => 'ao-jetsmartfilters',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-smart-filters-settings' ) ),
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
					'id'     => 'group-jetsmartfilters-resources',
					'parent' => 'ao-jetsmartfilters',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetsmartfilters-docs',
				'group-jetsmartfilters-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetsmartfilters'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetsmartfilters-facebook',
				'group-jetsmartfilters-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jetsmartfilters-changelog',
				'group-jetsmartfilters-resources',
				'http://documentation.zemez.io/wordpress/index.php?project=jetsmartfilters&lang=en&section=jetsmartfilters-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetsmartfilters-site',
				'group-jetsmartfilters-resources',
				'https://jetsmartfilters.zemez.io/'
			);

		}  // end if

}  // end function


add_action( 'admin_menu', 'ddw_tbex_add_submenu_jetsmartfilters' );
/**
 * Add the appropriate admin menu - using the post type list table page as
 *   the callback.
 *
 * @since 1.4.7
 *
 * @uses add_submenu_page()
 */
function ddw_tbex_add_submenu_jetsmartfilters() {

    add_submenu_page(
    	'edit.php?post_type=jet-smart-filters',
        _x( 'JetSmartFilters Settings', 'Admin page title', 'toolbar-extras' ),
        _x( 'Settings', 'Admin menu label', 'toolbar-extras' ),
        'manage_options',
        esc_url( admin_url( 'admin.php?page=jet-smart-filters-settings' ) )
    );

}  // end function
