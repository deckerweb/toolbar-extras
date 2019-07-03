<?php

// includes/plugins/items-custom-field-suite

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_custom_field_suite', 15 );
/**
 * Items for plugin: Custom Field Suite (free, by Matt Gibbs)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_custom_field_suite( $admin_bar ) {

	$type = 'cfs';

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'custom-field-suite',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Custom Field Suite', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Custom Field Suite (CFS) - Field Groups', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'custom-field-suite-all',
				'parent' => 'custom-field-suite',
				'title'  => esc_attr__( 'All Field Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Field Groups', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'custom-field-suite-new',
				'parent' => 'custom-field-suite',
				'title'  => esc_attr__( 'New Field Group', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Field Group', 'toolbar-extras' ),
				)
			)
		);

		/** Field categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'custom-field-suite-categories',
					'parent' => 'custom-field-suite',
					'title'  => ddw_btc_string_template( 'field' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'field' ) ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'custom-field-suite-tools',
				'parent' => 'custom-field-suite',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=cfs-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools: Export &amp; Import', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-cfsplugin-resources',
					'parent' => 'custom-field-suite',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'cfsplugin-docs',
				'group-cfsplugin-resources',
				'http://customfieldsuite.com/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cfsplugin-support',
				'group-cfsplugin-resources',
				'https://wordpress.org/support/plugin/custom-field-suite'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'cfsplugin-translate',
				'group-cfsplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/custom-field-suite'
			);

			ddw_tbex_resource_item(
				'github',
				'cfsplugin-github',
				'group-cfsplugin-resources',
				'https://github.com/mgibbs189/custom-field-suite'
			);

		}  // end if

}  // end function
