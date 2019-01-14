<?php

// includes/plugins-genesis/items-genesis-super-customizer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_super_customizer', 105 );
/**
 * Items for Add-On: Genesis Super Customizer (free, by Mario Giancini)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_super_customizer() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-super-customizer',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Super Customizer', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Genesis Super Customizer', 'toolbar-extras' )
			)
		)
	);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gsupercmzr-resources',
					'parent' => 'genesis-super-customizer',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'gsupercmzr-support',
				'group-gsupercmzr-resources',
				'https://wordpress.org/support/plugin/genesis-super-customizer'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'gsupercmzr-translate',
				'group-gsupercmzr-resources',
				'https://translate.wordpress.org/projects/wp-plugins/genesis-super-customizer'
			);

			ddw_tbex_resource_item(
				'github',
				'gsupercmzr-github',
				'group-gsupercmzr-resources',
				'https://github.com/MarioGiancini/Genesis-Super-Customizer'
			);

			ddw_tbex_resource_item(
				'official-site',
				'gsupercmzr-site',
				'group-gsupercmzr-resources',
				'http://supercustomizer.com/'
			);

		}  // end if

}  // end function


add_filter( 'tbex_filter_items_theme_customizer_deep', 'ddw_tbex_themeitems_genesis_super_customizer_sections', 100 );
/**
 * Customize items for Genesis Super Customizer plugin.
 *
 * @since 1.4.0
 *
 * @param array $items Existing array of params for creating Toolbar nodes.
 * @return array Tweaked array of params for creating Toolbar nodes.
 */
function ddw_tbex_themeitems_genesis_super_customizer_sections( array $items ) {

	$parent = 'genesis-super-customizer';

	/** Declare plugin's items */
	$gsc_items = array(
		'colors' => array(
			'type'   => 'section',
			'title'  => __( 'Theme Colors', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-theme-colors',
			'parent' => $parent,
		),
		'header' => array(
			'type'   => 'panel',
			'title'  => __( 'Header', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-header',
			'parent' => $parent,
		),
		'content' => array(
			'type'   => 'section',
			'title'  => __( 'Content Settings', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-content-settings',
			'parent' => $parent,
		),
		'comments' => array(
			'type'        => 'section',
			'title'       => __( 'Comment Settings', 'toolbar-extras' ),
			'id'          => 'gsupercmzr-comment-settings',
			'parent'      => $parent,
			'preview_url' => get_post_type_archive_link( 'post' ),
		),
		'forms' => array(
			'type'   => 'section',
			'title'  => __( 'Form Settings', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-form-settings',
			'parent' => $parent,
		),
		'sidebars' => array(
			'type'   => 'section',
			'title'  => __( 'Sidebars', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-sidebars',
			'parent' => $parent,
		),
		'buttons' => array(
			'type'   => 'section',
			'title'  => __( 'Button Styles', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-button-styles',
			'parent' => $parent,
		),
		'widget_styles' => array(
			'type'   => 'section',
			'title'  => __( 'Widget Styles', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-widget-styles',
			'parent' => $parent,
		),
		'footer' => array(
			'type'   => 'panel',
			'title'  => __( 'Footer', 'toolbar-extras' ),
			'id'     => 'gsupercmzr-footer',
			'parent' => $parent,
		),
	);

	/** Merge and return with all items */
	return array_merge( $items, $gsc_items );

}  // end function
