<?php

// includes/plugins-forms/items-convertplus

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_convertplus', 20 );
/**
 * Items for Plugin: Convert Plus (Premium, by Brainstorm Force)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_convertplus() {

	/** Get Convert Plus Add-On Modules */
	$cp_addons = get_option( 'convert_plug_modules' );

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-convertplus',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Convert Plus', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=convert-plus' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Convert Plus', 'toolbar-extras' )
			)
		)
	);

		/** Dashboard */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-dashboard',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-plus' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
				)
			)
		);

		/** Optin Types */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-types',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Optin Types', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Optin Types', 'toolbar-extras' )
				)
			)
		);

			if ( in_array( 'Modal_Popup', $cp_addons ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-convertplus-types-popup',
						'parent' => 'forms-convertplus-types',
						'title'  => esc_attr__( 'Modal Popups', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=smile-modal-designer' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Modal Popups', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( in_array( 'Info_Bar', $cp_addons ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-convertplus-types-infobar',
						'parent' => 'forms-convertplus-types',
						'title'  => esc_attr__( 'Info Bars', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=smile-info_bar-designer' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Info Bars', 'toolbar-extras' )
						)
					)
				);

			}  // end if

			if ( in_array( 'Slide_In_Popup', $cp_addons ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'forms-convertplus-types-slidein',
						'parent' => 'forms-convertplus-types',
						'title'  => esc_attr__( 'Slide Ins', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=smile-slide_in-designer' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Slide Ins', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** Connects */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-connects',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Connects Contact Manager', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=contact-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Connects Contact Manager', 'toolbar-extras' )
				)
			)
		);

		/** Google Fonts */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-googlefonts',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Google Fonts', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=bsf-google-font-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Fonts', 'toolbar-extras' )
				)
			)
		);

		/** Modules */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-modules',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-plus&view=modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

		/** Plugin's settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertplus-settings',
				'parent' => 'forms-convertplus',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-plus&view=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Convert Plus */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-convertplus-resources',
					'parent' => 'forms-convertplus',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-contact',
				'convertplus-contact',
				'group-convertplus-resources',
				'https://www.convertplug.com/plus/support/submit-a-ticket/'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'convertplus-kb',
				'group-convertplus-resources',
				'https://www.convertplug.com/plus/docs/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'convertplus-site',
				'group-convertplus-resources',
				'https://www.convertplug.com/plus/'
			);

		}  // end if

}  // end function
