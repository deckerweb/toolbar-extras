<?php

// includes/smart-tweaks-translations

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


//


add_filter( 'load_textdomain_mofile', 'ddw_tbex_tweak_maybe_unload_textdomains', 10, 2 );
/**
 * Optionally unload translations for various plugins. Which plugins, this is
 *   controlled via this plugin's settings, and/or from settings of an active
 *   Add-On plugin.
 *
 *   This works by "disabling" the path to the .mo file for the specified text
 *   domains.
 *
 * @since 1.3.8
 *
 * @uses ddw_tbex_is_translations_unloading_allowed()
 *
 * @param string $mofile Path to .mo file.
 * @param string $domain Textdomain.
 * @return string|null If our specified domain return null, the path of .mo file
 *                     otherwise.
 */
function ddw_tbex_tweak_maybe_unload_textdomains( $mofile, $domain ) {

	/** Create filterable array of text domains */
	$domains = apply_filters(
		'tbex_filter_unloading_textdomains',
		array()
	);

	/**
	 * If current text domain is in the above array, stop loading the .mo file.
	 */
	if ( in_array( $domain, $domains )
		&& ddw_tbex_is_translations_unloading_allowed()
	) {
		$mofile = null;
	}
  
	/** Return the current .mo file */
	return $mofile;
  
}  // end function


add_filter( 'tbex_filter_unloading_textdomains', 'ddw_tbex_tweak_unload_textdomain_toolbar_extras' );
/**
 * Unload Textdomain for "Toolbar Extras" plugin.
 *
 * @since 1.2.0
 * @since 1.3.8 Refactoring of feature.
 *
 * @param array $textdomains Array of textdomains.
 * @return array Modified array of textdomains for unloading.
 */
function ddw_tbex_tweak_unload_textdomain_toolbar_extras( $textdomains ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_unload_translations_toolbar_extras()
	) {
		return $textdomains;
	}

	$tbex_domains = array( 'toolbar-extras' );

	return array_merge( $textdomains, $tbex_domains );

}  // end function


add_filter( 'tbex_filter_unloading_textdomains', 'ddw_tbex_tweak_unload_textdomain_elementor' );
/**
 * Unload Textdomain for "Elementor" and "Elementor Pro" plugins.
 *
 * @since 1.2.0
 * @since 1.3.8 Refactoring of feature.
 *
 * @param array $textdomains Array of textdomains.
 * @return array Modified array of textdomains for unloading.
 */
function ddw_tbex_tweak_unload_textdomain_elementor( $textdomains ) {

	/** Bail early if tweak shouldn't be used */
	if ( ! ddw_tbex_use_tweak_unload_translations_elementor() ) {
		return $textdomains;
	}

	$elementor_domains = array( 'elementor', 'elementor-pro' );

	return array_merge( $textdomains, $elementor_domains );

}  // end function
