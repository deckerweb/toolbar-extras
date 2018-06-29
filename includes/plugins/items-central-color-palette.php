<?php

// includes/plugins/items-central-color-palette

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_central_color_palette', 110 );
/**
 * Items for Add-On: Central Color Palette
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_central_color_palette() {

	/** Central Color Palette Palettes */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-colorpalette',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Central Color Palette', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=kt_tinymce_color_grid' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Central Color Palette', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-colorpalette-edit',
				'parent' => 'ao-colorpalette',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=kt_tinymce_color_grid' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Central Color Palette */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-colorpalette-resources',
					'parent' => 'ao-colorpalette',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'colorpalette-support',
				'group-colorpalette-resources',
				'https://wordpress.org/support/plugin/kt-tinymce-color-grid'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'colorpalette-translate',
				'group-colorpalette-resources',
				'https://translate.wordpress.org/projects/wp-plugins/kt-tinymce-color-grid'
			);

			ddw_tbex_resource_item(
				'github',
				'colorpalette-github',
				'group-colorpalette-resources',
				'https://github.com/kungtiger/central-color-palette'
			);

		}  // end if

}  // end function