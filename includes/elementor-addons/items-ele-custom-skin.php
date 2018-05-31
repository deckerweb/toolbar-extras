<?php

// includes/elementor-addons/items-ele-custom-skin

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}

add_filter( 'tbex_filter_elementor_template_types', 'ddw_tbex_add_elementor_template_type_ecsloop' );
/**
 * Add new Elementor Template type 'loop' for supported plugin "Elementor Custom Skin"
 *
 * @since  1.1.0
 *
 * @return array Filtered, enhanced array of template types.
 */
function ddw_tbex_add_elementor_template_type_ecsloop( array $template_types ) {
	
	$template_types[] = 'loop';

	return $template_types;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ele_custom_skin', 200 );
/**
 * Items for Add-On: Elementor Custom Skin (free, by Liviu Duda)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_string_elementor_template_with_builder()
 * @uses   ddw_tbex_string_elementor_template_create_with_builder()
 * @uses   ddw_tbex_get_elementor_template_add_new_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_ele_custom_skin() {

	/** Display only for Elementor 2.0+ */
	if ( ! ddw_tbex_is_elementor_version( 'pro', '2.0.0-beta1', '>=' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-ecsloops',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Loops', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=loop' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Loop Sections', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'et-build-template-ecsloop',
			'parent' => 'elementor-library-new-builder',
			'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Loop', 'Elementor Template type', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_get_elementor_template_add_new_url( 'loop' ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Loop', 'Elementor Template type', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_ele_custom_skin_new_content', 140 );
/**
 * Add Elementor Custom Skin template types with Page Builder to the "New Content" group.
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_string_elementor_template_with_builder()
 * @uses   ddw_tbex_string_elementor_template_create_with_builder()
 * @uses   ddw_tbex_get_elementor_template_add_new_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_ele_custom_skin_new_content() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'et-ecsloop-with-builder',
				'parent' => 'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Loop', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'loop' ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Loop', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function