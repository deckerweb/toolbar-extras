<?php

// includes/functions-global

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Return array of registered Page Builders and their arguments.
 *
 * Plugins and themes can hook into the 'tbex_filter_get_pagebuilders' filter to
 *   register their own builders.
 *
 * @since 1.0.0
 * @since 1.4.2 Enhanced the array with more arguments.
 *
 * @return array Filterable array of registered Page Builders.
 */
function ddw_tbex_get_pagebuilders() {

	/** Set builders array */
	$builders = array(
		'default-none' => array(
			'label'       => esc_attr__( 'No Page Builder registered', 'toolbar-extras' ),
			'title'       => '',
			'title_attr'  => '',
			'admin_url'   => '',
			'color'       => '',
			'color_name'  => '',
			'plugins_tab' => FALSE,
		),
	);

	/** Allow the array to be filtered (= adding more builders) */
	$builders = (array) apply_filters( 'tbex_filter_get_pagebuilders', $builders );

	/** Escape the values of the array */
	foreach ( $builders as $pagebuilder ) {

		$pagebuilder[ 'label' ]       = esc_attr( $pagebuilder[ 'label' ] );
		$pagebuilder[ 'title' ]       = esc_attr( $pagebuilder[ 'title' ] );
		$pagebuilder[ 'title_attr' ]  = esc_html( $pagebuilder[ 'title_attr' ] );
		$pagebuilder[ 'admin_url' ]   = esc_url( $pagebuilder[ 'admin_url' ] );
		$pagebuilder[ 'color' ]       = sanitize_hex_color( $pagebuilder[ 'color' ] );
		$pagebuilder[ 'color_name' ]  = esc_attr( $pagebuilder[ 'color_name' ] );
		$pagebuilder[ 'plugins_tab' ] = (bool) $pagebuilder[ 'plugins_tab' ];

	}  // end foreach

	/** Return registered builders */
	return (array) $builders;

}  // end function


/**
 * Check if a Page Builder is registered.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_pagebuilders()
 *
 * @param string $builder Key of checked Page Builder.
 * @return bool TRUE if checked builder is in the registered array, FALSE
 *              otherwise.
 */
function ddw_tbex_is_pagebuilder_registered( $builder = '' ) {

	$all_builders = (array) ddw_tbex_get_pagebuilders();

	return array_key_exists( sanitize_key( $builder ), $all_builders );

}  // end function


/**
 * Is a supported Page Builder plugin registered ("active") or not?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_pagebuilders()
 *
 * @return bool TRUE if a Page Builder is "active", FALSE otherwise.
 */
function ddw_tbex_is_pagebuilder_active() {

	$all_builders = (array) ddw_tbex_get_pagebuilders();
	$all_builders = array_filter( $all_builders );

	return ( ! empty( $all_builders ) ) ? TRUE : FALSE ;

}  // end function


/**
 * Get the default Page Builder which was set in plugin's settings.
 *
 * @since 1.0.0
 * @since 1.4.0 Added settings integration
 *
 * @return string ID of default Page Builder.
 */
function ddw_tbex_get_default_pagebuilder() {

	$builder = ddw_tbex_get_option( 'general', 'default_page_builder' );

	return sanitize_key( apply_filters( 'tbex_filter_default_pagebuilder', $builder ) );

}  // end function


/**
 * Get all registered color items with key, color and name (label).
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_get_pagebuilders()
 *
 * @return array Filterable array of color codes and labels.
 */
function ddw_tbex_get_color_items() {

	$builders = (array) ddw_tbex_get_pagebuilders();

	$default_colors = array(
		'default-blue'   => array(
			'color' => '#0073aa',
			'name'  => __( 'Default Blue', 'toolbar-extras' ),
		),
		'default-orange' => array(
			'color' => '#ff8c00',
			'name'  => __( 'Default Orange', 'toolbar-extras' ),
		),
		'tbex-purple'    => array(
			'color' => '#7e49c2',
			'name'  => __( 'Toolbar Extras Purple', 'toolbar-extras' ),
		),
	);

	$builder_colors = array();

	foreach ( $builders as $builder => $builder_data ) {

		if ( empty( $builder_data[ 'color' ] ) ) {
			continue;
		}

		$builder_colors[ $builder ] = array(
			'color' => $builder_data[ 'color' ],
			'name'  => $builder_data[ 'color_name' ],
		);

	}  // end foreach

	return apply_filters(
		'tbex_filter_color_items',
		array_merge( $default_colors, $builder_colors )
	);

}  // end function


//ddw_tbex_local_dev_color_picker_items
add_action( 'tbex_settings_color_picker_items', 'ddw_tbex_settings_color_picker_items' );
/**
 * Display color items on the settings tab "For Development" in the "Local
 *   Development Environment" section.
 *
 *   This is completely dynamic, based on the registered default color items,
 *   and any items from registered Page Builders, as well as additional items
 *   via the included filter 'tbex_filter_color_items'.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_get_color_items()
 *
 * @return string Markup and string for color code/ label display.
 */
function ddw_tbex_settings_color_picker_items() {

	$color_items = (array) ddw_tbex_get_color_items();

	$output = '';

	foreach ( $color_items as $color => $color_data ) {

		$color_code = sprintf(
			'<div class="bg-local-base bg-local-%1$s tbex-align-middle"></div><code class="tbex-align-middle">%2$s</code>',
			sanitize_key( $color ),
			sanitize_hex_color( $color_data[ 'color' ] )
		);

		$output .= sprintf(
			/* translators: %s - a color code in HEX notation, for example: #555d66 */
			'<div class="tbex-color-item"><span class="description tbex-space-top" title="%1$s">%1$s: %2$s</span></div>',
			esc_attr( $color_data[ 'name' ] ),
			$color_code
		);

	}  // end foreach

	$output .= '<div class="clear"></div>';

	echo $output;

}  // end function


/**
 * To get filterable hook priority for main item.
 *   Default: 71 - that means after "New Content" Group.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return int Hook priority for main item.
 */
function ddw_tbex_main_item_priority() {

	return absint(
		apply_filters(
			'tbex_filter_main_item_priority',
			ddw_tbex_get_option( 'general', 'main_item_priority' )	// 71
		)
	);

}  // end function


/**
 * Helper: ID string for Toolbar Extras own main item.
 *
 * @since 1.0.0
 *
 * @return string ID of main item.
 */
function ddw_tbex_id_main_item() {

	return strtolower(
		sanitize_html_class(
			apply_filters(
				'tbex_filter_id_main_item',
				'tbex-toolbar-extras'
			),
			'tbex-toolbar-extras'	// fallback
		)
	);

}  // end function


/**
 * Helper: Parent ID string for our own Site Group to hook in.
 *
 * @since 1.0.0
 *
 * @return string ID of site group item.
 */
function ddw_tbex_parent_id_site_group() {

	return strtolower(
		sanitize_html_class(
			apply_filters(
				'tbex_filter_parent_id_site_group',
				'site-name'
			),
			'site-name'		// fallback
		)
	);

}  // end function


/**
 * Helper: ID string for Sites Browser/ Demo Import item.
 *
 * @since 1.0.0
 *
 * @return string ID of "site-browser" item.
 */
function ddw_tbex_id_sites_browser() {

	return strtolower(
		sanitize_html_class(
			apply_filters(
				'tbex_filter_id_sites_browser',
				'tbex-sites-browser'
			),
			'tbex-sites-browser'	// fallback
		)
	);

}  // end function


/**
 * To get filterable hook priority for "Website Settings" item in the Site Group.
 *   Default: 32 - that means after "Dashboard" and "Visit Store" items.
 *
 * @since 1.4.7
 *
 * @return int Hook priority for "Website Settings" item.
 */
function ddw_tbex_website_settings_item_priority() {

	return absint(
		apply_filters(
			'tbex_filter_website_settings_item_priority',
			32
		)
	);

}  // end function


/**
 * Helper: URL Meta - Rel Tag
 *
 * @since 1.0.0
 *
 * @return string URL rel tag.
 */
function ddw_tbex_meta_rel() {

	return strtolower(
		esc_attr(
			apply_filters(
				'tbex_filter_meta_rel',
				'nofollow noopener noreferrer'
			)
		)
	);

}  // end function


/**
 * Helper: URL Meta - Target Tag
 *
 * @since 1.0.0
 * @since 1.3.0 Added $tools param to support "Builder" link setting.
 *
 * @uses ddw_tbex_get_option()
 *
 * @param string $tool The tool the meta target should be used for.
 * @return string URL link target tag.
 */
function ddw_tbex_meta_target( $tool = '' ) {

	$target = ( 'yes' === ddw_tbex_get_option( 'general', 'external_links_blank' ) ) ? '_blank' : '_self';

	if ( 'builder' === sanitize_key( $tool ) ) {
		$target = ( 'yes' === ddw_tbex_get_option( 'general', 'builder_links_blank' ) ) ? '_blank' : '_self';
	}

	return strtolower(
		esc_attr(
			apply_filters(
				'tbex_filter_meta_target',
				$target
			)
		)
	);

}  // end function


/**
 * Helper: Build Toolbar item title with needed HTML/CSS Code for a Dashicon.
 *   The icon is set via CSS styling (static).
 *
 * @since 1.0.0
 * @since 1.4.7 Added optional $icon param for a Dashicon icon ID.
 *
 * @param string $string Title string
 * @return string HTML markup, including item title.
 */
function ddw_tbex_item_title_with_icon( $string = '', $icon = '' ) {

	$icon = ! empty( $icon ) ? ' tbex-title-icon dashicons-before dashicons-' . sanitize_key( $icon ) : '';

	$output = sprintf(
		'<span class="ab-icon%s"></span><span class="ab-label">%s</span>',
		$icon,
		esc_attr( $string )
	);

	return apply_filters(
		'tbex_filter_item_title_with_icon',
		$output
	);

}  // end function


/**
 * Helper: Build Toolbar item title with needed HTML/CSS Code for a Dashicon.
 *   The icon is set dynamically via the plugin's settings.
 *
 * @since 1.0.0
 * @since 1.4.0 Added additional function param $class for a CSS class;
 *              added $option_key as param for the filter; added additional CSS
 *              class to the markup;
 *
 * @uses ddw_tbex_get_option()
 *
 * @param string $string        Title string
 * @param string $settings_type Type of settings section
 * @param string $option_key    Option key to check for
 * @return string HTML markup, including item title.
 */
function ddw_tbex_item_title_with_settings_icon( $string = '', $settings_type = '', $option_key = '', $class = '' ) {

	$output = sprintf(
		'<span class="dashicons-before %1$s ab-icon tbex-settings-icon %3$s"></span><span class="ab-label">%2$s</span>',
		ddw_tbex_get_option( sanitize_key( $settings_type ), sanitize_key( $option_key ) ),
		esc_attr( $string ),
		sanitize_html_class( $class )
	);

	return apply_filters(
		'tbex_filter_item_title_with_settings_icon',
		$output,
		$settings_type,		// additional param
		$option_key			// additional param
	);

}  // end function


/**
 * Get all Elementor template types as an array.
 *   Note: Filter 'tbex_filter_elementor_template_types' allows for plugins to
 *         add or remove template types.
 *
 * @since 1.1.0
 * @since 1.4.0 Added Popup template type.
 *
 * @return array Array of Elementor template types.
 */
function ddw_tbex_get_elementor_template_types() {

	$template_types = apply_filters(
		'tbex_filter_elementor_template_types',
		array( 'page', 'section', 'popup', 'header', 'footer', 'single', 'archive', 'product', 'product-archive', )
	);

	return array_map( 'sanitize_key', $template_types );

}  // end function


/**
 * Create an "Add New" link for an Elementor Library Template Type, including
 *   the setting of a template type.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_get_elementor_template_types()
 * @uses \Elementor\Utils::get_create_new_post_url()
 *
 * @param string $type Key of the Elementor template type.
 * @return string URL for adding a new Elementor template, containing the proper
 *                template type plus the security nonce.
 */
function ddw_tbex_get_elementor_template_add_new_url( $type = '' ) {

	/** Fallback to template type 'page' if type parameter is no supported type or is empty */
	if ( ! in_array( $type, ddw_tbex_get_elementor_template_types() ) || empty( $type ) ) {
		$type = 'page';
	}

	/** Create "Add New" URL using Elementor core method */
	$create_new_post_url = \Elementor\Utils::get_create_new_post_url( 'elementor_library' );
	$create_new_post_url = add_query_arg( 'template_type', sanitize_key( $type ), $create_new_post_url );

	/** Return the proper URL */
	return esc_attr( $create_new_post_url );

}  // end function


/**
 * Restrict editing access of special custom "Super Admin Admin" toolbar menu.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_restrict_nav_menu_edit_access()
 */
function ddw_tbex_restrict_super_admin_menu_access() {

	ddw_tbex_restrict_nav_menu_edit_access(
		'tbex_menu',			// Menu ID/location
		'edit_theme_options'	// capability
	);

}  // end function


/**
 * Get the ID of a nav menu that is set to one of our special menu locations.
 *
 * @since 1.0.0
 *
 * @uses get_nav_menu_locations()
 *
 * @param string $single_menu_location ID string of Menu location
 * @return string String of nav menu ID if menu set to menu location,
 *                otherwise empty string.
 */
function ddw_tbex_get_menu_id_from_menu_location( $single_menu_location ) {

	$menu_id = '';

	/** Get menu locations */
	$menu_locations = get_nav_menu_locations();

	/** Check our special location */
	if ( isset( $menu_locations[ esc_attr( $single_menu_location ) ] ) ) {

		/** Get ID of nav menu */
		$menu_id = absint( $menu_locations[ esc_attr( $single_menu_location ) ] );

	} // end if

	/** Return ID of nav menu */
	return $menu_id;

}  // end function


/**
 * In Multisite context keep (Site) 'administrator' users from editing this
 *   special admin menu.
 *
 * NOTE I:  Eventually, the real blocking depends on (filterable)
 *          'edit_theme_options' cap.
 * NOTE II: Super admins have full access, of course! :)
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_menu_id_from_menu_location()
 * @uses ddw_tbex_string_toolbar_extras()
 *
 * @param string $single_menu_location ID string of Menu location
 * @param string $checked_capability   ID of capability which gets checked
 *
 * @global object $GLOBALS[ 'pagenow' ]
 */
function ddw_tbex_restrict_nav_menu_edit_access( $single_menu_location, $checked_capability ) {

	/** Bail early if current user is Super Admin (who can always edit) */
	if ( is_super_admin() ) {
		return;
	}

	$menu_id = absint( ddw_tbex_get_menu_id_from_menu_location( esc_attr( $single_menu_location ) ) );

	/**
	 * Only for admin users remove edit access to the appended restricted admin menu.
	 *  - only in edit menu context for nav-menus.php
	 *  - only for the ID of the menu appended to our menu location.
	 */
	if ( ( current_user_can( esc_attr( $checked_capability ) ) )
		&& 'nav-menus.php' === $GLOBALS[ 'pagenow' ]
		&& (
				isset( $_GET[ 'action' ] )
				&& 'edit' === sanitize_key( wp_unslash( $_GET[ 'action' ] ) )
			)
		&& (
				isset( $_GET[ 'menu' ] )
				&& $menu_id === absint( $_GET[ 'menu' ] )
			)
	) {

		$tbex_deactivation_message = __( 'You have no sufficient permission to edit this special menu.', 'toolbar-extras' );

		wp_die(
			$tbex_deactivation_message,
			__( 'Plugin', 'toolbar-extras' ) . ': ' . ddw_tbex_string_toolbar_extras(),
			array( 'back_link' => TRUE )
		);

	}  // end if

}  // end function


/**
 * Get German-based informal locales for re-use.
 *
 * @since 1.0.0
 *
 * @return array Filterable array of German-based informal locales.
 */
function ddw_tbex_get_german_informal_locales() {

	return apply_filters(
		'tbex_filter_german_informal_locales',
		array(
			'de_DE', 'de_DE_informal',
			'de_AT', 'de_AT_informal',
			'de_CH', 'de_CH_informal', 'gsw',
			'de_LU', 'de_LU_informal',
		)
	);

}  // end function


/**
 * Get German-based formal locales for re-use.
 *
 * @since 1.0.0
 *
 * @return array Filterable array of German-based formal locales.
 */
function ddw_tbex_get_german_formal_locales() {

	return apply_filters(
		'tbex_filter_german_formal_locales',
		array(
			'de_DE_formal', 'de_DE_Sie', 'de_DE_sie',
			'de_AT_formal', 'de_AT_Sie', 'de_AT_sie',
			'de_CH_formal', 'de_CH_Sie', 'de_CH_sie',
			'de_LU_formal', 'de_LU_Sie', 'de_LU_sie',
		)
	);

}  // end function


/**
 * Get German-based locales for re-use.
 *
 * @since 1.0.0
 *
 * @return array Merged array of German-based locales.
 */
function ddw_tbex_get_german_locales() {

	return array_merge( ddw_tbex_get_german_informal_locales(), ddw_tbex_get_german_formal_locales() );

}  // end function


//add_action( 'plugins_loaded', 'ddw_tbex_is_german', 1 );
/**
 * Helper function to determine if in a German locale based environment.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_german_locales()
 * @uses get_option()
 * @uses get_site_option()
 * @uses get_locale()
 * @uses ICL_LANGUAGE_CODE Constant of WPML premium plugin, if defined.
 *
 * @return bool If German-based locale, return TRUE, FALSE otherwise.
 */
function ddw_tbex_is_german() {

	/** Set array of German-based locale codes */
	$german_locales = (array) ddw_tbex_get_german_locales();

	/** Get possible WPLANG option values */
	$option_wplang      = get_option( 'WPLANG' );
	$site_option_wplang = get_site_option( 'WPLANG' );

	/**
	 * Check for German-based environment/ context in locale/ WPLANG setting
	 *    and/ or within WPML (premium plugin).
	 *
	 * NOTE: This is very important for multilingual sites and/or Multisite
	 *       installs.
	 */
	if ( ( in_array( get_locale(), $german_locales )
				|| ( $option_wplang && in_array( $option_wplang, $german_locales ) )
				|| ( $site_option_wplang && in_array( $site_option_wplang, $german_locales ) )
			)
			|| ( defined( 'ICL_LANGUAGE_CODE' ) && ( 'de' == ICL_LANGUAGE_CODE ) )
	) {

		/** Yes, we are in German-based environmet */
		return TRUE;

	} else {

		/** Non-German! */
		return FALSE;

	}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_remove_tooltips_title_attr', 99999 );
/**
 * Optionally remove all link title attributes (Tooltips) from the Toolbar - for
 *   all items, including those from Toolbar Extras plugin.
 *   Note: The filter function is iterating through all Toolbar nodes and sets
 *         the title attribute to empty (which is the WP default also)
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_display_link_title_attributes()
 *
 * @param object $wp_admin_bar Object of Toolbar holding all nodes.
 * @return object|void
 */
function ddw_tbex_remove_tooltips_title_attr( $wp_admin_bar ) {

	/** Bail early if Tooltip display is wanted */
	if ( ddw_tbex_display_link_title_attributes() ) {
		return $wp_admin_bar;
	}

	/** Get all nodes */
	$all_toolbar_nodes = $wp_admin_bar->get_nodes();

	/** Go through all nodes */
	foreach ( $all_toolbar_nodes as $node ) {

		$node = array(
			'id'     => $node->id,
			'parent' => $node->parent,
			'meta'   => array(
				'title' => '',
			)
		);

		/** Update all Toolbar nodes */
		$wp_admin_bar->add_node( $node );

	}  // end foreach

}  // end function


/**
 * Get the default editor type: "Blocks" (Gutenberg) or Classic.
 *
 * @since 1.4.0
 * @todo Settings integration!
 */
function ddw_tbex_get_default_editor_type() {

	return ddw_tbex_is_block_editor_active() ? 'blocks' : 'classic';

}  // end function


/**
 * Provide link string/ markup for a custom URL setting - used on plugin's
 *   settings page.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_option() Gets option value; sanitizes its params.
 *
 * @param string $type       Type of plugin options to check for.
 * @param string $option_key Option key in the settings array.
 * @return string Link markup for URL value (option key from the database).
 */
function ddw_tbex_custom_url_test( $type = '', $option_key = '' ) {

	$url = ddw_tbex_get_option(
		sanitize_key( $type ),
		sanitize_key( $option_key )
	);

	$url_testing = '';

	if ( ! empty( $url ) ) {

		$url_testing = sprintf(
			'<a href="%s" target="_blank" rel="nofollow noopener noreferrer" title="%s"><span class="dashicons dashicons-external" style="text-decoration: none; vertical-align: middle;"></span></a> &nbsp; ',
			esc_url( $url ),
			esc_attr__( 'Test this custom URL', 'toolbar-extras' )
		);

	}  // end if

	return $url_testing;

}  // end function


/**
 * Add additional color wheel resources to certain add-ons for color palettes.
 *
 * @since 1.4.0
 * @since 1.4.2 Added Cloudflare Color Tools.
 *
 * @param string $suffix String for suffix for Toolbar node ID and group ID.
 * @param string $parent String for Toolbar parent node.
 * @return void|object $GLOBALS[ 'wp_admin_bar' ] object to build new Toolbar nodes.
 */
function ddw_tbex_resources_color_wheel( $suffix = '', $parent = '' ) {

	/** Bail early if no resources display wanted */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	/** Create group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-resources-colorwheel' . $suffix,
			'parent' => sanitize_key( $parent ),
		)
	);

		/** Adobe Color CC */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cw-resource-adobe-colorcc' . $suffix,
				'parent' => 'group-resources-colorwheel' . $suffix,
				'title'  => esc_attr__( 'Color Wheel &amp; Color Schemes', 'toolbar-extras' ),
				'href'   => 'https://color.adobe.com/create/color-wheel/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Color Wheel &amp; Color Schemes', 'toolbar-extras' ) . ' - ' . 'Adobe Color CC'
				)
			)
		);

		/** Paletton.com */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cw-resource-paletton' . $suffix,
				'parent' => 'group-resources-colorwheel' . $suffix,
				'title'  => esc_attr__( 'Color Scheme Designer', 'toolbar-extras' ),
				'href'   => 'http://paletton.com/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Color Scheme Designer', 'toolbar-extras' ) . ' - ' . 'paletton.com'
				)
			)
		);

		/** Cloudflare Design - Color */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'cw-resource-cloudflare' . $suffix,
				'parent' => 'group-resources-colorwheel' . $suffix,
				'title'  => esc_attr__( 'Color Tools', 'toolbar-extras' ),
				'href'   => 'https://cloudflare.design/color/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Color Tools', 'toolbar-extras' ) . ' - ' . 'Cloudflare Design'
				)
			)
		);

}  // end function


/**
 * Helper function to get all pages (post objects) with a certain Shortcode in
 *   their content.
 *
 * @since 1.4.5
 *
 * @link https://advent.squareonemd.co.uk/find-pages-using-given-wordpress-shortcode/
 *
 * @param string $shortcode The given Shortcode to check for.
 * @param array  $args      Additional WP_Query arguments.
 * @return array Array of pages as post objects.
 */
function ddw_tbex_get_pages_with_shortcode( $shortcode, $args = array() ) {

	$shortcode = sanitize_key( $shortcode );

	/** Bail early if Shortcode was not yet registered */
    if ( ! shortcode_exists( $shortcode ) ) {
        return null;
    }

    $pages = get_pages( $args );
    $list  = array();

    foreach ( $pages as $page ) {

        if ( has_shortcode( $page->post_content, $shortcode ) ) {
            $list[] = $page;
        }

    }  // end foreach

    return $list;

}  // end function


/**
 * Mark up content with code tags.
 *
 *  Note: Escapes all HTML, so `<` gets changed to `&lt;` and displays correctly.
 *
 * @since 1.4.7
 *
 * @param string $content Content to be wrapped in code tags.
 * @return string Content wrapped in `code` tags.
 */
function ddw_tbex_code( $content ) {

	return '<code>' . esc_html( $content ) . '</code>';

}  // end function


/**
 * Mark up content for explanation with abbr tags.
 *
 *  Note: Escapes all HTML, so `<` gets changed to `&lt;` and displays correctly.
 *
 * @since 1.4.7
 *
 * @param string $abbr    Explanation for $content.
 * @param string $content Content to be wrapped in abbr tags.
 * @return string Content with explanation wrapped in `abbr` tags.
 */
function ddw_tbex_abbr( $abbr, $content ) {

	return sprintf(
		'<abbr title="%s">%s</abbr>',
		esc_html( $abbr ),
		wp_kses_post( $content )
	);

}  // end function


/**
 * Helper function for creating easy & simple admin plugin install links.
 *
 * @since  1.4.7
 *
 * @param string $plugin_slug String of WordPress.org plugin slug.
 * @return string String of WordPress.org plugin install link within admin.
 */
function ddw_tbex_plugin_install_link( $plugin_slug = '' ) {

	$plugin_slug = sanitize_key( $plugin_slug );
	$install_url = '';

	if ( is_main_site() ) {

		$install_url = network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug . '&TB_iframe=true&width=800&height=550' );

	} else {

		$install_url = admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug . '&TB_iframe=true&width=800&height=550' );

	}  // end if

	return esc_url( $install_url );

}  // end function


/**
 * Conditionally the suffix based on environment, to add to any of our enqueued
 *   stylesheets.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_is_wp_dev_mode()
 *
 * @return string Suffix to add to our enqueued stylesheets.
 */
function ddw_tbex_get_styles_suffix() {

	return ddw_tbex_is_wp_dev_mode() ? '' : '.min';

}  // end function
