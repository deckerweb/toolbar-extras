<?php

// includes/plugins/items-maxgalleria

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_maxgalleria', 15 );
/**
 * Site items for Plugin: MaxGalleria (free, by Max Foundry)
 *
 * @since 1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_maxgalleria() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'maxgalleria',
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'MaxGalleria', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=maxgallery' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'MaxGalleria', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'maxgalleria-all',
				'parent' => 'maxgalleria',
				'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=maxgallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'maxgalleria-new',
				'parent' => 'maxgalleria',
				'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=maxgallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' )
				)
			)
		);
			
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'maxgalleria-settings',
				'parent' => 'maxgalleria',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=maxgallery&page=maxgalleria-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'maxgalleria-info',
				'parent' => 'maxgalleria',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=maxgallery&page=maxgalleria-support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		/** Optional NextGen Importer */
		if ( class_exists( 'C_NextGEN_Bootstrap' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'maxgalleria-nggimport',
					'parent' => 'maxgalleria',
					'title'  => esc_attr__( 'NextGen Importer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=maxgallery&page=maxgalleria-nextgen-importer' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'NextGen Gallery Importer', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for MaxGalleria */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-maxgalleria-resources',
					'parent' => 'maxgalleria',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'maxgalleria-support',
				'group-maxgalleria-resources',
				'https://wordpress.org/support/plugin/maxgalleria'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'maxgalleria-translate',
				'group-maxgalleria-resources',
				'https://translate.wordpress.org/projects/wp-plugins/maxgalleria'
			);

			ddw_tbex_resource_item(
				'official-site',
				'maxgalleria-site',
				'group-maxgalleria-resources',
				'https://maxgalleria.com/'
			);

		}  // end if

}  // end function
