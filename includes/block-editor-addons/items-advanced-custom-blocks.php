<?php

// includes/block-editor-addons/items-advanced-custom-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_advanced_custom_blocks', 150 );
/**
 * Site items for Plugin: Advanced Custom Blocks (free, by Rheinard Korf, Luke Carbis, Rob Stinson)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_advanced_custom_blocks() {

	$post_type = 'acb_block';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'advanced-custom-blocks',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Advanced Custom Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Advanced Custom Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-custom-blocks-all',
				'parent' => 'advanced-custom-blocks',
				'title'  => esc_attr__( 'All Custom Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Custom Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-custom-blocks-new',
				'parent' => 'advanced-custom-blocks',
				'title'  => esc_attr__( 'New Custom Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Custom Block', 'toolbar-extras' )
				)
			)
		);

		/** Block categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'advanced-custom-blocks-categories',
					'parent' => 'advanced-custom-blocks',
					'title'  => ddw_btc_string_template( 'block' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'block' ) )
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-acblocks-resources',
					'parent' => 'advanced-custom-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'acblocks-support',
				'group-acblocks-resources',
				'https://wordpress.org/support/plugin/advanced-custom-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'acblocks-docs',
				'group-acblocks-resources',
				'https://github.com/rheinardkorf/advanced-custom-blocks/tree/develop/docs'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'acblocks-translate',
				'group-acblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-custom-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'acblocks-github',
				'group-acblocks-resources',
				'https://github.com/rheinardkorf/advanced-custom-blocks'
			);

		}  // end if

}  // end function
