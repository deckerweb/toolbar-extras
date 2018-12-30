<?php

// includes/elementor-addons/items-piotnet-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if PAFE Pro version plugin is active or not.
 *
 * @since  1.3.9
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_pafe_pro_active() {

	return defined( 'PAFE_PRO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_piotnet_addons', 100 );
/**
 * Items for Add-On: Piotnet Addons For Elementor (PAFE) (Pro) (free/Premium, by Luong Huu Phuoc (Louis Hufer))
 *
 * @since  1.3.9
 *
 * @uses   ddw_tbex_is_pafe_pro_active()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_piotnet_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-piotnet-addons',
			'parent' => 'tbex-addons',
			'title'  => ddw_tbex_is_pafe_pro_active() ? esc_attr__( 'Piotnet Addons Pro', 'toolbar-extras' ) : esc_attr__( 'Piotnet Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=piotnet-addons-for-elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_is_pafe_pro_active() ? ddw_tbex_string_premium_addon_title_attr( __( 'Piotnet Addons Pro', 'toolbar-extras' ) ) : ddw_tbex_string_free_addon_title_attr( __( 'Piotnet Addons', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-piotnet-addons-settings',
				'parent' => 'ao-piotnet-addons',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=piotnet-addons-for-elementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-piotnet-addons-resources',
					'parent' => 'ao-piotnet-addons',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			/** Free version only resources */
			if ( ! ddw_tbex_is_pafe_pro_active() ) {

				ddw_tbex_resource_item(
					'support-forum',
					'piotnet-addons-forum',
					'group-piotnet-addons-resources',
					'https://wordpress.org/support/plugin/piotnet-addons-for-elementor'
				);

				ddw_tbex_resource_item(
					'translations-community',
					'piotnet-addons-translations',
					'group-piotnet-addons-resources',
					'https://translate.wordpress.org/projects/wp-plugins/piotnet-addons-for-elementor'
				);

			}  // end if

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'piotnet-addons-youtube-tutorials',
				'group-piotnet-addons-resources',
				'https://www.youtube.com/channel/UCNkl1FCjjtVQsN2AIWpp1xQ/videos'
			);

			ddw_tbex_resource_item(
				'official-site',
				'piotnet-addons-site',
				'group-piotnet-addons-resources',
				'https://pafe.piotnet.com/'
			);

		}  // end if

}  // end function
