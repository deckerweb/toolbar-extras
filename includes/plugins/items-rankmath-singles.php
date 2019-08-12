<?php

// includes/plugins/items-rankmath-singles

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_rankmath_singles', 100 );
/**
 * Additional items for Plugins (only if active):
 *   - Schema Markup Rich Snippets by Rank Math (free, by Rank Math)
 *   - 404 Monitor by Rank Math (free, by Rank Math)
 *   - Redirections by Rank Math (free, by Rank Math)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_rankmath_singles( $admin_bar ) {

	$rm_dashboard = get_transient( 'rank_math_first_submenu_id' );
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-rankmath-singles',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Rank Math SEO', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=' . $rm_dashboard ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Rank Math SEO Options', 'toolbar-extras' )
			)
		)
	);

		/** Dashboard */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-dashboard',
				'parent' => 'tbex-rankmath-singles',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=' . $rm_dashboard ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard and Module Setup', 'toolbar-extras' )
				)
			)
		);

		/** General settings */
		if ( class_exists( 'RankMath_Monitor' ) || class_exists( 'RankMath_Redirections' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
					)
				)
			);

				if ( class_exists( 'RankMath_Monitor' ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-settings-404monitor',
							'parent' => 'tbex-rankmath-settings',
							'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-404-monitor' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' )
							)
						)
					);

				}  // end if

				if ( class_exists( 'RankMath_Redirections' ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-settings-redirections',
							'parent' => 'tbex-rankmath-settings',
							'title'  => esc_attr__( 'Redirections', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-redirections' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Redirections', 'toolbar-extras' )
							)
						)
					);

				}  // end if

		}  // end if

		/** Rich Snippets/ Schema (otherwise Titles & Meta) */
		if ( class_exists( 'RANKMATH_SCHEMA' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-singles-schema',
					'parent' => 'tbex-rankmath-singles',
					'title'  => esc_attr__( 'Titles &amp; Meta', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Titles &amp; Meta', 'toolbar-extras' )
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-singles-schema-local',
						'parent' => 'tbex-rankmath-singles-schema',
						'title'  => esc_attr__( 'Local SEO', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-local' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Local SEO', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-singles-schema-social',
						'parent' => 'tbex-rankmath-singles-schema',
						'title'  => esc_attr__( 'Social Meta', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-social' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Social Meta', 'toolbar-extras' )
						)
					)
				);

				/** Group: Post Types */
				$admin_bar->add_group(
					array(
						'id'     => 'group-rankmathschema-cpt',
						'parent' => 'tbex-rankmath-singles-schema',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-schema-cpt-posts',
							'parent' => 'group-rankmathschema-cpt',
							'title'  => esc_attr__( 'Posts', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-post-type-post' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Post Type: Posts', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-schema-cpt-pages',
							'parent' => 'group-rankmathschema-cpt',
							'title'  => esc_attr__( 'Pages', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-post-type-page' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Post Type: Pages', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-schema-cpt-attachments',
							'parent' => 'group-rankmathschema-cpt',
							'title'  => esc_attr__( 'Media', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-post-type-attachment' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Post Type: Attachments (Media)', 'toolbar-extras' )
							)
						)
					);

				/** Group: Taxonomies */
				$admin_bar->add_group(
					array(
						'id'     => 'group-rankmathschema-tax',
						'parent' => 'tbex-rankmath-singles-schema',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-schema-tax-categories',
							'parent' => 'group-rankmathschema-tax',
							'title'  => esc_attr__( 'Categories', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-taxonomy-category' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Taxonomy: Categories', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-schema-tax-tags',
							'parent' => 'group-rankmathschema-tax',
							'title'  => esc_attr__( 'Tags', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-taxonomy-post_tag' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Taxonomy: Tags', 'toolbar-extras' )
							)
						)
					);

		}  // end if

		/** Redirections */
		if ( class_exists( 'RankMath_Redirections' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-singles-redirections',
					'parent' => 'tbex-rankmath-singles',
					'title'  => esc_attr__( 'Redirections', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Setup Redirections', 'toolbar-extras' )
					)
				)
			);

				/** Group: Manage */
				$admin_bar->add_group(
					array(
						'id'     => 'group-rankmath-singles-red-manage',
						'parent' => 'tbex-rankmath-singles-redirections',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-all',
							'parent' => 'group-rankmath-singles-red-manage',
							'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections&status=all' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-new',
							'parent' => 'group-rankmath-singles-red-manage',
							'title'  => esc_attr__( 'New Redirection', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections&new=1' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Add new Redirection', 'toolbar-extras' )
							)
						)
					);

				/** Group: Settings */
				$admin_bar->add_group(
					array(
						'id'     => 'group-rankmath-singles-red-settings',
						'parent' => 'tbex-rankmath-singles-redirections',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-export-apache',
							'parent' => 'group-rankmath-singles-red-settings',
							'title'  => esc_attr__( 'Export to .htaccess', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections&export=apache' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Export Redirections to .htaccess file (Apache Server)', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-export-nginx',
							'parent' => 'group-rankmath-singles-red-settings',
							'title'  => esc_attr__( 'Export to Nginx', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections&export=nginx' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Export Redirections to Nginx config file (Nginx Server)', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-settings',
							'parent' => 'group-rankmath-singles-red-settings',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-redirections' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Settings for Redirections', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-singles-redirections-learnmore',
							'parent' => 'group-rankmath-singles-red-settings',
							'title'  => esc_attr__( 'Learn More', 'toolbar-extras' ),
							'href'   => 'https://rankmath.com/kb/setting-up-redirections/',
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Learn More - Help', 'toolbar-extras' )
							)
						)
					);

		}  // end if

		/** 404 Monitor */
		if ( class_exists( 'RankMath_Monitor' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-singles-404-monitor',
					'parent' => 'tbex-rankmath-singles',
					'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-404-monitor' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Import & Export */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-import-export',
				'parent' => 'tbex-rankmath-singles',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		/** Help & Support */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-help-support',
				'parent' => 'tbex-rankmath-singles',
				'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' )
				)
			)
		);

			if ( class_exists( 'RankMath_Monitor' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-singles-help-support-404monitor',
						'parent' => 'tbex-rankmath-singles-help-support',
						'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-404-monitor' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( class_exists( 'RankMath_Redirections' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-singles-help-support-redirections',
						'parent' => 'tbex-rankmath-singles-help-support',
						'title'  => esc_attr__( 'Redirections', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-redirect' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Redirections', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( class_exists( 'RANKMATH_SCHEMA' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-singles-help-support-rich-snippet',
						'parent' => 'tbex-rankmath-singles-help-support',
						'title'  => esc_attr__( 'Rich Snippet', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-rich-snippet' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Rich Snippet', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-rankmathsingles-resources',
				'parent' => 'tbex-rankmath-singles',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'documentation',
			'rankmathsingles-docs',
			'group-rankmathsingles-resources',
			'https://rankmathsingles.com/kb/wordpress/seo-suite/'
		);

		ddw_tbex_resource_item(
			'community-forum',
			'rankmathsingles-community-forum',
			'group-rankmathsingles-resources',
			'https://support.rankmathsingles.com/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'rankmathsingles-fbgroup',
			'group-rankmathsingles-resources',
			'https://www.facebook.com/groups/rankmathseopluginwordpress/'
		);
			
		ddw_tbex_resource_item(
			'official-site',
			'rankmathsingles-site',
			'group-rankmathsingles-resources',
			'https://rankmath.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_rankmath_singles', 100 );
/**
 * Items for "New Content" section: New Rank Math Redirection
 *
 * @since 1.4.5
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_rankmath_singles( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	if ( ddw_tbex_display_items_dev_mode()
		&& class_exists( 'RankMath_Redirections' )
	) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-new-redirection',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Redirection', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math-redirections&new=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Redirection', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function
