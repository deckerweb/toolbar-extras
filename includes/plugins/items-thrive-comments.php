<?php

// includes/plugins/items-thrive-comments

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_wpcomments_items_thrive_comments_moderation', 5 );
/**
 * Items for Plugin: Thrive Comments (Premium, by Thrive Themes)
 *   If "Thrive Comments" plugin is active repleace the original WP Comments
 *   admin URL with the Thrive Comments Moderation queue admin URL.
 *   Note: Existing Toolbar nodes get filtered.
 *
 * @since 1.4.0
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_wpcomments_items_thrive_comments_moderation( $wp_admin_bar ) {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'comments',			// same as original!
			'href'   => esc_url( admin_url( 'edit-comments.php?page=tcm_comment_moderation' ) ),
			'meta'   => array(
				'class'  => 'tbex-thrive-comments',
				'title'  => esc_attr__( 'Thrive Comments Moderation', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_wpcomments_items_thrive_comments', 15 );
/**
 * WPComments items for plugin: Thrive Comments (Premium, by Thrive Themes)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_display_items_wpcomments()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_wpcomments_items_thrive_comments() {

	/** Items from Thrive Comments */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-thrive-comments',
			'parent' => 'comments'		// same as original
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'thrive-comments',
			'parent' => 'group-thrive-comments',
			'title'  => esc_attr__( 'Thrive Comments', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit-comments.php?page=tcm_comment_moderation' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Thrive Comments', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'thrive-comments-moderate',
				'parent' => 'thrive-comments',
				'title'  => esc_attr__( 'Moderate', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-comments.php?page=tcm_comment_moderation' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Moderate', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'thrive-comments-reports',
				'parent' => 'thrive-comments',
				'title'  => esc_attr__( 'Reports', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=tcm_admin_dashboard#reports' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Reports', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'thrive-comments-settings',
				'parent' => 'thrive-comments',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=tcm_admin_dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-thrivecomments-resources',
					'parent' => 'thrive-comments',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'thrivecomments-kb-docs',
				'group-thrivecomments-resources',
				'https://thrivethemes.com/thrive-knowledge-base/thrive-comments/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'thrivecomments-site',
				'group-thrivecomments-resources',
				'https://thrivethemes.com/comments/'
			);

		}  // end if

	/** (Original) WP Comments - all */
	if ( ! ddw_tbex_display_items_wpcomments() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wp-comments-all',
				'parent' => 'comments',	// same as original
				'title'  => esc_attr__( 'All Comments', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-comments.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Comments', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function
