<?php

// includes/elementor-addons/items-flexible-elementor-panel

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_flexible_elementor_panel', 100 );
/**
 * Items for Add-On: Flexible Elementor Panel (free, by Alex Shram/ Flexible-Elementor-Panel.com)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_flexible_elementor_panel( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-flexiblepanel',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Flexible Elementor Panel', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=fep-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Flexible Elementor Panel', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-flexiblepanel-settings-help',
				'parent' => 'ao-flexiblepanel',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fep-options#fep_how_to_configure' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview - Get Help', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-flexiblepanel-settings-reset',
				'parent' => 'ao-flexiblepanel',
				'title'  => esc_attr__( 'Reset Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fep-options#fep_divers' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Reset Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-flexiblepanel-settings-info',
				'parent' => 'ao-flexiblepanel',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fep-options#fep_informations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-flexiblepanel-resources',
					'parent' => 'ao-flexiblepanel',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'flexiblepanel-docs',
				'group-flexiblepanel-resources',
				'https://wordpress.org/support/plugin/flexible-elementor-panel/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'flexiblepanel-translations',
				'group-flexiblepanel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/flexible-elementor-panel/'
			);

		}  // end if

}  // end function
