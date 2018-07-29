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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_is_elementor_active()
 * @uses   ddw_tbex_string_elementor()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_new_content_types() {

	/** New Elementor Template Item */
	if ( ddw_tbex_is_elementor_active() ) {

		$template_title = sprintf(
			/* translators: %1$s - Word Elementor (page builder) */
			esc_attr_x( '%1$s Template', 'Toolbar New Content section', 'toolbar-extras' ),
			ddw_tbex_string_elementor()
		);

		$template_title_attr = sprintf(
			/* translators: %1$s - Word Elementor (page builder) */
			esc_attr_x( 'New %1$s Template', 'Toolbar New Content section', 'toolbar-extras' ),
			ddw_tbex_string_elementor()
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-elementor-template',
				'parent' => 'new-content',
				'title'  => $template_title,
				'href'   => esc_url( admin_url( 'post-new.php?post_type=elementor_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => $template_title_attr
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'et-page-with-builder',
					'parent' => 'tbex-elementor-template',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'page' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'et-section-with-builder',
					'parent' => 'tbex-elementor-template',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),	//ddw_tbex_string_newcontent_with_builder(),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) )		//ddw_tbex_string_newcontent_create_with_builder()
					)
				)
			);

		}  // end if

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'post' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'post-with-builder',
					'parent' => 'new-post',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'post' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder()
					)
				)
			);

		}  // end if

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'page' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'page-with-builder',
					'parent' => 'new-page',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'page' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder()
					)
				)
			);

		}  // end if

	}  // end if (Elementor active)

	/**
	 * Let hook in more items between "beginning" Elementor item and "closing" Nav Menu item.
	 */
	do_action( 'tbex_new_content_before_nav_menu' );

	/** New Nav Menu */
	if ( ! is_network_admin() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-nav-menu',
				'parent' => 'new-content',
				'title'  => esc_attr_x( 'Nav Menu', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new Nav Menu', 'Toolbar New Content section', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_filter( 'install_themes_tabs', 'ddw_tbex_theme_installer_upload_tab', 10, 1 );
/**
 * Add new "virtual" Tab on the Theme Installer page - using that for ZIP uploads.
 *
 * @since  1.3.0
 *
 * @param  array $tabs Array of the Tabs on the Theme Installer admin page.
 * @return array Array of the filtered/ extended Tabs on the Theme Installer
 *               admin page.
 */
function ddw_tbex_theme_installer_upload_tab( array $tabs ) {

	/** Add our own new Tab */
	$tabs[ 'tbex-upload' ] = __( 'Upload Theme', 'toolbar-extras' );

	/** Return the array of all Tabs */
	return $tabs;

}  // end function


add_action( 'install_themes_tbex-upload', 'ddw_tbex_theme_installer_upload_tab_content' );
/**
 * Render the content of our newly added Theme Installer Tab - using WordPress
 *   Core render function for the Theme ZIP file upload form.
 *   Note: The admin URL is then: 'theme-install.php?tab=tbex-upload'
 *
 * @since 1.3.0
 *
 * @uses  install_themes_upload()
 */
function ddw_tbex_theme_installer_upload_tab_content() {
	
	/** Add our few CSS styles inline to remove unwanted elements: */
	?>
		<style type="text/css">
	  		div.theme-browser.content-filterable,
			.wp-filter.hide-if-no-js,
  			button.upload-view-toggle,
  			span.spinner {
	  			display: none !important;
			}
		</style>
	<?php
  
  	/** Render the WordPress Core Themes uploader input form */
  	echo '<div class="show-upload-view"><div class="upload-theme">';
		install_themes_upload();
  	echo '</div></div>';
	
}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_installer', 99 );
/**
 * Add Install Plugin & Themes items to WordPress "New Content" section in Toolbar.
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_new_content_installer() {

	$addnewgroup = 'tbex-installer';

	/** Group: Install Plugins & Themes */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'parent' => 'new-content',
			'id'     => $addnewgroup,
		)
	);

	/** Install Plugins */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
			'parent' => $addnewgroup,
			'id'     => 'install-plugin',
			'title'  => esc_attr__( 'Install Plugin', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'plugin-install.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Plugin - Search via WordPress.org', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'search-plugin-repo',
				'parent' => 'install-plugin',
				'title'  => esc_attr__( 'Search Plugin Directory', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Search WordPress.org Plugin Directory', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		/** Plugin support: "Cleaner Plugin Installer" (by myself :) */
		if ( defined( 'CLPINST_PLUGIN_BASEDIR' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

	/** Install Themes */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

}  // end function