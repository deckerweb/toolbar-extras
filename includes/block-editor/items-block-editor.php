<?php

// includes/block-editor/items-block-editor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'tbex_filter_get_pagebuilders', 'ddw_tbex_register_pagebuilder_block_editor' );
/**
 * Register Block Editor (Gutenberg) as a "Page Builder".
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_btcplugin_active()
 *
 * @param array $builders Holds array of all registered Page Builders.
 * @return array Tweaked array of Registered Page Builders.
 */
function ddw_tbex_register_pagebuilder_block_editor( array $builders ) {

	$post_type = ddw_tbex_is_btcplugin_active() ? 'wp_block' : 'page';

	$builders[ 'block-editor' ] = array(

		/* translators: Label for registered Page Builder, used on plugin's settings page */
		'label'       => esc_attr_x( 'Block Editor', 'Label, used on plugin\'s settings page', 'toolbar-extras' ),

		/* translators: (Linked) Title for registered Page Builder */
		'title'       => esc_attr_x( 'Block Editor', 'Block Editor title name', 'toolbar-extras' ),

		/* translators: Title attribute for registered Page Builder */
		'title_attr'  => esc_attr_x( 'WordPress Block Editor (Gutenberg)', 'Block Editor title attribute name', 'toolbar-extras' ),

		'admin_url'   => esc_url( apply_filters( 'tbex_filter_block_editor_admin_url', admin_url( 'edit.php?post_type=' . $post_type ) ) ),
		'color'       => '#555d66',
		'color_name'  => __( 'Block Editor Grey', 'toolbar-extras' ),
		'plugins_tab' => 'yes',
	);

	return $builders;

}  // end function


add_action( 'admin_menu', 'ddw_tbex_wpblock_posttype_add_menu' );
/**
 * Add the appropriate admin menu - using the post type list table page as
 *   the callback.
 *
 * @since 1.4.3
 *
 * @see WP Core /wp-includes/post.php for 'wp_block' capabilities
 *
 * @uses add_menu_page()
 * @uses add_submenu_page()
 */
function ddw_tbex_wpblock_posttype_add_menu() {
	
	/** Add "Blocks" top-level Admin menu, below "Comments" */
    add_menu_page(
        _x( 'Reusable Blocks', 'Admin page title', 'toolbar-extras' ),
        _x( 'Blocks', 'Admin menu label', 'toolbar-extras' ),
        'publish_posts',
        'edit.php?post_type=wp_block',
        '',
        'dashicons-screenoptions',
        '25.1'	// directly after comments
    );

    /** "Blocks" submenu: "Add New" (Reusable Block) */
    add_submenu_page(
    	'edit.php?post_type=wp_block',
        _x( 'Add New Reusable Block', 'Admin page title', 'toolbar-extras' ),
        _x( 'Add New', 'Admin menu label', 'toolbar-extras' ),
        'publish_posts',
        'post-new.php?post_type=wp_block'
    );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_block_editor_core', 150 );
/**
 * Items for Block Editor (WordPress default Editor since WP 5.0+).
 *
 * @since 1.4.0
 * @since 1.4.3 More items and refinements.
 *
 * @see plugin file, /includes/block-editor-addons/items-builder-template-categories.php
 *
 * @uses ddw_tbex_string_block_editor()
 * @uses ddw_tbex_display_items_new_content()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_block_editor_core( $admin_bar ) {

	$post_type = 'wp_block';

	$admin_bar->add_node(
		array(
			'id'     => 'blockeditor-reusable-blocks',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Reusable Blocks', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_block_editor() . ': ' . esc_attr__( 'Reusable Blocks', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'blockeditor-reusable-blocks-all',
				'parent' => 'blockeditor-reusable-blocks',
				'title'  => esc_attr__( 'All Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_block_editor() . ': ' . esc_attr__( 'All Reusable Blocks', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'blockeditor-reusable-blocks-new',
				'parent' => 'blockeditor-reusable-blocks',
				'title'  => esc_attr__( 'New Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_block_editor() . ': ' . esc_attr__( 'Add New Reusable Block', 'toolbar-extras' ),
				)
			)
		);

	/**
	 * For: New Content group
	 *   Note: This optionally filters the existing item (via "Gutenberg" plugin
	 *         for example).
	 */
	if ( ddw_tbex_display_items_new_content() ) {

		$admin_bar->add_node(
			array(
				'id'     => 'new-' . $post_type,
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Reusable Block', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $post_type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_block_editor() . ': ' . esc_attr__( 'Add New Reusable Block', 'toolbar-extras' ),
				)
			)
		);

	}  // end function

}  // end function


/**
 * Collection of external resource links for Block Editor (Gutenberg).
 *   Note: This is the central place where to set/ change these links. They are
 *   then managed for displaying and using via ddw_tbex_get_resource_url().
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_get_resource_url() in /includes/functions-global.php
 *
 * @return array $block_editor_links Array of external resource links.
 */
function ddw_tbex_resources_block_editor() {

	$block_editor_links = array(

		/** Official */
		'url_site'            => 'https//wordpress.org/gutenberg/',
		'url_docs'            => 'https://developer.wordpress.org/block-editor/',
		'url_videos'          => 'https://wordpress.tv/tag/gutenberg/',

		/** Dev/Contribute */
		'url_docs_design'     => 'https://developer.wordpress.org/block-editor/designers/',
		'url_docs_dev'        => 'https://developer.wordpress.org/block-editor/developers/',
		'url_docs_contribute' => 'https://developer.wordpress.org/block-editor/contributors/',
		'url_dev_blog'        => 'https://make.wordpress.org/core/tag/gutenberg/',
		'url_code_reference'  => 'https://developer.wordpress.org/reference/',

		'url_github'          => 'https://github.com/WordPress/gutenberg',
		'url_github_issues'   => 'https://github.com/WordPress/gutenberg/issues',

		/** Community */
		'url_fb_group'        => 'https://www.facebook.com/groups/161444577756897/',
		'url_blog_gbtimes'    => 'https://gutenbergtimes.com/',
		'url_blog_gbnews'     => 'https://gutenberg.news/',
		'url_tweets'          => 'https://twitter.com/hashtag/gutenberg%20wordpress?f=tweets&vertical=default&src=hash',
		'url_youtube_recent'  => 'https://www.youtube.com/results?sp=CAI%253D&search_query=wordpress+gutenberg',
		'url_wpb_reusable'    => 'https://www.wpbeginner.com/beginners-guide/how-to-create-a-reusable-block-in-wordpress/',

	);  // end of array

	return $block_editor_links;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_block_editor_resources', 99 );
/**
 * Add Block Editor (Gutenberg) external resources items.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_string_block_editor_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 * @uses ddw_tbex_meta_rel()
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_string_block_editor_community()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_block_editor_resources( $admin_bar ) {

	/**
	 * Bail early if resources display is disabled or Block Editor is not the
	 *   default Page Builder.
	 */
	if ( ! ddw_tbex_display_items_resources()
		|| 'block-editor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'block-editor-resources',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_block_editor_resources(),
			'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_block_editor_resources()
			)
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'block-editor-resources-docs',
			'block-editor-resources',
			ddw_tbex_get_resource_url( 'block-editor', 'url_docs' )
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-resources-reusable-blocks',
				'parent' => 'block-editor-resources',
				'title'  => esc_attr__( 'Reusable Blocks', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_wpb_reusable' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Reusable Blocks', 'toolbar-extras' )
				)
			)
		);

		ddw_tbex_resource_item(
			'videos',
			'block-editor-resources-videos',
			'block-editor-resources',
			ddw_tbex_get_resource_url( 'block-editor', 'url_videos' )
		);

		ddw_tbex_resource_item(
			'official-site',
			'block-editor-resources-site',
			'block-editor-resources',
			ddw_tbex_get_resource_url( 'block-editor', 'url_site' )
		);

		ddw_tbex_resource_item(
			'github',
			'block-editor-resources-github',
			'block-editor-resources',
			ddw_tbex_get_resource_url( 'block-editor', 'url_github' )
		);

	/** Action Hook: After Block Editor Resources */
	do_action( 'tbex_after_block_editor_resources' );

	/** Block Editor Community */
	$admin_bar->add_node(
		array(
			'id'     => 'block-editor-community',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_block_editor_community(),
			'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_fb_group' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_block_editor_community()
			)
		)
	);

		ddw_tbex_resource_item(
			'facebook-group',
			'block-editor-community-facebook',
			'block-editor-community',
			ddw_tbex_get_resource_url( 'block-editor', 'url_fb_group' )
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-community-gutenberg-news',
				'parent' => 'block-editor-community',
				'title'  => esc_attr__( 'Gutenberg News', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_blog_gbnews' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Gutenberg News', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-community-gutenberg-times',
				'parent' => 'block-editor-community',
				'title'  => esc_attr__( 'Gutenberg Times', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_blog_gbtimes' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Gutenberg Times', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-community-tweets-hashtag',
				'parent' => 'block-editor-community',
				'title'  => esc_attr__( 'Latest Tweets', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_tweets' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Latest Tweets', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-community-youtube-recent',
				'parent' => 'block-editor-community',
				'title'  => esc_attr__( 'Recent YouTube Videos', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_youtube_recent' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Recent YouTube Videos', 'toolbar-extras' )
				)
			)
		);

		ddw_tbex_resource_item(
			'github-issues',
			'block-editor-community-github-issues',
			'block-editor-community',
			ddw_tbex_get_resource_url( 'block-editor', 'url_github_issues' )
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_block_editor_developers', 99 );
/**
 * Add Block Editor (Gutenberg) external developers items.
 *   NOTE: Only when Dev Mode & Resources are activated.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_string_block_editor_developers()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 * @uses ddw_tbex_meta_rel()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_block_editor_developers( $admin_bar ) {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ( ! ddw_tbex_display_items_dev_mode() || ! ddw_tbex_display_items_resources() )
		|| 'block-editor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return;
	}

	/** Block Editor Developers */
	$admin_bar->add_node(
		array(
			'id'     => 'block-editor-developers',
			'parent' => 'group-pagebuilder-resources',
			'title'  => ddw_tbex_string_block_editor_developers(),
			'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_design' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_block_editor_developers()
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-developers-docs-design',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Developers Handbook', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_dev' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Developers Handbook', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-developers-docs-design',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Designers Handbook', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_design' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Designers Handbook', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-developers-docs-dev',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Contributors Handbook', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_contribute' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Contributors Handbook', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'block-editor-developers-dev-blog',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Development Blog', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_dev_blog' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Development Blog', 'toolbar-extras' )
				)
			)
		);

		ddw_tbex_resource_item(
			'code-reference',
			'block-editor-developers-code-reference',
			'block-editor-developers',
			ddw_tbex_get_resource_url( 'block-editor', 'url_code_reference' )
		);

}  // end function
