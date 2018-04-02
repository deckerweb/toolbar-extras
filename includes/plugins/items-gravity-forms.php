<?php

// includes/plugins/items-gravity-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_items_gravityforms', 1 );
/**
 * Remove items from Gravity Forms plugin.
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_gravityforms()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_items_gravityforms() {

	/** Bail early if Gravity Forms tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_gravityforms() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'gform-forms' );

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms', 1 );
/**
 * Items for Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_use_tweak_gravityforms()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_gravityforms() {

	/** Bail early if Gravity Forms tweak should NOT be used */
	if ( ! ddw_tbex_use_tweak_gravityforms() ) {
		return;
	}

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gform-forms',	// same as original!
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=gf_edit_forms' ) ),
			'meta'   => array(
				'class'  => 'tbex-gforms',
				'target' => '',
				'title'  => esc_attr__( 'Forms (via Gravity Forms)', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'wp_head', 'ddw_tbex_styles_gravityforms' );
add_action( 'admin_head', 'ddw_tbex_styles_gravityforms' );
/**
 * Special styles for re-hooked Gravity Forms item only.
 *
 * @uses   ddw_tbex_use_tweak_gravityforms()
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
		</style>
	<?php

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms_extend', 100 );
/**
 * Resources items for Plugin: Gravity Forms
 *
 * @since  1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_gravityforms_extend() {

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

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_site_items_gravityforms_resources', 200 );
/**
 * Resources items for Plugin: Gravity Forms
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
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
			'official-blog',
			'gforms-blog',
			'group-gforms-resources',
			'https://www.gravityforms.com/blog/'
		);

	}  // end if

}  // end function