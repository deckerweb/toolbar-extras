<?php

// includes/elementor-addons/items-kadence-woocommerce-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Kadence WooCommerce Elementor Pro plugin is active or not.
 *
 * @since  1.3.0
 *
 * @return bool TRUE if class exists, otherwise FALSE.
 */
function ddw_tbex_is_kwce_pro_active() {

	return ( class_exists( 'Kadence_Woocommerce_Elementor_Pro' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_kadence_woocommerce_elementor', 100 );
/**
 * Items for Add-Ons:
 *   Kadence WooCommerce Elementor (free, by Kadence Themes)
 *   Kadence WooCommerce Elementor Pro (Premium, by Kadence Themes)
 *
 * @since  1.3.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_kadence_woocommerce_elementor() {

	$main_label = ddw_tbex_is_kwce_pro_active() ? __( 'WooCommerce Templates', 'toolbar-extras' ) : __( 'Product Templates', 'toolbar-extras' );

	/** Plugin's Templates Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-kdcwcel',
			'parent' => 'group-creative-content',
			'title'  => esc_attr( $main_label ),
			'href'   => ddw_tbex_is_kwce_pro_active() ? esc_url( admin_url( 'edit.php?post_type=product&page=kadence_woo_ele_templates' ) ) : esc_url( admin_url( 'edit.php?post_type=ele-product-template' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_is_kwce_pro_active() ? ddw_tbex_string_premium_addon_title_attr( $main_label ) : ddw_tbex_string_free_addon_title_attr( $main_label )
			)
		)
	);

		if ( ddw_tbex_is_kwce_pro_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-kdcwcel-products',
					'parent' => 'ao-kdcwcel',
					'title'  => esc_attr__( 'Product Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ele-product-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Product Templates', 'toolbar-extras' )
					)
				)
			);

		}  // end if

			/** Product Templates */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-kdcwcel-products-all',
					'parent' => ddw_tbex_is_kwce_pro_active() ? 'ao-kdcwcel-products' : 'ao-kdcwcel',
					'title'  => esc_attr__( 'All Product Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ele-product-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Product Templates', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-kdcwcel-products-new',
					'parent' => ddw_tbex_is_kwce_pro_active() ? 'ao-kdcwcel-products' : 'ao-kdcwcel',
					'title'  => esc_attr__( 'New Product Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-product-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Product Template', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ele-product-template' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-kdcwcel-products-builder',
						'parent' => ddw_tbex_is_kwce_pro_active() ? 'ao-kdcwcel-products' : 'ao-kdcwcel',
						'title'  => esc_attr__( 'New Product Template Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-product-template' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Product Template Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** Pro Version only stuff */
		if ( ddw_tbex_is_kwce_pro_active() ) {

			/** Pro: Product Archives/ Categories etc. Templates */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-kdcwcel-archives',
					'parent' => 'ao-kdcwcel',
					'title'  => esc_attr__( 'Archive Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ele-p-arch-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Archive Templates', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-kdcwcel-archives-all',
						'parent' => 'ao-kdcwcel-archives',
						'title'  => esc_attr__( 'All Archive Templates', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=ele-p-arch-template' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Archive Templates', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-kdcwcel-archives-new',
						'parent' => 'ao-kdcwcel-archives',
						'title'  => esc_attr__( 'New Archive Template', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-p-arch-template' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Archive Template', 'toolbar-extras' )
						)
					)
				);

				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ele-p-arch-template' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'ao-kdcwcel-archives-builder',
							'parent' => 'ao-kdcwcel-archives',
							'title'  => esc_attr__( 'New Archive Builder', 'toolbar-extras' ),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-p-arch-template' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'New Archive Builder', 'toolbar-extras' )
							)
						)
					);

				}  // end if

			/** Pro: Shop Checkout Templates */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-kdcwcel-checkout',
					'parent' => 'ao-kdcwcel',
					'title'  => esc_attr__( 'Checkout Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ele-check-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Checkout Templates', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-kdcwcel-checkout-all',
						'parent' => 'ao-kdcwcel-checkout',
						'title'  => esc_attr__( 'All Checkout Templates', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=ele-check-template' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Checkout Templates', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-kdcwcel-checkout-new',
						'parent' => 'ao-kdcwcel-checkout',
						'title'  => esc_attr__( 'New Checkout Template', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-check-template' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Checkout Template', 'toolbar-extras' )
						)
					)
				);

				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ele-check-template' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'ao-kdcwcel-checkout-builder',
							'parent' => 'ao-kdcwcel-checkout',
							'title'  => esc_attr__( 'New Checkout Builder', 'toolbar-extras' ),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-check-template' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'New Checkout Builder', 'toolbar-extras' )
							)
						)
					);

				}  // end if

		}  // end if Pro version check

		/** Template Settings (WooCommerce) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-kdcwcel-settings',
				'parent' => 'ao-kdcwcel',
				'title'  => esc_attr__( 'Template Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wc-settings&tab=kadence_template_builder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-kdcwcel-resources',
					'parent' => 'ao-kdcwcel',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'kdcwcel-support',
				'group-kdcwcel-resources',
				'https://wordpress.org/support/plugin/kadence-woocommerce-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'kdcwcel-translate',
				'group-kdcwcel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/kadence-woocommerce-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'kdcwcel-site',
				'group-kdcwcel-resources',
				'https://www.kadencethemes.com/product/kadence-woocommerce-elementor/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_kadence_woocommerce_elementor' );
/**
 * Items for "New Content" section: New Product Template
 *
 * @since  1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_kadence_woocommerce_elementor() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	/** (Single) Product Templates */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-ele-product-template',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Product Template', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-product-template' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Add new WooCommerce Product Template', 'Toolbar New Content section', 'toolbar-extras' )
			)
		)
	);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'ele-product-template' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'kdcwcel-product-with-builder',
					'parent' => 'new-ele-product-template',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-product-template' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder()
					)
				)
			);

		}  // end if

	/** Pro version only stuff */
	if ( ddw_tbex_is_kwce_pro_active() ) {

		/** Product Archives Templates */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'new-ele-p-arch-template',
				'parent' => 'new-content',
				'title'  => esc_attr_x( 'Product Archive Template', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-p-arch-template' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new WooCommerce Product Archive Template', 'Toolbar New Content section', 'toolbar-extras' )
				)
			)
		);

			if ( \Elementor\User::is_current_user_can_edit_post_type( 'ele-p-arch-template' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'kdcwcel-archive-with-builder',
						'parent' => 'new-ele-p-arch-template',
						'title'  => ddw_tbex_string_newcontent_with_builder(),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-p-arch-template' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_newcontent_create_with_builder()
						)
					)
				);

			}  // end if

		/** Shop Checkout Templates */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'new-ele-check-template',
				'parent' => 'new-content',
				'title'  => esc_attr_x( 'Shop Checkout Template', 'Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=ele-check-template' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Add new WooCommerce Shop Checkout Template', 'Toolbar New Content section', 'toolbar-extras' )
				)
			)
		);

			if ( \Elementor\User::is_current_user_can_edit_post_type( 'ele-check-template' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'kdcwcel-checkout-with-builder',
						'parent' => 'new-ele-check-template',
						'title'  => ddw_tbex_string_newcontent_with_builder(),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ele-check-template' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_newcontent_create_with_builder()
						)
					)
				);

			}  // end if

	}  // end if Pro version check

}  // end if