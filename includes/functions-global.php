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
 * Get an option value from our settings array from the WordPress options table.
 *
 * @since 1.0.0
 *
 * @param string $type Type of plugin options to check for.
 * @param string $option_key Option key in the settings array.
 * @return mixed Value of the option key in the database.
 */
function ddw_tbex_get_option( $type = '', $option_key = '' ) {

	$type   = sanitize_key( $type );
	$option = get_option( 'tbex-options-' . $type );

	return $option[ sanitize_key( $option_key ) ];

}  // end function


/**
 * Setting internal plugin helper values.
 *
 * @since 1.0.0
 * @since 1.4.0 Added additional values.
 * @since 1.4.2 Added additional values.
 *
 * @return array $tbex_info Array of info values.
 */
function ddw_tbex_info_values() {

	/** Get current user */
	$user = wp_get_current_user();

	/** Build Newsletter URL */
	$url_nl = sprintf(
		'https://deckerweb.us2.list-manage.com/subscribe?u=e09bef034abf80704e5ff9809&amp;id=380976af88&amp;MERGE0=%1$s&amp;MERGE1=%2$s',
		esc_attr( $user->user_email ),
		esc_attr( $user->user_firstname )
	);

	$tbex_info = array(

		'url_translate'     => 'https://translate.wordpress.org/projects/wp-plugins/toolbar-extras',
		'url_wporg_faq'     => 'https://wordpress.org/plugins/toolbar-extras/#faq',
		'url_wporg_forum'   => 'https://wordpress.org/support/plugin/toolbar-extras',
		'url_wporg_review'  => 'https://wordpress.org/support/plugin/toolbar-extras/reviews/?filter=5/#new-post',
		'url_wporg_profile' => 'https://profiles.wordpress.org/daveshine/',
		'url_wporg_more'    => 'https://wordpress.org/plugins/search.php?q=toolbar',
		'url_fb_group'      => 'https://www.facebook.com/groups/ToolbarExtras/',
		'url_ddw_series'    => 'https://wordpress.org/plugins/tags/ddwtoolbar',
		'url_snippets'      => 'https://toolbarextras.com/docs-category/custom-code-snippets/',

		'author'            => __( 'David Decker - DECKERWEB', 'toolbar-extras' ),
		'author_uri'        => 'https://deckerweb.de/',
		'author_avatar'     => plugins_url( '/assets/images/plugin-author.jpg', dirname( __FILE__ ) ),
		'author_gravatar'   => 'https://s.gravatar.com/avatar/37f92a97dd59cb35be4f86f3e6b56309?s=',		// size defined at usage!
		'plugin_icon_png'   => plugins_url( '/assets/images/tbex-icon.png', dirname( __FILE__ ) ),
		'plugin_icon_svg'   => plugins_url( '/assets/images/tbex-icon.svg', dirname( __FILE__ ) ),
		'license'           => 'GPL-2.0-or-later',
		'url_license'       => 'https://opensource.org/licenses/GPL-2.0',
		'first_code'        => '2012',

		'url_donate'        => 'https://www.paypal.me/deckerweb',
		'url_patreon'       => 'https://www.patreon.com/deckerweb',
		'url_newsletter'    => $url_nl,
		'url_plugin'        => 'https://toolbarextras.com/',
		'url_plugin_docs'   => 'https://toolbarextras.com/docs/',
		'url_plugin_faq'    => 'https://toolbarextras.com/docs-category/faqs/',
		'url_addons'        => 'https://toolbarextras.com/addons/',
		'url_addons_docs'   => 'https://toolbarextras.com/docs-category/add-ons/',
		'url_github'        => 'https://github.com/deckerweb/toolbar-extras',
		'url_github_issues' => 'https://github.com/deckerweb/toolbar-extras/issues',
		'url_github_follow' => 'https://github.com/deckerweb',
		'url_roadmap'       => 'https://trello.com/b/JrpjwlX4/toolbar-extras-public-roadmap',

		'url_video_intro'   => 'https://www.youtube.com/watch?v=fdDG19Sk0is',
		'url_video_tour'    => '//www.youtube-nocookie.com/embed/fdDG19Sk0is?rel=0&TB_iframe=true&width=1024&height=576',	// for Thickbox, embed version, no cookies!
		'url_video_channel' => 'https://www.youtube.com/channel/UCaAPlEcIcWaxW733FvO2CCw',
		'url_video_plist'   => 'https://www.youtube.com/playlist?list=PL5-Wf0C0GRoyAQs3AY2IgmZoFe9l63Ei_',
		'url_menu_screen'   => 'https://ps.w.org/toolbar-extras/assets/screenshot-21.png',	//'https://www.dropbox.com/s/7u83c0g5ehk4ozq/screenshot-5.png',
		'url_tb_admin'      => 'https://www.dropbox.com/s/vxypca8r5jnjj3c/toolbar-groups-admin.png?dl=0',
		'url_tb_frontend'   => 'https://www.dropbox.com/s/juh4dzfmfrsm6v7/toolbar-groups-frontend.png?dl=0',

		'url_instagram'     => 'https://www.instagram.com/toolbarextras',
		'url_twitter'       => 'https://twitter.com/deckerweb',
		'url_twitter_tbex'  => 'https://twitter.com/toolbarextras',
		'url_tweet_en'      => 'https://twitter.com/home?status=Let%20the%20%23WordPress%20%23Toolbar%20work%20for%20you%20-%20with%20Toolbar%20Extras%20%23plugin%3A%20https%3A//toolbarextras.com%20%20Perfect%20for%20site-builders%20via%20%40deckerweb',
		'url_tweet_de'      => 'https://twitter.com/home?status=Lass%20die%20%23WordPress%20%23Toolbar%20f%C3%BCr%20dich%20arbeiten%20-%20mit%20dem%20Toolbar%20Extras%20%23Plugin%3A%20https%3A//toolbarextras.com%20Perfekt%20f%C3%BCr%20Site-Builders%20%3A)%20via%20%40deckerweb',
		'url_fb_share'      => 'https://www.facebook.com/sharer/sharer.php?u=https%3A//toolbarextras.com/',
		'url_gplus_share'   => 'https://plus.google.com/share?url=https%3A//toolbarextras.com/',
		'url_lin_share'     => 'https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Ftoolbarextras.com%2F',

		'url_mstba'         => 'https://wordpress.org/plugins/multisite-toolbar-additions/',

	);  // end of array

	return $tbex_info;

}  // end function


/**
 * Get an info source - array from Toolbar Extras itself or one of its Add-Ons.
 *
 * @since 1.4.2
 * @since 1.4.5 Added new info source.
 *
 * @see ddw_tbex_get_info_url()
 * @see ddw_tbex_get_info_link()
 *
 * @param string $source
 * @return string String of function name to use.
 */
function ddw_tbex_get_info_source( $source ) {

	switch ( sanitize_key( $source ) ) {

		case 'tbex':
			$function = ddw_tbex_info_values();
			break;

		case 'mainwp':
			$function = ddw_tbexmwp_info_values();
			break;

		case 'multisite':
			$function = ddw_tbexms_info_values();
			break;

		case 'beaver':
			$function = ddw_tbexbv_info_values();
			break;

		case 'thrive':
			$function = ddw_tbextt_info_values();
			break;

		case 'oxygen':
			$function = ddw_tbexob_info_values();
			break;

		case 'brizy':
			$function = ddw_tbexbzy_info_values();
			break;

		case 'givewp':
			$function = ddw_tbexgive_info_values();
			break;

		default:
			$function = ddw_tbex_info_values();
			break;

	}  // end switch

	return $function;

}  // end function


/**
 * Get URL of specific TBEX info value.
 *
 * @since 1.0.0
 * @since 1.4.2 Added $source parameter.
 *
 * @uses ddw_tbex_info_values()
 * @uses ddw_tbex_get_info_source()
 *
 * @param string $url_key Value key string from ddw_tbex_info_values() array.
 * @param string $source  Source from which to get the URL key value.
 * @param bool   $raw     If raw escaping or regular escaping of URL gets used.
 * @return string URL for info value.
 */
function ddw_tbex_get_info_url( $url_key = '', $source = 'tbex', $raw = FALSE ) {

	$source_values = (array) ddw_tbex_get_info_source( $source );

	$output = esc_url( $source_values[ sanitize_key( $url_key ) ] );

	if ( TRUE === (bool) $raw ) {
		$output = esc_url_raw( $source_values[ esc_attr( $url_key ) ] );
	}

	return $output;

}  // end function


/**
 * Get link with complete markup for a specific TBEX info value.
 *
 * @since 1.0.0
 * @since 1.4.2 Added $source parameter.
 *
 * @uses ddw_tbex_get_info_url()
 *
 * @param string $url_key String of value key.
 * @param string $text    String of text and link attribute.
 * @param string $class   String of CSS class.
 * @param string $source  Source from which to get the URL key value.
 * @return string HTML markup for linked URL.
 */
function ddw_tbex_get_info_link( $url_key = '', $text = '', $class = '', $source = 'tbex' ) {

	$link = sprintf(
		'<a class="%1$s" href="%2$s" target="_blank" rel="nofollow noopener noreferrer" title="%3$s">%3$s</a>',
		strtolower( esc_attr( $class ) ),	//sanitize_html_class( $class ),
		ddw_tbex_get_info_url( $url_key, $source ),
		esc_html( $text )
	);

	return $link;

}  // end function


/**
 * Get timespan of coding years for this plugin.
 *
 * @since 1.0.0
 * @since 1.3.5 Improved first year logic.
 * @since 1.4.2 Added $source parameter.
 *
 * @uses ddw_tbex_info_values()
 * @uses ddw_tbex_get_info_source()
 *
 * @param int    $first_year Integer number of first year.
 * @param string $source Type of source to check for.
 * @return string Current year or timespan of years.
 */
function ddw_tbex_coding_years( $first_year = '', $source = 'tbex' ) {

	$source_values = (array) ddw_tbex_get_info_source( $source );

	$first_year = ( empty( $first_year ) ) ? absint( $source_values[ 'first_code' ] ) : absint( $first_year );

	/** Set year of first released code */
	$code_first_year = ( date( 'Y' ) == $first_year || 0 === $first_year ) ? '' : $first_year . '&#x02013;';

	return $code_first_year . date( 'Y' );

}  // end function


add_shortcode( 'tbex-userid', 'ddw_tbex_shortcode_user_id' );
/**
 * Shortcode to output a users ID.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's ID.
 */
function ddw_tbex_shortcode_user_id( $atts, $content ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return $user->ID;

}  // end function


add_shortcode( 'tbex-email', 'ddw_tbex_shortcode_user_email' );
/**
 * Shortcode to output a users email.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's email.
 */
function ddw_tbex_shortcode_user_email( $atts, $content ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return $user->user_email;

}  // end function


add_shortcode( 'tbex-login', 'ddw_tbex_shortcode_user_login_name' );
/**
 * Shortcode to output a users login handle/name.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's login name.
 */
function ddw_tbex_shortcode_user_login_name( $atts, $content ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return $user->user_login;

}  // end function


add_shortcode( 'tbex-displayname', 'ddw_tbex_shortcode_user_display_name' );
/**
 * Shortcode to output a users display name.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's display name.
 */
function ddw_tbex_shortcode_user_display_name( $atts, $content ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return ! empty( $user->display_name ) ? esc_attr( $user->display_name ) : '';

}  // end function


add_shortcode( 'tbex-firstname', 'ddw_tbex_shortcode_user_firstname' );
/**
 * Shortcode to output a users first name.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's first name.
 */
function ddw_tbex_shortcode_user_firstname( $atts ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return ! empty( $user->user_firstname ) ? esc_attr( $user->user_firstname ) : esc_attr( $user->display_name );

}  // end function


add_shortcode( 'tbex-lastname', 'ddw_tbex_shortcode_user_lastname' );
/**
 * Shortcode to output a users last name.
 *
 * @since 1.4.0
 *
 * @param array  $atts Array of Shortcode attributes.
 * @param string $content Content of Shortcode.
 * @return string Filterable text string of user's last name.
 */
function ddw_tbex_shortcode_user_lastname( $atts ) {

	/** Bail early if not logged in */
	if ( ! is_user_logged_in() ) {
		return;
	}

	/** Get current user */
	$user = wp_get_current_user();

	/** Output */
	return ! empty( $user->user_lastname ) ? esc_attr( $user->user_lastname ) : '';

}  // end function


/**
 * Get URL of specific resource link for a specified resource type/function
 *   (for example: Elementor, >Block Editor etc.).
 *
 * @since 1.4.0
 * @since 1.4.2 Added new switch cases.
 * @since 1.4.5 Added new switch case.
 *
 * @uses ddw_tbex_resources_{resource_type}()
 *
 * @param string $type    Type of resource function to use (get array).
 * @param string $url_key String of value key from array of specified resource
 *                        function.
 * @param bool   $raw     Whether to use raw escaping or regular escaping for
 *                        the URL.
 * @return string Full and escaped URL for the external resource link.
 */
function ddw_tbex_get_resource_url( $type = '', $url_key = '', $raw = FALSE ) {

	/** Specify resource type/function */
	switch ( sanitize_key( $type ) ) {

		case 'block-editor':
			$function = ddw_tbex_resources_block_editor();
			break;

		case 'elementor':
			$function = ddw_tbex_resources_elementor();
			break;

		case 'mainwp':
			$function = ddw_tbex_resources_mainwp();
			break;

		case 'multisite':
			$function = ddw_tbexms_resources_multisite();
			break;

		case 'beaver':
			$function = ddw_tbexbv_resources_beaver();
			break;

		case 'thrive':
			$function = ddw_tbextt_resources_thrive();
			break;

		case 'oxygen':
			$function = ddw_tbexob_resources_oxygen();
			break;

		case 'brizy':
			$function = ddw_tbexbzy_resources_brizy();
			break;

		case 'givewp':
			$function = ddw_tbexgive_resources_givewp();
			break;

		case 'tbex':
			$function = ddw_tbex_info_values();
			break;

		default:
			$function = ddw_tbex_info_values();
			break;

	}  // end switch

	/** Resource function fallback for enhanced security */
	$tbex_info = array();

	if ( ! is_null( $function ) ) {
		$tbex_info = (array) $function;
	} else {
		$tbex_info = (array) ddw_tbex_info_values();
		$url_key   = 'url_plugin';
	}

	/** Build + escape the URL output */
	$output = esc_url( $tbex_info[ sanitize_key( $url_key ) ] );

	if ( TRUE === (bool) $raw ) {
		$output = esc_url_raw( $tbex_info[ esc_attr( $url_key ) ] );
	}

	/** Finally, return the full URL */
	return $output;

}  // end function


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
 *
 * @param string $string Title string
 * @return string HTML markup, including item title.
 */
function ddw_tbex_item_title_with_icon( $string = '' ) {

	$output = sprintf(
		'<span class="ab-icon"></span><span class="ab-label">%s</span>',
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
 * Build custom autofocus link for the Customizer.
 *
 * @since 1.0.0
 *
 * @param string $type        Type of the autofocus (panel, section, control).
 * @param string $focus       Actual thing to autofocs on.
 * @param string $preview_url URL for preview.
 * @param string $return_url  URL for return after customizing.
 * @return string URL to Customizer with optional query arguments.
 */
function ddw_tbex_customizer_focus( $type = '', $focus = '', $preview_url = '', $return_url = '' ) {

	/** Check autofocus type for the 3 possible values */
	switch ( sanitize_key( $type ) ) {

		case 'panel':
			$type = 'autofocus[panel]';
			break;
		case 'section':
			$type = 'autofocus[section]';
			break;
		case 'control':
			$type = 'autofocus[control]';
			break;
		default:
			$type = '';

	}  // end switch

	/** Get the autofocus element for the set type */
	$query[ $type ] = sanitize_key( $focus );

	/** Determine an optional preview URL */
	$url = ( empty( $preview_url ) ) ? '' : 'url';

	$query[ $url ] = ( empty( $preview_url ) ) ? NULL : esc_url( $preview_url );

	/** Determine an optional return URL */
	$return = ( empty( $return_url ) ) ? '' : 'return';

	$query[ $return ] = ( empty( $return_url ) ) ? NULL : esc_url( $return_url );

	/** Return the new customized Customizer URL */
	return esc_url(
		add_query_arg(
			$query,
			admin_url( 'customize.php' )
		)
	);

}  // end function


/**
 * Build default link to the Customizer.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @return string URL to Customizer with homepage as preview page (as query args).
 */
function ddw_tbex_customizer_start() {

	return esc_url(
		apply_filters(
			'tbex_filter_fallback_admin_url',
			ddw_tbex_customizer_focus( '', '', site_url( '/' ) )
		)
	);

}  // end function


/**
 * String "Customize" for use in title attribute.
 *
 * @since 1.0.0
 *
 * @param string $string_element Translated string.
 * @return string String for use in linked title attribute.
 */
function ddw_tbex_string_customize_attr( $string_element ) {

	return sprintf(
		/* translators %s - Element to be customized -- whole text used as title attribute for linked text */
		esc_attr__( 'Customize %s', 'toolbar-extras' ),
		esc_attr( $string_element )
	);

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
 * Build All/ New strings for post type content.
 *
 * @since 1.0.0
 *
 * @param string $type    Type of content
 * @param string $element Name of content element
 * @return string Translated string for post type content.
 */
function ddw_tbex_string_cpt( $type = '', $element = '' ) {

	$string = '';
	
	/** Check type for the 2 possible values */
	switch ( sanitize_key( $type ) ) {

		case 'all':
			$string = sprintf(
				esc_attr__( 'All %s', 'toolbar-extras' ),
				esc_attr( $element )
			);
			break;

		case 'new':
			$string = sprintf(
				esc_attr__( 'New %s', 'toolbar-extras' ),
				esc_attr( $element )
			);
			break;

	}  // end switch

	return $string;

}  // end function


/**
 * Build current active Theme string with the Theme name from Theme header
 *   declaration (in style.css).
 *
 *   Optional param can be set to use the title of child theme.
 *
 *   Also, a custom theme name can be set - this one will be used only if there
 *   is no child theme in use.
 *
 * @since 1.0.0
 * @since 1.4.0 Optimized and added third param for custom theme name.
 *
 * @uses is_child_theme()
 *
 * @param string $title_attr  Helper, to enable output for title attribute.
 * @param string $child       Helper, to optionally get Name of Child Theme.
 * @param string $custom_name Optionally use a custom theme name.
 * @return string Translatable, escaped string for use as link title or link
 *                title attribute.
 */
function ddw_tbex_string_theme_title( $title_attr = '', $child = '', $custom_name = '' ) {

	/** Optionally use Child Theme Name, otherwise fallback to Parent Theme Name (Template) */
	$type = ( 'child' === strtolower( esc_attr( $child ) ) ) ? '' : get_template();

	$default_name = wp_get_theme( $type )->get( 'Name' );

	$name = ( isset( $custom_name ) && ! empty( $custom_name ) && ! is_child_theme() ) ? esc_attr( $custom_name ) : $default_name;

	/** Build regular link title: */
	$theme_title = sprintf(
		/* translators: %s - Name of current active Theme or Parent Theme (static!) */
		esc_attr__( 'Theme: %s', 'toolbar-extras' ),
		$name
	);

	/** Optional build link title attribute */
	if ( 'attr' === sanitize_key( $title_attr ) ) {

		$theme_title = sprintf(
			/* translators: %s - Name of current active Theme or Parent Theme (static!) */
			esc_html__( 'Active Theme: %s', 'toolbar-extras' ),
			$name
		);

	}  // end if

	/** Return the string */
	return $theme_title;

}  // end function


/**
 * Helper: Function for generating a resources Toolbar item.
 *
 * Types:
 *   'support-forum'          - Support Forum
 *   'support-contact'        - Support Contact
 *   'documentation'          - Documtation
 *   'documentation-dev'      - Developer Documentation
 *   'facebook-group'         - Facebook Group
 *   'official-support'       - Official Support
 *   'official-site'          - Official Site
 *   'official-blog'          - Official Blog
 *   'github'                 - GitHub
 *   'github-issues'          - GitHub Issues
 *   'translations-community' - Community Translations
 *   'translations-pro'       - Pro Translations (Translate Pro Plugin)
 *   'youtube-channel'        - YouTube Channel
 *   'youtube-tutorials'      - YouTube Tutorials
 *   'videos'                 - Videos
 *   'knowledge-base'         - Knowledge
 *   'tutorials'              - Tutorials
 *   'user-forum'             - User Forum
 *   'community-forum'        - Community Forum
 *   'my-account'             - My Account
 *   'code-reference'         - Code Reference
 *   'pro-docs'               - Pro Docs
 *   'pro-documentation'      - Pro: Documentation
 *   'pro-modules-docs'       - Pro: Modules Documentation
 *   'pro-facebook'           - Pro: Facebook Group
 *   'pro-support'            - Pro: Support
 *   'pro-official-site'      - Pro: Official Site
 *   'pro-apis'               - Pro: APIs
 *   'slack-channel'          - Slack Channel
 *   'changelog'              - Change Log (Version History)
 *
 * @since 1.0.0
 * @since 1.4.1 Added type developer docs.
 * @since 1.4.3 Added type changelog.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $type       Type of resource item.
 * @param string $id         ID of Toolbar item.
 * @param string $parent     Parent ID of Toolbar item.
 * @param string $url        (External) URL of resource item.
 * @param string $title_attr String for title attribute of resource item.
 * @return object Object of $GLOBALS[ 'wp_admin_bar' ] to build a new Toolbar node.
 */
function ddw_tbex_resource_item( $type = '', $id = '', $parent = '', $url = '', $title_attr = '' ) {

	/** Set variable */
	$title = '';

	/** Switch between resources types for different titles/ title attributes */
	switch ( sanitize_key( $type ) ) {

		case 'support-forum':
			$title = esc_attr__( 'Support Forum', 'toolbar-extras' );
			break;
		case 'support-contact':
			$title = esc_attr__( 'Support Contact', 'toolbar-extras' );
			break;
		case 'documentation':
			$title = esc_attr__( 'Documentation', 'toolbar-extras' );
			break;
		case 'documentation-dev':
			$title = esc_attr__( 'Developer Documentation', 'toolbar-extras' );
			break;
		case 'facebook-group':
			$title = esc_attr__( 'Facebook Group', 'toolbar-extras' );
			break;
		case 'official-support':
			$title = esc_attr__( 'Official Support', 'toolbar-extras' );
			break;
		case 'official-site':
			$title = esc_attr__( 'Official Site', 'toolbar-extras' );
			break;
		case 'official-blog':
			$title = esc_attr__( 'Official Blog', 'toolbar-extras' );
			break;
		case 'github':
			$title = esc_attr__( 'Development @ GitHub', 'toolbar-extras' );
			break;
		case 'github-issues':
			$title      = esc_attr__( 'GitHub Issues', 'toolbar-extras' );
			/* translators: Title attribute for linked text */
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'GitHub Issues (Bug Tracker)', 'toolbar-extras' );
			break;
		case 'translations-community':
			$title      = esc_attr__( 'Community Translations', 'toolbar-extras' );
			/* translators: Title attribute for linked text */
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Community Translations (at WordPress.org)', 'toolbar-extras' );
			break;
		case 'translations-pro':
			$title = esc_attr__( 'Translate Pro Plugin', 'toolbar-extras' );
			break;
		case 'youtube-channel':
			$title = esc_attr__( 'YouTube Channel', 'toolbar-extras' );
			break;
		case 'youtube-tutorials':
			$title = esc_attr__( 'YouTube Tutorials', 'toolbar-extras' );
			break;
		case 'videos':
			$title = esc_attr__( 'Videos', 'toolbar-extras' );
			break;
		case 'knowledge-base':
			$title      = esc_attr__( 'Knowledge Base', 'toolbar-extras' );
			/* translators: Title attribute for linked text */
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Knowledge Base Articles', 'toolbar-extras' );
			break;
		case 'tutorials':
			$title      = esc_attr__( 'Tutorials', 'toolbar-extras' );
			/* translators: Title attribute for linked text */
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Tutorial Articles', 'toolbar-extras' );
			break;
		case 'user-forum':
			$title = esc_attr__( 'User Forum', 'toolbar-extras' );
			break;
		case 'community-forum':
			$title = esc_attr__( 'Community Forum', 'toolbar-extras' );
			break;
		case 'my-account':
			$title = esc_attr__( 'My Account', 'toolbar-extras' );
			break;
		case 'code-reference':
			$title = esc_attr__( 'Code Reference', 'toolbar-extras' );
			break;
		case 'pro-docs':
			$title = esc_attr__( 'Pro Docs', 'toolbar-extras' );
			break;
		case 'pro-documentation':
			$title = esc_attr__( 'Pro: Documentation', 'toolbar-extras' );
			break;
		case 'pro-modules-documentation':
			$title = esc_attr__( 'Pro: Modules Documentation', 'toolbar-extras' );
			break;
		case 'pro-facebook':
			$title = esc_attr__( 'Pro: Facebook Group', 'toolbar-extras' );
			break;
		case 'pro-support':
			$title = esc_attr__( 'Pro: Support', 'toolbar-extras' );
			break;
		case 'pro-official-site':
			$title = esc_attr__( 'Pro: Official Site', 'toolbar-extras' );
			break;
		case 'pro-apis':
			$title = esc_attr__( 'Pro: APIs', 'toolbar-extras' );
			break;
		case 'slack-channel':
			$title = esc_attr__( 'Slack Channel', 'toolbar-extras' );
			break;
		case 'changelog':
			$title      = esc_attr__( 'Change Logs', 'toolbar-extras' );
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Version History', 'toolbar-extras' );
			break;
		default:
			$title = esc_attr__( 'External Resource', 'toolbar-extras' );

	}  // end switch

	/** Build array with arguments of Toolbar item */
	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => strtolower( sanitize_html_class( $id ) ),
			'parent' => strtolower( sanitize_html_class( $parent ) ),
			'title'  => $title,
			'href'   => esc_url( $url ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : $title
			)
		)
	);

	/** Return Toolbar node object with array of the Toolbar item arguments */
	return $toolbar_item;

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
function ddw_tbex_custom_url_test( $type = '', $option_key ) {

	$url = ddw_tbex_get_option( $type, $option_key );

	$url_test = '';

	if ( ! empty( $url ) ) {

		$url_test = sprintf(
			'<a href="%s" target="_blank" rel="nofollow noopener noreferrer" title="%s"><span class="dashicons dashicons-external" style="text-decoration: none; vertical-align: middle;"></span></a> &nbsp; ',
			esc_url( $url ),
			esc_attr__( 'Test this custom URL', 'toolbar-extras' )
		);

	}  // end if

	return $url_test;

}  // end function


/**
 * Customizer default deep link for a theme - as reusable item function.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_customize_design()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $id     Unique ID of the Toolbar item.
 * @param string $parent Parent ID to hook this item to.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_theme_creative_customize( $id = '', $parent = '' ) {

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize' : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative' : $parent;

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			'title'  => ddw_tbex_string_customize_design(),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_design()
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * Customizer deep link for "Site Identity" section (a WordPress default) - as
 *   a reusable item function.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $id     Unique ID of the Toolbar item.
 * @param string $parent Parent ID to hook this item to.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_site_identity( $id = '', $parent = '' ) {

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize-section-site-identity' : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative-customize' : $parent;

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * Build Customizer deep link item for the Toolbar, based on certain params.
 *   For a few typical panels/sections/controls of WordPress defaults a logic
 *   for predefined params is included.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus() For rendering the URL/preview logic.
 * @uses ddw_tbex_string_customize_attr() For rendering the title attribute.
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_meta_rel()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $type        Type of Customizer item (panel/section/control).
 * @param string $item        Unique handle of the actual item.
 * @param string $title       Label of the Toolbar item.
 * @param string $id          Unique ID of the Toolbar item.
 * @param string $parent      Parent ID to hook this item to.
 * @param string $preview_url Optional preview URL within the Customizer.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_customizer( $type = '', $item = '', $title = '', $id = '', $parent = '', $preview_url = '' ) {

	$type = sanitize_key( $type );
	$item = sanitize_key( $item );

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize-' . $type . '-' . $item : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative-customize' : $parent;

	/** Check autofocus type for the 3 possible values */
	switch ( $item ) {

		case 'title_tagline':
			$title = __( 'Site Identity', 'toolbar-extras' );
			break;

		case 'header_image':
			$title = __( 'Header Image', 'toolbar-extras' );
			break;

		case 'background_image':
			$title = __( 'Background Image', 'toolbar-extras' );
			break;

		case 'colors':
			$title = __( 'Colors', 'toolbar-extras' );
			break;

	}  // end switch

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			/* translators: Autofocus panel/section/control in the Customizer */
			'title'  => esc_attr( $title ),
			'href'   => ddw_tbex_customizer_focus( $type, $item, $preview_url ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_attr( $title )
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * To get filterable hook priority for the optional Customizer deep link items
 *   of a Theme if using the filter 'tbex_filter_items_theme_customizer_deep'.
 *   Default: 90 - that means before various third-party plugin integrations
 *   supported by Toolbar Extras.
 *
 * @since 1.4.0
 *
 * @see plugin file /includes/items-themes.php (at the bottom)
 * @see ddw_tbex_items_theme_customizer_deep()
 *
 * @return int Hook priority for Customizer deep link item.
 */
function ddw_tbex_customizer_deep_items_priority() {

	return absint(
		apply_filters(
			'tbex_filter_customizer_deep_items_priority',
			90
		)
	);

}  // end function


//add_action( 'admin_bar_menu', 'ddw_tbex_items_theme_customizer_deep', 100 );
/**
 * Optionally add Customizer deep links for a supported Theme if it declares an
 *   appropriate array for the filter 'tbex_filter_items_theme_customizer_deep'.
 *   Note: All declared handles will be added as Toolbar nodes. This is achieved
 *         via the wrapper function ddw_tbex_item_customizer() which creates the
 *         individual Toolbar nodes.
 *
 *  This function gets fired at hook 'admin_bar_menu' in (plugin file)
 *  /includes/items-themes.php , at a priority determined via the function
 *  ddw_tbex_customizer_deep_items_priority().
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_item_customizer()
 * @see ddw_tbex_customizer_deep_items_priority()
 * @see plugin file /includes/items-themes.php (at the bottom)
 *
 * @uses ddw_tbex_item_customizer() For rendering the items.
 */
function ddw_tbex_items_theme_customizer_deep() {

	/** Setup the filterable array for Themes/ Plugins to hook in */
	$theme_items = apply_filters(
		'tbex_filter_items_theme_customizer_deep',
		array()
	);

	/**
	 * Set additional declaration for the "Site Identity" item, to have it
	 *   always at the last position.
	 */
	$theme_items[ 'title_tagline' ] = array(
		'type' => 'section',
	);

	/**
	 * Loop through all declared items and add them as Toolbar nodes via our
	 *   helper function ddw_tbex_item_customizer().
	 */
	foreach ( $theme_items as $item_handle => $item_values ) {

		/**
		 * If certain keys not declared in array, have a fallback in place so
		 *   the function ddw_tbex_item_customizer() always gets proper params
		 *   passed.
		 */
		$title       = ! isset( $item_values[ 'title' ] ) || empty( $item_values[ 'title' ] ) ? '' : esc_attr( $item_values[ 'title' ] );
		$id          = ! isset( $item_values[ 'id' ] ) || empty( $item_values[ 'id' ] ) ? '' : sanitize_html_class( $item_values[ 'id' ] );
		$parent      = ! isset( $item_values[ 'parent' ] ) || empty( $item_values[ 'parent' ] ) ? '' : sanitize_html_class( $item_values[ 'parent' ] );
		$preview_url = ! isset( $item_values[ 'preview_url' ] ) || empty( $item_values[ 'preview_url' ] ) ? '' : esc_url( $item_values[ 'preview_url' ] );

		ddw_tbex_item_customizer(
			sanitize_key( $item_values[ 'type' ] ),
			sanitize_key( $item_handle ),
			$title,
			$id,
			$parent,
			$preview_url
		);

	}  // end foreach

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
