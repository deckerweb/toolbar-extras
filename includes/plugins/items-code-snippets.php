<?php

// includes/plugins/items-code-snippets

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_codesnippets', 15 );
/**
 * Site Group Items from Plugin: Code Snippets (free, by Shea Bunge)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_codesnippets() {

	/** Code Snippets Items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elements-codesnippets',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Code Snippets', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=snippets' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Code Snippets', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-codesnippets-all',
				'parent' => 'elements-codesnippets',
				'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=snippets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-codesnippets-new',
				'parent' => 'elements-codesnippets',
				'title'  => esc_attr__( 'New Snippet', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=add-snippet' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Snippet', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-codesnippets-import',
				'parent' => 'elements-codesnippets',
				'title'  => esc_attr__( 'Import Snippets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=import-snippets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Snippets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-codesnippets-settings',
				'parent' => 'elements-codesnippets',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=snippets-settings' ) ),
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
					'id'     => 'group-codesnippets-resources',
					'parent' => 'elements-codesnippets',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'codesnippets-support',
				'group-codesnippets-resources',
				'https://wordpress.org/support/plugin/code-snippets'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'codesnippets-translate',
				'group-codesnippets-resources',
				'https://translate.wordpress.org/projects/wp-plugins/code-snippets'
			);

			ddw_tbex_resource_item(
				'github',
				'codesnippets-github',
				'group-codesnippets-resources',
				'https://github.com/sheabunge/code-snippets/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'codesnippets-site',
				'group-codesnippets-resources',
				'https://bungeshea.com/plugins/code-snippets/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_aoitems_new_content_code_snippet', 15 );
/**
 * Items for "New Content" section: New Code Snippet
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_code_snippet() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-code-snippet',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Code Snippet', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=add-snippet' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Add new Code Snippet', 'Toolbar New Content section', 'toolbar-extras' )
			)
		)
	);

}  // end function