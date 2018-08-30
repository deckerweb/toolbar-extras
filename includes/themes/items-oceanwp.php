<?php

// items-oceanwp
// items-oceanwp-premium

// includes/themes/items-oceanwp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get OceanWP Theme name by respecting possible white label settings.
 *
 * @since  1.1.0
 *
 * @return string String of the Theme name.
 */
function ddw_tbex_string_oceanwp_theme_name() {

	$owp_theme_name = wp_get_theme( get_template() )->get( 'Name' );

	/** Respect OceanWP White Labeling (if Premium Add-On plugin is active) */
	if ( function_exists( 'Ocean_White_Label' ) ) {
		$owp_theme_name = ( ! empty( get_option( 'oceanwp_theme_name' ) ) ) ? esc_attr( get_option( 'oceanwp_theme_name' ) ) : $owp_theme_name;
	}

	return $owp_theme_name;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_oceanwp', 100 );
/**
 * Items for Theme: OceanWP (free & Premium, by Nicolas Lecocq)
 *   NOTE: Support for free and premium extensions is added "inline" in the below
 *         main functions. Reason: OceanWP has no central Premium plugin but
 *         rather a lot of them.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_oceanwp_theme_name()
 * @uses   ddw_tbex_customizer_start()
 * @uses   ddw_tbex_string_customize_design()
 * @uses   ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_oceanwp() {

	/** OceanWP creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => sprintf(
				/* translators: %s - (Static) Theme name OceanWP - optionally white labeled string */
				esc_attr__( 'Theme: %s', 'toolbar-extras' ),
				ddw_tbex_string_oceanwp_theme_name()
			),
			'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: %s - (Static) Theme name OceanWP - optionally white labeled string */
					esc_attr__( 'Active Theme: %s', 'toolbar-extras' ),
					ddw_tbex_string_oceanwp_theme_name()
				)
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

		/** OceanWP's own Template Library */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'oceanwp-library',
				'parent' => 'theme-creative'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owp-myl-all',
				'parent' => 'oceanwp-library',
				'title'  => esc_attr__( 'Template Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=oceanwp_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Library - All Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owp-myl-new',
				'parent' => 'oceanwp-library',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=oceanwp_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'oceanwp_library' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-myl-builder',
					'parent' => 'oceanwp-library',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'oceanwp_library' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** OceanWP's own Portfolio Items (via Premium Add-On plugin) */
		if ( function_exists( 'Ocean_Portfolio' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-portfolio',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-portfolio-all',
					'parent' => 'oceanwp-portfolio',
					'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ocean_portfolio' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-portfolio-new',
					'parent' => 'oceanwp-portfolio',
					'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ocean_portfolio' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ocean_portfolio' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'owp-portfolio-builder',
						'parent' => 'oceanwp-portfolio',
						'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ocean_portfolio' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if Portfolio

		/** OceanWP's own Modal Windows (via free Add-On plugin) */
		if ( function_exists( 'Ocean_Modal_Window' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-modal',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-modal-all',
					'parent' => 'oceanwp-modal',
					'title'  => esc_attr__( 'All Modal Windows', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ocean_modal_window' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Modal Windows', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-modal-new',
					'parent' => 'oceanwp-modal',
					'title'  => esc_attr__( 'New Modal', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ocean_modal_window' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Modal', 'toolbar-extras' )
					)
				)
			);

		}  // end if Modal Window

		/** OceanWP's own Post Sliders (via free Add-On plugin) */
		if ( function_exists( 'Ocean_Posts_Slider' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-postslider',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-postslider-all',
					'parent' => 'oceanwp-postslider',
					'title'  => esc_attr__( 'All Post Sliders', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ocean_modal_window' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Sliders', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-postslider-new',
					'parent' => 'oceanwp-postslider',
					'title'  => esc_attr__( 'New Post Slider', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ocean_modal_window' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Slider', 'toolbar-extras' )
					)
				)
			);

		}  // end if Post Slider

		/** OceanWP's own Sidebars (via free Add-On plugin) */
		if ( function_exists( 'Ocean_Custom_Sidebar' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-sidebars',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-sidebars',
					'parent' => 'oceanwp-sidebars',
					'title'  => esc_attr__( 'Custom Sidebars', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=ocean_sidebars' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Sidebars', 'toolbar-extras' )
					)
				)
			);

			/** For: WP-Widgets */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpwidgets-owp-sidebars',
					'parent' => 'wpwidgets',
					'title'  => esc_attr__( 'Custom Sidebars', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=ocean_sidebars' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Sidebars', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** OceanWP's own Hooks (via Premium Add-On plugin) */
		if ( function_exists( 'Ocean_Hooks' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-hooks',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-hooks',
					'parent' => 'oceanwp-hooks',
					'title'  => sprintf(
						/* translators: Theme name OceanWP - optionally white labeled string */
						esc_attr__( '%s Hooks', 'toolbar-extras' ),
						ddw_tbex_string_oceanwp_theme_name()
					),
					'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-hooks' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => sprintf(
							/* translators: Theme name OceanWP - optionally white labeled string */
							esc_attr__( '%s Hook Locations', 'toolbar-extras' ),
							ddw_tbex_string_oceanwp_theme_name()
						)
					)
				)
			);

		}  // end if

		/** OceanWP's own Stick Anything (via free Add-On plugin) */
		if ( function_exists( 'Ocean_Stick_Anything' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'oceanwp-stick-anything',
					'parent' => 'theme-creative'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-stick-anything',
					'parent' => 'oceanwp-stick-anything',
					'title'  => esc_attr__( 'Stick Anything', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-stick' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Stick Anything', 'toolbar-extras' )
					)
				)
			);

		}  // end if

	/** OceanWP settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => sprintf(
				/* translators: Theme name OceanWP - optionally white labeled string */
				esc_attr__( '%s Panel', 'toolbar-extras' ),
				ddw_tbex_string_oceanwp_theme_name()
			),
			'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: Theme name OceanWP - optionally white labeled string */
					esc_attr__( '%s Theme Panel', 'toolbar-extras' ),
					ddw_tbex_string_oceanwp_theme_name()
				)
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-features',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Features', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel&tab=features' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Features', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-integrations',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel&tab=integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-scripts-styles',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Scripts &amp; Styles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-scripts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Scripts &amp; Styles', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-importexport',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_oceanwp_customize', 100 );
/**
 * Customize items for OceanWP Theme
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_oceanwp_customize() {

	/** Get OceanWP setting which panels are active */
	$owp_cmz_panels = get_option( 'oe_panels_settings' );

	if ( $owp_cmz_panels[ 'oe_general_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-general',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'General Options', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_general_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'General Options', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_typography_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-typography',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_typography_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_topbar_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-topbar',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Top Bar', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_topbar_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Top Bar', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_header_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-header',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_header_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Header', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_blog_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-blog',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Blog', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_blog', get_post_type_archive_link( 'post' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Blog', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_sidebar_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-sidebar',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Sidebar', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'ocean_sidebar_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Sidebar', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_footer_widgets_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-footer-widgets',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Footer Widgets', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'ocean_footer_widgets_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Footer Widgets', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( $owp_cmz_panels[ 'oe_footer_bottom_panel' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-footer-bottom',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Footer Bottom', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'ocean_footer_bottom_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Footer Bottom', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	/** Add-On: Customize Portfolio */
	if ( function_exists( 'Ocean_Portfolio' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-portfolio',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Portfolio', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'op_portfolio' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Portfolio', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	/** Add-On: Customize Side Panel */
	if ( function_exists( 'Ocean_Side_Panel' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-sidepanel',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Side Panel', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'osp_side_panel_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Side Panel', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	/** Add-On: Customize Modal Window */
	if ( function_exists( 'Ocean_Modal_Window' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-modal',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Modal Window', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'ocean_modal_window_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Modal Window', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	/** Add-On: Customize Cookie Notice */
	if ( function_exists( 'Ocean_Cookie_Notice' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpcmz-cookie-notice',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Cookie Notice', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'ocn_section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Cookie Notice', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_oceanwp_resources', 120 );
/**
 * General resources items for OceanWP Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_oceanwp_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for OceanWP Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-settings',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/oceanwp'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.oceanwp.org/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for OceanWP Premium resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/OceanWP/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/oceanwp'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/oceanwp/oceanwp'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://oceanwp.org/'
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_themeitems_new_content_oceanwp' );
/**
 * Items for "New Content" section: New OceanWP Content
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_oceanwp_theme_name()
 * @uses   ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_new_content_oceanwp() {

	/** OceanWP Library (Core) */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-oceanwp_library',
			'parent' => 'new-content',
			'title'  => sprintf(
				/* translators: %s - (Static) Theme name OceanWP - optionally white labeled string */
				esc_attr__( '%s Library', 'toolbar-extras' ),
				ddw_tbex_string_oceanwp_theme_name()
			),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=oceanwp_library' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: %s - (Static) Theme name OceanWP - optionally white labeled string */
					esc_attr__( 'New %s Library Template', 'toolbar-extras' ),
					ddw_tbex_string_oceanwp_theme_name()
				)
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'oceanwp_library' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owplibrary-with-builder',
				'parent' => 'new-oceanwp_library',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'oceanwp_library' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** OceanWP Portfolio (Premium Add-On) */
	if ( function_exists( 'Ocean_Portfolio' )
		&& ddw_tbex_is_elementor_active()
		&& \Elementor\User::is_current_user_can_edit_post_type( 'ocean_portfolio' )
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpportfolio-with-builder',
				'parent' => 'new-ocean_portfolio',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ocean_portfolio' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_oceanwp_sites_import', 100 );
/**
 * Items for Demos Import: OceanWP Sites
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_demo_import()
 * @uses   ddw_tbex_id_sites_browser()
 * @uses   ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_oceanwp_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** free & Pro Demos */
	if ( function_exists( 'Ocean_Demo_Import' ) || function_exists( 'Ocean_Pro_Demos' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Install Demos', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-install-demos' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install Demos', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function