<?php

// includes/items-new-content

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_types', 71 );
/**
 * Add new content types to the WordPress "New Content" section within the Toolbar.
 *
 * @since 1.0.0
 * @since 1.4.0 Added optional Block Editor (Gutenberg) support.
 * @since 1.4.7 Switched from global $GLOBALS[ 'wp_admin_bar' ] to object param $admin_bar.
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_get_elementor_new_template_url()
 * @uses ddw_tbex_is_block_editor_user_switch()
 * @uses ddw_tbex_is_classic_editor_plugin_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_new_content_types( $admin_bar ) {

	/** New Elementor Template items */
	if ( ddw_tbex_is_elementor_active() ) {

		/**
		 * Root item for "New Elementor Template" in "New Content" Group.
		 *   This is only used for Elementor v2.3.x or lower. For Elementor
		 *   2.4.0+ the core item gets filtered and used as hook-place.
		 * @since 1.0.0
		 * @since 1.4.0 Overhauled for Elementor v2.4.0 or higher.
		 * @see plugin file /includes/elementor-official/elementor-functions.php
		 * @see plugin file /includes/elementor-official/items-elementor-core.php
		 */
		if ( ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_BEFORE_240, '<=' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-elementor-template',
					'parent' => 'new-content',
					'title'  => ddw_tbex_string_elementor_template(),
					'href'   => ddw_tbex_get_elementor_new_template_url(),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_elementor_template_new(),
					)
				)
			);

		}  // end if

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'post' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wp-post-with-builder',
					'parent' => 'new-post',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'post' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => ddw_tbex_string_newcontent_create_with_builder(),
					)
				)
			);

		}  // end if

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'page' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wp-page-with-builder',
					'parent' => 'new-page',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'page' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => ddw_tbex_string_newcontent_create_with_builder(),
					)
				)
			);

		}  // end if

	}  // end if (Elementor active)

	/**
	 * Let hook in more items between "beginning" Elementor item and "closing"
	 *   Nav Menu item.
	 *   Note: Of course, this also works with Elementor being not active.
	 * @since 1.0.0
	 * @since 1.4.7 Added param $admin_bar (object) to action hook.
	 */
	do_action( 'tbex_new_content_before_nav_menu', $admin_bar );

	/**
	 * Block Editor support: Editor alternatives/ switching
	 *   Note: This requires the Classic Editor plugin and/or the Disable
	 *         Gutenberg plugins to be active and having the appropriate setting
	 *         enabled.
	 * @since 1.4.0
	 * @see ddw_tbex_is_block_editor_user_switch() in /includes/functions-conditionals.php
	 */
	if ( ddw_tbex_is_block_editor_user_switch() ) {

		$classic_forget = ddw_tbex_is_classic_editor_plugin_active() ? '&classic-editor__forget' : '';

		/** Posts */
		$admin_bar->add_node(
			array(
				'id'     => 'new-post-with-classic-editor',
				'parent' => 'new-post',
				'title'  => esc_attr_x( 'New Post with Classic Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=post&classic-editor' . $classic_forget ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Post with Classic Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'new-post-with-block-editor',
				'parent' => 'new-post',
				'title'  => esc_attr_x( 'New Post with Block Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=post&block-editor' . $classic_forget ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Post with Block Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

		/** Pages */
		$admin_bar->add_node(
			array(
				'id'     => 'new-page-with-classic-editor',
				'parent' => 'new-page',
				'title'  => esc_attr_x( 'New Page with Classic Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=page&classic-editor' . $classic_forget ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Page with Classic Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'new-page-with-block-editor',
				'parent' => 'new-page',
				'title'  => esc_attr_x( 'New Page with Block Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=page&block-editor' . $classic_forget ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Page with Block Editor', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

	}  // end if (Block Editor switches)

	/** New Nav Menu */
	if ( ! is_network_admin() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-nav-menu',
				'parent' => 'new-content',
				'title'  => esc_attr_x( 'Nav Menu', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Nav Menu', 'Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function


add_filter( 'install_themes_tabs', 'ddw_tbex_theme_installer_upload_tab', 20, 1 );
/**
 * Add new "virtual" Tab on the Theme Installer page - using that for ZIP uploads.
 *
 * @since 1.3.0
 *
 * @param array $tabs Array of the Tabs on the Theme Installer admin page.
 * @return array Array of the filtered/ extended Tabs on the Theme Installer
 *               admin page.
 */
function ddw_tbex_theme_installer_upload_tab( array $tabs ) {

	/** Add our own new Tab */
	$tabs[ 'tbex-upload' ] = __( 'Upload Theme', 'toolbar-extras' );

	/** Return the array of all Tabs */
	return $tabs;

}  // end function


add_action( 'install_themes_pre_tbex-upload', 'ddw_tbex_theme_installer_pre_upload_tab' );
/**
 * Necessary inbetween step to set a value for the global $paged variable.
 *   This is needed to avoid any PHP errors/ notices.
 *
 * @since 1.3.5
 *
 * @global int $GLOBALS[ 'paged' ]
 */
function ddw_tbex_theme_installer_pre_upload_tab() {

	$GLOBALS[ 'paged' ] = 1;

}  // end function


add_action( 'install_themes_tbex-upload', 'ddw_tbex_theme_installer_upload_tab_content', 10, 1 );
/**
 * Render the content of our newly added Theme Installer Tab - using WordPress
 *   Core render function for the Theme ZIP file upload form.
 *
 *   Note I: The admin URL is then: 'theme-install.php?tab=tbex-upload'
 *
 *   Note II: We have to use inline styles that way, as wp_add_inline_style()
 *            does not work in this case here!
 *
 * @since 1.3.0
 * @since 1.3.5 Added missing $paged variable to avoid errors/ notices.
 *
 * @see ddw_tbex_inline_styles_theme_uploader_page()
 *
 * @uses install_themes_upload() WP Core function!
 *
 * @param string $paged
 */
function ddw_tbex_theme_installer_upload_tab_content( $paged ) {

	/** Add our few CSS styles inline to remove unwanted elements: */
	?>
		<style type="text/css">
			div.theme-browser.content-filterable,
			.wp-filter.hide-if-no-js,
			button.upload-view-toggle,
			span.spinner,
			p.no-themes {
				display: none !important;
			}
		</style>
	<?php

	/** Render the WordPress Core Themes uploader input form */
	echo '<div class="show-upload-view"><div class="upload-theme">';
		install_themes_upload();
	echo '</div></div>';

}  // end function


add_action( 'admin_menu', 'ddw_tbex_add_installer_upload_pages', 999 );
add_action( 'network_admin_menu', 'ddw_tbex_add_installer_upload_pages', 999 );
/**
 * Optionally add admin sub menu item on "Appearance" for Theme ZIP Upload and
 *   on "Plugins" for Plugin ZIP Upload - but only when in Dev Mode (by Toolbar
 *   Extras).
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_theme_installer_upload_tab_content()
 *
 * @uses ddw_tbex_use_devmode_uploader_menus()
 */
function ddw_tbex_add_installer_upload_pages() {

	/** Bail early if not in Dev Mode */
	if ( ! ddw_tbex_display_items_dev_mode()
		|| ! ddw_tbex_use_devmode_uploader_menus()
	) {
		return;
	}

	/** Theme ZIP uploader */
	if ( current_user_can( 'install_themes' )
		|| current_user_can( 'upload_themes' )	// Multisite only
	) {

		add_theme_page(
			esc_attr__( 'Theme Installer - Upload Theme', 'toolbar-extras' ),
			esc_attr__( 'Upload Theme ZIP', 'toolbar-extras' ),
			'edit_theme_options',
			network_admin_url( 'theme-install.php?tab=tbex-upload' )
		);

	}  // end if

	/** Plugin ZIP uploader */
	if ( current_user_can( 'install_plugins' )
		|| current_user_can( 'upload_plugins' )	// Multisite only
	) {

		add_plugins_page(
			esc_attr__( 'Plugin Installer - Upload Plugin', 'toolbar-extras' ),
			esc_attr__( 'Upload Plugin ZIP', 'toolbar-extras' ),
			'install_plugins',
			network_admin_url( 'plugin-install.php?tab=upload' )
		);

	}  // end if

}  // end function


add_filter( 'parent_file', 'ddw_tbex_parent_submenu_tweaks_tbex_uploaders' );
/**
 * When adding the additional Jetpack submenu items set the proper $parent_file
 *   and $submenu_file relationship for those items.
 *
 * @since 1.4.3
 *
 * @uses get_current_screen()
 *
 * @global string $GLOBALS[ 'submenu_file' ]
 *
 * @param string $parent_file The filename of the parent menu.
 * @return string $parent_file The tweaked filename of the parent menu.
 */
function ddw_tbex_parent_submenu_tweaks_tbex_uploaders( $parent_file ) {

	/** Bail early if not in Dev Mode */
	if ( ! ddw_tbex_display_items_dev_mode()
		|| ! ddw_tbex_use_devmode_uploader_menus()
	) {
		return $parent_file;
	}

	/** For: Plugin Uploader */
	if ( ( 'plugin-install' === get_current_screen()->id || 'plugin-install-network' === get_current_screen()->id )
		&& ( isset( $_GET[ 'tab' ] ) && 'upload' === sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) )
	) {

		$GLOBALS[ 'submenu_file' ] = esc_url( network_admin_url( 'plugin-install.php?tab=upload' ) );
		$parent_file = 'plugins.php';

	}  // end if

	/** For: Theme Uploader */
	if ( ( 'theme-install' === get_current_screen()->id || 'theme-install-network' === get_current_screen()->id )
		&& ( isset( $_GET[ 'tab' ] ) && 'tbex-upload' === sanitize_key( wp_unslash( $_GET[ 'tab' ] ) ) )
	) {

		$GLOBALS[ 'submenu_file' ] = esc_url( network_admin_url( 'theme-install.php?tab=tbex-upload' ) );
		$parent_file = 'themes.php';

	}  // end if

	return $parent_file;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_installer', 99 );
/**
 * Add Install Plugin & Themes items to WordPress "New Content" section in Toolbar.
 *
 * @since 1.0.0
 * @since 1.4.0 Added "Newest" plugins & themes items.
 * @since 1.4.3 Added ClassicPress integration.
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses ddw_tbex_is_classicpress_install()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_new_content_installer( $admin_bar ) {

	$addnewgroup = 'tbex-installer';

	/** Group: Install Plugins & Themes */
	$admin_bar->add_group(
		array(
			'parent' => 'new-content',
			'id'     => $addnewgroup,
		)
	);

	$tab_start  = ddw_tbex_is_classicpress_install() ? 'popular' : 'featured';
	$tab_search = ddw_tbex_is_classicpress_install() ? 'popular' : 'recommended';

	/** Install Plugins */
	$admin_bar->add_node(
			array(
			'parent' => $addnewgroup,
			'id'     => 'install-plugin',
			'title'  => esc_attr__( 'Install Plugin', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=' . $tab_start ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Plugin - Search via WordPress.org', 'toolbar-extras' )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'search-plugin-repo',
				'parent' => 'install-plugin',
				'title'  => esc_attr__( 'Search Plugin Directory', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=' . $tab_search ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search WordPress.org Plugin Directory', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-plugin-categories',
					'parent' => 'install-plugin',
					'title'  => esc_attr__( 'Search Categories', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=categories' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Search Categories (Plugin Tags)', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'upload-plugin-zip',
				'parent' => 'install-plugin',
				'title'  => esc_attr__( 'Upload ZIP file', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=upload' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Plugin - Upload ZIP file', 'toolbar-extras' )
				)
			)
		);

		/** For Dev Mode: Newest Plugins on WordPress.org */
		if ( ddw_tbex_display_items_dev_mode() && ! ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-plugin-newest',
					'parent' => 'install-plugin',
					'title'  => esc_attr__( 'Newest Plugins', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Newest Plugins added on WordPress.org', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Plugin support: "Cleaner Plugin Installer" (by myself :) */
		if ( defined( 'CLPINST_PLUGIN_BASEDIR' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-plugin-cpi-topics',
					'parent' => 'install-plugin',
					'title'  => esc_attr__( 'Topics, Use Cases, Tags', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=topics' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Install Plugins - Curated Topics, Use Cases, Plugin Tags (via WordPress.org)', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ! ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-plugin-favorites',
					'parent' => 'install-plugin',
					'title'  => esc_attr__( 'Install Favorites', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=favorites' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Install Plugins - Favorites (via WordPress.org)', 'toolbar-extras' )
					)
				)
			);

		}  // end if

	/** Install Themes */
	$admin_bar->add_node(
		array(
			'id'     => 'install-theme',
			'parent' => $addnewgroup,
			'title'  => esc_attr__( 'Install Theme', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'theme-install.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Theme - Search via WordPress.org', 'toolbar-extras' )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'search-theme-repo',
				'parent' => 'install-theme',
				'title'  => esc_attr__( 'Search Theme Directory', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'theme-install.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search WordPress Theme Directory', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'upload-theme-zip',
				'parent' => 'install-theme',
				'title'  => esc_attr__( 'Upload ZIP file', 'toolbar-extras' ),
				'href'   => ( function_exists( 'ddw_tbex_theme_installer_upload_tab_content' ) ) ? esc_url( network_admin_url( 'theme-install.php?tab=tbex-upload' ) ) : esc_url( network_admin_url( 'theme-install.php?upload' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Theme - Upload ZIP file', 'toolbar-extras' )
				)
			)
		);

		/** For Dev Mode: Newest Themes on WordPress.org */
		if ( ddw_tbex_display_items_dev_mode() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-theme-newest',
					'parent' => 'install-theme',
					'title'  => esc_attr__( 'Newest Themes', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'theme-install.php?browse=new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Newest Themes added on WordPress.org', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ! ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'install-theme-favorites',
					'parent' => 'install-theme',
					'title'  => esc_attr__( 'Install Favorites', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'theme-install.php?browse=favorites' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Install Theme - Favorites (via WordPress.org)', 'toolbar-extras' )
					)
				)
			);

		}  // end if

}  // end function
