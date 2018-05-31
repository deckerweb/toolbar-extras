<?php

// includes/plugins/items-updraftplus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_updraftplus', 10 );
/**
 * Items for Plugin: UpdraftPlus (free, by Team Updraft, David Anderson)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_updraftplus() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'updraftplus',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'UpdraftPlus', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=updraftplus' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'UpdraftPlus', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'updraftplus-status',
				'parent' => 'updraftplus',
				'title'  => esc_attr__( 'Backup Now', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=updraftplus&tab=status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Now', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'updraftplus-archive',
				'parent' => 'updraftplus',
				'title'  => esc_attr__( 'Backup Archive', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=updraftplus&tab=backups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backup Archive', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'updraftplus-settings',
				'parent' => 'updraftplus',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=updraftplus&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'updraftplus-tools',
				'parent' => 'updraftplus',
				'title'  => esc_attr__( 'Advanced Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=updraftplus&tab=expert' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Tools', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for UpdraftPlus */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar']->add_group(
				array(
					'id'     => 'group-updraftplus-resources',
					'parent' => 'updraftplus',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'updraftplus-support',
				'group-updraftplus-resources',
				'https://wordpress.org/support/updraftplus'
			);

			ddw_tbex_resource_item(
				'documentation',
				'updraftplus-docs',
				'group-updraftplus-resources',
				'https://snapcreek.com/duplicator/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'updraftplus-translate',
				'group-updraftplus-resources',
				'https://translate.wordpress.org/projects/wp-plugins/updraftplus'
			);

			ddw_tbex_resource_item(
				'official-site',
				'updraftplus-site',
				'group-updraftplus-resources',
				'https://updraftplus.com/'
			);

		}  // end if

}  // end function