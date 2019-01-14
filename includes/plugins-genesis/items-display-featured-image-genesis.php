<?php

// includes/plugins-genesis/items-display-featured-image-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_display_featured_image_genesis', 130 );
/**
 * Items for Add-On: Display Featured Image for Genesis (free, by Robin Cornett)
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_display_featured_image_genesis() {

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-genesis-featured-image',
			'parent' => 'group-genesisplugins-creative'
		)
	);

	/** Settings page */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'dfig-settings',
			'parent' => 'group-genesis-featured-image',
			'title'  => esc_attr__( 'Display Featured Image', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=displayfeaturedimagegenesis' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Display Featured Image', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'dfig-settings-main',
				'parent' => 'dfig-settings',
				'title'  => esc_attr__( 'Main Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=displayfeaturedimagegenesis&tab=main' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Main Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'dfig-settings-backstretch-output',
				'parent' => 'dfig-settings',
				'title'  => esc_attr__( 'Backstretch Output', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=displayfeaturedimagegenesis&tab=style' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Backstretch Output', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'dfig-settings-content-types',
				'parent' => 'dfig-settings',
				'title'  => esc_attr__( 'Content Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=displayfeaturedimagegenesis&tab=cpt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Content Types', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'dfig-settings-advanced',
				'parent' => 'dfig-settings',
				'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=displayfeaturedimagegenesis&tab=advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customize_genesis_featured_image', 200 );
/**
 * Customizer items for Plugin: Display Featured Image for Genesis
 *
 * @since 1.3.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customize_genesis_featured_image() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-dfig-plugin',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Display Featured Image', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'displayfeaturedimagegenesis', get_post_type_archive_link( 'post' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Display Featured Image', 'toolbar-extras' ) )
			)
		)
	);

}  // end function
