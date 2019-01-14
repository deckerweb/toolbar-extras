<?php

// includes/plugins/items-duplicator

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_duplicator', 10 );
/**
 * Items for Plugin: Duplicator (free, by Snap Creek)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_duplicator() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'duplicator',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Duplicator', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=duplicator' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Duplicator', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicator-archives',
				'parent' => 'duplicator',
				'title'  => esc_attr__( 'All Archives', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=duplicator' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Archives', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicator-new',
				'parent' => 'duplicator',
				'title'  => esc_attr__( 'New Archive', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=duplicator&tab=new1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Archive', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicator-tools',
				'parent' => 'duplicator',
				'title'  => esc_attr__( 'Tools &amp; Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=duplicator-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools &amp; Logs', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicator-settings',
				'parent' => 'duplicator',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=duplicator-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Duplicator */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-duplicator-resources',
					'parent' => 'duplicator',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'duplicator-support',
				'group-duplicator-resources',
				'https://wordpress.org/support/duplicator'
			);

			ddw_tbex_resource_item(
				'documentation',
				'duplicator-docs',
				'group-duplicator-resources',
				'https://snapcreek.com/duplicator/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'duplicator-translate',
				'group-duplicator-resources',
				'https://translate.wordpress.org/projects/wp-plugins/duplicator'
			);

			ddw_tbex_resource_item(
				'official-site',
				'duplicator-site',
				'group-duplicator-resources',
				'https://snapcreek.com/duplicator/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_duplicator', 100 );
/**
 * Items for "New Content" section: New Duplicator Package Archive
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_duplicator() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	if ( ddw_tbex_display_items_dev_mode() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-duplicator-package',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Duplicator Archive', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=duplicator&tab=new1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Duplicator Archive', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function
