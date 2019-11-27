<?php

// includes/elementor-official/items-elementor-core


/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_get_pagebuilders', 'ddw_tbex_register_pagebuilder_elementor' );
/**
 * Register Elementor Page Builder.
 *
 * @since 1.0.0
 *
 * @param array $builders Holds array of all registered Page Builders.
 * @return array Tweaked array of Registered Page Builders.
 */
function ddw_tbex_register_pagebuilder_elementor( array $builders ) {

	$builders[ 'elementor' ] = array(
		/* translators: Label for registered Page Builder, used on plugin's settings page */
		'label'       => esc_attr_x( 'Elementor', 'Label, used on plugin\'s settings page', 'toolbar-extras' ),
		/* translators: (Linked) Title for registered Page Builder */
		'title'       => esc_attr_x( 'Elementor', 'Elementor title name', 'toolbar-extras' ),
		/* translators: Title attribute for registered Page Builder */
		'title_attr'  => esc_attr_x( 'Elementor Page Builder', 'Elementor title attribute name', 'toolbar-extras' ),
		'admin_url'   => esc_url( apply_filters( 'tbex_filter_elementor_admin_url', admin_url( 'edit.php?post_type=elementor_library' ) ) ),
		'color'       => '#d30c5c',
		'color_name'  => __( 'Elementor Red', 'toolbar-extras' ),
		'plugins_tab' => 'yes',
	);

	return $builders;

}  // end function


/**
 * Inlude specific Elementor helper functions.
 * @since 1.4.0
 */
require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/elementor-functions.php';


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core', 99 );
/**
 * Add main items for the free/core version of "Elementor" plugin
 *   (free, by Elementor Team/ Elementor Ltd.).
 *
 * @since 1.0.0
 * @since 1.3.5 Added BTC plugin support.
 * @since 1.4.0 Added 2 tasks from Elementor Tools (for Admin only).
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_get_elementor_template_add_new_url()
 * @uses ddw_tbex_string_elementor_template_with_builder()
 * @uses ddw_tbex_string_elementor_template_create_with_builder()
 * @uses ddw_tbex_string_elementor_categories_via()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_elementor_core( $admin_bar ) {

	/** Bail early if Elementor is not set as default page builder */
	if ( 'elementor' !== ddw_tbex_get_default_pagebuilder() ) {
		return $admin_bar;
	}

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();

	/** Elementor Library */
	$admin_bar->add_node(
		array(
			'id'     => 'elementor-library',
			'parent' => 'group-creative-content',
			'title'  => ddw_tbex_string_elementor_library(),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_library(),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-library-all',
				'parent' => 'elementor-library',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				)
			)
		);

		/** Display only for Elementor 2.0+ */
		if ( ddw_tbex_is_elementor_version( 'core', '2.0.0', '>=' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'elibrary-types',
					'parent' => 'elementor-library',
					'title'  => esc_attr__( 'Template Types', 'toolbar-extras' ),
					'href'   => '',
					'meta'   => array(
						'target' => '',
						/* translators: %1$s - Name of "Elementor" Page Builder */
						'title'  => sprintf( esc_attr__( '%s Template Types', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'elementor-library-pages',
						'parent' => 'elibrary-types',
						/* translators: Elementor Template type */
						'title'  => esc_attr_x( 'Content (Pages)', 'Elementor Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=page' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Content (Pages)', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'elementor-library-sections',
						'parent' => 'elibrary-types',
						/* translators: Elementor Template type */
						'title'  => esc_attr_x( 'Sections', 'Elementor Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=section' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Section Blocks', 'toolbar-extras' ),
						)
					)
				);

		}  // end if Elementor 2.0+

		/** Required for Elementor Pro */
		do_action( 'tbex_before_elementor_library_new', $admin_bar );

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-library-new',
				'parent' => 'elementor-library',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_elementor_new_template_url(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'elementor-library-new-builder',
					'parent' => 'elementor-library',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => '',		//esc_attr( \Elementor\Utils::get_create_new_post_url( 'elementor_library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'et-build-template-page',
						'parent' => 'elementor-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_elementor_template_add_new_url( 'page' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'et-build-template-section',
						'parent' => 'elementor-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_elementor_template_add_new_url( 'section' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),
						)
					)
				);

			/** Required for Elementor Pro */
			do_action( 'tbex_after_elementor_library_builder', $admin_bar );

		}  // end if

		/** Categories (since Elementor 2.4.0+) */
		if ( ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'elementor-library-categories-core',
					'parent' => 'elementor-library',
					'title'  => esc_attr__( 'Categories', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=elementor_library_category&post_type=elementor_library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Template Categories', 'toolbar-extras' ) . ddw_tbex_string_elementor_categories_via( 'elementor' ),
					)
				)
			);

		}  // end if

		/** Template categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'elementor-library-template-categories',
					'parent' => 'elementor-library',
					'title'  => ddw_btc_string_template( 'template' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=elementor_library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'template' ) ) . ddw_tbex_string_elementor_categories_via( 'btc' ),
					)
				)
			);

		}  // end if

	/** Action Hook: After Elementor Library */
	do_action( 'tbex_after_elementor_library', $admin_bar );

	/** Elementor Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'elementor-settings',
			'parent' => 'group-pagebuilder-options',
			'title'  => ddw_tbex_string_elementor_settings(),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_settings(),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-settings-general',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor&rand=' . $rand . '#tab-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-settings-style',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'Style', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor&rand=' . $rand . '#tab-style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Style', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-settings-advanced',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor&rand=' . $rand . '#tab-advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
				)
			)
		);

		/** Display only for Elementor 2.0+ */
		if ( ddw_tbex_is_elementor_version( 'core', '2.0.0', '>=' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'elementor-settings-roles',
					'parent' => 'elementor-settings',
					'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=elementor-role-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

	/** Elementor Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'elementor-tools',
			'parent' => 'group-pagebuilder-options',
			'title'  => ddw_tbex_string_elementor_tools(),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_tools(),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-tools-general',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'General Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools&rand=' . $rand . '#tab-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Tools', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-tools-replace-url',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Replace URL', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools&rand=' . $rand . '#tab-replace_url' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Replace URL', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-tools-versions',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools&rand=' . $rand . '#tab-versions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-tools-maintenance-mode',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Maintenance Mode', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools&rand=' . $rand . '#tab-maintenance_mode' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Maintenance Mode', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-tools-system-info',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-system-info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				)
			)
		);

		/**
		 * Bring two Elementor tasks (from "Tools") to the Toolbar.
		 *   Note: This only works within the WP-Admin, NOT the frontend.
		 *         Additionally, this also does not work on the "Tools" page
		 *         itself.
		 * @since 1.4.0
		 */
		if ( is_admin() ) {

			/** get_current_screen() works only in Admin! */
			if ( 'elementor_page_elementor-tools' !== get_current_screen()->id ) {

				/** Clear CSS Cache - Regenerate CSS */
				$css_html = sprintf(
					'<a href="#" data-nonce="%s" class="elementor-button-spinner" id="elementor-clear-cache-button">%s</a>',
					wp_create_nonce( 'elementor_clear_cache' ),
					esc_attr__( 'Task: Regenerate CSS', 'toolbar-extras' )
				);

				$admin_bar->add_node(
					array(
						'id'     => 'elementor-tools-regenerate-css',
						'parent' => 'elementor-tools',
						'title'  => $css_html,
						'href'   => false,
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Task: Regenerate CSS', 'toolbar-extras' ),
						)
					)
				);

				/** Sync the external Template Library again */
				$sync_html = sprintf(
					'<a href="#" data-nonce="%s" class="elementor-button-spinner" id="elementor-library-sync-button">%s</a>',
					wp_create_nonce( 'elementor_reset_library' ),
					esc_attr__( 'Task: Sync Library', 'toolbar-extras' )
				);

				$admin_bar->add_node(
					array(
						'id'     => 'elementor-tools-sync-library',
						'parent' => 'elementor-tools',
						'title'  => $sync_html,
						'href'   => false,
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Task: Sync external Template Library', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		}  // end if

	/** Action Hook: After Elementor Tools */
	do_action( 'tbex_after_elementor_tools', $admin_bar );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_elementor_core_roles', 99 );
/**
 * Add User items for Elementor (free, Core).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_users()
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_item_title_with_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_user_items_elementor_core_roles( $admin_bar ) {

	/** Elementor Role Manager */
	if ( ! ddw_tbex_display_items_users() || ddw_tbex_is_elementor_version( 'core', '2.0.0', '<' ) ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'elementor-role-manager',
			'parent' => 'group-user-roles',
			/* translators: Elementor "Role Manager" displayed in "my-account" Toolbar submenu - it's only a small area please use a short translation term! */
			'title'  => ddw_tbex_item_title_with_icon( esc_attr_x( 'Role Manager', 'Elementor Role Manager', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-role-manager' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => ddw_tbex_string_elementor() . ': ' . esc_attr__( 'Role Manager', 'toolbar-extras' ),
			)
		)
	);

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_elementor_core_main', 80 );
/**
 * Items for "New Content" section: New Elementor Template
 *   Note: Filter the existing Toolbar node to make a few tweaks with the
 *         existing item.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_string_elementor_template()
 * @uses ddw_tbex_get_elementor_new_template_url()
 * @uses ddw_tbex_string_elementor_template_new()
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_elementor_core_main( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_BEFORE_240, '<=' ) ) {
		return $wp_admin_bar;
	}

	$wp_admin_bar->add_node(
		array(
			'id'     => 'new-elementor_library',	// same as original!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_elementor_template(),
			'href'   => ddw_tbex_get_elementor_new_template_url(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_elementor_template_new(),
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_elementor_core_sub', 90 );
/**
 * Sub items for "New Content" section: New Elementor Template types.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored; moved into function(s).
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_is_elementor_version()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_elementor_core_sub( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	if ( ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

		/** Group: Pro Custom Fonts */
		$admin_bar->add_group(
			array(
				'id'     => 'group-elementor-nclib',
				'parent' => 'new-elementor_library',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'elementor-nclib-new-template',
				'parent' => 'group-elementor-nclib',
				'title'  => esc_attr_x( 'Template', 'Elementor - in Toolbar New Content section', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library#add_new' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr_x( 'Template', 'Elementor - in Toolbar New Content section', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

	if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

		$admin_bar->add_node(
			array(
				'id'     => 'eltpl-page-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'page' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'eltpl-section-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'section' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core_resources', 99 );
/**
 * Add Elementor external resources items
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_elementor_core_resources( $admin_bar ) {

	/**
	 * Bail early if resources display is disabled or Elementor is not the
	 *   default Page Builder.
	 */
	if ( ! ddw_tbex_display_items_resources()
		|| 'elementor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'elementor-resources',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_resources(),
			'href'   => ddw_tbex_get_resource_url( 'elementor', 'url_docs' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_resources(),
			)
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'elementor-resources-docs',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_docs' )
		);

		ddw_tbex_resource_item(
			'support-forum',
			'elementor-resources-support',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_free_support' )
		);

		ddw_tbex_resource_item(
			'official-blog',
			'elementor-resources-blog',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_blog' ),
			esc_attr__( 'Official Elementor Blog', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'elementor-resources-youtube',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_videos' ),
			esc_attr__( 'Official Elementor YouTube Channel', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'changelog',
			'elementor-resources-changelog',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_changes' ),
			ddw_tbex_string_version_history( 'plugin' )
		);

		ddw_tbex_resource_item(
			'github',
			'elementor-resources-github',
			'elementor-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_github' )
		);

	/** Action Hook: After Elementor Resources */
	do_action( 'tbex_after_elementor_resources', $admin_bar );

	/** Elementor Community */
	$admin_bar->add_node(
		array(
			'id'     => 'elementor-community',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_community(),
			'href'   => ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_community(),
			)
		)
	);

		ddw_tbex_resource_item(
			'facebook-group',
			'elementor-community-facebook',
			'elementor-community',
			ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' )
		);

		ddw_tbex_resource_item(
			'translations-community',
			'elementor-community-translations',
			'elementor-community',
			ddw_tbex_get_resource_url( 'elementor', 'url_translations' )
		);

		ddw_tbex_resource_item(
			'github-issues',
			'elementor-community-github-issues',
			'elementor-community',
			ddw_tbex_get_resource_url( 'elementor', 'url_github_issues' )
		);

		ddw_tbex_resource_item(
			'community-forum',
			'elementor-community-elmforums',
			'elementor-community',
			ddw_tbex_get_resource_url( 'elementor', 'url_el_forums' )
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core_developers', 99 );
/**
 * Add Elementor external developers items
 *   NOTE: Only when Dev Mode & Resources are activated.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_elementor_core_developers( $admin_bar ) {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ( ! ddw_tbex_display_items_dev_mode() || ! ddw_tbex_display_items_resources() )
		|| 'elementor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return $admin_bar;
	}

	/** Elementor Developers */
	$admin_bar->add_node(
		array(
			'id'     => 'elementor-developers',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_developers(),
			'href'   => ddw_tbex_get_resource_url( 'elementor', 'url_developers' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_developers(),
			)
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'elementor-developers-docs',
			'elementor-developers',
			ddw_tbex_get_resource_url( 'elementor', 'url_developers' )
		);

		ddw_tbex_resource_item(
			'dev-blog',
			'elementor-developers-blog',
			'elementor-developers',
			ddw_tbex_get_resource_url( 'elementor', 'url_dev_blog' )
		);

		ddw_tbex_resource_item(
			'code-reference',
			'elementor-developers-code',
			'elementor-developers',
			ddw_tbex_get_resource_url( 'elementor', 'url_code_reference' )
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'elementor-developers-fbdev-group',
			'elementor-developers',
			ddw_tbex_get_resource_url( 'elementor', 'url_fbdev_group' ),
			esc_attr__( 'Advanced User &amp; Developer Community Group', 'toolbar-extras' )
		);

}  // end function


add_action( 'elementor/finder/categories/init', 'ddw_tbex_elementor_finder_add_items' );
/**
 * Add "Toolbar Extras" category to the Elementor Finder (Elementor v2.3.0+).
 *
 * @since 1.4.0
 *
 * @see plugin file: includes/elementor-official/items-finder-elementor-resources.php
 *
 * @param object $categories_manager
 */
function ddw_tbex_elementor_finder_add_items( $categories_manager ) {

	/** Include the Finder Category class files */
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-finder-tbex.php';
	require_once TBEX_PLUGIN_DIR . 'includes/elementor-official/items-finder-elementor-resources.php';

	/** Add the Toolbar Extras category */
	$categories_manager->add_category( 'toolbar-extras', new DDW_Toolbar_Extras_Finder_Category() );

	/** Add the Elementor Resources category */
	$categories_manager->add_category( 'tbex-elementor-resources', new DDW_Elementor_Resources_Finder_Category() );

}  // end function
