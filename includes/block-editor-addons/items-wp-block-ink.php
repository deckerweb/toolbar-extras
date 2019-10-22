<?php

// includes/block-editor-addons/items-wp-block-ink

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wp_block_ink', 110 );
/**
 * Items for Add-On: WP Block Ink (free, by Dave Ryan)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resources_color_wheel()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wp_block_ink( $admin_bar ) {

	/** Plugin's settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-wpblockink',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'WP Block Ink', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=wp-block-ink' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'WP Block Ink', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpblockink-set-colors',
				'parent' => 'ao-wpblockink',
				'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'control', 'wp_block_ink_enabled' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Define Colors', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpblockink-style-guide',
				'parent' => 'ao-wpblockink',
				'title'  => esc_attr__( 'Style Guide', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wp-block-ink&tab=style-guide' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Style Guide', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpblockink-css-reference',
				'parent' => 'ao-wpblockink',
				'title'  => esc_attr__( 'CSS Reference', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wp-block-ink&tab=css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'CSS Reference', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-wpblockink-status',
				'parent' => 'ao-wpblockink',
				'title'  => esc_attr__( 'Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=wp-block-ink&tab=status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Status', 'toolbar-extras' ),
				)
			)
		);

		/** Color Wheel Resources */
		ddw_tbex_resources_color_wheel( $admin_bar, 'wpblockink', 'ao-wpblockink' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpblockink-resources',
					'parent' => 'ao-wpblockink',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpblockink-support',
				'group-wpblockink-resources',
				'https://wordpress.org/support/plugin/wp-block-ink'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpblockink-translate',
				'group-wpblockink-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-block-ink'
			);

			ddw_tbex_resource_item(
				'github',
				'wpblockink-github',
				'group-wpblockink-resources',
				'https://github.com/0aveRyan/wp-block-ink'
			);

		}  // end if

}  // end function
