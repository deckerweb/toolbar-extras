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


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ct_church_content', 110 );
/**
 * Site items for Plugin: Church Content (free, by churchthemes.com)
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_ct_church_content() {

	/** For: Theme Creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-ao-churchcontent',
			'parent' => 'theme-creative'
		)
	);

	/** Sermons */
	if ( current_theme_supports( 'ctc-sermons' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-churchcontent-sermons',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sermons', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-sermons-all',
					'parent' => 'ct-churchcontent-sermons',
					'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-sermons-new',
					'parent' => 'ct-churchcontent-sermons',
					'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_sermon' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_sermon' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-churchcontent-sermons-builder',
						'parent' => 'ct-churchcontent-sermons',
						'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_sermon' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Sermons Theme support

	/** Events */
	if ( current_theme_supports( 'ctc-events' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-churchcontent-events',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Events', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-events-all',
					'parent' => 'ct-churchcontent-events',
					'title'  => esc_attr__( 'All Events', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Events', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-events-new',
					'parent' => 'ct-churchcontent-events',
					'title'  => esc_attr__( 'New Event', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Event', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_event' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-churchcontent-events-builder',
						'parent' => 'ct-churchcontent-events',
						'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_event' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Events Theme support

	/** Locations */
	if ( current_theme_supports( 'ctc-sermons' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-churchcontent-locations',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Locations', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-locations-all',
					'parent' => 'ct-churchcontent-locations',
					'title'  => esc_attr__( 'All Locations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Locations', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-locations-new',
					'parent' => 'ct-churchcontent-locations',
					'title'  => esc_attr__( 'New Location', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Location', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_location' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-churchcontent-locations-builder',
						'parent' => 'ct-churchcontent-locations',
						'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_location' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Locations Theme support

	/** Persons (People) */
	if ( current_theme_supports( 'ctc-people' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-churchcontent-persons',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Persons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Persons', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-persons-all',
					'parent' => 'ct-churchcontent-persons',
					'title'  => esc_attr__( 'All Persons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Persons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-churchcontent-persons-new',
					'parent' => 'ct-churchcontent-persons',
					'title'  => esc_attr__( 'New Person', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=ctc_person' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Person', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_person' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-churchcontent-persons-builder',
						'parent' => 'ct-churchcontent-persons',
						'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_person' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Persons Theme support

	/** Plugin settings */
	if ( current_theme_supports( 'church-theme-content' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-churchcontent-plugin-settings',
				'parent' => 'group-ao-churchcontent',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ct_church_content', 15 );
/**
 * Site items for Plugin: Church Content (free, by churchthemes.com)
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_ct_church_content() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-church-content',
			'parent' => 'manage-content'
		)
	);

	/** Sermons */
	if ( current_theme_supports( 'ctc-sermons' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-content-sermons-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_sermon' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Events */
	if ( current_theme_supports( 'ctc-events' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-content-events-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Persons */
	if ( current_theme_supports( 'ctc-people' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-content-persons-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_person' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Locations */
	if ( current_theme_supports( 'ctc-locations' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-content-locations-edit',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=ctc_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Plugin settings */
	if ( current_theme_supports( 'church-theme-content' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-content-settings',
				'parent' => 'group-church-content',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=church-theme-content' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_ct_church_content' );
/**
 * Items for "New Content" section: New Sermons/ Events/ Persons/ Locations with
 *   Builder
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_ct_church_content() {

	/** Bail early if items display is not wanted or possible */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! ddw_tbex_is_elementor_active()
	) {
		return;
	}

	/** Sermons */
	if ( current_theme_supports( 'ctc-sermons' ) && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_sermon' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-sermons-with-builder',
				'parent' => 'new-ctc_sermon',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_sermon' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Events */
	if ( current_theme_supports( 'ctc-events' ) && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_event' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-events-with-builder',
				'parent' => 'new-ctc_event',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_event' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Locations */
	if ( current_theme_supports( 'ctc-locations' ) && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_location' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-locations-with-builder',
				'parent' => 'new-ctc_location',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_location' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Persons */
	if ( current_theme_supports( 'ctc-people' ) && \Elementor\User::is_current_user_can_edit_post_type( 'ctc_person' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-persons-with-builder',
				'parent' => 'new-ctc_person',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'ctc_person' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end if


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ct_church_content_resources', 150 );
/**
 * Resources items for Church Content Plugin.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_aoitems_ct_church_content_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Church Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-churchcontent-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
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
		'https://github.com/churchthemes/',
		esc_attr__( 'Plugin: Church Content Development', 'toolbar-extras' )
	);

}  // end function
