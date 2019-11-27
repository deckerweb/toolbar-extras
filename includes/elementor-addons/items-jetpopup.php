<?php

// includes/elementor-addons/items-jetpopup

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetpopup', 100 );
/**
 * Items for Add-On: JetPopup (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetpopup( $admin_bar ) {

	$post_type = 'jet-popup';

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetpopup',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'JetPopup', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetPopup', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetpopup-all',
				'parent' => 'ao-jetpopup',
				'title'  => esc_attr__( 'All Popups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Popups', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetpopup-new',
				'parent' => 'ao-jetpopup',
				'title'  => esc_attr__( 'New Popup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Popup', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $post_type ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetpopup-builder',
					'parent' => 'ao-jetpopup',
					'title'  => esc_attr__( 'New Popup Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $post_type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Popup Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Popup categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetpopup-categories',
					'parent' => 'ao-jetpopup',
					'title'  => ddw_btc_string_template( 'popup' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'popup' ) ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetpopup-library',
				'parent' => 'ao-jetpopup',
				'title'  => esc_attr__( 'Popup Library', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type . '&page=jet-popup-library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Popup Library', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-jetpopup-settings',
				'parent' => 'ao-jetpopup',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type . '&page=jet-popup-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetpopup-resources',
					'parent' => 'ao-jetpopup',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetpopup-docs',
				'group-jetpopup-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetpopup'
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'jetpopup-youtube-tutorials',
				'group-jetpopup-resources',
				'https://www.youtube.com/watch?v=jrVlK19ICUA&list=PLdaVCVrkty71FOnOPwzA1WVyqpsvLbh3_'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetpopup-facebook',
				'group-jetpopup-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jetpopup-changelog',
				'group-jetpopup-resources',
				'http://documentation.zemez.io/wordpress/index.php?project=jetpopup&lang=en&section=jetpopup-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetpopup-site',
				'group-jetpopup-resources',
				'https://jetpopup.zemez.io/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_jetpopup' );
/**
 * Items for "New Content" section: New Jet Popup
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_jetpopup( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ! \Elementor\User::is_current_user_can_edit_post_type( 'jet-popup' ) ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'jetpopup-with-builder',
			'parent' => 'new-jet-popup',
			'title'  => esc_attr__( 'Popup Builder', 'toolbar-extras' ),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-popup' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Popup Builder', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
