<?php

// includes/items-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Theme: Astra (free & Pro, by Brainstorm Force)
 * @since 1.0.0
 */
if ( ( 'Astra' == wp_get_theme() && defined( 'ASTRA_THEME_VERSION' ) )	// Astra w/o child theme
	|| ( 'astra' === basename( get_template_directory() ) && defined( 'ASTRA_THEME_VERSION' ) )		// Astra w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-astra.php' );
}


/**
 * Theme: GeneratePress (free & Premium, by Tom Usborne)
 * @since 1.0.0
 */
if ( ( 'GeneratePress' == wp_get_theme() && function_exists( 'generate_setup' ) )	// GeneratePress w/o child theme
	|| ( 'generatepress' === basename( get_template_directory() ) && function_exists( 'generate_setup' ) )		// GeneratePress w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-generatepress.php' );
}


/**
 * Theme: OceanWP (free & Premium, by Nicolas Lecocq)
 *   NOTE: We check here against the "OceanWP Extra" (free) Add-On Plugin, as
 *         the use of OceanWP without "Extra" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.0.0
 */
if ( ( 'OceanWP' == wp_get_theme() && function_exists( 'Ocean_Extra' ) )	// OceanWP w/o child theme
	|| ( 'oceanwp' === basename( get_template_directory() ) && function_exists( 'Ocean_Extra' ) )		// OceanWP w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-oceanwp.php' );
}


/**
 * Theme: Genesis Framework (Premium, by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: Usage without Child Theme is absolutely NOT recommended, therefore
 *         not supported!
 * @since 1.0.0
 * @uses  ddw_tbex_is_genesis_active()
 */
if ( ddw_tbex_is_genesis_active() ) {

	/** Genesis Framework items: */
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-genesis.php' );

	/** Load supported Genesis Child Themes */
	require_once( TBEX_PLUGIN_DIR . 'includes/items-themes-genesis.php' );

}  // end if Genesis Framework


/**
 * Theme: Hestia (free, by Themeisle)
 * @since 1.1.0
 */
if ( ( 'Hestia' == wp_get_theme() && defined( 'HESTIA_VERSION' ) )		// Hestia w/o child theme
	|| ( 'hestia' === basename( get_template_directory() ) && defined( 'HESTIA_VERSION' ) )		// Hestia w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-hestia.php' );
}


/**
 * Theme: Page Builder Framework (free & Premium, by David Vongries & MapSteps)
 * @since 1.1.0
 */
if ( ( 'Page Builder Framework' == wp_get_theme() && function_exists( 'wpbf_theme_setup' ) )	// PBF w/o child theme
	|| ( 'page-builder-framework' === basename( get_template_directory() ) && function_exists( 'wpbf_theme_setup' ) )		// PBF w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-page-builder-framework.php' );
}


/**
 * Theme: Kava (free, by Zemez & CrocoBlock)
 * @since 1.1.1
 */
if ( ( 'Kava' == wp_get_theme() && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/o child theme
	|| ( ( 'kava' === basename( get_template_directory() ) || 'kavatheme' === basename( get_template_directory() ) ) && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-kava.php' );
}


/**
 * Theme: Beaver Builder Theme (Premium, by FastLine Media LLC)
 * @since 1.1.0
 */
if ( ( 'Beaver Builder Theme' == wp_get_theme() && defined( 'FL_THEME_VERSION' ) )	// BB-Theme w/o child theme
	|| ( 'bb-theme' === basename( get_template_directory() ) && defined( 'FL_THEME_VERSION' ) )		// BB-Theme w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-beaver-builder-theme.php' );
}


/**
 * Theme: Customify (free, by WPCustomify/ PressMaximum)
 * @since 1.2.0
 */
if ( ( 'Customify' == wp_get_theme() && class_exists( 'Customify' ) )	// Customify w/o child theme
	|| ( 'customify' === basename( get_template_directory() ) && class_exists( 'Customify' ) )		// Customify w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-customify.php' );
}


/**
 * Theme: Flexia (free & Premium, by Codetic)
 *   NOTE: We check here against the "Flexia Core" (free) Add-On Plugin, as
 *         the use of Flexia without "Core" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.2.0
 */
if ( ( 'Flexia' == wp_get_theme() && defined( 'FLEXIA_CORE_VERSION' ) )	// Flexia w/o child theme
	|| ( 'flexia' === basename( get_template_directory() ) && defined( 'FLEXIA_CORE_VERSION' ) )		// Flexia w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-flexia.php' );
}


/**
 * Theme: StartWP (free, by Munir Kamal)
 * @since 1.1.0
 */
if ( ( 'Start' == wp_get_theme() && function_exists( 'start_setup' ) )	// StartWP w/o child theme
	|| ( 'start' === basename( get_template_directory() ) && function_exists( 'start_setup' ) )		// StartWP w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-startwp.php' );
}


/**
 * Theme: Freelancer Framework (free, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'Freelancer' == wp_get_theme() && function_exists( 'freelancer_theme_setup' ) )	// Freelancer w/o child theme
	|| ( 'freelancer' === basename( get_template_directory() ) && function_exists( 'freelancer_theme_setup' ) )		// Freelancer w/ child theme
) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-freelancer.php' );
}


/**
 * Themes: Default Twenty Themes (2010-2017), plus supported (third-party) Child Themes
 * @since 1.0.0
 */
if ( ddw_tbex_is_default_twenty() ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-default-twenty-themes.php' );
}


/**
 * Themes: Elementor Hello Theme (free, by Elementor/ Pojo Me Digital)
 * @since 1.0.0
 */
if ( 'elementor-hello-theme' == get_stylesheet() || 'elementor-hello-theme-master' == get_stylesheet() ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-hello-theme.php' );
}


/**
 * Themes: Eletheme (free, by Liviu Duda)
 * @since 1.2.0
 */
if ( function_exists( 'eletheme_setup' ) ) {
	require_once( TBEX_PLUGIN_DIR . 'includes/themes/items-eletheme.php' );
}