<?php

// includes/functions-conditionals-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Tweak: Change frontend Toolbar color the backend color?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_frontend_toolbar_color() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'toolbar_front_color' ) );

}  // end function


/**
 * Tweak: Remove WordPress Logo items from the top left corner?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_wplogo() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_wp_logo' ) );

}  // end function


/**
 * Tweak: Remove Customize item(s) from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_customizer() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_front_customizer' ) );

}  // end function


/**
 * Tweak: Remove Media item from New Content group?
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_media_newcontent() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_media_newcontent' ) );

}  // end function


/**
 * Tweak: Remove User item from New Content group?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_user_newcontent() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_user_newcontent' ) );

}  // end function


/**
 * Tweak: Re-hook Gravity Forms items from the top to our Site Group or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_gravityforms() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_gravityforms' ) );

}  // end function


/**
 * Tweak: Re-hook Smart Slider 3 items from the top to our Site Group or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_smartslider() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_smartslider' ) );

}  // end function


/**
 * Tweak: Re-hook NextGen Gallery items from the top to our Site Group or not?
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_nextgen() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_nextgen' ) );

}  // end function


/**
 * Tweak: Re-hook iThemes Security items from the top to our Site Group or not?
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_ithemes_security() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_ithsec' ) );

}  // end function


/**
 * Tweak: Re-hook WP Rocket items from the top to our Site Group or not?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_wprocket() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_wprocket' ) );

}  // end function


/**
 * Tweak: Re-hook Autoptimize items from the top to our Site Group or not?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_autoptimize() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_autoptimize' ) );

}  // end function


/**
 * Tweak: Re-hook Swift Performance Lite items from the top to our Site Group or
 *   not?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_swift_performance() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_swiftperformance' ) );

}  // end function


/**
 * Tweak: Remove some WooCommerce post type entries from New Content?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_woocommerce_newcontent() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_woo_posttypes' ) );

}  // end function


/**
 * Tweak: Remove All In One SEO Pack items from the top?
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_aioseo() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_aioseo' ) );

}  // end function


/**
 * Tweak: Remove UpdraftPlus items from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_updraftplus() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_updraftplus' ) );

}  // end function


/**
 * Tweak: Remove Members (Role) item from "New Content"?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_members() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_members' ) );

}  // end function


/**
 * Tweak: Remove Cobalt Apps items from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_cobaltapps() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_cobaltapps' ) );

}  // end function


/**
 * Tweak: Remove Custom CSS Pro item from the top?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_customcsspro() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_customcsspro' ) );

}  // end function


/**
 * Tweak: Remove Admin Page Spider (Pro Pack) item from the Site Group?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_adminpagespider() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_apspider' ) );

}  // end function


/**
 * Tweak: Remove Multisite Toolbar Additions > Site Extend Group items from the
 *   Site Group?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_mstba_siteextgroup() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_mstba_siteextgroup' ) );

}  // end function



/**
 * Tweak: Unload Elementor translations?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_unload_translations_elementor() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'unload_td_elementor' ) );

}  // end function


/**
 * Tweak: Unload Toolbar Extras translations?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_unload_translations_toolbar_extras() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'unload_td_toolbar_extras' ) );

}  // end function


/**
 * Tweak: Remove the WordPress Widgets from the Elementor Live Editor?
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_elementor_remove_wpwidgets() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_elementor_wpwidgets' ) );

}  // end function


/**
 * Tweak: Display the Theme Builder item in Build Group?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_elementor_display_tbuilder() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'display_elementor_tbuilder' ) );

}  // end function


/**
 * Tweak: Display the Popups item in Build Group?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_elementor_display_popups() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'display_elementor_popups' ) );

}  // end function


/**
 * Tweak: Customize the "My Account" item ("Howdy" etc.)?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_myaccount_item() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'use_myaccount_tweak' ) );

}  // end function


/**
 * Tweak: Re-hook Elementor Inspector items from the top to our Build Group or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_elementor_inspector() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_elementor_inspector' ) );

}  // end function


/**
 * Tweak: Re-hook StylePress for Elementor items from the top to our Build Group or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_stylepress_elementor() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_stylepress' ) );

}  // end function


/**
 * Tweak: Re-hook Yoast SEO items from the top to the Site Group or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_yoastseo() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_yoastseo' ) );

}  // end function


/**
 * Tweak: Re-hook SEOPress items from the top to the Site Group or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_seopress() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'rehook_seopress' ) );

}  // end function


/**
 * Tweak: Remove Easy Updates Manager items from the top or not?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return bool TRUE if tweak should be used (setting 'yes'), FALSE otherwise.
 */
function ddw_tbex_use_tweak_easy_updates_manager() {

	return ( 'yes' === ddw_tbex_get_option( 'tweaks', 'remove_easy_um' ) );

}  // end function


add_filter( 'elementor/widgets/black_list', 'ddw_tbex_tweak_elementor_remove_wp_widgets' );
/**
 * Optionally remove all WordPress widgets from the Elementor Live Editor.
 *   Note: A native Elementor filter is used.
 *
 * @since 1.2.0
 * @since 1.4.1 Refactored and relocated into file
 *              'includes/functions-conditionals-tweaks.php'.
 *
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_use_tweak_elementor_remove_wpwidgets()
 *
 * @param array $black_list Array holding all blacklisted WordPress widgets.
 * @return array Tweaked array of black listed WordPress widgets.
 */
function ddw_tbex_tweak_elementor_remove_wp_widgets( $black_list ) {

	/** Bail early if Elementor not active or tweak not wanted */
	if ( ! ddw_tbex_is_elementor_active() || ! ddw_tbex_use_tweak_elementor_remove_wpwidgets() ) {
		return $black_list;
	}

	/**
	 * Get all registered WordPress widgets, but only the classes
	 *   (= the first-level array keys)
	 */
	$black_list = array_keys( $GLOBALS[ 'wp_widget_factory' ]->widgets );

	/** Return black list array for filter */
	return (array) $black_list;

}  // end function
