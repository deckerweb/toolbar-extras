<?php

// includes/plugins/items-cartflows

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_cartflows', 100 );
/**
 * Add-On items for Plugin: CartFlows (free, by CartFlows Inc)
 *
 * @since 1.4.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_cartflows( $admin_bar ) {

	$type = 'cartflows_flow';

	$cf_option = get_option( '_cartflows_common' );

	$admin_bar->add_node(
		array(
			'id'     => 'ao-cartflows',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'CartFlows', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'CartFlows', 'toolbar-extras' )
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-cartflows-all',
				'parent' => 'ao-cartflows',
				'title'  => esc_attr__( 'All Flows', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Flows', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-cartflows-new',
				'parent' => 'ao-cartflows',
				'title'  => esc_attr__( 'New Flow', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Flow', 'toolbar-extras' )
				)
			)
		);

		/** Flow categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-categories',
					'parent' => 'ao-cartflows',
					'title'  => ddw_btc_string_template( 'flow' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'flow' ) ),
					)
				)
			);

		}  // end if

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-cartflows-settings',
				'parent' => 'ao-cartflows',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=cartflows_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-settings-general',
					'parent' => 'ao-cartflows-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=cartflows_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			/** Global checkout page, if set */
			if ( isset( $cf_option[ 'global_checkout' ] ) ) {

				$checkout_page_id = absint( $cf_option[ 'global_checkout' ] );

				$admin_bar->add_node(
					array(
						'id'     => 'ao-cartflows-settings-checkout',
						'parent' => 'ao-cartflows-settings',
						'title'  => esc_attr__( 'Global Checkout', 'toolbar-extras' ),
						'href'   => esc_url( get_edit_post_link( $checkout_page_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Global Checkout', 'toolbar-extras' )
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'ao-cartflows-settings-checkout-edit',
							'parent' => 'ao-cartflows-settings-checkout',
							'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' ),
							'href'   => esc_url( get_edit_post_link( $checkout_page_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Page', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'ao-cartflows-settings-checkout-preview',
							'parent' => 'ao-cartflows-settings-checkout',
							'title'  => esc_attr__( 'Preview Page', 'toolbar-extras' ),
							'href'   => esc_url( get_permalink( $checkout_page_id ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Preview Page', 'toolbar-extras' )
							)
						)
					);

			}  // end if

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-settings-import',
					'parent' => 'ao-cartflows-settings',
					'title'  => esc_attr__( 'Import Flows', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=flow_importer' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import Flows', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-settings-export',
					'parent' => 'ao-cartflows-settings',
					'title'  => esc_attr__( 'Export Flows', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=flow_exporter' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export Flows', 'toolbar-extras' )
					)
				)
			);

		/** Setup Wizard */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-cartflows-wizard',
				'parent' => 'ao-cartflows',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-wizard-basic',
					'parent' => 'ao-cartflows-wizard',
					'title'  => esc_attr__( 'Step 1: Basic', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup&step=basic-config' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 1: Basic', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-wizard-page-builder',
					'parent' => 'ao-cartflows-wizard',
					'title'  => esc_attr__( 'Step 2: Page Builder', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup&step=basic-config' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 2: Page Builder', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-wizard-checkout',
					'parent' => 'ao-cartflows-wizard',
					'title'  => esc_attr__( 'Step 3: Checkout', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup&step=checkout' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 3: Checkout', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-wizard-training',
					'parent' => 'ao-cartflows-wizard',
					'title'  => esc_attr__( 'Step 4: Training', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup&step=training' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 4: Training', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-cartflows-wizard-ready',
					'parent' => 'ao-cartflows-wizard',
					'title'  => esc_attr__( 'Step 5: Ready', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=cartflow-setup&step=setup-ready' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Step 5: Ready', 'toolbar-extras' )
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-cartflows-resources',
					'parent' => 'ao-cartflows',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'cartflows-support',
				'group-cartflows-resources',
				'https://wordpress.org/support/plugin/cartflows'
			);

			ddw_tbex_resource_item(
				'documentation',
				'cartflows-docs',
				'group-cartflows-resources',
				'https://cartflows.com/docs/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'cartflows-fbgroup',
				'group-cartflows-resources',
				'https://www.facebook.com/groups/cartflows/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'cartflows-changelog',
				'group-cartflows-resources',
				'https://cartflows.com/product/cartflows/',
				ddw_tbex_string_version_history( 'plugin' )
			);
			
			ddw_tbex_resource_item(
				'translations-community',
				'cartflows-translate',
				'group-cartflows-resources',
				'https://translate.wordpress.org/projects/wp-plugins/cartflows'
			);

			ddw_tbex_resource_item(
				'official-site',
				'cartflows-site',
				'group-cartflows-resources',
				'https://cartflows.com/'
			);

		}  // end if

}  // end function
