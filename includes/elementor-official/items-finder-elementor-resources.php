<?php

// includes/elementor-official/items-finder-elementor-resources

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add the Elementor Resources category to the Elementor Finder.
 *   - Official external resources
 *   - Third-party external resources
 *
 * @since 1.4.0
 */
class DDW_Elementor_Resources_Finder_Category extends \Elementor\Core\Common\Modules\Finder\Base_Category {

	/**
	 * Get title.
	 *
	 * @since 1.4.0
	 *
	 * @access public
	 *
	 * @return string Translateable category title.
	 */
	public function get_title() {

		return _x( 'Elementor Resources - Help, Documentation, Developers', 'Title in Elementor Finder', 'toolbar-extras' );

	}  // end method


	/**
	 * Get category items.
	 *
	 * @since 1.4.0
	 *
	 * @access public
	 *
	 * @uses ddw_tbex_get_resource_url()
	 * @uses ddw_tbex_is_elementor_pro_active()
	 *
	 * @param array $options
	 * @return array $items Filterable array of additional Finder items.
	 */
	public function get_category_items( array $options = [] ) {

		$action_name = 'view';
		$action_icon = 'eye';

		/** Array of items */
		$items = [
			'documentation' => [
				'title'       => _x( 'Official Elementor Documentation', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_docs' ),
				'icon'        => 'info',
				'keywords'    => [ 'help', 'support', 'docs', 'documentation', 'faq', 'knowledge base' ],
				'description' => __( 'FAQ, Knowledge Base and Documentation', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_docs' ),
						'icon' => $action_icon,
					],
				],
			],
			'fb-group' => [
				'title'       => _x( 'Elementors Facebook Group', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' ),
				'icon'        => 'comments',
				'keywords'    => [ 'facebook', 'group', 'elementors', 'community', 'help' ],
				'description' => __( 'Official community user group to help each other', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_fb_group' ),
						'icon' => $action_icon,
					],
				],
			],
			'free-support' => [
				'title'       => _x( 'Free Support for Elementor', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_free_support' ),
				'icon'        => 'wordpress',
				'keywords'    => [ 'wordpress.org', 'support', 'free', 'forum', 'help' ],
				'description' => __( 'Support forum on WordPress.org for the plugin', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_free_support' ),
						'icon' => $action_icon,
					],
				],
			],
			'translations' => [
				'title'       => _x( 'Translations for Elementor', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_translations' ),
				'icon'        => 'wordpress',
				'keywords'    => [ 'wordpress.org', 'translations', 'translate', 'translators', 'languages', 'glotpress', 'polyglots', 'portal' ],
				'description' => __( 'Translate the Elementor base plugin on WordPress.org', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_translations' ),
						'icon' => $action_icon,
					],
				],
			],
			'fb-translators' => [
				'title'       => _x( 'Elementor Translators Facebook Group', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_fb_translators' ),
				'icon'        => 'comments',
				'keywords'    => [ 'facebook', 'translations', 'translate', 'translators', 'languages', 'community' ],
				'description' => __( 'Official translators community group', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_fb_translators' ),
						'icon' => $action_icon,
					],
				],
			],
			'developers' => [
				'title'       => _x( 'Elementor Developer Documentation', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_developers' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'developers', 'docs', 'documentation', 'code', 'development' ],
				'description' => __( 'Official developer documentation - extensive resource', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_developers' ),
						'icon' => $action_icon,
					],
				],
			],
			'code-reference' => [
				'title'       => _x( 'Elementor Code Reference', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_code_reference' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'developers', 'docs', 'documentation', 'code', 'reference', 'classes', 'functions', 'hooks', 'filters', 'development' ],
				'description' => __( 'Official code reference of all classes, functions, hooks and filters', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_code_reference' ),
						'icon' => $action_icon,
					],
				],
			],
			'github' => [
				'title'       => _x( 'Elementor GitHub Development', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_github' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'github', 'developers', 'development', 'repo', 'repository' ],
				'description' => __( 'Official plugin development repository', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_github' ),
						'icon' => $action_icon,
					],
				],
			],
			'github-issues' => [
				'title'       => _x( 'Elementor Issue Tracker', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_github_issues' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'github', 'developers', 'development', 'issues', 'bugs', 'errors', 'report', 'tracker' ],
				'description' => __( 'Official issue tracker for bugs, feature requests, development milestones', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_github_issues' ),
						'icon' => $action_icon,
					],
				],
			],
			'blog' => [
				'title'       => _x( 'Elementor Blog', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_blog' ),
				'icon'        => 'post',
				'keywords'    => [ 'elementor', 'blog', 'news' ],
				'description' => __( 'Official blog with news, tutorials, interviews and more', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_blog' ),
						'icon' => $action_icon,
					],
				],
			],
			'videos' => [
				'title'       => _x( 'Elementor Video Tutorials', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_videos' ),
				'icon'        => 'youtube',
				'keywords'    => [ 'elementor', 'videos', 'youtube', 'channel', 'tutorials' ],
				'description' => __( 'Official YouTube Channel with release and tuturial videos', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_videos' ),
						'icon' => $action_icon,
					],
				],
			],
		];

		/** For: Toolbar Extras for MainWP Add-On */
		if ( ddw_tbex_is_elementor_pro_active() ) {

			$items[ 'epro-docs' ] = [
				'title'       => _x( 'Elementor Pro Documentation', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_docs_pro' ),
				'icon'        => 'pro-icon',
				'keywords'    => [ 'pro', 'elementor', 'docs', 'documentation', 'knowledge base' ],
				'description' => __( 'Specific documentation for the Elementor Pro version', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_docs_pro' ),
						'icon' => $action_icon,
					],
				],
			];

			$items[ 'epro-translations' ] = [
				'title'       => _x( 'Elementor Pro Translations Portal', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_translations_pro' ),
				'icon'        => 'pro-icon',
				'keywords'    => [ 'pro', 'elementor', 'translations', 'translate', 'translators', 'languages', 'glotpress', 'polyglots', 'portal' ],
				'description' => __( 'Translate the Elementor Pro version', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_translations_pro' ),
						'icon' => $action_icon,
					],
				],
			];

			$items[ 'epro-myaccount' ] = [
				'title'       => _x( 'Elementor Pro My Account', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_resource_url( 'elementor', 'url_myaccount' ),
				'icon'        => 'elementor-square',
				'keywords'    => [ 'pro', 'elementor', 'account', 'license', 'download' ],
				'description' => __( 'Manage your account, license etc. for Elementor Pro version', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_resource_url( 'elementor', 'url_myaccount' ),
						'icon' => $action_icon,
					],
				],
			];

		}  // end if

		/** Return items array, filterable */
		return apply_filters(
			'tbex/filter/elementor_finder/items/elementor_resources',
			$items
		);

	}  // end method

}  // end of class
