<?php

// includes/plugins-forms/items-safe-redirect-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_safe_redirect_manager', 35 );
/**
 * Items for Plugin: Safe Redirect Manager (free, by 10up)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_safe_redirect_manager() {

	/** For: Tools */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'safe-redirect-manager',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr_x( 'Safe Redirect Manager', 'A plugin name', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=redirect_rule' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Safe Redirect Manager', 'A plugin name', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'safe-redirect-manager-all',
				'parent' => 'safe-redirect-manager',
				'title'  => esc_attr__( 'All Redirect Rules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=redirect_rule' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Redirect Rules', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'safe-redirect-manager-new',
				'parent' => 'safe-redirect-manager',
				'title'  => esc_attr__( 'New Redirect Rule', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=redirect_rule' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Redirect Rule', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-saferedirects-resources',
					'parent' => 'safe-redirect-manager',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'saferedirects-support',
				'group-saferedirects-resources',
				'https://wordpress.org/support/plugin/safe-redirect-manager'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'saferedirects-translate',
				'group-saferedirects-resources',
				'https://translate.wordpress.org/projects/wp-plugins/safe-redirect-manager'
			);

		}  // end if

}  // end function
