<?php

// includes/plugins/items-instagram-feed

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_instagram_feed', 15 );
/**
 * Site items for Plugin: Instagram Feed (free, by Smash Balloon)
 *
 * @since 1.4.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_instagram_feed() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'instagramfeed',
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'Instagram Feed', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-feed' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Instagram Feed', 'toolbar-extras' ),
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'instagramfeed-configure',
				'parent' => 'instagramfeed',
				'title'  => esc_attr__( 'Configure', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-feed&tab=configure' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Configure', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'instagramfeed-customize',
				'parent' => 'instagramfeed',
				'title'  => esc_attr__( 'Customize', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-feed&tab=customize' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Customize', 'toolbar-extras' ),
				)
			)
		);
			
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'instagramfeed-display',
				'parent' => 'instagramfeed',
				'title'  => esc_attr__( 'Display Feed', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-feed&tab=display' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Display Feed', 'toolbar-extras' ),
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'instagramfeed-support-system',
				'parent' => 'instagramfeed',
				'title'  => esc_attr__( 'Support &amp; System Info', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-feed&tab=support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support &amp; System Info', 'toolbar-extras' ),
				)
			)
		);

		if ( function_exists( 'sb_instagram_activate_pro' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'instagramfeed-license',
					'parent' => 'instagramfeed',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=sb-instagram-license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-instagramfeed-resources',
					'parent' => 'instagramfeed',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'instagramfeed-support',
				'group-instagramfeed-resources',
				'https://wordpress.org/support/plugin/instagram-feed'
			);

			ddw_tbex_resource_item(
				'documentation',
				'instagramfeed-docs',
				'group-instagramfeed-resources',
				'https://smashballoon.com/instagram-feed/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'instagramfeed-translate',
				'group-instagramfeed-resources',
				'https://translate.wordpress.org/projects/wp-plugins/instagram-feed'
			);

			ddw_tbex_resource_item(
				'official-site',
				'instagramfeed-site',
				'group-instagramfeed-resources',
				'https://smashballoon.com/instagram-feed'
			);

		}  // end if

}  // end function
