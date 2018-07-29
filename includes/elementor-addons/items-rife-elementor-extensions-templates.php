<?php

// includes/elementor-addons/items-rife-elementor-extensions-templates

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_rife_extensions_templates', 100 );
/**
 * Items for Add-On: Rife Elementor Extensions & Templates (free, by Apollo13 Themes)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_rife_extensions_templates() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-rifeet',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Rife Extensions &amp; Templates', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=rife-templates' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Rife Extensions &amp; Templates', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-rifeet-import-templates',
				'parent' => 'ao-rifeet',
				'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rife-templates#tab-import' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Templates', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-rifeet-instructions',
				'parent' => 'ao-rifeet',
				'title'  => esc_attr__( 'Instructions', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rife-templates#tab-instructions' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Instructions', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-rifeet-resources',
					'parent' => 'ao-rifeet',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'rifeet-support',
				'group-rifeet-resources',
				'https://wordpress.org/support/plugin/rife-elementor-extensions'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'rifeet-translate',
				'group-rifeet-resources',
				'https://translate.wordpress.org/projects/wp-plugins/rife-elementor-extensions'
			);

			ddw_tbex_resource_item(
				'official-site',
				'rifeet-site',
				'group-rifeet-resources',
				'https://apollo13themes.com/rife-elementor-extensions/'
			);

		}  // end if

}  // end function