<?php

// includes/elementor-addons/items-toolkit-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_toolkit_for_elementor', 100 );
/**
 * Add-On Items from Plugin:
 *   ToolKit for Elementor (Premium, by ToolKit for Elementor)
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_string_free_addon_title_attr()
 * @uses ddw_tbex_is_elementor_pro_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_toolkit_for_elementor( $admin_bar ) {

	$type = 'toolkit_template';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-elementortoolkit',
			'parent' => 'group-creative-content',
			'title'  => sprintf(
				/* translators: %s - label, "Elementor" */
				esc_attr__( '%s Toolkit', 'toolbar-extras' ),
				ddw_tbex_string_elementor()
			),
			'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'ToolKit for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		if ( ! ddw_tbex_is_elementor_pro_active() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-elementortoolkit-templates',
					'parent' => 'ao-elementortoolkit',
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementortoolkit-templates-all',
					'parent' => 'group-elementortoolkit-templates',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Templates via ToolKit for Elementor', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-elementortoolkit-templates-new',
					'parent' => 'group-elementortoolkit-templates',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template via ToolKit for Elementor', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementortoolkit-templates-builder',
						'parent' => 'group-elementortoolkit-templates',
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			/** Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementortoolkit-templates-categories',
						'parent' => 'group-elementortoolkit-templates',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) )
						)
					)
				);

			}  // end if

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementortoolkit-booster',
				'parent' => 'ao-elementortoolkit',
				'title'  => esc_attr__( 'Booster', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool#toolkit_performance_tool' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Booster - Various Optimizations', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementortoolkit-syncer',
				'parent' => 'ao-elementortoolkit',
				'title'  => esc_attr__( 'Syncer', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool#toolkit_my_templates_syncer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sync Elementor Templates between Sites', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementortoolkit-themeless',
				'parent' => 'ao-elementortoolkit',
				'title'  => esc_attr__( 'Themeless', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool#toolkit_theme_less' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Themeless - use only Elementor Templates, no Theme', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementortoolkit-toolbox',
				'parent' => 'ao-elementortoolkit',
				'title'  => esc_attr__( 'Toolbox', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool#toolkit_theme_toolkit' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Toolbox - Custom Code', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementortoolkit-license',
				'parent' => 'ao-elementortoolkit',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=toolkit-performance-tool#toolkit_my_license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-elementortoolkit-resources',
				'parent' => 'ao-elementortoolkit',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-contact',
			'elementortoolkit-support',
			'group-elementortoolkit-resources',
			'https://toolkitforelementor.com/support/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'elementortoolkit-fbgroup',
			'group-elementortoolkit-resources',
			'https://www.facebook.com/groups/toolkitforelementor/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'elementortoolkit-site',
			'group-elementortoolkit-resources',
			'https://toolkitforelementor.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_toolkit_templates', 50 );
/**
 * Items for "New Content" section: New ToolKit for Elementor Template
 *
 * @since 1.4.5
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_is_elementor_pro_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_toolkit_templates( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() || ddw_tbex_is_elementor_pro_active() ) {
		return $admin_bar;
	}

	$type = 'toolkit_template';

	$admin_bar->add_node(
		array(
			'id'     => 'new-' . $type,
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'ToolKit Template', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Add new ToolKit for Elementor Template', 'Toolbar New Content section', 'toolbar-extras' )
			)
		)
	);

	if ( \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'toolkit-template-with-builder',
				'parent' => 'new-' . $type,
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
