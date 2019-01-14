<?php

// includes/themes/items-ct-risen

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_risen', 100 );
/**
 * Items for Theme: Risen & Risen Child Themes (all Premium, by Steven Gliebe)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_ct_risen() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => function_exists( 'optionsframework_init' ) ? esc_url( admin_url( 'themes.php?page=options-framework' ) ) : '',
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'risencmz-site-identity',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_risen_settings', 100 );
/**
 * Settings items for Risen Theme
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_ct_risen_settings() {

	/** Bail early if Options Framework doesn't exist */
	if ( ! function_exists( 'optionsframework_init' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Risen Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=options-framework' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Risen Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-styles',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Styles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Styles', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-header',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Header', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-2' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Header', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-footer',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Footer', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-3' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Footer', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-homepage',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Homepage', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-4' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Homepage', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-blog',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Blog', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-8' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Blog', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-contact-form',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Contact Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-9' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Contact Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-other',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Other Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-10' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Other Options', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ct_risen_resources', 120 );
/**
 * General resources items for Risen Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_ct_risen_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Risen Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => function_exists( 'optionsframework_init' ) ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'http://stevengliebe.com/projects/wordpress-themes/risen/docs/'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact',
		'group-theme-resources',
		'https://churchthemes.com/contact/'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://toolbarextras.com/go/risen-theme/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_ct_risen_post_types', 110 );
/**
 * Site items for Theme post types: Risen Theme
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_ct_risen_post_types() {

	/** For: Theme Creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-ao-risencpt',
			'parent' => 'theme-creative'
		)
	);

	/** Sermons */
	if ( post_type_exists( 'risen_multimedia' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-sermons',
				'parent' => 'group-ao-risencpt',
				'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_multimedia' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Sermons', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-sermons-all',
					'parent' => 'ct-risencpt-sermons',
					'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=risen_multimedia' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sermons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-sermons-new',
					'parent' => 'ct-risencpt-sermons',
					'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=risen_multimedia' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Sermon', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'risen_multimedia' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-sermons-builder',
						'parent' => 'ct-risencpt-sermons',
						'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_multimedia' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Sermon Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( function_exists( 'optionsframework_init' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-sermons-settings',
						'parent' => 'ct-risencpt-sermons',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-5' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Sermons post type

	/** Gallery */
	if ( post_type_exists( 'risen_gallery' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-gallery',
				'parent' => 'group-ao-risencpt',
				'title'  => esc_attr__( 'Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_gallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Gallery', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-gallery-all',
					'parent' => 'ct-risencpt-gallery',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=risen_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-gallery-new',
					'parent' => 'ct-risencpt-gallery',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=risen_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'risen_multimedia' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-gallery-builder',
						'parent' => 'ct-risencpt-gallery',
						'title'  => esc_attr__( 'New Gallery Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_gallery' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Gallery Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( function_exists( 'optionsframework_init' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-gallery-settings',
						'parent' => 'ct-risencpt-gallery',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-6' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Gallery post type

	/** Events */
	if ( post_type_exists( 'risen_event' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-events',
				'parent' => 'group-ao-risencpt',
				'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Events', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-events-all',
					'parent' => 'ct-risencpt-events',
					'title'  => esc_attr__( 'All Events', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=risen_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Events', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-events-new',
					'parent' => 'ct-risencpt-events',
					'title'  => esc_attr__( 'New Event', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=risen_event' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Event', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'risen_event' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-events-builder',
						'parent' => 'ct-risencpt-events',
						'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_event' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Event Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( function_exists( 'optionsframework_init' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-events-settings',
						'parent' => 'ct-risencpt-events',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-7' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Events post type

	/** Staff (Persons/ People) */
	if ( post_type_exists( 'risen_staff' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-staff',
				'parent' => 'group-ao-risencpt',
				'title'  => esc_attr__( 'Staff', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_staff' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Staff', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-staff-all',
					'parent' => 'ct-risencpt-staff',
					'title'  => esc_attr__( 'All Persons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=risen_staff' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Persons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-staff-new',
					'parent' => 'ct-risencpt-staff',
					'title'  => esc_attr__( 'New Person', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=risen_staff' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Person', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'risen_staff' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-staff-builder',
						'parent' => 'ct-risencpt-staff',
						'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_staff' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Person Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Staff post type

	/** Locations */
	if ( post_type_exists( 'risen_location' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-locations',
				'parent' => 'group-ao-risencpt',
				'title'  => esc_attr__( 'Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Locations', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-locations-all',
					'parent' => 'ct-risencpt-locations',
					'title'  => esc_attr__( 'All Locations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=risen_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Locations', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risencpt-locations-new',
					'parent' => 'ct-risencpt-locations',
					'title'  => esc_attr__( 'New Location', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=risen_location' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Location', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'risen_location' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ct-risencpt-locations-builder',
						'parent' => 'ct-risencpt-locations',
						'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_location' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Location Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if Locations post type

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ct_risen_post_types', 15 );
/**
 * Site items for Theme post types: Risen Theme
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_ct_risen_post_types() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-risen-posttype-content',
			'parent' => 'manage-content'
		)
	);

	/** Sermons */
	if ( post_type_exists( 'risen_multimedia' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-sermons-edit',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_multimedia' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Sermons', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Gallery */
	if ( post_type_exists( 'risen_gallery' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-gallery-edit',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Edit Gallery', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_gallery' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Gallery', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Events */
	if ( post_type_exists( 'risen_events' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-events-edit',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_event' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Events', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Persons */
	if ( post_type_exists( 'risen_staff' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-staff-edit',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_staff' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Persons', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Locations */
	if ( post_type_exists( 'risen_location' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-locations-edit',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=risen_location' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Edit Locations', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	/** Plugin settings */
	if ( function_exists( 'optionsframework_init' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risen-posttype-content-plugin-settings',
				'parent' => 'group-risen-posttype-content',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=options-framework' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risen-posttype-content-plugin-settings-sermons',
					'parent' => 'ct-risen-posttype-content-plugin-settings',
					'title'  => esc_attr__( 'Sermons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-5' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Sermons', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risen-posttype-content-plugin-settings-gallery',
					'parent' => 'ct-risen-posttype-content-plugin-settings',
					'title'  => esc_attr__( 'Gallery', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-6' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Gallery', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ct-risen-posttype-content-plugin-settings-events',
					'parent' => 'ct-risen-posttype-content-plugin-settings',
					'title'  => esc_attr__( 'Events', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=options-framework#options-group-7' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Events', 'toolbar-extras' )
					)
				)
			);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_ct_risen_post_types' );
/**
 * Items for "New Content" section: New Sermons/ Gallery/ Events/ Persons/
 *   Locations with Builder
 *
 * @since 1.3.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_ct_risen_post_types() {

	/** Bail early if items display is not wanted or possible */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! ddw_tbex_is_elementor_active()
	) {
		return;
	}

	/** Sermons */
	if ( post_type_exists( 'risen_multimedia' ) && \Elementor\User::is_current_user_can_edit_post_type( 'risen_multimedia' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-sermons-with-builder',
				'parent' => 'new-risen_multimedia',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_multimedia' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Gallery */
	if ( post_type_exists( 'risen_gallery' ) && \Elementor\User::is_current_user_can_edit_post_type( 'risen_gallery' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-gallery-with-builder',
				'parent' => 'new-risen_gallery',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_gallery' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Events */
	if ( post_type_exists( 'risen_event' ) && \Elementor\User::is_current_user_can_edit_post_type( 'risen_event' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-events-with-builder',
				'parent' => 'new-risen_event',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_event' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Locations */
	if ( post_type_exists( 'risen_location' ) && \Elementor\User::is_current_user_can_edit_post_type( 'risen_location' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-locations-with-builder',
				'parent' => 'new-risen_location',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_location' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

	/** Staff (Persons/ People) */
	if ( post_type_exists( 'risen_staff' ) && \Elementor\User::is_current_user_can_edit_post_type( 'risen_staff' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ct-risencpt-staff-with-builder',
				'parent' => 'new-risen_staff',
				'title'  => ddw_tbex_string_newcontent_with_builder(),
				'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'risen_staff' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_newcontent_create_with_builder()
				)
			)
		);

	}  // end if

}  // end function
