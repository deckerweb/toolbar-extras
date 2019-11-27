<?php

// OTGS: Toolset Module Manager
// includes/plugins-otgs/items-toolset-modules

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_toolset_before_options', 'ddw_tbex_site_items_toolset_module_manager', 30 );
/**
 * Items for plugin: Toolset Module Manager (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_module_manager( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-modules',
			'parent' => 'group-toolset-options',
			'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&view_id=undefined' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Module Manager', 'toolbar-extras' ),
			)
		)
	);

		/** Define Modules */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-modules-define',
				'parent' => 'toolset-modules',
				'title'  => esc_attr__( 'Define Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Define Modules', 'toolbar-extras' ),
				)
			)
		);

		/** Module Library */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-modules-library',
				'parent' => 'toolset-modules',
				'title'  => esc_attr__( 'Modules Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Modules Library', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-all',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'All Modules', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Modules', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-portfolio',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Portfolio' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-testimonial',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Testimonial', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Testimonial' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Testimonial', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-member',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Member', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Member' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Member', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-slider',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Slider', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Slider' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Slider', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-magazine',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Magazine', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Magazine' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Magazine', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-real-estate',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'Real Estate', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=Real estate' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Real Estate', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-modules-library-woocommerce',
					'parent' => 'toolset-modules-library',
					'title'  => esc_attr__( 'WooCommerce', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=ModuleManager_Modules&tab=library&module_cat=WooCommerce' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'WooCommerce', 'toolbar-extras' ),
					)
				)
			);


	/** Modules: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-modules-exportimport-modules',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=modules_import' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
			)
		)
	);

}  // end function
