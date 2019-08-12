<?php

// includes/elementor-official/elementor-resources

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Collection of external resource links for Elementor (Pro).
 *   Note: This is the central place where to set/ change these links. They are
 *   then managed for displaying and using via ddw_tbex_get_resource_url().
 *
 * @since 1.4.0
 * @since 1.4.3 Added more "Elementor Hello" theme URLs.
 *
 * @see ddw_tbex_get_resource_url() in /includes/functions-global.php
 *
 * @return array $elementor_links Array of external resource links.
 */
function ddw_tbex_resources_elementor() {

	$elementor_links = array(

		/** Official */
		'url_docs'             => 'https://docs.elementor.com/',
		'url_docs_pro'         => 'https://docs.elementor.com/collection/147-elementor-pro',
		'url_developers'       => 'https://developers.elementor.com/',
		'url_code_reference'   => 'https://code.elementor.com/',
		'url_github'           => 'https://github.com/elementor/elementor',
		'url_github_issues'    => 'https://github.com/elementor/elementor/issues',
		'url_blog'             => 'https://elementor.com/blog/',
		'url_videos'           => 'https://www.youtube.com/c/elementor',
		'url_fb_group'         => 'https://www.facebook.com/groups/Elementors/',
		'url_myaccount'        => 'https://my.elementor.com/',
		'url_translations'     => 'https://translate.wordpress.org/projects/wp-plugins/elementor',
		'url_translations_pro' => 'https://translate.elementor.com/',
		'url_fb_translators'   => 'https://www.facebook.com/groups/elementortranslators/',
		'url_free_support'     => 'https://wordpress.org/support/plugin/elementor',
		'url_apis_pro'         => 'https://developers.elementor.com/elementor-pro-apis/',
		'url_changes'          => 'https://github.com/elementor/elementor#changelog',
		'url_changes_pro'      => 'https://elementor.com/pro/changelog/',

		/** Community */
		'url_el_forums'        => 'https://elementorforums.com/community/',
		'url_fbdev_group'      => 'https://www.facebook.com/groups/1388158027894331/',

		/** Hello Theme */
		'url_ehello_support'   => 'https://wordpress.org/support/theme/hello-elementor',
		'url_ehello_translate' => 'https://translate.wordpress.org/projects/wp-themes/hello-elementor',
		'url_ehello_github'    => 'https://github.com/elementor/hello-elementor-theme',

		/** Layers Theme */
		'url_layers_docs'      => 'https://docs.elementor.com/search?query=layers',
		'url_layers_site'      => 'https://www.layerswp.com/',

	);  // end of array

	return $elementor_links;

}  // end function
