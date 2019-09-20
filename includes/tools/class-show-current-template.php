<?php

namespace DDW\TBEX;

// includes/tools/class-show-current-template

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Class to detect the used template file/ template part for the currently
 *   displayed page document and show it in the Toolbar with a link to the Theme
 *   Editor (if active).
 *
 * @since 1.4.7
 */
class Show_Current_Template {

	/** @var string $template_name */
	private $template_name = '';

	/** @var array $template_parts */
	private $template_parts = array();


	/**
	 * Constructor
	 *
	 * @since 1.4.7
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'frontend_hooks' ), 100 );

	}  // end method


	/**
	 * Setup the frontend hooks
	 *
	 * @since 1.4.7
	 *
	 * @return void
	 */
	public function frontend_hooks() {

		/** Don't run in admin or if the admin bar isn't showing */
		if ( is_admin() || ! is_admin_bar_showing() ) {
			return;
		}

		/** Run all our needed action hooks */
		add_action( 'wp_enqueue_scripts', array( $this, 'css_styles' ) );
		add_filter( 'template_include', array( $this, 'save_current_page' ), 1000 );
		add_action( 'admin_bar_menu', array( $this, 'toolbar_items' ), 1000 );
		add_action( 'admin_bar_menu', array( $this, 'toolbar_items_info' ), 9999, 1 );

		/** Optional BuddyPress support */
		if ( class_exists( 'BuddyPress' ) ) {
			add_action( 'bp_core_pre_load_template', array( $this, 'save_buddypress_template' ) );
		}

		/** Template part hooks */
		add_action( 'all', array( $this, 'save_template_parts' ), 1, 3 );

	}  // end method


	/**
	 * Get the current page
	 *
	 * @since 1.4.7
	 *
	 * @return string Name of the template file.
	 */
	private function get_current_page() {

		return $this->template_name;

	}  // end method


	/**
	 * Check if file exists in child theme
	 *
	 * @since 1.4.7
	 *
	 * @uses get_stylesheet_directory()
	 *
	 * @param string $file
	 * @return bool TRUE if the file exists, FALSE otherwise.
	 */
	private function file_exists_in_child_theme( $file ) {

		return file_exists( get_stylesheet_directory() . '/' . $file );

	}  // end method


	/**
	 * Check if direct file editing through WordPress Theme/ Plugin Editor is
	 *   allowed.
	 *
	 * @since 1.4.7
	 *
	 * @return bool TRUE if file editing is allowed, FALSE otherwise.
	 */
	private function is_file_editing_allowed() {

		if ( ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT )
			|| ( defined( 'DISALLOW_FILE_MODS' ) && DISALLOW_FILE_MODS )
		) {
			return FALSE;
		}

		return TRUE;

	}  // end method


	/**
	 * Save the template parts in our local array.
	 *
	 * @since 1.4.7
	 *
	 * @uses get_template_directory()
	 * @uses get_stylesheet_directory()
	 * @uses locate_template()
	 *
	 * @param string $tag  Tag of the template part.
	 * @param null   $slug Slug of the template part (slug-based ones).
	 * @param null   $name Name of the template part (name-based ones).
	 * @return void
	 */
	public function save_template_parts( $tag, $slug = null, $name = null ) {

		/** Bail early if no template part tag to be found */
		if ( 0 !== strpos( $tag, 'get_template_part_' ) ) {
			return;
		}

		/** Check if template part slug is set */
		if ( $slug !== null ) {

			/** Set templates array */
			$templates = array();

			/** Add possible name-based template part to array */
			if ( $name !== null ) {
				$templates[] = "{$slug}-{$name}.php";
			}

			/** Add possible slug-based template part to array */
			$templates[] = "{$slug}.php";

			/** Get the correct template part */
			$template_part = str_replace( get_template_directory() . '/', '', locate_template( $templates ) );
			$template_part = str_replace( get_stylesheet_directory() . '/', '', $template_part );

			/** Add template part if found */
			if ( '' !== $template_part ) {
				$this->template_parts[] = $template_part;
			}

		}  // end if

	}  // end method


	/**
	 * Optionally: Save the BuddyPress template
	 *
	 * @since 1.4.7
	 *
	 * @uses get_template_directory()
	 * @uses get_stylesheet_directory()
	 *
	 * @param $template
	 */
	public function save_buddypress_template( $template ) {

		if ( '' == $this->template_name ) {

			$template_name       = $template;
			$template_name       = str_ireplace( get_template_directory() . '/', '', $template_name );
			$template_name       = str_ireplace( get_stylesheet_directory() . '/', '', $template_name );
			$this->template_name = $template_name;

		}  // end if

	}  // end method


	/**
	 * Save the current page in our local variable.
	 *   Includes support for the "Roots" theme as a special case.
	 *
	 * @since 1.4.7
	 *
	 * @uses \Roots\Sage\Wrapper\template_path()
	 *
	 * @param $template_name
	 * @return mixed
	 */
	public function save_current_page( $template_name ) {

		$this->template_name = wp_basename( $template_name );

		/** Special case: "Roots" theme */
		if ( function_exists( 'roots_template_path' ) ) {
			$this->template_name = wp_basename( roots_template_path() );
		} elseif ( function_exists( 'Roots\Sage\Wrapper\template_path' ) ) {
			$this->template_name = wp_basename( Roots\Sage\Wrapper\template_path() );
		}

		return $template_name;

	}  // end method


	/**
	 * Add the Toolbar items to show the current template file name/ info.
	 *
	 * @since 1.4.7
	 *
	 * @uses ddw_tbex_item_title_with_icon()
	 *
	 * @param object $admin_bar Object of Toolbar nodes.
	 */
	public function toolbar_items( $admin_bar ) {

		/** Check if direct file editing is allowed */
		$edit_allowed = $this->is_file_editing_allowed();

		/** Add main item, top-level */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-current-template-file',
				//'parent' => 'top-secondary',
				'title'  => ddw_tbex_item_title_with_icon( esc_attr__( 'What Template', 'toolbar-extras' ), 'editor-help' ),
				'href'   => FALSE,
				'meta'   => array(
					'title' => esc_attr__( 'What current Template gets loaded from WordPress?', 'toolbar-extras' ),
				)
			)
		);

		/** Check if template file exists in child theme */
		$theme = get_stylesheet();

		if ( ! $this->file_exists_in_child_theme( $this->get_current_page() ) ) {
			$theme = get_template();
		}

		/** Add current page where user is on - output template file name */
		$title_for_template_name = sprintf(
			'%s: <span class="tbex-template-file-name">%s</span>',
			esc_attr__( 'Template', 'toolbar-extras' ),
			$this->get_current_page()
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-current-template-file-name',
				'parent' => 'tbex-current-template-file',
				'title'  => $title_for_template_name,	// $this->get_current_page(),
				'href'   => ( ( $edit_allowed ) ? esc_url( network_admin_url( 'theme-editor.php?file=' . $this->get_current_page() . '&theme=' . $theme ) ) : FALSE ),
				'meta'   => array(
					'class'  => 'tbex-item-template-file-name',
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Template for Current Page - via WordPress Template Hierarchy', 'toolbar-extras' ),
				)
			)
		);

		/** Optionally add templarts as sub items (if theme uses such parts) */
		if ( count( $this->template_parts ) > 0 ) {

			// Add template parts menu item
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-current-template-file-template-parts',
					'parent' => 'tbex-current-template-file',
					'title'  => esc_attr__( 'Template Parts', 'toolbar-extras' ),
					'href'   => FALSE,
					'meta'   => array(
					'title' => esc_attr__( 'Currently used/ included Template Parts', 'toolbar-extras' ),
				)
				)
			);

			// Loop through template parts
			foreach ( $this->template_parts as $template_part ) {

				// Check if template part exists in child theme
				$theme = get_stylesheet();

				if ( ! $this->file_exists_in_child_theme( $template_part ) ) {
					$theme = get_template();
				}

				// Add template part to sub menu item
				$admin_bar->add_node(
					array(
						'id'     => 'tbex-current-template-file-template-parts-' . $template_part,
						'parent' => 'tbex-current-template-file-template-parts',
						'title'  => '<span class="tbex-template-file-name">' . $template_part . '</span>',
						'href'   => ( ( $edit_allowed ) ? esc_url( network_admin_url( 'theme-editor.php?file=' . $template_part . '&theme=' . $theme ) ) : FALSE ),
						'meta'   => array(
							'class'  => 'tbex-item-template-file-name',
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Included Template Part', 'toolbar-extras' ),
						)
					)
				);

			}  // end foreach

		}  // end if

	}  // end method


	/**
	 * Add additional info sub items to the (above) "What Template" main item.
	 *
	 * @since 1.4.7
	 *
	 * @uses WP_Theme()->parent()
	 *
	 * @param object $admin_bar Object of Toolbar nodes.
	 */
	public function toolbar_items_info( $admin_bar ) {

		/** Prepare relative path */
		$template_file_name     = wp_basename( $GLOBALS[ 'template' ] );
		$template_relative_path = str_replace( ABSPATH . 'wp-content/', '', $GLOBALS[ 'template' ] );

		/**
		 * Necessary additional step that is needed for long path and/or file
		 *   names from plugins (!) and (child) themes:
		 */
		$template_relative_path = str_replace( '/', '/<wbr>', $template_relative_path );

		/** Prepare theme logic */
		$current_theme      = wp_get_theme();
		$current_theme_name = $current_theme->Name;
		$parent_theme_name  = '';
		$parent_or_child    = '';

		/** Detect if is child theme */
		if ( is_child_theme() ) {

			$child_theme_name = sprintf(
				'%s %s',
				esc_attr__( 'Theme name:', 'toolbar-extras' ),
				$current_theme_name
			);

			$parent_theme_name = $current_theme->parent()->Name;
			$parent_theme_name = sprintf(
				/* translators: %s - name of the Parent Theme, for example "Genesis" */
				__( 'Child of %s', 'toolbar-extras' ),
				$parent_theme_name
			);

			$parent_or_child = $child_theme_name . $parent_theme_name;

		} else {

			$parent_or_child = sprintf(
				'%s %s (%s)',
				esc_attr__( 'Theme name:', 'toolbar-extras' ),
				$current_theme_name,
				esc_attr__( 'NOT a child theme', 'toolbar-extras' )
			);

		}  // end if

		/** Sub item 1: Template relative path */
		$title_relative_path = sprintf(
			'%s <br /><div class="show-template-name">%s</div>',
			esc_attr__( 'Template relative path:', 'toolbar-extras' ),
			$template_relative_path
		);

		$admin_bar->add_node(
			array(
				'id'	 => 'tbex-template-file-relative-path',
				'parent' => 'tbex-current-template-file',
				'title'	 => $title_relative_path,
				'href'   => FALSE,
				'meta'   => array(
					'class' => 'tbex-show-template-relative-path',
				)
			)
		);

		/** Sub item 2: Theme relation - parent or child */
		$admin_bar->add_node(
			array(
				'id'	 => 'tbex-template-file-theme-relation',
				'parent' => 'tbex-current-template-file',
				'title'	 => $parent_or_child,
				'href'   => FALSE,
			)
		);

	}  // end method


	/**
	 * Add the necessary CSS styles as inline styles for the added items.
	 *
	 * @since 1.4.7
	 *
	 * @uses wp_add_inline_style()
	 */
	public function css_styles() {

		$inline_css = '
			#wp-admin-bar-tbex-current-template-file.hover > .ab-item {
				background-color: #32373c !important;
			}

			.tbex-item-template-file-name > .ab-item,
			#wp-admin-bar-tbex-current-template-file-name > .ab-item,
			#wp-admin-bar-tbex-current-template-file-template-parts-default li > .ab-item,
			li[id*="template-parts"] > .ab-item {
				display: flex;
				/* width: 200px; */
			}

			.tbex-item-template-file-name .tbex-template-file-name,
			#wp-admin-bar-tbex-current-template-file-name .tbex-template-file-name,
			li[id*="template-parts"] .tbex-template-file-name {
				background: #55595c;
				/* font-family: monospace; */
				font-size: 11px !important;
				line-height: 9px !important;
				margin-top: 6px !important;
				padding: 4px 8px !important;
				border-radius: 3px !important;
			}

			#wp-admin-bar-tbex-current-template-file-name .tbex-template-file-name {
				margin-left: 3px;
			}

			.ab-top-secondary #wp-admin-bar-tbex-current-template-file #wp-admin-bar-tbex-current-template-file-name .ab-item,
			.ab-top-secondary #wp-admin-bar-tbex-current-template-file #wp-admin-bar-tbex-current-template-file-template-parts {
				text-align: right;
			}

			.ab-top-secondary #wp-admin-bar-tbex-current-template-file-template-parts.menupop > .ab-item:before {
				right: auto !important;
			}


			/* For the theme info sub items */

			#wpadminbar .show-template-name,
			#wpadminbar .hover .show-template-name {
				font-family: monospace;
				text-shadow: none;
			}

			#wpadminbar .hover .show-template-name:hover {
				color: #2ea2cc;
			}

			.tbex-show-template-relative-path .ab-item,
			.tbex-show-template-relative-path .show-template-name {
				display: inline-block !important;
			}

			.tbex-show-template-relative-path .show-template-name {
				line-height: 15px !important;
				margin-left: 10px !important;
				white-space: pre-wrap !important;
			}';

		wp_add_inline_style( 'admin-bar', $inline_css );

	}  // end method

}  // end of class
