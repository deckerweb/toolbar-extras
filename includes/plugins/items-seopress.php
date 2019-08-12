<?php

// includes/plugins/items-seopress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if SEOPress Pro version plugin is active or not.
 *
 * @since 1.3.2
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_seopress_pro_active() {

	return defined( 'SEOPRESS_PRO_VERSION' );

}  // end function


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_rehook_seopress' );
/**
 * Items for Plugin: SEOPress (Pro) (free/ Premium, by Benjamin Denis)
 *   If tweak setting is active then re-hook from the top to the tools hook
 *   place in the Site Group.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_use_tweak_seopress()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_rehook_seopress( $wp_admin_bar ) {

	/** Bail early if SEOPress Toolbar items are deactivated */
	if ( function_exists( 'seopress_advanced_appearance_adminbar_option' ) && '' != seopress_advanced_appearance_adminbar_option() ) {
		return $wp_admin_bar;
	}

	/** Bail early if SEOPress tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_seopress() ) {
		return $wp_admin_bar;
	}

	/** Re-hook for: Site Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'seopress_custom_top_level',			// same as original!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'SEOPress', 'toolbar-extras' ),
			'meta'   => array(
				'class'  => 'tbex-seopress',
				'title'  => esc_attr__( 'SEOPress', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_seopress', 100 );
/**
 * Additional items for Plugin: SEOPress (Pro) (free/ Premium, by Benjamin Denis)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_seopress() {

	/** Bail early if SEOPress Toolbar items are deactivated */
	if ( function_exists( 'seopress_advanced_appearance_adminbar_option' ) && '' != seopress_advanced_appearance_adminbar_option() ) {
		return;
	}

	/** Get SEOPress options which feature (aka "toggle") is activated */
	$sp_options = get_option( 'seopress_toggle' );

	/** Redirections */
	if ( '1' == $sp_options[ 'toggle-404' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-seopress-redirections-all',
				'parent' => 'seopress_custom_sub_menu_404',
				'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=seopress_404' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-seopress-redirections-new',
				'parent' => 'seopress_custom_sub_menu_404',
				'title'  => esc_attr__( 'New Redirection', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=seopress_404' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Redirection', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Broken Links */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-seopress-brokenlinks-all',
			'parent' => 'seopress_custom_sub_menu_broken_links',
			'title'  => esc_attr__( 'All Broken Links', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=seopress_bot' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Broken Links', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-seopress-brokenlinks-scan',
			'parent' => 'seopress_custom_sub_menu_broken_links',
			'title'  => esc_attr__( 'Start Scan', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=seopress-bot-batch' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Start Scan', 'toolbar-extras' )
			)
		)
	);

	/** Group: Resources for SEOPress */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-wpseopress-resources',
				'parent' => 'seopress_custom_top_level',	// same as original
				'meta'   => array( 'class' => 'ab-sub-secondary' )
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'wpseopress-support',
			'group-wpseopress-resources',
			'https://wordpress.org/support/plugin/wp-seopress'
		);

		ddw_tbex_resource_item(
			'documentation',
			'wpseopress-docs',
			'group-wpseopress-resources',
			'https://www.seopress.org/support/guides/'
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'wpseopress-videos',
			'group-wpseopress-resources',
			'https://www.youtube.com/channel/UCH5sQx3T2QZFhFEamT51hsw/videos'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'wpseopress-translate',
			'group-wpseopress-resources',
			'https://translate.wordpress.org/projects/wp-plugins/wp-seopress'
		);

		ddw_tbex_resource_item(
			'github',
			'wpseopress-github',
			'group-wpseopress-resources',
			'https://github.com/wp-seopress/wp-seopress'
		);

		ddw_tbex_resource_item(
			'official-site',
			'wpseopress-site',
			'group-wpseopress-resources',
			'https://www.seopress.org/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_seopress_dashboard', 10 );
/**
 * Add "Dashboard" item to SEOPress' own Toolbar stack.
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_seopress_dashboard() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-seopress-dashboard',
			'parent' => 'seopress_custom_top_level',
			'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=seopress-option' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_seopress_pro', 100 );
/**
 * Items for "New Content" section: New SEOPress Pro 404 Redirection
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_seopress_pro() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return;
	}

	if ( ddw_tbex_display_items_dev_mode() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-seopresspro-404-redirection',
				'parent' => 'new-content',
				'title'  => esc_attr__( '404 Redirection', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=seopress_404' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( '404 Redirection', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_maybe_remove_items_seopress' );
/**
 * Conditionally remove SEOPress Toolbar items if features in SEOPress itself
 *   were deactivated.
 *
 * @since 1.3.2
 *
 * @uses seopress_advanced_appearance_adminbar_option()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_maybe_remove_items_seopress() {

	/** Bail early if SEOPress Toolbar items are deactivated */
	if ( function_exists( 'seopress_advanced_appearance_adminbar_option' ) && '' != seopress_advanced_appearance_adminbar_option() ) {
		return;
	}

	/** Get SEOPress options which feature (aka "toggle") is activated */
	$sp_options = get_option( 'seopress_toggle' );

	/** Loop through all toggles */
	foreach ( $sp_options as $toggle => $value ) {
		
		/* For those toggles deactivated make further checks */
		if ( ! $value ) {

			/** For any deactivated toggle (aka feature) disable the Toolbar item */
			switch ( $toggle ) {

				case 'toggle-titles':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_titles' );
					break;

				case 'toggle-xml-sitemap':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_xml_sitemap' );
					break;

				case 'toggle-social':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_social' );
					break;

				case 'toggle-google-analytics':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_google_analytics' );
					break;

/*
				case 'toggle-advanced':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_advanced' );
					break;
*/

				case 'toggle-404':
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_sub_menu_404' );
					$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'tbex-seopresspro-404-redirection' );
					break;

			}  // end switch

		}  // end if

	}  // end foreach

	/** Additionally, always remove from Network Admin, as SEOPress has no Network-wide options */
	if ( is_network_admin() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'seopress_custom_top_level' );
	}
	
}  // end function
