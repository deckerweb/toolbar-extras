<?php

// includes/elementor-addons/items-powerpack-wlbfe

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_powerpack_wlbfe', 100 );
/**
 * Items for Add-On: White Label Branding for Elementor (Premium, by IdeaBox Creations)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_powerpack_wlbfe() {

	/** Get the plugin's settings */
	$wlbfe_settings = get_option( '_el_whitelabel' );

	/** Bail early if plugin's admin settings are hidden */
	if ( 'on' === $wlbfe_settings[ 'hide_wl_admin_menu' ] ) {
		return;
	}

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** White Label Branding for Elementor Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-wlbfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=el-wl-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'White Label', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-wlbfe-branding',
				'parent' => 'ao-wlbfe',
				'title'  => esc_attr__( 'Branding', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=el-wl-settings#el-wl-branding' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Branding', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-wlbfe-adminlinks',
				'parent' => 'ao-wlbfe',
				'title'  => esc_attr__( 'Admin Links', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=el-wl-settings#el-wl-admin-links' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Admin Links', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-wlbfe-ghostmode',
				'parent' => 'ao-wlbfe',
				'title'  => esc_attr__( 'Ghost Mode', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=el-wl-settings#el-wl-ghost-mode' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ghost Mode', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-wlbfe-license',
				'parent' => 'ao-wlbfe',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=el-wl-settings#el-wl-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for White Label Branding for Elementor */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-wlbfe-resources',
					'parent' => 'ao-wlbfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'wlbfe-support',
				'group-wlbfe-resources',
				'https://powerpackelements.com/contact/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wlbfe-site',
				'group-wlbfe-resources',
				'https://powerpackelements.com/white-label-branding-elementor/'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_aotweaks_tweak_elementor_branding', 1 );
/**
 * Conditionally remove Elementor-related items of "Toolbar Extras" plugin from
 *   the Toolbar, depending on settings from plugin "White Label Branding for
 *   Elementor".
 *
 * @since  1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aotweaks_tweak_elementor_branding() {

	/** Get the plugin's settings */
	$wlbfe_settings = get_option( '_el_whitelabel' );

	/** Elementor My Templates */
	if ( 'on' === $wlbfe_settings[ 'hide_my_templates' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-library' );
	}

	/** Elementor Settings */
	if ( 'on' === $wlbfe_settings[ 'hide_settings_page' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-settings' );
	}

	/** Elementor Tools */
	if ( 'on' === $wlbfe_settings[ 'hide_tools' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-tools' );
	}

	/** Elementor System Info */
	if ( 'on' === $wlbfe_settings[ 'hide_sys_info' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-tools-system-info' );
	}

	/** Elementor Role Manager */
	if ( 'on' === $wlbfe_settings[ 'hide_role_manager' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-settings-roles' );	// Build Group
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-role-manager' );	// User Group
	}

	/** Elementor Pro: Custom Fonts */
	if ( 'on' === $wlbfe_settings[ 'hide_custom_fonts' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'group-elementor-fonts' );
	}

	/** Elementor Pro: License */
	if ( 'on' === $wlbfe_settings[ 'hide_license_page' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'elementor-tools-license' );
	}

}  // end function