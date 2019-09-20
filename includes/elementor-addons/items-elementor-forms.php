<?php

// includes/elementor-addons/items-elementor-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_elementorforms', 100 );
/**
 * Items for Add-On: Elementor Forms (Premium, by Elementor Forms)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_elementorforms( $admin_bar ) {

	$title = sprintf(
		/* translators: %s - Name of Elementor page builder */
		esc_attr__( '%s Forms', 'toolbar-extras' ),
		ddw_tbex_string_elementor()
	);

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-elementorforms',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=eforms-list.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $title,
			)
		)
	);

		/**
		 * Add each individual form as an item. Database query is necessary.
		 * @since 1.3.1
		 */
		global $wpdb;
    	$ef_table_name = $wpdb->prefix . 'eforms';
    	$forms         = $wpdb->get_results( "SELECT form_id, form_title FROM $ef_table_name" );

		/** Proceed only if there are any forms */
		if ( $forms ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-elementorforms-entries',
					'parent' => 'ao-elementorforms',
				)
			);

			foreach ( $forms as $form ) {

				$form_id    = absint( $form->form_id );
				$form_title = esc_attr( $form->form_title );
				$form_url   = urlencode( $form_title );

				$admin_bar->add_node(
					array(
						'id'     => 'ao-elementorforms-form-' . $form_id,
						'parent' => 'group-elementorforms-entries',
						'title'  => $form_title,
						'href'   => esc_url( admin_url( 'admin.php?page=eforms-list.php&title=' . $form_url ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Form Entries', 'toolbar-extras' ) . ': ' . $form_title,
						)
					)
				);

			}  // end foreach

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementorforms-entries-all',
				'parent' => 'ao-elementorforms',
				'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=eforms-list.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementorforms-settings',
				'parent' => 'ao-elementorforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ef_settings_page' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-elementorforms-license',
				'parent' => 'ao-elementorforms',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=elementor-forms-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Resources for plugin */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-elementorforms-resources',
					'parent' => 'ao-elementorforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'elementorforms-contact',
				'group-elementorforms-resources',
				'https://elementorforms.com/open-a-ticket/'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'elementorforms-fbgroup',
				'group-elementorforms-resources',
				'https://www.facebook.com/groups/elementorforms/'
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'elementorforms-youtube-tutorials',
				'group-elementorforms-resources',
				'https://www.youtube.com/channel/UCP6jncVaPNuPmC0ecwDN5aQ/videos'
			);

			ddw_tbex_resource_item(
				'changelog',
				'elementorforms-changelog',
				'group-elementorforms-resources',
				'https://elementorforms.com/changelog/',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'elementorforms-site',
				'group-elementorforms-resources',
				'https://elementorforms.com/'
			);

		}  // end if

}  // end function
