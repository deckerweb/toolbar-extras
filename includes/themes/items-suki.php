<?php

// includes/themes/items-suki

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Suki Pro Add-On plugin is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if constant is defined, FALSE otherwise.
 */
function ddw_tbex_is_suki_pro_active() {

	return defined( 'SUKI_PRO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_suki', 100 );
/**
 * Items for Theme: Suki (free, by SukiWP/ David Rozando)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_is_suki_pro_active()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_suki() {

	/** Respect Suki White Labeling (if Pro Add-On plugin is active) */
	$suki_theme_name = wp_get_theme( get_template() )->get( 'Name' );

	if ( ddw_tbex_is_suki_pro_active() ) {
		$suki_whitelabel = get_option( 'suki_white_label' );
		$suki_theme_name = ( ! empty( $suki_whitelabel[ 'suki_name' ] ) ) ? $suki_whitelabel[ 'suki_name' ] : $suki_theme_name;
	}

	/** Suki creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			/* translators: (Static) Theme name Suki - optionally white labeled string */
			'title'  => sprintf( esc_attr__( 'Theme: %s', 'toolbar-extras' ), $suki_theme_name ),	// ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=suki' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: (Static) Theme name Suki - optionally white labeled string */
				'title'  => sprintf( esc_attr__( 'Theme: %s', 'toolbar-extras' ), $suki_theme_name )	//ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

	/** Suki customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_suki_customize' );
/**
 * Customize items for Suki Theme
 *
 * @since 1.4.0
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_suki_customize( array $items ) {

	/** Declare theme's items */
	$suki_items = array(
		'suki_panel_header' => array(
			'type'  => 'panel',
			'title' => __( 'Header Builder', 'toolbar-extras' ),
			'id'    => 'sukicmz-header',
		),
		'suki_panel_footer' => array(
			'type'  => 'panel',
			'title' => __( 'Footer Builder', 'toolbar-extras' ),
			'id'    => 'sukicmz-footer',
		),
		'suki_section_page_header' => array(
			'type'  => 'section',
			'title' => __( 'Page Header (Title Bar)', 'toolbar-extras' ),
			'id'    => 'sukicmz-page-header',
		),
		'suki_section_page_container' => array(
			'type'  => 'section',
			'title' => __( 'Page Canvas &amp; Wrapper', 'toolbar-extras' ),
			'id'    => 'sukicmz-page-canvas-wrapper',
		),
		'suki_section_blog' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'sukicmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'suki_panel_page_settings' => array(
			'type'  => 'panel',
			'title' => __( 'Page Settings', 'toolbar-extras' ),
			'id'    => 'sukicmz-page-settings',
		),
		'suki_panel_content' => array(
			'type'  => 'panel',
			'title' => __( 'Content &amp; Sidebar', 'toolbar-extras' ),
			'id'    => 'sukicmz-content',
		),
		'suki_panel_global_elements' => array(
			'type'   => 'panel',
			'title'  => __( 'General Elements', 'toolbar-extras' ),
			'id'     => 'sukicmz-general-elements',
		),
		'suki_panel_global_settings' => array(
			'type'   => 'panel',
			'title'  => __( 'General Settings', 'toolbar-extras' ),
			'id'     => 'sukicmz-general-settings',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$suki_items[ 'woocommerce' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Settings', 'toolbar-extras' ),
			'id'          => 'sukicmz-woocommerce-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $suki_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_suki_resources', 120 );
/**
 * General resources items for Suki Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_suki_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_suki_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Suki Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_suki_pro_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/suki'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.sukiwp.com/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for Suki Pro resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/sukiwp/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/suki'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/sukiwp/suki'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://sukiwp.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_suki_pro', 100 );
/**
 * Items for Theme: Suki Pro - Add-On Plugin (Premium, by SukiWP/ David Rozando)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_suki_pro_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_suki_pro() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_suki_pro_active() ) {
		return;
	}

	/** Get Suki Pro white label strings */
	$suki_whitelabel = get_option( 'suki_white_label' );
	$suki_pro_title  = sprintf(
		/* translators: %1$s - Suki Pro name */
		esc_attr__( '%1$s Settings', 'toolbar-extras' ),
		( ! empty( $suki_whitelabel[ 'suki_pro_name' ] ) ) ? $suki_whitelabel[ 'suki_pro_name' ] : esc_attr__( 'Suki Pro', 'toolbar-extras' )
	);

	/** Suki settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => $suki_pro_title,
			'href'   => esc_url( admin_url( 'themes.php?page=suki' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $suki_pro_title
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-modules',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=suki' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

		/** Optional White Label */
		$suki_hide_whitelabel = get_option( 'suki_white_label_hide' );

		if ( 1 !== $suki_hide_whitelabel ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-settings-whitelabel',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'White Label', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=suki-white-label' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'White Label Branding', 'toolbar-extras' )
					)
				)
			);

		}  // end if

	/** Get current active Suki Pro modules */
	$suki_modules = get_option( 'suki_pro_active_modules', array() );

	/** Module: Custom Blocks */
	if ( in_array( 'custom-blocks', $suki_modules ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-suki-blocks',
				'parent' => 'theme-creative'
			)
		);

			$type = 'suki_block';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'suki-custom-blocks-all',
					'parent' => 'group-suki-blocks',
					'title'  => esc_attr__( 'Custom Blocks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'suki-custom-blocks-new',
					'parent' => 'group-suki-blocks',
					'title'  => esc_attr__( 'New Block', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Block', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'suki-custom-blocks-builder',
						'parent' => 'group-suki-blocks',
						'title'  => esc_attr__( 'New Block Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Block Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			/** Block categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'suki-custom-blocks-categories',
						'parent' => 'group-suki-blocks',
						'title'  => ddw_btc_string_template( 'block' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'block' ) )
						)
					)
				);

			}  // end if

	}  // end if

	/** Module: Custom Fonts */
	if ( in_array( 'custom-fonts', $suki_modules ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-suki-fonts',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'suki-custom-fonts-configure',
					'parent' => 'group-suki-fonts',
					'title'  => esc_attr__( 'Custom Fonts', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=suki-custom-fonts' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Fonts', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** Module: Custom Icons */
	if ( in_array( 'custom-icons', $suki_modules ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-suki-icons',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'suki-custom-icons-overrides',
					'parent' => 'group-suki-icons',
					'title'  => esc_attr__( 'Custom Icons: Overrides', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=suki-custom-icons&tab=override' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Icons: Override Default Icons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'suki-custom-icons-social',
					'parent' => 'group-suki-icons',
					'title'  => esc_attr__( 'Custom Icons: Social Icons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=suki-custom-icons&tab=add_social' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Icons: Add Social Icons', 'toolbar-extras' )
					)
				)
			);

	}  // end if

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_suki_pro_resources' );
/**
 * Additional Resource Items for Suki Pro
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_suki_pro_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_suki_pro_resources() {

	/** Bail early if Pro version is not active */
	if ( ! ddw_tbex_is_suki_pro_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://docs.sukiwp.com/article/suki-pro-modules/'
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_themeitems_new_content_suki_pro' );
/**
 * Items for "New Content" section: New Suki Pro Custom Block
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_elementor_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_new_content_suki_pro() {

	/** Get current active Suki Pro modules */
	$suki_modules = get_option( 'suki_pro_active_modules', array() );

	/** Bail early if Suki Pro module not active */
	if ( ! in_array( 'custom-blocks', $suki_modules ) ) {
		return;
	}

	$type = 'suki_block';

	/** OceanWP Library (Core) */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-' . $type,
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Custom Block', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'Custom Block', 'toolbar-extras' ) )
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'suki-block-with-builder',
				'parent' => 'new-' . $type,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
