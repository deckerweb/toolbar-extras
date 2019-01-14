<?php

// includes/plugins/items-custom-importer-exporter

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_custom_importer_exporter', 10 );
/**
 * Items for Plugin: Custom Importer & Exporter (free, by Protech.Inc)
 *
 * @since 1.3.9
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_custom_importer_exporter() {

	/** Plugin's settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'custom-export-import',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Custom Export &amp; Import', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=term_io' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom Export &amp; Import', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'custom-export-import-terms',
				'parent' => 'custom-export-import',
				'title'  => esc_attr__( 'Taxonomy Terms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=term_io' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Taxonomy Terms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'custom-export-import-post-types',
				'parent' => 'custom-export-import',
				'title'  => esc_attr__( 'Post Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=post_type_io' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Types', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-custom-exportimport-resources',
					'parent' => 'custom-export-import',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'custom-exportimport-support',
				'group-custom-exportimport-resources',
				'https://wordpress.org/support/plugin/custom-importer-exporter'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'custom-exportimport-translations',
				'group-custom-exportimport-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-importer-exporter'
			);

		}  // end if

}  // end function
