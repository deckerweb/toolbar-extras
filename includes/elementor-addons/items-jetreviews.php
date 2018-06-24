<?php

// includes/elementor-addons/items-jetreviews

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetreviews', 100 );
/**
 * Items for Add-On: JetReviews (Premium, by Zemez)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetreviews() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** JetReviews Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-jetreviews',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'JetReviews', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-reviews-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetReviews', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-jetreviews-settings',
				'parent' => 'ao-jetreviews',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-reviews-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for JetReviews */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetreviews-resources',
					'parent' => 'ao-jetreviews',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetreviews-docs',
				'group-jetreviews-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetreviews'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetreviews-facebook',
				'group-jetreviews-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetreviews-site',
				'group-jetreviews-resources',
				'https://jetreviews.zemez.io/'
			);

		}  // end if

}  // end function