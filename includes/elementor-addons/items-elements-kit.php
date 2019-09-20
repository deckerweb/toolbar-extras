<?php

// includes/elementor-addons/items-elements-kit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementskit', 100 );
/**
 * Items for Add-On: Elements Kit Lite/Pro (free/Premium, by wpmet)
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementskit( $admin_bar ) {

	$type = 'elementskit_template';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-elementskit',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Elements Kit', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Elements Kit Templates, Widgets and Modules for Elementor', 'toolbar-extras' ),
			)
		)
	);

		/** Templates */
		$admin_bar->add_group(
			array(
				'id'     => 'group-elementskit-templates',
				'parent' => 'ao-elementskit',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementskit-templates-all',
					'parent' => 'group-elementskit-templates',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementskit-templates-types',
					'parent' => 'group-elementskit-templates',
					'title'  => esc_attr__( 'Template Types', 'toolbar-extras' ),
					'href'   => '',
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Elements Kit Template Types', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-templates-types-header',
						'parent' => 'ao-elementskit-templates-types',
						/* translators: Elements Kit Template type */
						'title'  => esc_attr_x( 'Headers', 'Elements Kit Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&elementskit_type_filter=header' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Headers', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-templates-types-footer',
						'parent' => 'ao-elementskit-templates-types',
						/* translators: Elements Kit Template type */
						'title'  => esc_attr_x( 'Footers', 'Elements Kit Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&elementskit_type_filter=footer' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Footers', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-templates-types-section',
						'parent' => 'ao-elementskit-templates-types',
						/* translators: Elements Kit Template type */
						'title'  => esc_attr_x( 'Sections', 'Elements Kit Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&elementskit_type_filter=section' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Section Blocks', 'toolbar-extras' ),
						)
					)
				);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementskit-templates-new',
					'parent' => 'group-elementskit-templates',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
					)
				)
			);

			/** Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-templates-categories',
						'parent' => 'group-elementskit-templates',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
						)
					)
				);

			}  // end if

		/** Settings */
		$admin_bar->add_group(
			array(
				'id'     => 'group-elementskit-settings',
				'parent' => 'ao-elementskit',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementskit-settings',
					'parent' => 'group-elementskit-settings',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=elementskit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Add-On Settings', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-settings-elements',
						'parent' => 'ao-elementskit-settings',
						'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=elementskit#v-elementskit-elements' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Activate Elements - Widgets for Elementor', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-settings-modules',
						'parent' => 'ao-elementskit-settings',
						'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=elementskit#v-elementskit-modules' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Activate Modules for Elementor', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementskit-settings-user-data',
						'parent' => 'ao-elementskit-settings',
						'title'  => esc_attr__( 'User Data', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=elementskit#v-elementskit-userdata' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'User Data - for Integrations', 'toolbar-extras' ),
						)
					)
				);

				if ( class_exists( '\ElementsKit\Libs\Framework\Classes\License' ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'ao-elementskit-settings-license',
							'parent' => 'ao-elementskit-settings',
							'title'  => esc_attr__( 'License', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=elementskit-license' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'License', 'toolbar-extras' ),
							)
						)
					);

				}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-elementskit-resources',
					'parent' => 'ao-elementskit',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'elementskit-support',
				'group-elementskit-resources',
				'https://wordpress.org/support/plugin/elementskit-lite'
			);

			ddw_tbex_resource_item(
				'documentation',
				'elementskit-docs',
				'group-elementskit-resources',
				'https://products.wpmet.com/elementskit/documentation/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'elementskit-support-contact',
				'group-elementskit-resources',
				'https://support.xpeedstudio.com/support-center/login'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'elementskit-translate',
				'group-elementskit-resources',
				'https://translate.wordpress.org/projects/wp-plugins/elementskit-lite'
			);

			ddw_tbex_resource_item(
				'official-site',
				'elementskit-site',
				'group-elementskit-resources',
				'https://products.wpmet.com/elementskit/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_aoitems_new_content_elementskit' );
/**
 * Items for "New Content" section: New Elements Kit Template
 *
 * @since 1.4.7
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_elementskit( $admin_bar ) {

	$type = 'elementskit_template';

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-elementskit-template',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Elements Kit Template', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'New Elements Kit Template', 'Toolbar New Content section', 'toolbar-extras' ),
			)
		)
	);

}  // end function
