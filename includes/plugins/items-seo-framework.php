<?php

// dev-mode
// includes/plugins/items-seo-framework

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_the_seo_framework', 100 );
/**
 * Items for Plugin: The SEO Framework (free, by Sybre Waaijer)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_the_seo_framework() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theseoframework',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'The SEO Framework', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=theseoframework-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'The SEO Framework', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theseoframework-settings',
				'parent' => 'theseoframework',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=theseoframework-settings' ) ),
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
					'id'     => 'group-theseoframework-resources',
					'parent' => 'theseoframework',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'theseoframework-support',
				'group-theseoframework-resources',
				'https://wordpress.org/support/plugin/autodescription'
			);

			ddw_tbex_resource_item(
				'documentation',
				'theseoframework-kb-docs',
				'group-theseoframework-resources',
				'https://theseoframework.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'theseoframework-translate',
				'group-theseoframework-resources',
				'https://translate.wordpress.org/projects/wp-plugins/autodescription'
			);

			ddw_tbex_resource_item(
				'github',
				'theseoframework-github',
				'group-theseoframework-resources',
				'https://github.com/sybrew/the-seo-framework'
			);

			ddw_tbex_resource_item(
				'official-site',
				'theseoframework-site',
				'group-theseoframework-resources',
				'https://theseoframework.com/'
			);

		}  // end if

}  // end function
