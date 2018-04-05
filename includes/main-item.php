<?php

// includes/main-item

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_toolbar_main_item', ddw_tbex_main_item_priority() );
/**
 * Add main Toolbar item: when a supported Page Builder is active it gets hooked
 *   in, otherwise fallback to the Customizer.
 *   Note: Currently only Elementor is supported.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_is_pagebuilder_active()
 * @uses   ddw_tbex_id_main_item()
 * @uses   ddw_tbex_item_title_with_settings_icon()
 * @uses   ddw_tbex_get_default_pagebuilder()
 * @uses   ddw_tbex_get_pagebuilders()
 * @uses   ddw_tbex_string_main_item()
 * @uses   ddw_tbex_string_fallback_item()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_toolbar_main_item() {

	/** Get default Page Builder */
	$default_builder = ddw_tbex_get_default_pagebuilder();

	if ( ddw_tbex_is_pagebuilder_active() && ! empty( $default_builder ) ) {
		
		/** Get all registered Page Builders */
		$all_builders = (array) ddw_tbex_get_pagebuilders();

		/** Add main node for Page Builder context */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_main_item(),
				'title'  => ddw_tbex_item_title_with_settings_icon( ddw_tbex_string_main_item(), 'general', 'main_item_icon' ),
				'href'   => esc_url( $all_builders[ $default_builder ][ 'admin_url' ] ),	// admin_url( 'edit.php?post_type=elementor_library' ),
				'meta'   => array(
					'class'  => 'tbex-main',
					'target' => '',
					'title'  => ddw_tbex_string_main_item()
				)
			)
		);

	} else {

		/** Add main node for fallback context */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_main_item(),
				'title'  => ddw_tbex_item_title_with_settings_icon( ddw_tbex_string_fallback_item(), 'general', 'main_item_icon' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'class'  => 'tbex-main',
					'target' => '',
					'title'  => ddw_tbex_string_fallback_item()
				)
			)
		);

	}   // end if

	/** Action Hook: After Main Item */
	do_action( 'tbex_after_main_item' );

}  // end function