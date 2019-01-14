<?php

// includes/block-editor-addons/items-caxton

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_caxton', 10 );
/**
 * Site items for Plugin: Caxton (free, by PootlePress)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_caxton() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-caxton',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'Caxton',
			'href'   => esc_url( admin_url( 'admin.php?page=caxton' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'Caxton' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'caxton-plugin-info',
				'parent' => 'tbex-caxton',
				'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=caxton' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-caxton-resources',
					'parent' => 'tbex-caxton',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'caxton-support',
				'group-caxton-resources',
				'https://wordpress.org/support/plugin/caxton'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'caxton-contact',
				'group-caxton-resources',
				esc_url( admin_url( 'admin.php?page=caxton-contact' ) )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'caxton-translate',
				'group-caxton-resources',
				'https://translate.wordpress.org/projects/wp-plugins/caxton'
			);

			ddw_tbex_resource_item(
				'github',
				'caxton-github',
				'group-caxton-resources',
				'https://github.com/pootlepress/caxton'
			);

		}  // end if

}  // end function
