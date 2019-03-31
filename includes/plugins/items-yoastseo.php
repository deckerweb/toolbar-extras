<?php

// includes/plugins/items-yoastseo

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Yoast SEO Premium version plugin is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_yoastseo_premium_active() {

	return class_exists( 'WPSEO_Premium' );

}  // end function


/**
 * Check if option "Toolbar" is activated in Yoast SEO settings or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if option activated, FALSE otherwise (option is type
 *              boolean in DB).
 */
function ddw_tbex_is_yoastseo_toolbar_active() {

	$yoast_option = get_option( 'wpseo' );

	return $yoast_option[ 'enable_admin_bar_menu' ];

}  // end function


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_rehook_yoastseo' );
/**
 * Items for Plugin: Yoast SEO (free, by Team Yoast)
 *   If tweak setting is active then re-hook from the top to the tools hook
 *   place in the Site Group.
 *   Note: Existing Toolbar nodes get filtered.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_yoastseo_toolbar_active()
 * @uses ddw_tbex_use_tweak_yoastseo()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_rehook_yoastseo( $wp_admin_bar ) {

	/** Bail early if Yoast Toolbar deactivated */
	if ( ! ddw_tbex_is_yoastseo_toolbar_active() ) {
		return $wp_admin_bar;
	}

	/** Re-hook for: Site Group (Yoast's main item!) */
	if ( ddw_tbex_use_tweak_yoastseo() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpseo-menu',			// same as original!
				'parent' => 'tbex-sitegroup-tools',
				'title'  => esc_attr__( 'Yoast SEO', 'toolbar-extras' ),
				'meta'   => array(
					'class'  => 'tbex-yoastseo',
					'title'  => esc_attr__( 'Yoast SEO', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Make URL target controllable via our settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpseo-configuration-wizard',			// same as original!
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Yoast Quick Setup', 'toolbar-extras' )
			)
		)
	);

	/** Set URL also for the "Settings" item */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpseo-settings',			// same as original!
			'href'   => esc_url( admin_url( 'admin.php?page=wpseo_dashboard' ) ),
			'meta'   => array(
				'title'  => esc_attr__( 'Yoast SEO Dashboard', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_yoastseo', 100 );
/**
 * Additional items for Plugin: Yoast SEO (free, by Team Yoast)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_yoastseo_toolbar_active()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_yoastseo() {

	/** Bail early if Yoast Toolbar deactivated */
	if ( ! ddw_tbex_is_yoastseo_toolbar_active() ) {
		return;
	}

	/** Group: Resources for Yoast SEO */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-yoastseo-resources',
				'parent' => 'wpseo-menu',	// same as original
				'meta'   => array( 'class' => 'ab-sub-secondary' )
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'yoastseo-support',
			'group-yoastseo-resources',
			'https://wordpress.org/support/plugin/wordpress-seo'
		);

		ddw_tbex_resource_item(
			'knowledge-base',
			'yoastseo-kb-docs',
			'group-yoastseo-resources',
			'https://kb.yoast.com/'
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'yoastseo-videos',
			'group-yoastseo-resources',
			'https://www.youtube.com/user/yoastcom/videos'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'yoastseo-translate',
			'group-yoastseo-resources',
			'https://translate.wordpress.org/projects/wp-plugins/wordpress-seo'
		);

		ddw_tbex_resource_item(
			'github',
			'yoastseo-github',
			'group-yoastseo-resources',
			'https://github.com/Yoast/wordpress-seo'
		);

		ddw_tbex_resource_item(
			'official-site',
			'yoastseo-site',
			'group-yoastseo-resources',
			'https://yoast.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_yoastseo_premium', 100 );
/**
 * Site items for plugin premium version:
 *   Yoast SEO Premium (Premium, by Team Yoast)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_yoastseo_premium_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_yoastseo_premium() {

	/** Bail early if premium version not active */
	if ( ! ddw_tbex_is_yoastseo_premium_active()
		|| is_network_admin()
	) {
		return;
	}

	/** Add premium-only "Redirects" items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-yoastseo-redirects',
			'parent' => 'wpseo-menu',	// same as original
			'title'  => esc_attr__( 'Redirects', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=wpseo_redirects' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Redirect', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-yoastseo-redirects-plain',
				'parent' => 'tbex-yoastseo-redirects',
				'title'  => esc_attr__( 'Plain Redirects', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpseo_redirects&tab=plain' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Plain Redirect', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-yoastseo-redirects-regex',
				'parent' => 'tbex-yoastseo-redirects',
				'title'  => esc_attr__( 'Regex Redirects', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpseo_redirects&tab=regex' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Regex Redirect', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-yoastseo-redirects-settings',
				'parent' => 'tbex-yoastseo-redirects',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpseo_redirects&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_maybe_remove_items_yoastseo' );
/**
 * Conditionally remove items.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_yoastseo_toolbar_active()
 * @uses ddw_tbex_is_yoastseo_premium_active() 
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_maybe_remove_items_yoastseo() {

	/** Bail early if Yoast Toolbar deactivated */
	if ( ! ddw_tbex_is_yoastseo_toolbar_active() ) {
		return;
	}

	if ( ! ddw_tbex_is_yoastseo_premium_active() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wpseo-licenses' );
	}
	
}  // end function
