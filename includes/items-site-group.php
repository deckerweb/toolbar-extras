<?php

// includes/items-site-group.php

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_wp_site_items' );
/**
 * Remove original items under 'site-name', except for "View Site" and "Dashboard".
 *   We need to take this action in order to have a clean canvas to re-hook this
 *   stuff in a more organized and logical way - and also identical for Admin
 *   and Frontend!
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_wp_site_items() {

	/** Bail early if display of Toolbar Extras own site items is disallowed */
	if ( ! ddw_tbex_display_items_site() ) {
		return;
	}

	/**
	 * Remove WordPress' own items: Themes, Widgets, Menus.
	 *   Those are bundled in the ID 'appearance'.
	 */
	if ( ! is_admin() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'appearance' );
	}

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_website_settings', ddw_tbex_website_settings_item_priority() );
/**
 * Items for Website Settings/ Tools.
 *
 *   Note: The hook priority (default: 32) can be filtered via:
 *         'tbex_filter_website_settings_item_priority'
 *
 * @since 1.4.7
 *
 * @uses get_bloginfo()
 * @uses get_post_type_archive_link()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_website_settings( $admin_bar ) {

	$site_key = sanitize_key( get_bloginfo( 'name' ) );

	$admin_bar->add_node(
		array(
			'id'     => 'website-settings-' . $site_key,
			'parent' => 'site-name',
			'title'  => esc_attr__( 'Website Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Settings for this Site', 'toolbar-extras' ) . ': ' . esc_attr( get_bloginfo( 'name' ) ),
			)
		)
	);

		/** General Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-general',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings for this Site', 'toolbar-extras' ),
				)
			)
		);

		/** Permalinks */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-permalinks',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Permalinks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-permalink.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Permalinks Settings - Link Structure', 'toolbar-extras' ),
				)
			)
		);

		/** Writing & Publishing */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-writing',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Writing &amp; Publishing', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-writing.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Writing &amp; Publishing Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Reading & Content */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-reading',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Reading &amp; Content', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-reading.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Reading &amp; Content Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-reading-settings',
					'parent' => 'website-settings-' . $site_key . '-reading',
					'title'  => esc_attr__( 'Content &amp; Page Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-reading.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Content &amp; Page Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-reading-home',
					'parent' => 'website-settings-' . $site_key . '-reading',
					'title'  => esc_attr__( 'Preview Home Page', 'toolbar-extras' ),
					'href'   => esc_url( home_url( '/' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Preview Website Home Page', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-reading-blog',
					'parent' => 'website-settings-' . $site_key . '-reading',
					'title'  => esc_attr__( 'Preview Blog Page', 'toolbar-extras' ),
					'href'   => esc_url( get_post_type_archive_link( 'post' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Preview Website Blog Page (with latest Posts/ Articles)', 'toolbar-extras' ),
					)
				)
			);

		/** Comments/ Discussion */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-comments',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Comments', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-discussion.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Comments &amp; Discussion Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Media Library */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-media',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Media Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-media.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Library Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-media-settings',
					'parent' => 'website-settings-' . $site_key . '-media',
					'title'  => esc_attr__( 'Library Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-media.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Media Library Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-media-library',
					'parent' => 'website-settings-' . $site_key . '-media',
					'title'  => esc_attr__( 'Library Overview', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'upload.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Media Library Overview', 'toolbar-extras' ),
					)
				)
			);

		/** Privacy Page/ Tools */
		$admin_bar->add_node(
			array(
				'id'     => 'website-settings-' . $site_key . '-privacy',
				'parent' => 'website-settings-' . $site_key,
				'title'  => esc_attr__( 'Privacy Page', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'privacy.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Privacy Page Settings - for GDPR', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-privacy-settings',
					'parent' => 'website-settings-' . $site_key . '-privacy',
					'title'  => esc_attr__( 'Page Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'privacy.php' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Setup Privacy Page', 'toolbar-extras' ),
					)
				)
			);

			$privacy_page_id = get_option( 'wp_page_for_privacy_policy' );

			if ( $privacy_page_id ) {

				$admin_bar->add_node(
					array(
						'id'     => 'website-settings-' . $site_key . '-privacy-page-edit',
						'parent' => 'website-settings-' . $site_key . '-privacy',
						'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post.php?post=' . absint( $privacy_page_id ) . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Privacy Page', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'website-settings-' . $site_key . '-privacy-page-preview',
						'parent' => 'website-settings-' . $site_key . '-privacy',
						'title'  => esc_attr__( 'Preview Page', 'toolbar-extras' ),
						'href'   => esc_url( get_permalink( absint( $privacy_page_id ) ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Preview Privacy Page', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-privacy-guide',
					'parent' => 'website-settings-' . $site_key . '-privacy',
					'title'  => esc_attr__( 'Page Content Guide', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?wp-privacy-policy-guide=1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Page Content Guide - with Example', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-privacy-export',
					'parent' => 'website-settings-' . $site_key . '-privacy',
					'title'  => esc_attr__( 'Export Personal Data', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?page=export_personal_data' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export Personal Data', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'website-settings-' . $site_key . '-privacy-erase',
					'parent' => 'website-settings-' . $site_key . '-privacy',
					'title'  => esc_attr__( 'Erase Personal Data', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'tools.php?page=remove_personal_data' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Erase Personal Data', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Optional resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-website-settings-' . $site_key . '-resources',
					'parent' => 'website-settings-' . $site_key,
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			/** For Nginx Server Environments */
			if ( $GLOBALS[ 'is_nginx' ] ) {

				$admin_bar->add_node(
					array(
						'id'     => 'website-settings-resources-' . $site_key . '-nginx-server',
						'parent' => 'group-website-settings-' . $site_key . '-resources',
						'title'  => esc_attr__( 'Nginx Server Environment', 'toolbar-extras' ),
						'href'   => 'https://wordpress.org/support/article/nginx/',
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Nginx Server Environment', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'website-settings-resources-' . $site_key . '-nginx-permalinks',
						'parent' => 'group-website-settings-' . $site_key . '-resources',
						'title'  => esc_attr__( 'Nginx Library: WordPress Permalinks', 'toolbar-extras' ),
						'href'   => 'https://nginxlibrary.com/wordpress-permalinks/',
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Nginx Library: WordPress Permalinks', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_base_groups', 99 );
/**
 * Set base groups for "own" Site Group as "hook places".
 *   Set additional action hooks to enable custom groups.
 *
 * @since 1.0.0
 * @since 1.4.7 Added param $admin_bar (object) to action hooks.
 *
 * @uses ddw_tbex_parent_id_site_group()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_base_groups( $admin_bar ) {

	do_action( 'tbex_before_site_group_content', $admin_bar );

	/** Add these hook places only for Sites - not for Network Admin */
	if ( ! is_network_admin() ) {

		/** Group: Manage Content (Posts, Pages, Products) */
		$admin_bar->add_group(
			array(
				'id'     => 'tbex-sitegroup-manage-content',
				'parent' => ddw_tbex_parent_id_site_group(),
			)
		);

		do_action( 'tbex_after_site_group_content', $admin_bar );


		/** Group: Forms */
		$admin_bar->add_group(
			array(
				'id'     => 'tbex-sitegroup-forms',
				'parent' => ddw_tbex_parent_id_site_group(),
			)
		);

		do_action( 'tbex_after_site_group_forms', $admin_bar );


		/** Group: Elements - Widgets, Menus, etc. */
		$admin_bar->add_group(
			array(
				'id'     => 'tbex-sitegroup-elements',
				'parent' => ddw_tbex_parent_id_site_group(),
			)
		);

		do_action( 'tbex_after_site_group_elements', $admin_bar );

	}  // end if !(Network Admin) check

	/** Group: Tools (Cache, Backups, etc.) ... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-sitegroup-tools',
			'parent' => ddw_tbex_parent_id_site_group(),
		)
	);

	do_action( 'tbex_after_site_group_tools', $admin_bar );


	/** Group: More stuff... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-sitegroup-stuff',
			'parent' => ddw_tbex_parent_id_site_group(),
		)
	);

	do_action( 'tbex_after_site_group_stuff', $admin_bar );


	/** Group: Toolbar Extras Plugin Settings */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-sitegroup-plsettings',
			'parent' => ddw_tbex_parent_id_site_group(),
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_manage_content' );
/**
 * Items in the type of "Manage Content"
 *
 * @since 1.0.0
 * @since 1.4.9 Added items for file type views.
 *
 * @uses ddw_tbex_use_hook_place_gallery_slider()
 * @uses ddw_tbex_media_items_mime_type()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_manage_content( $admin_bar ) {

	/** Manage Content */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content',
			'parent' => 'tbex-sitegroup-manage-content',
			'title'  => esc_attr__( 'Manage Content', 'toolbar-extras' ),
			'href'   => '',
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Content', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-pages',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Pages', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Pages', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-posts',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Posts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Posts', 'toolbar-extras' ),
				)
			)
		);

	/** Add conditional hook place for general gallery & slider plugins */
	if ( ddw_tbex_use_hook_place_gallery_slider()	/* has_filter( 'tbex_filter_is_gallery_slider' ) */ ) {

		$admin_bar->add_node(
			array(
				'id'     => 'gallery-slider-addons',
				'parent' => 'tbex-sitegroup-manage-content',
				'title'  => esc_attr__( 'Gallery &amp; Slider', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Galleries &amp; Sliders from Add-On Plugins', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Media */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-media',
			'parent' => 'tbex-sitegroup-manage-content',
			'title'  => esc_attr__( 'Media Library', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Media Library', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_group(
			array(
				'id'     => 'group-managecontent-media',
				'parent' => 'manage-content-media',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-media-grid',
				'parent' => 'group-managecontent-media',
				'title'  => esc_attr__( 'Grid View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?mode=grid' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Files as Grid View', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-media-list',
				'parent' => 'group-managecontent-media',
				'title'  => esc_attr__( 'List View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?mode=list' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Files as List View', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_group(
			array(
				'id'     => 'group-managecontent-media-types',
				'parent' => 'manage-content-media',
			)
		);

			ddw_tbex_media_items_mime_type( 'image', $admin_bar, 'mlimages', 'group-managecontent-media-types' );
			ddw_tbex_media_items_mime_type( 'pdf', $admin_bar, 'mlpdfs', 'group-managecontent-media-types' );
			ddw_tbex_media_items_mime_type( 'audio', $admin_bar, 'mlaudio', 'group-managecontent-media-types' );
			ddw_tbex_media_items_mime_type( 'video', $admin_bar, 'mlvideo', 'group-managecontent-media-types' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_nav_menus' );
/**
 * Items for managing WP Nav Menus
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_nav_menus( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpmenus',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Nav Menus', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Nav Menus', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpmenus-admin',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Manage in WP-Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Nav Menus in WP-Admin Dashboard (Classic)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpmenus-live',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Customize Live', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'nav_menus' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Nav Menus with Live Preview', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpmenus-locations',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Menu Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php?action=locations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Nav Menus Locations', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_widgets' );
/**
 * Items for managing WP Widgets
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_widgets( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'wpwidgets',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Widgets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'widgets.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Widget Blocks', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpwidgets-admin',
				'parent' => 'wpwidgets',
				'title'  => esc_attr__( 'Manage in WP-Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'widgets.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Widgets in WP-Admin Dashboard (Classic)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpwidgets-live',
				'parent' => 'wpwidgets',
				'title'  => esc_attr__( 'Customize Live', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'widgets' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Widgets with Live Preview', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_more_stuff', 20 );
/**
 * More Items: Updates, Plugins, etc.
 *
 *  Includes action hook: 'tbex_after_site_group_update_check'
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_more_stuff( $admin_bar ) {

	/** Force Check Updates */
	if ( current_user_can( 'update_core' )
		|| current_user_can( 'update_plugins' )
		|| current_user_can( 'update_themes' )
		|| current_user_can( 'update_languages' )
	) {

		$admin_bar->add_node(
			array(
				'id'     => 'update-check',
				'parent' => 'tbex-sitegroup-stuff',
				'title'  => '<strong>' . esc_attr__( 'Force Check Updates', 'toolbar-extras' ) . '</strong>',
				'href'   => is_multisite() ? esc_url( network_admin_url( 'update-core.php?force-check=1' ) ) : esc_url( admin_url( 'update-core.php?force-check=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check for Updates - Core, Plugins, Themes, Translations', 'toolbar-extras' ),
				)
			)
		);

			if ( has_filter( 'tbex_filter_is_update_addon' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'update-check-core-all',
						'parent' => 'update-check',
						'title'  => esc_attr__( 'All Updates', 'toolbar-extras' ),
						'href'   => is_multisite() ? esc_url( network_admin_url( 'update-core.php?force-check=1' ) ) : esc_url( admin_url( 'update-core.php?force-check=1' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Updates: Core, Plugins, Themes, Translations', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

	}  // end if

	/** Hook place for extending... */
	do_action( 'tbex_after_site_group_update_check', $admin_bar );

	/** WP-Plugins stuff */
	$admin_bar->add_node(
		array(
			'id'     => 'wpplugins',
			'parent' => 'tbex-sitegroup-stuff',
			'title'  => esc_attr__( 'Plugins', 'toolbar-extras' ),
			'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php' ) ) : esc_url( admin_url( 'plugins.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Plugins Page', 'toolbar-extras' ),
			)
		)
	);

		if ( current_user_can( 'activate_plugins' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpplugins-all',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'All Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=all' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=all' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Plugins', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpplugins-active',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Active Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=active' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=active' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Currently active Plugins', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpplugins-inactive',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Inactive Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=inactive' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=inactive' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Currently inactive Plugins', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		if ( has_action( 'after_setup_theme', 'ddw_tbex_plugin_manager' ) && current_user_can( 'install_plugins' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpplugins-suggested',
					'parent' => 'wpplugins',
					'title'  => esc_attr_x( 'Suggested Plugins', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugins.php?page=toolbar-extras-suggested-plugins' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "Suggested Plugins" settings link */
						'title'  => esc_attr_x( 'Plugin Manager for our Add-Ons - Required, Recommended and Useful Plugins', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_health_debug', 100 );
/**
 * More Items: Site Health status, Debug info
 *   Note: Can be disabled via filter 'tbex_filter_site_health_items'.
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_health_debug( $admin_bar ) {

	/** Bail early if not on WP 5.2+ */
	if ( ! ddw_tbex_is_wp52_install()
		/* || ! current_user_can( 'manage_options' ) */
		|| ! apply_filters( 'tbex_filter_site_health_items', TRUE )
		|| ( ! is_multisite() && ! current_user_can( 'install_plugins' ) )
		|| ( is_multisite() && ! current_user_can( 'setup_network' ) )
	) {
		return $admin_bar;
	}

	/** Site Health */
	$admin_bar->add_node(
		array(
			'id'     => 'wp-sitehealth',
			'parent' => 'tbex-sitegroup-stuff',
			'title'  => esc_attr__( 'Site Health', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'site-health.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Site Health Status &amp; Debug Info', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wp-sitehealth-status',
				'parent' => 'wp-sitehealth',
				'title'  => esc_attr__( 'Health Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'site-health.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Site Health Status', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wp-sitehealth-debug',
				'parent' => 'wp-sitehealth',
				'title'  => esc_attr__( 'Debug Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'site-health.php?tab=debug' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Debug Info &amp; Error Reporting', 'toolbar-extras' ),
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_customizer' );
/**
 * Items for hooking in under "Customize" on the frontend.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_customizer( $admin_bar ) {

	/** Bail early as this stuff is only needed on the frontend :) */
	if ( is_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'customize-wpwidgets',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Widgets', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'widgets' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Customize Widgets with Live Preview', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'customize-wpmenus',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Nav Menus', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'nav_menus' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Customize Nav Menus with Live Preview', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'customize-css',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Custom CSS', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'custom_css' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Customize CSS with Live Preview', 'toolbar-extras' ),
			)
		)
	);

}  // end function
