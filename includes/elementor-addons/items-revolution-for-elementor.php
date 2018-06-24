<?php

// includes/elementor-addons/items-revolution-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_revolution_for_elementor', 100 );
/**
 * Items for Add-On: Revolution for Elementor (free/Premium, by Jan Thielemann)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_revolution_for_elementor() {

	/** Check for premium version */
	$is_premium = is_plugin_active( 'revolution-for-elementor-premium/revolution-for-elementor.php' ) ? TRUE : FALSE;

	$rfe_adv_options = get_option( 'jt_revolution_for_elementor_advanced' );


	/**
	 * 1) Creative items:
	 */
	if ( 'yes' === $rfe_adv_options[ 'enable_taxonomy_related' ] ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-rfe-taxrelated',
				'parent' => 'group-creative-content',
				'title'  => esc_attr__( 'Tax Related Content', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=rfe_taxonomy_related' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Revolution for Elementor: Taxonomy Related Content', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-rfe-taxrelated-all',
					'parent' => 'ao-rfe-taxrelated',
					'title'  => esc_attr__( 'All Tax Related Content', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=rfe_taxonomy_related' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Taxonomy Related Content', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-rfe-taxrelated-new',
					'parent' => 'ao-rfe-taxrelated',
					'title'  => esc_attr__( 'New Tax Related Content', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=rfe_taxonomy_related' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Tax Related Content', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'rfe_taxonomy_related' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-rfe-taxrelated-builder',
						'parent' => 'ao-rfe-taxrelated',
						'title'  => esc_attr__( 'New Tax Related Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'rfe_taxonomy_related' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Tax Related Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if
				
	}  // end if


	/**
	 * 2) Add-On items:
	 */

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-rfe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Revolution for Elementor', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=revolution-for-elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Revolution for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		/** Optional Tax Related Content settung/post type */
		if ( 'yes' === $rfe_adv_options[ 'enable_taxonomy_related' ] ) {

			/** Items for Post Type "Taxonomy Related" */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-rfep-tax-related',
					'parent' => 'ao-rfe'
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-rfep-taxrel-all',
						'parent' => 'group-rfep-tax-related',
						'title'  => esc_attr__( 'All Tax Related Content', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=rfe_taxonomy_related' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Taxonomy Related Content', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-rfep-taxrel-new',
						'parent' => 'group-rfep-tax-related',
						'title'  => esc_attr__( 'New Tax Related Content', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=rfe_taxonomy_related' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Tax Related Content', 'toolbar-extras' )
						)
					)
				);

				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'rfe_taxonomy_related' ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'ao-rfep-taxrel-builder',
							'parent' => 'group-rfep-tax-related',
							'title'  => esc_attr__( 'New Tax Related Builder', 'toolbar-extras' ),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'rfe_taxonomy_related' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'New Tax Related Builder', 'toolbar-extras' )
							)
						)
					);

				}  // end if

		}  // end if Tax Related

		/** Plugin's settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-rfe-widgets',
				'parent' => 'ao-rfe',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=revolution-for-elementor#jt_revolution_for_elementor_widgets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-rfe-extensions',
				'parent' => 'ao-rfe',
				'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=revolution-for-elementor#jt_revolution_for_elementor_extensions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' )
				)
			)
		);

		/** Show only when Premium version is active */
		if ( $is_premium ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-rfe-advanced',
					'parent' => 'ao-rfe',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=revolution-for-elementor#jt_revolution_for_elementor_advanced' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-rfe-account',
					'parent' => 'ao-rfe',
					'title'  => esc_attr__( 'My Account', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=revolution-for-elementor-account' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'My Account', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-rfe-resources',
					'parent' => 'ao-rfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( ! $is_premium ) {

				ddw_tbex_resource_item(
					'support-forum',
					'rfe-support',
					'group-rfe-resources',
					'https://wordpress.org/support/plugin/revolution-for-elementor'
				);

			}  // end if

			ddw_tbex_resource_item(
				'support-contact',
				'rfe-contact',
				'group-rfe-resources',
				esc_url( admin_url( 'admin.php?page=revolution-for-elementor-contact' ) )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'rfe-translate',
				'group-rfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/revolution-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'rfe-site',
				'group-rfe-resources',
				'http://revolution-for-elementor.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_rfe_premium_new_content', 140 );
/**
 * Add "Taxonomy Related" post type with Page Builder to the "New Content" group.
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_display_items_new_content()
 * @uses   ddw_tbex_string_newcontent_with_builder()
 * @uses   ddw_tbex_string_newcontent_create_with_builder()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_rfe_premium_new_content() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( \Elementor\User::is_current_user_can_edit_post_type( 'rfe_taxonomy_related' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'rfep-tax-related-with-builder',
				'parent' => 'new-rfe_taxonomy_related',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'rfe_taxonomy_related' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function