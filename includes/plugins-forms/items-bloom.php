<?php

// includes/plugins-forms/items-bloom

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_bloom', 20 );
/**
 * Items for Plugin: Bloom (Premium, by Elegant Themes)
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_bloom() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-bloom',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Bloom', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=et_bloom_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Bloom', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-bloom-optins',
				'parent' => 'forms-bloom',
				'title'  => esc_attr__( 'Optins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=et_bloom_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Optins', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-bloom-email-accounts',
				'parent' => 'forms-bloom',
				'title'  => esc_attr__( 'Email Accounts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=et_bloom_options#tab_et_dashboard_tab_content_header_accounts' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Email Accounts', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-bloom-statistics',
				'parent' => 'forms-bloom',
				'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=et_bloom_options#tab_et_dashboard_tab_content_header_stats' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Statistics', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-bloom-import-export',
				'parent' => 'forms-bloom',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=et_bloom_options#tab_et_dashboard_tab_content_header_importexport' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Bloom */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-bloom-resources',
					'parent' => 'forms-bloom',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-contact',
				'bloom-contact',
				'group-bloom-resources',
				'https://www.elegantthemes.com/contact/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'bloom-facebook',
				'group-bloom-resources',
				'https://www.facebook.com/groups/ElegantThemesUserCommunity/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'bloom-site',
				'group-bloom-resources',
				'https://www.elegantthemes.com/plugins/bloom/'
			);

		}  // end if

}  // end function
