<?php

// includes/plugins/items-ct-church-content

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Church Content Pro plugin is active or not.
 *
 * @since 1.4.9
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_church_content_pro_active() {

	return class_exists( 'Church_Content_Pro' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ct_church_content', 115 );
/**
 * Site items for Plugin: Church Content (free, by ChurchThemes.com LLC)
 *
 * @since 1.3.0
 * @since 1.4.9 Various new items, tweaks and improvements.
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_is_theme_ctcom()
 * @uses ddw_tbex_is_church_content_pro_active()
 * @uses ddw_tbex_media_items_mime_type()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ct_church_content( $admin_bar ) {

	/**
	 * Assists reload when already on settings page
	 *   (e.g. Sermons > Settings then Sermons > Podcast)
	 */
	$rand = ddw_tbex_rand();

	/**
	 * If Site Group is enabled use that as hook place, otherwise put group to
	 *   "Creative Content" (Build Group).
	 */
	$group_parent = ddw_tbex_display_items_site() ? 'tbex-sitegroup-manage-content' : 'group-creative-content';	// : 'ao-churchcontent';

	/**
	 * Only add items if proper Theme Support was declared.
	 *   Note: The "Church Content" plugin requires proper declaration of
	 *   supported features to be active at all (to let any features appear).
	 */
	if ( current_theme_supports( 'church-theme-content' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ao-churchcontent',
				'parent' => $group_parent,
				'title'  => esc_attr__( 'Church Content', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Church Content', 'toolbar-extras' ),
				)
			)
		);

		/** Add group for collecting all items thematically */
		$admin_bar->add_group(
			array(
				'id'     => 'group-ao-churchcontent',
				'parent' => 'ao-churchcontent',
			)
		);

	}  // end if

	/** Sermons */
	if ( current_theme_supports( 'ctc-sermons' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-churchcontent-sermons',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-sermons-all',
					'parent' => 'ct-churchcontent-sermons',
					'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-sermons-new',
					'parent' => 'ct-churchcontent-sermons',
					'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_sermon' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_sermon' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-sermons-builder',
						'parent' => 'ct-churchcontent-sermons',
						'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_sermon' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Additional Pro settings */
			if ( ddw_tbex_is_church_content_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-sermons-podcast',
						'parent' => 'ct-churchcontent-sermons',
						'title'  => esc_attr__( 'Podcast', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#podcast' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Podcast Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-sermons-settings',
						'parent' => 'ct-churchcontent-sermons',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#sermons' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Additional media items: Audio, Video, PDF Files listings (Media Library) */
			ddw_tbex_media_items_mime_type( 'audio', $admin_bar, 'ctcasermons', 'ct-churchcontent-sermons' );
			ddw_tbex_media_items_mime_type( 'video', $admin_bar, 'ctcvsermons', 'ct-churchcontent-sermons' );
			ddw_tbex_media_items_mime_type( 'pdf', $admin_bar, 'ctcpsermons', 'ct-churchcontent-sermons' );

	}  // end if Sermons Theme support

	/** Events */
	if ( current_theme_supports( 'ctc-events' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-churchcontent-events',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-events-all',
					'parent' => 'ct-churchcontent-events',
					'title'  => esc_attr__( 'All Events', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Events', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-events-new',
					'parent' => 'ct-churchcontent-events',
					'title'  => esc_attr__( 'New Event', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Event', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_event' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-events-builder',
						'parent' => 'ct-churchcontent-events',
						'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_event' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Additional Pro settings */
			if ( ddw_tbex_is_church_content_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-events-settings',
						'parent' => 'ct-churchcontent-events',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#events' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Events', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

	}  // end if Events Theme support

	/** Locations */
	if ( current_theme_supports( 'ctc-locations' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-churchcontent-locations',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Locations', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-locations-all',
					'parent' => 'ct-churchcontent-locations',
					'title'  => esc_attr__( 'All Locations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Locations', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-locations-new',
					'parent' => 'ct-churchcontent-locations',
					'title'  => esc_attr__( 'New Location', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Location', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_location' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-locations-builder',
						'parent' => 'ct-churchcontent-locations',
						'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_location' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Additional Pro settings */
			if ( ddw_tbex_is_church_content_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-locations-settings',
						'parent' => 'ct-churchcontent-locations',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#locations' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Locations', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

	}  // end if Locations Theme support

	/** Persons (People) */
	if ( current_theme_supports( 'ctc-people' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-churchcontent-persons',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Persons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Persons', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-persons-all',
					'parent' => 'ct-churchcontent-persons',
					'title'  => esc_attr__( 'All Persons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Persons', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ct-churchcontent-persons-new',
					'parent' => 'ct-churchcontent-persons',
					'title'  => esc_attr__( 'New Person', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_person' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Person', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_person' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-persons-builder',
						'parent' => 'ct-churchcontent-persons',
						'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_person' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Additional Pro settings */
			if ( ddw_tbex_is_church_content_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-persons-settings',
						'parent' => 'ct-churchcontent-persons',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#people' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'People', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

	}  // end if Persons Theme support

	/** Plugin settings */
	if ( current_theme_supports( 'church-theme-content' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-churchcontent-plugin-settings',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			/** Additional Pro settings */
			if ( ddw_tbex_is_church_content_pro_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-sermons',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#sermons' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-podcast',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Podcast', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#podcast' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Podcast', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-events',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#events' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Events', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-locations',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Locations', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#locations' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Locations', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-people',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'People', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#people' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'People', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-other',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Other', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#other' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Other', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ct-churchcontent-plugin-settings-licenses',
						'parent' => 'ct-churchcontent-plugin-settings',
						'title'  => esc_attr__( 'Licenses', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content&rand=' . $rand . '#licenses' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Licenses', 'toolbar-extras' ) . ': ' . esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if Pro Add-On check

	}  // end if Theme support check

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ct_church_content', 15 );
/**
 * Manage Content SSite items for Plugin:
 *   Church Content (free, by ChurchThemes.com LLC)
 *
 * @since 1.3.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_ct_church_content( $admin_bar ) {

	/** For: Manage Content */
	$admin_bar->add_group(
		array(
			'id'     => 'group-church-content',
			'parent' => 'manage-content',
		)
	);

	/** Sermons */
	if ( current_theme_supports( 'ctc-sermons' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-content-sermons-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Events */
	if ( current_theme_supports( 'ctc-events' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-content-events-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Persons */
	if ( current_theme_supports( 'ctc-people' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-content-persons-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Locations */
	if ( current_theme_supports( 'ctc-locations' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-content-locations-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	/** Plugin settings */
	if ( current_theme_supports( 'church-theme-content' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'ct-content-settings',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_ct_church_content', 80 );
/**
 * Items for "New Content" section: New Sermons/ Events/ Persons/ Locations with
 *   Builder.
 *
 * @since 1.3.0
 * @since 1.4.9 Refactored to optionally group all relevant items.
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_new_content_ct_church_content( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	/** Set all content types */
	$support_types  = array(
		'ctc-sermons'   => 'ctc_sermon',
		'ctc-events'    => 'ctc_event',
		'ctc-locations' => 'ctc_location',
		'ctc-people'    => 'ctc_person',
	);
	$active_counter = 0;

	/** Determine which types are currently supported by theme/ install */
	foreach ( $support_types as $support_type => $support_type_id ) {
		
		if ( ! current_theme_supports( $support_type ) ) {
			continue;
		}

		$active_counter++;

	}  // end foreach

	/** Conditionally add new parent item for Church Content */
	if ( 1 < $active_counter ) {

		$admin_bar->add_node(
			array(
				'id'     => 'new-church-content-types',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Church Content', 'toolbar-extras' ),
				'href'   => FALSE,
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Church Content', 'toolbar-extras' ) ),
				)
			)
		);

	}  // end if

	/** Loop through all active types and add/ filter relevant Toolbar items */
	foreach ( $support_types as $support_type => $support_type_id ) {
		
		if ( current_theme_supports( $support_type ) ) {

			if ( 1 < $active_counter ) {

				$admin_bar->add_group(
					array(
						'id'     => 'group-churchcontent-new-' . $support_type_id,
						'parent' => 'new-church-content-types',
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'new-' . $support_type_id,		// same as original item (for example: 'new-ctc_sermon')
							'parent' => 'group-churchcontent-new-' . $support_type_id,
						)
					);

			}  // end if

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $support_type_id ) ) {

				$admin_bar->add_node(
					array(
						'id'     => $support_type . '-with-builder',
						'parent' => ( 1 < $active_counter ) ? 'group-churchcontent-new-' . $support_type_id : 'new-' . $support_type_id,
						'title'  => ddw_tbex_string_newcontent_with_builder(),		// get_post_type_object( $support_type_id )->labels->singular_name
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $support_type_id ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_newcontent_create_with_builder(),
						)
					)
				);

			}  // end if Elementor check

		}  // end if Theme Support check

	}  // end foreach

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ct_church_content_resources', 150 );
/**
 * Resources items for Church Content Plugin.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 * @since 1.4.9 Tweaked parent ID; added resources (docs, changelogs).
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_string_version_history()
 * @uses ddw_tbex_is_church_content_pro_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_ct_church_content_resources( $admin_bar ) {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() || ! current_theme_supports( 'church-theme-content' ) ) {
		return $admin_bar;
	}

	/** Group: Plugin's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-churchcontent-resources',
			'parent' => 'group-ao-churchcontent',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

		ddw_tbex_resource_item(
			'support-forum',
			'churchcontent-support',
			'group-churchcontent-resources',
			'https://wordpress.org/support/plugin/church-theme-content',
			esc_attr__( 'Plugin: Church Content Support Forum', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'documentation',
			'churchcontent-docs',
			'group-churchcontent-resources',
			'https://churchthemes.com/guides/user/content/',
			esc_attr__( 'Plugin: Church Content Documentation for Managing Content Types', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'changelog',
			'churchcontent-changelog',
			'group-churchcontent-resources',
			'https://github.com/churchthemes/church-theme-content/releases',
			ddw_tbex_string_version_history( 'plugin' )
		);

		if ( ddw_tbex_is_church_content_pro_active() ) {

			ddw_tbex_resource_item(
				'pro-changelog',
				'churchcontent-changelog-pro',
				'group-churchcontent-resources',
				'https://churchthemes.com/guides/user/plugins/church-content/#church-content-pro',
				ddw_tbex_string_version_history( 'pro-addon' )
			);

		}  // end if

		ddw_tbex_resource_item(
			'translations-community',
			'churchcontent-translate',
			'group-churchcontent-resources',
			'https://translate.wordpress.org/projects/wp-plugins/church-theme-content',
			esc_attr__( 'Plugin: Church Content Translations', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'github',
			'churchcontent-github',
			'group-churchcontent-resources',
			'https://github.com/churchthemes/church-theme-content',
			esc_attr__( 'Plugin: Church Content Development', 'toolbar-extras' )
		);

}  // end function
