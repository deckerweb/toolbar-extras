<?php

// includes/themes/items-startwp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if StartWP Extended Add-On plugin is active or not.
 *
 * @since 1.1.0
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_startwp_extended_active() {

	return ( function_exists( 'swp_extended' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_startwp', 100 );
/**
 * Items for Theme: StartWP (free, by Munir Kamal)
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_startwp() {

	/** StartWP creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title(),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'theme_styles' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_startwp_customize', 100 );
/**
 * Customize items for StartWP Theme
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_startwp_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-general',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'General', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'general' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'header' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-menu',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Menu', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'start_menu' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Menu', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-blogarchivesingle',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Blog / Archive / Single', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'blog_archive', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog / Archive / Single', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-sidebar',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Sidebar', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'sidebar' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Sidebar', 'toolbar-extras' ) )
			)
		)
	);

	/** 404 Error Page */
	$url_404_live = get_site_url() . '/404-live-test-' . md5( mt_rand() );

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-404page',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( '404 Page', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', '404', $url_404_live ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( '404 Page', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-search',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Search', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'search_archive' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Search', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'footer' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-copyright',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Copyright', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'copyright' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Copyright', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'startwpcmz-hooks',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Hooks', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'hooks' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Hooks', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_startwp_resources', 120 );
/**
 * General resources items for StartWP Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_is_startwp_extended_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_startwp_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for StartWP Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_startwp_extended_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/start'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/start'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://www.getstartwp.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_startwp_extended', 100 );
/**
 * Items for Theme: StartWP Extended - Add-On Plugin (free, by Munir Kamal)
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_is_startwp_extended_active()
 * @uses ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_startwp_extended() {

	/** Bail early if Extended plugin is not active */
	if ( ! ddw_tbex_is_startwp_extended_active() ) {
		return;
	}

	/** StartWP settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'StartWP Extended Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=startwpextensions' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'StartWP Extended Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-extensions',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=startwpextensions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' )
				)
			)
		);

	/** Optional WooCommerce sections in the Customizer */
	$startwp_extended_woo = get_option( 'swp_woo' );

	if ( 'Enable' === $startwp_extended_woo[0] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'startwpcmz-woo-general',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Woo General', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'swp_woocommerce_general', get_post_type_archive_link( 'product' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Woo General', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'startwpcmz-woo-archive',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Woo Archive', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'swp_woocommerce_archive', get_post_type_archive_link( 'product' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Woo Archive', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'startwpcmz-woo-single',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Woo Single', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'swp_woocommerce_single', get_post_type_archive_link( 'product' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Woo Single', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if Woo support

	/** Optional EDD sections in the Customizer */
	$startwp_extended_edd = get_option( 'swp_edd' );

	if ( 'Enable' === $startwp_extended_edd[0] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'startwpcmz-edd-archive',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'EDD Archive', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'swp_edd_archive', get_post_type_archive_link( 'download' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'EDD Archive', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'startwpcmz-edd-single',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'EDD Single', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'swp_edd_single', get_post_type_archive_link( 'download' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'EDD Single', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if EDD support

}  // end function
