<?php

// includes/plugins/items-pods

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_pods', 15 );
/**
 * Items for plugin: Pods (free, by Pods Framework Team)
 *
 * @since 1.4.4
 *
 * @uses pods_api()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_pods( $admin_bar ) {

	$get_pods = pods_api()->load_pods( array( 'count' => true ) );

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-pods',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Pods', 'toolbar-extras' ),
			'href'   => empty( $get_pods ) ? esc_url( admin_url( 'admin.php?page=pods-add-new' ) ) : esc_url( admin_url( 'admin.php?page=pods' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Pods', 'toolbar-extras' ),
			)
		)
	);

		/** List all Pods */
		if ( ! empty( $get_pods ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-pods-all',
					'parent' => 'tbex-pods',
					'title'  => esc_attr__( 'All Pods', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=pods' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Pods', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Add new Pod */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-pods-new',
				'parent' => 'tbex-pods',
				'title'  => esc_attr__( 'New Pod', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pods-add-new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Add New Pod', 'toolbar-extras' ),
				)
			)
		);

		/** Components */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-pods-components',
				'parent' => 'tbex-pods',
				'title'  => esc_attr__( 'Manage Components', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pods-components' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Pods Components', 'toolbar-extras' ),
				)
			)
		);

			/** Component: Templates */
			if ( class_exists( 'Pods_Templates' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-templates',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Pods Templates', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_template' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Pods Templates', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-templates-all',
							'parent' => 'tbex-pods-components-templates',
							'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_template' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Pods Templates', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-templates-new',
							'parent' => 'tbex-pods-components-templates',
							'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post-new.php?post_type=_pods_template' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'New Pods Template', 'toolbar-extras' ),
							)
						)
					);

					/** Template categories, via BTC plugin */
					if ( ddw_tbex_is_btcplugin_active() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'tbex-pods-components-templates-categories',
								'parent' => 'tbex-pods-components-templates',
								'title'  => ddw_btc_string_template( 'template' ),
								'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=_pods_template' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
								)
							)
						);

					}  // end if

			}  // end if

			/** Component: Pages */
			if ( class_exists( 'Pods_Pages' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-pages',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Pages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_page' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Pods Pages', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-pages-all',
							'parent' => 'tbex-pods-components-pages',
							'title'  => esc_attr__( 'All Pages', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_page' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Pods Pages', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-pages-new',
							'parent' => 'tbex-pods-components-pages',
							'title'  => esc_attr__( 'New Page', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post-new.php?post_type=_pods_page' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'New Pods Page', 'toolbar-extras' ),
							)
						)
					);

			}  // end if

			/** Component: Helpers */
			if ( class_exists( 'Pods_Helpers' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-helpers',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Helpers', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_helper' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Pods Helpers', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-helpers-all',
							'parent' => 'tbex-pods-components-helpers',
							'title'  => esc_attr__( 'All Helpers', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=_pods_helper' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Pods Helpers', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-helpers-new',
							'parent' => 'tbex-pods-components-helpers',
							'title'  => esc_attr__( 'New Helper', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post-new.php?post_type=_pods_helper' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'New Pods Helper', 'toolbar-extras' ),
							)
						)
					);

			}  // end if

			/** Component: Roles & Capabilities */
			if ( class_exists( 'Pods_Roles' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-roles',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Roles &amp; Capabilities', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=pods-component-roles-and-capabilities' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Manage Roles &amp; Capabilities', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-roles-all',
							'parent' => 'tbex-pods-components-roles',
							'title'  => esc_attr__( 'All Roles', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=pods-component-roles-and-capabilities' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Roles &amp; Capabilities', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-pods-components-roles-new',
							'parent' => 'tbex-pods-components-roles',
							'title'  => esc_attr__( 'New Role', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=pods-component-roles-and-capabilities&action=add' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Add new Role with certain Capabilities', 'toolbar-extras' ),
							)
						)
					);

			}  // end if

			/** Component: Translations */
			if ( class_exists( 'Pods_Component_I18n' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-translations',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Translations', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=pods-component-translate-pods-admin' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Manage Languages &amp; Translations', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Component: Migrate Packages */
			if ( class_exists( 'Pods_Migrate_Packages' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-migrate-packages',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Migrate Packages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=pods-component-migrate-packages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Migrate Packages', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Component: Migrate CPT UI */
			if ( class_exists( 'Pods_Migrate_CPTUI' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-pods-components-migrate-cptui',
						'parent' => 'tbex-pods-components',
						'title'  => esc_attr__( 'Migrate CPT UI', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=pods-component-migrate-import-from-the-custom-post-type-ui-plugin' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Migrate CPT UI', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-pods-settings',
				'parent' => 'tbex-pods',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pods-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-pods-settings-tools',
					'parent' => 'tbex-pods-settings',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=pods-settings&tab=tools' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Pods Tools', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-pods-settings-cleanup-reset',
					'parent' => 'tbex-pods-settings',
					'title'  => esc_attr__( 'Cleanup &amp; Reset', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=pods-settings&tab=reset' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Pods Cleanup &amp; Reset', 'toolbar-extras' ),
					)
				)
			);

		/** Help */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-pods-help',
				'parent' => 'tbex-pods',
				'title'  => esc_attr__( 'Help', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=pods-help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-podsplugin-resources',
					'parent' => 'tbex-pods',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'podsplugin-docs',
				'group-podsplugin-resources',
				'https://pods.io/docs/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'podsplugin-support',
				'group-podsplugin-resources',
				'https://wordpress.org/support/plugin/pods'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'podsplugin-translate',
				'group-podsplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/pods'
			);

			ddw_tbex_resource_item(
				'github',
				'podsplugin-github',
				'group-podsplugin-resources',
				'https://github.com/pods-framework/pods'
			);

		}  // end if

}  // end function
