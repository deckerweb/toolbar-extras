<?php

// includes/themes/items-ctcom-shared

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ctcom_shared', 100 );
/**
 * Items for Theme: supported ChurchThemes.com Theme or a child theme of it
 *   (all Premium, by ChurchThemes.com LLC)
 *
 * @since 1.3.0
 * @since 1.4.9 Simplified functions.
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_item_theme_creative_customize()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ctcom_shared( $admin_bar ) {

	/** Theme creative */
	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => esc_url( admin_url( 'themes.php?page=theme-license' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr', 'child' ),
			)
		)
	);

		/** CT customize */
		ddw_tbex_item_theme_creative_customize();

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_ctcom_shared_license', 111 );
/**
 * Items for Theme: ChurchThemes.com Theme License
 *
 * @since 1.3.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_themeitems_ctcom_shared_license( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'theme-creative-churchthemes-license',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Theme License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=theme-license' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Theme License', 'toolbar-extras' ),
			)
		)
	);

}  // end function


/**
 * General resources items for a ChurchThemes.com Theme.
 *
 * @since 1.3.0
 * @since 1.4.9 Splitted into function, generalized.
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_string_version_history()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 * @param string $theme     String for Theme slug (used as slug & suffix).
 * @param string $parent    String for Toolbar parent node.
 * @return Void.
 */
function ddw_tbex_themeitems_ctcom_shared_resources( $admin_bar, $theme = '', $parent = '' ) {

	/** Set suffix */
	$theme = sanitize_key( $theme );
	$suffix = '-' . $theme;

	/** Optional, custom parent ID */
	$parent_id = ( ! empty( $parent ) ) ? sanitize_key( $parent ) : 'theme-creative';

	/** Group: Resources for a ChurchThemes.com Theme */
	$admin_bar->add_group(
		array(
			'id'     => 'group-theme-resources' . $suffix,
			'parent' => $parent_id,
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/guides/user/specific-themes/' . $theme . '/'
	);

	ddw_tbex_resource_item(
		'changelog',
		'theme-changelog' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/guides/user/specific-themes/' . $theme . '/#changelog',
		ddw_tbex_string_version_history( 'theme' )
	);

	ddw_tbex_resource_item(
		'knowledge-base',
		'theme-kb' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/guides/'
	);

	ddw_tbex_resource_item(
		'support-contact',
		'theme-contact' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/contact/'
	);

	ddw_tbex_resource_item(
		'my-account',
		'theme-my-account' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/account/',
		/* translators: %s - static string "@ ChurchThemes.com" (My Account @ ChurchThemes.com) */
		sprintf( esc_attr__( 'My Account %s', 'toolbar-extras' ), '@ ChurchThemes.com' )
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site' . $suffix,
		'group-theme-resources' . $suffix,
		'https://churchthemes.com/themes/' . $theme . '/'
	);

}  // end function
