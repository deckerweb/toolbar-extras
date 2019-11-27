<?php

// includes/functions-global-info

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
 * Set current minimum plugin versions for some recommended plugins for our
 *   "Plugin Manager" script.
 *
 * @since 1.4.8
 *
 * @return array $versions Array of plugin versions.
 */
function ddw_tbex_pm_min_versions() {

	$versions = array(
		'builder-template-categories' => '1.7.0',
		'wp-asset-clean-up'           => '1.3.5.1',
		'code-snippets'               => '2.13.3',
		'members'                     => '2.2.0',
	);

	return $versions;

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
		sanitize_email( $user->user_email ),
		esc_attr( $user->user_firstname )
	);

	$tbex_info = array(

		'url_translate'       => 'https://translate.wordpress.org/projects/wp-plugins/toolbar-extras',
		'url_wporg_faq'       => 'https://wordpress.org/plugins/toolbar-extras/#faq',
		'url_wporg_forum'     => 'https://wordpress.org/support/plugin/toolbar-extras',
		'url_wporg_review'    => 'https://wordpress.org/support/plugin/toolbar-extras/reviews/?filter=5/#new-post',
		'url_wporg_profile'   => 'https://profiles.wordpress.org/daveshine/',
		'url_wporg_more'      => 'https://wordpress.org/plugins/search.php?q=toolbar',
		'url_fb_group'        => 'https://www.facebook.com/groups/ToolbarExtras/',
		'url_ddw_series'      => 'https://wordpress.org/plugins/tags/ddwtoolbar',
		'url_snippets'        => 'https://toolbarextras.com/docs-category/custom-code-snippets/',
		'url_snippet_user'    => 'https://toolbarextras.com/docs/remove-toolbar-items-for-certain-users/',

		'author'              => __( 'David Decker - DECKERWEB', 'toolbar-extras' ),
		'author_uri'          => 'https://deckerweb.de/',
		'author_avatar'       => plugins_url( '/assets/images/plugin-author.jpg', dirname( __FILE__ ) ),
		'author_gravatar'     => 'https://s.gravatar.com/avatar/37f92a97dd59cb35be4f86f3e6b56309?s=',		// size defined at usage!
		'plugin_icon_png'     => plugins_url( '/assets/images/tbex-icon.png', dirname( __FILE__ ) ),
		'plugin_icon_svg'     => plugins_url( '/assets/images/tbex-icon.svg', dirname( __FILE__ ) ),
		'license'             => 'GPL-2.0-or-later',
		'url_license'         => 'https://opensource.org/licenses/GPL-2.0',
		'first_code'          => '2012',

		'url_donate'          => 'https://www.paypal.me/deckerweb',
		'url_patreon'         => 'https://www.patreon.com/deckerweb',
		'url_newsletter'      => $url_nl,
		'url_plugin'          => 'https://toolbarextras.com/',
		'url_plugin_docs'     => 'https://toolbarextras.com/docs/',
		'url_plugin_faq'      => 'https://toolbarextras.com/docs-category/faqs/',
		'url_addons'          => 'https://toolbarextras.com/addons/',
		'url_addons_docs'     => 'https://toolbarextras.com/docs-category/add-ons/',
		'url_github'          => 'https://github.com/deckerweb/toolbar-extras',
		'url_github_issues'   => 'https://github.com/deckerweb/toolbar-extras/issues',
		'url_github_follow'   => 'https://github.com/deckerweb',
		'url_roadmap'         => 'https://toolbarextras.com/go/public-roadmap/',		//'https://trello.com/b/JrpjwlX4/toolbar-extras-public-roadmap',
		'url_plugin_changes'  => 'https://toolbarextras.com/changelogs/toolbar-extras/',
		'url_tbex_timeline'   => 'https://toolbarextras.com/version-timeline/',
		'url_milestones'      => 'https://toolbarextras.com/milestones/',
		'url_blog'            => 'https://toolbarextras.com/blog/',

		'url_video_intro'     => 'https://www.youtube.com/watch?v=fdDG19Sk0is',
		'url_video_tour'      => '//www.youtube-nocookie.com/embed/fdDG19Sk0is?rel=0&TB_iframe=true&width=1024&height=576',	// for Thickbox, embed version, no cookies!
		'url_video_channel'   => 'https://www.youtube.com/channel/UCaAPlEcIcWaxW733FvO2CCw',
		'url_video_plist'     => 'https://www.youtube.com/playlist?list=PL5-Wf0C0GRoyAQs3AY2IgmZoFe9l63Ei_',
		'url_menu_screen'     => 'https://ps.w.org/toolbar-extras/assets/screenshot-21.png',	//'https://www.dropbox.com/s/7u83c0g5ehk4ozq/screenshot-5.png',
		'url_tb_admin'        => 'https://www.dropbox.com/s/vxypca8r5jnjj3c/toolbar-groups-admin.png?dl=0',
		'url_tb_frontend'     => 'https://www.dropbox.com/s/juh4dzfmfrsm6v7/toolbar-groups-frontend.png?dl=0',

		'url_instagram'       => 'https://www.instagram.com/toolbarextras',
		'url_twitter'         => 'https://twitter.com/deckerweb',
		'url_twitter_tbex'    => 'https://twitter.com/toolbarextras',
		'url_tweet_en'        => 'https://twitter.com/home?status=Let%20the%20%23WordPress%20%23Toolbar%20work%20for%20you%20-%20with%20Toolbar%20Extras%20%23plugin%3A%20https%3A//toolbarextras.com%20%20Perfect%20for%20site-builders%20via%20%40deckerweb',
		'url_tweet_de'        => 'https://twitter.com/home?status=Lass%20die%20%23WordPress%20%23Toolbar%20f%C3%BCr%20dich%20arbeiten%20-%20mit%20dem%20Toolbar%20Extras%20%23Plugin%3A%20https%3A//toolbarextras.com%20Perfekt%20f%C3%BCr%20Site-Builders%20%3A)%20via%20%40deckerweb',
		'url_fb_share'        => 'https://www.facebook.com/sharer/sharer.php?u=https%3A//toolbarextras.com/',
		'url_gplus_share'     => 'https://plus.google.com/share?url=https%3A//toolbarextras.com/',
		'url_lin_share'       => 'https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Ftoolbarextras.com%2F',

		'url_mstba'           => 'https://wordpress.org/plugins/multisite-toolbar-additions/',

		'space_helper'        => '<div style="height: 10px;"></div>',

		'php_current'         => phpversion(),
		'php_minimum'         => '5.6.20',
		'php_recommended'     => '7.2',
		'wp_current'          => $GLOBALS[ 'wp_version' ],
		'wp_minimum'          => '4.7',
		'wp_recommended'      => '5.x',
		'mysql_minimum'       => '5.0',
		'mysql_recommended'   => '5.6',
		'mariadb_minimum'     => '10.0',
		'mariadb_recommended' => '10.1',

	);  // end of array

	return $tbex_info;

}  // end function


/**
 * Get an info source - array from Toolbar Extras itself or one of its Add-Ons.
 *
 * @since 1.4.2
 * @since 1.4.5 Added new info source.
 * @since 1.4.7 Added new info sources.
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

		case 'woocommerce':
			$function = ddw_tbexwoo_info_values();
			break;

		case 'divi':
			$function = ddw_tbexdivi_info_values();
			break;

		case 'glotpress':
			$function = ddw_tbexgp_info_values();
			break;

		case 'simplepress':
			$function = ddw_tbexsp_info_values();
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
 * @since 1.4.7 Code improvements.
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

	$url_key_sanitized = sanitize_key( $url_key );

	$source_values = (array) ddw_tbex_get_info_source( $source );

	$output = isset( $source_values[ $url_key_sanitized ] ) ? esc_url( $source_values[ $url_key_sanitized ] ) : '';

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


if ( ! function_exists( 'ddw_tbex_shortcode_version' ) ) {

	add_shortcode( 'tbex-version', 'ddw_tbex_shortcode_version' );
	/**
	 * Shortcode to output the current required version of Toolbar Extras (TBEX)
	 *   plugin for its official Add-Ons.
	 *
	 * @since 1.4.7
	 *
	 * @uses ddw_tbex_info_values()
	 *
	 * @param array $atts Array of Shortcode attributes.
	 * @return string Filterable text string of user's last name.
	 */
	function ddw_tbex_shortcode_version( $atts ) {

		/** Set default shortcode attributes */
		$defaults = apply_filters(
			'tbex_filter_version_shortcode_defaults',
			array(
				'type'         => 'version',
				'plugin'       => 'tbex',
				'custom'       => '',
				'label_before' => '',
				'label_after'  => '',
				'class'        => '',
				'wrapper'      => 'span',
			)
		);

		/** Default shortcode attributes */
		$atts = shortcode_atts( $defaults, $atts, 'tbex-version' );

		$type      = sanitize_key( $atts[ 'type' ] );
		$plugin    = sanitize_key( $atts[ 'plugin' ] );
		$version   = '';
		$defined   = '';
		$tbex      = defined( 'TBEX_PLUGIN_VERSION' ) ? TBEX_PLUGIN_VERSION : '';
		$sys_types = array( 'php_current', 'php_minimum', 'php_recommended', 'wp_current', 'wp_minimum', 'wp_recommended', 'mysql_minimum', 'mysql_recommended', 'mariadb_minimum', 'mariadb_recommended' );

		if ( 'tbex' === $plugin && 'version' === $type ) {

			$version = $tbex;

		} elseif ( 'required' === $type ) {

			$plugin  = strtoupper( $plugin );
			$defined = constant( $plugin . '_REQUIRED_BASE_PLUGIN_VERSION' );
			$version = $defined ? $defined : $tbex;

		} elseif ( 'custom' === $type ) {

			$version = wp_filter_nohtml_kses( $atts[ 'custom' ] );

		} elseif ( in_array( $type, $sys_types ) ) {

			$tbex_info = ddw_tbex_info_values();
			$version   = $tbex_info[ $type ];

		}  // end if
		
		/** Prepare output */
		$output = sprintf(
			'<%1$s class="tbex-version%2$s">%3$s%4$s%5$s</%1$s>',
			strtolower( sanitize_html_class( $atts[ 'wrapper' ] ) ),
			! empty( $atts[ 'class' ] ) ? ' ' . sanitize_html_class( $atts[ 'class' ] ) : '',
			( ! empty( $atts[ 'label_before' ] ) ) ? esc_html__( $atts[ 'label_before' ] ) . ' ' : '',
			( ! is_null( $version ) ) ? $version : '',
			( ! empty( $atts[ 'label_after' ] ) ) ? ' ' . esc_html__( $atts[ 'label_after' ] ) : ''
		);

		/** Return the output - filterable */
		return apply_filters(
			'tbex_filter_shortcode_tbex_version',
			$output,
			$atts 		// additional param
		);

	}  // end function

}  // end if


/**
 * Get URL of specific resource link for a specified resource type/function
 *   (for example: Elementor, >Block Editor etc.).
 *
 * @since 1.4.0
 * @since 1.4.2 Added new switch cases.
 * @since 1.4.5 Added new switch case.
 * @since 1.4.7 Added new switch cases.
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

		case 'woocommerce':
			$function = ddw_tbexwoo_resources_woocommerce();
			break;

		case 'divi':
			$function = ddw_tbexdivi_resources_divi();
			break;

		case 'glotpress':
			$function = ddw_tbexgp_resources_glotpress();
			break;

		case 'simplepress':
			$function = ddw_tbexsp_resources_simplepress();
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
 *   'dev-blog'               - Developer Blog
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
 *   'bugs-features'          - Bugs & Feature Requests
 *   'feature-requests'       - Feature Requests
 *
 * @since 1.0.0
 * @since 1.4.1 Added type developer docs.
 * @since 1.4.3 Added type changelog.
 * @since 1.4.7 Added types dev-blog, bugs-features, feature-requests.
 * @since 1.4.9 Added type faq.
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
		case 'dev-blog':
			$title = esc_attr__( 'Developer Blog', 'toolbar-extras' );
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
		case 'pro-changelog':
			$title      = esc_attr__( 'Change Logs (Pro)', 'toolbar-extras' );
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Version History (Pro)', 'toolbar-extras' );
			break;
		case 'bugs-features':
			$title      = esc_attr__( 'Bug Reports &amp; Feature Requests', 'toolbar-extras' );
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Bug Reports &amp; Feature Requests via GitHub Issues', 'toolbar-extras' );
			break;
		case 'feature-requests':
			$title = esc_attr__( 'Feature Requests', 'toolbar-extras' );
			break;
		case 'faq':
			$title      = esc_attr_x( 'FAQ', 'Resource item title', 'toolbar-extras' );
			$title_attr = ( ! empty( $title_attr ) ) ? esc_attr( $title_attr ) : esc_attr__( 'Frequently Asked Questions - and Answers', 'toolbar-extras' );
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
 * Build resource links specifically for WordPress.org plugins & themes.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param string $type       Type of the resource (forum, blog, docs etc.).
 * @param string $slug       Slug of the product on WordPress.org
 * @param string $id         ID for the Toolbar node.
 * @param string $parent     Parent ID to add the Toolbar node as child.
 * @param string $product    Product type, 'plugin' (default) or 'theme'.
 * @param string $title_attr Optional, individual title attribute string.
 * @param string $lang       Optional, lang attribute for WordPress.org subdomain.
 * @return string URL, markup and translatable text for an external resource
 *                item for a WordPress.org plugin or theme.
 */
function ddw_tbex_resource_item_wporg( $type = '', $slug = '', $id = '', $parent = '', $product = 'plugin' , $title_attr = '', $lang = '' ) {
	
	/** Preparing */
	$slug    = sanitize_key( $slug );
	$url     = '';
	$product = sanitize_key( $product );
	$lang    = ( ! empty( $lang ) ) ? sanitize_key( $lang ) . '.' : '';

	/** Check all cases of resource types on WordPress.org */
	switch ( sanitize_key( $type ) ) {

		case 'support':
			$type = 'support-forum';
			$url  = sprintf(
				'https://wordpress.org/support/%1$s/%2$s/',
				$product,
				$slug
			);
			break;

		case 'translation':
			$type = 'translations-community';
			$url  = sprintf(
				'https://translate.wordpress.org/projects/wp-%1$ss/%2$s/',
				$product,
				$slug
			);
			break;

		case 'changelog':
			$type = 'changelog';
			$url  = sprintf(
				'https://%1$swordpress.org/%2$ss/%3$s/#developers',
				$lang,
				$product,
				$slug
			);
			break;

		case 'faq':
			$type = 'documentation';
			$url  = sprintf(
				'https://%1$swordpress.org/%2$s/%3$s/#faq',
				$lang,
				$product,
				$slug
			);
			break;

		case 'screenshots':
			$type = 'documentation';
			$url  = sprintf(
				'https://%1$swordpress.org/%2$s/%3$s/#screenshots',
				$lang,
				$product,
				$slug
			);
			break;

		case 'blocks':
			$type = 'documentation-dev';
			$url  = sprintf(
				'https://%1$swordpress.org/%2$s/%3$s/#blocks',
				$lang,
				$product,
				$slug
			);
			break;

	}  // end switch

	/** Return the resource link */
	return ddw_tbex_resource_item(
		$type,
		strtolower( sanitize_html_class( $id ) ),
		strtolower( sanitize_html_class( $parent ) ),
		esc_url( $url ),
		esc_attr( $title_attr )
	);

}  // end function


/**
 * Link addition(s) for "Crocoblock" vendor URLs.
 *
 * @since 1.4.9
 *
 * @return string String addition for URLs.
 */
function ddw_tbex_afcroc() {

	return '?ref=3';

}  // end function
