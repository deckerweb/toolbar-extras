<?php

// includes/block-editor-addons/items-block-layouts

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_layouts', 150 );
/**
 * Site items for Plugin: Block Layouts (free, by Jordy Meow)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_block_layouts() {

	$post_type = 'blocks_layout';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-blocks-layouts',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Block Layouts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Block Layouts', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-blocks-layouts-all',
				'parent' => 'tbex-blocks-layouts',
				'title'  => esc_attr__( 'All Block Layouts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Block Layouts', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-blocks-layouts-new',
				'parent' => 'tbex-blocks-layouts',
				'title'  => esc_attr__( 'New Block Layout', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Block Layout', 'toolbar-extras' )
				)
			)
		);

		/** Layout categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-blocks-layouts-categories',
					'parent' => 'tbex-blocks-layouts',
					'title'  => ddw_btc_string_template( 'layout' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'layout' ) )
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-blockslayouts-resources',
					'parent' => 'tbex-blocks-layouts',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blockslayouts-support',
				'group-blockslayouts-resources',
				'https://wordpress.org/support/plugin/blocks-layouts'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blockslayouts-translate',
				'group-blockslayouts-resources',
				'https://translate.wordpress.org/projects/wp-plugins/blocks-layouts'
			);

		}  // end if

}  // end function
