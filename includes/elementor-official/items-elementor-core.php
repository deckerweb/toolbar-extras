<?php

// includes/elementor-official/items-elementor-core


/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_get_pagebuilders', 'ddw_tbex_register_pagebuilder_elementor' );
/**
 * Register Elementor Page Builder.
 *
 * @since  1.0.0
 *
 * @param  array $builders Holds array of all registered Page Builders.
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
		'plugins_tab' => 'yes',
	);

	return $builders;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core', 99 );
/**
 * Add Elementor (free, Core) main items.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_is_elementor_version()
 * @uses   ddw_tbex_string_elementor()
 * @uses   ddw_tbex_get_elementor_template_add_new_url()
 * @uses   ddw_tbex_string_elementor_template_with_builder()
 * @uses   ddw_tbex_string_elementor_template_create_with_builder()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_core() {

	/** Elementor Library */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library',
			'parent' => 'group-creative-content',
			'title'  => ddw_tbex_string_elementor_library(),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_library()
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-library-all',
				'parent' => 'elementor-library',
				'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' )
				)
			)
		);

		/** Display only for Elementor 2.0+ */
		if ( ddw_tbex_is_elementor_version( 'core', '2.0.0-beta1', '>=' ) /* class_exists( '\Elementor\Core\Base\Document' ) */ ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elibrary-types',
					'parent' => 'elementor-library',
					'title'  => esc_attr__( 'Template Types', 'toolbar-extras' ),
					'href'   => '',
					'meta'   => array(
						'target' => '',
						/* translators: %1$s - Name of "Elementor" Page Builder */
						'title'  => sprintf( esc_attr__( '%s Template Types', 'toolbar-extras' ), ddw_tbex_string_elementor() )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'elementor-library-pages',
						'parent' => 'elibrary-types',
						/* translators: Elementor Template type */
						'title'  => esc_attr_x( 'Content (Pages)', 'Elementor Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=page' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Content (Pages)', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'elementor-library-sections',
						'parent' => 'elibrary-types',
						/* translators: Elementor Template type */
						'title'  => esc_attr_x( 'Sections', 'Elementor Template type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=section' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Template Type: Section Blocks', 'toolbar-extras' )
						)
					)
				);

		}  // end if Elementor 2.0+

		/** Required for Elementor Pro */
		do_action( 'tbex_before_elementor_library_new' );

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-library-new',
				'parent' => 'elementor-library',
				'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=elementor_library' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-library-new-builder',
					'parent' => 'elementor-library',
					'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' ),
					'href'   => '',		//esc_attr( \Elementor\Utils::get_create_new_post_url( 'elementor_library' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template Builder', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'et-build-template-page',
						'parent' => 'elementor-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_elementor_template_add_new_url( 'page' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Page', 'Elementor Template type', 'toolbar-extras' ) )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'et-build-template-section',
						'parent' => 'elementor-library-new-builder',
						'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) ),
						'href'   => ddw_tbex_get_elementor_template_add_new_url( 'section' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Section', 'Elementor Template type', 'toolbar-extras' ) )
						)
					)
				);

			/** Required for Elementor Pro */
			do_action( 'tbex_after_elementor_library_builder' );

		}  // end if

	/** Action Hook: After Elementor Library */
	do_action( 'tbex_after_elementor_library' );

	/** Elementor Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-settings',
			'parent' => 'group-pagebuilder-options',
			'title'  => ddw_tbex_string_elementor_settings(),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_settings()
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-settings-general',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'General', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor#tab-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-settings-style',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'Style', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor#tab-style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Style', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-settings-advanced',
				'parent' => 'elementor-settings',
				'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor#tab-advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
				)
			)
		);

		/** Display only for Elementor 2.0+ */
		if ( ddw_tbex_is_elementor_version( 'core', '2.0.0-beta1', '>=' ) /* class_exists( '\Elementor\Core\Base\Document' ) */ ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-settings-roles',
					'parent' => 'elementor-settings',
					'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=elementor-role-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Role Manager', 'toolbar-extras' )
					)
				)
			);

		}  // end if

	/** Elementor Tools */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-tools',
			'parent' => 'group-pagebuilder-options',
			'title'  => ddw_tbex_string_elementor_tools(),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_elementor_tools()
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-tools-general',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'General Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools#tab-general' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Tools', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-tools-replace-url',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Replace URL', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools#tab-replace_url' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Replace URL', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-tools-versions',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Version Control', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools#tab-versions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Version Control', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-tools-maintenance-mode',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'Maintenance Mode', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-tools#tab-maintenance_mode' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Maintenance Mode', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-tools-system-info',
				'parent' => 'elementor-tools',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-system-info' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

	/** Action Hook: After Elementor Tools */
	do_action( 'tbex_after_elementor_tools' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_user_items_elementor_core_roles', 99 );
/**
 * Add User items for Elementor (free, Core).
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_users()
 * @uses   ddw_tbex_is_elementor_version()
 * @uses   ddw_tbex_item_title_with_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_user_items_elementor_core_roles() {

	/** Elementor Role Manager */
	if ( ! ddw_tbex_display_items_users() || ddw_tbex_is_elementor_version( 'core', '2.0.0-beta3', '<' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-role-manager',
			'parent' => 'group-user-roles',
			/* translators: Elementor "Role Manager" displayed in "my-account" Toolbar submenu - it's only a small area please use a short translation term! */
			'title'  => ddw_tbex_item_title_with_icon( esc_attr_x( 'Role Manager', 'Elementor Role Manager', 'toolbar-extras' ) ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-role-manager' ) ),
			'meta'   => array(
				'class'  => 'tbex-users',
				'target' => '',
				'title'  => ddw_tbex_string_elementor() . ': ' . esc_attr__( 'Role Manager', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core_resources', 99 );
/**
 * Add Elementor external resources items
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_core_resources() {

	/** Bail early if resources display is disabled */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-resources',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_resources(),
			'href'   => 'https://docs.elementor.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_resources()
			)
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'elementor-resources-docs',
			'elementor-resources',
			'https://docs.elementor.com/'
		);

		ddw_tbex_resource_item(
			'support-forum',
			'elementor-resources-support',
			'elementor-resources',
			'https://wordpress.org/support/plugin/elementor'
		);

		ddw_tbex_resource_item(
			'official-blog',
			'elementor-resources-youtube',
			'elementor-resources',
			'https://elementor.com/blog/',
			esc_attr__( 'Official Elementor Blog', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'elementor-resources-blog',
			'elementor-resources',
			'https://www.youtube.com/c/elementor',
			esc_attr__( 'Official Elementor YouTube Channel', 'toolbar-extras' )
		);

		ddw_tbex_resource_item(
			'github',
			'elementor-resources-github',
			'elementor-resources',
			'https://github.com/pojome/elementor'
		);

	/** Action Hook: After Elementor Resources */
	do_action( 'tbex_after_elementor_resources' );

	/** Elementor Community */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-community',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_community(),
			'href'   => 'https://www.facebook.com/groups/Elementors/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_community()
			)
		)
	);

		ddw_tbex_resource_item(
			'facebook-group',
			'elementor-community-facebook',
			'elementor-community',
			'https://www.facebook.com/groups/Elementors/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'elementor-community-translations',
			'elementor-community',
			'https://translate.wordpress.org/projects/wp-plugins/elementor'
		);

		ddw_tbex_resource_item(
			'github-issues',
			'elementor-community-github-issues',
			'elementor-community',
			'https://github.com/pojome/elementor/issues'
		);

		ddw_tbex_resource_item(
			'community-forum',
			'elementor-community-elmforums',
			'elementor-community',
			'https://elementorforums.com/community/'
		);

		ddw_tbex_resource_item(
			'user-forum',
			'elementor-community-elmtalk',
			'elementor-community',
			'//www.elementortalk.com/'
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_core_developers', 99 );
/**
 * Add Elementor external developers items
 *   NOTE: Only when Dev Mode & Resources are activated.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_core_developers() {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ! ddw_tbex_display_items_dev_mode() && ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Elementor Developers */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-developers',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_elementor_developers(),
			'href'   => 'https://developers.elementor.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_elementor_developers()
			)
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'elementor-developers-docs',
			'elementor-developers',
			'https://developers.elementor.com/'
		);

		ddw_tbex_resource_item(
			'code-reference',
			'elementor-developers-code',
			'elementor-developers',
			'https://code.elementor.com/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'elementor-developers-fbdev-group',
			'elementor-developers',
			'https://www.facebook.com/groups/1388158027894331/',
			esc_attr__( 'Advanced User &amp; Developer Community Group', 'toolbar-extras' )
		);

}  // end function
