<?php

// includes/elementor-addons/items-bdthemes-element-pack

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_bdthemes_element_pack', 100 );
/**
 * Items for Add-On: Element Pack (by BdThemes)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_bdthemes_element_pack() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Extras Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-bdepack',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Element Pack', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Element Pack', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-bdepack-widgets',
				'parent' => 'ao-bdepack',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_active_modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-bdepack-thirdparty-widgets',
				'parent' => 'ao-bdepack',
				'title'  => esc_attr__( 'Third-Party Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_third_party_widget' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Third-Party Widgets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-bdepack-extensions',
				'parent' => 'ao-bdepack',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_elementor_extend' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-bdepack-api',
				'parent' => 'ao-bdepack',
				'title'  => esc_attr__( 'API Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_api_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'API Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Elementor Extras */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-bdepack-resources',
					'parent' => 'ao-bdepack',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'bdepack-kb',
				'group-bdepack-resources',
				'https://bdthemes.com/support/article-categories/element-pack/'
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'bdepack-youtube',
				'group-bdepack-resources',
				'https://www.youtube.com/watch?v=1tNppRHvSvQ&list=PLP0S85GEw7DOJf_cbgUIL20qqwqb5x8KA'
			);

			ddw_tbex_resource_item(
				'user-forum',
				'bdepack-forum',
				'group-bdepack-resources',
				'https://bdthemes.com/support/forum/wordpress-plugins/element-pack-addon-elementor-page-builder-wordpress-plugin/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'bdepack-support',
				'group-bdepack-resources',
				'https://bdthemes.com/contact/'
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'bdepack-translations',
				'group-bdepack-resources',
				'https://bdthemes.co/ep-translate/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'bdepack-site',
				'group-bdepack-resources',
				'https://bdthemes.com/portfolio-item/element-pack/'
			);

		}  // end if

}  // end function