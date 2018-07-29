<?php

// includes/elementor-addons/items-ultimate-addons-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_uael', 100 );
/**
 * Items for Add-On: Ultimate Addons for Elementor (Premium, by Brainstorm Force)
 *
 * @since  1.0.0
 *
 * @uses   \UltimateElementor\Classes\UAEL_Helper::get_white_labels()
 * @uses   ddw_tbex_display_uael_witelabel()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_uael() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Respect Ultimate Addons White Labeling */
	$uael_whitelabel  = \UltimateElementor\Classes\UAEL_Helper::get_white_labels();
	$uael_plugin_name = ( ! empty( $uael_whitelabel[ 'plugin' ][ 'name' ] ) ) ? $uael_whitelabel[ 'plugin' ][ 'name' ] : esc_attr__( 'Ultimate Addons', 'toolbar-extras' );
	$uael_title_attr  = ( ! empty( $uael_whitelabel[ 'plugin' ][ 'name' ] ) ) ? $uael_whitelabel[ 'plugin' ][ 'name' ] : ddw_tbex_string_premium_addon_title_attr( __( 'Ultimate Addons for Elementor', 'toolbar-extras' ) );


	/** Extras Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-uael',
			'parent' => 'tbex-addons',
			'title'  => $uael_plugin_name,
			'href'   => esc_url( admin_url( 'options-general.php?page=uael' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $uael_title_attr
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-uael-widgets',
				'parent' => 'ao-uael',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=uael' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		/** Google Maps module with extra settings */
		$module_gmap = \UltimateElementor\Classes\UAEL_Helper::get_admin_settings_option( '_uael_widgets' );

		if ( 'disabled' !== $module_gmap[ 'GoogleMap' ] ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-uael-googlemaps',
					'parent' => 'ao-uael',
					'title'  => esc_attr__( 'Google Map Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=uael&action=integration' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Google Map Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Only show white label settings if they are not hidden */
		if ( ! ddw_tbex_hide_uael_witelabel() ) {

			if ( '1' !== $uael_whitelabel[ 'agency' ][ 'hide_branding' ] ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-uael-whitelabel',
						'parent' => 'ao-uael',
						'title'  => esc_attr__( 'Whitelabel Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=uael&action=branding' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Whitelabel Settings', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if

		/** Group: Resources for Ultimate Addons */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-uael-resources',
					'parent' => 'ao-uael',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'uael-kb-docs',
				'group-uael-resources',
				'https://uaelementor.com/docs/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'uael-support',
				'group-uael-resources',
				'https://uaelementor.com/support/'
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'uael-translations-pro',
				'group-uael-resources',
				'https://translate.brainstormforce.com/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'uael-site',
				'group-uael-resources',
				'https://uaelementor.com/'
			);

		}  // end if

}  // end function