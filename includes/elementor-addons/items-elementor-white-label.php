<?php

// includes/elementor-addons/items-elementor-white-label

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Elementor White Label Pro plugin is active or not.
 *
 * @since 1.3.1
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_elementor_whitelabel_pro_active() {

	return defined( 'ELEMENTOR_WHITE_LABEL_PRO_VER' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementor_white_label', 100 );
/**
 * Items for Add-Ons:
 *   - Elementor White Label (free, by Nam Truong, PhoenixDigi Việt Nam)
 *   - Elementor White Label Pro (Premium, by Nam Truong, PhoenixDigi Việt Nam)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementor_white_label( $admin_bar ) {

	/** Get the plugin's settings */
	$ewl_settings = get_option( 'ewl_settings' );

	/** Bail early if plugin's admin settings are hidden */
	if ( ddw_tbex_is_elementor_whitelabel_pro_active()
		&& 'on' === $ewl_settings[ 'hide_ewl_setting_page' ] ) {
		return $admin_bar;
	}

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$url   = 'admin.php?page=elementor-white-label';
	$title = ddw_tbex_string_addon_title_attr( __( 'Elementor White Label', 'toolbar-extras' ) );

	if ( ddw_tbex_is_elementor_whitelabel_pro_active() ) {

		$url   = 'admin.php?page=elementor-white-label-pro';
		$title = ddw_tbex_string_premium_addon_title_attr( __( 'Elementor White Label', 'toolbar-extras' ) );

	}  // end if

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-elewl',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elementor White Label', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( $url ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elewl-settings',
				'parent' => 'ao-elewl',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( $url ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-elewl-resources',
					'parent' => 'ao-elewl',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'github-issues',
				'elewl-github-issues',
				'group-elewl-resources',
				'https://github.com/namncn/elementor-white-label/issues'
			);

			ddw_tbex_resource_item(
				'official-site',
				'elewl-site',
				'group-elewl-resources',
				'https://namncn.com/plugins/elementor-white-label/'
			);

		}  // end if

}  // end function
