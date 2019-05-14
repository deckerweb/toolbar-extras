<?php

// includes/plugins/items-hesham-schema

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_hesham_schema' );
/**
 * Items for Plugin: Schema (free, by Hesham)
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_hesham_schema() {

	/** For: Elements */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'heshamschema',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Schema', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=schema' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Schema', 'toolbar-extras' )
			)
		)
	);

		/**
		 * Add each individual Schema type as an item.
		 *   Schemas are saved as a post type therefore a query necessary.
		 * @since 1.3.2
		 */
		$args = array(
			'post_type'      => 'schema',
			'posts_per_page' => -1,
		);

		$schemas = get_posts( $args );

		/** Proceed only if there are any Schemas */
		if ( $schemas ) {
			
			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-heshamschema-edit-schema',
					'parent' => 'heshamschema'
				)
			);

			foreach ( $schemas as $schema ) {

				$schema_id    = absint( $schema->ID );
				$schema_title = esc_attr( $schema->post_title );

				/** Add item per form */
				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'heshamschema-edit-schema-' . $schema_id,
						'parent' => 'group-heshamschema-edit-schema',
						'title'  => $schema_title,
						'href'   => esc_url( admin_url( 'post.php?post=' . $schema_id . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Schema', 'toolbar-extras' ) . ': ' . $schema_title
						)
					)
				);

			}  // end foreach

		}  // end if

		/** Group: Schemas (post type) */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-heshamschema-schemas',
				'parent' => 'heshamschema'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-schemas-all',
				'parent' => 'group-heshamschema-schemas',
				'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Schemas', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-schemas-new',
				'parent' => 'group-heshamschema-schemas',
				'title'  => esc_attr__( 'New Schema', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Schema', 'toolbar-extras' )
				)
			)
		);

		/** Group: Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-heshamschema-settings',
				'parent' => 'heshamschema'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-settings-general',
				'parent' => 'group-heshamschema-settings',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=schema' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-knowledge-graph',
				'parent' => 'group-heshamschema-settings',
				'title'  => esc_attr__( 'Knowledge Graph', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=schema&tab=knowledge_graph' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Knowledge Graph', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-schemas',
				'parent' => 'group-heshamschema-settings',
				'title'  => esc_attr__( 'Schemas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=schema&tab=schemas' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Schemas', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-settings-advanced',
				'parent' => 'group-heshamschema-settings',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=schema&tab=advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Setup (Wizard) */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-heshamschema-setup',
				'parent' => 'heshamschema'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-setup-wizard',
				'parent' => 'group-heshamschema-setup',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=schema-setup' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'heshamschema-getting-started',
				'parent' => 'group-heshamschema-setup',
				'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=schema-wp-getting-started' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Getting Started', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Schema */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-heshamschema-resources',
					'parent' => 'heshamschema',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'heshamschema-support',
				'group-heshamschema-resources',
				'https://wordpress.org/support/plugin/schema'
			);

			ddw_tbex_resource_item(
				'documentation',
				'heshamschema-docs',
				'group-heshamschema-resources',
				'https://schema.press/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'heshamschema-translate',
				'group-heshamschema-resources',
				'https://translate.wordpress.org/projects/wp-plugins/schema'
			);

			ddw_tbex_resource_item(
				'github',
				'heshamschema-github',
				'group-heshamschema-resources',
				'https://github.com/schemapress/Schema'
			);

			ddw_tbex_resource_item(
				'official-site',
				'heshamschema-site',
				'group-heshamschema-resources',
				'https://schema.press/'
			);

		}  // end if

}  // end function
