<?php

// includes/plugins-forms/items-contactformx

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_contactformx' );
/**
 * Items for Plugin: Contact Form X (free, by Jeff Starr)
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_contactformx() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-contactformx',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Contact Form X', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=contactformx' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Contact Form X', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-contactformx-email',
				'parent' => 'forms-contactformx',
				'title'  => esc_attr__( 'Email', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=contactformx&tab=tab1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Email', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-contactformx-form',
				'parent' => 'forms-contactformx',
				'title'  => esc_attr__( 'Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=contactformx&tab=tab2' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Form', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-contactformx-customize',
				'parent' => 'forms-contactformx',
				'title'  => esc_attr__( 'Customize', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=contactformx&tab=tab3' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Customize', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-contactformx-appearance',
				'parent' => 'forms-contactformx',
				'title'  => esc_attr__( 'Appearance', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=contactformx&tab=tab4' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Appearance', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-contactformx-advanced',
				'parent' => 'forms-contactformx',
				'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=contactformx&tab=tab5' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
				)
			)
		);

		/** Optionally, let other Contact Form X Add-Ons hook in */
		do_action( 'tbex_after_contactformx_settings' );

		/** Group: Resources for contactformx */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-contactformx-resources',
					'parent' => 'forms-contactformx',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'contactformx-support',
				'group-contactformx-resources',
				'https://wordpress.org/support/plugin/contact-form-x'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'contactformx-translate',
				'group-contactformx-resources',
				'https://translate.wordpress.org/projects/wp-plugins/contact-form-x'
			);

		}  // end if

}  // end function
