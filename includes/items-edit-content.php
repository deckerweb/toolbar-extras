<?php

// includes/items-edit-content

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_items_view_singular' );
function ddw_tbex_items_view_singular( $wp_admin_bar ) {

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_edit_content_customize' );
/**
 * Add Customizer deep links for singular items of post types.
 *
 * @since 1.3.0
 * @since 1.4.0 Added conditional check to avoid senseless loading in admin.
 *
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_edit_content_customize( $admin_bar ) {

	/** Bail early if items should not be displayed */
	if ( is_admin()
		&& ! in_array( get_current_screen()->base, array( 'edit', 'post' ) )
	) {
		return $admin_bar;
	}

	$parent = ( 'draft' === get_post_status( get_the_ID() ) ) ? 'preview' : 'view';

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-customize-content-' . get_the_ID(),
			'parent' => is_blog_admin() ? $parent : 'edit',
			'title'  => ddw_tbex_item_title_with_icon( ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ) ),
			'href'   => ddw_tbex_customizer_focus( '', '', get_permalink( get_the_ID() ) ),
			'meta'   => array(
				'class'  => 'tbex-customize-content',
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_items_view_archives' );
/**
 * Tweak the Post Type archive item in the Toolbar (which appears only under
 *   certain conditions, controlled by WordPress Core). Tweak the title of the
 *   item to enforce the use of Post Type plural label. Also, set the link
 *   target under our control,  so it could optionally open in a new browser tab.
 *
 *   Note: Original has priority 80 in WP Core.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_items_view_archives( $wp_admin_bar ) {

	/** Bail early if items should not be displayed */
	if ( ! is_admin()
		|| ( is_admin() && ! in_array( get_current_screen()->base, array( 'edit' ) ) )
	) {
		return $wp_admin_bar;
	}

	/** Get post type */
	$post_type        = sanitize_key( get_query_var( 'post_type' ) );
	$post_type_object = get_post_type_object( $post_type );

	$post_types_no_archive = apply_filters(
		'tbex_filter_post_types_no_archive',
		array(
			'page', 'post',				// WordPress built-in post-types
			'elementor_library',		// Elementor
			'oceanwp_library',			// OceanWP Library
			'astra-advanced-hook',		// Astra Custom Layouts (Astra Pro)
			'gp_elements',				// GeneratePress Elements (GP Premium)
			'jet-theme-core',			// JetThemeCore (Kava Pro/ CrocoBlock)
			'customify_hook',			// Customify (Customify Pro)
			'wpbf_hooks',				// Page Builder Framework Sections (WPBF Premium)
			'ae_global_templates',		// AnyWhere Elementor plugin
			'ct_template',				// Oxygen Builder
			'brizy_template',			// Brizy
		)
	);

	/** Bail if we are in 'page' or 'post' context */
	if ( in_array( $post_type, $post_types_no_archive )
		|| ! $post_type_object->has_archive
		|| ! $post_type_object->show_ui
		|| ! $post_type_object->public
	) {
		return;
	}

	/** Tweak title label */
	$build_title = sprintf(
		/* translators: %s - plural label of post type */
		__( 'View %s', 'toolbar-extras' ),
		$post_type_object->labels->name
	);

	/** Tweak Toolbar node --> needs GLOBAL here! */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'archive',	// same as original!
			'title'  => ddw_tbex_item_title_with_icon( $build_title ),
			'meta'   => array(
				'class'  => 'tbex-view-content',	//'tbex-genesis-cpt-archive-view',
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'View Archive for', 'toolbar-extras' ) . ': ' . $post_type_object->labels->name,
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_view_archives_additions' );
/**
 * Add additional Customizer link with preview URL set to post type archive URL.
 *
 * @since 1.4.2
 *
 * @see plugin-file /includes/themes-genesis/items-genesis.php
 *
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_view_archives_additions( $admin_bar ) {

	/** Bail early if not in admin context */
	if ( ! is_admin() ) {
		return $admin_bar;
	}

	$current_screen = get_current_screen();
	$post_type      = $current_screen->post_type;

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-customize-archive-' . $post_type,
			'parent' => 'archive',
			'title'  => ddw_tbex_item_title_with_icon( ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ) ),
			'href'   => ddw_tbex_customizer_focus( '', '', get_post_type_archive_link( $post_type ) ),
			'meta'   => array(
				'class'  => 'tbex-customize-content',
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Appearance', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
