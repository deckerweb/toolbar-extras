<?php

// includes/plugins/items-php-code-snippets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_php_code_snippets', 15 );
/**
 * Site Group Items from Plugin: PHP Code Snippets (Insert PHP) (free, by Webcraftic)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_php_code_snippets() {

	/** PHP Code Snippets Items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elements-phpsnippets',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'PHP Snippets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=wbcr-snippets' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'PHP Snippets', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-phpsnippets-all',
				'parent' => 'elements-phpsnippets',
				'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=wbcr-snippets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-phpsnippets-new',
				'parent' => 'elements-phpsnippets',
				'title'  => esc_attr__( 'New Snippet', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=wbcr-snippets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Snippet', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-phpsnippets-import',
				'parent' => 'elements-phpsnippets',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=wbcr-snippets&page=export-wbcr_insert_php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-phpsnippets-settings',
				'parent' => 'elements-phpsnippets',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=wbcr-snippets&page=scrapes_settings-wbcr_insert_php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Code Snippets */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-phpsnippets-resources',
					'parent' => 'elements-phpsnippets',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'phpsnippets-support',
				'group-phpsnippets-resources',
				'https://wordpress.org/support/plugin/insert-php'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'phpsnippets-translate',
				'group-phpsnippets-resources',
				'https://translate.wordpress.org/projects/wp-plugins/insert-php'
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_php_code_snippet', 120 );
/**
 * Items for "New Content" section: New PHP Code Snippet
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.3.2
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_php_code_snippet( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $wp_admin_bar;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-wbcr-snippets',	// same as original!
			'parent' => 'new-content',
			'title'  => esc_attr__( 'PHP Snippet', 'toolbar-extras' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'PHP Snippet', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
