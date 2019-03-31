<?php

// includes/plugins-forms/items-gravity-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'init', 'ddw_tbex_maybe_turnon_gravityforms_toolbar', 20 );
/**
 * Enable Toolbar display in Gravity Forms settings if Gravity Forms is active
 *   (of course) AND the re-hooking Smart Tweak in Toolbar Extras is enabled.
 *
 * @since 1.2.1
 *
 * @uses ddw_tbex_use_tweak_gravityforms()
 */
function ddw_tbex_maybe_turnon_gravityforms_toolbar() {

	/** Only update option if tweak should be used */
	if ( ddw_tbex_use_tweak_gravityforms() ) {
		update_option( 'gform_enable_toolbar_menu', 1 );
	}

}  // end function


//add_filter( 'admin_bar_menu', 'ddw_tbex_site_items_gravityforms' );
add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms', 100 );
/**
 * Items for Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_use_tweak_gravityforms()
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_site_items_gravityforms( $wp_admin_bar ) {

	/** Bail early if Gravity Forms tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_gravityforms() ) {
		return $wp_admin_bar;
	}

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gform-forms',	// same as original!
			'parent' => 'tbex-sitegroup-forms',
			'title'  => ddw_tbex_string_forms_system( 'Gravity' ),	// esc_attr__( 'Gravity Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gf_edit_forms' ) ),
			'meta'   => array(
				'class'  => 'tbex-gforms',
				'target' => '',
				'title'  => ddw_tbex_string_forms_system( 'Gravity' )	//esc_attr__( 'Forms (via Gravity Forms)', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'wp_head', 'ddw_tbex_styles_gravityforms' );
add_action( 'admin_head', 'ddw_tbex_styles_gravityforms' );
/**
 * Special styles for re-hooked Gravity Forms item only.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_use_tweak_gravityforms()
 *
 * @return string CSS rules for item tweaks.
 */
function ddw_tbex_styles_gravityforms() {

	/** Bail early if Gravity Forms tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_gravityforms() ) {
		return;
	}

	?>
		<style type='text/css'>
			#wp-admin-bar-tbex-sitegroup-forms #wp-admin-bar-gform-forms .ab-item.gforms-menu-icon,
			#wp-admin-bar-tbex-sitegroup-forms #wp-admin-bar-gform-forms .ab-item.gforms-menu-icon:hover {
				display: none !important;
			}
			#wp-admin-bar-tbex-sitegroup-forms #wp-admin-bar-gform-forms .ab-label {
				color: inherit !important;
			}

			/* Media Queries */
			@media only screen and (max-width: 782px) {

				#wpadminbar #wp-admin-bar-gform-forms .ab-item {
					line-height: inherit !important;
				}

				#wpadminbar #wp-admin-bar-gform-forms,
				#wpadminbar #wp-admin-bar-gform-forms .ab-label {
					font-size: 16px !important;
				}

				#wpadminbar #wp-admin-bar-gform-forms .gforms-menu-icon {
					display: none;
				}

				#wpadminbar #wp-admin-bar-gform-forms .ab-label {
					display: inline-block;
				}

			}
		</style>
	<?php

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms_extend', 100 );
/**
 * Resources items for Plugin: Gravity Forms
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_gravityforms_extend() {

	/** General settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gform-forms-settings',
			'parent' => 'gform-forms',
			'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gf_settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
			)
		)
	);

	/** Export & Import */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gf-impexp',
			'parent' => 'gform-forms',
			'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gf_export' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gf-export-entries',
				'parent' => 'gf-impexp',
				'title'  => esc_attr__( 'Export Entries', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_export&view=export_entry' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export Entries', 'toolbar-extras' )
				)
			)
		);

		/** Support for Add-On: Gravity Forms Import Entries (Premium, by GravityView) */
		if ( class_exists( 'GV_Import_Entries_Addon' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gf-import-entries',
					'parent' => 'gf-impexp',
					'title'  => esc_attr__( 'Import Entries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=gf_export&view=import_entries' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import Entries', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gf-export-forms',
				'parent' => 'gf-impexp',
				'title'  => esc_attr__( 'Export Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_export&view=export_form' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export Forms', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gf-import-forms',
				'parent' => 'gf-impexp',
				'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_export&view=import_form' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Forms', 'toolbar-extras' )
				)
			)
		);

	/** System Status */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gf-system-status',
			'parent' => 'gform-forms',
			'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gf_system_status' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'System Status', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gf-system-status-report',
				'parent' => 'gf-system-status',
				'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_system_status&subview=report' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gf-system-status-updates',
				'parent' => 'gf-system-status',
				'title'  => esc_attr__( 'Updates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_system_status&subview=updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Updates', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms_resources', 200 );
/**
 * Resources items for Plugin: Gravity Forms
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_gravityforms_resources() {

	/** Group: Resources for Gravity Forms */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-gforms-resources',
				'parent' => 'gform-forms',
				'meta'   => array( 'class' => 'ab-sub-secondary' )
			)
		);

		ddw_tbex_resource_item(
			'documentation',
			'gforms-docs',
			'group-gforms-resources',
			'https://docs.gravityforms.com/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'gforms-support',
			'group-gforms-resources',
			'https://www.gravityforms.com/support/'
		);

		ddw_tbex_resource_item(
			'facebook-group',
			'gforms-facebook-users',
			'group-gforms-resources',
			'https://www.facebook.com/groups/gravityusers/'
		);

		ddw_tbex_resource_item(
			'official-blog',
			'gforms-blog',
			'group-gforms-resources',
			'https://www.gravityforms.com/blog/'
		);

	}  // end if

}  // end function


add_filter( 'wp_before_admin_bar_render', 'ddw_tbex_aoitems_new_content_gravityforms', 100 );
/**
 * Items for "New Content" section: New Gravity Form
 *   Note: Existing Toolbar node gets filtered.
 *
 * @since 1.3.2
 *
 * @global mixed  $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_gravityforms( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $wp_admin_bar;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gravityforms-new-form',	// same as original!
			'parent' => 'new-content',
			'title'  => ddw_tbex_string_new_form( 'Gravity' ),
			'meta'   => array(
				'title'  => ddw_tbex_string_add_new_item( ddw_tbex_string_new_form( 'Gravity' ) )
			)
		)
	);

}  // end function


/**
 * Items for Site Group: Gravity Forms Updates
 *
 * @since 1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
add_filter( 'tbex_filter_is_update_addon', '__return_empty_string' );

add_action( 'admin_bar_menu', 'ddw_tbex_site_items_gravityforms_updates', 30 );
function ddw_tbex_site_items_gravityforms_updates() {

	/** Group: Gravity Forms Update Checks */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-gravityforms-updates',
			'parent' => 'update-check'
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gravityforms-updates-check',
				'parent' => 'group-gravityforms-updates',
				'title'  => esc_attr__( 'Check Gravity Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=gf_system_status&subview=updates' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Check Gravity Forms', 'toolbar-extras' )
				)
			)
		);

}  // end function
