<?php

// includes/plugins/items-wp-color-picker-enhancement

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wp_color_picker_enhancement', 110 );
/**
 * Items for Add-On: WordPress Color Picker Enhancement (free, by P. Roy)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resources_color_wheel()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wp_color_picker_enhancement( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-wpcolorpicker',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'WP Color Picker Enhancement', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=d2l-wp-colorpicker' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WP Color Picker Enhancement', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpcolorpicker-edit',
				'parent' => 'ao-wpcolorpicker',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=d2l-wp-colorpicker' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				)
			)
		);

		/** Color Wheel Resources */
		ddw_tbex_resources_color_wheel( $admin_bar, 'wpcolorpicker', 'ao-wpcolorpicker' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpcolorpicker-resources',
					'parent' => 'ao-wpcolorpicker',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpcolorpicker-support',
				'group-wpcolorpicker-resources',
				'https://wordpress.org/support/plugin/d2l-wp-color-picker-enhancement'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpcolorpicker-translate',
				'group-wpcolorpicker-resources',
				'https://translate.wordpress.org/projects/wp-plugins/d2l-wp-color-picker-enhancement'
			);

		}  // end if

}  // end function
