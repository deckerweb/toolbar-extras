<?php

// includes/elementor-addons/items-jetblog

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetblog', 100 );
/**
 * Items for Add-On: JetBlog (Premium, by Zemez)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetblog() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** JetBlog Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-jetblog',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetBlog', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-blog-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetBlog', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetblog-settings',
				'parent' => 'ao-jetblog',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-blog-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetblog-posts',
				'parent' => 'ao-jetblog',
				'title'  => esc_attr__( 'Edit Blog Posts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Blog Posts', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for JetBlog */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetblog-resources',
					'parent' => 'ao-jetblog',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetblog-docs',
				'group-jetblog-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetblog'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetblog-facebook',
				'group-jetblog-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetblog-site',
				'group-jetblog-resources',
				'https://jetblog.zemez.io/'
			);

		}  // end if

}  // end function