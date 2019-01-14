<?php

// includes/themes-genesis/items-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if current user has access to one of the possible Genesis Settings
 *   pages or not.
 *
 * @since 1.0.0
 *
 * @param string $genesis_handle Helper key to identify a settings page
 * @return bool TRUE if settings are active, FALSE otherwise.
 */
function ddw_tbex_is_genesis_settings_active( $genesis_handle = '' ) {

	$options   = '';
	$user_meta = '';

	switch ( strtolower( esc_attr( $genesis_handle ) ) ) {

		case 'settings':
			$options   = 'genesis-admin-menu';
			$user_meta = 'genesis_admin_menu';
			break;

		case 'seo':
			$options   = 'genesis-seo-settings-menu';
			$user_meta = 'genesis_seo_settings_menu';
			break;

		case 'export':
			$options   = 'genesis-import-export-menu';
			$user_meta = 'genesis_import_export_menu';
			break;

	}  // end switch

	$current_user = wp_get_current_user();

	return ( current_theme_supports( $options ) && get_the_author_meta( $user_meta, $current_user->ID ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis', 100 );
/**
 * Items for Theme: Genesis Framework (by StudioPress/ Rainmaker Digital, LLC)
 *
 * @since 1.0.0
 * @since 1.4.0 Various tweaks & optimizations.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_is_genesis_settings_active()
 * @uses ddw_tbex_item_theme_creative_customize()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_genesis() {

	/** Genesis creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_is_genesis_settings_active( 'settings' ) ? esc_url( admin_url( 'admin.php?page=genesis' ) ) : ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' )
			)
		)
	);

		/** Genesis customize */
		ddw_tbex_item_theme_creative_customize();

		/** Add optional child theme group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-genesischild-creative',
				'parent' => 'theme-creative',
			)
		);

		/** Add optional plugins group */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-genesisplugins-creative',
				'parent' => 'theme-creative',
			)
		);

	/** Genesis settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Genesis Settings', 'toolbar-extras' ),
			'href'   => ddw_tbex_is_genesis_settings_active( 'settings' ) ? esc_url( admin_url( 'admin.php?page=genesis' ) ) : ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Settings', 'toolbar-extras' )
			)
		)
	);

		if ( ddw_tbex_is_genesis_settings_active( 'settings' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-theme',
					'parent' => 'theme-settings',
					/* translators: Genesis Default Theme Settings */
					'title'  => esc_attr__( 'Theme', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Theme Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ddw_tbex_is_genesis_settings_active( 'seo' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-seo',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'SEO', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=seo-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Theme Settings', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( ddw_tbex_is_genesis_settings_active( 'export' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gen-export',
					'parent' => 'theme-settings',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-import-export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gen-whatsnew',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'What\'s New', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-upgraded' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'What\'s New &amp; Version Info', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_customize', 100 );
/**
 * Customize items for Genesis Framework
 *
 * @since 1.0.0
 * @since 1.4.0 Refactored using filter/array declaration.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_customize( array $items ) {

	/** Declare theme's items */
	$genesis_items = array(
		'genesis' => array(
			'type'  => 'panel',
			'title' => __( 'Theme Settings', 'toolbar-extras' ),
			'id'    => 'gencmz-theme',
		),
		'genesis-seo' => array(
			'type'  => 'panel',
			'title' => __( 'SEO Settings', 'toolbar-extras' ),
			'id'    => 'gencmz-seo',
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $genesis_items );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_genesis_resources', 130 );
/**
 * General resources items for Genesis Framework.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_genesis_settings_active()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_genesis_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	$resources_place = 'theme-settings';

	if ( ! ddw_tbex_is_genesis_settings_active( 'settings' )
		&& ! ddw_tbex_is_genesis_settings_active( 'seo' )
		&& ! ddw_tbex_is_genesis_settings_active( 'export' )
	) {
		$resources_place = 'theme-creative';
	}

	/** Group: Resources for Genesis Framework */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => $resources_place,
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	/** Testing Child resources */
	do_action( 'tbex_resouces_genesis_child' );

	ddw_tbex_resource_item(
		'official-support',
		'theme-supportofficial',
		'group-theme-resources',
		'https://my.studiopress.com/support/'
	);

	ddw_tbex_resource_item(
		'community-forum',
		'theme-community',
		'group-theme-resources',
		'http://www.studiopress.com/forums/'
	);

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/genesiswp/'
	);

	ddw_tbex_resource_item(
		'slack-channel',
		'theme-slack',
		'group-theme-resources',
		'https://genesiswp.slack.com/'
	);

	ddw_tbex_resource_item(
		'tutorials',
		'theme-tutorials',
		'group-theme-resources',
		'https://sridharkatakam.com/',
		esc_attr__( 'Tutorials (Premim Membership Site)', 'toolbar-extras' )
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-beginners',
			'parent' => 'group-theme-resources',
			'title'  => esc_attr__( 'Genesis for Beginners', 'toolbar-extras' ),
			'href'   => 'https://www.studiopress.com/genesis-for-beginners/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Genesis for Beginners', 'toolbar-extras' )
			)
		)
	);

}  // end function
