<?php

// includes/plugins-forms/items-optinmonster

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_optinmonster', 20 );
/**
 * Items for Plugin: OptinMonster API (free/Premium, by OptinMonster Team/ Retyp, LLC)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_optinmonster() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-optinmonster',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'OptinMonster', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=optin-monster-api-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'OptinMonster', 'toolbar-extras' )
			)
		)
	);

		/** Campaigns/ Optins */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-optinmonster-campagins-optins',
				'parent' => 'forms-optinmonster',
				'title'  => esc_attr__( 'Campaigns &amp; Optins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=optin-monster-api-settings&optin_monster_api_view=optins' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Campaigns &amp; Optins', 'toolbar-extras' )
				)
			)
		);

		/** New Campaign */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-optinmonster-new-campagin',
				'parent' => 'forms-optinmonster',
				'title'  => esc_attr__( 'Create New Campaign', 'toolbar-extras' ),
				'href'   => 'https://app.optinmonster.com/campaigns/new/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Create New Campaign', 'toolbar-extras' )
				)
			)
		);

		/** API Credentials */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-optinmonster-api',
				'parent' => 'forms-optinmonster',
				'title'  => esc_attr__( 'API Credentials', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=optin-monster-api-settings&optin_monster_api_view=api' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'API Credentials', 'toolbar-extras' )
				)
			)
		);

		/** Account */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-optinmonster-account',
				'parent' => 'forms-optinmonster',
				'title'  => esc_attr__( 'Account', 'toolbar-extras' ),
				'href'   => 'https://app.optinmonster.com/account/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Account', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-optinmonster-account-overview',
					'parent' => 'forms-optinmonster-account',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
					'href'   => 'https://app.optinmonster.com/account/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-optinmonster-account-integrations',
					'parent' => 'forms-optinmonster-account',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
					'href'   => 'https://app.optinmonster.com/integrations/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Integrations', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-optinmonster-account-sites',
					'parent' => 'forms-optinmonster-account',
					'title'  => esc_attr__( 'Manage Sites', 'toolbar-extras' ),
					'href'   => 'https://app.optinmonster.com/sites/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Manage Sites', 'toolbar-extras' )
					)
				)
			);

		/** Group: Resources for OptinMonster */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-optinmonster-resources',
					'parent' => 'forms-optinmonster',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-contact',
				'optinmonster-contact',
				'group-optinmonster-resources',
				'https://app.optinmonster.com/account/support/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'optinmonster-docs',
				'group-optinmonster-resources',
				'https://optinmonster.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'optinmonster-translate',
				'group-optinmonster-resources',
				'https://translate.wordpress.org/projects/wp-plugins/optinmonster'
			);

			ddw_tbex_resource_item(
				'official-site',
				'optinmonster-site',
				'group-optinmonster-resources',
				'https://optinmonster.com/'
			);

		}  // end if

}  // end function
