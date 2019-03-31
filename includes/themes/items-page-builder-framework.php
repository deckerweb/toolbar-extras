<?php

// items-page-builder-framework
// items-page-builder-framework-premium

// includes/themes/items-page-builder-framework

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Page Builder Framework Premium Add-On plugin is active or not.
 *
 * @since 1.1.0
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_wpbf_premium_active() {

	return defined( 'WPBF_PREMIUM_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_pbf', 100 );
/**
 * Items for Theme:
 *   Page Builder Framework (free & Premium, by David Vongries & MapSteps)
 *
 * @since 1.1.0
 * @since 1.4.0 Simplified functions; added White Label support.
 *
 * @uses ddw_tbex_is_wpbf_premium_active()
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_pbf() {

	/** Get Premium White Label settings */
	$wpbf_settings = get_option( 'wpbf_settings' );

	/** Set optional Theme title via White Label settings */
	$title = ( ddw_tbex_is_wpbf_premium_active() && ! empty( $wpbf_settings[ 'wpbf_theme_name' ] ) ) ? esc_attr( $wpbf_settings[ 'wpbf_theme_name' ] ) : '';

	/** Page Builder Framework creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child', $title ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'layout_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child', $title )
			)
		)
	);

	/** Page Builder Framework customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_pbf_customize' );
/**
 * Customize items for Page Builder Framework Theme
 *
 * @since 1.1.0
 * @since 1.3.5 Added Blog panel.
 * @since 1.4.0 Refactored using filter/array declaration.
 *
 * @uses ddw_tbex_is_woocommerce_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_pbf_customize( array $items ) {

	/** Remove default item (to re-add at another position) */
	if ( isset( $items[ 'title_tagline' ] ) ) {
		$items[ 'title_tagline' ] = null;
	}

	/** Declare theme's items */
	$pbf_items = array(
		'layout_panel' => array(
			'type'  => 'panel',
			'title' => __( 'General', 'toolbar-extras' ),
			'id'    => 'pbfcmz-general',
		),
		'blog_panel' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'pbfcmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'typo_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'pbfcmz-typography',
		),
		'header_panel' => array(
			'type'  => 'panel',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'pbfcmz-header',
		),
		'wpbf_footer_options' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'pbfcmz-footer',
		),
		/** Re-add here */
		'title_tagline' => array(
			'type' => 'section',
		),
	);

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() && function_exists( 'wpbf_woo_deregister_defaults' ) ) {

		$pbf_items[ 'woocommerce' ] = array(
			'type'        => 'panel',
			'title'       => __( 'WooCommerce Integration', 'toolbar-extras' ),
			'id'          => 'pbfcmz-woocommerce',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $pbf_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_pbf_resources', 120 );
/**
 * General resources items for Page Builder Framework Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_wpbf_premium_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_pbf_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Page Builder Framework Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_wpbf_premium_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/page-builder-framework'
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/wpagebuilderframework/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/docs/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for WPBF Premium resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/page-builder-framework'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/MapSteps/Page-Builder-Framework'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_wpbf_premium', 100 );
/**
 * Items for Theme: Page Builder Framework Premium - Add-On Plugin (Premium, by David Vongries & MapSteps)
 *
 * @since 1.1.0
 * @since 1.3.8 Added "Custom Sections" support.
 * @since 1.4.0 Added White Label support.
 *
 * @uses ddw_tbex_is_wpbf_premium_active()
 * @uses ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_wpbf_premium() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_wpbf_premium_active() ) {
		return;
	}

	/** Get Premium White Label settings */
	$wpbf_settings = get_option( 'wpbf_settings' );

	/** Set optional Premium Add-On title via White Label settings */
	$title = sprintf(
		/* translators: %s - name of the White-labeled Premium Add-On plugin; fallback is "PBF Premium" */
		esc_attr__( '%s Settings', 'toolbar-extras' ),
		( ! empty( $wpbf_settings[ 'wpbf_plugin_name' ] ) ) ? esc_attr( $wpbf_settings[ 'wpbf_plugin_name' ] ) : __( 'PBF Premium', 'toolbar-extras' )
	);

	/** Page Builder Framework settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title,
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-global',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Global Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Global Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-license',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wpbf-premium&tab=license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

	/** Premium: Custom Sections */
	if ( class_exists( '\WPBF\HookSystem' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'wpbf-sections',
				'parent' => 'theme-creative'
			)
		);

			$type = 'wpbf_hooks';

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpbf-sections-all',
					'parent' => 'wpbf-sections',
					'title'  => esc_attr__( 'Custom Sections', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Sections', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'wpbf-sections-new',
					'parent' => 'wpbf-sections',
					'title'  => esc_attr__( 'New Section', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Section', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'wpbf-sections-builder',
						'parent' => 'wpbf-sections',
						'title'  => esc_attr__( 'New Section Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Section Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			/** Section categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'wpbf-sections-categories',
						'parent' => 'wpbf-sections',
						'title'  => ddw_btc_string_template( 'section' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'section' ) )
						)
					)
				);

			}  // end if

	}  // end if Custom Sections

	/** Premium Add-On: Customizer additions */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'pbfcmz-scripts-styles',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Scripts &amp; Styles', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'scripts_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Scripts &amp; Styles', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_wpbf_premium_resources' );
/**
 * Additional Resource Items for Page Builder Framework Premium
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_is_wpbf_premium_active()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_wpbf_premium_resources() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_wpbf_premium_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://wp-pagebuilderframework.com/docs_cats/premium/'
	);

	ddw_tbex_resource_item(
		'translations-pro',
		'theme-translations-pro',
		'group-theme-resources',
		'http://translate.wp-pagebuilderframework.com/sign-up/'
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_themeitems_new_content_wpbf_premium' );
/**
 * Items for "New Content" section: New Custom Section
 *
 * @since 1.3.8
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_new_content_wpbf_premium() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$type = 'wpbf_hooks';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-new-' . $type,
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Custom Section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'New Custom Section', 'toolbar-extras' ),
			)
		)
	);

	if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpbf-section-with-builder',
				'parent' => 'tbex-new-' . $type,
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
