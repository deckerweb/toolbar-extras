<?php

//items-wp-new-content

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
					'id'     => 'et-with-builder',
					'parent' => 'tbex-elementor-template',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elementor_library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_newcontent_create_with_builder()
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
						'target' => '',
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
						'target' => '',
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
			'title'  => __( 'Install Plugin', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'plugin-install.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => __( 'Install Plugin - Search via WordPress.org', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-plugin',
				'id'     => 'search-plugin-repo',
				'title'  => __( 'Search Plugin Directory', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Search WordPress.org Plugin Directory', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-plugin',
				'id'     => 'upload-plugin-zip',
				'title'  => __( 'Upload ZIP file', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=upload' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Install Plugin - Upload ZIP file', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-plugin',
				'id'     => 'install-plugin-favorites',
				'title'  => __( 'Install Favorites', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'plugin-install.php?tab=favorites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Install Plugins - Favorites (via WordPress.org)', 'toolbar-extras' )
				)
			)
		);

	/** Install Themes */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'parent' => $addnewgroup,
			'id'     => 'install-theme',
			'title'  => __( 'Install Theme', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'theme-install.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => __( 'Install Theme - Search via WordPress.org', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-theme',
				'id'     => 'search-theme-repo',
				'title'  => __( 'Search Theme Directory', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'theme-install.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Search WordPress Theme Directory', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-theme',
				'id'     => 'install-theme-favorites',
				'title'  => __( 'Install Favorites', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'theme-install.php?browse=favorites' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Install Theme - Favorites (via WordPress.org)', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'parent' => 'install-theme',
				'id'     => 'upload-theme-zip',
				'title'  => __( 'Upload ZIP file', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'theme-install.php?upload' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => __( 'Install Theme - Upload ZIP file', 'toolbar-extras' )
				)
			)
		);

}  // end function