<?php

// includes/plugins-genesis/items-genesis-widgetized-notfound

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_widgetized_notfound', 140 );
/**
 * Items for Add-On:
 *   Genesis Widgetized Not Found & 404 (free, by David Decker - DECKERWEB)
 *
 * @since 1.3.5
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_widgetized_notfound() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-widgetized-notfound',
			'parent' => 'group-genesisplugins-creative',
			'title'  => esc_attr__( 'Not Found &amp; 404 Page', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'widgets.php#gwnf-404-widget' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Not Found &amp; 404 Page', 'toolbar-extras' )
			)
		)
	);

		/** For: 404 Page */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-gwnf-404page',
				'parent' => 'genesis-widgetized-notfound'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-404page-live-preview',
					'parent' => 'group-gwnf-404page',
					'title'  => esc_attr__( 'Edit 404 Page Live Preview', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'sidebar-widgets-gwnf-404-widget', get_site_url() . '/404page-test-' . md5( mt_rand() ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Edit 404 Page Live Preview', 'toolbar-extras' )
					)
				)
			);
		
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-404page-widget-admin',
					'parent' => 'group-gwnf-404page',
					'title'  => esc_attr__( 'Edit 404 Page Widget Admin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'widgets.php#gwnf-404-widget' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit 404 Page Widget Admin', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-404page-live-test',
					'parent' => 'group-gwnf-404page',
					'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' ),
					'href'   => esc_url( get_site_url() . '/404page-test-' . md5( mt_rand() ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( '404 Live Test', 'toolbar-extras' )
					)
				)
			);

		/** For: Search Not Found Page */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-gwnf-search-notfound',
				'parent' => 'genesis-widgetized-notfound'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-search-notfound-live-preview',
					'parent' => 'group-gwnf-search-notfound',
					'title'  => esc_attr__( 'Edit Not Found Page Live Preview', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'sidebar-widgets-gwnf-notfound-widget', get_site_url() . '/?s=' . md5( mt_rand() ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Edit Not Found Page Live Preview', 'toolbar-extras' )
					)
				)
			);
		
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-search-notfound-widget-admin',
					'parent' => 'group-gwnf-search-notfound',
					'title'  => esc_attr__( 'Edit Not Found Page Widget Admin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'widgets.php#gwnf-notfound-widget' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit Not Found Page Widget Admin', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gwnf-search-notfound-live-test',
					'parent' => 'group-gwnf-search-notfound',
					'title'  => esc_attr__( 'Search Not Found Live Test', 'toolbar-extras' ),
					'href'   => esc_url( get_site_url() . '/?s=' . md5( mt_rand() ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Search Not Found Live Test', 'toolbar-extras' )
					)
				)
			);

		/** Group: Resources for Genesis Widgetized Not Found & 404 */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gwnf-resources',
					'parent' => 'genesis-widgetized-notfound',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gwnf-support',
				'group-gwnf-resources',
				'https://wordpress.org/support/plugin/genesis-widgetized-notfound'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'gwnf-facebook',
				'group-gwnf-resources',
				'https://www.facebook.com/groups/deckerweb.wordpress.plugins/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gwnf-translate',
				'group-gwnf-resources',
				'https://translate.wordpress.org/projects/wp-plugins/genesis-widgetized-notfound'
			);

			ddw_tbex_resource_item(
				'github',
				'gwnf-github',
				'group-gwnf-resources',
				'https://github.com/deckerweb/genesis-widgetized-notfound/'
			);

		}  // end if

}  // end function
