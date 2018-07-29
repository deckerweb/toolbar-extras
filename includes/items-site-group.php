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
 * @since  1.0.0
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


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_base_groups', 99 );
/**
 * Set base groups for "own" Site Group as "hook places".
 *   Set additional action hooks to enable custom groups.
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_base_groups() {

	do_action( 'tbex_before_site_group_content' );

	/** Add these hook places only for Sites - not for Network Admin */
	if ( ! is_network_admin() ) {

		/** Group: Manage Content (Posts, Pages, Products) */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'tbex-sitegroup-manage-content',
				'parent' => ddw_tbex_parent_id_site_group()
			)
		);

		do_action( 'tbex_after_site_group_content' );


		/** Group: Forms */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'tbex-sitegroup-forms',
				'parent' => ddw_tbex_parent_id_site_group()
			)
		);

		do_action( 'tbex_after_site_group_forms' );


		/** Group: Elements - Widgets, Menus, etc. */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'tbex-sitegroup-elements',
				'parent' => ddw_tbex_parent_id_site_group()
			)
		);

		do_action( 'tbex_after_site_group_elements' );

	}  // end if !(Network Admin) check

	/** Group: Tools (Cache, Backups, etc.) ... */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'tbex-sitegroup-tools',
			'parent' => ddw_tbex_parent_id_site_group()
		)
	);

	do_action( 'tbex_after_site_group_tools' );


	/** Group: More stuff... */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'tbex-sitegroup-stuff',
			'parent' => ddw_tbex_parent_id_site_group()
		)
	);

	do_action( 'tbex_after_site_group_stuff' );


	/** Group: Toolbar Extras Plugin Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'tbex-sitegroup-plsettings',
			'parent' => ddw_tbex_parent_id_site_group(),
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_manage_content' );
/**
 * Items in the type of "Manage Content"
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_manage_content() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content',
			'parent' => 'tbex-sitegroup-manage-content',
			'title'  => esc_attr__( 'Manage Content', 'toolbar-extras' ),
			'href'   => '',
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Content', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'manage-content-pages',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Pages', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Pages', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'manage-content-posts',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Posts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Posts', 'toolbar-extras' )
				)
			)
		);

	/** Add conditional hook place for general gallery & slider plugins */
	if ( ddw_tbex_use_hook_place_gallery_slider()	/* has_filter( 'tbex_filter_is_gallery_slider' ) */ ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gallery-slider-addons',
				'parent' => 'tbex-sitegroup-manage-content',
				'title'  => esc_attr__( 'Gallery &amp; Slider', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Galleries &amp; Sliders from Add-On Plugins', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'manage-content-media',
			'parent' => 'tbex-sitegroup-manage-content',
			'title'  => esc_attr__( 'Media Library', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'upload.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Media Library', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'manage-content-media-grid',
				'parent' => 'manage-content-media',
				'title'  => esc_attr__( 'Grid View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?mode=grid' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Files as Grid View', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'manage-content-media-list',
				'parent' => 'manage-content-media',
				'title'  => esc_attr__( 'List View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'upload.php?mode=list' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Media Files as List View', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_nav_menus' );
/**
 * Items for managing WP Nav Menus
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_nav_menus() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpmenus',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Nav Menus', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Nav Menus', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpmenus-live',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Customize Live', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'nav_menus' ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Customize Nav Menus with Live Preview', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpmenus-admin',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Manage in WP-Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Nav Menus in WP-Admin Dashboard (Classic)', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpmenus-locations',
				'parent' => 'wpmenus',
				'title'  => esc_attr__( 'Menu Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php?action=locations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Nav Menus Locations', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_widgets' );
/**
 * Items for managing WP Widgets
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_widgets() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpwidgets',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Widgets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'widgets.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Manage Widget Blocks', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpwidgets-live',
				'parent' => 'wpwidgets',
				'title'  => esc_attr__( 'Customize Live', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'widgets' ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Customize Widgets with Live Preview', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpwidgets-admin',
				'parent' => 'wpwidgets',
				'title'  => esc_attr__( 'Manage in WP-Admin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'widgets.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Manage Widgets in WP-Admin Dashboard (Classic)', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_more_stuff', 20 );
/**
 * More Items: Updates, Plugins, etc.
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_more_stuff() {

	/** Force Check Updates */
	if ( current_user_can( 'update_core' )
		|| current_user_can( 'update_plugins' )
		|| current_user_can( 'update_themes' )
		|| current_user_can( 'update_languages' )
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'update-check',
				'parent' => 'tbex-sitegroup-stuff',
				'title'  => esc_attr__( 'Force Check Updates', 'toolbar-extras' ),
				'href'   => is_multisite() ? esc_url( network_admin_url( 'update-core.php?force-check=1' ) ) : esc_url( admin_url( 'update-core.php?force-check=1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check for Updates - Core, Plugins, Themes, Translations', 'toolbar-extras' )
				)
			)
		);

			if ( has_filter( 'tbex_filter_is_update_addon' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'update-check-core-all',
						'parent' => 'update-check',
						'title'  => esc_attr__( 'All Updates', 'toolbar-extras' ),
						'href'   => is_multisite() ? esc_url( network_admin_url( 'update-core.php?force-check=1' ) ) : esc_url( admin_url( 'update-core.php?force-check=1' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Updates: Core, Plugins, Themes, Translations', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if

	/** Hook place for extending... */
	do_action( 'tbex_after_site_group_update_check' );

	/** WP-Plugins stuff */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpplugins',
			'parent' => 'tbex-sitegroup-stuff',
			'title'  => esc_attr__( 'Plugins', 'toolbar-extras' ),
			'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php' ) ) : esc_url( admin_url( 'plugins.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Plugins Page', 'toolbar-extras' )
			)
		)
	);

		if ( current_user_can( 'activate_plugins' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpplugins-all',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'All Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=all' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=all' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Plugins', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpplugins-active',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Active Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=active' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=active' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Currently active Plugins', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpplugins-inactive',
					'parent' => 'wpplugins',
					'title'  => esc_attr__( 'Inactive Plugins', 'toolbar-extras' ),
					'href'   => is_network_admin() ? esc_url( network_admin_url( 'plugins.php?plugin_status=inactive' ) ) : esc_url( admin_url( 'plugins.php?plugin_status=inactive' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Currently inactive Plugins', 'toolbar-extras' )
					)
				)
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_customizer' );
/**
 * Items for hooking in under "Customize" on the frontend.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_customizer() {

	/** Bail early as this stuff is only needed on the frontend :) */
	if ( is_admin() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-wpwidgets',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Widgets', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'widgets' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customize Widgets with Live Preview', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-wpmenus',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Nav Menus', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'nav_menus' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customize Nav Menus with Live Preview', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-css',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Custom CSS', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'custom_css' ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Customize CSS with Live Preview', 'toolbar-extras' )
			)
		)
	);

}  // end function