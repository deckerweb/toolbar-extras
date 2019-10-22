<?php

// includes/elementor-addons/items-powerpack-elements-lite

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_powerpack_lite', 100 );
/**
 * Items for Add-On: PowerPack Lite for Elementor (free, by IdeaBox Creations)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_powerpack_lite( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** PowerPack Lite Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-powerpack-lite',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'PowerPack Lite', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'PowerPack Lite', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-powerpack-lite-elements',
				'parent' => 'ao-powerpack-lite',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-powerpacklite-resources',
					'parent' => 'ao-powerpack-lite',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'powerpacklite-support',
				'group-powerpacklite-resources',
				'https://wordpress.org/support/plugin/powerpack-lite-for-elementor'
			);

			ddw_tbex_resource_item(
				'documentation',
				'powerpacklite-docs',
				'group-powerpacklite-resources',
				'https://powerpackelements.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'powerpacklite-translations',
				'group-powerpacklite-resources',
				'https://translate.wordpress.org/projects/wp-plugins/powerpack-lite-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'powerpacklite-site',
				'group-powerpacklite-resources',
				'https://powerpackelements.com/'
			);

		}  // end if

}  // end function
