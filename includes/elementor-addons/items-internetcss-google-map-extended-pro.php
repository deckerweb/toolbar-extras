<?php

// includes/elementor-addons/items-internetcss-google-map-extended-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_icss_egmextpro', 100 );
/**
 * Items for Add-On: Elementor Google Map Extended Pro (Premium, by InternetCSS)
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_icss_egmextpro() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-icss-egmextpro',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Google Map Extended Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=icss_eb_extended' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Google Map Extended Pro', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-icss-egmextpro-settings',
				'parent' => 'ao-icss-egmextpro',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=icss_eb_extended' ) ),
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
					'id'     => 'group-icss-egmextpro-resources',
					'parent' => 'ao-icss-egmextpro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'icss-egmextpro-docs',
				'group-icss-egmextpro-resources',
				'https://internetcss.com/documentation/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'icss-egmextpro-facebook',
				'group-icss-egmextpro-resources',
				'https://www.facebook.com/groups/1181404975268306/'
			);
			
			ddw_tbex_resource_item(
				'official-site',
				'icss-egmextpro-site',
				'group-icss-egmextpro-resources',
				'https://internetcss.com/store/elementor-google-map-extended-pro/'
			);

		}  // end if

}  // end function