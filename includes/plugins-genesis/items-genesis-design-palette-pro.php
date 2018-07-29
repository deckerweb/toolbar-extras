<?php

// includes/plugins-genesis/items-genesis-design-palette-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_design_palette_pro', 105 );
/**
 * Items for Add-On: Genesis Design Palette Pro (Premium, by Reaktiv Studios)
 *
 * @since  1.0.0
 * @since  1.3.2 Fully enhanced plugin support.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_design_palette_pro() {

	$string_style = esc_attr__( 'Style with Genesis Design Palette Pro', 'toolbar-extras' );

	/** For: Genesis Creative items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-design-palette-pro',
			'parent' => 'theme-creative',
			'title'  => esc_attr__( 'Design Palette Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $string_style
			)
		)
	);

		/** Group: Design Builder */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-gdppro-designer',
				'parent' => 'genesis-design-palette-pro'
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-design',
				'parent' => 'group-gdppro-designer',
				'title'  => esc_attr__( 'Design Builder', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-default' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => $string_style
				)
			)
		);

		/** Settings etc. */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-settings',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-utilities',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Utilities', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-palette-pro-utilities' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Utilities', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-license',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-design-palette-pro-license' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-design-palette-pro-support',
				'parent' => 'genesis-design-palette-pro',
				'title'  => esc_attr__( 'Support', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-palette-pro&current-tab=genesis-design-palette-pro-support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Genesis Design Palette Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gdppro-resources',
					'parent' => 'genesis-design-palette-pro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'gdppro-docs',
				'group-gdppro-resources',
				'https://toolbarextras.com/go/gdppro-support/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'gdppro-site',
				'group-gdppro-resources',
				'https://toolbarextras.com/go/genesis-design-palette-pro/'
			);

		}  // end if
		
}  // end function