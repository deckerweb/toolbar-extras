<?php

// includes/elementor-addons/items-maxster-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_maxster_addons', 100 );
/**
 * Items for Add-On: Widgets For Elementor (free, by maxster)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_maxster_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-maxsteraddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Maxster Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Maxster Addons', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-maxsteraddons-elements',
				'parent' => 'ao-maxsteraddons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wfe_elementor&filter=all' ) ),
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
					'id'     => 'group-maxsteraddons-resources',
					'parent' => 'ao-maxsteraddons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'maxsteraddons-support',
				'group-maxsteraddons-resources',
				'https://wordpress.org/support/plugin/widgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'maxsteraddons-translate',
				'group-maxsteraddons-resources',
				'https://translate.wordpress.org/projects/wp-plugins/widgets-for-elementor'
			);

		}  // end if

}  // end function
