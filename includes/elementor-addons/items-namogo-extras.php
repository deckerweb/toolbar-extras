<?php

// includes/elementor-addons/items-namogo-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementor_extras', 100 );
/**
 * Items for Add-On: Elementor Extras (Premium, by Namogo)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementor_extras( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-namogoextras',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Elementor Extras', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-extras' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Elementor Extras', 'toolbar-extras' ) )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-namogoextras-widgets',
				'parent' => 'ao-namogoextras',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extras#elementor_extras_widgets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-namogoextras-extensions',
				'parent' => 'ao-namogoextras',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extras#elementor_extras_extensions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-namogoextras-apis',
				'parent' => 'ao-namogoextras',
				'title'  => esc_attr__( 'Activate APIs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extras#elementor_extras_apis' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate APIs', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-namogoextras-advanced',
				'parent' => 'ao-namogoextras',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-extras#elementor_extras_advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-namogoextras-license',
				'parent' => 'ao-namogoextras',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor_extras_license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-namogoextras-resources',
					'parent' => 'ao-namogoextras',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'namogoextras-docs',
				'group-namogoextras-resources',
				'https://shop.namogo.com/docs/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'namogoextras-facebook',
				'group-namogoextras-resources',
				'https://www.facebook.com/groups/ElementorExtras/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'namogoextras-support',
				'group-namogoextras-resources',
				'https://shop.namogo.com/account/my-tickets/submit-ticket/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'namogoextras-changelogs',
				'group-namogoextras-resources',
				'https://shop.namogo.com/elementor-extras/changelog/',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'namogoextras-site',
				'group-namogoextras-resources',
				'https://shop.namogo.com/product/elementor-extras/'
			);

		}  // end if

}  // end function
