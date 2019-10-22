<?php

// includes/plugins/items-simple-links

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_simple_links', 15 );
/**
 * Items for Add-On: Simple Links (free, by Mat Lipe)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_simple_links( $admin_bar ) {

	$type = 'simple_link';

	/** For: Manage Content - Sub item */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-simplelinks',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Links', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Links', 'toolbar-extras' ),
			)
		)
	);

	/** For: Site Group - Manage Content Group */
	$admin_bar->add_node(
		array(
			'id'     => 'ml-simplelinks',
			'parent' => 'tbex-sitegroup-manage-content',	// below 'Media Library' item
			'title'  => esc_attr__( 'Simple Links', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Simple Links', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ml-simplelinks-all',
				'parent' => 'ml-simplelinks',
				'title'  => esc_attr__( 'All Links', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=mobile-menu-options&tab=header' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Links', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ml-simplelinks-new',
				'parent' => 'ml-simplelinks',
				'title'  => esc_attr__( 'New Link', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Link', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ml-simplelinks-categories',
				'parent' => 'ml-simplelinks',
				'title'  => esc_attr__( 'Link Categories', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=simple_link_category&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Link Categories', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ml-simplelinks-ordering',
				'parent' => 'ml-simplelinks',
				'title'  => esc_attr__( 'Link Ordering', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=simple-link-ordering' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Link Ordering', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ml-simplelinks-settings',
				'parent' => 'ml-simplelinks',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=simple-link-settings' ) ),
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
					'id'     => 'group-simplelinks-resources',
					'parent' => 'ml-simplelinks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ml-simplelinks-support',
				'group-simplelinks-resources',
				'https://wordpress.org/support/plugin/simple-links'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ml-simplelinks-translate',
				'group-simplelinks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/simple-links'
			);

			ddw_tbex_resource_item(
				'github',
				'ml-simplelinks-github',
				'group-simplelinks-resources',
				'https://github.com/lipemat/simple-links'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ml-simplelinks-site',
				'group-simplelinks-resources',
				'https://matlipe.com/product/simple-links-pro/'
			);

		}  // end if

}  // end function
