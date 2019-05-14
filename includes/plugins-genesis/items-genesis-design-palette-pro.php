<?php

// includes/plugins-genesis/items-genesis-design-palette-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Customizer Feature is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if setting is activated, FALSE otherwise.
 */
function ddw_tbex_is_gdpp_customizer_active() {

	return ( 1 === (int) get_option( 'gppro-customizer-beta' ) );

}  // end function


/**
 * Check if GDPPro eNews Widget Add-On is active or not.
 *
 * @since 1.4.3
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_gdpp_enews_addon() {

	return class_exists( 'GP_Pro_Widget_Enews' );

}  // end function


/**
 * Check if GDPPro Entry Content Add-On is active or not.
 *
 * @since 1.4.3
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_gdpp_entry_content_addon() {

	return class_exists( 'GP_Pro_Entry_Content' );

}  // end function


/**
 * Check if GDPPro Freeform Style Add-On is active or not.
 *
 * @since 1.4.3
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_gdpp_freeform_style_addon() {

	return class_exists( 'GP_Pro_Freeform_CSS' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_design_palette_pro', 105 );
/**
 * Items for Add-On: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 *
 * @since 1.0.0
 * @since 1.3.2 Fully enhanced plugin support.
 * @since 1.4.0 Added Design Builder sub sections; integrated Customizer support
 *              (currently in beta in GDPP).
 * @since 1.4.3 Added "Fonts" item, plus Add-On support.
 *
 * @uses ddw_tbex_is_gdpp_customizer_active()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_string_customize_attr()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_genesis_design_palette_pro( $admin_bar ) {

	$string_style = esc_attr__( 'Style with Genesis Design Palette Pro', 'toolbar-extras' );

	/** For: Genesis Creative items */
	$admin_bar->add_node(
		array(
			'id'     => 'genesis-design-palette-pro',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Design Palette Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $string_style
			)
		)
	);

		/** Group: Design Builder */
		$admin_bar->add_group(
			array(
				'id'     => 'group-gdppro-designer',
				'parent' => 'genesis-design-palette-pro'
			)
		);

			/** Designer URL */
			$url_designer = ddw_tbex_is_gdpp_customizer_active() ? ddw_tbex_customizer_focus( 'panel', 'dpp_panel' ) : esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-default' ) );

			/** Designer main item */
			$admin_bar->add_node(
				array(
					'id'     => 'genesis-design-palette-pro-design',
					'parent' => 'group-gdppro-designer',
					'title'  => esc_attr__( 'Design Builder', 'toolbar-extras' ),
					'href'   => $url_designer,
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => $string_style
					)
				)
			);

				/** Sub sections (only, if Customizer feature is disabled) */
				if ( ! ddw_tbex_is_gdpp_customizer_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-general-body',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'General Body', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=general_body' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'General Body', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-header-area',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Header Area', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=header_area' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Header Area', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-navigation',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Navigation', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=navigation' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Navigation', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-content-area',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Content Area', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=post_content' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Content Area', 'toolbar-extras' ) )
							)
						)
					);

					/** Add-On: Entry Content */
					if ( ddw_tbex_is_gdpp_entry_content_addon() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'genesis-design-palette-pro-design-entry-content',
								'parent' => 'genesis-design-palette-pro-design',
								'title'  => esc_attr__( 'Entry Content', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=entry_content' ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target( 'builder' ),
									'title'  => ddw_tbex_string_customize_attr( __( 'Entry Content', 'toolbar-extras' ) )
								)
							)
						);

					}  // end if

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-content-extras',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Content Extras', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=content_extras' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Content Extras', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-comments',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Comments', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=comments_area' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Comments', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-sidebar-main',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Sidebar', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=sidebar_main' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Sidebar', 'toolbar-extras' ) )
							)
						)
					);

					/** Add-On: Genesis Widgets > eNews Widget */
					if ( ddw_tbex_is_gdpp_enews_addon() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'genesis-design-palette-pro-design-enews-widget',
								'parent' => 'genesis-design-palette-pro-design',
								'title'  => esc_attr__( 'Genesis Widgets', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=genesis_widgets' ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target( 'builder' ),
									'title'  => ddw_tbex_string_customize_attr( __( 'Genesis Widgets', 'toolbar-extras' ) )
								)
							)
						);

					}  // end if

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-footer-widgets',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Footer Widgets', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=footer_widgets' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Footer Widgets', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-footer-area',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Footer Area', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=footer_main' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Footer Area', 'toolbar-extras' ) )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'genesis-design-palette-pro-design-tools',
							'parent' => 'genesis-design-palette-pro-design',
							'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=build_settings' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_customize_attr( __( 'Tools', 'toolbar-extras' ) )
							)
						)
					);

					/** Add-On: Freeform Style */
					if ( ddw_tbex_is_gdpp_freeform_style_addon() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'genesis-design-palette-pro-design-freeform-css',
								'parent' => 'genesis-design-palette-pro-design',
								'title'  => esc_attr__( 'Freeform CSS', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&section=freeform_css' ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target( 'builder' ),
									'title'  => ddw_tbex_string_customize_attr( __( 'Freeform CSS', 'toolbar-extras' ) )
								)
							)
						);

					}  // end if

				}  // end if Designer sub sections check

		/** Settings etc. */
		$admin_bar->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-settings',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-utilities',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Utilities', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-utilities' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Utilities', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-fonts',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Fonts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-fonts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Fonts', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-license',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-design-palette-pro-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-support',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-design-palette-pro-support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Genesis Design Palette Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-gdppro-resources',
					'parent' => 'genesis-design-palette-pro',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'gdppro-docs',
				'group-gdppro-resources',
				'https://toolbarextras.com/go/gdppro-support/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'gdppro-site',
				'group-gdppro-resources',
				'https://toolbarextras.com/go/genesis-design-palette-pro/'
			);

		}  // end if
		
}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_dppro_customizer', 100 );
/**
 * Customize items for Genesis Design Palatte Pro Customizer support feature.
 *
 * @since 1.4.0
 * @since 1.4.3 Added Add-On support.
 *
 * @see ddw_tbex_aoitems_genesis_design_palette_pro()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_dppro_customizer( array $items ) {

	/** Bail early if Customizer support in plugin is deactivated */
	if ( ! ddw_tbex_is_gdpp_customizer_active() ) {
		return $items;
	}

	$parent = 'genesis-design-palette-pro-design';

	/** Declare plugin's items */
	$gdpp_items = array(
		'general_body' => array(
			'type'   => 'section',
			'title'  => __( 'General Site Styles', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-general-site-styles',
			'parent' => $parent,
		),
		'header_area' => array(
			'type'   => 'section',
			'title'  => __( 'Header Area', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-header-area',
			'parent' => $parent,
		),
		'navigation' => array(
			'type'   => 'section',
			'title'  => __( 'Navigation Areas', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-navigation-areas',
			'parent' => $parent,
		),
		'post_content' => array(
			'type'   => 'section',
			'title'  => __( 'Post Content Areas', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-post-content-areas',
			'parent' => $parent,
		),
		'content_extras' => array(
			'type'   => 'section',
			'title'  => __( 'Additional Content Styles', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-content-styles',
			'parent' => $parent,
		),
		'comments_area' => array(
			'type'   => 'section',
			'title'  => __( 'Comments Area Settings', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-comment-area',
			'parent' => $parent,
		),
		'main_sidebar' => array(
			'type'   => 'section',
			'title'  => __( 'Main Sidebar Areas', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-sidebar-areas',
			'parent' => $parent,
		),
		'footer_widgets' => array(
			'type'   => 'section',
			'title'  => __( 'Footer Widgets', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-footer-widgets',
			'parent' => $parent,
		),
		'footer_main' => array(
			'type'   => 'section',
			'title'  => __( 'Site Footer Area', 'toolbar-extras' ),
			'id'     => 'gdpprocmz-site-footer-area',
			'parent' => $parent,
		),
	);

	/** Add-On: Entry Content */
	if ( ddw_tbex_is_gdpp_entry_content_addon() ) {

		$gdpp_items[ 'entry_content' ] = array(
			'type'  => 'section',
			'title' => __( 'Entry Content', 'toolbar-extras' ),
			'id'    => 'gdpprocmz-entry-content',
		);

	}  // end if

	/** Add-On: Genesis Widgets > eNews Widget */
	if ( ddw_tbex_is_gdpp_enews_addon() ) {

		$gdpp_items[ 'genesis_widgets' ] = array(
			'type'  => 'section',
			'title' => __( 'Genesis Widgets', 'toolbar-extras' ),
			'id'    => 'gdpprocmz-genesis-widgets',
		);

	}  // end if

	/** Add-On: Freeform Style */
	if ( ddw_tbex_is_gdpp_freeform_style_addon() ) {

		$gdpp_items[ 'freeform_css' ] = array(
			'type'  => 'section',
			'title' => __( 'Freeform CSS', 'toolbar-extras' ),
			'id'    => 'gdpprocmz-freeform-css',
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $gdpp_items );

}  // end function
