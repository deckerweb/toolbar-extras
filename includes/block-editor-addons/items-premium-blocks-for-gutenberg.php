<?php

// includes/block-editor-addons/items-premium-blocks-for-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_premium_blocks_gutenberg', 10 );
/**
 * Site items for Plugin: Premium Blocks for Gutenberg (free, by Leap13)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_premium_blocks_gutenberg() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-premium-gutenberg',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Premium Blocks for Gutenberg', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Premium Blocks for Gutenberg', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'premium-gutenberg-activate-blocks',
				'parent' => 'tbex-premium-gutenberg',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'premium-gutenberg-settings',
				'parent' => 'tbex-premium-gutenberg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg-maps' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'premium-gutenberg-version-control',
				'parent' => 'tbex-premium-gutenberg',
				'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg-version' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Version Control', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'premium-gutenberg-system-info',
				'parent' => 'tbex-premium-gutenberg',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'premium-gutenberg-about',
				'parent' => 'tbex-premium-gutenberg',
				'title'  => esc_attr__( 'About', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=premium-gutenberg-about' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'About', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-pbfgb-resources',
					'parent' => 'tbex-premium-gutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'pbfgb-support',
				'group-pbfgb-resources',
				'https://wordpress.org/support/plugin/premium-blocks-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'pbfgb-translate',
				'group-pbfgb-resources',
				'https://translate.wordpress.org/projects/wp-plugins/premium-blocks-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'official-site',
				'pbfgb-site',
				'group-pbfgb-resources',
				'https://premiumblocks.io/'
			);

		}  // end if

}  // end function
