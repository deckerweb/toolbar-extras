<?php

// includes/elementor-addons/items-elementor-white-label-branding

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementor_white_label_branding', 100 );
/**
 * Items for Add-Ons: Elementor White Label Branding (free, by Ozan Canakli)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementor_white_label_branding( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-elewlbranding',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elementor White Label Branding', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=el-wl-branding' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Elementor White Label Branding', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elewlbranding-settings',
				'parent' => 'ao-elewlbranding',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=el-wl-branding' ) ),
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
					'id'     => 'group-elewlbranding-resources',
					'parent' => 'ao-elewlbranding',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'elewlbranding-support',
				'group-elewlbranding-resources',
				'https://wordpress.org/support/plugin/white-label-branding-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'elewlbranding-translate',
				'group-elewlbranding-resources',
				'https://translate.wordpress.org/projects/wp-plugins/white-label-branding-elementor'
			);

		}  // end if

}  // end function
