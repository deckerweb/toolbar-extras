<?php

// includes/plugins/items-catch-import-export

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_customize_catch_import_export', 999 );
/**
 * Customizer items for Add-On: Catch Import Export (free, by Catch Plugins)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_customize_catch_import_export( $admin_bar ) {

	/** Theme Creative Group */
	$admin_bar->add_node(
		array(
			'id'     => 'aocmz-catch-importexport',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'cie-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' ),
			)
		)
	);

	/** Frontend: Customizer sub item */
	$admin_bar->add_node(
		array(
			'id'     => 'customize-catch-importexport',
			'parent' => 'customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Export &amp; Import', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'cie-section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_catch_import_export', 110 );
/**
 * Items for Add-On: Catch Import Export (free, by Catch Plugins)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_catch_import_export( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-catch-importexport',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Catch Import Export', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=catch-import-export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Catch Import Export', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-catch-importexport-action',
				'parent' => 'ao-catch-importexport',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=catch-import-export#dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export &amp; Import Customizer Options', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-catch-importexport-features',
				'parent' => 'ao-catch-importexport',
				'title'  => esc_attr__( 'Features', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=catch-import-export#features' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Features', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-catchimportexport-resources',
					'parent' => 'ao-catch-importexport',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'catchimportexport-support',
				'group-catchimportexport-resources',
				'https://wordpress.org/support/plugin/catch-import-export'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'catchimportexport-translate',
				'group-catchimportexport-resources',
				'https://translate.wordpress.org/projects/wp-plugins/catch-import-export'
			);

			ddw_tbex_resource_item(
				'official-site',
				'catchimportexport-site',
				'group-catchimportexport-resources',
				'https://catchplugins.com/plugins/catch-import-export/'
			);

		}  // end if

}  // end function
