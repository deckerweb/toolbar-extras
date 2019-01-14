<?php

// includes/themes/items-flexia

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Flexia Pro Add-On plugin is active or not.
 *
 * @since 1.2.0
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_flexia_pro_active() {

	return ( defined( 'FLEXIA_PRO_VERSION' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_flexia', 100 );
/**
 * Items for Theme: Flexia (free & Premium, by Codetic)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_string_customize_design()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_flexia() {

	/** Flexia creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'admin.php?page=flexia-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => ddw_tbex_string_customize_design(),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_design()
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_flexia_customize', 100 );
/**
 * Customize items for Flexia Theme
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_flexia_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-general-settings',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'General', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_general_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'General Settings', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-header',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_header_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-footer',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_footer_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Footer', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-layout',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Layout', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_layout_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Layout', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-blog-styles',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Blog Styles', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_blog_settings', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Blog Styles', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-color-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Color &amp; Typography', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_typography_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Color &amp; Typography', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-design',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Design', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_design_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Design', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiacmz-custom-javascripts',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Custom JavaScripts', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'flexia_core_custom_scripts' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Custom JavaScripts', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_flexia_resources', 120 );
/**
 * General resources items for Flexia Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_flexia_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Flexia Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_flexia_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/flexia'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://flexia.pro/support/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://flexia.pro/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Flexia Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/flexia'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/rupok/flexia'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://flexia.pro/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_flexia_pro', 100 );
/**
 * Items for Theme: Flexia Pro - Add-On Plugin (Premium, by Codetic)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_is_flexia_pro_active()
 * @uses ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_flexia_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_flexia_pro_active() ) {
		return;
	}

	/** Portfolio Post Type */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'flexia-portfolio',
			'parent' => 'theme-creative'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'flexiapro-portfolio-all',
				'parent' => 'flexia-portfolio',
				'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=flexia-portfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'flexiapro-portfolio-new',
				'parent' => 'flexia-portfolio',
				'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=flexia-portfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'flexia-portfolio' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'flexiapro-portfolio-builder',
					'parent' => 'flexia-portfolio',
					'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'flexia-portfolio' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

	/** Get Flexia Pro Module settings */
	$flexiapro_preloader          = get_option( 'flexia-preloader' );
	$flexiapro_under_construction = get_option( 'flexia-under-construction' );

	/** Customizer: Pro Panels */
	if ( TRUE === $flexiapro_preloader[ 'flexia-preloader' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'flexiaprocmz-preloader',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Preloader', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'flexia_pro_preloader' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Customize Preloader', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'flexiaprocmz-portfolio',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'flexia_pro_portfolio_settings' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Customize Portfolio', 'toolbar-extras' ) )
			)
		)
	);

	/** Flexia Pro Theme Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Flexia Pro Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=flexia-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Flexia Pro Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'flexiapro-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=flexia-modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Modules', 'toolbar-extras' )
				)
			)
		);

		if ( TRUE === $flexiapro_under_construction[ 'flexia-under-construction' ] ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'flexiapro-under-construction',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Under Construction', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=flexia-underconstruction' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Under Construction', 'toolbar-extras' )
					)
				)
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_flexia_pro' );
/**
 * Items for "New Content" section: New Flexia Pro Portfolio
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_flexia_pro() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( ddw_tbex_is_elementor_active()
		&& \Elementor\User::is_current_user_can_edit_post_type( 'flexia-portfolio' )
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'flexiapro-new-portfolio-with-builder',
				'parent' => 'new-flexia-portfolio',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'flexia-portfolio' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
