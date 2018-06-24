<?php

// includes/elementor-addons/items-pt-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_pt_elementor_lite', 100 );
/**
 * Items for Add-On: PT Elementor Addons Lite (free, by ParamThemes)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_pt_elementor_lite() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-ptelite',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'PT Elementor Lite', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=pt-plugin-base' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'PT Elementor Lite', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-ptelite-settings',
				'parent' => 'ao-ptelite',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pt-plugin-base' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-ptelite-resources',
					'parent' => 'ao-ptelite',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ptelite-support',
				'group-ptelite-resources',
				'https://wordpress.org/support/plugin/pt-elementor-addons-lite'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'ptelite-facebook',
				'group-ptelite-resources',
				'https://www.facebook.com/groups/335254883593121/'
			);
			
			ddw_tbex_resource_item(
				'translations-community',
				'ptelite-translate',
				'group-ptelite-resources',
				'https://translate.wordpress.org/projects/wp-plugins/pt-elementor-addons-lite'
			);

		}  // end if

}  // end function