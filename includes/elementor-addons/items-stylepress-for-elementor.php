<?php

// includes/elementor-addons/items-stylepress-for-elementor


/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_stylepress_for_elementor', 100 );
/**
 * Items for Add-On: StylePress for Elementor (free, by David Baker (dtbaker))
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_stylepress_for_elementor( $admin_bar ) {

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-stylepressfe',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'StylePress', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=dtbaker-stylepress' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'StylePress for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-stylepressfe-all',
				'parent' => 'ao-stylepressfe',
				'title'  => esc_attr__( 'All Style Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dtbaker-stylepress' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Styles (Theme Templates)', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-stylepressfe-settings',
				'parent' => 'ao-stylepressfe',
				'title'  => esc_attr__( 'Style Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dtbaker-stylepress-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Style Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-stylepressfe-new',
				'parent' => 'ao-stylepressfe',
				'title'  => esc_attr__( 'New Style Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dtbaker-stylepress&style_id=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Style Template', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'dtbaker_style' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-stylepressfe-builder',
					'parent' => 'ao-stylepressfe',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'dtbaker_style' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-stylepressfe-categories',
					'parent' => 'ao-stylepressfe',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=dtbaker_style' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-stylepressfe-list-view',
				'parent' => 'ao-stylepressfe',
				'title'  => esc_attr__( 'Templates List View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=dtbaker_style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Templates Post Type List View', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-stylepressfe-resources',
					'parent' => 'ao-stylepressfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'stylepressfe-support',
				'group-stylepressfe-resources',
				'https://wordpress.org/support/plugin/full-site-builder-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'stylepressfe-translate',
				'group-stylepressfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/full-site-builder-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'stylepressfe-github',
				'group-stylepressfe-resources',
				'https://github.com/dtbaker/stylepress'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_stylepress_template' );
/**
 * Items for "New Content" section: New StylePress Template
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_stylepress_template( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'new-dtbaker_style',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'StylePress Template', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=dtbaker-stylepress&style_id=new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'StylePress Template', 'toolbar-extras' ),
			)
		)
	);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'dtbaker_style' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'stylepress-template-with-builder',
					'parent' => 'new-dtbaker_style',
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'dtbaker_style' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder(),
					)
				)
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_rehook_items_stylepress_helper', 5, 1 );
/**
 * Re-hook items from StylePress frontend helper.
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_use_tweak_stylepress_elementor()
 *
 * @param object $wp_admin_bar Object holding all Toolbar nodes.
 */
function ddw_tbex_rehook_items_stylepress_helper( $wp_admin_bar ) {
	
	/** Bail early if tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_stylepress_elementor() || is_admin() ) {
		return $wp_admin_bar;
	}

    $wp_admin_bar->add_node(
		array(
			'id'     => 'stylepress_nav',		// same as original!
			'parent' => 'ao-stylepressfe',
			'title'  => esc_attr__( 'StylePress Frontend Helper', 'toolbar-extras' ),
			'meta'   => array(
				'title' => esc_attr__( 'StylePress Frontend Helper', 'toolbar-extras' ),
			)
		)
	);

}  // end function
