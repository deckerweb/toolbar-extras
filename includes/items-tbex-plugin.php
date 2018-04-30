<?php

// includes/items-tbex-plugin.php

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_plugin_settings_resources', 25 );
/**
 * Items in the type of "Manage Content"
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_plugin_settings_resources() {

	$test_settings = TRUE;

	/** Plugin settings for Toolbar Extras */
	if ( $test_settings ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-settings',
				'parent' => 'tbex-sitegroup-plsettings',
				'title'  => esc_attr_x( 'Toolbar Settings', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras' ) ),
				'meta'   => array(
					'target' => '',
					/* translators: Title attribute for Toolbar Extras "Plugin settings" link */
					'title'  => esc_attr__( 'Toolbar Extras Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-settings-general',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'General', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "General" settings link */
						'title'  => esc_attr_x( 'General', 'For Toolbar Extras Plugin', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-settings-tweaks',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'Smart Tweaks', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=smart-tweaks' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "General" settings link */
						'title'  => esc_attr_x( 'Smart Tweaks', 'For Toolbar Extras Plugin', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-settings-development',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'Development', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=development' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "Development" settings link */
						'title'  => esc_attr_x( 'Development', 'For Toolbar Extras Plugin', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-settings-aboutsupport',
					'parent' => 'tbex-settings',
					'title'  => esc_attr_x( 'About &amp; Support', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
					'meta'   => array(
						'target' => '',
						/* translators: Title attribute for Toolbar Extras "About & Support" settings link */
						'title'  => esc_attr_x( 'About &amp; Support', 'For Toolbar Extras Plugin', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** For: WP Logo section - About */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-about',
			'parent' => 'wp-logo',
			'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=about-support' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'About Toolbar Extras', 'toolbar-extras' )
			)
		)
	);

	/** Resources for Toolbar Extras */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-resources',
				'parent' => 'tbex-sitegroup-plsettings',
				'title'  => esc_attr_x( 'Support &amp; Resources', 'For Toolbar Extras Plugin', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr_x( 'Toolbar Extras Support &amp; Resources', 'For Toolbar Extras Plugin', 'toolbar-extras' )
				)
			)
		);

		ddw_tbex_resource_item(
			'support-forum',
			'tbex-support',
			'tbex-resources',
			'https://wordpress.org/support/plugin/toolbar-extras'
		);

		ddw_tbex_resource_item(
			'documentation',
			'tbex-docs',
			'tbex-resources',
			'https://toolbarextras.com/docs/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'tbex-translate',
			'tbex-resources',
			'https://translate.wordpress.org/projects/wp-plugins/toolbar-extras'
		);

		ddw_tbex_resource_item(
			'github',
			'tbex-github',
			'tbex-resources',
			'https://github.com/deckerweb/toolbar-extras'
		);

		ddw_tbex_resource_item(
			'official-site',
			'tbex-site',
			'tbex-resources',
			'https://toolbarextras.com/'
		);

	}  // end if

}  // end function