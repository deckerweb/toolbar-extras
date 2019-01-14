<?php

// includes/tems-web-group

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_web_items_remove_wp_nodes', 10 );
/**
 * Remove nodes of "WP Logo" item (including sub-items).
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_web_items_remove_wp_nodes() {

	$GLOBALS[ 'wp_admin_bar' ]->remove_node( 'wp-logo' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_web_items_site_node', -1 );
/**
 * Greate a new top-left item, replacing the "WP Logo" node. By default it
 *   displays the site icon as "icon". If no site icon is setup yet, it falls
 *   back to the "globe" Dashicon.
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_web_items_site_node() {

	$site_icon = sprintf(
		'<span class="ab-icon tbex-siteicon"><img src="%s" width="16" height="16" /></span>',
		get_site_icon_url( 32 )
	);
	$site_icon = has_site_icon() ? $site_icon : '<span class="ab-icon tbex-globe"></span>';

	$title_attr = sprintf(
		/* translators: %s - Title of the website (via get_bloginfo( 'name' ) ) */
		esc_attr__( '%s - External Resources', 'toolbar-extras' ),
		get_bloginfo( 'name' )
	);

	$screen_reader = sprintf(
		'<span class="screen-reader-text">%s</span>',
		$title_attr
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-web-resources',
			'title'  => $site_icon . $screen_reader,
			'href'   => esc_url( get_site_url( '/' ) ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => $title_attr
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_web_items_external_resources', 99 );
/**
 * Add external resources items for various web services.
 *
 * @since 1.0.0
 * @since 1.4.0 Refined test items, added some submit/test scenarios.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_web_items_external_resources() {

	/** Group: External resources for site-builders */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-web-resources',
			'parent' => 'tbex-web-resources',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	/** Pingdom Tools (no submit/test possible!) */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-pingdomtools',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Pingdom Tools', 'toolbar-extras' ),
			'href'   => 'https://tools.pingdom.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Pingdom Tools', 'toolbar-extras' )
			)
		)
	);

	/** Gtmetrix */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-gtmetrix',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'GTmetrix Report', 'toolbar-extras' ),
			'href'   => 'https://gtmetrix.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'GTmetrix Report', 'toolbar-extras' )
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'webr-gtmetrix-submit-singular-url',
					'parent' => 'webr-gtmetrix',
					'title'  => esc_attr__( 'Submit Current Page URL', 'toolbar-extras' ),
					'href'   => esc_url( 'https://gtmetrix.com/?url=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Submit Current Page URL', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'webr-gtmetrix-submit-home-url',
				'parent' => 'webr-gtmetrix',
				'title'  => esc_attr__( 'Submit Home URL', 'toolbar-extras' ),
				'href'   => esc_url( 'https://gtmetrix.com/?url=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Submit Home URL', 'toolbar-extras' )
				)
			)
		);

	/** Google PageSpeed */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-google-pagespeed',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Google Page Speed', 'toolbar-extras' ),
			'href'   => 'https://developers.google.com/speed/pagespeed/insights/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Google Page Speed', 'toolbar-extras' )
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'webr-google-pagespeed-test-singular-url',
					'parent' => 'webr-google-pagespeed',
					'title'  => esc_attr__( 'Test Current Page URL', 'toolbar-extras' ),
					'href'   => esc_url( 'https://developers.google.com/speed/pagespeed/insights/?url=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Test Current Page URL', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'webr-google-pagespeed-test-home-url',
				'parent' => 'webr-google-pagespeed',
				'title'  => esc_attr__( 'Test Home URL', 'toolbar-extras' ),
				'href'   => esc_url( 'https://developers.google.com/speed/pagespeed/insights/?url=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Test Home URL', 'toolbar-extras' )
				)
			)
		);

//https://app.loadimpact.com/k6/anonymous-test/custom?url=https://cdu.de
// https://loadimpact.com/

	/** Load Impact */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-loadimpact',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Load Impact', 'toolbar-extras' ),
			'href'   => 'https://loadimpact.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Load Impact', 'toolbar-extras' )
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'webr-loadimpact-test-singular-url',
					'parent' => 'webr-loadimpact',
					'title'  => esc_attr__( 'Test Current Page URL', 'toolbar-extras' ),
					'href'   => esc_url( 'https://app.loadimpact.com/k6/anonymous-test/custom?url=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Test Current Page URL', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'webr-loadimpact-test-home-url',
				'parent' => 'webr-loadimpact',
				'title'  => esc_attr__( 'Test Home URL', 'toolbar-extras' ),
				'href'   => esc_url( 'https://app.loadimpact.com/k6/anonymous-test/custom?url=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Test Home URL', 'toolbar-extras' )
				)
			)
		);

	/** More Google services: */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-google-searchconsole',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Google Search Console', 'toolbar-extras' ),
			'href'   => 'https://www.google.com/webmasters/tools/home',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Google Search Console', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-google-analytics',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Google Analytics', 'toolbar-extras' ),
			'href'   => 'https://analytics.google.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Google Analytics', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'webr-google-tagmanager',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Google Tag Manager', 'toolbar-extras' ),
			'href'   => 'https://tagmanager.google.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Google Tag Manager', 'toolbar-extras' )
			)
		)
	);

}  // end function
