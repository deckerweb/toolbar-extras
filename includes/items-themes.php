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
	|| ( 'astra' === wp_basename( get_template_directory() ) && defined( 'ASTRA_THEME_VERSION' ) )		// Astra w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-astra.php';
}


/**
 * Theme: GeneratePress (free & Premium, by Tom Usborne)
 * @since 1.0.0
 */
if ( ( 'GeneratePress' == wp_get_theme() && function_exists( 'generate_setup' ) )	// GeneratePress w/o child theme
	|| ( 'generatepress' === wp_basename( get_template_directory() ) && function_exists( 'generate_setup' ) )		// GeneratePress w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-generatepress.php';
}


/**
 * Theme: OceanWP (free & Premium, by Nicolas Lecocq)
 *   NOTE: We check here against the "OceanWP Extra" (free) Add-On Plugin, as
 *         the use of OceanWP without "Extra" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.0.0
 */
if ( ( 'OceanWP' == wp_get_theme() && function_exists( 'Ocean_Extra' ) )	// OceanWP w/o child theme
	|| ( 'oceanwp' === wp_basename( get_template_directory() ) && function_exists( 'Ocean_Extra' ) )		// OceanWP w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-oceanwp.php';
}


/**
 * Theme: Genesis Framework (Premium, by StudioPress/ Rainmaker Digital, LLC)
 *   NOTE: Usage without Child Theme is absolutely NOT recommended, therefore
 *         not supported!
 * @since 1.0.0
 * @uses ddw_tbex_is_genesis_active()
 */
if ( ddw_tbex_is_genesis_active() ) {

	/** Genesis Framework items: */
	require_once TBEX_PLUGIN_DIR . 'includes/themes-genesis/items-genesis.php';

	/** Load supported Genesis Child Themes */
	require_once TBEX_PLUGIN_DIR . 'includes/items-themes-genesis.php';

}  // end if Genesis Framework


/**
 * Theme: Hestia (free, by Themeisle)
 * @since 1.1.0
 */
if ( ( 'Hestia' == wp_get_theme() && defined( 'HESTIA_VERSION' ) )		// Hestia w/o child theme
	|| ( 'hestia' === wp_basename( get_template_directory() ) && defined( 'HESTIA_VERSION' ) )		// Hestia w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-hestia.php';
}


/**
 * Theme: Page Builder Framework (free & Premium, by David Vongries & MapSteps)
 * @since 1.1.0
 */
if ( ( 'Page Builder Framework' == wp_get_theme() && function_exists( 'wpbf_theme_setup' ) )	// PBF w/o child theme
	|| ( 'page-builder-framework' === wp_basename( get_template_directory() ) && function_exists( 'wpbf_theme_setup' ) )		// PBF w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-page-builder-framework.php';
}


/**
 * Theme: Kava Theme (free/Premium, by Zemez & Crocoblock)
 * @since 1.1.1
 */
if ( ( 'Kava' == wp_get_theme() && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/o child theme
	|| ( ( 'kava' === wp_basename( get_template_directory() ) || 'kavatheme' === wp_basename( get_template_directory() ) ) && class_exists( 'Kava_Theme_Setup' ) )		// Kava w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-kava.php';
}


/**
 * Theme: Buildwall (Premium, by Zemez)
 * @since 1.3.0
 */
if ( ( 'Buildwall' == wp_get_theme() && class_exists( 'Buildwall_Theme_Setup' ) )		// Buildwall w/o child theme
	|| ( 'buildwall' === wp_basename( get_template_directory() ) && class_exists( 'Buildwall_Theme_Setup' ) )		// Buildwall w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-buildwall.php';
}


/**
 * Theme: Beaver Builder Theme (Premium, by FastLine Media LLC)
 * @since 1.1.0
 */
if ( ( 'Beaver Builder Theme' == wp_get_theme() && defined( 'FL_THEME_VERSION' ) )	// BB-Theme w/o child theme
	|| ( 'bb-theme' === wp_basename( get_template_directory() ) && defined( 'FL_THEME_VERSION' ) )		// BB-Theme w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-beaver-builder-theme.php';
}


/**
 * Theme: Customify (free & Premium, by WPCustomify/ PressMaximum)
 * @since 1.2.0
 */
if ( ( 'Customify' == wp_get_theme() && class_exists( 'Customify' ) )	// Customify w/o child theme
	|| ( 'customify' === wp_basename( get_template_directory() ) && class_exists( 'Customify' ) )		// Customify w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-customify.php';
}


/**
 * Theme: Phlox (free & Premium, by averta)
 * @since 1.3.0
 */
if ( ( 'Phlox' == wp_get_theme() && class_exists( 'Auxin' ) )	// Phlox w/o child theme
	|| ( 'phlox' === wp_basename( get_template_directory() ) && class_exists( 'Auxin' ) )		// Phlox w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-phlox.php';
}


/**
 * Theme: Flexia (free & Premium, by Codetic)
 *   NOTE: We check here against the "Flexia Core" (free) Add-On Plugin, as
 *         the use of Flexia without "Core" is completely senseless. It's a
 *         plugin dependency.
 * @since 1.2.0
 */
if ( ( 'Flexia' == wp_get_theme() && defined( 'FLEXIA_CORE_VERSION' ) )	// Flexia w/o child theme
	|| ( 'flexia' === wp_basename( get_template_directory() ) && defined( 'FLEXIA_CORE_VERSION' ) )		// Flexia w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-flexia.php';
}


/**
 * Theme: StartWP (free, by Munir Kamal)
 * @since 1.1.0
 */
if ( ( 'Start' == wp_get_theme() && function_exists( 'start_setup' ) )	// StartWP w/o child theme
	|| ( 'start' === wp_basename( get_template_directory() ) && function_exists( 'start_setup' ) )		// StartWP w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-startwp.php';
}


/**
 * Theme: Freelancer Framework (free, by Cobalt Apps)
 * @since 1.1.0
 */
if ( ( 'Freelancer' == wp_get_theme() && function_exists( 'freelancer_theme_setup' ) )	// Freelancer w/o child theme
	|| ( 'freelancer' === wp_basename( get_template_directory() ) && function_exists( 'freelancer_theme_setup' ) )		// Freelancer w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-freelancer.php';
}


/**
 * Theme: Suki (free, by SukiWP/ David Rozando)
 * @since 1.4.0
 */
if ( ( 'Suki' == wp_get_theme() && class_exists( 'Suki' ) )	// Suki w/o child theme
	|| ( 'suki' === wp_basename( get_template_directory() ) && class_exists( 'Suki' ) )		// Suki w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-suki.php';
}


/**
 * Theme: Neve (free, by ThemeIsle)
 * @since 1.4.7
 */
if ( ( 'Neve' == wp_get_theme() && defined( 'NEVE_VERSION' ) )	// Neve w/o child theme
	|| ( 'neve' === wp_basename( get_template_directory() ) && defined( 'NEVE_VERSION' ) )		// Neve w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-neve.php';
}


/**
 * Theme: FuturioWP (free, by FuturioWP)
 * @since 1.4.2
 */
if ( ( 'Futurio' == wp_get_theme() && defined( 'FUTURIO_EXTRA_CURRENT_VERSION' ) )	// Futurio w/o child theme
	|| ( 'futurio' === wp_basename( get_template_directory() ) && defined( 'FUTURIO_EXTRA_CURRENT_VERSION' ) )		// Futurio w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-futurio.php';
}


/**
 * Theme: Rife Free & Rife Pro (free/Premium, by Apollo13Themes)
 * @since 1.4.2
 */
if ( ( ( 'Rife Free' == wp_get_theme() || 'Rife Pro' == wp_get_theme() )		// Rife Free/Pro w/o child theme
		&& class_exists( 'Apollo13Framework' )
	)
	|| ( ( 'rife-free' === wp_basename( get_template_directory() ) || 'rife' === wp_basename( get_template_directory() ) )		// Rife Free/Pro w/ child theme
		&& class_exists( 'Apollo13Framework' ) )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-rife.php';
}


/**
 * Theme: Zita (free, by WpZita team)
 * @since 1.4.2
 */
if ( ( 'Zita' == wp_get_theme() && defined( 'ZITA_THEME_VERSION' ) )	// Zita w/o child theme
	|| ( 'zita' === wp_basename( get_template_directory() ) && defined( 'ZITA_THEME_VERSION' ) )		// Zita w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-zita.php';
}


/**
 * Theme: Woostify (free, by BoostifyThemes)
 * @since 1.4.2
 */
if ( ( 'Woostify' == wp_get_theme() && defined( 'WOOSTIFY_VERSION' ) )	// Woostify w/o child theme
	|| ( 'woostify' === wp_basename( get_template_directory() ) && defined( 'WOOSTIFY_VERSION' ) )		// Woostify w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-woostify.php';
}


/**
 * Theme: Bstone (free, by Stack Themes)
 * @since 1.4.9
 */
if ( ( 'Bstone' == wp_get_theme() && defined( 'BSTONE_LIGHT_VER' ) )	// Bstone w/o child theme
	|| ( 'bstone' === wp_basename( get_template_directory() ) && defined( 'BSTONE_LIGHT_VER' ) )		// Bstone w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-bstone.php';
}


/**
 * Theme: Sydney (free, by athemes)
 * @since 1.4.0
 */
if ( ( 'Sydney' == wp_get_theme() && function_exists( 'sydney_setup' ) )	// Sydney w/o child theme
	|| ( 'sydney' === wp_basename( get_template_directory() ) && function_exists( 'sydney_setup' ) )		// Sydney w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-sydney.php';
}


/**
 * Theme: Jupiter X (Premium, by Artbees)
 * @since 1.4.2
 */
if ( ( 'JupiterX' == wp_get_theme() && ddw_tbex_is_artbees_raven_active() )	// Jupiter X w/o child theme
	|| ( 'jupiterx' === wp_basename( get_template_directory() ) && ddw_tbex_is_artbees_raven_active() )		// Jupiter X w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-jupiterx.php';
}


/**
 * Theme: Visual Composer Starter (free, by The Visual Composer Team)
 * @since 1.4.0
 */
if ( ( 'Visual Composer Starter' == wp_get_theme() && function_exists( 'visualcomposerstarter_setup' ) )	// Visual Composer Starter w/o child theme
	|| ( 'visual-composer-starter' === wp_basename( get_template_directory() ) && function_exists( 'visualcomposerstarter_setup' ) )		// Visual Composer Starter w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-visual-composer-starter.php';
}


/**
 * Theme: Default Twenty Themes (2010-2019), plus supported (third-party) Child Themes
 * @since 1.0.0
 */
if ( ddw_tbex_is_default_twenty() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-default-twenty-themes.php';
}


/**
 * Theme: Storefront (free, by Automattic, Inc.)
 * @since 1.4.2
 */
if (  ( 'Storefront' == wp_get_theme() && class_exists( 'Storefront' ) )	// Storefront w/o child theme
	|| ( 'storefront' === wp_basename( get_template_directory() ) && class_exists( 'Storefront' ) )		// Storefront w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-storefront.php';
}


/**
 * Theme: Elementor Hello Theme (free, by Elementor Team/ Elementor Ltd.)
 *   Note: Only loaded if Elementor plugin is active!
 * @since 1.0.0
 * @since 1.4.0 Make dependent on Elementor (base) plugin.
 * @since 1.4.3 Integrate wordpress.org theme version also.
 */
if ( ddw_tbex_is_elementor_active() ) :
	if ( 'elementor-hello-theme' == get_stylesheet()
		|| 'elementor-hello' == get_stylesheet()
		|| 'elementor-hello-theme-master' == get_stylesheet()
		|| ( 'hello-elementor' === wp_basename( get_template_directory() ) || 'Hello Elementor' == wp_get_theme() )
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-elementor-hello-theme.php';
	}
endif;


/**
 * Theme: Layers for Elementor (free, by Elementor Team/ Elementor Ltd.)
 * @since 1.4.2
 */
if ( 'layers-elementor' === wp_basename( get_template_directory() ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-layers-for-elementor.php';
}


/**
 * Theme: Eletheme (free, by Liviu Duda)
 * @since 1.2.0
 */
if ( function_exists( 'eletheme_setup' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-eletheme.php';
}


/**
 * Theme: Rooten (Premium, by BdThemes)
 * @since 1.4.2
 */
if ( ( 'Rooten' == wp_get_theme() && function_exists( 'rooten_setup' ) )	// Rooten w/o child theme
	|| ( 'rooten' === wp_basename( get_template_directory() ) && function_exists( 'rooten_setup' ) )		// Rooten w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-rooten.php';
}


/**
 * Themes: all from ChurchThemes.com (Premium, by ChurchThemes.com LLC)
 * @since 1.3.0
 * @since 1.4.9 Refactoring; refinements and additions.
 */
if ( ddw_tbex_is_theme_ctcom() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ctcom-shared.php';
}

	/**
	 * Theme: Jubilee (Premium, by ChurchThemes.com LLC)
	 * @since 1.4.9
	 */
	if ( ( 'Jubilee' == wp_get_theme() && function_exists( 'jubilee_add_theme_support_framework' ) )	// Jubilee w/o child theme
		|| ( 'jubilee' === wp_basename( get_template_directory() ) && function_exists( 'jubilee_add_theme_support_framework' ) )		// Jubilee w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-jubilee.php';
	}


	/**
	 * Theme: Saved (Premium, by ChurchThemes.com LLC)
	 * @since 1.3.0
	 */
	if ( ( 'Saved' == wp_get_theme() && function_exists( 'saved_add_theme_support_framework' ) )	// Saved w/o child theme
		|| ( 'saved' === wp_basename( get_template_directory() ) && function_exists( 'saved_add_theme_support_framework' ) )		// Saved w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-saved.php';
	}


	/**
	 * Theme: Maranatha (Premium, by ChurchThemes.com LLC)
	 * @since 1.3.0
	 */
	if ( ( 'Maranatha' == wp_get_theme() && function_exists( 'maranatha_add_theme_support_framework' ) )	// Maranatha w/o child theme
		|| ( 'maranatha' === wp_basename( get_template_directory() ) && function_exists( 'maranatha_add_theme_support_framework' ) )		// Maranatha w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-maranatha.php';
	}


	/**
	 * Theme: Exodus (Premium, by ChurchThemes.com LLC)
	 * @since 1.3.0
	 */
	if ( ( 'Exodus' == wp_get_theme() && function_exists( 'exodus_add_theme_support_framework' ) )	// Exodus w/o child theme
		|| ( 'exodus' === wp_basename( get_template_directory() ) && function_exists( 'exodus_add_theme_support_framework' ) )		// Exodus w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-exodus.php';
	}


	/**
	 * Theme: Resurrect (Premium, by ChurchThemes.com LLC)
	 * @since 1.3.0
	 */
	if ( ( 'Resurrect' == wp_get_theme() && function_exists( 'resurrect_add_theme_support_framework' ) )	// Resurrect w/o child theme
		|| ( 'resurrect' === wp_basename( get_template_directory() ) && function_exists( 'resurrect_add_theme_support_framework' ) )		// Resurrect w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-resurrect.php';
	}


	/**
	 * Theme: Risen (Premium, by Steven Gliebe)
	 * @since 1.3.0
	 */
	if ( ( 'Risen' == wp_get_theme() && function_exists( 'risen_setup' ) )	// Risen w/o child theme
		|| ( 'risen' === wp_basename( get_template_directory() ) && function_exists( 'risen_setup' ) )		// Risen w/ child theme
	) {
		require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ct-risen.php';
	}


/**
 * Theme: Chaplin (free, by Anders Norén)
 * @since 1.4.5
 */
if ( ( 'Chaplin' == wp_get_theme() && function_exists( 'chaplin_theme_support' ) )	// Chaplin w/o child theme
	|| ( 'chaplin' === wp_basename( get_template_directory() ) && function_exists( 'chaplin_theme_support' ) )		// Chaplin w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-chaplin.php';
}


/**
 * Theme: Zakra (free, by ThemeGrill)
 * @since 1.4.7
 */
if ( ( 'Zakra' == wp_get_theme() && function_exists( 'zakra_setup' ) )	// Zakra w/o child theme
	|| ( 'zakra' === wp_basename( get_template_directory() ) && function_exists( 'zakra_setup' ) )		// Zakra w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-zakra.php';
}


/**
 * Theme: Airi (free, by athemes)
 * @since 1.4.7
 */
if ( ( 'Airi' == wp_get_theme() && function_exists( 'airi_setup' ) )	// Airi w/o child theme
	|| ( 'airi' === wp_basename( get_template_directory() ) && function_exists( 'airi_setup' ) )		// Airi w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-airi.php';
}


/**
 * Theme: Responsive (free, by CyberChimps)
 * @since 1.4.7
 */
if ( ( 'Responsive' == wp_get_theme() && defined( 'RESPONSIVE_THEME_VERSION' ) )	// Responsive w/o child theme
	|| ( 'responsive' === wp_basename( get_template_directory() ) && defined( 'RESPONSIVE_THEME_VERSION' ) )		// Responsive w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-responsive.php';
}


/**
 * Theme: Ashe (free, by WP Royal)
 * @since 1.4.9
 */
if ( ( 'Ashe' == wp_get_theme() && function_exists( 'ashe_setup' ) )	// Ashe w/o child theme
	|| ( 'ashe' === wp_basename( get_template_directory() ) && function_exists( 'ashe_setup' ) )		// Ashe w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-ashe.php';
}


/**
 * Theme: Total (free, by Hash Themes)
 * @since 1.4.9
 */
if ( ( 'Total' == wp_get_theme() && function_exists( 'total_setup' ) )	// Total w/o child theme
	|| ( 'total' === wp_basename( get_template_directory() ) && function_exists( 'total_setup' ) )		// Total w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-total.php';
}


/**
 * Theme: Mesmerize (free, by Extend Themes/ Horea Radu)
 * @since 1.4.9
 */
if ( ( 'Mesmerize' == wp_get_theme() && function_exists( 'mesmerize_check_php_version' ) )	// Mesmerize w/o child theme
	|| ( 'mesmerize' === wp_basename( get_template_directory() ) && function_exists( 'mesmerize_check_php_version' ) )		// Mesmerize w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-mesmerize.php';
}


/**
 * Theme: Primer (free, by GoDaddy)
 * @since 1.4.9
 */
if ( ( 'Primer' == wp_get_theme() && defined( 'PRIMER_VERSION' ) )	// Primer w/o child theme
	|| ( 'primer' === wp_basename( get_template_directory() ) && defined( 'PRIMER_VERSION' ) )		// Primer w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-primer.php';
}


/**
 * Theme: Reykjavik (free, by WebMan Design/ Oliver Juhas)
 * @since 1.4.9
 */
if ( ( 'Reykjavik' == wp_get_theme() && class_exists( 'Reykjavik_Setup' ) )	// Reykjavik w/o child theme
	|| ( 'reykjavik' === wp_basename( get_template_directory() ) && class_exists( 'Reykjavik_Setup' ) )		// Reykjavik w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-reykjavik.php';
}


/**
 * Theme: Atomic Blocks (free, by Atomic Blocks/ Array Themes)
 * @since 1.4.0
 */
if ( ( 'Atomic Blocks' == wp_get_theme() && function_exists( 'atomic_blocks_setup' ) )	// Atomic Blocks w/o child theme
	|| ( 'atomic-blocks' === wp_basename( get_template_directory() ) && function_exists( 'atomic_blocks_setup' ) )		// Atomic Blocks w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-atomic-blocks.php';
}


/**
 * Theme: Editor Blocks (free, by Editor Blocks/ Danny Cooper)
 * @since 1.4.0
 */
if ( ( 'Editor Blocks' == wp_get_theme() && function_exists( 'editor_blocks_setup' ) )	// Editor Blocks w/o child theme
	|| ( 'editor-blocks' === wp_basename( get_template_directory() ) && function_exists( 'editor_blocks_setup' ) )		// Editor Blocks w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-editor-blocks.php';
}


/**
 * Theme: Stackable (free, by Gambit Technologies, Inc.)
 * @since 1.4.2
 */
if ( ( 'Stackable' == wp_get_theme() && function_exists( 'stackable_setup' ) )	// Stackable w/o child theme
	|| ( 'stackable' === wp_basename( get_template_directory() ) && function_exists( 'stackable_setup' ) )		// Stackable w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-stackable.php';
}


/**
 * Theme: GutenBooster (free, by Onur Oztaskiran)
 * @since 1.4.9
 */
if ( ( 'GutenBooster' == wp_get_theme() && defined( 'GUTENBOOSTER_THEMEVERSION' ) )	// GutenBooster w/o child theme
	|| ( 'gutenbooster' === wp_basename( get_template_directory() ) && defined( 'GUTENBOOSTER_THEMEVERSION' ) )		// GutenBooster w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-gutenbooster.php';
}


/**
 * Theme: CoBlocks (free, by Rich Tabor of CoBlocks)
 * @since 1.4.0
 */
if ( ( 'CoBlocks' == wp_get_theme() && function_exists( 'coblocks_setup' ) )	// CoBlocks w/o child theme
	|| ( 'coblocks' === wp_basename( get_template_directory() ) && function_exists( 'coblocks_setup' ) )		// CoBlocks w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-coblocks.php';
}


/**
 * Theme: Stag Blocks (free, by Codestag)
 * @since 1.4.2
 */
if ( ( 'Stag Blocks' == wp_get_theme() && function_exists( 'stagblocks_setup' ) )	// Stag Blocks w/o child theme
	|| ( 'stag-blocks' === wp_basename( get_template_directory() ) && function_exists( 'stagblocks_setup' ) )		// Stag Blocks w/ child theme
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-stag-blocks.php';
}


/**
 * Themes:
 *   - Sane (free, by Elegant Marketplace)
 *   - Sane Pro (Premium, by Elegant Marketplace)
 * @since 1.4.2
 */
if (
	(
		( 'Sane' == wp_get_theme() || 'Sane Pro' == wp_get_theme() )		// Sane w/o child theme
		&& function_exists( 'sane_setup' )
	)
	||
		(
			( 'sane' === wp_basename( get_template_directory() ) || 'sane-pro' === wp_basename( get_template_directory() ) )		// Sane w/ child theme
			&& function_exists( 'sane_setup' )
		)
) {
	require_once TBEX_PLUGIN_DIR . 'includes/themes/items-sane.php';
}



/**
 * Conditional Customizer items for the current active Theme
 * @since 1.4.0
 * -----------------------------------------------------------------------------
 */

/**
 * Add Customizer deep link items for the current active theme, declared via the
 *   filter 'tbex_filter_items_theme_customizer_deep' and the appropriate array.
 *   Only fire the action which adds the Toolbar nodes if there are any Themes
 *   which have actually used the filter.
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_items_theme_customizer_deep()
 *
 * @uses ddw_tbex_customizer_deep_items_priority()
 */
if ( has_filter( 'tbex_filter_items_theme_customizer_deep' ) ) {
	add_action( 'admin_bar_menu', 'ddw_tbex_items_theme_customizer_deep', ddw_tbex_customizer_deep_items_priority() );
}
