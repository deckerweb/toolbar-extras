<?php

// includes/elementor-addons/items-internetcss-google-map-extended

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_icss_egmext', 100 );
/**
 * Items for Add-On: Elementor Google Map Extended (free, by InternetCSS)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_icss_egmext() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-icss-egmext',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Google Map Extended', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=eb_google_map_setting' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Google Map Extended', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-icss-egmext-settings',
				'parent' => 'ao-icss-egmext',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=eb_google_map_setting' ) ),
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
					'id'     => 'group-icss-egmext-resources',
					'parent' => 'ao-icss-egmext',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'icss-egmext-support',
				'group-icss-egmext-resources',
				'https://wordpress.org/support/plugin/extended-google-map-for-elementor'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'icss-egmext-facebook',
				'group-icss-egmext-resources',
				'https://www.facebook.com/groups/1181404975268306/'
			);
			
			ddw_tbex_resource_item(
				'translations-community',
				'icss-egmext-translate',
				'group-icss-egmext-resources',
				'https://translate.wordpress.org/projects/wp-plugins/extended-google-map-for-elementor'
			);

		}  // end if

}  // end function