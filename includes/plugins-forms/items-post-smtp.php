<?php

// includes/plugins-forms/items-post-smtp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_post_smtp', 50 );
/**
 * Items for Plugin: Post SMTP (free, by Yehuda Hassine)
 *
 * @since 1.4.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_post_smtp( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-postsmtp',
			'parent' => 'tbex-sitegroup-tools',		//'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'Post SMTP', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=postman' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Post SMTP (Postman)', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-overview',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=postman' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
				)
			)
		);

		/** Email logs */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-logs',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'Email Log', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=postman_email_log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post SMTP Email Log', 'toolbar-extras' )
				)
			)
		);

		/** Setup wizard */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-wizard',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration_wizard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Setup Wizard', 'toolbar-extras' )
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-settings',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-account',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Account', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#account_config' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Account', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-fallback',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Fallback', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#fallback' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Fallback', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-message',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Message', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#message_config' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Message', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-logging',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Logging', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#logging_config' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Logging', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-advanced',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#advanced_options_config' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-notifications',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Notifications', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fconfiguration#notifications' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Notifications', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-settings-exportimport',
					'parent' => 'forms-postsmtp-settings',
					'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fmanage-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' )
					)
				)
			);

		/** Testing */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-testing',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'Testing', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=postman%2Femail_test' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Testing', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-testing-email',
					'parent' => 'forms-postsmtp-testing',
					'title'  => esc_attr__( 'Send Test Email', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Femail_test' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Send Test Email', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-testing-connectivity',
					'parent' => 'forms-postsmtp-testing',
					'title'  => esc_attr__( 'Connectivity Test', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fport_test' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Connectivity Test', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-testing-diagnostic',
					'parent' => 'forms-postsmtp-testing',
					'title'  => esc_attr__( 'Diagnostic Test', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=postman%2Fdiagnostics' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Diagnostic Test', 'toolbar-extras' )
					)
				)
			);

		/** About */
		$admin_bar->add_node(
			array(
				'id'     => 'forms-postsmtp-about',
				'parent' => 'forms-postsmtp',
				'title'  => esc_attr__( 'About', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'index.php?page=post-about' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'About', 'toolbar-extras' )
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-about-new',
					'parent' => 'forms-postsmtp-about',
					'title'  => esc_attr__( 'What\'s New', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=post-about' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'What\'s New', 'toolbar-extras' )
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-postsmtp-about-credits',
					'parent' => 'forms-postsmtp-about',
					'title'  => esc_attr__( 'Credits', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'index.php?page=post-credits' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Credits', 'toolbar-extras' )
					)
				)
			);

		/** Optionally, let other Post SMTP Add-Ons hook in */
		do_action( 'tbex_after_postsmtp_settings' );

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-postsmtp-resources',
					'parent' => 'forms-postsmtp',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'postsmtp-support',
				'group-postsmtp-resources',
				'https://wordpress.org/support/plugin/post-smtp'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'postsmtp-guides',
				'group-postsmtp-resources',
				'https://postmansmtp.com/category/guides/'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'postsmtp-community-forum',
				'group-postsmtp-resources',
				'https://postmansmtp.com/forums/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'postsmtp-translate',
				'group-postsmtp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/post-smtp'
			);

			ddw_tbex_resource_item(
				'github',
				'postsmtp-github',
				'group-postsmtp-resources',
				'https://github.com/yehudah/Post-SMTP'
			);

			ddw_tbex_resource_item(
				'official-site',
				'postsmtp-site',
				'group-postsmtp-resources',
				'https://postmansmtp.com/'
			);

		}  // end if

}  // end function
