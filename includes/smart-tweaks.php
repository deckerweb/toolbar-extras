<?php

// includes/smart-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1st GROUP: Tweak WordPress behavior
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

add_action( 'wp_enqueue_scripts', 'ddw_tbex_tweak_frontend_toolbar_color', 10, 0 );
/**
 * Change color of the Toolbar in the frontend to the same color scheme like
 *   used in the Admin.
 *   Note: As of now only the 8 built-in Core-Themes are supported by this tweak.
 *
 * Original code by Daniel James.
 * @author  Daniel James
 * @link    https://www.danieltj.co.uk/
 * @license GNU GPL v3
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_in_local_environment()
 * @uses  ddw_tbex_use_tweak_frontend_toolbar_color()
 */
function ddw_tbex_tweak_frontend_toolbar_color() {

	/** Bail early if conditions are not met */
	if ( ddw_tbex_in_local_environment()
		|| ! ddw_tbex_use_tweak_frontend_toolbar_color()
		|| ! is_user_logged_in()
		|| ! is_admin_bar_showing()
	) {
		return;
	}

	/** Check for current's user meta setting of Admin color scheme */
	$used_admin_theme = get_user_meta(
		get_current_user_id(),
		'admin_color',
		TRUE
	);

	/** Check if an RTL language being used */
	$css_filename = is_rtl() ? 'colors-rtl.min.css' : 'colors.min.css';

	/** Build URL of the frontend CSS file */
	$frontend_css = admin_url( 'css/colors/' . $used_admin_theme . '/' . $css_filename );

	/** Allows for the frontend CSS URL to be filtered */
	$frontend_css_url = apply_filters(
		'tbex_filter_frontend_toolbar_css',
		$frontend_css,
		$used_admin_theme
	);

	/** Register the frontend stylesheet */
	wp_register_style(
		'tbex-frontend-toolbar',
		esc_url( $frontend_css_url ),
		array(),
		TBEX_PLUGIN_VERSION
	);

	/** Enqueue the frontend stylesheet */
	wp_enqueue_style( 'tbex-frontend-toolbar' );

}  // end function


add_filter( 'body_class', 'ddw_tbex_tweak_frontend_toolbar_color_body_class', 10, 1 );
/**
 * Add the admin color scheme class to the frontend body tag, plus a helper
 *   class from the plugin.
 *
 * @since  1.2.0
 *
 * @param  array $classes The array of frontend body classes
 *
 * @return array Array $classes of frontend body classes.
 */
function ddw_tbex_tweak_frontend_toolbar_color_body_class( $classes ) {

	/** Get the color scheme name */
	$admin_style = get_user_meta( get_current_user_id(), 'admin_color', TRUE );

	/** Add to the array */
	$classes[] = 'tbex-frontend';
	$classes[] = 'admin-color-' . $admin_style;

	return $classes;

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_wplogo' );
/**
 * Remove WP Logo item in top left corner.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_wplogo()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_wplogo() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_wplogo() ) {
		return;
	}

	/** Remove WP logo on the top left corner */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wp-logo' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_customize' );
/**
 * Remove Customize item in frontend view of the Toolbar.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_customizer()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_customize() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_customizer() ) {
		return;
	}

	/** Remove WP logo on the top left corner */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'customize' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_media_newcontent' );
/**
 * Remove Media item from New Content group of the Toolbar.
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_use_tweak_media_newcontent()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_media_newcontent() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_media_newcontent() ) {
		return;
	}

	/** Remove Media item */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-media' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_user_newcontent' );
/**
 * Remove User item from New Content group of the Toolbar.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_use_tweak_user_newcontent()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_user_newcontent() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_user_newcontent() ) {
		return;
	}

	/** Remove User item */
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-user' );

}  // end function



/**
 * 2nd GROUP: Tweak behavior of other plugins
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 */

add_filter( 'admin_bar_menu', 'ddw_tbex_rehook_items_nextgen_gallery' );
/**
 * Re-hook items from NextGen Gallery plugin.
 *   If tweak setting is active then re-hook from the top to the conditional
 *   hook place for galleries & sliders.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_use_tweak_nextgen()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 * @param  object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_rehook_items_nextgen_gallery( $wp_admin_bar ) {

	/** Bail early if NextGen Gallery tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_nextgen()
		|| ! class_exists( 'C_NextGEN_Bootstrap' )
	) {
		return;
	}

	/** Re-hook for: Manage Content */
	$wp_admin_bar->add_node(
		array(
			'id'     => 'ngg-menu',		// same as original!
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'Galleries', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=nextgen-gallery' ) ),
			'meta'   => array(
				'class'  => 'tbex-ngg',
				'target' => '',
				'title'  => esc_attr__( 'Galleries (via NextGen Gallery)', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_rehook_items_ithemes_security' );
/**
 * Re-hook items from iThemes Security plugin.
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_use_tweak_ithemes_security()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_rehook_items_ithemes_security() {

	/** Bail early if iThemes Security tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_ithemes_security()
		|| ! function_exists( 'itsec_load_textdomain' )
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'itsec_admin_bar_menu' );

	/** Re-hook for: Site Group > More Stuff */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'itsec_admin_bar_menu',		// same as original!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr_x( 'Security', 'Label for iThemes Security plugin', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=itsec' ) ),
			'meta'   => array(
				'class'  => 'tbex-ngg',
				'target' => '',
				'title'  => esc_attr__( 'Security (via iThemes Security)', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_woocommerce_newcontent', 15 );
/**
 * Remove some items from WooCommerce plugin within the New Content Group.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_use_tweak_woocommerce_newcontent()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_woocommerce_newcontent() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_woocommerce_newcontent() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-shop_order' );	// New Order
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'new-shop_coupon' );	// New Coupon

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_aioseo', 15 );
/**
 * Remove items from All In One SEO Pack (Pro) plugin.
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_use_tweak_aioseo()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_aioseo() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_aioseo()
		|| ! ( defined( 'AIOSEOP_VERSION' ) || defined( 'AIOSEOPPRO' ) )
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'all-in-one-seo-pack' );		// free version
	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'all-in-one-seo-pack-pro' );	// Pro version

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_updraftplus', 15 );
/**
 * Remove items from UpdraftPlus plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_updraftplus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_updraftplus() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_updraftplus() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'updraft_admin_node' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_members' );
/**
 * Remove items from Members plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_members()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_members() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_members()	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'members-new-role' );

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_wprocket' );
/**
 * Items for Plugin: WP Rocket (Premium, by WP Rocket)
 *   If tweak setting is active then re-hook from the top to the hook place for
 *   tools.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_use_tweak_autoptimize()
 *
 * @global mixed  $wp_admin_bar
 * @param  object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_wprocket( $wp_admin_bar ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_wprocket()
		|| ! defined( 'WP_ROCKET_VERSION' )
	) {
		return;
	}

	/** Re-hook for: Tools */
	$wp_admin_bar->add_node(
		array(
			'id'     => 'wp-rocket',			// same as original!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'WP Rocket', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=wprocket' ) ),
			'meta'   => array(
				'class'  => 'tbex-wprocket',
				'target' => '',
				'title'  => esc_attr__( 'WP Rocket', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_autoptimize' );
/**
 * Items for Plugin: Autoptimize (free, by Frank Goossens & Optimizing Matters)
 *   If tweak setting is active then re-hook from the top to the hook place for
 *   tools.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_use_tweak_autoptimize()
 *
 * @global mixed  $wp_admin_bar
 * @param  object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_autoptimize( $wp_admin_bar ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_autoptimize()
		|| ! defined( 'AUTOPTIMIZE_PLUGIN_DIR' )
	) {
		return;
	}

	/** Re-hook for: Tools */
	$wp_admin_bar->add_node(
		array(
			'id'     => 'autoptimize',			// same as original!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Autoptimize', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=autoptimize' ) ),
			'meta'   => array(
				'class'  => 'tbex-autoptimize',
				'target' => '',
				'title'  => esc_attr__( 'Autoptimize', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_swift_performance' );
/**
 * Items for Plugin: Swift Performance Lite (free, by SWTE) and
 *   Swift Performace (Premium, by SWTE).
 *   If tweak setting is active then re-hook from the top to the hook place for
 *   tools.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_use_tweak_swiftperformance()
 *
 * @global mixed  $wp_admin_bar
 * @param  object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_swift_performance( $wp_admin_bar ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_swift_performance()
		|| ! ( class_exists( 'Swift_Performance' ) || class_exists( 'Swift_Performance_Lite' ) )
	) {
		return;
	}

	$swift_version = ( class_exists( 'Swift_Performance' ) ) ? _x( 'Pro', 'Plugin type', 'toolbar-extras' ) : _x( 'Lite', 'Plugin type', 'toolbar-extras' );

	$swift_title = sprintf(
		/* translators: %s - Type of plugin (Pro or Lite) */
		esc_attr__( 'Swift Performance %s', 'toolbar-extras' ),
		$swift_version
	);

	/** Re-hook for: Tools */
	$wp_admin_bar->add_node(
		array(
			'id'     => 'swift-performance',			// same as original!
			'parent' => 'tbex-sitegroup-tools',
			'title'  => $swift_title,
			'href'   => esc_url( admin_url( 'tools.php?page=swift-performance' ) ),
			'meta'   => array(
				'class'  => 'tbex-swift-performance',
				'target' => '',
				'title'  => $swift_title
			)
		)
	);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_apspider' );
/**
 * Remove items from Admin Page Spider (Pro Pack) plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_adminpagespider()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_apspider() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_adminpagespider() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'quicklinks' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_tweak_remove_items_cobaltapps' );
/**
 * Remove items from Cobalt Apps plugins.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_cobaltapps()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_tweak_remove_items_cobaltapps() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_cobaltapps() ) {
		return;
	}

	if ( ! is_admin() ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'cobalt-apps-wp-admin-bar' );
	}

}  // end function



/**
 * 3rd GROUP: Tweak behavior of translations
 * @since 1.2.0
 * -----------------------------------------------------------------------------
 */

add_action( 'init', 'ddw_tbex_tweak_unload_textdomain_elementor', 100 );
/**
 * Unload Textdomain for "Elementor" and "Elementor Pro" plugins.
 *
 * @since 1.2.0
 *
 * @uses  ddw_tbex_use_tweak_unload_translations_elementor()
 */
function ddw_tbex_tweak_unload_textdomain_elementor() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_unload_translations_elementor() ) {
		return;
	}

	unload_textdomain( 'elementor' );
	unload_textdomain( 'elementor-pro' );

}  // end function


add_action( 'init', 'ddw_tbex_tweak_unload_textdomain_toolbar_extras', 100 );
/**
 * Unload Textdomain for "Toolbar Extras" plugins.
 *
 * @since 1.2.0
 *
 * @uses  ddw_tbex_use_tweak_unload_translations_toolbar_extras()
 */
function ddw_tbex_tweak_unload_textdomain_toolbar_extras() {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_unload_translations_toolbar_extras() ) {
		return;
	}

	unload_textdomain( 'toolbar-extras' );

}  // end function



/**
 * 4th GROUP: Tweak behavior of Page Builder
 * @since 1.2.0
 * -----------------------------------------------------------------------------
 */

/**
 * Only execute tweak if Elementor is active and the Tweak setting is on 'yes'.
 *   Note: We choose this approach to not return an empty array to the filter if
 *         the conditions are not met. That way we will not "harm" other
 *         plugins or themes also using this - native Elementor - filter.
 */
if ( ddw_tbex_is_elementor_active() && ddw_tbex_use_tweak_elementor_remove_wpwidgets() ) :

	add_filter( 'elementor/widgets/black_list', 'ddw_tbex_tweak_elementor_remove_wp_widgets' );
	/**
	 * Optionally remove all WordPress widgets from the Elementor Live Editor.
	 *   Note: A native Elementor filter is used.
	 *
	 * @since  1.2.0
	 *
	 * @return array Array of black listed WordPress widgets.
	 */
	function ddw_tbex_tweak_elementor_remove_wp_widgets() {

		$black_list = array();

		/**
		 * Get all registered WordPress widgets, but only the classes
		 *   (= the first-level array keys)
		 */
		$black_list = array_keys( $GLOBALS[ 'wp_widget_factory' ]->widgets );

		/** Return black list array for filter */
		return (array) $black_list;

	}  // end function

endif;