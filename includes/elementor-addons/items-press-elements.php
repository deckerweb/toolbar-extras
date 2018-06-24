<?php

// includes/elementor-addons/items-press-elements

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_press_elements', 100 );
/**
 * Items for Add-On: Press Elements – Widgets for Elementor (free/Premium, by Press Elements & Rami Yushuvaev)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_press_elements() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-presselements',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Press Elements', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=press-elements' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Press Elements – Widgets for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-presselements-info',
				'parent' => 'ao-presselements',
				'title'  => esc_attr__( 'Widget Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=press-elements' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Widget Info', 'toolbar-extras' )
				)
			)
		);

		if ( in_array( 'press-elements-premium/press-elements.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-presselements-account',
					'parent' => 'ao-presselements',
					'title'  => esc_attr__( 'Account &amp; License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=press-elements-account' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Account &amp; License', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-presselements-resources',
					'parent' => 'ao-presselements',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'presselements-support',
				'group-presselements-resources',
				'https://wordpress.org/support/plugin/press-elements'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'presselements-translate',
				'group-presselements-resources',
				'https://translate.wordpress.org/projects/wp-plugins/press-elements'
			);

			ddw_tbex_resource_item(
				'official-site',
				'presselements-site',
				'group-presselements-resources',
				'https://press-elements.com/'
			);

		}  // end if

}  // end function