<?php

// includes/plugins/items-cfdb

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_cfdb', 100 );
/**
 * Items for Add-On: Contact Form DB (free, by Michael Simpson)
 *
 * @since  1.2.0
 *
 * @uses   ddw_tbex_string_elementor()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_cfdb() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-cfdb',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Contact Form DB', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=CF7DBPluginSubmissions' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Contact Form DB', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-cfdb-all',
				'parent' => 'ao-cfdb',
				'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CF7DBPluginSubmissions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-cfdb-advanced',
				'parent' => 'ao-cfdb',
				'title'  => esc_attr__( 'Shortcode, Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CF7DBPluginShortCodeBuilder' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Shortcode, Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-cfdb-settings',
				'parent' => 'ao-cfdb',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=CF7DBPluginSettings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for plugin */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-cfdb-resources',
					'parent' => 'ao-cfdb',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'github',
				'cfdb-github',
				'group-cfdb-resources',
				'https://github.com/mdsimpson/contact-form-7-to-database-extension'
			);

			ddw_tbex_resource_item(
				'official-site',
				'cfdb-site',
				'group-cfdb-resources',
				'https://cfdbplugin.com/'
			);

		}  // end if

}  // end function
