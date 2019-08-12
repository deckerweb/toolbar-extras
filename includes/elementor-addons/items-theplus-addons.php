<?php

// includes/elementor-addons/items-theplus-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if The Plus Addons Pro version plugin is active or not.
 *
 * @since 1.4.3
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_theplus_pro_active() {

	return defined( 'THEPLUS_TYPE' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_theplus_addons', 100 );
/**
 * Add-On Items from Plugin:
 *   The Plus Addons for Elementor Lite (free, by POSIMYTH Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_theplus_addons( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$admin_bar->add_node(
		array(
			'id'     => 'theplusaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'The Plus Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=theplus_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'The Plus Addons', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'theplusaddons-general',
				'parent' => 'theplusaddons',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=theplus_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'theplusaddons-posttypes',
				'parent' => 'theplusaddons',
				'title'  => esc_attr__( 'Post Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=post_type_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Types Settings', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_theplus_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'theplusaddons-plus-design',
					'parent' => 'theplusaddons',
					'title'  => esc_attr__( 'Plus Design', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=theplus_import_data' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Plus Design', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'theplusaddons-extra-options',
					'parent' => 'theplusaddons',
					'title'  => esc_attr__( 'Extra Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=theplus_api_connection_data' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Extra Options', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'theplusaddons-performance',
				'parent' => 'theplusaddons',
				'title'  => esc_attr__( 'Performance', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=theplus_performance' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Performance Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'theplusaddons-custom',
				'parent' => 'theplusaddons',
				'title'  => esc_attr__( 'Custom CSS &amp; JS', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=theplus_styling_data' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom CSS &amp; JS', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_theplus_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'theplusaddons-license',
					'parent' => 'theplusaddons',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=theplus_purchase_code' ) ),
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
				'id'     => 'group-theplusaddons-resources',
				'parent' => 'theplusaddons',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'analogwp-support',
			'group-theplusaddons-resources',
			'https://wordpress.org/support/plugin/the-plus-addons-for-elementor-page-builder/'
		);

		ddw_tbex_resource_item(
			'documentation',
			'theplusaddons-docs',
			'group-theplusaddons-resources',
			'https://elementor.theplusaddons.com/documentation/'
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'theplusaddons-youtube-channel',
			'group-theplusaddons-resources',
			'https://www.youtube.com/playlist?list=PLFRO-irWzXaLK9H5opSt88xueTnRhqvO5'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'theplusaddons-fbgroup',
			'group-theplusaddons-resources',
			'https://www.facebook.com/groups/theplus4elementor/'
		);

		ddw_tbex_resource_item(
			'changelog',
			'theplusaddons-changelog',
			'group-theplusaddons-resources',
			'https://elementor.theplusaddons.com/changelog/',
			ddw_tbex_string_version_history( 'addon' )
		);

		ddw_tbex_resource_item(
			'translations-community',
			'theplusaddons-translate',
			'group-theplusaddons-resources',
			'https://translate.wordpress.org/projects/wp-plugins/the-plus-addons-for-elementor-page-builder/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'theplusaddons-site',
			'group-theplusaddons-resources',
			'https://elementor.theplusaddons.com/'
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_theplus_addons', 100 );
/**
 * Site items from Plugin:
 *   The Plus Addons for Elementor Lite (free, by POSIMYTH Themes)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_theplus_addons( $admin_bar ) {

	$cpt_option = get_option( 'post_type_options' );

	/** For: Manage Content */
	if ( 'plugin' === $cpt_option[ 'client_post_type' ] ) {

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-tpclients',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Clients', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=theplus_clients' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Clients', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( 'plugin' === $cpt_option[ 'testimonial_post_type' ] ) {

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-tptestimonials',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=theplus_testimonial' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( 'plugin' === $cpt_option[ 'team_member_post_type' ] ) {

		$admin_bar->add_node(
			array(
				'id'     => 'manage-content-tpteam',
				'parent' => 'manage-content',
				'title'  => esc_attr__( 'Edit Team Members', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=theplus_team_member' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Team Members', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_theplus_addons_cpt' );
/**
 * Items for "New Content" section: New ThePlus Addons post type items
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_theplus_addons_cpt( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$cpt_option = get_option( 'post_type_options' );

	if ( 'plugin' === $cpt_option[ 'client_post_type' ] && \Elementor\User::is_current_user_can_edit_post_type( 'theplus_clients' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tpclient-with-builder',
				'parent' => 'new-theplus_clients',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'theplus_clients' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	if ( 'plugin' === $cpt_option[ 'testimonial_post_type' ] && \Elementor\User::is_current_user_can_edit_post_type( 'theplus_testimonial' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tptestimonial-with-builder',
				'parent' => 'new-theplus_testimonial',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'theplus_testimonial' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	if ( 'plugin' === $cpt_option[ 'team_member_post_type' ] && \Elementor\User::is_current_user_can_edit_post_type( 'theplus_team_member' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'tpteam-member-with-builder',
				'parent' => 'new-theplus_team_member',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'theplus_team_member' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
