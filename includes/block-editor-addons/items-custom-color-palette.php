<?php

// includes/block-editor-addons/items-custom-color-palette

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_color_palette', 110 );
/**
 * Items for Add-On: Custom Color Palette for Gutenberg (free, by ThemeZee)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_resources_color_wheel()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_custom_color_palette( $admin_bar ) {

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-customcolorpalette',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Custom Color Palette', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'tzccp_options_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Custom Color Palette', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-customcolorpalette-colors-define',
				'parent' => 'ao-customcolorpalette',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'tzccp_options_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-customcolorpalette-colors-main',
				'parent' => 'ao-customcolorpalette',
				'title'  => '&rarr; ' . esc_attr__( 'Main Colors', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'tzccp_main_colors_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Main Colors', 'toolbar-extras' ) ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-customcolorpalette-colors-grayscale',
				'parent' => 'ao-customcolorpalette',
				'title'  => '&rarr; ' . esc_attr__( 'Grayscale Colors', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'tzccp_grayscale_colors_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Grayscale Colors', 'toolbar-extras' ) ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-customcolorpalette-colors-primary',
				'parent' => 'ao-customcolorpalette',
				'title'  => '&rarr; ' . esc_attr__( 'Primary Colors', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'tzccp_primary_colors_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Primary Colors', 'toolbar-extras' ) ),
				)
			)
		);

		/** Color Wheel Resources */
		ddw_tbex_resources_color_wheel( $admin_bar, 'customcolorpalette', 'ao-customcolorpalette' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-customcolorpalette-resources',
					'parent' => 'ao-customcolorpalette',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'customcolorpalette-support',
				'group-customcolorpalette-resources',
				'https://wordpress.org/support/plugin/custom-color-palette'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'customcolorpalette-translate',
				'group-customcolorpalette-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-color-palette'
			);

			ddw_tbex_resource_item(
				'official-site',
				'customcolorpalette-site',
				'group-customcolorpalette-resources',
				'https://themezee.com/plugins/custom-color-palette/'
			);

		}  // end if

}  // end function
