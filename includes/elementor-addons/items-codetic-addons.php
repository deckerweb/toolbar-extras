<?php

// includes/elementor-addons/items-codetic-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_codetic_addons', 100 );
/**
 * Items for Add-On: Essential Addons for Elementor Lite/Pro (by Codetic)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_codetic_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Check for active Pro version of the Add-On */
	$is_codetic_pro = ( in_array( 'essential-addons-elementor/essential_adons_elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) ? TRUE : FALSE;

	$codetic_title_attr = sprintf(
		/* translators: %1$s - Version "Lite" or "Pro" / %2$s - Type "free" or "Premium" */
		esc_attr__( 'Essential Addons for Elementor %1$s by Codetic (%2$s Add-On)', 'toolbar-extras' ),
		( $is_codetic_pro ) ? __( 'Pro', 'toolbar-extras' ) : __( 'Lite', 'toolbar-extras' ),
		( $is_codetic_pro ) ? __( 'Premium', 'toolbar-extras' ) : __( 'free', 'toolbar-extras' )
	);

	/** Codetic Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-codeticaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Codetic Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=eael-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $codetic_title_attr
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-codeticaddons-elements',
				'parent' => 'ao-codeticaddons',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=eael-settings#elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-codeticaddons-general',
				'parent' => 'ao-codeticaddons',
				'title'  => esc_attr__( 'General Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=eael-settings#general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Info', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Codetic Addons */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-codeticaddons-resources',
					'parent' => 'ao-codeticaddons',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( ! $is_codetic_pro ) {

				ddw_tbex_resource_item(
					'support-forum',
					'codeticaddons-support',
					'group-codeticaddons-resources',
					'https://wordpress.org/support/plugin/essential-addons-for-elementor-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'facebook-group',
				'codeticaddons-facebook',
				'group-codeticaddons-resources',
				'https://www.facebook.com/groups/essentialaddons/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'codeticaddons-docs',
				'group-codeticaddons-resources',
				'https://essential-addons.com/elementor/docs/'
			);

			if ( ! $is_codetic_pro ) {

				ddw_tbex_resource_item(
					'translations-community',
					'codeticaddons-translate',
					'group-codeticaddons-resources',
					'https://translate.wordpress.org/projects/wp-plugins/essential-addons-for-elementor-lite'
				);

			}  // end if

			if ( $is_codetic_pro ) {

				ddw_tbex_resource_item(
					'support-contact',
					'codeticaddons-contact',
					'group-codeticaddons-resources',
					'https://essential-addons.com/elementor/support/'
				);

			}  // end if

			ddw_tbex_resource_item(
				'github',
				'codeticaddons-github',
				'group-codeticaddons-resources',
				'https://github.com/rupok/essential-addons-elementor-lite'
			);

			ddw_tbex_resource_item(
				'official-site',
				'codeticaddons-site',
				'group-codeticaddons-resources',
				'https://essential-addons.com/elementor/'
			);

		}  // end if

}  // end function