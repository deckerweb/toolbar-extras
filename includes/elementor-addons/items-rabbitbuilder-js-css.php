<?php

// includes/elementor-addons/items-rabbitbuilder-js-css

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_rabbitbuilder_js_css', 100 );
/**
 * Add-On Items from Plugin:
 *   RabbitBuilder Global Central JS CSS (free, by RabbitBuilder)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_cpt()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_rabbitbuilder_js_css( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'ao-rabbitbuilder-jscss',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Global Central JS CSS', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'RabbitBuilder Global Central JS CSS for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-rabbitbuilder-jscss-all',
				'parent' => 'ao-rabbitbuilder-jscss',
				'title'  => esc_attr__( 'All Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Code', 'toolbar-extras' ),
				)
			)
		);

		/** CSS */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-rabbitbuilder-jscss-css',
				'parent' => 'ao-rabbitbuilder-jscss',
				'title'  => esc_attr__( 'CSS Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CSS Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-css-all',
					'parent' => 'ao-rabbitbuilder-jscss-css',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'CSS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=css' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'CSS', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-new',
					'parent' => 'ao-rabbitbuilder-jscss-css',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=css' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
					)
				)
			);

		/** JS */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-rabbitbuilder-jscss-js',
				'parent' => 'ao-rabbitbuilder-jscss',
				'title'  => esc_attr__( 'JS Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=js' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'JS Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-js-all',
					'parent' => 'ao-rabbitbuilder-jscss-js',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'JS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=js' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'JS', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-js-new',
					'parent' => 'ao-rabbitbuilder-jscss-js',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=js' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
					)
				)
			);

		/** HTML */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-rabbitbuilder-jscss-html',
				'parent' => 'ao-rabbitbuilder-jscss',
				'title'  => esc_attr__( 'HTML Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=html' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'HTML Code', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-html-all',
					'parent' => 'ao-rabbitbuilder-jscss-html',
					'title'  => ddw_tbex_string_cpt( 'all', __( 'HTML', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&type=html' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'all', __( 'HTML', 'toolbar-extras' ) ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-rabbitbuilder-jscss-html-new',
					'parent' => 'ao-rabbitbuilder-jscss-html',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
					'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=html' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
					)
				)
			);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-rbcode-resources',
				'parent' => 'ao-rabbitbuilder-jscss',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'rbcode-support',
			'group-rbcode-resources',
			'https://wordpress.org/support/plugin/rabbitbuilder-global-central-js-css'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'rbcode-translate',
			'group-rbcode-resources',
			'https://translate.wordpress.org/projects/wp-plugins/rabbitbuilder-global-central-js-css'
		);

	}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_rabbitbuilder_js_css' );
/**
 * Items for "New Content" section: New CSS/JS/HTML Code
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_cpt()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_rabbitbuilder_js_css() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-new-rabbitbuilder-code',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Global Central Code', 'toolbar-extras' ),
			'href'   => FALSE,
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Global Central Code', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-new-rabbitbuilder-code-css',
				'parent' => 'tbex-new-rabbitbuilder-code',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'CSS', 'toolbar-extras' ) ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-new-rabbitbuilder-code-js',
				'parent' => 'tbex-new-rabbitbuilder-code',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=js' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'JS', 'toolbar-extras' ) ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-new-rabbitbuilder-code-html',
				'parent' => 'tbex-new-rabbitbuilder-code',
				'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=rabbitbuilder_js_css&action=new&type=html' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_cpt( 'new', __( 'HTML', 'toolbar-extras' ) ),
				)
			)
		);

}  // end function
