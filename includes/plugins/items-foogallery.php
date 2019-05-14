<?php

// includes/plugins/items-foogallery

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_foogallery', 15 );
/**
 * Site items for Plugin: FooGallery (free, by FooPlugins)
 *
 * @since 1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_foogallery() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'foogallery',
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'FooGallery', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=foogallery' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'FooGallery', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'foogallery-all',
				'parent' => 'foogallery',
				'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=foogallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'foogallery-new',
				'parent' => 'foogallery',
				'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=foogallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' )
				)
			)
		);
			
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'foogallery-settings',
				'parent' => 'foogallery',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=foogallery&page=foogallery-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'foogallery-extensions',
				'parent' => 'foogallery',
				'title'  => esc_attr__( 'Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=foogallery&page=foogallery-extensions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate/ Deactivate Extensions', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'foogallery-info',
				'parent' => 'foogallery',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=foogallery&page=foogallery-systeminfo' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for FooGallery */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-foogallery-resources',
					'parent' => 'foogallery',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'foogallery-support',
				'group-foogallery-resources',
				'https://wordpress.org/support/plugin/foogallery'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'foogallery-translate',
				'group-foogallery-resources',
				'https://translate.wordpress.org/projects/wp-plugins/foogallery'
			);

			ddw_tbex_resource_item(
				'official-site',
				'foogallery-site',
				'group-foogallery-resources',
				'https://foo.gallery.com/'
			);

		}  // end if

}  // end function
