<?php

// includes/plugins/items-bsf-sidebar-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_bsf_sidebar_manager' );
/**
 * Items for Plugin: Lightweight Sidebar Manager (free, by Brainstorm Force)
 *
 * @since 1.2.0
 * @since 1.4.7 Added BTC categories item.
 *
 * @uses ddw_tbex_is_btcplugin_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_bsf_sidebar_manager( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-bsf-sidebars',
			'parent' => 'wpwidgets',
		)
	);

		$type = 'bsf-sidebar';

		$admin_bar->add_node(
			array(
				'id'     => 'widget-bsf-sidebar-manager',
				'parent' => 'group-bsf-sidebars',
				'title'  => esc_attr__( 'Sidebar Manager', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sidebar Manager', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'widget-bsf-new-sidebar',
				'parent' => 'group-bsf-sidebars',
				'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Sidebar', 'toolbar-extras' ),
				)
			)
		);

		/** Sidebar categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'widget-bsf-sidebar-categories',
					'parent' => 'group-bsf-sidebars',
					'title'  => ddw_btc_string_template( 'sidebar' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'sidebar' ) ),
					)
				)
			);

		}  // end if

}  // end function
