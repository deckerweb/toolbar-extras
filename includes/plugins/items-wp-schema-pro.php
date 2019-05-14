<?php

// includes/plugins/items-wp-schema-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wp_schema_pro' );
/**
 * Items for Plugin: Schema Pro (Premium, by Brainstorm Force)
 *
 * @since 1.3.2
 * @since 1.4.3 Added breadcrumb item.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wp_schema_pro( $admin_bar ) {

	/** For: Elements */
	$admin_bar->add_node(
		array(
			'id'     => 'wpschemapro',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Schema Pro', 'toolbar-extras' ),
			'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'aiosrs-schema' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Schema Pro', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual Schema type as an item.
		 *   Schemas are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 */
		$args = array(
			'post_type'      => 'aiosrs-schema',
			'posts_per_page' => -1,
		);

		$schemas = get_posts( $args );

		/** Proceed only if there are any Schemas */
		if ( $schemas ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-wpschemapro-edit-schema',
					'parent' => 'wpschemapro',
				)
			);

			foreach ( $schemas as $schema ) {

				$schema_id    = absint( $schema->ID );
				$schema_title = esc_attr( $schema->post_title );

				/** Add item per form */
				$admin_bar->add_node(
					array(
						'id'     => 'wpschemapro-edit-schema-' . $schema_id,
						'parent' => 'group-wpschemapro-edit-schema',
						'title'  => $schema_title,
						'href'   => esc_url( admin_url( 'post.php?post=' . $schema_id . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Schema', 'toolbar-extras' ) . ': ' . $schema_title,
						)
					)
				);

			}  // end foreach

		}  // end if

		/** Group: Schemas (post type) */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpschemapro-schemas',
				'parent' => 'wpschemapro',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-schemas-all',
				'parent' => 'group-wpschemapro-schemas',
				'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' ),
				'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'aiosrs-schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-schemas-new',
				'parent' => 'group-wpschemapro-schemas',
				'title'  => esc_attr__( 'New Schema', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=aiosrs-schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Schema', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Settings */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpschemapro-settings',
				'parent' => 'wpschemapro',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-settings-general',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-social-profiles',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Social Profiles', 'toolbar-extras' ),
				'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'settings&section=social-profiles' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Social Profiles', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-other-schemas',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Other Schemas', 'toolbar-extras' ),
				'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'settings&section=global-schemas' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Other Schemas', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-settings-advanced',
				'parent' => 'group-wpschemapro-settings',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'settings&section=advanced-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				)
			)
		);

		$schema_breadcrumb = get_option( 'wp-schema-pro-global-schemas' );

		if ( '1' === $schema_breadcrumb[ 'breadcrumb' ] ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpschemapro-settings-breadcrumb',
					'parent' => 'group-wpschemapro-settings',
					'title'  => esc_attr__( 'Breadcrumb Settings', 'toolbar-extras' ),
					'href'   => esc_url( BSF_AIOSRS_Pro_Admin::get_page_url( 'breadcrumb-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Breadcrumb Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Setup Wizard */
		$admin_bar->add_node(
			array(
				'id'     => 'wpschemapro-setup-wizard',
				'parent' => 'wpschemapro',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=aiosrs-pro-setup-wizard' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for Schema Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpschemapro-resources',
					'parent' => 'wpschemapro',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'wpschemapro-support',
				'group-wpschemapro-resources',
				'https://wpschema.com/support/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'wpschemapro-docs',
				'group-wpschemapro-resources',
				'https://wpschema.com/docs/'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'wpschemapro-schema-types',
				'group-wpschemapro-resources',
				'https://wpschema.com/schema-types/',
				esc_attr__( 'Supported Schema Types', 'toolbar-extras' )
			);

			ddw_tbex_resource_item(
				'translations-pro',
				'wpschemapro-translate',
				'group-wpschemapro-resources',
				'https://translate.brainstormforce.com/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpschemapro-site',
				'group-wpschemapro-resources',
				'https://wpschema.com/'
			);

		}  // end if

}  // end function
