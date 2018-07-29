<?php

// includes/elementor-addons/items-powerpack-dwe

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_dashboard_welcome_elementor', 100 );
/**
 * Items for Add-On: Dashboard Welcome for Elementor (free, by IdeaBox Creations)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_dashboard_welcome_elementor() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Dashboard Welcome for Elementor Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-dashboardwelcome',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Dashboard Welcome', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=dwe-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Dashboard Welcome for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-dashboardwelcome-templates',
				'parent' => 'ao-dashboardwelcome',
				'title'  => esc_attr__( 'Select Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=dwe-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Select Templates', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Dashboard Welcome for Elementor */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-dashboardwelcome-resources',
					'parent' => 'ao-dashboardwelcome',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'dashboardwelcome-support',
				'group-dashboardwelcome-resources',
				'https://wordpress.org/support/plugin/dashboard-welcome-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'dashboardwelcome-translate',
				'group-dashboardwelcome-resources',
				'https://translate.wordpress.org/projects/wp-plugins/dashboard-welcome-for-elementor'
			);

			ddw_tbex_resource_item(
				'github',
				'dashboardwelcome-github',
				'group-dashboardwelcome-resources',
				'https://github.com/helloideabox/dashboard-welcome-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'dashboardwelcome-site',
				'group-dashboardwelcome-resources',
				'https://powerpackelements.com/dashboard-welcome-elementor/'
			);

		}  // end if

}  // end function