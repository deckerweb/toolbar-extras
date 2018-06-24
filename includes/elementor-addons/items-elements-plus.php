<?php

// includes/elementor-addons/items-elements-plus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elements_plus', 100 );
/**
 * Items for Add-On: Elements Plus! (free, by The CSSIgniter Team)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_elements_plus() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-elementsplus',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elements Plus!', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elements_plus' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Elements Plus!', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-elementsplus-settings',
				'parent' => 'ao-elementsplus',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elements_plus' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-elementsplus-resources',
					'parent' => 'ao-elementsplus',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'elementsplus-support',
				'group-elementsplus-resources',
				'https://wordpress.org/support/plugin/elements-plus'
			);

			ddw_tbex_resource_item(
				'documentation',
				'elementsplus-docs',
				'group-elementsplus-resources',
				'https://www.cssigniter.com/docs/elements-plus/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'elementsplus-translate',
				'group-elementsplus-resources',
				'https://translate.wordpress.org/projects/wp-plugins/elements-plus'
			);

			ddw_tbex_resource_item(
				'official-site',
				'elementsplus-site',
				'group-elementsplus-resources',
				'https://www.cssigniter.com/plugins/elements-plus/'
			);

		}  // end if

}  // end function