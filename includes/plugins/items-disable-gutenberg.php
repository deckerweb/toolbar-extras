<?php

// includes/plugins/items-disable-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_disable_gutenberg', 10 );
/**
 * Site items for Plugin: Disable Gutenberg (free, by Jeff Starr)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_disable_gutenberg() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-disable-gutenberg',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Disable Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=disable-gutenberg' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Disable Block Editor (Gutenberg)', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-disable-gutenberg-settings',
				'parent' => 'tbex-disable-gutenberg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=disable-gutenberg' ) ),
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
					'id'     => 'group-disablegutenberg-resources',
					'parent' => 'tbex-disable-gutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'disablegutenberg-support',
				'group-disablegutenberg-resources',
				'https://wordpress.org/support/plugin/disable-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'disablegutenberg-translate',
				'group-disablegutenberg-resources',
				'https://translate.wordpress.org/projects/wp-plugins/disable-gutenberg'
			);

		}  // end if

}  // end function
