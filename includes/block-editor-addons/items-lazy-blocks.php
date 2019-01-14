<?php

// includes/block-editor-addons/items-lazy-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_lazy_blocks', 150 );
/**
 * Site items for Plugin: Lazy Blocks (free, by nK)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_lazy_blocks() {

	$post_type = 'lazyblocks';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'lazy-blocks',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Lazy Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Lazy Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'lazy-blocks-all',
				'parent' => 'lazy-blocks',
				'title'  => esc_attr__( 'All Lazy Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Lazy Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'lazy-blocks-new',
				'parent' => 'lazy-blocks',
				'title'  => esc_attr__( 'New Lazy Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Lazy Block', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'lazy-blocks-templates',
				'parent' => 'lazy-blocks',
				'title'  => esc_attr__( 'Block Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=lazyblocks_templates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Block Templates', 'toolbar-extras' )
				)
			)
		);

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'lazy-blocks-categories',
					'parent' => 'lazy-blocks',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'lazy-blocks-tools',
				'parent' => 'lazy-blocks',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=lazyblocks_tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-lazyblocks-resources',
					'parent' => 'lazy-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'lazyblocks-support',
				'group-lazyblocks-resources',
				'https://wordpress.org/support/plugin/lazy-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'lazyblocks-docs',
				'group-lazyblocks-resources',
				'https://lazyblocks.com/documentation/getting-started/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'lazyblocks-translate',
				'group-lazyblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/lazy-blocks'
			);

			ddw_tbex_resource_item(
				'github',
				'lazyblocks-github',
				'group-lazyblocks-resources',
				'https://github.com/nk-o/lazy-blocks'
			);

			ddw_tbex_resource_item(
				'official-site',
				'lazyblocks-site',
				'group-lazyblocks-resources',
				'https://lazyblocks.com/'
			);

		}  // end if

}  // end function
