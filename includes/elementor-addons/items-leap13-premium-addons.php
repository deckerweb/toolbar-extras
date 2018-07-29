<?php

// includes/elementor-addons/items-leap13-premium-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if (Leap13) Premium Addons Pro Add-On plugin is active or not.
 *
 * @since  1.3.2
 *
 * @return bool TRUE if constant defined, otherwise FALSE.
 */
function ddw_tbex_is_l13pa_pro_active() {

	return ( defined( 'PREMIUM_PRO_ADDONS_VERSION' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_leap13_premium_addons', 100 );
/**
 * Items for Add-On: Premium Addons for Elementor (free, by Leap13)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_leap13_premium_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Set default title (attribute) */
	$l13pa_title      = esc_attr__( 'Premium Addons', 'toolbar-extras' );
	$l13pa_title_attr = ddw_tbex_string_addon_title_attr( __( 'Premium Addons for Elementor', 'toolbar-extras' ) );

	/** Get white label settings from Pro version */
	$l13pa_whitelabel = get_option( 'pa_wht_lbl_save_settings' );

	/** Respect white label if set */
	if ( $l13pa_whitelabel && ! empty( $l13pa_whitelabel[ 'premium-wht-lbl-plugin-name' ] ) ) {
		
		$l13pa_title      = esc_attr( $l13pa_whitelabel[ 'premium-wht-lbl-plugin-name' ] );
		$l13pa_title_attr = $l13pa_title;

	}  // end if

	/** Premium Addons Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-l13pa',
			'parent' => 'tbex-addons',
			'title'  => $l13pa_title,
			'href'   => esc_url( admin_url( 'admin.php?page=premium-addons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $l13pa_title_attr
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-elements',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_l13pa_pro_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-l13pa-pro-elements',
					'parent' => 'ao-l13pa',
					'title'  => esc_attr__( 'Pro Elements', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-pro-elems' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Pro Elements', 'toolbar-extras' )
					)
				)
			);

			if ( $l13pa_whitelabel && 0 == $l13pa_whitelabel[ 'premium-wht-lbl-option' ] ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-l13pa-pro-whitelabel',
						'parent' => 'ao-l13pa',
						'title'  => esc_attr__( 'White Labeling', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-pro-white-label' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'White Labeling', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-gmaps',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-maps' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-versioncontrol',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-version' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Version Control', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-l13pa-systeminfo',
				'parent' => 'ao-l13pa',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-sys' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_l13pa_pro_active() ) {

			if ( $l13pa_whitelabel && 0 == $l13pa_whitelabel[ 'premium-wht-lbl-license' ] ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-l13pa-pro-license',
						'parent' => 'ao-l13pa',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=premium-addons-pro-license' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'License', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if

		/** Group: Resources for Premium Addons */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-l13pa-resources',
					'parent' => 'ao-l13pa',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'l13pa-support',
				'group-l13pa-resources',
				'https://wordpress.org/support/plugin/premium-addons-for-elementor'
			);

			if ( ddw_tbex_is_l13pa_pro_active() ) {

				ddw_tbex_resource_item(
					'support-contact',
					'l13pa-contact',
					'group-l13pa-resources',
					'https://my.leap13.com/contact-support/'
				);

			}  // end if

			ddw_tbex_resource_item(
				'knowledge-base',
				'l13pa-kb',
				'group-l13pa-resources',
				'https://premiumaddons.com/support/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'l13pa-facebook',
				'group-l13pa-resources',
				'https://www.facebook.com/groups/PremiumAddons/'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'l13pa-community-forum',
				'group-l13pa-resources',
				'https://my.leap13.com/forums/forum/premium-addons-for-elementor-plugin-community-support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'l13pa-translate',
				'group-l13pa-resources',
				'https://translate.wordpress.org/projects/wp-plugins/premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'l13pa-site',
				'group-l13pa-resources',
				'https://premiumaddons.com/'
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_maybe_remove_items_l13pa_pro' );
/**
 * Conditionally remove Leap13 Premium Addons Pro items depending on its white
 *   label settings.
 *
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_maybe_remove_items_l13pa_pro() {

	/** Get white label settings from Pro version */
	$l13pa_whitelabel = get_option( 'pa_wht_lbl_save_settings' );

	if ( $l13pa_whitelabel && 1 == $l13pa_whitelabel[ 'premium-wht-lbl-version' ] ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'ao-l13pa-versioncontrol' );
	}  // end if

}  // end function