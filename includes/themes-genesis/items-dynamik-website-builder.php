<?php

// includes/themes-genesis/items-dynamik-website-builder

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if current user has access to one of the possible Dynamik Settings
 *   pages or not.
 *
 * @since 1.1.0
 *
 * @param string $dynamik_handle Helper key to identify a settings page
 * @return bool TRUE if settings are hidden, FALSE otherwise.
 */
function ddw_tbex_is_dynamik_settings_hidden( $dynamik_handle = '' ) {

	$user_meta = '';

	switch ( sanitize_key( $dynamik_handle ) ) {

		case 'admin':		// Dynamik 2.4.0+
			$user_meta = 'disable_dynamik_gen_admin_menu';
			break;
		case 'settings':	// Dynamik 2.3.4 or lower
			$user_meta = 'disable_dynamik_gen_settings_menu';
			break;
		case 'design':
			$user_meta = 'disable_dynamik_gen_design_menu';
			break;
		case 'custom':
			$user_meta = 'disable_dynamik_gen_custom_menu';
			break;
		case 'images':
			$user_meta = 'disable_dynamik_gen_images_menu';
			break;
		case 'license':
			$user_meta = 'hide_dynamik_gen_license_key';
			break;

	}  // end switch

	$current_user = wp_get_current_user();

	return ( get_the_author_meta( $user_meta, $current_user->ID ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_dynamik_website_builder', 10 );
/**
 * Items for Theme: Dynamik Website Builder (Premium, by Cobalt Apps)
 *   Note: This is a Genesis Child Theme.
 *
 * @since 1.1.0
 * @since 1.4.0 Items optimizations.
 *
 * @uses ddw_tbex_is_dynamik_settings_hidden()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_dynamik_website_builder() {

	$is_new = ( defined( 'CHILD_THEME_VERSION' ) && version_compare( CHILD_THEME_VERSION, '2.4.0', '>=' ) ) ? TRUE : FALSE;

	/** Add theme group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-gendynamik-creative',
			'parent' => 'theme-creative',
		)
	);

	/** For: Dynamik creative (sub items!) */
	if ( ! ddw_tbex_is_dynamik_settings_hidden( 'design' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-design',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Design Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dynamik-design' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Design Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-design-preview',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Design: Full View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dynamik-design&iframe=active' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Design: Full View', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( ! ddw_tbex_is_dynamik_settings_hidden( 'custom' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-custom',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Custom CSS &amp; Code', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dynamik-custom' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Custom Options: CSS, Code etc.', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-custom-preview',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Custom CSS &amp; Code: Full View', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dynamik-custom&iframe=active' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Custom CSS &amp; Code: Full View', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( ! ddw_tbex_is_dynamik_settings_hidden( 'images' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-images',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=dynamik-image-manager' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( ! ddw_tbex_is_dynamik_settings_hidden( 'admin' ) || ! ddw_tbex_is_dynamik_settings_hidden( 'settings' ) ) {

		$settings_url = $is_new ? admin_url( 'admin.php?page=dynamik-dashboard&activetab=dynamik-theme-settings-nav-general' ) : admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-general' );

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-dynamik-settings',
				'parent' => 'group-genesischild-creative',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( $settings_url ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-creative-dynamik-general',
					'parent' => 'theme-creative-dynamik-settings',
					'title'  => esc_attr__( 'General Options', 'toolbar-extras' ),
					'href'   => esc_url( $settings_url ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Options', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'theme-creative-dynamik-importexport',
					'parent' => 'theme-creative-dynamik-settings',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					'href'   => $is_new ? esc_url( admin_url( 'admin.php?page=dynamik-dashboard&activetab=dynamik-theme-settings-nav-import-export' ) ) : esc_url( admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-import-export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
					)
				)
			);

			if ( ! ddw_tbex_is_dynamik_settings_hidden( 'license' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'theme-creative-dynamik-license',
						'parent' => 'theme-creative-dynamik-settings',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'themes.php?page=dynamik_gen-license' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'License', 'toolbar-extras' )
						)
					)
				);

			}  // end if

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_dynamik_resources', 120 );
/**
 * General resources items for Dynamik Website Builder Child Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_dynamik_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Freelancer Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-dynamik-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-contact',
		'dynamik-contact',
		'group-dynamik-resources',
		'https://cobaltapps.com/my-account/'
	);

	ddw_tbex_resource_item(
		'documentation',
		'dynamik-docs',
		'group-dynamik-resources',
		'https://docs.cobaltapps.com/collection/368-dynamik',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	ddw_tbex_resource_item(
		'community-forum',
		'dynamik-forums',
		'group-dynamik-resources',
		'https://cobaltapps.com/community/index.php'
	);

	ddw_tbex_resource_item(
		'official-site',
		'dynamik-site',
		'group-dynamik-resources',
		'https://cobaltapps.com/downloads/dynamik-website-builder/'
	);

}  // end function
