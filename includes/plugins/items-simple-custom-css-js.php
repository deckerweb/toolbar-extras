<?php

// includes/plugins/items-simple-custom-css-js

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_simple_custom_css_js', 15 );
/**
 * Site Group Items from Plugin:
 *   Simple Custom CSS and JS (free/Pro, by Diana Burduja)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_cpt()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_simple_custom_css_js( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'elements-sccssjs',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Custom Code', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=custom-css-js' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Custom Code', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'elements-sccssjs-all',
				'parent' => 'elements-sccssjs',
				'title'  => esc_attr__( 'All Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=custom-css-js' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Code', 'toolbar-extras' ),
				)
			)
		);

		/** CSS */
		$admin_bar->add_node(
			array(
				'id'     => 'elements-sccssjs-css',
				'parent' => 'elements-sccssjs',
				'title'  => esc_attr__( 'CSS Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CSS Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-css-all',
					'parent' => 'elements-sccssjs-css',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'CSS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=css' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'CSS', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-css-new',
					'parent' => 'elements-sccssjs-css',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=css' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
					)
				)
			);

		/** JS */
		$admin_bar->add_node(
			array(
				'id'     => 'elements-sccssjs-js',
				'parent' => 'elements-sccssjs',
				'title'  => esc_attr__( 'JS Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=js' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'JS Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-js-all',
					'parent' => 'elements-sccssjs-js',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'JS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=js' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'JS', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-js-new',
					'parent' => 'elements-sccssjs-js',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=js' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
					)
				)
			);

		/** HTML */
		$admin_bar->add_node(
			array(
				'id'     => 'elements-sccssjs-html',
				'parent' => 'elements-sccssjs',
				'title'  => esc_attr__( 'HTML Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=html' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'HTML Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-html-all',
					'parent' => 'elements-sccssjs-html',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'HTML', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'edit.php?s&post_status=all&post_type=custom-css-js&action=-1&m=0&language_filter=html' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'HTML', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'elements-sccssjs-html-new',
					'parent' => 'elements-sccssjs-html',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=html' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
					)
				)
			);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'elements-sccssjs-settings',
				'parent' => 'elements-sccssjs',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=custom-css-js&page=custom-css-js-config' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Resources for Custom Code */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-sccssjs-resources',
				'parent' => 'elements-sccssjs',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		/** Pro Version Docs */
		if ( class_exists( 'CustomCSSandJSpro' ) ) {

			ddw_tbex_resource_item(
				'documentation',
				'sccssjs-docs',
				'group-sccssjs-resources',
				'https://www.silkypress.com/simple-custom-css-js-pro-documentation/'
			);

		}  // end if

		ddw_tbex_resource_item(
			'support-forum',
			'sccssjs-support',
			'group-sccssjs-resources',
			'https://wordpress.org/support/plugin/custom-css-js'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'sccssjs-translate',
			'group-sccssjs-resources',
			'https://translate.wordpress.org/projects/wp-plugins/custom-css-js'
		);

		ddw_tbex_resource_item(
			'official-site',
			'sccssjs-site',
			'group-sccssjs-resources',
			'https://www.silkypress.com/simple-custom-css-js-pro/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_simple_custom_css_js' );
/**
 * Items for "New Content" section: New CSS/JS/HTML Code
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_cpt()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_simple_custom_css_js( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'new-sccssjs-css',
			'parent' => 'new-custom-css-js',
			'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=css' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-sccssjs-js',
			'parent' => 'new-custom-css-js',
			'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=js' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'new-sccssjs-html',
			'parent' => 'new-custom-css-js',
			'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=custom-css-js&language=html' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_sccssjs_designer', 15 );
/**
 * User items for Plugin: SCCSSJS Web Designer
 *
 * @since 1.0.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_user_items_sccssjs_designer( $admin_bar ) {

	/** Optional: Web Desiger Users (SCCSSJS) */
	$sccssjs_designer = get_users( array( 'role' => 'css_js_designer' ) );

	if ( ! empty( $sccssjs_designer ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'user-sccssjs-designer',
				'parent' => 'group-tbex-users',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'Web Designers', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'users.php?role=css_js_designer' ) ),
				'meta'   => array(
					'class'  => 'tbex-users',
					'target' => '',
					'title'  => esc_attr__( 'Web Designers', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function
