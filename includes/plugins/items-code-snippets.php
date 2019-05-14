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


/**
 * Conditional whether to use the listing of snippets from Code Snippets plugin
 *   as sub items or not.
 *
 *   Note: For installs with many snippets (15+) it makes no sense to list them,
 *         as very long lists make the Toolbar quite unusable.
 *
 * @todo settings integration (1.5.0)
 *
 * @since 1.4.3
 */
function ddw_tbex_use_codesnippets_listing() {

	/*
		return ( ( 'yes' === ddw_tbex_get_option( 'tweaks', 'use_codesnippets_listing' ) )
			|| apply_filters( 'tbex_filter_codesnippets_listing', TRUE ) );
	*/

	return ( apply_filters( 'tbex_filter_codesnippets_listing', FALSE ) );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_codesnippets', 15 );
/**
 * Site Group Items from Plugin: Code Snippets (free, by Shea Bunge)
 *
 * @since 1.0.0
 * @since 1.4.3 Added group with individual snippets as items.
 *
 * @uses ddw_tbex_use_codesnippets_listing()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
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
				'title'  => esc_attr__( 'Code Snippets', 'toolbar-extras' ),
			)
		)
	);

		/** Only if wanted list Code Snippets as items */
		if ( /* apply_filters( 'tbex_filter_codesnippets_listing', TRUE ) */	ddw_tbex_use_codesnippets_listing() && function_exists( 'get_snippets' ) ) {

			/**
			 * Add each individual snippet as an item. Database query is necessary.
			 * @since 1.4.3
			 * @uses get_snippets() by Code Snippets plugin
			 */
	    	$snippets = get_snippets();

			/** Proceed only if there are any snippets */
			if ( $snippets ) {

				/** Add group */
				$GLOBALS[ 'wp_admin_bar' ]->add_group(
					array(
						'id'     => 'group-codesnippets-edit-snippets',
						'parent' => 'elements-codesnippets',
					)
				);

				foreach ( $snippets as $snippet ) {

					$snippet_id    = absint( $snippet->id );
					/* translators: %d - ID of a snippet, for example 17 */
					$snippet_title = empty( $snippet->name ) ? sprintf( __( 'Untitled #%d', 'toolbar-extras' ), $snippet_id ) : esc_attr( $snippet->name );

					/** Add item per snippet */
					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'elements-codesnippets-snippet-' . $snippet_id,
							'parent' => 'group-codesnippets-edit-snippets',
							'title'  => $snippet_title,
							'href'   => esc_url( admin_url( 'admin.php?page=edit-snippet&id=' . $snippet_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Snippet', 'toolbar-extras' ) . ': ' . $snippet_title,
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'elements-codesnippets-snippet-' . $snippet_id . '-edit',
								'parent' => 'elements-codesnippets-snippet-' . $snippet_id,
								'title'  => esc_attr__( 'Snippet Editor', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=edit-snippet&id=' . $snippet_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Snippet Editor', 'toolbar-extras' ),
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'elements-codesnippets-snippet-' . $snippet_id . '-clone',
								'parent' => 'elements-codesnippets-snippet-' . $snippet_id,
								'title'  => esc_attr__( 'Clone Snippet', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=snippets&action=clone&id=' . $snippet_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Clone Snippet', 'toolbar-extras' ),
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'elements-codesnippets-snippet-' . $snippet_id . '-export',
								'parent' => 'elements-codesnippets-snippet-' . $snippet_id,
								'title'  => esc_attr__( 'Export Snippet', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=snippets&action=export&id=' . $snippet_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Export Snippet', 'toolbar-extras' ),
								)
							)
						);

				}  // end foreach Items loop

			}  // end if Snippets check

		}  // end if Listing check

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-codesnippets-all',
				'parent' => 'elements-codesnippets',
				'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=snippets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Snippets', 'toolbar-extras' ),
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
					'title'  => esc_attr__( 'New Snippet', 'toolbar-extras' ),
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
					'title'  => esc_attr__( 'Import Snippets', 'toolbar-extras' ),
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
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for Code Snippets */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-codesnippets-resources',
					'parent' => 'elements-codesnippets',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'codesnippets-support',
				'group-codesnippets-resources',
				'https://wordpress.org/support/plugin/code-snippets'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'codesnippets-facebook-group',
				'group-codesnippets-resources',
				'https://www.facebook.com/groups/codesnippetsplugin/'
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
 * @since 1.0.0
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
