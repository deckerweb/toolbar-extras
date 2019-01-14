<?php

// includes/plugins-genesis/items-cobalt-genesis-extender

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_extender', 102 );
/**
 * Items for Add-On: Genesis Extender (Premium, by Cobalt Apps)
 *
 * @since 1.1.1
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_extender() {

	$is_new = ( defined( 'GENEXT_VERSION' ) && version_compare( GENEXT_VERSION, '1.9.0', '>=' ) ) ? TRUE : FALSE;

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ca-gextender',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Genesis Extender', 'toolbar-extras' ),
			'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=genesis-extender-dashboard' ) ) : esc_url( admin_url( 'admin.php?page=genesis-extender-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Extender', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-gextender-custom',
				'parent' => 'ca-gextender',
				'title'  => esc_attr__( 'Custom CSS &amp; Code', 'toolbar-extras' ),
				'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=genesis-extender-custom' ) ) : esc_url( admin_url( 'admin.php?page=genesis-extender-custom' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom CSS &amp; Code', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-gextender-image-manager',
				'parent' => 'ca-gextender',
				'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
				'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=genesis-extender-image-manager' ) ) : esc_url( admin_url( 'admin.php?page=genesis-extender-custom&activetab=genesis-extender-custom-options-nav-image-uploader' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-gextender-import-export',
				'parent' => 'ca-gextender',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=genesis-extender-dashboard#genesis-extender-settings-nav-import-export' ) ) : esc_url( admin_url( 'admin.php?page=genesis-extender-settings&activetab=genesis-extender-settings-nav-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-gextender-general',
				'parent' => 'ca-gextender',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=genesis-extender-dashboard#genesis-extender-settings-nav-general' ) ) : esc_url( admin_url( 'admin.php?page=genesis-extender-settings&activetab=genesis-extender-settings-nav-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Genesis Extender */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gextender-resources',
					'parent' => 'ca-gextender',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'gextender-contact',
				'group-gextender-resources',
				'https://cobaltapps.com/my-account/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gextender-docs',
				'group-gextender-resources',
				'https://docs.cobaltapps.com/collection/376-extender'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'gextender-forums',
				'group-gextender-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function
