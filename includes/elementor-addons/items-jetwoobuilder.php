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
 * Items for Add-On: JetWooBuilder (Premium, by Zemez Jet/ CrocoBlock)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetwoobuilder() {

	/** Plugin's Templates Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-jetwoobuilder',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Jet Woo Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=jet-woo-builder' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'WooCommerce Product Templates', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-all',
				'parent' => 'ao-jetwoobuilder',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=jet-woo-builder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-new',
				'parent' => 'ao-jetwoobuilder',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-woo-builder' ) ),
				'meta'   => array(
					'class'  => 'jet-template-popup-active',
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'jet-woo-builder' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetwoobuilder-builder',
					'parent' => 'ao-jetwoobuilder',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-woo-builder' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-settings-elementor',
				'parent' => 'ao-jetwoobuilder',
				/* translators: %s - Name of Elementor or white labeled name */
				'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-woo-builder-settings' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: %s - Name of Elementor or white labeled name */
					'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), ddw_tbex_string_elementor() )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetwoobuilder-settings-woocommerce',
				'parent' => 'ao-jetwoobuilder',
				/* translators: %s - Name of WooCommerce */
				'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), __( 'WooCommerce', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=wc-settings&tab=jet-woo-builder-settings' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: %s - Name of WooCommerce */
					'title'  => sprintf( esc_attr__( '%s Settings', 'toolbar-extras' ), __( 'WooCommerce', 'toolbar-extras' ) )
				)
			)
		);

		/** Group: Resources for JetBlocks */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetwoobuilder-resources',
					'parent' => 'ao-jetwoobuilder',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
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
 * @since  1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_jetwoobuilder() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'jet-woo-builder' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jetwoobuilder-with-builder',
			'parent' => 'new-jet-woo-builder',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-woo-builder' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder()
			)
		)
	);

}  // end if