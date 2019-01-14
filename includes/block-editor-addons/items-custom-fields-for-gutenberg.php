<?php

// includes/block-editor-addons/items-custom-fields-for-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_custom_fields_for_gutenberg', 10 );
/**
 * Site items for Plugin: Custom Fields for Gutenberg (free, by Jeff Starr)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_custom_fields_for_gutenberg() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customfields-gutenberg',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Custom Fields for Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=g7g-cfg' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Custom Fields for Block Editor (Gutenberg)', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'customfields-gutenberg-settings',
				'parent' => 'customfields-gutenberg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=g7g-cfg' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-cffgb-resources',
					'parent' => 'customfields-gutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cffgb-support',
				'group-cffgb-resources',
				'https://wordpress.org/support/plugin/custom-fields-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cffgb-translate',
				'group-cffgb-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-fields-for-gutenberg'
			);

		}  // end if

}  // end function
