<?php

// includes/plugins/items-envira-gallery

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_envira_gallery', 15 );
/**
 * Site items for Plugin: Envira Gallery Lite/Pro (free/Premium, by Envira Gallery Team)
 *
 * @since 1.1.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_envira_gallery( $admin_bar ) {

	/** For: Manage Content */
	$admin_bar->add_node(
		array(
			'id'     => 'envira-gallery',
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'Envira Gallery', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=envira' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Envira Gallery', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'envira-gallery-all',
				'parent' => 'envira-gallery',
				'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=envira' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'envira-gallery-new',
				'parent' => 'envira-gallery',
				'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=envira' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
				)
			)
		);

		/** Optional Albums Add-On */
		if ( class_exists( 'Envira_Albums' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'envira-album-all',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'All Albums', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=envira_album' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Albums', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'envira-album-new',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'New Album', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=envira_album' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Album', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Optional Pro Version */
		if ( class_exists( 'Envira_Gallery' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'envira-gallery-settings',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'envira-gallery-settings-general',
						'parent' => 'envira-gallery-settings',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-settings#envira-tab-general' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'envira-gallery-settings-standalone',
						'parent' => 'envira-gallery-settings',
						'title'  => esc_attr__( 'Standalone', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-settings#envira-tab-standalone' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Standalone Settings', 'toolbar-extras' ),
						)
					)
				);

			$admin_bar->add_node(
				array(
					'id'     => 'envira-gallery-addons',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-addons' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate/ Deactivate Add-Ons', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'envira-gallery-tools',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-tools' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Tools', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'envira-gallery-tools-tasks',
						'parent' => 'envira-gallery-tools',
						'title'  => esc_attr__( 'Various Tasks', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-tools#!envira-tab-tools' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Various Tasks', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'envira-gallery-tools-status',
						'parent' => 'envira-gallery-tools',
						'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-gallery-tools#!envira-tab-status' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
						)
					)
				);

		}  // end if

		/** Optional NextGen Importer (Add-On) */
		if ( class_exists( 'Envira_Nextgen_Importer' ) && ddw_tbex_is_nextgen_gallery_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'envira-gallery-nggimport',
					'parent' => 'envira-gallery',
					'title'  => esc_attr__( 'NexGen Importer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=envira&page=envira-nextgen-importer' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'NextGen Gallery Importer', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-envira-gallery-resources',
					'parent' => 'envira-gallery',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			if ( class_exists( 'Envira_Gallery' ) ) {

				ddw_tbex_resource_item(
					'support-contact',
					'envira-gallery-contact',
					'group-envira-gallery-resources',
					'https://enviragallery.com/contact/'
				);

			} else {

				ddw_tbex_resource_item(
					'support-forum',
					'envira-gallery-support',
					'group-envira-gallery-resources',
					'https://wordpress.org/support/plugin/envira-gallery-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'documentation',
				'envira-gallery-docs',
				'group-envira-gallery-resources',
				'https://enviragallery.com/docs'
			);

			if ( class_exists( 'Envira_Gallery' ) ) {

				ddw_tbex_resource_item(
					'changelog',
					'envira-pro-changelog',
					'group-envira-gallery-resources',
					'https://enviragallery.com/docs/how-to-configure-your-gallery-settings/#envira-changelog',
					ddw_tbex_string_version_history( 'pro-plugin' )
				);

			}  // end if

			if ( ! class_exists( 'Envira_Gallery' ) ) {

				ddw_tbex_resource_item(
					'translations-community',
					'envira-gallery-translate',
					'group-envira-gallery-resources',
					'https://translate.wordpress.org/projects/wp-plugins/envira-gallery-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'official-site',
				'envira-gallery-site',
				'group-envira-gallery-resources',
				'https://enviragallery.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_envira_gallery' );
/**
 * Items for "New Content" section: New Envira Gallery with Builder
 *
 * @since 1.1.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_envira_gallery( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! ddw_tbex_is_elementor_active()
		|| ! get_option( 'envira_gallery_standalone_enabled' )
	) {
		return $admin_bar;
	}

	if ( \Elementor\User::is_current_user_can_edit_post_type( 'envira' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'enviragallery-with-builder',
				'parent' => 'new-envira',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'envira' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

	if ( class_exists( 'Envira_Albums' ) && \Elementor\User::is_current_user_can_edit_post_type( 'envira_album' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'enviraalbum-with-builder',
				'parent' => 'new-envira_album',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'envira_album' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder(),
				)
			)
		);

	}  // end if

}  // end function
