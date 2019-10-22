<?php

// includes/plugins/items-iris-color-picker-enhancer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_iris_color_picker_enhancer', 110 );
/**
 * Items for Add-On: Iris Color Picker Enhancer (free, by Maeve Lander)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resources_color_wheel()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_iris_color_picker_enhancer( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-irisenhancer',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Iris Color Picker Enhancer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=iris-color-picker-enhancer' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Iris Color Picker Enhancer', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-irisenhancer-edit',
				'parent' => 'ao-irisenhancer',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=iris-color-picker-enhancer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				)
			)
		);

		/** Color Wheel Resources */
		ddw_tbex_resources_color_wheel( $admin_bar, 'irisenhancer', 'ao-irisenhancer' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-irisenhancer-resources',
					'parent' => 'ao-irisenhancer',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'irisenhancer-support',
				'group-irisenhancer-resources',
				'https://wordpress.org/support/plugin/iris-color-picker-enhancer'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'irisenhancer-translate',
				'group-irisenhancer-resources',
				'https://translate.wordpress.org/projects/wp-plugins/iris-color-picker-enhancer'
			);

			ddw_tbex_resource_item(
				'github',
				'irisenhancer-github',
				'group-irisenhancer-resources',
				'https://github.com/maevelander/iris-color-picker-enhancer'
			);

		}  // end if

}  // end function
