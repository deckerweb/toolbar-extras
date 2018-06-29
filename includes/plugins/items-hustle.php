<?php

// includes/plugins/items-hustle

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_hustle', 20 );
/**
 * Items for Plugin: Hustle (free, by WPMU DEV)
 *
 * @since  1.3.1
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_hustle() {

	/** For: Forms */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'forms-hustle',
			'parent' => 'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Hustle', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=hustle' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Hustle', 'toolbar-extras' )
			)
		)
	);

		/** Overview */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-overview',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
				)
			)
		);

		/** Popups */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-popups',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Popups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle_popup_listing' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Popups', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-popups-all',
					'parent' => 'forms-hustle-popups',
					'title'  => esc_attr__( 'All', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_popup_listing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-popups-new',
					'parent' => 'forms-hustle-popups',
					'title'  => esc_attr__( 'New', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_popup' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New', 'toolbar-extras' )
					)
				)
			);

		/** Slide-ins */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-slideins',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Slide-ins', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle_slidein_listing' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Slide-ins', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-slideins-all',
					'parent' => 'forms-hustle-slideins',
					'title'  => esc_attr__( 'All', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_slidein_listing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-slideins-new',
					'parent' => 'forms-hustle-slideins',
					'title'  => esc_attr__( 'New', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_slidein' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New', 'toolbar-extras' )
					)
				)
			);

		/** Embeds */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-embeds',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Embeds', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle_embedded_listing' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Embeds', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-embeds-all',
					'parent' => 'forms-hustle-embeds',
					'title'  => esc_attr__( 'All', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_embedded_listing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-embeds-new',
					'parent' => 'forms-hustle-embeds',
					'title'  => esc_attr__( 'New', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_embedded' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New', 'toolbar-extras' )
					)
				)
			);

		/** Social Sharing */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-socialsharing',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Social Sharing', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle_sshare_listing' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Social Sharing', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-socialsharing-all',
					'parent' => 'forms-hustle-socialsharing',
					'title'  => esc_attr__( 'All', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_sshare_listing' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'forms-hustle-socialsharing-new',
					'parent' => 'forms-hustle-socialsharing',
					'title'  => esc_attr__( 'New', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=hustle_sshare' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New', 'toolbar-extras' )
					)
				)
			);

		/** Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'forms-hustle-settings',
				'parent' => 'forms-hustle',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=hustle_settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Hustle */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-hustle-resources',
					'parent' => 'forms-hustle',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'hustle-support',
				'group-hustle-resources',
				'https://wordpress.org/support/plugin/wordpress-popup'
			);

			ddw_tbex_resource_item(
				'documentation',
				'hustle-docs',
				'group-hustle-resources',
				'https://premium.wpmudev.org/project/hustle/#wpmud-hg-project-documentation'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'hustle-translate',
				'group-hustle-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wordpress-popup'
			);

			ddw_tbex_resource_item(
				'official-site',
				'hustle-site',
				'group-hustle-resources',
				'https://premium.wpmudev.org/project/hustle/'
			);

		}  // end if

}  // end function