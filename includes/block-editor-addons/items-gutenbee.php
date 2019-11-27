<?php

// includes/block-editor-addons/items-gutenbee

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_gutenbee', 10 );
/**
 * Site items for Plugin: GutenBee (free, by The CSSIgniter Team)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_gutenbee( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-gutenbee',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => 'GutenBee',
			'href'   => esc_url( admin_url( 'options-general.php?page=gutenbee' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( 'GutenBee' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'gutenbee-options',
				'parent' => 'tbex-gutenbee',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=gutenbee' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-gutenbee-resources',
					'parent' => 'tbex-gutenbee',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gutenbee-support',
				'group-gutenbee-resources',
				'https://wordpress.org/support/plugin/gutenbee'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gutenbee-docs',
				'group-gutenbee-resources',
				'https://www.cssigniter.com/docs/gutenbee/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gutenbee-translate',
				'group-gutenbee-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gutenbee'
			);

			ddw_tbex_resource_item(
				'official-site',
				'gutenbee-site',
				'group-gutenbee-resources',
				'https://www.cssigniter.com/gutenbee/'
			);

		}  // end if

}  // end function
