<?php

// includes/elementor-addons/items-bdthemes-element-pack

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get the version of Element Pack to determine lite or pro versions.
 *
 * @since 1.4.7
 * @since 1.4.9 Added support for Pro Version 4.x
 *
 * @see plugin file: includes/items-plugins-elementor-addons.php
 * @uses BDTEP_VER
 *
 * @return string 'pro' if BDTEP_VER is greater/equal than 3.0 or 'lite' if
 *                BDTEP_VER is greater/equal than 1.0 but smaller than 2.0.
 */
function ddw_tbex_get_element_pack_version() {

	if ( ! defined( 'BDTEP_VER' ) ) {
		return 'not-defined';
	}

	if ( version_compare( BDTEP_VER, '4.0', '>=' ) ) {
		return 'pro4';
	} elseif ( version_compare( BDTEP_VER, '3.0', '>=' ) ) {
		return 'pro3';
	} elseif ( version_compare( BDTEP_VER, '1.0.2', '>=' ) && version_compare( BDTEP_VER, '2.0', '<' ) ) {
		return 'lite';
	}

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_bdthemes_element_pack', 100 );
/**
 * Items for Add-Ons:
 *   - Element Pack (Pro) (Premium, by BdThemes) - Pro 3.x and Pro 4.x only!
 *   - Element Pack Lite (free, by BdThemes)
 *
 * @since 1.0.0
 * @since 1.4.7 Added support for Lite version of this Add-On plugin.
 * @since 1.4.9 Added support for Pro Version 4.x; admin URL enhancements.
 *
 * @uses ddw_tbex_get_element_pack_version()
 * @uses ddw_tbex_string_premium_addon_title_attr()
 * @uses ddw_tbex_string_free_addon_title_attr()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_bdthemes_element_pack( $admin_bar ) {

	/** Assists reload when already on settings page */
	$rand = rand( 0, 9999999 );

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$ep_version = ddw_tbex_get_element_pack_version();

	$ep_title      = esc_attr__( 'Element Pack', 'toolbar-extras' );
	$ep_title_attr = ddw_tbex_string_premium_addon_title_attr( $ep_title );

	if ( 'lite' === $ep_version ) {
		$ep_title      = esc_attr__( 'Element Pack Lite', 'toolbar-extras' );
		$ep_title_attr = ddw_tbex_string_free_addon_title_attr( $ep_title );
	}

// &rand=' . $rand . '

	/** Extras Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-bdepack',
			'parent' => 'tbex-addons',
			'title'  => $ep_title,
			'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $ep_title_attr,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-bdepack-widgets',
				'parent' => 'ao-bdepack',
				'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_active_modules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Widgets', 'toolbar-extras' ),
				)
			)
		);

		/** Pro-only settings */
		if ( 'pro3' === $ep_version || 'pro4' === $ep_version ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-bdepack-thirdparty-widgets',
					'parent' => 'ao-bdepack',
					'title'  => esc_attr__( 'Third-Party Widgets', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_third_party_widget' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Third-Party Widgets', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-bdepack-extensions',
					'parent' => 'ao-bdepack',
					'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_elementor_extend' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Extensions', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-bdepack-api',
					'parent' => 'ao-bdepack',
					'title'  => esc_attr__( 'API Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_api_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'API Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Only for Lite Version and Pro Version 3.x */
		if ( 'pro4' !== $ep_version ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-bdepack-settings-other',
					'parent' => 'ao-bdepack',
					'title'  => esc_attr__( 'Other Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=element_pack_options#element_pack_other_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Other Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Pro-only settings */
		if ( 'pro3' === $ep_version || 'pro4' === $ep_version ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-bdepack-license',
					'parent' => 'ao-bdepack',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => ( 'pro4' === $ep_version )
						? esc_url( admin_url( 'admin.php?page=element_pack_options#license' ) )
						: esc_url( admin_url( 'admin.php?page=element-pack-license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-bdepack-resources',
					'parent' => 'ao-bdepack',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			if ( 'pro3' !== $ep_version || 'pro4' !== $ep_version ) {

				ddw_tbex_resource_item(
					'support-forum',
					'bdepack-support-forum',
					'group-bdepack-resources',
					'https://wordpress.org/support/plugin/bdthemes-element-pack-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'knowledge-base',
				'bdepack-kb',
				'group-bdepack-resources',
				'https://bdthemes.com/support/category/details/8/Element%20Pack.html'
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'bdepack-youtube',
				'group-bdepack-resources',
				'https://www.youtube.com/watch?v=1tNppRHvSvQ&list=PLP0S85GEw7DOJf_cbgUIL20qqwqb5x8KA'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'bdepack-support-contact',
				'group-bdepack-resources',
				'https://elementpack.pro/support/'
			);

			if ( 'pro3' === $ep_version || 'pro4' === $ep_version ) {

				ddw_tbex_resource_item(
					'changelog',
					'bdepack-changelogs',
					'group-bdepack-resources',
					'https://elementpack.pro/change-log/',
					ddw_tbex_string_version_history( 'pro-addon' )
				);

				ddw_tbex_resource_item(
					'translations-pro',
					'bdepack-translations-pro',
					'group-bdepack-resources',
					'https://bdthemes.co/ep-translate/'
				);

			} elseif ( 'lite' === $ep_version ) {

				ddw_tbex_resource_item(
					'changelog',
					'bdepack-changelogs',
					'group-bdepack-resources',
					'https://wordpress.org/plugins/bdthemes-element-pack-lite/#developers',
					ddw_tbex_string_version_history( 'addon' )
				);

				ddw_tbex_resource_item(
					'translations-community',
					'bdepack-translations-community',
					'group-bdepack-resources',
					'https://translate.wordpress.org/projects/wp-plugins/bdthemes-element-pack-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'official-site',
				'bdepack-site',
				'group-bdepack-resources',
				'https://elementpack.pro'
			);

		}  // end if

}  // end function
