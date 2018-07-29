<?php

// includes/plugins/items-wpstaging

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpstaging', 10 );
/**
 * Items for Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_wpstaging() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpstaging',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'WP-Staging', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpstg_clone' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'WP-Staging', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpstaging-clone',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Create Staging Clone', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg_clone' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Create Staging Clone', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpstaging-settings',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpstaging-tools',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for WP-Staging */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wpstaging-resources',
					'parent' => 'wpstaging',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpstaging-support',
				'group-wpstaging-resources',
				'https://wordpress.org/support/plugin/wp-staging'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wpstaging-docs',
				'group-wpstaging-resources',
				'https://wp-staging.com/docs/install-wp-staging/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpstaging-translate',
				'group-wpstaging-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-staging'
			);

			ddw_tbex_resource_item(
				'github',
				'wpstaging-github',
				'group-wpstaging-resources',
				'https://github.com/rene-hermenau/wp-staging'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpstaging-site',
				'group-wpstaging-resources',
				'https://wp-staging.com/'
			);

		}  // end if

}  // end function
