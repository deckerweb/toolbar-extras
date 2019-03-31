<?php

// includes/themes/items-rife

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Apollo13 Framework Extensions Add-On plugin is active or not.
 *
 * @since 1.4.2
 *
 * @return bool TRUE if constant is defined, FALSE otherwise.
 */
function ddw_tbex_is_a13fe_active() {

	return defined( 'A13FE_VERSION' );

}  // end function


/**
 * Check if Rife Pro theme version is active or not.
 *
 * @since 1.4.2
 *
 * @return bool TRUE if conditions are met, FALSE otherwise.
 */
function ddw_tbex_is_rife_pro_active() {

	if ( 'Rife Pro' === wp_get_theme()
		|| 'rife' === wp_basename( get_template_directory() )
	) {
		return TRUE;
	}

	return FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_rife', 100 );
/**
 * Items for Theme: Rife Free & Rife Pro (free/Premium, by Apollo13Themes)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_rife() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

	/** Rife customize */
	ddw_tbex_item_theme_creative_customize();

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_rife_customize' );
/**
 * Customize items for Rife Theme
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_a13fe_active()
 * @uses ddw_tbex_is_woocommerce_active()
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_rife_customize( array $items ) {

	/** Declare theme's items */
	$rife_items = array(
		'section_general_settings' => array(
			'type'  => 'panel',
			'title' => __( 'General Settings', 'toolbar-extras' ),
			'id'    => 'rifecmz-general-settings',
		),
		'section_header_settings' => array(
			'type'  => 'panel',
			'title' => __( 'Header Settings', 'toolbar-extras' ),
			'id'    => 'rifecmz-header-settings',
		),
		'section_blog_layout' => array(
			'type'        => 'panel',
			'title'       => __( 'Blog Settings', 'toolbar-extras' ),
			'id'          => 'rifecmz-blog-settings',
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'section_page' => array(
			'type'  => 'panel',
			'title' => __( 'Page Settings', 'toolbar-extras' ),
			'id'    => 'rifecmz-page-settings',
		),
	);

	/** Optional items via free Theme Add-On */
	if ( ddw_tbex_is_a13fe_active() ) {

		$rife_items[ 'section_works' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Works Settings', 'toolbar-extras' ),
			'id'          => 'rifecmz-works-settings',
			'preview_url' => get_post_type_archive_link( 'work' ),
		);

		$rife_items[ 'section_albums' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Albums Settings', 'toolbar-extras' ),
			'id'          => 'rifecmz-albums-settings',
			'preview_url' => get_post_type_archive_link( 'album' ),
		);

		$rife_items[ 'section_sidebars' ] = array(
			'type'  => 'section',
			'title' => __( 'Add Custom Sidebars', 'toolbar-extras' ),
			'id'    => 'rifecmz-sidebars',
		);

	}  // end if

	/** Optional WooCommerce item */
	if ( ddw_tbex_is_woocommerce_active() ) {

		$rife_items[ 'section_shop_general' ] = array(
			'type'        => 'panel',
			'title'       => __( 'Shop Settings', 'toolbar-extras' ),
			'id'          => 'rifecmz-shop-settings',
			'preview_url' => get_post_type_archive_link( 'product' ),
		);

	}  // end if

	$rife_items[ 'section_miscellaneous' ] = array(
		'type'  => 'panel',
		'title' => __( 'Miscellaneous', 'toolbar-extras' ),
		'id'    => 'rifecmz-miscellaneous',
	);

	$rife_items[ 'section_custom_css' ] = array(
		'type'  => 'section',
		'title' => __( 'Custom CSS', 'toolbar-extras' ),
		'id'    => 'rifecmz-custom-css',
	);

	/** Merge and return with all items */
	return array_merge( $items, $rife_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_apollo13_framework', 120 );
/**
 * Add additional items for Rife Free/Pro Theme that are powered via the free
 *   Add-On plugin "Apollo13 Framework Extensions".
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_a13fe_active()
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_display_items_demo_import()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_apollo13_framework() {

	/** Bail early if Theme framework extension plugin is not active */
	if ( ! ddw_tbex_is_a13fe_active() ) {
		return;
	}

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-rife-posttypes',
			'parent' => 'theme-creative',
		)
	);

		$rife_types = array(
			'work',
			'album',
			'people',
		);

		foreach ( $rife_types as $rife_type ) {

			$type_obj    = get_post_type_object( $rife_type );
			$type_name   = $type_obj->labels->name;
			$type_single = $type_obj->labels->singular_name;
			$type_slug   = strtolower( $type_name );

			$title_all = sprintf(
				/* translators: %s - name of a post type (plural label) */
				esc_attr__( 'All %s', 'toolbar-extras' ),
				$type_name
			);

			$title_edit = sprintf(
				/* translators: %s - name of a post type (plural label) */
				esc_attr__( 'Edit %s', 'toolbar-extras' ),
				$type_name
			);

			$title_new = sprintf(
				/* translators: %s - singular name of a post type (singular label) */
				esc_attr__( 'New %s', 'toolbar-extras' ),
				$type_single
			);

			$title_builder = sprintf(
				/* translators: %s - singular name of a post type (singular label) */
				esc_attr__( 'New %s Builder', 'toolbar-extras' ),
				$type_single
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'rifecpts-' . $type_slug,
					'parent' => 'group-rife-posttypes',
					'title'  => $type_name,
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $rife_type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => $type_name
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'rifecpts-' . $type_slug . '-all',
						'parent' => 'rifecpts-' . $type_slug,
						'title'  => $title_all,
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $rife_type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => $title_all,
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'rifecpts-' . $type_slug . '-new',
						'parent' => 'rifecpts-' . $type_slug,
						'title'  => $title_new,
						'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $rife_type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => $title_new,
						)
					)
				);

				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $rife_type ) ) {

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'rifecpts-' . $type_slug . '-builder',
							'parent' => 'rifecpts-' . $type_slug,
							'title'  => $title_builder,
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $rife_type ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => $title_builder,
							)
						)
					);

					if ( ddw_tbex_display_items_new_content() ) {

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'new-rife-' . $type_slug . '-with-builder',
								'parent' => 'new-' . $rife_type,
								'title'  => ddw_tbex_string_newcontent_with_builder(),
								'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $rife_type ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target( 'builder' ),
									'title'  => ddw_tbex_string_newcontent_create_with_builder(),
								)
							)
						);

					}  // end if New Content check

				}  // end if Elementor builder check

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'manage-content-rife-' . $type_slug,
						'parent' => 'manage-content',
						'title'  => $title_edit,
						'href'   => esc_url( admin_url( 'edit.php?post_type=' . $rife_type ) ),
						'meta'   => array(
							'target' => '',
							'title'  => $title_edit,
						)
					)
				);

		}  // end foreach


	/** Theme settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Rife Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=apollo13_pages' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Rife Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-export-import',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=apollo13_pages&subpage=export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-info',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=apollo13_pages&subpage=info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Theme Info', 'toolbar-extras' )
				)
			)
		);


	/** Design Importer (Demos) */
	if ( ddw_tbex_display_items_demo_import() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Rife Design Importer', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( admin_url( 'themes.php?page=apollo13_pages&subpage=import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Rife Design Importer', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_rife_resources', 120 );
/**
 * General resources items for Rife Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_is_a13fe_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_rife_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Rife */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_a13fe_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	if ( ddw_tbex_is_rife_pro_active() ) {

		ddw_tbex_resource_item(
			'support-forum',
			'theme-pro-support-forum',
			'group-theme-resources',
			'https://support.apollo13.eu/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'theme-contact',
			'group-theme-resources',
			'https://apollo13themes.com/contact/'
		);

	} else {

		ddw_tbex_resource_item(
			'support-forum',
			'theme-support',
			'group-theme-resources',
			'https://wordpress.org/support/theme/rife-free'
		);

	}  // end if

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://rifetheme.com/help/'
	);

	ddw_tbex_resource_item(
		'videos',
		'theme-videos',
		'group-theme-resources',
		'https://apollo13themes.com/rife/tutorials/'
	);

	if ( ! ddw_tbex_is_rife_pro_active() ) {

		ddw_tbex_resource_item(
			'translations-community',
			'theme-translate',
			'group-theme-resources',
			'https://translate.wordpress.org/projects/wp-themes/rife-free'
		);

	}  // end if

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://apollo13themes.com/rife/'
	);

}  // end function
