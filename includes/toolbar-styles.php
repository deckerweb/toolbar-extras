<?php

// includes/toolbar-styles

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_enqueue_scripts', 'ddw_tbex_toolbar_styles' );
add_action( 'admin_enqueue_scripts', 'ddw_tbex_toolbar_styles' );
/**
 * Add the needed CSS styles for Toolbar items of "Toolbar Extras" plugin.
 * 
 * @see https://developer.wordpress.org/resource/dashicons/
 *
 * @since 1.0.0
 * @since 1.4.7 Moved into own Stylesheet; plus inline styles - all enqueued via
 *              WP standards, plus proper dependency declarations.
 *
 * @see plugin file: /assets/css/toolbar-styles.css
 *
 * @uses ddw_tbex_display_items_site()
 * @uses ddw_tbex_id_main_item()
 * @uses ddw_tbex_id_sites_browser()
 * @uses wp_add_inline_style()
 */
function ddw_tbex_toolbar_styles() {

	wp_register_style(
		'tbex-toolbar-styles',
		plugins_url( '/assets/css/toolbar-styles.css', dirname( __FILE__ ) ),
		array( 'admin-bar' ),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-toolbar-styles' );

	/** Subtle styling tweaks for "Login Designer" plugin */
	$fix_logindesigner = '';

	if ( ddw_tbex_display_items_site() ) {

		$fix_logindesigner = sprintf(
			'#wpadminbar #wp-admin-bar-my-sub-item {
				color: inherit;
				margin-top: 7px;
			}

			#wpadminbar #wp-admin-bar-my-sub-item .ab-item:before {
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
				background-image: none !important;
				color: inherit;
				content: "%s";
				float: left;
				font: 400 20px/1 dashicons;
				margin-right: 6px;
				padding: 4px 0;
				position: relative;
				speak: none;
			}

			#wpadminbar #wp-admin-bar-my-sub-item .ab-label {
				margin-left: -5px;
				margin-top: -2px;
			}',
			'\f336'
		);

	}  // end if

	/**
     * For WordPress Toolbar Area
     *   Style handle: 'tbex-toolbar-styles' (TBEX Core)
     */
    $inline_css = sprintf(
    	'
		#wpadminbar #wp-admin-bar-%1$s .ab-icon:before {
			top: 2px;
		}

		#wpadminbar #wp-admin-bar-%2$s {
			margin-top: -3px;
		}

		#wpadminbar #wp-admin-bar-%2$s .ab-icon:before,
		#wpadminbar #wp-admin-bar-%2$s .ab-label {
			color: inherit !important;
		}

		%3$s',
		ddw_tbex_id_main_item(),
		ddw_tbex_id_sites_browser(),
		$fix_logindesigner
	);

    wp_add_inline_style( 'tbex-toolbar-styles', $inline_css );

}  // end function


add_action( 'wp_enqueue_scripts', 'ddw_tbex_toolbar_overflow_fix_styles' );
add_action( 'admin_enqueue_scripts', 'ddw_tbex_toolbar_overflow_fix_styles' );
/**
 * For viewports equal or wider than 783px load CSS styles to fix the overflow
 *   issue in WordPress Core Toolbar styling when there are too many items.
 *
 * Note: Code inspired by "Admin Bar Wrap Fix" plugin (GPLv2 or later).
 *
 * @since 1.4.0
 * @since 1.4.5 Set 'admin-bar' dependency (WP Core).
 *
 * @see plugin file: /assets/css/toolbar-overflow-fix.css
 */
function ddw_tbex_toolbar_overflow_fix_styles() {

	wp_register_style(
		'tbex-toolbar-overflow-fix',
		plugins_url( '/assets/css/toolbar-overflow-fix.css', dirname( __FILE__ ) ),
		array( 'admin-bar' ),
		TBEX_PLUGIN_VERSION,
		'screen'
	);

	wp_enqueue_style( 'tbex-toolbar-overflow-fix' );

}  // end function
