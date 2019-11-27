<?php

// includes/elementor-addons/items-bdthemes-prime-slider

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get the version of Prime Slider to determine lite or pro versions.
 *
 * @since 1.4.8
 *
 * @see plugin file: includes/items-plugins-elementor-addons.php
 * @uses BDTEP_VER
 *
 * @return string 'pro' for Pro version, 'lite' otherwise.
 */
function ddw_tbex_get_prime_slider_version() {

	return 'lite';

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_bdthemes_prime_slider', 100 );
/**
 * Items for Add-Ons:
 *   - Prime Slider Lite (free, by BdThemes)
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_rand()
 * @uses ddw_tbex_get_prime_slider_version()
 * @uses ddw_tbex_string_premium_addon_title_attr()
 * @uses ddw_tbex_string_free_addon_title_attr()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_bdthemes_prime_slider( $admin_bar ) {

	/** Assists reload when already on settings page */
	$rand = ddw_tbex_rand();
	
	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$ps_version = ddw_tbex_get_prime_slider_version();

	$ps_title      = esc_attr__( 'Prime Slider', 'toolbar-extras' );
	$ps_title_attr = ddw_tbex_string_premium_addon_title_attr( $ps_title );

	if ( 'lite' === $ps_version ) {
		$ps_title      = esc_attr__( 'Prime Slider Lite', 'toolbar-extras' );
		$ps_title_attr = ddw_tbex_string_free_addon_title_attr( $ps_title );
	}

	/** Extras Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-bdprimeslider',
			'parent' => 'tbex-addons',
			'title'  => $ps_title,
			'href'   => esc_url( admin_url( 'admin.php?page=prime_slider_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $ps_title_attr,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-bdprimeslider-widgets',
				'parent' => 'ao-bdprimeslider',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=prime_slider_options&rand=' . $rand . '#widgets' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-bdprimeslider-resources',
					'parent' => 'ao-bdprimeslider',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			if ( 'pro' !== $ps_version ) {

				ddw_tbex_resource_item(
					'support-forum',
					'bdprimeslider-support-forum',
					'group-bdprimeslider-resources',
					'https://wordpress.org/support/plugin/bdthemes-prime-slider-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'bdprimeslider-youtube',
				'group-bdprimeslider-resources',
				'https://www.youtube.com/watch?list=PLP0S85GEw7DP3-yJrkgwpIeDFoXy0PDlM&v=VMBuGusjvtM'
			);

			if ( 'pro' === $ps_version ) {

				//

			} elseif ( 'lite' === $ps_version ) {

				ddw_tbex_resource_item(
					'changelog',
					'bdprimeslider-changelogs',
					'group-bdprimeslider-resources',
					'https://wordpress.org/plugins/bdthemes-prime-slider-lite/#developers',
					ddw_tbex_string_version_history( 'addon' )
				);

				ddw_tbex_resource_item(
					'translations-community',
					'bdprimeslider-translations-community',
					'group-bdprimeslider-resources',
					'https://translate.wordpress.org/projects/wp-plugins/bdthemes-prime-slider-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'official-site',
				'bdprimeslider-site',
				'group-bdprimeslider-resources',
				'https://primeslider.pro/'
			);

		}  // end if

}  // end function
