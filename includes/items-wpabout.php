<?php

// includes/items-wpabout.php

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_wpitems_about_additions', 100 );
/**
 * More Items: Sub items for "WordPress About".
 *
 * @since 1.4.5
 * @since 1.4.7 Further tweaks; improved ClassicPress compatibility.
 * @since 1.4.8 Improved 'beta'/ 'rc'/ 'alpha' cleanup.
 *
 * @uses ddw_tbex_is_classicpress_install()
 * @uses ddw_tbex_is_wp52_install()
 *
 * @global string $GLOBALS[ 'wp_version' ]
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_wpitems_about_additions( $admin_bar ) {

	$cleanup = array(
		'-beta1', '-beta2', '-beta3', '-beta4', '-beta5', '-beta6', '-beta7',
		'-rc1', '-rc2', '-rc3', '-rc4', '-rc5', '-rc6', '-rc7',
		'-alpha1', '-alpha2', '-alpha3', '-alpha4', '-alpha5', '-alpha6', '-alpha7', '-alpha',
	);

	$wpversion_raw   = str_replace ( $cleanup, '', $GLOBALS[ 'wp_version' ] );
	$wpversion_clean = $wpversion_raw;

	if ( strpos( $wpversion_raw, '-' ) !== FALSE ) {
		$wpversion_clean = substr_replace( $wpversion_raw, '', -6 );
	}

	$base_url        = ( class_exists( 'WPBT_Bootstrap' ) )		// for "WP Beta Tester" plugin
		? 'https://make.wordpress.org/core/tag/%s/'
		: 'https://wordpress.org/support/wordpress-version/version-%s/';
	$wpversion_dash  = str_replace( '.', '-', $wpversion_clean );
	$version_url_wp  = sprintf(
		$base_url,
		$wpversion_dash
	);

	$version_url_cp  = 'https://forums.classicpress.net/c/announcements/release-notes';

	// https://wordpress.org/support/wordpress-version/version-4-0/
	// https://wordpress.org/support/wordpress-version/version-5-2-2/

	$title_attr_wp = sprintf(
		/* translators: %s - current WordPress version, for example 5.2.2 */
		esc_attr__( 'Release Notes for WordPress Version %s', 'toolbar-extras' ),
		$GLOBALS[ 'wp_version' ]
	);

	$title_attr_cp = esc_attr__( 'Release Notes for ClassicPress Versions', 'toolbar-extras' );

	/** Version & system info */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpabout-additions-version',
			'parent' => 'about',
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpabout-release-notes',
				'parent' => 'group-wpabout-additions-version',
				'title'  => esc_attr__( 'Release Notes', 'toolbar-extras' ),
				'href'   => ddw_tbex_is_classicpress_install() ? esc_url( $version_url_cp ) : esc_url( $version_url_wp ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_is_classicpress_install() ? $title_attr_cp : $title_attr_wp,
				)
			)
		);

		if ( ddw_tbex_is_wp52_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-system-info',
					'parent' => 'group-wpabout-additions-version',
					'title'  => esc_attr__( 'System Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'site-health.php?tab=debug' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'System Info - Site Health Status', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

	/** Add group - with special "divider" class - for "About" sub items */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpabout-additions-sub',
			'parent' => 'about',
			'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpabout-privacy',
				'parent' => 'group-wpabout-additions-sub',
				'title'  => esc_attr__( 'Privacy Notice', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'freedoms.php?privacy-notice' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Privacy Notice - Data Usage Info', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpabout-whats-new',
				'parent' => 'group-wpabout-additions-sub',
				'title'  => esc_attr__( 'What\'s New', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'about.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'What\'s New - Release Feature Info', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpabout-credits',
				'parent' => 'group-wpabout-additions-sub',
				'title'  => esc_attr__( 'Contributors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'credits.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'List of Release Contributors', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpabout-freedoms',
				'parent' => 'group-wpabout-additions-sub',
				'title'  => esc_attr__( 'Freedoms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'freedoms.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Freedoms - GPL License Info', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-cpdonate',
					'parent' => 'group-wpabout-additions-sub',
					'title'  => esc_attr__( 'Donate', 'toolbar-extras' ),
					'href'   => 'https://donate.classicpress.net/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Donate to the ClassicPress Project', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_wpitems_about_additions_dev', 100 );
/**
 * More Items: Even more Sub items for "WordPress/ ClassicPress About" - more
 *   for developers.
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses ddw_tbex_is_classicpress_install()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_wpitems_about_additions_dev( $admin_bar ) {

	/** Bail early if not in Dev Mode */
	if ( ! ddw_tbex_display_items_dev_mode() ) {
		return $admin_bar;
	}

	/** Add group - with special "divider" class */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpabout-additions-dev',
			'parent' => 'about',
			'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
		)
	);

		/** For: WordPress */
		if ( ! ddw_tbex_is_classicpress_install() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-roadmap',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Roadmap', 'toolbar-extras' ),
					'href'   => 'https://wordpress.org/about/roadmap/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'WordPress Core Project Roadmap', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-stats',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
					'href'   => 'https://wordpress.org/about/stats/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Statistics - WordPress &amp; PHP Versions', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-history',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'History (Versions)', 'toolbar-extras' ),
					'href'   => 'https://wordpress.org/about/history/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'History of WordPress Versions and Releases', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-security',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Security', 'toolbar-extras' ),
					'href'   => 'https://wordpress.org/about/security/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'WordPress Security Info', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'wpabout-accessibility',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Accessibility', 'toolbar-extras' ),
					'href'   => 'https://wordpress.org/about/accessibility/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'WordPress Accessibility', 'toolbar-extras' ),
					)
				)
			);

		}

		/** For: ClassicPress  */
		else {

			$admin_bar->add_node(
				array(
					'id'     => 'cpabout-roadmap',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Roadmap', 'toolbar-extras' ),
					'href'   => 'https://www.classicpress.net/roadmap/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'ClassicPress Core Project Roadmap', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'cpabout-petitions',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Petitions', 'toolbar-extras' ),
					'href'   => 'https://petitions.classicpress.net/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'ClassicPress Future Development', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'cpabout-security',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Security', 'toolbar-extras' ),
					'href'   => 'https://forums.classicpress.net/c/team-discussions/classicpress-security',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'ClassicPress Security Team', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'cpabout-development',
					'parent' => 'group-wpabout-additions-dev',
					'title'  => esc_attr__( 'Core Development', 'toolbar-extras' ),
					'href'   => 'https://forums.classicpress.net/c/team-discussions/core-development',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'ClassicPress Core Development Team', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

}  // end function


add_action( 'wp_before_admin_bar_render', 'ddw_tbex_remove_wpabout_original_resources' );
/**
 * Remove the original 4 external resource items as these are a) too general,
 *   and b) not really helpful as they are not specific.
 *
 *   These items get replaced with a host of more focused and specific resources
 *   for users and developers alike.
 *
 * @since 1.4.8
 *
 * @see ddw_tbex_wpitems_about_additions_resources()
 * @see ddw_tbex_wpitems_about_additions_resources_dev()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_remove_wpabout_original_resources() {

	$wp_ids = array( 'wporg', 'documentation', 'support-forums', 'feedback' );

	foreach ( $wp_ids as $wp_id ) {
		$GLOBALS[ 'wp_admin_bar' ]->remove_node( $wp_id );
	}

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_wpitems_about_additions_resources' );
/**
 * Resource Items: Remove the original (too general) resource items and replace
 *   them with a host of links that make so much more sense.
 *   - Documentation/ Support Articles
 *   - Support Forums - Sub Forums
 *   - Make Teams
 *
 * @since 1.4.8
 *
 * @see ddw_tbex_remove_wpabout_original_resources()
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_classicpress_install()
 * @uses ddw_tbex_is_german()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_wpitems_about_additions_resources( $admin_bar ) {

	/** Bail early if no WP resources display wanted */
	if ( ! ddw_tbex_display_items_resources()
		|| ddw_tbex_is_classicpress_install()	// not for ClassicPress, but this is for WP instead
	) {
		return $admin_bar;
	}

	/** Hook place: Before "Documentation" (Docs) items */
	do_action( 'tbex_wpabout_resources_before_docs', $admin_bar );

	/** 1) Documentation --> Support articles */
	$string_documentation = esc_attr__( 'Documentation', 'toolbar-extras' );
	$url_wpdocs           = 'https://wordpress.org/support/';

	$admin_bar->add_node(
		array(
			'id'     => 'wpdocs-documentation',
			'parent' => 'wp-logo-external',
			'title'  => $string_documentation,
			'href'   => esc_url( $url_wpdocs ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $string_documentation,
			)
		)
	);

		/** Group for docs categories */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpdocs-categories',
				'parent' => 'wpdocs-documentation',
				'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
			)
		);

		$support_categories = array(
			'getting-started'      => esc_attr__( 'Getting Started', 'toolbar-extras' ),
			'installing-wordpress' => esc_attr__( 'Installing WordPress', 'toolbar-extras' ),
			'basic-usage'          => esc_attr__( 'Basic Usage', 'toolbar-extras' ),
			'basic-administration' => esc_attr__( 'Basic Administration', 'toolbar-extras' ),
			'customizing'          => esc_attr__( 'Customizing', 'toolbar-extras' ),
			'maintenance'          => esc_attr__( 'Maintenance', 'toolbar-extras' ),
			'security'             => esc_attr__( 'Security', 'toolbar-extras' ),
			'advanced-topics'      => esc_attr__( 'Advanced Topics', 'toolbar-extras' ),
			'troubleshooting'      => esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
		);

		foreach ( $support_categories as $support_category => $support_category_label ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpdocs-support-' . $support_category,
					'parent' => 'group-wpdocs-categories',
					'title'  => $support_category_label,
					'href'   => esc_url( $url_wpdocs . $support_category . '/' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => $string_documentation . ': ' . $support_category_label,
					)
				)
			);

		}  // end foreach

		$admin_bar->add_node(
			array(
				'id'     => 'wpdocs-codex-old',
				'parent' => 'wpdocs-documentation',
				'title'  => esc_attr__( 'Old: Codex', 'toolbar-extras' ),
				'href'   => 'https://codex.wordpress.org/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Old: WordPress Codex', 'toolbar-extras' ),
				)
			)
		);

	/** Hook place: After "Documentation" (Docs) items */
	do_action( 'tbex_wpabout_resources_after_docs', $admin_bar );


	/** 2) Support Forums */
	$string_support_forums = esc_attr__( 'Support Forums', 'toolbar-extras' );
	$url_wpforums          = 'https://wordpress.org/support/forums/';
	$url_wpforum_base      = 'https://wordpress.org/support/forum/';

	$admin_bar->add_node(
		array(
			'id'     => 'wpforums-support',
			'parent' => 'wp-logo-external',
			'title'  => $string_support_forums,
			'href'   => esc_url( $url_wpforums ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $string_support_forums,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpforums-welcome',
				'parent' => 'wpforums-support',
				'title'  => esc_attr__( 'Welcome to Support', 'toolbar-extras' ),
				'href'   => 'https://wordpress.org/support/welcome/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Welcome to Support', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpforums-support-handbook',
				'parent' => 'wpforums-support',
				'title'  => esc_attr__( 'The Support Handbook', 'toolbar-extras' ),
				'href'   => 'https://make.wordpress.org/support/handbook/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Get Involved - The Support Handbook', 'toolbar-extras' ),
				)
			)
		);

		/** Group for sub forums */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpforums-subforums',
				'parent' => 'wpforums-support',
				'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
			)
		);

		$forum_categories = array(
			'installation'               => esc_attr__( 'Installing WordPress', 'toolbar-extras' ),
			'how-to-and-troubleshooting' => esc_attr__( 'Fixing WordPress', 'toolbar-extras' ),
			'wp-advanced'                => esc_attr__( 'Developing with WordPress', 'toolbar-extras' ),
			'multisite'                  => esc_attr__( 'Networking WordPress', 'toolbar-extras' ),
			'accessibility'              => esc_attr__( 'Accessibility', 'toolbar-extras' ),
			'localhost-installs'         => esc_attr__( 'Localhost Installs', 'toolbar-extras' ),
			'miscellaneous'              => esc_attr__( 'Everything else WordPress', 'toolbar-extras' ),
			'requests-and-feedback'      => esc_attr__( 'Requests and Feedback', 'toolbar-extras' ),
			'alphabeta'                  => esc_attr__( 'Alpha/ Beta/ RC', 'toolbar-extras' ),
		);

		foreach ( $forum_categories as $forum_category => $forum_category_label ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpforums-subforum-' . $forum_category,
					'parent' => 'group-wpforums-subforums',
					'title'  => $forum_category_label,
					'href'   => esc_url( $url_wpforum_base . $forum_category . '/' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => $string_support_forums . ': ' . $forum_category_label,
					)
				)
			);

		}  // end foreach

	/** Hook place: After "Support Forums" (Forums) items */
	do_action( 'tbex_wpabout_resources_after_forums', $admin_bar );


	/** 3) Make/ Get Involved */
	$string_get_involved = esc_attr__( 'Get Involved - Make WP', 'toolbar-extras' );
	$url_wpmake          = 'https://make.wordpress.org/';
	$url_status_base     = 'https://make.wordpress.org/updates/tag/';

	$string_blog     = esc_attr__( 'Team Blog', 'toolbar-extras' );
	$string_handbook = esc_attr__( 'Handbook', 'toolbar-extras' );
	$string_status   = esc_attr__( 'Status Updates', 'toolbar-extras' );

	$admin_bar->add_node(
		array(
			'id'     => 'wpmake-getinvolved',
			'parent' => 'wp-logo-external',
			'title'  => $string_get_involved,
			'href'   => esc_url( $url_wpmake ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $string_get_involved,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'wpmake-updates',
				'parent' => 'wpmake-getinvolved',
				'title'  => esc_attr__( 'Updates from Teams', 'toolbar-extras' ),
				'href'   => 'https://make.wordpress.org/updates/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Updates from Make Teams', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpmake-meetings',
				'parent' => 'wpmake-getinvolved',
				'title'  => esc_attr__( 'Meetings Calendar', 'toolbar-extras' ),
				'href'   => 'https://make.wordpress.org/meetings/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Scheduled Meetings for Make Teams', 'toolbar-extras' ),
				)
			)
		);

		/** Group for Make Teams */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpmake-teams',
				'parent' => 'wpmake-getinvolved',
				'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
			)
		);

		$make_teams = array(
			'core'          => array(
				'label' => esc_attr__( 'Core Development', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Tickets', 'toolbar-extras' ),
					'site1_url' => 'https://make.wordpress.org/core/reports/',
					'site2'     => 'Components',
					'site2_url' => 'https://make.wordpress.org/core/components/',
					'site3'     => $string_handbook,
					'site3_url' => 'https://make.wordpress.org/core/handbook/',
				),
			),
			'design'        => array(
				'label' => esc_attr__( 'Design', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Trello Board', 'toolbar-extras' ),
					'site1_url' => 'https://trello.com/b/fnHScayo/design-team',
					'site2'     => $string_handbook,
					'site2_url' => 'https://make.wordpress.org/design/handbook/',
					'status'    => 'design',
				),
			),
			'polyglots'     => array(
				'label' => esc_attr__( 'Polyglots - Translations', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Teams', 'toolbar-extras' ),
					'site1_url' => 'https://make.wordpress.org/polyglots/teams/',
					'site2'     => esc_attr__( 'Translate Platform', 'toolbar-extras' ),
					'site2_url' => 'https://translate.wordpress.org/',
					'site3'     => $string_handbook,
					'site3_url' => 'https://make.wordpress.org/polyglots/handbook/',
				),
			),
			'accessibility' => array(
				'label' => esc_attr__( 'Accessibility', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/accessibility/handbook/',
				),
			),
			'support'       => array(
				'label' => esc_attr__( 'Support', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/support/handbook/',
					'status'    => 'support',
				),
			),
			'docs'          => array(
				'label' => esc_attr__( 'Documentation', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/docs/handbook/',
				),
			),
			'themes'        => array(
				'label' => esc_attr__( 'Themes', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/themes/handbook/',
					'site2'     => esc_attr__( 'Themes Trac', 'toolbar-extras' ),
					'site2_url' => 'https://themes.trac.wordpress.org/',
				),
			),
			'plugins'       => array(
				'label' => esc_attr__( 'Plugins', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/plugins/handbook/',
					'status'    => 'plugins',
				),
			),
			'community'     => array(
				'label' => esc_attr__( 'Community', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Team Projects', 'toolbar-extras' ),
					'site1_url' => 'https://make.wordpress.org/community/team-projects/',
					'site2'     => $string_handbook,
					'site2_url' => 'https://make.wordpress.org/community/handbook/',
					'site3'     => esc_attr__( 'Community Deputies', 'toolbar-extras' ),
					'site3_url' => 'https://make.wordpress.org/community/community-deputies/',
					'status'    => 'community-team',
				),
			),
			'marketing'     => array(
				'label' => esc_attr__( 'Marketing', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Trello Board', 'toolbar-extras' ),
					'site1_url' => 'https://trello.com/b/8UGHVBu8/wp-marketing',
					'site2'     => $string_handbook,
					'site2_url' => 'https://make.wordpress.org/marketing/handbook/',
				),
			),
			'training'      => array(
				'label' => esc_attr__( 'Training', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/training/handbook/',
				),
			),
			'cli'           => array(
				'label' => esc_attr__( 'CLI', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/cli/handbook/',
				),
			),
			'tide'          => array(
				'label' => esc_attr__( 'Tide', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Documentation', 'toolbar-extras' ),
					'site1_url' => 'https://www.wptide.org/',
				),
			),
			'hosting'       => array(
				'label' => esc_attr__( 'Hosting', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Host Test Results', 'toolbar-extras' ),
					'site1_url' => 'https://make.wordpress.org/hosting/test-results/',
					'site2'     => $string_handbook,
					'site2_url' => 'https://make.wordpress.org/hosting/handbook/',
				),
			),
			'test'          => array(
				'label' => esc_attr__( 'Test', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/test/handbook/',
				),
			),
			'meta'          => array(
				'label' => esc_attr__( 'Meta - WordPress.org', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => esc_attr__( 'Projects', 'toolbar-extras' ),
					'site1_url' => 'https://make.wordpress.org/meta/projects/',
					'site2'     => esc_attr__( 'Meta Trac', 'toolbar-extras' ),
					'site2_url' => 'https://meta.trac.wordpress.org/',
					'site3'     => $string_handbook,
					'site3_url' => 'https://make.wordpress.org/meta/handbook/',
				),
			),
			'tv'            => array(
				'label' => esc_attr__( 'TV - WordPress.tv', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/tv/handbook/',
				),
			),
			'mobile'        => array(
				'label' => esc_attr__( 'Mobile Apps', 'toolbar-extras' ),
				'meta'  => array(
					'site1'     => $string_handbook,
					'site1_url' => 'https://make.wordpress.org/mobile/handbook/',
					'status'    => 'mobile',
				),
			),
		);

		foreach ( $make_teams as $make_team => $make_team_data ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpmake-teams-' . $make_team,
					'parent' => 'group-wpmake-teams',
					'title'  => $make_team_data[ 'label' ],
					'href'   => esc_url( $url_wpmake . $make_team . '/' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => $string_get_involved . ': ' . $make_team_data[ 'label' ],
					)
				)
			);

			if ( isset( $make_team_data[ 'meta' ] ) && ! is_null( $make_team_data[ 'meta' ] ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'wpmake-teams-' . $make_team . '-blog',
						'parent' => 'wpmake-teams-' . $make_team,
						'title'  => $string_blog,
						'href'   => esc_url( $url_wpmake . $make_team . '/' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => $make_team_data[ 'label' ] . ': ' . $string_blog,
						)
					)
				);

				if ( isset( $make_team_data[ 'meta' ][ 'site1' ] ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'wpmake-teams-' . $make_team . '-site1',
							'parent' => 'wpmake-teams-' . $make_team,
							'title'  => $make_team_data[ 'meta' ][ 'site1' ],
							'href'   => esc_url( $make_team_data[ 'meta' ][ 'site1_url' ] ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => $make_team_data[ 'label' ] . ': ' . $make_team_data[ 'meta' ][ 'site1' ],
							)
						)
					);

				}  // end if Site 1 check

				if ( isset( $make_team_data[ 'meta' ][ 'site2' ] ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'wpmake-teams-' . $make_team . '-site2',
							'parent' => 'wpmake-teams-' . $make_team,
							'title'  => $make_team_data[ 'meta' ][ 'site2' ],
							'href'   => esc_url( $make_team_data[ 'meta' ][ 'site2_url' ] ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => $make_team_data[ 'label' ] . ': ' . $make_team_data[ 'meta' ][ 'site2' ],
							)
						)
					);

				}  // end if Site 2 check

				if ( isset( $make_team_data[ 'meta' ][ 'site3' ] ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'wpmake-teams-' . $make_team . '-site3',
							'parent' => 'wpmake-teams-' . $make_team,
							'title'  => $make_team_data[ 'meta' ][ 'site3' ],
							'href'   => esc_url( $make_team_data[ 'meta' ][ 'site3_url' ] ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => $make_team_data[ 'label' ] . ': ' . $make_team_data[ 'meta' ][ 'site3' ],
							)
						)
					);

				}  // end if Site 3 check

				if ( isset( $make_team_data[ 'meta' ][ 'status' ] ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'wpmake-teams-' . $make_team . '-status-updates',
							'parent' => 'wpmake-teams-' . $make_team,
							'title'  => $string_status,
							'href'   => esc_url( $url_status_base . $make_team_data[ 'meta' ][ 'status' ] . '/' ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => $make_team_data[ 'label' ] . ': ' . $string_status,
							)
						)
					);

				}  // end if Status Updates check

			}  // end if Meta check

		}  // end foreach

	/** Hook place: After "Make Teams" (Make) items */
	do_action( 'tbex_wpabout_resources_after_make', $admin_bar );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_wpitems_about_additions_resources_dev' );
/**
 * Resource Items: Optionally add a host of developer oriented resources.
 *   - Official Dev Hub
 *   - WP StackExchange (third-party)
 *
 * @since 1.4.8
 *
 * @see ddw_tbex_remove_wpabout_original_resources()
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_is_classicpress_install()
 * @uses ddw_tbex_meta_target()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_wpitems_about_additions_resources_dev( $admin_bar ) {

	/** Bail early if no WP resources display wanted */
	if ( ! ddw_tbex_display_items_dev_mode()
		|| ! ddw_tbex_display_items_resources()
		|| ddw_tbex_is_classicpress_install()	// not for ClassicPress, but this is for WP instead
	) {
		return $admin_bar;
	}

	/** 1) Official Dev Resources */
	$string_developers = esc_attr__( 'Developers', 'toolbar-extras' );
	$url_wpdev         = 'https://developer.wordpress.org/';

	$admin_bar->add_node(
		array(
			'id'     => 'wpdev-hub',
			'parent' => 'wp-logo-external',
			'title'  => $string_developers,
			'href'   => esc_url( $url_wpdev ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $string_developers,
			)
		)
	);

		/** Group for Dev Hubs */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpdev-hubs',
				'parent' => 'wpdev-hub',
				'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
			)
		);

		$dev_hubs = array(
			'reference'           => esc_attr__( 'Code Reference', 'toolbar-extras' ),
			'coding-standards'    => esc_attr__( 'Coding Standards', 'toolbar-extras' ),
			'block-editor'        => esc_attr__( 'Block Editor - Gutenberg', 'toolbar-extras' ),
			'apis'                => esc_attr__( 'Common APIs', 'toolbar-extras' ),
			'themes'              => esc_attr__( 'Develop Themes', 'toolbar-extras' ),
			'plugins'             => esc_attr__( 'Develop Plugins', 'toolbar-extras' ),
			'rest-api'            => esc_attr__( 'REST API - Make Applications', 'toolbar-extras' ),
			'cli/commands'        => esc_attr__( 'WP-CLI - Run Commands', 'toolbar-extras' ),
			'resources/dashicons' => esc_attr__( 'Dashicons', 'toolbar-extras' ),
		);

		foreach ( $dev_hubs as $dev_hub => $dev_hub_label ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpdev-hubs-' . sanitize_key( $dev_hub ),
					'parent' => 'group-wpdev-hubs',
					'title'  => $dev_hub_label,
					'href'   => esc_url( $url_wpdev . $dev_hub . '/' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => $string_developers . ': ' . $dev_hub_label,
					)
				)
			);

		}  // end foreach


	/** 2) WP StackExchange */
	$string_wpse = esc_attr__( 'WP StackExchange', 'toolbar-extras' );
	$url_wpse    = 'https://wordpress.stackexchange.com/';

	$admin_bar->add_node(
		array(
			'id'     => 'wpse-development',
			'parent' => 'wp-logo-external',
			'title'  => $string_wpse,
			'href'   => esc_url( $url_wpse ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => $string_wpse,
			)
		)
	);

		/** Group for SE Areas */
		$admin_bar->add_group(
			array(
				'id'     => 'group-wpse-areas',
				'parent' => 'wpse-development',
				'meta'   => array( 'class' => 'tbex-group-resources-divider' ),
			)
		);

		$se_areas = array(
			'questions'  => esc_attr__( 'All Questions', 'toolbar-extras' ),
			'unanswered' => esc_attr__( 'Unanswered Questions', 'toolbar-extras' ),
			'tags'       => esc_attr__( 'Tags', 'toolbar-extras' ),
			'users'      => esc_attr__( 'Users', 'toolbar-extras' ),
		);

		foreach ( $se_areas as $se_area => $se_area_label ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpse-areas-' . $se_area,
					'parent' => 'group-wpse-areas',
					'title'  => $se_area_label,
					'href'   => esc_url( $url_wpse . $se_area ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => $string_wpse . ': ' . $se_area_label,
					)
				)
			);

		}  // end foreach

}  // end function


//add_action( 'tbex_wpabout_resources_before_docs', 'ddw_tbex_wpitems_about_additions_local_info' );
add_action( 'admin_bar_menu', 'ddw_tbex_wpitems_about_additions_local_info', 1000 );
/**
 * Add additional localized resources for specific languages/ countries.
 *
 *   Note: All additions need to hook in to the parent ID of 'group-wplocal-help'.
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_is_german()
 * @uses determine_locale()
 * @uses get_user_locale()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_wpitems_about_additions_local_info( $admin_bar ) {

	$admin_bar->add_group(
		array(
			'id'     => 'group-wplocal-help',
			'parent' => 'wp-logo-external',
			'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
		)
	);

	/** 0) Local resource for German locales */
	if ( ddw_tbex_is_german() ) {

		$locale        = function_exists( 'determine_locale' ) ? determine_locale() : get_user_locale();
		$string_locale = sprintf(
			/* translators: %s - current locale, for example 'de_DE' */
			esc_attr__( 'Locale %s', 'toolbar-extras' ),
			$locale
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wplocal-german',
				'parent' => 'group-wplocal-help',	//'wp-logo-external',
				'title'  => esc_attr__( 'Info &amp; Help in German', 'toolbar-extras' ),
				'href'   => 'https://de.wordpress.org/',
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => $string_locale . ': ' . esc_attr__( 'Info &amp; Help in German', 'toolbar-extras' ),
				)
			)
		);

	}  // end if

}  // end function
