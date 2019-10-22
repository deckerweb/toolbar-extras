<?php

// includes/plugins/items-wp-show-posts

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wpshowposts', 105 );
/**
 * Items for Add-On: WP Show Posts (free, by Tom Usborne)
 *
 * @since 1.1.0
 * @since 1.3.5 Added BTC plugin support.
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wpshowposts( $admin_bar ) {

	$type = 'wp_show_posts';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-wpsp',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'WP Show Posts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WP Show Posts', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpsp-all',
				'parent' => 'ao-wpsp',
				'title'  => esc_attr__( 'All Lists', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Lists', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpsp-new',
				'parent' => 'ao-wpsp',
				'title'  => esc_attr__( 'New List', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New List', 'toolbar-extras' ),
				)
			)
		);

		/** Listing categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-wpsp-categories',
					'parent' => 'ao-wpsp',
					'title'  => ddw_btc_string_template( 'listing' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'listing' ) ),
					)
				)
			);

		}  // end if

		if ( defined( 'WPSP_PRO_VERSION' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-wpsp-license',
					'parent' => 'ao-wpsp',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=wpsp_settings_page' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Resources for WP Show Posts */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpsp-resources',
					'parent' => 'ao-wpsp',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			if ( defined( 'WPSP_PRO_VERSION' ) ) {
				
				ddw_tbex_resource_item(
					'support-contact',
					'wpsp-contact',
					'group-wpsp-resources',
					'https://wpshowposts.com/support/area/pro-support/'
				);

			} else {

				ddw_tbex_resource_item(
					'support-forum',
					'wpsp-support',
					'group-wpsp-resources',
					'https://wordpress.org/support/plugin/wp-show-posts'
				);

			}  // end if

			ddw_tbex_resource_item(
				'documentation',
				'wpsp-docs',
				'group-wpsp-resources',
				'https://wpshowposts.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpsp-translate',
				'group-wpsp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-show-posts'
			);

			ddw_tbex_resource_item(
				'github',
				'wpsp-github',
				'group-wpsp-resources',
				'https://github.com/tomusborne/wp-show-posts'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpsp-site',
				'group-wpsp-resources',
				'https://wpshowposts.com/'
			);

		}  // end if

}  // end function
