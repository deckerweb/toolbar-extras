<?php

// includes/plugins/items-easy-login-styler

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_easy_login_styler_pro', 105 );
/**
 * Items for Plugin: Easy Login Styler Pro (Premium, by Phpbits Creative Studio)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_item_title_with_icon()
 * @uses ddw_tbex_customizer_focus()
 *
 * @global string $GLOBALS[ 'easy_login_styler' ] From ELS plugin.
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_easy_login_styler_pro() {

	$customizer_url = ddw_tbex_customizer_focus(
		'panel',
		'easy_login_styler',
		get_permalink( $GLOBALS[ 'easy_login_styler' ][ 'page' ] )
	);

	$title = esc_attr__( 'Easy Login Styler', 'toolbar-extras' );

	/** For: Active Theme Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'phpbits-easy-login-styler',
			'parent' => 'group-active-theme',
			'title'  => $title,
			'href'   => $customizer_url,
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $title
			)
		)
	);

	/** For: Front Customizer */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'customize-easyloginstyler-pro',
			'parent' => 'customize',
			'title'  => ddw_tbex_item_title_with_icon( $title ),
			'href'   => $customizer_url,
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $title
			)
		)
	);

	/** Group: Plugin's resources */
	if ( ddw_tbex_display_items_resources() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-easyloginstyler-resources',
				'parent' => 'phpbits-easy-login-styler',
				'meta'   => array( 'class' => 'ab-sub-secondary' )
			)
		);

		ddw_tbex_resource_item(
			'official-blog',
			'phpbits-easyloginstyler-blog',
			'group-easyloginstyler-resources',
			'https://easyloginwp.com/blog/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'phpbits-easyloginstyler-site',
			'group-easyloginstyler-resources',
			'https://easyloginwp.com/'
		);

	}  // end if

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_easy_login_styler_pro_customizer_sections', 100 );
/**
 * Customize items for Easy Login Styler Pro plugin.
 *
 * @since 1.4.0
 *
 * @global string $GLOBALS[ 'easy_login_styler' ] From ELS plugin.
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_easy_login_styler_pro_customizer_sections( array $items ) {

	$parent      = 'phpbits-easy-login-styler';
	$preview_url = get_permalink( $GLOBALS[ 'easy_login_styler' ][ 'page' ] );

	/** Declare plugin's items */
	$els_items = array(
		'easy_login_styler--templates' => array(
			'type'        => 'section',
			'title'       => __( 'Predefined Templates', 'toolbar-extras' ),
			'id'          => 'elscmzr-templates',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--layouts' => array(
			'type'        => 'section',
			'title'       => __( 'Layout', 'toolbar-extras' ),
			'id'          => 'elscmzr-layout',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--head' => array(
			'type'        => 'section',
			'title'       => __( 'Logo', 'toolbar-extras' ),
			'id'          => 'elscmzr-logo',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--labels' => array(
			'type'        => 'section',
			'title'       => __( 'Title and Labels', 'toolbar-extras' ),
			'id'          => 'elscmzr-labels',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--background' => array(
			'type'        => 'section',
			'title'       => __( 'Background &amp; Images', 'toolbar-extras' ),
			'id'          => 'elscmzr-background',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--styling' => array(
			'type'        => 'section',
			'title'       => __( 'Colors and Styling', 'toolbar-extras' ),
			'id'          => 'elscmzr-styling',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--extras' => array(
			'type'        => 'section',
			'title'       => __( 'Redirect and Extras', 'toolbar-extras' ),
			'id'          => 'elscmzr-extras',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
		'easy_login_styler--license' => array(
			'type'        => 'section',
			'title'       => __( 'Activate License', 'toolbar-extras' ),
			'id'          => 'elscmzr-license',
			'parent'      => $parent,
			'preview_url' => $preview_url,
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $els_items );

}  // end function
