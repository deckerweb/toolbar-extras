<?php

// includes/plugins-forms/items-convertpro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_convertpro', 20 );
/**
 * Items for Plugin: Convert Pro (Premium, by Brainstorm Force)
 *
 * @since 1.2.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_convertpro() {

	/** Get enabled Convert Pro Add-On Modules */
	$cp_addons = class_exists( 'CP_Addon_Extension' ) ? CP_Addon_Extension::get_enabled_extension() : array();

	/** Get Convert Pro white label settings */
	$cp_branding = Cp_V2_Loader::get_branding();
	$cp_title    = ( ! empty( $cp_branding[ 'name' ] ) ) ? $cp_branding[ 'name' ] : __( 'Convert Pro', 'toolbar-extras' );

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-convertpro',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr( $cp_title ),
			'href'   => esc_url( admin_url( 'admin.php?page=convert-pro' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr( $cp_title )
			)
		)
	);

		/** Dashboard */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertpro-dashboard',
				'parent' => 'forms-convertpro',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-pro' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' )
				)
			)
		);

		/** Add new */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertpro-new',
				'parent' => 'forms-convertpro',
				'title'  => esc_attr__( 'Create New', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Create New', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-popup',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Modal Popup', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=modal_popup' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Modal Popup', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-infobar',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Info Bar', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=info_bar' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Info Bar', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-slidein',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Slide In', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=slide_in' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Slide In', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-beforeafter',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Before/After', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=before_after' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Before/After', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-incontentform',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New In Content Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=inline' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New In Content Form', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-widgetbox',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Widget Box', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=widget' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Widget Box', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-convertmat',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Convert Mat', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=welcome_mat' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Convert Mat', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-new-fullscreen',
					'parent' => 'forms-convertpro-new',
					'title'  => esc_attr__( 'New Full Screen Popup', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-create-new&view=template&type=full_screen' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Full Screen Popup', 'toolbar-extras' )
					)
				)
			);

		/** Addon Module: A/B Test */
		if ( array_key_exists( 'ab-test', $cp_addons ) && FALSE != $cp_addons[ 'ab-test' ] ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-convertpro-abtest',
					'parent' => 'forms-convertpro',
					'title'  => esc_attr__( 'A/B Tests', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-ab-test' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'A/B Tests', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Plugin's settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-convertpro-settings',
				'parent' => 'forms-convertpro',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=convert-pro-general-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Convert Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-convertpro-resources',
					'parent' => 'forms-convertpro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			if ( 1 == esc_attr( get_option( 'cpro_branding_enable_support' ) ) ) {

				$cp_support_url = ( ! empty( esc_attr( get_option( 'cpro_branding_url_support' ) ) ) ) ? esc_attr( get_option( 'cpro_branding_url_support' ) ) : 'https://www.convertpro.net/submit-a-ticket/';

				ddw_tbex_resource_item(
					'support-contact',
					'convertpro-contact',
					'group-convertpro-resources',
					$cp_support_url
				);

			}  // end if

			if ( 1 == esc_attr( get_option( 'cpro_branding_enable_kb' ) ) ) {

				$cp_kb_url = ( ! empty( esc_attr( get_option( 'cpro_branding_url_kb' ) ) ) ) ? esc_attr( get_option( 'cpro_branding_url_kb' ) ) : 'https://www.convertpro.net/docs/';

				ddw_tbex_resource_item(
					'knowledge-base',
					'convertpro-kb',
					'group-convertpro-resources',
					$cp_kb_url
				);

			}  // end if

			ddw_tbex_resource_item(
				'translations-pro',
				'convertpro-translate',
				'group-convertpro-resources',
				'https://translate.brainstormforce.com/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'convertpro-site',
				'group-convertpro-resources',
				'https://www.convertpro.net/'
			);

		}  // end if

}  // end function
