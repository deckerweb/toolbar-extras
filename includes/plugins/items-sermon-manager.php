<?php

// includes/plugins/items-sermon-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Sermon Manager Import plugin is active or not.
 *
 * @since 1.4.9
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_sermonmanager_mp3import_active() {

	return class_exists( 'SermonManagerImport' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_sermon_manager_wpfc', 115 );
/**
 * Items for plugin: Sermon Manager for WordPress (free, by WP for Church)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_is_sermonmanager_mp3import_active()
 * @uses ddw_tbex_media_items_mime_type()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_sermon_manager_wpfc( $admin_bar ) {

	$type = 'wpfc_sermon';

	/** For: Manage Content in Site Group */
	$admin_bar->add_node(
		array(
			'id'     => 'manage-content-wpcfsermons',
			'parent' => 'manage-content',
			'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'wpcfsermons',
			'parent' => 'tbex-sitegroup-manage-content',
			'title'  => esc_attr__( 'Sermon Manager', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Sermon Manager (by WP for Church)', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpcfsermons-all',
				'parent' => 'wpcfsermons',
				'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpcfsermons-new',
				'parent' => 'wpcfsermons',
				'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
				)
			)
		);

		/** Optional: Elementor support */
		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-builder',
					'parent' => 'wpcfsermons',
					'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
					)
				)
			);

			/** For: WordPress "New Content" section within the Toolbar */
			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermon-with-builder',
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

		/** Taxonomies: */
		$admin_bar->add_node(
			array(
				'id'     => 'wpcfsermons-taxonomies',
				'parent' => 'wpcfsermons',
				'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				'href'   => FALSE,
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
				)
			)
		);

			$speaker_label = get_option( 'sermonmanager_preacher_label' );
			$speaker_label = ( ! empty( $speaker_label ) ) ? $speaker_label : __( 'Preacher', 'toolbar-extras' );

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-taxonomies-speakers',
					'parent' => 'wpcfsermons-taxonomies',
					'title'  => esc_attr( $speaker_label ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wpfc_preacher&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr( $speaker_label ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-taxonomies-series',
					'parent' => 'wpcfsermons-taxonomies',
					'title'  => esc_attr__( 'Series', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wpfc_sermon_series&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Series', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-taxonomies-topics',
					'parent' => 'wpcfsermons-taxonomies',
					'title'  => esc_attr__( 'Topics', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wpfc_sermon_topic&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Topics', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-taxonomies-books',
					'parent' => 'wpcfsermons-taxonomies',
					'title'  => esc_attr__( 'Books', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wpfc_bible_book&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Books', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-taxonomies-types',
					'parent' => 'wpcfsermons-taxonomies',
					'title'  => esc_attr__( 'Service Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=wpfc_service_type&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Service Types', 'toolbar-extras' ),
					)
				)
			);

		/** Optional: Genesis Archive Settings */
		if ( post_type_supports( $type, 'genesis-cpt-archives-settings' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-archive',
					'parent' => 'wpcfsermons',
					'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=genesis-cpt-archive-' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Archive Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'wpcfsermons-settings',
				'parent' => 'wpcfsermons',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-settings-general',
					'parent' => 'wpcfsermons-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-settings-display',
					'parent' => 'wpcfsermons-settings',
					'title'  => esc_attr__( 'Display', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings&tab=display' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Display', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-settings-podcast',
					'parent' => 'wpcfsermons-settings',
					'title'  => esc_attr__( 'Podcast', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings&tab=podcast' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Podcast', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-settings-verse',
					'parent' => 'wpcfsermons-settings',
					'title'  => esc_attr__( 'Verse', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings&tab=verse' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Verse', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpcfsermons-settings-advanced',
					'parent' => 'wpcfsermons-settings',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-settings&tab=debug' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
					)
				)
			);

		/** Import/Export */
		$admin_bar->add_node(
			array(
				'id'     => 'wpcfsermons-import-export',
				'parent' => 'wpcfsermons',
				'title'  => esc_attr__( 'Import/Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-import-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import/Export', 'toolbar-extras' ),
				)
			)
		);

			if ( ddw_tbex_is_sermonmanager_mp3import_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'wpcfsermons-import-export-ie',
						'parent' => 'wpcfsermons-import-export',
						'title'  => esc_attr__( 'Import/Export Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sm-import-export' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Import/Export Plugin Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'wpcfsermons-import-mp3',
						'parent' => 'wpcfsermons-import-export',
						'title'  => esc_attr__( 'MP3 Import', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sermon-manager-import' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Import MP3 Files', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'wpcfsermons-import-mp3-mapping',
						'parent' => 'wpcfsermons-import-export',
						'title'  => esc_attr__( 'MP3 Import - Mapping', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sermon-manager-import-options' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Import MP3 Files', 'toolbar-extras' ) . ': ' . esc_attr( 'Field Mapping', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		/** Additional media items: Audio & PDF Files listings (Media Library) */
		ddw_tbex_media_items_mime_type( 'audio', $admin_bar, 'wpcfsermons', 'wpcfsermons' );
		ddw_tbex_media_items_mime_type( 'pdf', $admin_bar, 'wpcfsermons', 'wpcfsermons' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpcfsermons-resources',
					'parent' => 'wpcfsermons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'wpcfsermons-support',
				'group-wpcfsermons-resources',
				'https://wordpress.org/support/plugin/sermon-manager-for-wordpress'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'wpcfsermons-kb-docs',
				'group-wpcfsermons-resources',
				'https://www.wpforchurch.com/my/knowledgebase/12/Sermon-Manager'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpcfsermons-translate',
				'group-wpcfsermons-resources',
				'https://translate.wordpress.org/projects/wp-plugins/sermon-manager-for-wordpress'
			);

			ddw_tbex_resource_item(
				'github',
				'wpcfsermons-github',
				'group-wpcfsermons-resources',
				'https://github.com/WP-for-Church/Sermon-Manager'
			);

		}  // end if

}  // end function
