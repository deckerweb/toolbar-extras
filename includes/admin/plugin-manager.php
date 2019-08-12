<?php

// includes/admin/plugin-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Optionally create a badge for suggested plugins on Plugin Manager page.
 *   Supports various types/ labels.
 *
 * @since 1.4.2
 *
 * @param string $type Label for the badge.
 * @return string Markup and string for the badge.
 */
function ddw_tbex_pm_badge( $type = '' ) {

	$label = '';
	
	switch ( sanitize_key( $type ) ) {

		case 'required':
			$label = esc_attr_x( 'Required', 'Plugin Manager badge label', 'toolbar-extras' );
			break;

		case 'recommended':
			$label = esc_attr_x( 'Recommended', 'Plugin Manager badge label', 'toolbar-extras' );
			break;

		case 'useful':
			$label = esc_attr_x( 'Useful', 'Plugin Manager badge label', 'toolbar-extras' );
			break;

	}  // end switch

	return sprintf(
		'<span class="tbex-pm-badge tbex-pm-%2$s">%1$s</span>',
		$label,
		sanitize_html_class( $type )
	);

}  // end function


/**
 * Create a "For:" string on Plugin Manager page to determine for what specific
 *   Toolbar Extras Add-On a suggested plugin is suitable.
 *
 * @since 1.4.2
 *
 * @param string $plugins_string Translated string of appropriate Add-Ons.
 * @return string Complete markup and text of the "For:" string.
 */
function ddw_tbex_pmstring_for( $plugins_string = '' ) {

	return sprintf(
		'<span class="tbex-pm-for"><span class="tbex-pm-for-string">%1$s:</span> <span class="tbex-pm-for-addons">%2$s</span></span>',
		_x( 'For', 'On Plugin Manager page', 'toolbar-extras' ),
		esc_attr( $plugins_string )
	);

}  // end function


/**
 * For-string for general useful plugins - for reusage.
 *
 * @since 1.4.2
 *
 * @return string Translateable string.
 */
function ddw_tbex_pmstring_for_general() {

	return __( 'All Add-Ons installs - great helper tool', 'toolbar-extras' );

}  // end function


/**
 * Optionally wrap the plugin info text into special markup.
 *
 * @since 1.4.2
 *
 * @param string $text Info text for plugin.
 * @return string Markup and text.
 */
function ddw_tbex_pmstring_info( $text ) {

	return sprintf(
		'<span class="tbex-pm-plugin-text">%s</span>',
		esc_attr( $text )
	);

}  // end function


add_action( 'after_setup_theme', 'ddw_tbex_plugin_manager' );
/**
 * Setup suggested plugin system.
 *
 * Include the DDW_Toolbar_Extras_Plugin_Manager class and add
 * an interface for users to to manage suggested
 * plugins.
 *
 * @since 1.4.2
 *
 * @see DDW_Toolbar_Extras_Plugin_Manager
 * @link http://mypluginmanager.com
 */
function ddw_tbex_plugin_manager() {

	/** Bail early if not in WP-Admin */
	if ( ! is_admin() ) {
		return;
	}

	ddw_tbex_load_translations();

	/**
	 * Include plugin manager class.
	 *
	 * No other includes are needed. The DDW_Toolbar_Extras_Plugin_Manager
	 * class will handle including any other files needed.
	 *
	 * If you want to move the "plugin-manager" directory to
	 * a different location within your plugin, that's totally
	 * fine; just make sure you adjust this include path to
	 * the plugin manager class accordingly.
	 */
	require_once TBEX_PLUGIN_DIR . 'includes/admin/classes/plugin-manager/class-toolbar-extras-plugin-manager.php';

	$class = 'info';

	/*
	 * Setup suggested plugins.
	 *
	 * It's a good idea to have a filter applied to this so your
	 * loyal dev users have an easy way to modify what plugins
	 * are suggested.
	 */
	$plugins = apply_filters(
		'tbex/filter/plugin_manager',
		array(
			array(
				'name'    => _x( 'Toolbar Extras', 'Plugin Name', 'toolbar-extras' ),
				'slug'    => 'toolbar-extras',
				'version' => TBEX_PLUGIN_VERSION . '+',
				'notice' => array(
					'message' => ddw_tbex_pm_badge( 'required' ) . sprintf(
						__( 'Required base plugin for all official Add-Ons to work', 'toolbar-extras' ) . ' &rarr; <a href="%s" target="_blank" rel="nofollow noopener noreferrer">%s</a>',
						ddw_tbex_get_info_url( 'url_plugin' ),
						__( 'Plugin website', 'toolbar-extras' )
					),
					'class'   => $class,
				),
			),
		)  // end array
	);

	/** These plugins always at the end */
	$plugins_end = array(
		array(
			'name'    => _x( 'Builder Template Categories', 'Plugin Name', 'toolbar-extras' ),
			'slug'    => 'builder-template-categories',
			'version' => '1.5.1+',
			'notice' => array(
				'message' => ddw_tbex_pm_badge( 'recommended' ) .
					ddw_tbex_pmstring_for(
						__( 'Add-On for Oxygen Builder', 'toolbar-extras' ) . ' // ' .
						__( 'Add-On for Beaver Builder', 'toolbar-extras' ) . ' // ' .
						__( 'Add-On for Brizy', 'toolbar-extras' ) . ' // ' .
						__( 'Add-On for Divi', 'toolbar-extras' ) . ' // ' .
						__( 'Add-On for Visual Composer Website Builder', 'toolbar-extras' )
					) .
					ddw_tbex_pmstring_info( __( 'Highly recommended free extension to categorize and organize your templates and other content types for building your site', 'toolbar-extras' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Asset CleanUp: Page Speed Booster', 'Plugin Name', 'toolbar-extras' ),
			'slug'    => 'wp-asset-clean-up',
			'version' => '1.3.3.7+',
			'notice' => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Highly recommended free extension to remove bloat for your website and its pages', 'toolbar-extras' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Code Snippets', 'Plugin Name', 'toolbar-extras' ),
			'slug'    => 'code-snippets',
			'version' => '2.13.3+',
			'notice' => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Highly recommended free extension to add custom code snippets to your project. Perfect and better replacement of former "functions.php" of a theme... :-)', 'toolbar-extras' ) ),
				'class'   => $class,
			),
		),
		array(
			'name'    => _x( 'Members', 'Plugin Name', 'toolbar-extras' ),
			'slug'    => 'members',
			'version' => '2.2.0+',
			'notice'  => array(
				'message' => ddw_tbex_pm_badge( 'useful' ) .
					ddw_tbex_pmstring_for( ddw_tbex_pmstring_for_general() ) .
					ddw_tbex_pmstring_info( __( 'Recommended - allows you to make your Dashboard Site only accessable via login', 'toolbar-extras' ) ),
				'class'   => $class,
			),
		),
	);

	/** Create final array of plugins */
	$plugins = array_merge( $plugins, $plugins_end );

	/*
	 * Setup optional arguments for plugin manager interface.
	 *
	 * See the set_args() method of the Toolbar_Extras_Oxygen_Plugin_Manager
	 * class for full documentation on what you can pass in here.
	 */
	$args = array(
		'page_title'           => __( 'Suggested Plugins for Toolbar Extras Add-Ons', 'toolbar-extras' ),
		'extended_title'       => __( 'Please install these plugins, thank you.', 'toolbar-extras' ),
		'menu_title'           => esc_html_x( 'Suggested', 'Admin menu title', 'toolbar-extras' ),	//__( 'TBEX Plugins', 'toolbar-extras' ),
		'menu_slug'            => 'toolbar-extras-suggested-plugins',
		'parent_slug'          => 'plugins.php',
		'plugin_file'          => TBEX_PLUGIN_DIR . 'toolbar-extras.php',	//__FILE__, // Required for use in plugins.
		//'nag_update'           => __( 'Not all of your active, suggested plugins are compatible with %s.', 'toolbar-extras' ),
		/* translators: 1: name of plugin, 2: number of suggested plugins */
		'nag_install_single'   => __( '%1$s suggests installing %2$s plugin.', 'toolbar-extras' ),
		/* translators: 1: name of plugin, 2: number of suggested plugins */
		'nag_install_multiple' => __( '%1$s suggests installing %2$s plugins.', 'toolbar-extras' ),
	);

	/*
	 * Create plugin manager object, passing in the suggested
	 * plugins and optional arguments.
	 */
	$manager = new DDW_Toolbar_Extras_Plugin_Manager( $plugins, $args );

}  // end function


add_action( 'admin_enqueue_scripts', 'ddw_tbex_plugin_manager_register_styles' );
/**
 * Register CSS styles for the plugin manager page.
 *
 * @since 1.4.2
 */
function ddw_tbex_plugin_manager_register_styles() {

	wp_register_style(
		'tbex-plugin-manager',
		plugins_url( '/assets/css/tbex-plugin-manager.css', dirname( dirname( __FILE__ ) ) ),
		array(),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

}  // end function


add_action( 'tbex/plugin_manager/after_title', 'ddw_tbex_plugin_manager_about' );
/**
 * "About" explanation for Plugin Manager page.
 *
 * @since 1.4.2
 */
function ddw_tbex_plugin_manager_about() {

	wp_enqueue_style( 'tbex-plugin-manager' );

	$output = sprintf(
		'<div class="tbex-pm-about">
			<div class="tbex-pm-icon"><a href="%1$s"><img src="%2$s" width="120" height="120" alt="Icon Logo of Toolbar Extras plugin" /></a></div>
			<div class="tbex-pm-about-text">%3$s</div>
		</div>',
		esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
		ddw_tbex_get_info_url( 'plugin_icon_png' ),
		__( 'The plugins listed below are required and/or recommended so official Add-Ons of Toolbar Extras can work at all, so that their additions will have the wished effects.', 'toolbar-extras' )
	);

	echo $output;

}  // end function
