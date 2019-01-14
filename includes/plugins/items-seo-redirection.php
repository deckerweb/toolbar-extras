<?php

// includes/plugins-forms/items-seo-redirection

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_seo_redirection', 40 );
/**
 * Items for Plugin: SEO Redirection (free, by Fakhri Alsadi)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_seo_redirection() {

	/** For: Tools */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'seo-redirection',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr_x( 'SEO Redirection', 'A plugin name', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'SEO Redirection', 'A plugin name', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'seo-redirection-custom-redirects',
				'parent' => 'seo-redirection',
				'title'  => esc_attr__( 'Custom Redirects', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php&tab=cutom' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom Redirects', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'seo-redirection-post-redirects',
				'parent' => 'seo-redirection',
				'title'  => esc_attr__( 'Post Redirects', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php&tab=posts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Redirects', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'seo-redirection-history',
				'parent' => 'seo-redirection',
				'title'  => esc_attr__( 'History', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php&tab=history' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'History', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'seo-redirection-export-import',
				'parent' => 'seo-redirection',
				'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php&tab=export_import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'seo-redirection-options',
				'parent' => 'seo-redirection',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=seo-redirection.php&tab=goptions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-seoredirection-resources',
					'parent' => 'seo-redirection',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'seoredirection-support',
				'group-seoredirection-resources',
				'https://wordpress.org/support/plugin/seo-redirection'
			);

			ddw_tbex_resource_item(
				'documentation',
				'seoredirection-docs',
				'group-seoredirection-resources',
				'http://www.clogica.com/kb/topics/seo-redirection-premium'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'seoredirection-translate',
				'group-seoredirection-resources',
				'https://translate.wordpress.org/projects/wp-plugins/seo-redirection'
			);

		}  // end if

}  // end function
