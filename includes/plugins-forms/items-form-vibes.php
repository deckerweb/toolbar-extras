<?php

// includes/plugins-forms/items-form-vibes

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_form_vibes' );
/**
 * Items for Plugin: Form Vibes (free, by WPVibes)
 *
 * @since 1.4.4
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_form_vibes( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-formvibes',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Form Vibes', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=fv-leads' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Form Vibes', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-formvibes-data-leads',
				'parent' => 'forms-formvibes',
				'title'  => esc_attr__( 'Entries &amp; Leads', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fv-leads' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Form Entries &amp; Leads', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-formvibes-analytics',
				'parent' => 'forms-formvibes',
				'title'  => esc_attr__( 'Analytics &amp; Reports', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=fv-analytics' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Form Analytics &amp; Reports', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for Advanced Forms */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-formvibes-resources',
					'parent' => 'forms-formvibes',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'formvibes-support',
				'group-formvibes-resources',
				'https://wordpress.org/support/plugin/form-vibes'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'formvibes-translate',
				'group-formvibes-resources',
				'https://translate.wordpress.org/projects/wp-plugins/form-vibes'
			);

		}  // end if

}  // end function
