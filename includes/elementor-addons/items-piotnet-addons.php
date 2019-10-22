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
 * @since 1.3.9
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_pafe_pro_active() {

	return defined( 'PAFE_PRO_VERSION' );

}  // end function


/**
 * Create & render resource items for PAFE/Piotnet Addons (Pro).
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_pafe_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param string $suffix String for suffix for Toolbar node ID and group ID.
 * @param string $parent String for Toolbar parent node.
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_piotnet_addons_resources( $admin_bar, $suffix = '', $parent = '' ) {

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	$admin_bar->add_group(
		array(
			'id'     => 'group-piotnet-addons-resources' . $suffix,
			'parent' => sanitize_key( $parent ),	//'ao-piotnet-addons',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	/** Free version only resources */
	if ( ! ddw_tbex_is_pafe_pro_active() ) {

		ddw_tbex_resource_item(
			'support-forum',
			'piotnet-addons-forum' . $suffix,
			'group-piotnet-addons-resources' . $suffix,
			'https://wordpress.org/support/plugin/piotnet-addons-for-elementor'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'piotnet-addons-translations' . $suffix,
			'group-piotnet-addons-resources' . $suffix,
			'https://translate.wordpress.org/projects/wp-plugins/piotnet-addons-for-elementor'
		);

	}  // end if

	ddw_tbex_resource_item(
		'youtube-tutorials',
		'piotnet-addons-youtube-tutorials' . $suffix,
		'group-piotnet-addons-resources' . $suffix,
		'https://www.youtube.com/channel/UCNkl1FCjjtVQsN2AIWpp1xQ/videos'
	);

	ddw_tbex_resource_item(
		'changelog',
		'piotnet-addons-changelogs' . $suffix,
		'group-piotnet-addons-resources' . $suffix,
		'https://pafe.piotnet.com/change-log/',
		ddw_tbex_string_version_history( 'plugin' )
	);

	ddw_tbex_resource_item(
		'official-site',
		'piotnet-addons-site' . $suffix,
		'group-piotnet-addons-resources' . $suffix,
		'https://pafe.piotnet.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_piotnet_addons', 100 );
/**
 * Items for Add-On:
 *   Piotnet Addons For Elementor (PAFE) (Pro)
 *   (free/Premium, by Luong Huu Phuoc (Louis Hufer))
 *
 * @since 1.3.9
 * @since 1.4.3 Added Forms database item; plus restructuring.
 *
 * @uses ddw_tbex_is_pafe_pro_active()
 * @uses ddw_tbex_aoitems_piotnet_addons_resources(
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_piotnet_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-piotnet-addons',
			'parent' => 'tbex-addons',
			'title'  => ddw_tbex_is_pafe_pro_active() ? esc_attr__( 'Piotnet Addons Pro', 'toolbar-extras' ) : esc_attr__( 'Piotnet Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=piotnet-addons-for-elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_is_pafe_pro_active()
					? ddw_tbex_string_premium_addon_title_attr( __( 'Piotnet Addons Pro', 'toolbar-extras' ) )
					: ddw_tbex_string_free_addon_title_attr( __( 'Piotnet Addons', 'toolbar-extras' ) ),
			)
		)
	);

		if ( '1' === get_option( 'pafe-features-form-builder' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-piotnet-addons-form-data',
					'parent' => 'ao-piotnet-addons',
					'title'  => esc_attr__( 'Form Database', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=pafe-form-database' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Form Database', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-piotnet-addons-settings',
				'parent' => 'ao-piotnet-addons',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=piotnet-addons-for-elementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {
			ddw_tbex_aoitems_piotnet_addons_resources( $admin_bar, 'aoplace', 'ao-piotnet-addons' );
		}

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_piotnet_addons_forms' );
/**
 * Form builder items for:
 *   Piotnet Addons For Elementor (PAFE) Pro
 *   (Premium, by Luong Huu Phuoc (Louis Hufer))
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_pafe_pro_active()
 * @uses ddw_tbex_aoitems_piotnet_addons_resources(
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_piotnet_addons_forms( $admin_bar ) {

	/**
	 * Bail early if no Pro version active and no form builder feature activated
	 */
	if ( ! ddw_tbex_is_pafe_pro_active() || '1' !== get_option( 'pafe-features-form-builder' ) ) {
		return $admin_bar;
	}

	/** Forms database */
	$admin_bar->add_node(
		array(
			'id'     => 'pafe-formsbuilder',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'PAFE Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=pafe-form-database' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'PAFE Forms Builder (Piotnet Addons Pro)', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'pafe-formsbuilder-form-data',
				'parent' => 'pafe-formsbuilder',
				'title'  => esc_attr__( 'Form Database', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=pafe-form-database' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Form Database', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'pafe-formsbuilder-settings',
				'parent' => 'pafe-formsbuilder',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=piotnet-addons-for-elementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {
			ddw_tbex_aoitems_piotnet_addons_resources( $admin_bar, 'formsplace', 'pafe-formsbuilder' );
		}

}  // end function
