<?php

// includes/elementor-addons/items-powerpack-elements

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_powerpack_elements', 100 );
/**
 * Items for Add-On: PowerPack Elements (Premium, by IdeaBox Creations)
 *
 * @since  1.0.0
 * @since  1.3.3 Namespaced classes in PowerPack Elements
 *
 * @uses   \PowerpackElements\Classes\PP_Admin_Settings::get_settings()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_powerpack_elements() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Get White Label settings from the PowerPack plugin */
	$pp_settings = array();

	if ( class_exists( '\PowerpackElements\Classes\PP_Admin_Settings' ) ) {

		$pp_settings = \PowerpackElements\Classes\PP_Admin_Settings::get_settings();

	} elseif ( class_exists( '\PP_Admin_Settings' ) ) {

		$pp_settings = \PP_Admin_Settings::get_settings();

	}  // end if

	$pp_name = ( '' == trim( $pp_settings[ 'plugin_name' ] ) ) ? 'PowerPack' : trim( $pp_settings[ 'plugin_name' ] );

	/** PowerPack Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-powerpack',
			'parent' => 'tbex-addons',
			/* translators: %s - Name of the Add-On plugin ("PowerPack) */
			'title'  => sprintf( esc_attr__( '%s Elements', 'toolbar-extras' ), $pp_name ),
			'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: %s - Name of the Add-On plugin ("PowerPack") */
				'title'  => ddw_tbex_string_premium_addon_title_attr( sprintf( __( '%s Elements', 'toolbar-extras' ), $pp_name ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-powerpack-elements',
				'parent' => 'ao-powerpack',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings&tab=modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		/** Show White Label settings only if not hidden */
		if ( 'off' === $pp_settings[ 'hide_wl_settings' ] ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-powerpack-whitelabel',
					'parent' => 'ao-powerpack',
					'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings&tab=white-label' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'White Label Branding', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-powerpack-general',
				'parent' => 'ao-powerpack',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=powerpack-settings&tab=general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for PowerPack Elements */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-powerpack-resources',
					'parent' => 'ao-powerpack',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'powerpack-support',
				'group-powerpack-resources',
				'https://powerpackelements.com/contact/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'powerpack-docs',
				'group-powerpack-resources',
				'https://powerpackelements.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'powerpack-translations',
				'group-powerpack-resources',
				'https://powerpackelements.com/translate/projects/powerpack/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'powerpack-site',
				'group-powerpack-resources',
				'https://powerpackelements.com/'
			);

		}  // end if

}  // end function