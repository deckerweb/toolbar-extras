<?php

// includes/elementor-addons/items-pdf-generator-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_pdf_generator_elementor', 100 );
/**
 * Items for Add-On: PDF Generator for Elementor (free, by RedefiningTheWeb)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_pdf_generator_elementor( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'pdfgen-elementor',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'PDF Generator', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'PDF Generator for Elementor', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'pdfgen-elementor-basic',
				'parent' => 'pdfgen-elementor',
				'title'  => esc_attr__( 'Basic Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb&rtw_pgaepb_tab=rtw_pgaepb_basic' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Basic Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'pdfgen-elementor-header',
				'parent' => 'pdfgen-elementor',
				'title'  => esc_attr__( 'PDF Header', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb&rtw_pgaepb_tab=rtw_pgaepb_header' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'PDF Header', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'pdfgen-elementor-footer',
				'parent' => 'pdfgen-elementor',
				'title'  => esc_attr__( 'PDF Footer', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb&rtw_pgaepb_tab=rtw_pgaepb_footer' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'PDF Footer', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'pdfgen-elementor-css',
				'parent' => 'pdfgen-elementor',
				'title'  => esc_attr__( 'PDF CSS', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb&rtw_pgaepb_tab=rtw_pgaepb_css' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'PDF CSS', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'pdfgen-elementor-watermark',
				'parent' => 'pdfgen-elementor',
				'title'  => esc_attr__( 'PDF WaterMark', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=rtw_pgaepb&rtw_pgaepb_tab=rtw_pgaepb_watermark' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'PDF WaterMark', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-pdfgenel-resources',
					'parent' => 'pdfgen-elementor',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'pdfgenel-support',
				'group-pdfgenel-resources',
				'https://wordpress.org/support/plugin/pdf-generator-addon-for-elementor-page-builder'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'pdfgenel-translate',
				'group-pdfgenel-resources',
				'https://translate.wordpress.org/projects/wp-plugins/pdf-generator-addon-for-elementor-page-builder'
			);

		}  // end if

}  // end function
