<?php

// includes/block-editor-addons/items-placeholder-block

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_placeholder_block', 150 );
/**
 * Site items for Plugin: Placeholder Block (free, by Square Happiness)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_placeholder_block() {

	$post_type = 'placeholder';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'sqhplaceholder-block',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Placeholder Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Placeholder Blocks', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'sqhplaceholder-block-all',
				'parent' => 'sqhplaceholder-block',
				'title'  => esc_attr__( 'All Placeholder Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Placeholder Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'sqhplaceholder-block-new',
				'parent' => 'sqhplaceholder-block',
				'title'  => esc_attr__( 'New Placeholder Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Placeholder Block', 'toolbar-extras' )
				)
			)
		);

		/** Block categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'sqhplaceholder-block-categories',
					'parent' => 'sqhplaceholder-block',
					'title'  => ddw_btc_string_template( 'block' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'block' ) )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'sqhplaceholder-block-help',
				'parent' => 'sqhplaceholder-block',
				'title'  => esc_attr__( 'Plugin Help', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=placeholder&page=placeholder_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin Help', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-sqhplaceholder-resources',
					'parent' => 'sqhplaceholder-block',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'sqhplaceholder-support',
				'group-sqhplaceholder-resources',
				'https://wordpress.org/support/plugin/placeholder-block-square-happiness'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'sqhplaceholder-translate',
				'group-sqhplaceholder-resources',
				'https://translate.wordpress.org/projects/wp-plugins/placeholder-block-square-happiness'
			);

			ddw_tbex_resource_item(
				'github',
				'sqhplaceholder-github',
				'group-sqhplaceholder-resources',
				'http://squarehappiness.com/placeholder-block-plugin/'
			);

		}  // end if

}  // end function
