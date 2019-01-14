<?php

// includes/plugins/items-gutenberg-ramp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_gutenberg_ramp', 10 );
/**
 * Site items for Plugin: Gutenberg Ramp (free, by Automattic, Inc.)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_gutenberg_ramp() {
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-gbramp',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Gutenberg Ramp', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-writing.php#ping_sites' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Gutenberg Ramp', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gbramp-settings',
				'parent' => 'tbex-gbramp',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-writing.php#ping_sites' ) ),
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
					'id'     => 'group-gbramp-resources',
					'parent' => 'tbex-gbramp',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gbramp-support',
				'group-gbramp-resources',
				'https://wordpress.org/support/plugin/gutenberg-ramp'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gbramp-support',
				'group-gbramp-resources',
				'https://github.com/Automattic/gutenberg-ramp/blob/master/README.md'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gbramp-translate',
				'group-gbramp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/gutenberg-ramp'
			);

			ddw_tbex_resource_item(
				'github',
				'gbramp-github',
				'group-gbramp-resources',
				'https://github.com/Automattic/gutenberg-ramp'
			);

		}  // end if

}  // end function
