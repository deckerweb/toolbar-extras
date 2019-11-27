<?php

// includes/plugins-genesis/items-agentpress-listings

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_agentpress_listings', 115 );
/**
 * Items for Add-On: AgentPress Listings (free, by StudioPress)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_agentpress_listings( $admin_bar ) {

	$type = 'listing';

	/** For: Manage Content in Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-agentpress-listings',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Listings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Listings', 'toolbar-extras' ),
			)
		)
	);

	/** For: Creative Content (Build Group) */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-agentpress-listings',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'AgentPress Listings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'AgentPress Listings', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-agentpress-listings-all',
				'parent' => 'ao-agentpress-listings',
				'title'  => esc_attr__( 'All Listings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Listings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-agentpress-listings-new',
				'parent' => 'ao-agentpress-listings',
				'title'  => esc_attr__( 'New Listing', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Listing', 'toolbar-extras' ),
				)
			)
		);

		/** Optional: Elementor support */
		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-agentpress-listings-builder',
					'parent' => 'ao-agentpress-listings',
					'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' ),
					)
				)
			);

			/** For: WordPress "New Content" section within the Toolbar */
			$admin_bar->add_node(
				array(
					'id'     => 'agentpress-listing-with-builder',
					'parent' => 'new-' . $type,
					'title'  => ddw_tbex_string_newcontent_with_builder(),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_newcontent_create_with_builder(),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-agentpress-listings-tax-features',
				'parent' => 'ao-agentpress-listings',
				'title'  => esc_attr__( 'Features', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=features&post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Taxonomy', 'toolbar-extras' ) . ': ' . esc_attr__( 'Features', 'toolbar-extras' ),
				)
			)
		);

		/** Optional: Genesis Archive Settings */
		if ( post_type_supports( $type, 'genesis-cpt-archives-settings' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-agentpress-listings-archive',
					'parent' => 'ao-agentpress-listings',
					'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=genesis-cpt-archive-' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-agentpress-listings-register-tax',
				'parent' => 'ao-agentpress-listings',
				'title'  => esc_attr__( 'Register Taxonomy', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=register-taxonomies' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Register Taxonomy', 'toolbar-extras' ),
				)
			)
		);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$admin_bar->add_group(
			array(
				'id'     => 'group-aplistings-resources',
				'parent' => 'ao-agentpress-listings',
				'meta'   => array( 'class' => 'ab-sub-secondary' ),
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'aplistings-support',
			'group-aplistings-resources',
			'https://wordpress.org/support/plugin/agentpress-listings'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'aplistings-translate',
			'group-aplistings-resources',
			'https://translate.wordpress.org/projects/wp-plugins/agentpress-listings'
		);

		ddw_tbex_resource_item(
			'github',
			'aplistings-github',
			'group-aplistings-resources',
			'https://github.com/studiopress/agentpress-listings'
		);

	}  // end if

}  // end function
