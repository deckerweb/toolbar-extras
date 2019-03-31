<?php

// items-oceanwp
// items-oceanwp-premium
// items-oceanwp-extensions

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
 * @since 1.1.0
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
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_oceanwp_theme_name()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_string_customize_design()
 * @uses ddw_tbex_is_elementor_active()
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

		/** OceanWP customize */
		ddw_tbex_item_theme_creative_customize();

		/** OceanWP's own Template Library */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'oceanwp-library',
				'parent' => 'theme-creative'
			)
		);

		$owp_library_type = 'oceanwp_library';

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owp-myl-all',
				'parent' => 'oceanwp-library',
				'title'  => esc_attr__( 'Template Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $owp_library_type ) ),
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
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $owp_library_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $owp_library_type ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-myl-builder',
					'parent' => 'oceanwp-library',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $owp_library_type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'oceanwp-library-categories',
					'parent' => 'oceanwp-library',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $owp_library_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) )
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

			$owp_portfolio_type = 'ocean_portfolio';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'owp-portfolio-all',
					'parent' => 'oceanwp-portfolio',
					'title'  => esc_attr__( 'All Portfolio Items', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $owp_portfolio_type ) ),
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
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $owp_portfolio_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Portfolio Item', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $owp_portfolio_type ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'owp-portfolio-builder',
						'parent' => 'oceanwp-portfolio',
						'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $owp_portfolio_type ) ),
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
					'href'   => esc_url( admin_url( 'edit.php?post_type=ocean_posts_slider' ) ),
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
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ocean_posts_slider' ) ),
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
				'id'     => 'theme-settings-wizard',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=owp_setup' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' )
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-licenses',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Licenses', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=oceanwp-panel-licenses' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Licenses', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_oceanwp_customize' );
/**
 * Customize items for OceanWP Theme
 *
 * @since 1.0.0
 * @since 1.4.2 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_oceanwp_customize( array $items ) {

	/** Get OceanWP setting which panels are active */
	$owp_cmz_panels = get_option( 'oe_panels_settings' );

	$oceanwp_items = array();

	/** General */
	if ( $owp_cmz_panels[ 'oe_general_panel' ] ) {

		$oceanwp_items[ 'ocean_general_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'General Options', 'toolbar-extras' ),
			'id'    => 'owpcmz-general',
		);

	}  // end if

	/** Typography */
	if ( $owp_cmz_panels[ 'oe_typography_panel' ] ) {

		$oceanwp_items[ 'ocean_typography_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'owpcmz-typography',
		);

	}  // end if

	/** Top Bar */
	if ( $owp_cmz_panels[ 'oe_topbar_panel' ] ) {

		$oceanwp_items[ 'ocean_topbar_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'Top Bar', 'toolbar-extras' ),
			'id'    => 'owpcmz-topbar',
		);

	}  // end if

	/** Header */
	if ( $owp_cmz_panels[ 'oe_header_panel' ] ) {

		$oceanwp_items[ 'ocean_header_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'owpcmz-header',
		);

	}  // end if

	/** Blog */
	if ( $owp_cmz_panels[ 'oe_blog_panel' ] ) {

		$oceanwp_items[ 'ocean_blog' ] = array(
			'type'  => 'panel',
			'title' => __( 'Blog', 'toolbar-extras' ),
			'id'    => 'owpcmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		);

	}  // end if

	/** Sidebar */
	if ( $owp_cmz_panels[ 'oe_sidebar_panel' ] ) {

		$oceanwp_items[ 'ocean_sidebar_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Sidebar', 'toolbar-extras' ),
			'id'    => 'owpcmz-sidebar',
		);

	}  // end if

	/** Footer Widgets */
	if ( $owp_cmz_panels[ 'oe_footer_widgets_panel' ] ) {

		$oceanwp_items[ 'ocean_footer_widgets_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Footer Widgets', 'toolbar-extras' ),
			'id'    => 'owpcmz-footer-widgets',
		);

	}  // end if

	/** Footer Bottom */
	if ( $owp_cmz_panels[ 'oe_footer_bottom_panel' ] ) {

		$oceanwp_items[ 'ocean_footer_bottom_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Footer Bottom', 'toolbar-extras' ),
			'id'    => 'owpcmz-footer-bottom',
		);

	}  // end if

	/** WooCommerce Support */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$oceanwp_items[ 'ocean_woocommerce_panel' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce', 'toolbar-extras' ),
			'id'          => 'owpcmz-woocommerce',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

		/** Add-On: Customize Woo Popup */
		if ( function_exists( 'Ocean_Woo_Popup' ) ) {

			$oceanwp_items[ 'owp_section' ] = array(
				'type'        => 'section',
				'title'       => __( 'Woo Popup', 'toolbar-extras' ),
				'id'          => 'owpcmz-woo-popup',
				'preview_url' => get_post_type_archive_link( 'product' ),
			);

		}  // end if

	}  // end if

	/** Add-On: Customize Portfolio */
	if ( function_exists( 'Ocean_Portfolio' ) ) {

		$oceanwp_items[ 'op_portfolio' ] = array(
			'type'  => 'panel',
			'title' => __( 'Portfolio', 'toolbar-extras' ),
			'id'    => 'owpcmz-portfolio',
		);

	}  // end if

	/** Add-On: Customize Side Panel */
	if ( function_exists( 'Ocean_Side_Panel' ) ) {

		$oceanwp_items[ 'osp_side_panel_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Side Panel', 'toolbar-extras' ),
			'id'    => 'owpcmz-sidepanel',
		);

	}  // end if

	/** Add-On: Customize Modal Window */
	if ( function_exists( 'Ocean_Modal_Window' ) ) {

		$oceanwp_items[ 'ocean_modal_window_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'Modal Window', 'toolbar-extras' ),
			'id'    => 'owpcmz-modal',
		);

	}  // end if

	/** Add-On: Customize Cookie Notice */
	if ( function_exists( 'Ocean_Cookie_Notice' ) ) {

		$oceanwp_items[ 'ocn_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Cookie Notice', 'toolbar-extras' ),
			'id'    => 'owpcmz-cookie-notice',
		);

	}  // end if

	/** Add-On: Customize Sticky Header */
	if ( function_exists( 'Ocean_Sticky_Header' ) ) {

		$oceanwp_items[ 'osh_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Sticky Header', 'toolbar-extras' ),
			'id'    => 'owpcmz-sticky-header',
		);

	}  // end if

	/** Add-On: Customize Sticky Footer */
	if ( function_exists( 'Ocean_Sticky_Footer' ) ) {

		$oceanwp_items[ 'osf_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Sticky Footer', 'toolbar-extras' ),
			'id'    => 'owpcmz-sticky-footer',
		);

	}  // end if

	/** Add-On: Customize Footer Callout */
	if ( function_exists( 'Ocean_Footer_Callout' ) ) {

		$oceanwp_items[ 'ofc_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Footer Callout', 'toolbar-extras' ),
			'id'    => 'owpcmz-footer-callout',
		);

	}  // end if

	/** Add-On: Customize Social Sharing */
	if ( function_exists( 'Ocean_Social_Sharing' ) ) {

		$oceanwp_items[ 'oss_sharing_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Social Sharing', 'toolbar-extras' ),
			'id'    => 'owpcmz-social-sharing',
		);

	}  // end if

	/** Add-On: Customize Product Sharing */
	if ( ( ddw_tbex_is_woocommerce_active() || ddw_tbex_is_edd_active() )
		&& function_exists( 'Ocean_Product_Sharing' )
	) {

		$oceanwp_items[ 'ops_product_sharing_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Product Sharing', 'toolbar-extras' ),
			'id'    => 'owpcmz-product-sharing',
		);

	}  // end if

	/** Custom CSS/JS */
	if ( $owp_cmz_panels[ 'oe_custom_code_panel' ] ) {

		$oceanwp_items[ 'ocean_custom_code_panel' ] = array(
			'type'  => 'section',
			'title' => __( 'Custom CSS/JS', 'toolbar-extras' ),
			'id'    => 'owpcmz-custom-css-js',
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $oceanwp_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_oceanwp_resources', 120 );
/**
 * General resources items for OceanWP Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
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
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_oceanwp_theme_name()
 * @uses ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_new_content_oceanwp() {

	/** OceanWP Library (Core) */
	$type_libray = 'oceanwp_library';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-' . $type_libray,
			'parent' => 'new-content',
			'title'  => sprintf(
				/* translators: %s - (Static) Theme name OceanWP - optionally white labeled string */
				esc_attr__( '%s Library', 'toolbar-extras' ),
				ddw_tbex_string_oceanwp_theme_name()
			),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_libray ) ),
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

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_libray ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owplibrary-with-builder',
				'parent' => 'new-' . $type_libray,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_libray ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** OceanWP Portfolio (Premium Add-On) */
	$type_portfolio = 'ocean_portfolio';

	if ( function_exists( 'Ocean_Portfolio' )
		&& ddw_tbex_is_elementor_active()
		&& \Elementor\User::is_current_user_can_edit_post_type( $type_portfolio )
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'owpportfolio-with-builder',
				'parent' => 'new-' . $type_portfolio,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_portfolio ) ),
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
 * Items for Demos Import: OceanWP Sites (free/Pro).
 *
 * @since 1.0.0
 * @since 1.4.0 Updated for Ocean Extra update.
 *
 * @uses ddw_tbex_display_items_demo_import()
 * @uses ddw_tbex_id_sites_browser()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_oceanwp_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** free & Pro Demos */
	if ( class_exists( 'OceanWP_Demos' )
		|| function_exists( 'Ocean_Demo_Import' )
		|| function_exists( 'Ocean_Pro_Demos' )
	) {

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
