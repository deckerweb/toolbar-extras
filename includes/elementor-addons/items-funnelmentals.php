<?php

// includes/elementor-addons/items-funnelmentals

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_funnelmentals', 100 );
/**
 * Items for Add-On: Funnelmentals (Premium) (free/Premium, by Web Disrupt)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_funnelmentals() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-funnelmentals',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Funnelmentals', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=funnelmentals-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Funnelmentals', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-funnelmentals-settings',
				'parent' => 'ao-funnelmentals',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=funnelmentals-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-funnelmentals-resources',
					'parent' => 'ao-funnelmentals',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'funnelmentals-support',
				'group-funnelmentals-resources',
				'https://wordpress.org/support/plugin/web-disrupt-funnelmentals'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'funnelmentals-translate',
				'group-funnelmentals-resources',
				'https://translate.wordpress.org/projects/wp-plugins/web-disrupt-funnelmentals'
			);

			ddw_tbex_resource_item(
				'official-site',
				'funnelmentals-site',
				'group-funnelmentals-resources',
				'https://webdisrupt.com/funnelmentals/'
			);

		}  // end if

}  // end function