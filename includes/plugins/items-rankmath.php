<?php

// includes/plugins/items-rankmath

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_rankmath', 100 );
/**
 * Additional items for Plugin: Rank Math SEO (free, by Rank Math)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_rankmath( $admin_bar ) {

	/** Get Rank Math modules, which feature (aka "toggle") is activated */
	$rm_options = get_option( 'rank_math_modules' );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-rankmath',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Rank Math SEO', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=rank-math' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Rank Math SEO Options', 'toolbar-extras' )
			)
		)
	);

		/** Dashboard */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-dashboard',
				'parent' => 'tbex-rankmath',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard and Module Setup', 'toolbar-extras' )
				)
			)
		);

		/** Setup Wizard */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-wizard',
				'parent' => 'tbex-rankmath',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Start Setup Wizard', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-your-website',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Step 1: Your Website', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=yoursite' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 1: Your Website', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-search-console',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Step 2: Search Console', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=searchconsole' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 2: Google Search Console', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-sitemaps',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Step 3: Sitemaps', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=sitemaps' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 3: Sitemaps', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-optimization',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Step 4: Optimization &amp; SEO Tweaks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=optimization' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 4: Optimization &amp; SEO Tweaks', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-ready',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Step 5: Ready Check', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=ready' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 5: Ready Check', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-role-manager',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Advanced 1: Role Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=role' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Advanced 1: Role Manager', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-404-redirection',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Advanced 2: 404 &amp; Redirections', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=redirection' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Advanced 2: 404 &amp; Redirections', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-wizard-misc',
					'parent' => 'tbex-rankmath-wizard',
					'title'  => esc_attr__( 'Advanced 3: Miscellaneous', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-wizard&step=misc' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Advanced 3: Miscellaneous Options', 'toolbar-extras' )
					)
				)
			);

		/** General settings */
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

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-links',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Links', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-links' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Links', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-images',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Images', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-images' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Images', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-breadcrumbs',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Breadcrumbs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-breadcrumbs' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Breadcrumbs', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-webmaster-tools',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Webmaster Tools', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-webmaster' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Webmaster Tools', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-robotstxt',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Edit robots.txt', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-robots' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit WordPress virtual robots.txt file', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-htaccess',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Edit .htaccess', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-htaccess' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Edit the .htaccess file of this installation', 'toolbar-extras' )
					)
				)
			);

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

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-search-console',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Search Console', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-search-console' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Search Console', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-settings-others',
					'parent' => 'tbex-rankmath-settings',
					'title'  => esc_attr__( 'Others', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-general#setting-panel-others' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Other Settings', 'toolbar-extras' )
					)
				)
			);

		/** Titles & Meta */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-titles-meta',
				'parent' => 'tbex-rankmath',
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
					'id'     => 'tbex-rankmath-titles-meta-global',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Global Meta', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-global' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Global Meta', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-titles-meta-local',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Local Meta', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-local' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Local Meta', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-titles-meta-social',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Social Meta', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-social' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Social Meta', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-titles-meta-homepage',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Homepage', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-homepage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Homepage Title &amp; Meta Data', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-titles-meta-authors',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Authors', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-author' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Authors', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-titles-meta-misc-pages',
					'parent' => 'tbex-rankmath-titles-meta',
					'title'  => esc_attr__( 'Misc Pages', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-misc' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Misc Pages', 'toolbar-extras' )
					)
				)
			);

			/** Group: Post Types */
			$admin_bar->add_group(
				array(
					'id'     => 'group-rankmathtm-cpt',
					'parent' => 'tbex-rankmath-titles-meta',
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-titles-meta-cpt-posts',
						'parent' => 'group-rankmathtm-cpt',
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
						'id'     => 'tbex-rankmath-titles-meta-cpt-pages',
						'parent' => 'group-rankmathtm-cpt',
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
						'id'     => 'tbex-rankmath-titles-meta-cpt-attachments',
						'parent' => 'group-rankmathtm-cpt',
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
					'id'     => 'group-rankmathtm-tax',
					'parent' => 'tbex-rankmath-titles-meta',
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-titles-meta-tax-categories',
						'parent' => 'group-rankmathtm-tax',
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
						'id'     => 'tbex-rankmath-titles-meta-tax-tags',
						'parent' => 'group-rankmathtm-tax',
						'title'  => esc_attr__( 'Tags', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-titles#setting-panel-taxonomy-post_tag' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Taxonomy: Tags', 'toolbar-extras' )
						)
					)
				);

		/** Sitemap */
		if ( isset( $rm_options[ 'sitemap' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-sitemap',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( 'Sitemap Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-sitemap' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Sitemap Settings', 'toolbar-extras' )
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-sitemap-general',
						'parent' => 'tbex-rankmath-sitemap',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-options-sitemap#setting-panel-general' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'General', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Role Manager */
		if ( isset( $rm_options[ 'role-manager' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-role-manager',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-role-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** 404 Monitor */
		if ( isset( $rm_options[ '404-monitor' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-404-monitor',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-404-monitor' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Redirections */
		if ( isset( $rm_options[ 'redirections' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-redirections',
					'parent' => 'tbex-rankmath',
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
						'id'     => 'group-rankmathred-manage',
						'parent' => 'tbex-rankmath-redirections',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-redirections-all',
							'parent' => 'group-rankmathred-manage',
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
							'id'     => 'tbex-rankmath-redirections-new',
							'parent' => 'group-rankmathred-manage',
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
						'id'     => 'group-rankmathred-settings',
						'parent' => 'tbex-rankmath-redirections',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-rankmath-redirections-export-apache',
							'parent' => 'group-rankmathred-settings',
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
							'id'     => 'tbex-rankmath-redirections-export-nginx',
							'parent' => 'group-rankmathred-settings',
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
							'id'     => 'tbex-rankmath-redirections-settings',
							'parent' => 'group-rankmathred-settings',
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
							'id'     => 'tbex-rankmath-redirections-learnmore',
							'parent' => 'group-rankmathred-settings',
							'title'  => esc_attr__( 'Learn More', 'toolbar-extras' ),
							'href'   => 'https://rankmath.com/kb/setting-up-redirections/',
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Learn More - Help', 'toolbar-extras' )
							)
						)
					);

		}  // end if

		/** Search Console */
		if ( isset( $rm_options[ 'search-console' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-search-console',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( 'Search Console', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-search-console' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Google Search Console', 'toolbar-extras' )
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-search-console-overview',
						'parent' => 'tbex-rankmath-search-console',
						'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-search-console&view=overview' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-search-console-analytics',
						'parent' => 'tbex-rankmath-search-console',
						'title'  => esc_attr__( 'Search Analytics', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-search-console&view=analytics' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Search Analytics', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-search-console-sitemaps',
						'parent' => 'tbex-rankmath-search-console',
						'title'  => esc_attr__( 'Sitemaps', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-search-console&view=sitemaps' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Sitemaps', 'toolbar-extras' )
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-rankmath-search-console-keyword-tracker',
						'parent' => 'tbex-rankmath-search-console',
						'title'  => esc_attr__( 'Keyword Tracker', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=rank-math-search-console&view=tracker' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Keyword Tracker', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** SEO Analysis */
		if ( isset( $rm_options[ 'seo-analysis' ] ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-seo-analysis',
					'parent' => 'tbex-rankmath',
					'title'  => esc_attr__( 'SEO Analysis', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-seo-analysis' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'SEO Analysis', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Import & Export */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-import-export',
				'parent' => 'tbex-rankmath',
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
				'id'     => 'tbex-rankmath-help-support',
				'parent' => 'tbex-rankmath',
				'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-getting-started',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-getting-started' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-amp',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'AMP', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-amp' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'AMP', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-local-seo',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Local SEO', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-local-seo' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Local SEO', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-404monitor',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-404-monitor' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( '404 Monitor', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-redirections',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Redirections', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-redirect' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Redirections', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-rich-snippet',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Rich Snippet', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-rich-snippet' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Rich Snippet', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-role-manager',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-role-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-search-console',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Search Console', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-search-console' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Search Console', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-seo-analysis',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'SEO Analysis', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-seo-analysis' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'SEO Analysis', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-rankmath-help-support-sitemap',
					'parent' => 'tbex-rankmath-help-support',
					'title'  => esc_attr__( 'Sitemap', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=rank-math-help#help-panel-sitemap' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Sitemap', 'toolbar-extras' )
					)
				)
			);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-rankmath-resources',
				'parent' => 'tbex-rankmath',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'rankmath-support',
			'group-rankmath-resources',
			'https://wordpress.org/support/plugin/seo-by-rank-math'
		);

		ddw_tbex_resource_item(
			'documentation',
			'rankmath-docs',
			'group-rankmath-resources',
			'https://rankmath.com/kb/wordpress/seo-suite/'
		);

		ddw_tbex_resource_item(
			'community-forum',
			'rankmath-community-forum',
			'group-rankmath-resources',
			'https://support.rankmath.com/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'rankmath-fbgroup',
			'group-rankmath-resources',
			'https://www.facebook.com/groups/rankmathseopluginwordpress/'
		);
		
		ddw_tbex_resource_item(
			'changelog',
			'rankmath-changelog',
			'group-rankmath-resources',
			'https://rankmath.com/changelog/',
			ddw_tbex_string_version_history( 'plugin' )
		);

		ddw_tbex_resource_item(
			'translations-community',
			'rankmath-translate',
			'group-rankmath-resources',
			'https://translate.wordpress.org/projects/wp-plugins/seo-by-rank-math'
		);

		ddw_tbex_resource_item(
			'official-site',
			'rankmath-site',
			'group-rankmath-resources',
			'https://rankmath.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_rankmath', 100 );
/**
 * Items for "New Content" section: New Rank Math Redirection
 *
 * @since 1.4.5
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_rankmath( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	/** Get Rank Math modules, which feature (aka "toggle") is activated */
	$rm_options = get_option( 'rank_math_modules' );

	if ( ddw_tbex_display_items_dev_mode()
		&& isset( $rm_options[ 'redirections' ] )
	) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-new-redirection',
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
