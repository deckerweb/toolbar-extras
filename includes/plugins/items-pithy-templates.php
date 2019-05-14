<?php

// includes/plugins/items-pithy-templates

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_pithy_templates', 100 );
/**
 * Add-On Items from Plugin: Block Templates by PithyWP (free, by PithyWP)
 *   (Formerly known as: Pithy Templates (free, by Pithy WP))
 *
 * @since 1.4.2
 * @since 1.4.3 Tweaks to cover renaming of the plugin.
 *
 * @uses ddw_tbex_item_title_with_settings_icon()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_pithy_templates( $admin_bar ) {

	/** Currently the templates are only for Elementor, so check for it */
	if ( ! ddw_tbex_is_elementor_active() ) {
		return;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'pithywp-templates',
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( esc_attr__( 'Pithy Templates', 'toolbar-extras' ), 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'themes.php?page=pithywp-templates' ) ),
			'meta'   => array(
				'class'  => 'tbex-import-templates',
				'target' => '',
				'title'  => esc_attr__( 'Pithy Templates', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'pithywp-templates-import',
				'parent' => 'pithywp-templates',
				'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=pithywp-templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-pithywp-resources',
				'parent' => 'pithywp-templates',
				'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'pithywp-support',
			'group-pithywp-resources',
			'https://wordpress.org/support/plugin/pithywp-templates'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'pithywp-translate',
			'group-pithywp-resources',
			'https://translate.wordpress.org/projects/wp-plugins/pithywp-templates'
		);

	}  // end if

}  // end function
