<?php

// includes/block-editor-addons/items-block-templates

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_block_templates', 150 );
/**
 * Site items for Plugin: Gutenberg Templates (Block Templates) (free, by Konstantinos Galanakis)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_block_templates() {

	$post_type = 'gutenberg-template';

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'blocktemplates',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Block Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Block Templates', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'blocktemplates-all',
				'parent' => 'blocktemplates',
				'title'  => esc_attr__( 'All Block Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Block Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'blocktemplates-new',
				'parent' => 'blocktemplates',
				'title'  => esc_attr__( 'New Block Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Block Template', 'toolbar-extras' )
				)
			)
		);

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'blocktemplates-categories',
					'parent' => 'blocktemplates',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $post_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) )
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-blocktemplates-resources',
					'parent' => 'blocktemplates',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'blocktemplates-support',
				'group-blocktemplates-resources',
				'https://wordpress.org/support/plugin/block-templates'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'blocktemplates-translate',
				'group-blocktemplates-resources',
				'https://translate.wordpress.org/projects/wp-plugins/block-templates'
			);

		}  // end if

}  // end function
