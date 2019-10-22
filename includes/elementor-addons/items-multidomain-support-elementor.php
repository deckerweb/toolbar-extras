<?php

// includes/elementor-addons/items-multidomain-support-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_multidomain_support_elementor', 100 );
/**
 * Items for Add-On: Multidomain Support for Elementor (free, by Alex Zappa)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_multidomain_support_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-mdsupportfel',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Multidomain Support', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=multidomain-support-for-elementor-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Multidomain Support for Elementor with Polylang or WPML', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-mdsupportfel-settings-general',
				'parent' => 'ao-mdsupportfel',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=multidomain-support-for-elementor-settings#tab-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-mdsupportfel-settings-general',
				'parent' => 'ao-mdsupportfel',
				'title'  => esc_attr__( 'Server', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=multidomain-support-for-elementor-settings#tab-server' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Server', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-mdsupportfel-resources',
					'parent' => 'ao-mdsupportfel',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mdsupportfel-docs',
				'group-mdsupportfel-resources',
				'https://wordpress.org/support/plugin/multidomain-support-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mdsupportfel-translations',
				'group-mdsupportfel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/multidomain-support-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'mdsupportfel-github',
				'group-mdsupportfel-resources',
				'https://github.com/reatlat/wp-multidomain-support-for-elementor'
			);

		}  // end if

}  // end function
