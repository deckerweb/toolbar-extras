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
		'plugins_tab' => 'yes',
	);

	return $builders;

}  // end function


add_action( 'tbex_label_local_dev_color_picker', 'ddw_tbex_label_local_dev_color_picker_block_editor' );
/**
 * Output additional label description for color and feature Block Editor
 *   (Gutenberg) gray color.
 *   Current value: #555d66
 *
 * @since 1.4.0
 *
 * @see plugin file: /includes/admin/views/settings-tab-development.php
 *
 * @return string Echoing markup and content for additional label description.
 */
function ddw_tbex_label_local_dev_color_picker_block_editor() {

	echo sprintf(
		/* translators: %s - a color code in HEX notation, #555d66 */
		'<span class="description tbex-space-top">' . __( 'Block Editor Gray: %s', 'toolbar-extras' ) . '</span>',
		'<div class="bg-local-base bg-local-blockeditor tbex-align-middle"></div><code class="tbex-align-middle">#555d66</code>'
	);

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
		'url_site'           => 'https//wordpress.org/gutenberg/',
		'url_docs'           => 'https://wordpress.org/gutenberg/handbook/',
		'url_videos'         => 'https://wordpress.tv/tag/gutenberg/',

		/** Dev/Contribute */
		'url_docs_design'    => 'https://wordpress.org/gutenberg/handbook/designers-developers/',
		'url_docs_dev'       => 'https://wordpress.org/gutenberg/handbook/contributors/',
		'url_dev_blog'       => 'https://make.wordpress.org/core/tag/gutenberg/',
		'url_code_reference' => 'https://developer.wordpress.org/reference/',

		'url_github'         => 'https://github.com/WordPress/gutenberg',
		'url_github_issues'  => 'https://github.com/WordPress/gutenberg/issues',

		/** Community */
		'url_fb_group'       => 'https://www.facebook.com/groups/161444577756897/',
		'url_blog_gbtimes'   => 'https://gutenbergtimes.com/',
		'url_blog_gbnews'    => 'https://gutenberg.news/',
		'url_tweets'         => 'https://twitter.com/hashtag/gutenberg%20wordpress?f=tweets&vertical=default&src=hash',
		'url_youtube_recent' => 'https://www.youtube.com/results?sp=CAI%253D&search_query=wordpress+gutenberg',

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
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_block_editor_resources() {

	/**
	 * Bail early if resources display is disabled or Block Editor is not the
	 *   default Page Builder.
	 */
	if ( ! ddw_tbex_display_items_resources()
		|| 'block-editor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_block_editor_developers() {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ( ! ddw_tbex_display_items_dev_mode() || ! ddw_tbex_display_items_resources() )
		|| 'block-editor' !== ddw_tbex_get_default_pagebuilder()
	) {
		return;
	}

	/** Block Editor Developers */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'block-editor-developers-docs-design',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Designers &amp; Developers Handbook', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_design' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Designers &amp; Developers Handbook', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'block-editor-developers-docs-dev',
				'parent' => 'block-editor-developers',
				'title'  => esc_attr__( 'Contributors Handbook', 'toolbar-extras' ),
				'href'   => ddw_tbex_get_resource_url( 'block-editor', 'url_docs_dev' ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Contributors Handbook', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
