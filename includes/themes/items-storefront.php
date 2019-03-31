<?php

// includes/themes/items-storefront

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_storefront', 100 );
/**
 * Items for Theme: Storefront (free, by Automattic, Inc.)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_storefront() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

	/** Storefront customize */
	ddw_tbex_item_theme_creative_customize();

	/**
	 * Third-party Add-On: Storefront Footer Copyright Text (free, by QuadMenu)
	 */
	if ( class_exists( 'Storefront_Footer' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'storefrontao-footer-copyright',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Footer Copyright Text', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=storefront-footer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Footer Copyright Text', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_storefront_customize' );
/**
 * Customize items for Storefront Theme
 *
 * Items for official and third-party Storefront Add-Ons are added in-between
 *   where appropriate (and only when the Add-On is active).
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_woocommerce_active()
 * @uses ddw_tbex_is_jetpack_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_storefront_customize( array $items ) {

	/** Declare theme's items */
	$storefront_items = array(
		'header_image' => array(
			'type'  => 'section',
			'title' => __( 'Header', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-header',
		),
		'storefront_footer' => array(
			'type'  => 'section',
			'title' => __( 'Footer', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-footer',
		),
		'background_image' => array(
			'type'  => 'section',
			'title' => __( 'Background', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-background',
		),
		'storefront_typography' => array(
			'type'  => 'section',
			'title' => __( 'Typography', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-typography',
		),
		'storefront_buttons' => array(
			'type'  => 'section',
			'title' => __( 'Buttons', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-buttons',
		),
		'storefront_layout' => array(
			'type'  => 'section',
			'title' => __( 'Layout', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-layout',
		),
	);

	/** Optional "Powerpack" item */
	if ( class_exists( 'Storefront_Powerpack' ) ) {

		$storefront_items[ 'sp_panel' ] = array(
			'type'  => 'panel',
			'title' => __( 'Powerpack', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-powerpack',
		);

	}  // end if

	/** Optional "Blog Customiser" item */
	if ( class_exists( 'Storefront_Blog_Customiser' ) ) {

		$storefront_items[ 'sbc_panel' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Blog', 'toolbar-extras' ),
			'id'          => 'storefrontcmz-blog',
			'preview_url' => get_post_type_archive_link( 'post' ),
		);

	}  // end if

	/** Optional "Blog Excerpt" item */
	if ( class_exists( 'Storefront_Blog_Excerpt' ) ) {

		$storefront_items[ 'woa_sf_blog_excerpt_customizer_section' ] = array(
			'type'        => 'section',
			'title'       => __( 'Blog Excerpt', 'toolbar-extras' ),
			'id'          => 'storefrontcmz-blog-excerpt',
			'preview_url' => get_post_type_archive_link( 'post' ),
		);

	}  // end if

	/** Optional "Parallax Hero" item */
	if ( class_exists( 'Storefront_Parallax_Hero' ) ) {

		$storefront_items[ 'sph_panel' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Parallax Hero', 'toolbar-extras' ),
			'id'          => 'storefrontcmz-parallax-hero',
			'preview_url' => esc_url( site_url( '/' ) ),
		);

	}  // end if

	/** Optional "Top Bar" item */
	if ( class_exists( 'Storefront_Top_Bar' ) ) {

		$storefront_items[ 'woa_sf_top_bar' ] = array(
			'type'  => 'section',
			'title' => __( 'Top Bar', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-top-bar',
		);

	}  // end if

	/** Optional "Footer Bar" item */
	if ( class_exists( 'Storefront_Footer_Bar' ) ) {

		$storefront_items[ 'sfb_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Footer Bar', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-footer-bar',
		);

	}  // end if

	/** Optional "Site Logo/ Branding" item */
	if ( class_exists( 'Storefront_Site_Logo' ) ) {

		$storefront_items[ 'woa_sf_branding' ] = array(
			'type'  => 'section',
			'title' => __( 'Branding', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-site-logo',
		);

	}  // end if

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$storefront_items[ 'storefront_single_product_page' ] = array(
			'type'        => 'section',
			'title'       => __( 'Product Page', 'toolbar-extras' ),
			'id'          => 'storefrontcmz-product-page',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

		/** Optional "Product Hero" item */
		if ( class_exists( 'Storefront_Product_Hero' ) ) {

			$storefront_items[ 'sprh_panel' ] = array(
				'type'        => 'panel',
				'title'       => __( 'Product Hero', 'toolbar-extras' ),
				'id'          => 'storefrontcmz-product-hero',
				'preview_url' => get_post_type_archive_link( 'product' ),
			);

		}  // end if

	}  // end if

	/** Optional "Pricing Tables" item */
	if ( class_exists( 'Storefront_Pricing_Tables' ) ) {

		$storefront_items[ 'spt_section' ] = array(
			'type'  => 'section',
			'title' => __( 'Pricing Tables', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-pricing-tables',
		);

	}  // end if

	/** Optional "Homepage Contact Section" item */
	if ( ( ddw_tbex_is_jetpack_active() && Jetpack::is_module_active( 'contact-form' ) )
		&& class_exists( 'Storefront_Homepage_Contact_Section' )
	) {

		$storefront_items[ 'shcs_section' ] = array(
			'type'        => 'section',
			'title'       => __( 'Contact Section', 'toolbar-extras' ),
			'id'          => 'storefrontcmz-contact-section',
			'preview_url' => esc_url( site_url( '/' ) ),
		);

	}  // end if

	/** Optional "Advance Typography" item */
	if ( function_exists( 'sgf_storefront_customize_register' ) ) {

		$storefront_items[ 'sgf_advance_typography' ] = array(
			'type'  => 'panel',
			'title' => __( 'Advanced Typography', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-advanced-typography',
		);

	}  // end if

	/** Optional "Storefront Hooks" item */
	if ( class_exists( 'Storefront_Hooks_Customizer' ) ) {

		$storefront_items[ 'storefront_hooks' ] = array(
			'type'  => 'panel',
			'title' => __( 'Storefront Hooks', 'toolbar-extras' ),
			'id'    => 'storefrontcmz-hooks',
		);

	}  // end if

	/** Merge and return with all items */
	return array_merge( $items, $storefront_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_storefront_resources', 120 );
/**
 * General resources items for Storefront Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_storefront_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Storefront */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/storefront'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-support',
		'group-theme-resources',
		'https://docs.woocommerce.com/documentation/themes/storefront/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/storefront'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://woocommerce.com/storefront/'
	);

	/** Developer documentation */
	if ( ddw_tbex_display_items_dev_mode() ) {

		ddw_tbex_resource_item(
			'documentation-dev',
			'theme-dev-blog',
			'group-theme-resources',
			'https://woocommerce.wordpress.com/category/storefront/'
		);

	}  // end if

}  // end function
