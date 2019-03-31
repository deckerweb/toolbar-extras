<?php

// includes/block-editor-addons/items-wc-email-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_wc_email_blocks', 110 );
/**
 * Site items for Plugin: WooCommerce Custom Email Blocks (free, by VillaTheme)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_wc_email_blocks( $admin_bar ) {
	
	$type = 'wec_email_customizer';

	$admin_bar->add_node(
		array(
			'id'     => 'wc-email-blocks',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'WooCommerce Email Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'WooCommerce Custom Email Blocks', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wc-email-blocks-all',
				'parent' => 'wc-email-blocks',
				'title'  => esc_attr__( 'All Email Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Email Blocks', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wc-email-blocks-new',
				'parent' => 'wc-email-blocks',
				'title'  => esc_attr__( 'New Email Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Email Block', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wc-email-blocks-categories',
				'parent' => 'wc-email-blocks',
				'title'  => esc_attr__( 'Block Categories', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wec_email_template&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Block Categories', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wcemailblocks-resources',
					'parent' => 'wc-email-blocks',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wcemailblocks-support',
				'group-wcemailblocks-resources',
				'https://wordpress.org/support/plugin/woo-custom-email-blocks'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wcemailblocks-docs',
				'group-wcemailblocks-resources',
				'http://docs.villatheme.com/woocommerce-custom-email-blocks/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wcemailblocks-translate',
				'group-wcemailblocks-resources',
				'https://translate.wordpress.org/projects/wp-plugins/woo-custom-email-blocks'
			);

		}  // end if

}  // end function
