<?php

// includes/plugins/items-custom-swatches-iris

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_swatches_iris', 110 );
/**
 * Items for Add-On: Custom Swatches for Iris Color Picker (free, by Iceberg Web Design)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resources_color_wheel()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_custom_swatches_iris( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-csfiriscp',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Custom Swatches Color Picker', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=iceberg_iris_color' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Custom Swatches for Iris Color Picker', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-csfiriscp-edit',
				'parent' => 'ao-csfiriscp',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=iceberg_iris_color' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				)
			)
		);

		/** Color Wheel Resources */
		ddw_tbex_resources_color_wheel($admin_bar, 'csfiriscp', 'ao-csfiriscp' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-csfiriscp-resources',
					'parent' => 'ao-csfiriscp',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'csfiriscp-support',
				'group-csfiriscp-resources',
				'https://wordpress.org/support/plugin/custom-swatches-for-iris-color-picker'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'csfiriscp-translate',
				'group-csfiriscp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-swatches-for-iris-color-picker'
			);

		}  // end if

}  // end function
