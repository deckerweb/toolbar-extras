<?php

// includes/plugins/items-dismiss-gutenberg-nag

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_dismiss_gutenberg_nag', 10 );
/**
 * Site items for Plugin: Dismiss Gutenberg Nag (free, by Luciano Croce)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_dismiss_gutenberg_nag() {
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-dismissgutenberg',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Dismiss Gutenberg Nag', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-writing.php#dismiss-gutenberg-nag_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Dismiss Gutenberg Nag', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'dismissgutenberg-settings',
				'parent' => 'tbex-dismissgutenberg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-writing.php#dismiss-gutenberg-nag_options' ) ),
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
					'id'     => 'group-dismissgutenberg-resources',
					'parent' => 'tbex-dismissgutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'dismissgutenberg-support',
				'group-dismissgutenberg-resources',
				'https://wordpress.org/support/plugin/gdismiss-gutenberg-nag/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'dismissgutenberg-translate',
				'group-dismissgutenberg-resources',
				'https://translate.wordpress.org/projects/wp-plugins/dismiss-gutenberg-nag/'
			);

			ddw_tbex_resource_item(
				'github',
				'dismissgutenberg-github',
				'group-dismissgutenberg-resources',
				'https://github.com/luciano-croce/dismiss-gutenberg-nag/'
			);

		}  // end if

}  // end function
