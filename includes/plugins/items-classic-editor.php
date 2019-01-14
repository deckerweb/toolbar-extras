<?php

// includes/plugins/items-classic-editor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_classic_editor', 10 );
/**
 * Site items for Plugin: Classic Editor (free, by WordPress Contributors)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_classic_editor() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-classic-editor',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Classic Editor', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-writing.php#classic-editor-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Classic Editor', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-classic-editor-settings',
				'parent' => 'tbex-classic-editor',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-writing.php#classic-editor-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-classiceditor-resources',
					'parent' => 'tbex-classic-editor',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'classiceditor-support',
				'group-classiceditor-resources',
				'https://wordpress.org/support/plugin/classic-editor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'classiceditor-translate',
				'group-classiceditor-resources',
				'https://translate.wordpress.org/projects/wp-plugins/classic-editor'
			);

			ddw_tbex_resource_item(
				'github',
				'classiceditor-github',
				'group-classiceditor-resources',
				'https://github.com/WordPress/classic-editor'
			);

		}  // end if

}  // end function
