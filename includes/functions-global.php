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
 * @since  1.0.0
 *
 * @param  string $type Type of plugin options to check for.
 * @param  string $option_key Option key in the settings array.
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
 * @since  1.0.0
 *
 * @return array $tbex_info Array of info values.
 */
function ddw_tbex_info_values() {

	$tbex_info = array(

		'url_translate'     => 'https://translate.wordpress.org/projects/wp-plugins/toolbar-extras',
		'url_wporg_faq'     => 'https://wordpress.org/plugins/toolbar-extras/#faq',
		'url_wporg_forum'   => 'https://wordpress.org/support/plugin/toolbar-extras',
		'url_wporg_review'  => 'https://wordpress.org/support/plugin/toolbar-extras/reviews/?filter=5/#new-post',
		'url_wporg_profile' => 'https://profiles.wordpress.org/daveshine/',
		'url_wporg_more'    => 'https://wordpress.org/plugins/search.php?q=toolbar',
		'url_fb_group'      => 'https://www.facebook.com/groups/ToolbarExtras/',
		'url_ddw_series'    => 'https://wordpress.org/plugins/tags/ddwtoolbar',
		'url_snippets'      => 'https://gist.github.com/deckerweb',
		'author'            => __( 'David Decker - DECKERWEB', 'toolbar-extras' ),
		'author_uri'        => __( 'https://deckerweb.de/', 'toolbar-extras' ),
		'author_avatar'     => plugins_url( '/assets/images/plugin-author.jpg', dirname( __FILE__ ) ),
		'author_gravatar'   => 'https://s.gravatar.com/avatar/37f92a97dd59cb35be4f86f3e6b56309?s=',		// size defined at usage!
		'license'           => 'GPL-2.0+',
		'url_license'       => 'https://opensource.org/licenses/GPL-2.0',
		'first_code'        => '2012',
		'url_donate'        => 'https://www.paypal.me/deckerweb',
		'url_plugin'        => 'https://toolbarextras.com/',
		'url_plugin_docs'   => 'https://toolbarextras.com/docs/',
		'url_plugin_faq'    => 'https://toolbarextras.com/docs-category/faqs/',
		'url_github'        => 'https://github.com/deckerweb/toolbar-extras',
		'url_github_issues' => 'https://github.com/deckerweb/toolbar-extras/issues',
		'url_roadmap'       => 'https://trello.com/b/JrpjwlX4/toolbar-extras-public-roadmap',
		'url_video_intro'   => 'https://www.youtube.com/watch?v=fdDG19Sk0is',
		'url_video_tour'    => '//www.youtube-nocookie.com/embed/fdDG19Sk0is?rel=0&TB_iframe=true&width=1024&height=576',	// for Thickbox, embed version, no cookies!
		'url_video_channel' => 'https://www.youtube.com/channel/UCaAPlEcIcWaxW733FvO2CCw',
		'url_video_plist'   => 'https://www.youtube.com/playlist?list=PL5-Wf0C0GRoyAQs3AY2IgmZoFe9l63Ei_',
		'url_menu_screen'   => 'https://www.dropbox.com/s/7u83c0g5ehk4ozq/screenshot-5.png',
		'url_tweet_en'      => 'https://twitter.com/home?status=Let%20the%20%23WordPress%20%23Toolbar%20work%20for%20you%20-%20with%20Toolbar%20Extras%20%23plugin%3A%20https%3A//toolbarextras.com%20%20Perfect%20for%20site-builders%20via%20%40deckerweb',
		'url_tweet_de'      => 'https://twitter.com/home?status=Lass%20die%20%23WordPress%20%23Toolbar%20f%C3%BCr%20dich%20arbeiten%20-%20mit%20dem%20Toolbar%20Extras%20%23Plugin%3A%20https%3A//toolbarextras.com%20Perfekt%20f%C3%BCr%20Site-Builders%20%3A)%20via%20%40deckerweb',
		'url_fb_share'      => 'https://www.facebook.com/sharer/sharer.php?u=https%3A//toolbarextras.com/',
		'url_gplus_share'   => 'https://plus.google.com/share?url=https%3A//toolbarextras.com/',
		'url_mstba'         => 'https://wordpress.org/plugins/multisite-toolbar-additions/',

	);  // end of array

	return $tbex_info;

}  // end function


/**
 * Get URL of specific TBEX info value.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_info_values()
 *
 * @param  string $url_key String of value key from array of ddw_tbex_info_values()
 * @param  bool   $raw     If raw escaping or regular escaping of URL gets used
 * @return string URL for info value.
 */
function ddw_tbex_get_info_url( $url_key = '', $raw = FALSE ) {

	$tbex_info = (array) ddw_tbex_info_values();

	$output = esc_url( $tbex_info[ sanitize_key( $url_key ) ] );

	if ( TRUE === $raw ) {
		$output = esc_url_raw( $tbex_info[ esc_attr( $url_key ) ] );
	}

	return $output;

}  // end function


/**
 * Setting internal plugin helper values.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_info_url()
 *
 * @param  string $url_key String of value key
 * @param  string $text    String of text and link attribute
 * @param  string $class   String of CSS class
 * @return string HTML markup for linked URL.
 */
function ddw_tbex_get_info_link( $url_key = '', $text = '', $class = '' ) {

	$link = sprintf(
		'<a class="%1$s" href="%2$s" target="_blank" rel="nofollow noopener noreferrer" title="%3$s">%3$s</a>',
		strtolower( esc_attr( $class ) ),	//sanitize_html_class( $class ),
		ddw_tbex_get_info_url( $url_key ),
		esc_html( $text )
	);

	return $link;

}  // end function


/**
 * Get timespan of coding years for this plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_info_values()
 *
 * @param  int $first_year Integer number of first year
 * @return string Timespan of years.
 */
function ddw_tbex_coding_years( $first_year = '' ) {

	$tbex_info = (array) ddw_tbex_info_values();

	$first_year = ( empty( $first_year ) ) ? absint( $tbex_info[ 'first_code' ] ) : absint( $first_year );

	/** Set year of first released code */
	$code_first_year = ( '' !== $first_year && date( 'Y' ) !== $first_year ) ? $first_year . '&#x02013;' : '';

	return $code_first_year . date( 'Y' );

}  // end function


/**
 * Return array of registered Page Builders and their arguments.
 *
 * Plugins and themes can hook into the 'tbex_filter_get_pagebuilders' filter to
 *   register their own builders.
 *
 * @since  1.0.0
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
		$pagebuilder[ 'plugins_tab' ] = (bool) $pagebuilder[ 'plugins_tab' ];

	}  // end foreach

	/** Return registered builders */
	return (array) $builders;

}  // end function


/**
 * Check if a Page Builder is registered.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_pagebuilders()
 *
 * @param  string $builder Key of checked Page Builder.
 * @return bool TRUE if checked builder is in the registered array, otherwise FALSE.
 */
function ddw_tbex_is_pagebuilder_registered( $builder = '' ) {

	$all_builders = (array) ddw_tbex_get_pagebuilders();

	return array_key_exists( sanitize_key( $builder ), $all_builders );

}  // end function


/**
 * Is a supported Page Builder plugin registered ("active") or not?
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_pagebuilders()
 *
 * @return bool TRUE if a Page Builder is "active", otherwise FALSE.
 */
function ddw_tbex_is_pagebuilder_active() {

	$all_builders = (array) ddw_tbex_get_pagebuilders();
	$all_builders = array_filter( $all_builders );

	return ( ! empty( $all_builders ) ) ? TRUE : FALSE ;

}  // end function


/**
 * Get the default Page Builder which was set in plugin's settings.
 *
 * @since  1.0.0
 * @todo   TBEX Extended Settings integration!
 *
 * @return string ID of default Page Builder.
 */
function ddw_tbex_get_default_pagebuilder() {

	/** Interim setting - will get overhauled, once plugin's extended settings are in place! */
	$builder = ddw_tbex_is_elementor_active() ? 'elementor' : '';

	return sanitize_key( apply_filters( 'tbex_filter_default_pagebuilder', $builder ) );

}  // end function


/**
 * To get filterable hook priority for main item.
 *   Default: 71 - that means after "New Content" section.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_option()
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
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since   1.0.0
 * @version 1.3.0
 *
 * @uses    ddw_tbex_get_option()
 *
 * @param   string $tool The tool the meta target should be used for.
 * @return  string URL link target tag.
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
 * @since  1.0.0
 *
 * @param  string $string Title string
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
 * @since  1.0.0
 *
 * @param  string $string        Title string
 * @param  string $settings_type Type of settings section
 * @param  string $option_key    Option key to check for
 * @return string HTML markup, including item title.
 */
function ddw_tbex_item_title_with_settings_icon( $string = '', $settings_type = '', $option_key = '' ) {

	$output = sprintf(
		'<span class="dashicons-before %1$s ab-icon"></span><span class="ab-label">%2$s</span>',
		ddw_tbex_get_option( sanitize_key( $settings_type ), sanitize_key( $option_key ) ),
		esc_attr( $string )
	);

	return apply_filters(
		'tbex_filter_item_title_with_settings_icon',
		$output
	);

}  // end function


/**
 * Get all Elementor template types as an array.
 *   Note: Filter 'tbex_filter_elementor_template_types' allows for plugins to
 *         add or remove template types.
 *
 * @since  1.1.0
 *
 * @return array Array of Elementor template types.
 */
function ddw_tbex_get_elementor_template_types() {

	$template_types = apply_filters(
		'tbex_filter_elementor_template_types',
		array( 'page', 'section', 'header', 'footer', 'single', 'archive', 'product', 'product-archive', )
	);

	return array_map( 'sanitize_key', $template_types );

}  // end function


/**
 * Create an "Add New" link for an Elementor Library Template Type, including
 *   the setting of a template type.
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_get_elementor_template_types()
 * @uses   \Elementor\Utils::get_create_new_post_url()
 *
 * @param  string $type Key of the Elementor template type.
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


//


/**
 * Build custom autofocus link for the Customizer.
 *
 * @since  1.0.0
 *
 * @param  string $type        Type of the autofocus (panel, section, control).
 * @param  string $focus       Actual thing to autofocs on.
 * @param  string $preview_url URL for preview.
 * @param  string $return_url  URL for return after customizing.
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
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
 * @since  1.0.0
 *
 * @param  string $string_element Translated string.
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
 * @uses  ddw_tbex_restrict_nav_menu_edit_access()
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
 * @since  1.0.0
 *
 * @param  string $type    Type of content
 * @param  string $element Name of content element
 * @return string Translated string for post type content.
 */
function ddw_tbex_string_cpt( $type = '', $element = '' ) {

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
 *   Note: We only need Name of Parent Theme, no fiddling with Child Theme names!
 *
 * @since  1.0.0
 *
 * @param  string $title_attr Helper param to enable output for title attribute.
 * @param  strong $child      Helper param to optionally get Name of Child Theme.
 * @return string Translateable, escaped string for use as link title or link title attribute.
 */
function ddw_tbex_string_theme_title( $title_attr = '', $child = '' ) {

	/** Optionally use Child Theme Name, otherwise fallback to Parent Theme Name (Template) */
	$type = ( 'child' === strtolower( esc_attr( $child ) ) ) ? '' : get_template();

	/** Build regular link title: */
	$theme_title = sprintf(
		/* translators: %s - Name of current active Theme or Parent Theme (static!) */
		esc_attr__( 'Theme: %s', 'toolbar-extras' ),
		wp_get_theme( $type )->get( 'Name' )
	);

	/** Optional build link title attribute */
	if ( 'attr' === sanitize_key( $title_attr ) ) {

		$theme_title = sprintf(
			/* translators: %s - Name of current active Theme or Parent Theme (static!) */
			esc_html__( 'Active Theme: %s', 'toolbar-extras' ),
			wp_get_theme( $type )->get( 'Name' )
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
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param  string $type       Type of resource item.
 * @param  string $id         ID of Toolbar item.
 * @param  string $parent     Parent ID of Toolbar item.
 * @param  string $url        (External) URL of resource item.
 * @param  string $title_attr String for title attribute of resource item.
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
 * @since  1.0.0
 *
 * @uses   get_nav_menu_locations()
 *
 * @param  string $single_menu_location ID string of Menu location
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_menu_id_from_menu_location()
 *
 * @param  string $single_menu_location ID string of Menu location
 * @param  string $checked_capability   ID of capability which gets checked
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
			__( 'Plugin', 'toolbar-extras' ) . ': ' . __( 'Toolbar Extras', 'toolbar-extras' ),
			array( 'back_link' => TRUE )
		);

	}  // end if

}  // end function


/**
 * Get German-based informal locales for re-use.
 *
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
 *
 * @uses   ddw_tbex_get_german_locales()
 * @uses   get_option()
 * @uses   get_site_option()
 * @uses   get_locale()
 * @uses   ICL_LANGUAGE_CODE Constant of WPML premium plugin, if defined.
 *
 * @return bool If German-based locale, return TRUE, otherwise FALSE.
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
 * @since  1.2.0
 *
 * @uses   ddw_tbex_display_link_title_attributes()
 *
 * @param  object $wp_admin_bar Object of Toolbar holding all nodes.
 * @return void
 */
function ddw_tbex_remove_tooltips_title_attr( $wp_admin_bar ) {

	/** Bail early if Tooltip display is wanted */
	if ( ddw_tbex_display_link_title_attributes() ) {
		return;
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