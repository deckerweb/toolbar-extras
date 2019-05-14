<?php

// includes/elementor-official/items-finder-tbex

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add the Toolbar Extras category to the Elementor Finder.
 *   - Settings pages
 *   - Plugin resources
 *   - Add-On settings
 *
 * @since 1.4.0
 */
class DDW_Toolbar_Extras_Finder_Category extends \Elementor\Core\Common\Modules\Finder\Base_Category {

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

		return _x( 'Add-On: Toolbar Extras', 'Title in Elementor Finder', 'toolbar-extras' );

	}  // end method


	/**
	 * Get category items.
	 *
	 * @since 1.4.0
	 * @since 1.4.3 Added "Add-Ons" tab support.
	 *
	 * @access public
	 *
	 * @uses ddw_tbex_get_info_url()
	 * @uses ddw_tbex_is_addon_mainwp_active()
	 *
	 * @param array $options
	 * @return array $items Filterable array of additional Finder items.
	 */
	public function get_category_items( array $options = [] ) {

		/** Set "Toolbar" string */
		$string_toolbar = __( 'Toolbar', 'toolbar-extras' ) . ': ';

		$action_name = 'view';
		$action_icon = 'eye';

		/** Array of items */
		$items = [
			'general' => [
				'title'       => $string_toolbar . _x( 'General Settings', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=general' ),
				'icon'        => 'settings',
				'keywords'    => [ 'toolbar', 'admin bar', 'general', 'settings' ],
				'description' => __( 'Set items display, labels, icons, link behavior for the Toolbar', 'toolbar-extras' ),
			],
			'tweaks' => [
				'title'       => $string_toolbar . _x( 'Smart Tweaks', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ),
				'icon'        => 'hypster',
				'keywords'    => [ 'toolbar', 'admin bar', 'smart tweaks', 'settings' ],
				'description' => __( 'Tweak behavior of WordPress and third-party plugin items for the Toolbar', 'toolbar-extras' ),
			],
			'development' => [
				'title'       => $string_toolbar . _x( 'For Development', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=development' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'toolbar', 'admin bar', 'development', 'settings', 'local', 'enviroment' ],
				'description' => __( 'Setup Local Development Environment &amp; Dev Mode', 'toolbar-extras' ),
			],
			'addons' => [
				'title'       => $string_toolbar . _x( 'Add-Ons', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=addons' ),
				'icon'        => 'plus',
				'keywords'    => [ 'toolbar', 'admin bar', 'addons', 'add-ons', 'plugins', 'extensions' ],
				'description' => __( 'Install Add-On extensions for Toolbar Extras', 'toolbar-extras' ),
			],
			'about-support' => [
				'title'       => $string_toolbar . _x( 'About &amp; Support', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ),
				'icon'        => 'favorite',
				'keywords'    => [ 'toolbar', 'admin bar', 'about', 'support' ],
				'description' => __( 'Get additional support resources and information for the Toolbar Extras plugin', 'toolbar-extras' ),
			],
			'resources' => [
				'title'       => _x( 'Help Resources - Toolbar Extras', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_info_url( 'url_plugin_docs' ),
				'icon'        => 'info',
				'keywords'    => [ 'help', 'support', 'docs', 'documentation', 'faq', 'knowledge base' ],
				'description' => __( 'FAQ, Knowledge Base and Documentation for the plugin', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_info_url( 'url_plugin_docs' ),
						'icon' => $action_icon,
					],
				],
			],
			'fb-group' => [
				'title'       => _x( 'Facebook Group - Toolbar Extras', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_info_url( 'url_fb_group' ),
				'icon'        => 'comments',
				'keywords'    => [ 'facebook', 'community', 'users', 'group', 'help', 'support' ],
				'description' => __( 'Plugin\'s community user group', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_info_url( 'url_fb_group' ),
						'icon' => $action_icon,
					],
				],
			],
			'code-snippets' => [
				'title'       => _x( 'Code Snippets - Toolbar Extras', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => ddw_tbex_get_info_url( 'url_snippets' ),
				'icon'        => 'editor-code',
				'keywords'    => [ 'code snippets', 'snippets', 'developer', 'customize', 'docs' ],
				'description' => __( 'These allow for tweaks and customizations', 'toolbar-extras' ),
				'actions'     => [
					[
						'name' => $action_name,
						'url'  => ddw_tbex_get_info_url( 'url_snippets' ),
						'icon' => $action_icon,
					],
				],
			],
		];

		/** For: Toolbar Extras for MainWP Add-On */
		if ( ddw_tbex_is_addon_mainwp_active() ) {

			$items[ 'tbexmwp-addon' ] = [
				'title'       => _x( 'MainWP Toolbar Add-On', 'Title in Elementor Finder', 'toolbar-extras' ),
				'url'         => admin_url( 'options-general.php?page=toolbar-extras&tab=mainwp' ),
				'icon'        => 'sitemap',
				'keywords'    => [ 'toolbar', 'admin bar', 'mainwp', 'management' ],
				'description' => __( 'Set items display, labels, icons, link behavior for the MainWP Add-On for Toolbar Extras', 'toolbar-extras' ),
			];

		}  // end if

		/** Return items array, filterable */
		return apply_filters(
			'tbex/filter/elementor_finder/items/toolbar_extras',
			$items
		);

	}  // end method

}  // end of class
