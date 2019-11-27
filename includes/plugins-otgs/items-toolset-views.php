<?php

// OTGS: Toolset Views
// includes/plugins-otgs/items-toolset-views

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_views', 30 );
/**
 * Items for plugin: Toolset Views (Premium, by OnTheGoSystems)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_views( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views',
			'parent' => 'group-toolset-views',
			'title'  => esc_attr__( 'Views', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=views' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => 'Toolset: ' . esc_attr__( 'Views', 'toolbar-extras' ),
			)
		)
	);

		/** Views */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-views-all',
				'parent' => 'toolset-views',
				'title'  => esc_attr__( 'Manage Views', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=views' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Views', 'toolbar-extras' ),
				)
			)
		);

		/** Content Templates */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-views-content',
				'parent' => 'toolset-views',
				'title'  => esc_attr__( 'Content Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=view-templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Content Templates', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-content-by-name',
					'parent' => 'toolset-views-content',
					'title'  => esc_attr__( 'All by Name', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-templates&arrangeby=name&usage=name' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All by Name', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-content-by-single-page',
					'parent' => 'toolset-views-content',
					'title'  => esc_attr__( 'Usage by Single Page', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-templates&arrangeby=usage&usage=single' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Usage by Single Page', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-content-by-post-archive',
					'parent' => 'toolset-views-content',
					'title'  => esc_attr__( 'Usage by Custom Post Archive', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-templates&arrangeby=usage&usage=post-archives' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Usage by Custom Post Archive', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-content-by-tax-archive',
					'parent' => 'toolset-views-content',
					'title'  => esc_attr__( 'Usage by Taxonomy Archive', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-templates&arrangeby=usage&usage=taxonomy-archives' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Usage by Taxonomy Archive', 'toolbar-extras' ),
					)
				)
			);

		/** WordPress Archives */
		$admin_bar->add_node(
			array(
				'id'     => 'toolset-views-archives',
				'parent' => 'toolset-views',
				'title'  => esc_attr__( 'WordPress Archives', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=view-archives' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'WordPress Archives', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-archives-by-name',
					'parent' => 'toolset-views-archives',
					'title'  => esc_attr__( 'All by Name', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-archives' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All by Name', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'toolset-views-archives-by-loops',
					'parent' => 'toolset-views-archives',
					'title'  => esc_attr__( 'Usage by Archive Loops', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=view-archives&arrangeby=usage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Usage by Archive Loops', 'toolbar-extras' ),
					)
				)
			);


	/** Views: Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-settings-frontend-content',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Front-end Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=front-end-content' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Front-end Content', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-settings-integration',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Views Integration', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=views-integration' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Views Integration', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-settings-maps',
			'parent' => 'toolset-suite-settings',
			'title'  => esc_attr__( 'Maps', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-settings&tab=maps' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Maps', 'toolbar-extras' ),
			)
		)
	);

	/** Views: Export/ Import */
	$admin_bar->add_node(
		array(
			'id'     => 'toolset-views-exportimport-views',
			'parent' => 'toolset-suite-exportimport',
			'title'  => esc_attr__( 'Views', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolset-export-import&tab=wpv-views' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Views', 'toolbar-extras' ),
			)
		)
	);

}  // end function
