<?php

// includes/elementor-addons/items-massive-addons-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_mafe', 100 );
/**
 * Items for Add-On: Massive Addons for Elementor (free, by Blocksera)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_mafe() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Plugin's Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-mafe',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Massive Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=massive-addons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Massive Addons for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-mafe-elements',
				'parent' => 'ao-mafe',
				'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=massive-addons#mae-addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Elements', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-mafe-googlemaps',
				'parent' => 'ao-mafe',
				'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=massive-addons#mae-maps' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Google Maps API', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-mafe-resources',
					'parent' => 'ao-mafe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'mafe-support',
				'group-mafe-resources',
				'https://wordpress.org/support/plugin/massive-addons-for-elementor/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'mafe-translate',
				'group-mafe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/massive-addons-for-elementor/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_pufe_elemenfolio', 100 );
/**
 * Items for Add-On: Power-Ups for Elementor (Portfolio Items) (free, by WpPug)
 *
 * @since  1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_pufe_elemenfolio() {

	/** Bail early if items display is not needed */
	if ( function_exists( 'elpt_setup_menu' )		// "Portfolio for Elementor" plugin by WpPug active
		|| ( 0 == get_option( 'elpug_portfolio_switch' ) )
	) {
		return;
	}

	/** Portfolio Items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-pufe-portfolio',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Portfolio Items', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elemenfolio' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Portfolio Items', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-pufe-portfolio-all',
				'parent' => 'ao-pufe-portfolio',
				'title'  => esc_attr__( 'All Items', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elemenfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Items', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-pufe-portfolio-new',
				'parent' => 'ao-pufe-portfolio',
				'title'  => esc_attr__( 'New Portfolio', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=elemenfolio' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Portfolio', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'elemenfolio' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-pufe-portfolio-builder',
					'parent' => 'ao-pufe-portfolio',
					'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elemenfolio' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'New Portfolio Builder', 'toolbar-extras' )
					)
				)
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_new_content_pufe_elemenfolio' );
/**
 * Items for "New Content" section: New Portfolio Item
 *
 * @since  1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_pufe_elemenfolio() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! \Elementor\User::is_current_user_can_edit_post_type( 'elemenfolio' )
		|| function_exists( 'elpt_setup_menu' )		// "Portfolio for Elementor" plugin by WpPug active
		|| ( 0 == get_option( 'elpug_portfolio_switch' ) )
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elemenfolio-with-builder',
			'parent' => 'new-elemenfolio',
			'title'  => ddw_tbex_string_newcontent_with_builder(),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'elemenfolio' ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_newcontent_create_with_builder()
			)
		)
	);

}  // end if