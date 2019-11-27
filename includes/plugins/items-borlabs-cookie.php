<?php

// includes/plugins-forms/items-borlabs-cookie

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_borlabs_cookie' );
/**
 * Items for Plugin: Borlabs Cookie (Premium, by Benjamin A. Bornschein, Borlabs)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_borlabs_cookie( $admin_bar ) {

	/** For: Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'tools-borlabscookie',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Borlabs Cookie', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Borlabs Cookie', 'toolbar-extras' ),
			)
		)
	);

		/** Dashboard (Overview/ Stats) */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-dashboard',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Dashboard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Dashboard - Overview', 'toolbar-extras' ),
				)
			)
		);

		/** Cookie Box */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-cookie-box',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Cookie Box', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookie-box' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cookie Box', 'toolbar-extras' ),
				)
			)
		);

		/** Cookie Groups */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-cookie-groups',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Cookie Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookie-groups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cookie Groups', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-cookie-groups-all',
					'parent' => 'tools-borlabscookie-cookie-groups',
					'title'  => esc_attr__( 'All Cookie Groups', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookie-groups' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Cookie Groups', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-cookie-groups-new',
					'parent' => 'tools-borlabscookie-cookie-groups',
					'title'  => esc_attr__( 'New Cookie Group', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookie-groups&action=edit&id=new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Cookie Group', 'toolbar-extras' ),
					)
				)
			);

		/** Cookies */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-cookies',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Cookies', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookies' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Cookies', 'toolbar-extras' ),
				)
			)
		);

		/** Content Blocker */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-content-blocker',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Content Blocker', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-content-blocker' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Content Blocker', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-content-blocker-all',
					'parent' => 'tools-borlabscookie-content-blocker',
					'title'  => esc_attr__( 'All Content Blocker', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-content-blocker' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Content Blocker', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-content-blocker-new',
					'parent' => 'tools-borlabscookie-content-blocker',
					'title'  => esc_attr__( 'New Content Blocker', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-content-blocker&action=edit&id=new' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Content Blocker', 'toolbar-extras' ),
					)
				)
			);

		/** Script Blocker */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-script-blocker',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Script Blocker', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-script-blocker' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Script Blocker', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-script-blocker-all',
					'parent' => 'tools-borlabscookie-script-blocker',
					'title'  => esc_attr__( 'All Script Blocker', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-script-blocker' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Script Blocker', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-script-blocker-new',
					'parent' => 'tools-borlabscookie-script-blocker',
					'title'  => esc_attr__( 'New Script Blocker', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-script-blocker&action=wizardStep-1' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Script Blocker', 'toolbar-extras' ),
					)
				)
			);

		/** Settings (General) */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-borlabscookie-settings',
				'parent' => 'tools-borlabscookie',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-settings-general',
					'parent' => 'tools-borlabscookie-settings',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-settings-import-export',
					'parent' => 'tools-borlabscookie-settings',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-import-export' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-settings-license',
					'parent' => 'tools-borlabscookie-settings',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-borlabscookie-settings-help-support',
					'parent' => 'tools-borlabscookie-settings',
					'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-help' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Help &amp; Support', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-borlabscookie-resources',
					'parent' => 'tools-borlabscookie',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			$blc_lang = ddw_tbex_is_german() ? 'de.' : '';

			ddw_tbex_resource_item(
				'knowledge-base',
				'borlabscookie-knowledge-base',
				'group-borlabscookie-resources',
				'https://' . $blc_lang . 'borlabs.io/kbtopic/borlabs-cookie/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'borlabscookie-changelog',
				'group-borlabscookie-resources',
				'https://' . $blc_lang . 'borlabs.io/borlabs-cookie/changelog/',
				ddw_tbex_string_version_history( 'pro-plugin' )
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'borlabscookie-youtube-tutorials',
				'group-borlabscookie-resources',
				ddw_tbex_is_german() ? 'https://www.youtube.com/watch?v=sJ8R6UlLZh8&list=PL5SCpCz-29oGwewhSL_Ev_9Vhp0S6h63-' : 'https://www.youtube.com/watch?v=59W3n0AgrYw&list=PL5SCpCz-29oFIfBp8e0GDImMr5ZhfK2Vt'
			);

			ddw_tbex_resource_item(
				'official-site',
				'borlabscookie-site',
				'group-borlabscookie-resources',
				'https://' . $blc_lang . 'borlabs.io/borlabs-cookie/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_borlabs_cookie', 80 );
/**
 * Items for "New Content" section: New Borlabs Cookie Elements
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_new_content()
 * @uses ddw_tbex_string_add_new_item()
 *
 * @param object $admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_borlabs_cookie( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-borlabs-cookie-elements',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Borlabs Cookie', 'New Content Group', 'toolbar-extras' ),
			'href'   => FALSE,
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( esc_attr_x( 'Borlabs Cookie', 'New Content Group', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-borlabs-cookie-elements-groups',
				'parent' => 'tbex-borlabs-cookie-elements',
				'title'  => esc_attr_x( 'Cookie Groups', 'New Content Group', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-cookie-groups&action=edit&id=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr_x( 'Cookie Groups', 'New Content Group', 'toolbar-extras' ) ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-borlabs-cookie-elements-content-blocker',
				'parent' => 'tbex-borlabs-cookie-elements',
				'title'  => esc_attr_x( 'Content Blocker', 'New Content Group', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-content-blocker&action=edit&id=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr_x( 'Content Blocker', 'New Content Group', 'toolbar-extras' ) ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-borlabs-cookie-elements-script-blocker',
				'parent' => 'tbex-borlabs-cookie-elements',
				'title'  => esc_attr_x( 'Script Blocker', 'New Content Group', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=borlabs-cookie-script-blocker&action=wizardStep-1' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr_x( 'Script Blocker', 'New Content Group', 'toolbar-extras' ) ),
				)
			)
		);

}  // end function
