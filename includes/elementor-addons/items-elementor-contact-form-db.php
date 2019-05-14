<?php

// includes/elementor-addons/items-elementor-contact-form-db

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementor_contact_form_db', 100 );
/**
 * Items for Add-On: Elementor Contact Form DB (free, by Sean Barton)
 *
 * @since 1.0.0
 * @since 1.4.3 Added new items & resources.
 *
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementor_contact_form_db( $admin_bar ) {

	$type = 'elementor_cf_db';

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-ecfdb',
			'parent' => 'tbex-sitegroup-forms',
			/* translators: %s - Name of Elementor page builder */
			'title'  => sprintf( esc_attr__( '%s Forms', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				/* translators: %s - Name of Elementor page builder */
				'title'  => sprintf( esc_attr__( '%s Forms', 'toolbar-extras' ), ddw_tbex_string_elementor() ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-ecfdb-all',
				'parent' => 'ao-ecfdb',
				'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Submissions', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-ecfdb-export',
				'parent' => 'ao-ecfdb',
				'title'  => esc_attr__( 'Export Submissions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sb_elem_cfd' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export Submissions', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-ecfdb-settings',
				'parent' => 'ao-ecfdb',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=sb_elem_cfd_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for plugin */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-ecfdb-resources',
					'parent' => 'ao-ecfdb',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ecfdb-support',
				'group-ecfdb-resources',
				'https://wordpress.org/support/plugin/premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ecfdb-translations',
				'group-ecfdb-resources',
				'https://translate.wordpress.org/projects/wp-plugins/premium-addons-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ecfdb-site',
				'group-ecfdb-resources',
				'https://www.sean-barton.co.uk/2017/04/elementor-contact-form-db-free-plugin/'
			);

		}  // end if

}  // end function
