<?php

// includes/elementor-addons/items-jetwoobuilder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetwoobuilder', 100 );
/**
 * Items for Add-On: JetWooBuilder (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.2.0
 * @since 1.3.5 Added BTC plugin support.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetwoobuilder( $admin_bar ) {

	/** Plugin's Templates Content */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetwoobuilder',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Jet Woo Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=jet-woo-builder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'WooCommerce Product Templates', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-all',
				'parent' => 'ao-jetwoobuilder',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=jet-woo-builder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-new',
				'parent' => 'ao-jetwoobuilder',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-woo-builder' ) ),
				'meta'   => array(
					'class'  => 'jet-template-popup-active',
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'jet-woo-builder' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetwoobuilder-builder',
					'parent' => 'ao-jetwoobuilder',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-woo-builder' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetwoobuilder-categories',
					'parent' => 'ao-jetwoobuilder',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=jet-woo-builder' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-settings-elementor',
				'parent' => 'ao-jetwoobuilder',
				/* translators: %s - Name of Elementor or white labeled name */
				'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-woo-builder-settings' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: %s - Name of Elementor or white labeled name */
					'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-settings-woocommerce',
				'parent' => 'ao-jetwoobuilder',
				/* translators: %s - Name of WooCommerce */
				'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), __( 'WooCommerce', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=wc-settings&tab=jet-woo-builder-settings' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: %s - Name of WooCommerce */
					'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), __( 'WooCommerce', 'toolbar-extras' ) ),
				)
			)
		);

		/** Group: Resources for JetWooBuilder */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetwoobuilder-resources',
					'parent' => 'ao-jetwoobuilder',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetwoobuilder-docs',
				'group-jetwoobuilder-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetwoobuilder'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetwoobuilder-facebook',
				'group-jetwoobuilder-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jetwoobuilder-changelog',
				'group-jetwoobuilder-resources',
				'http://documentation.zemez.io/wordpress/index.php?project=jetwoobuilder&lang=en&section=jetwoobuilder-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetwoobuilder-site',
				'group-jetwoobuilder-resources',
				'https://jetwoobuilder.zemez.io/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_jetwoobuilder' );
/**
 * Items for "New Content" section: New Product Template
 *
 * @since 1.2.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_jetwoobuilder( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'jet-woo-builder' ) ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'jetwoobuilder-with-builder',
			'parent' => 'new-jet-woo-builder',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-woo-builder' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder(),
			)
		)
	);

}  // end if
