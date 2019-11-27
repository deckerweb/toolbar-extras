<?php

// OTGS: Toolset Layouts
// includes/plugins-otgs/items-toolset-layouts

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_layouts', 30 );
/**
 * Items for plugin: Toolset Layouts (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_layouts( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-layouts',
			'parent' => 'group-toolset-layouts',
			'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=dd_layouts' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Layouts', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-layouts-manage',
				'parent' => 'toolset-layouts',
				'title'  => esc_attr__( 'Manage Layouts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dd_layouts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Layouts', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'toolset-layouts-code',
				'parent' => 'toolset-layouts',
				'title'  => esc_attr__( 'Layouts CSS and JS Editor', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dd_layout_CSS_JS' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Layouts CSS and JS Editor', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-layouts-code-css',
					'parent' => 'toolset-layouts-code',
					'title'  => esc_attr__( 'CSS Editor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=dd_layout_CSS_JS#css_tab' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'CSS Editor', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-layouts-code-js',
					'parent' => 'toolset-layouts-code',
					'title'  => esc_attr__( 'JS Editor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=dd_layout_CSS_JS#js_tab' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'JS Editor', 'toolbar-extras' ),
					)
				)
			);


	/** Layouts: Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-layouts-settings-layouts',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=layouts' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			)
		)
	);

	/** Layouts: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-layouts-exportimport-layouts',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=dd_layout_import_export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Layouts', 'toolbar-extras' ),
			)
		)
	);

}  // end function
