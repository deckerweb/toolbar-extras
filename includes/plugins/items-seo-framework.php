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
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_the_seo_framework( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'theseoframework',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'The SEO Framework', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=theseoframework-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'The SEO Framework', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'theseoframework-settings',
				'parent' => 'theseoframework',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=theseoframework-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Extension Manager */
		if ( defined( 'TSF_EXTENSION_MANAGER_VERSION' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'theseoframework-extensions',
					'parent' => 'theseoframework',
					'title'  => esc_attr__( 'Extension Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=theseoframework-extensions' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Extension Manager', 'toolbar-extras' ),
					)
				)
			);

		} else {

			$admin_bar->add_node(
				array(
					'id'     => 'theseoframework-get-manager',
					'parent' => 'theseoframework',
					'title'  => esc_attr__( 'Get free Extension Manager', 'toolbar-extras' ),
					'href'   => 'https://theseoframework.com/extension-manager/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Get the free Extension Manager for The SEO Framework', 'toolbar-extras' ),
					)
				)
			);

		}  // end if
		
		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-theseoframework-resources',
					'parent' => 'theseoframework',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
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
