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
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_web_items_site_node( $admin_bar ) {

	$site_icon = sprintf(
		'<span class="ab-icon tbex-siteicon"><img src="%s" width="16" height="16" alt="Website Icon" /></span>',
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

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-web-resources',
			'title'  => $site_icon . $screen_reader,
			'href'   => esc_url( get_site_url( '/' ) ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => $title_attr,
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
 * @uses ddw_tbex_string_test_current_page_url()
 * @uses ddw_tbex_string_test_home_url()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_web_items_external_resources( $admin_bar ) {

	$test_singular = 'test-singular-url';
	$test_home     = 'test-home-url';

	/** Group: External resources for site-builders */
	$admin_bar->add_group(
		array(
			'id'     => 'group-web-resources',
			'parent' => 'tbex-web-resources',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);


	/** 1) Gtmetrix */
	$admin_bar->add_node(
		array(
			'id'     => 'webr-gtmetrix',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'GTmetrix Report', 'toolbar-extras' ),
			'href'   => 'https://gtmetrix.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'GTmetrix Report', 'toolbar-extras' ),
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'webr-gtmetrix-submit-singular-url',
					'parent' => 'webr-gtmetrix',
					'title'  => esc_attr__( 'Submit Current Page URL', 'toolbar-extras' ),
					'href'   => esc_url( 'https://gtmetrix.com/?url=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Submit Current Page URL', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'webr-gtmetrix-submit-home-url',
				'parent' => 'webr-gtmetrix',
				'title'  => esc_attr__( 'Submit Home URL', 'toolbar-extras' ),
				'href'   => esc_url( 'https://gtmetrix.com/?url=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Submit Home URL', 'toolbar-extras' ),
				)
			)
		);


	/** 2) Pingdom Tools (no submit/test possible!) */
	$admin_bar->add_node(
		array(
			'id'     => 'webr-pingdomtools',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Pingdom Tools', 'toolbar-extras' ),
			'href'   => 'https://tools.pingdom.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Pingdom Tools', 'toolbar-extras' ),
			)
		)
	);


	/** 3) Load Impact */
	$admin_bar->add_node(
		array(
			'id'     => 'webr-loadimpact',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Load Impact', 'toolbar-extras' ),
			'href'   => 'https://loadimpact.com/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Load Impact', 'toolbar-extras' ),
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'webr-loadimpact-' . $test_singular,
					'parent' => 'webr-loadimpact',
					'title'  => ddw_tbex_string_test_current_page_url(),
					'href'   => esc_url( 'https://app.loadimpact.com/k6/anonymous-test/custom?url=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_test_current_page_url(),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'webr-loadimpact-' . $test_home,
				'parent' => 'webr-loadimpact',
				'title'  => ddw_tbex_string_test_home_url(),
				'href'   => esc_url( 'https://app.loadimpact.com/k6/anonymous-test/custom?url=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_test_home_url(),
				)
			)
		);


	/** 4) Facebook Debugger */
	$admin_bar->add_node(
		array(
			'id'     => 'webr-facebook-debugger',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Facebook Debugger', 'toolbar-extras' ),
			'href'   => 'https://developers.facebook.com/tools/debug/sharing/',
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Facebook Debugger for Sharing Links', 'toolbar-extras' ),
			)
		)
	);

		/** Frontend + Singular items of post types */
		if ( ! is_admin() && is_singular() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'webr-facebook-debugger-' . $test_singular,
					'parent' => 'webr-facebook-debugger',
					'title'  => ddw_tbex_string_test_current_page_url(),
					'href'   => esc_url( 'https://developers.facebook.com/tools/debug/sharing/?q=' . get_permalink( get_the_ID() ) ),
					'meta'   => array(
						'rel'    => ddw_tbex_meta_rel(),
						'target' => ddw_tbex_meta_target(),
						'title'  => sprintf(
							/* translators: %s - label, "Test Current Page URL" */
							esc_attr__( '%s for Sharing Links', 'toolbar-extras' ),
							ddw_tbex_string_test_current_page_url()
						),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'webr-facebook-debugger-' . $test_home,
				'parent' => 'webr-facebook-debugger',
				'title'  => ddw_tbex_string_test_home_url(),
				'href'   => esc_url( 'https://developers.facebook.com/tools/debug/sharing/?q=' . home_url( '/' ) ),
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_test_home_url(),
				)
			)
		);


	/** 5) Google Services */
	$admin_bar->add_node(
		array(
			'id'     => 'webr-google-services',
			'parent' => 'group-web-resources',
			'title'  => esc_attr__( 'Google Services', 'toolbar-extras' ),
			'href'   => FALSE,
			'meta'   => array(
				'rel'    => '',
				'target' => '',
				'title'  => esc_attr__( 'Google Services', 'toolbar-extras' ),
			)
		)
	);

		$webr_google_services = apply_filters(
			'tbex_filter_web_group_google_services',
			array(
				'structureddata' => array(
					'label'     => __( 'Google Structured Data', 'toolbar-extras' ),
					'url'       => 'https://search.google.com/structured-data/testing-tool/',
					'url_query' => 'https://search.google.com/structured-data/testing-tool/?url=',
				),
				'pagespeed' => array(
					'label'     => __( 'Google Page Speed', 'toolbar-extras' ),
					'url'       => 'https://developers.google.com/speed/pagespeed/insights/',
					'url_query' => 'https://developers.google.com/speed/pagespeed/insights/?url=',
				),
				'mobilefriendly' => array(
					'label'     => __( 'Google Mobile Friendly', 'toolbar-extras' ),
					'url'       => 'https://search.google.com/test/mobile-friendly',
					'url_query' => 'https://search.google.com/test/mobile-friendly?url=',
				),
				'richmobile' => array(
					'label'     => __( 'Google Rich Results: Mobile', 'toolbar-extras' ),
					'url'       => 'https://search.google.com/test/rich-results?user_agent=1',
					'url_query' => 'https://search.google.com/test/rich-results?user_agent=1&url=',
				),
				'richdesktop' => array(
					'label'     => __( 'Google Rich Results: Desktop', 'toolbar-extras' ),
					'url'       => 'https://search.google.com/test/rich-results?user_agent=2',
					'url_query' => 'https://search.google.com/test/rich-results?user_agent=2&url=',
				),
				'cache' => array(
					'label'     => __( 'Google Cache', 'toolbar-extras' ),
					'url'       => 'https://webcache.googleusercontent.com/search',
					'url_query' => 'https://webcache.googleusercontent.com/search?q=cache:',
				),
			)
		);

		if ( $webr_google_services ) {

			foreach ( $webr_google_services as $webr_google_service => $webr_google_service_data ) {

				$google_service_key       = sanitize_key( $webr_google_service );
				$google_service_label     = esc_attr( $webr_google_service_data[ 'label' ] );
				$google_service_url       = esc_url( $webr_google_service_data[ 'url' ] );
				$google_service_url_query = esc_url( $webr_google_service_data[ 'url_query' ] );

				$admin_bar->add_node(
					array(
						'id'     => 'webr-google-' . $google_service_key,
						'parent' => 'webr-google-services',
						'title'  => $google_service_label,
						'href'   => $google_service_url,
						'meta'   => array(
							'rel'    => ddw_tbex_meta_rel(),
							'target' => ddw_tbex_meta_target(),
							'title'  => $google_service_label,
						)
					)
				);

					/** Test Frontend + Singular items of post types */
					if ( ! is_admin() && is_singular() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'webr-google-' . $google_service_key . '-' . $test_singular,
								'parent' => 'webr-google-' . $google_service_key,
								'title'  => ddw_tbex_string_test_current_page_url(),
								'href'   => esc_url( $webr_google_service_data[ 'url_query' ] . get_permalink( get_the_ID() ) ),
								'meta'   => array(
									'rel'    => ddw_tbex_meta_rel(),
									'target' => ddw_tbex_meta_target(),
									'title'  => ddw_tbex_string_test_current_page_url(),
								)
							)
						);

					}  // end if

					/** Test Home URL (Admin & Frontend) */
					$admin_bar->add_node(
						array(
							'id'     => 'webr-google-' . $google_service_key . '-' . $test_home,
							'parent' => 'webr-google-' . $google_service_key,
							'title'  => ddw_tbex_string_test_home_url(),
							'href'   => esc_url( $webr_google_service_data[ 'url_query' ] . home_url( '/' ) ),
							'meta'   => array(
								'rel'    => ddw_tbex_meta_rel(),
								'target' => ddw_tbex_meta_target(),
								'title'  => ddw_tbex_string_test_home_url(),
							)
						)
					);

			}  // end foreach

		}  // end if

		/** Google Search Console (former Webmaster Tools) */
		$admin_bar->add_node(
			array(
				'id'     => 'webr-google-searchconsole',
				'parent' => 'webr-google-services',
				'title'  => esc_attr__( 'Google Search Console', 'toolbar-extras' ),
				'href'   => 'https://search.google.com/search-console',		// https://www.google.com/webmasters/tools/home',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Google Search Console', 'toolbar-extras' ),
				)
			)
		);

		/** Google Analytics */
		$admin_bar->add_node(
			array(
				'id'     => 'webr-google-analytics',
				'parent' => 'webr-google-services',
				'title'  => esc_attr__( 'Google Analytics', 'toolbar-extras' ),
				'href'   => 'https://analytics.google.com/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Google Analytics', 'toolbar-extras' ),
				)
			)
		);

		/** Google Tag Manager */
		$admin_bar->add_node(
			array(
				'id'     => 'webr-google-tagmanager',
				'parent' => 'webr-google-services',
				'title'  => esc_attr__( 'Google Tag Manager', 'toolbar-extras' ),
				'href'   => 'https://tagmanager.google.com/',
				'meta'   => array(
					'rel'    => ddw_tbex_meta_rel(),
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Google Tag Manager', 'toolbar-extras' ),
				)
			)
		);

}  // end function
