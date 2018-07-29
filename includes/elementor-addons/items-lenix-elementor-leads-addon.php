<?php

// includes/elementor-addons/items-lenix-elementor-leads-addon

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_lenix_leads', 100 );
/**
 * Items for Add-On: Lenix Elementor Leads addon (free, by Lenix)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_elementor()
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_lenix_leads() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-lenixleads',
			'parent' => 'tbex-sitegroup-forms',
			/* translators: %s - Name of Elementor page builder */
			'title'  => sprintf( esc_attr__( '%s Leads', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-leads' ) ),
			'meta'   => array(
				'target' => '',
				/* translators: %s - Name of Elementor page builder */
				'title'  => sprintf( esc_attr__( '%s Leads', 'toolbar-extras' ), ddw_tbex_string_elementor() )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-lenixleads-all',
				'parent' => 'ao-lenixleads',
				'title'  => esc_attr__( 'All Leads', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-leads' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Leads', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for plugin */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-lenixleads-resources',
					'parent' => 'ao-lenixleads',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'lenixleads-support',
				'group-lenixleads-resources',
				'https://wordpress.org/support/plugin/lenix-elementor-leads-addon'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'lenixleads-translate',
				'group-lenixleads-resources',
				'https://translate.wordpress.org/projects/wp-plugins/lenix-elementor-leads-addon'
			);

		}  // end if

}  // end function
