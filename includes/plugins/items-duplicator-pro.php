<?php

// includes/plugins/items-duplicator-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Duplicator Pro plugin is activated Network-wide or not.
 *
 * @since 1.3.2
 *
 * @return bool TRUE if activated Network-wide, FALSE otherwise.
 */
function ddw_tbex_is_network_active_duplicator_pro() {

	if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
	    require_once ABSPATH . '/wp-admin/includes/plugin.php';
	}

	if ( function_exists( 'is_plugin_active_for_network' )
		&& ( is_plugin_active_for_network( 'duplicator-pro/duplicator-pro.php' ) )
	) {
		return TRUE;
	}

	return FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_duplicator_pro', 10 );
/**
 * Items for Plugin: Duplicator Pro (Premium, by Snap Creek)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_duplicator_pro() {

	/**
	 * Bail early if:
	 *   - in Multisite
	 *   - but not on Main Site of Network
	 *   - and plugin is not activated Network-wide
	 *
	 *   Reason: Duplicator Pro can only be activated on Main Site of a Network
	 *   when not activated Network-wide. Activation on Sub Sites in a Network
	 *   is possible but makes all plugin settings etc. disappearing (that means
	 *   unaccessable).
	 */
	if ( is_multisite()
		&& ! is_main_site()
		&& ! ddw_tbex_is_network_admin_duplicator_pro()
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'duplicatorpro',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Duplicator Pro', 'toolbar-extras' ),
			'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Duplicator Pro', 'toolbar-extras' )
			)
		)
	);

		/** Archives (Packages) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicatorpro-archives',
				'parent' => 'duplicatorpro',
				'title'  => esc_attr__( 'Archives', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Archives', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-archives-all',
					'parent' => 'duplicatorpro-archives',
					'title'  => esc_attr__( 'All Archives', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Archives', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-archives-new',
					'parent' => 'duplicatorpro-archives',
					'title'  => esc_attr__( 'New Archive', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro&tab=packages&inner_page=new1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Archive', 'toolbar-extras' )
					)
				)
			);

		/** Schedules */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicatorpro-schedules',
				'parent' => 'duplicatorpro',
				'title'  => esc_attr__( 'Schedules', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-schedules' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Schedules', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-schedules-all',
					'parent' => 'duplicatorpro-schedules',
					'title'  => esc_attr__( 'All Schedules', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-schedules' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Schedules', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-schedules-new',
					'parent' => 'duplicatorpro-schedules',
					'title'  => esc_attr__( 'New Schedule', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-schedules&tab=schedules&inner_page=edit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Schedule', 'toolbar-extras' )
					)
				)
			);

		/** Storage Providers */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicatorpro-storage-providers',
				'parent' => 'duplicatorpro',
				'title'  => esc_attr__( 'Storage Providers', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-storage' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Storage Providers', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-storage-providers-all',
					'parent' => 'duplicatorpro-storage-providers',
					'title'  => esc_attr__( 'All Storage Providers', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-storage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Storage Providers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-storage-providers-new',
					'parent' => 'duplicatorpro-storage-providers',
					'title'  => esc_attr__( 'New Storage Provider', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-storage&tab=storage&inner_page=edit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Storage Provider', 'toolbar-extras' )
					)
				)
			);

		/** Tools */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicatorpro-tools',
				'parent' => 'duplicatorpro',
				'title'  => esc_attr__( 'Tools &amp; Logs', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools &amp; Logs', 'toolbar-extras' )
				)
			)
		);

			/** Tools > Templates */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-duplicatorpro-tools-templates',
					'parent' => 'duplicatorpro-tools'
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-tools-templates',
					'parent' => 'group-duplicatorpro-tools-templates',
					'title'  => esc_attr__( 'All Templates', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools&tab=templates' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Templates', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-tools-templates-new',
					'parent' => 'group-duplicatorpro-tools-templates',
					'title'  => esc_attr__( 'New Template', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools&tab=templates&inner_page=edit' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Template', 'toolbar-extras' )
					)
				)
			);

			/** Tools > Diagnostics */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-tools-information',
					'parent' => 'duplicatorpro-tools',
					'title'  => esc_attr__( 'Information', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools&tab=diagnostics&section=diagnostic' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Information', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-tools-logs',
					'parent' => 'duplicatorpro-tools',
					'title'  => esc_attr__( 'Log Files', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools&tab=diagnostics&section=log' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Log Files', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-tools-phplogs',
					'parent' => 'duplicatorpro-tools',
					'title'  => esc_attr__( 'PHP Logs', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-tools&tab=diagnostics&section=phplogs' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'PHP Logs', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'duplicatorpro-settings',
				'parent' => 'duplicatorpro',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-settings-general',
					'parent' => 'duplicatorpro-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings&tab=general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-settings-packages',
					'parent' => 'duplicatorpro-settings',
					'title'  => esc_attr__( 'Packages', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings&tab=package' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Packages', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-settings-schedules',
					'parent' => 'duplicatorpro-settings',
					'title'  => esc_attr__( 'Schedules', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings&tab=schedule' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Schedules', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-settings-storage',
					'parent' => 'duplicatorpro-settings',
					'title'  => esc_attr__( 'Storage', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings&tab=storage' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Storage', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'duplicatorpro-settings-license',
					'parent' => 'duplicatorpro-settings',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( network_admin_url( 'admin.php?page=duplicator-pro-settings&tab=licensing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' )
					)
				)
			);

		/** Group: Resources for Duplicator Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-duplicatorpro-resources',
					'parent' => 'duplicatorpro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'duplicatorpro-support',
				'group-duplicatorpro-resources',
				'https://snapcreek.com/ticket/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'duplicatorpro-docs',
				'group-duplicatorpro-resources',
				'https://snapcreek.com/duplicator/docs/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'duplicatorpro-site',
				'group-duplicatorpro-resources',
				'https://snapcreek.com/duplicator/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_duplicator_pro', 100 );
/**
 * Items for "New Content" section: New Duplicator Pro Package Archive
 *
 * @since 1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_duplicator_pro() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	if ( ddw_tbex_display_items_dev_mode() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'tbex-duplicatorpro-package',
				'parent' => 'new-content',
				'title'  => esc_attr__( 'Duplicator Archive', 'toolbar-extras' ),
				'href'   => ddw_tbex_is_network_active_duplicator_pro() ? esc_url( network_admin_url( 'admin.php?page=duplicator-pro&tab=packages&inner_page=new1' ) ) : esc_url( admin_url( 'admin.php?page=duplicator-pro&tab=packages&inner_page=new1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( __( 'Duplicator Archive', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function
