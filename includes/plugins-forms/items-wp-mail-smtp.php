<?php

// includes/plugins-forms/items-wp-mail-smtp

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpmail_smtp', 50 );
/**
 * Items for Plugin: WP Mail SMTP (free, by WPForms)
 *
 * @since 1.4.2
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpmail_smtp( $admin_bar ) {

	/** For: Forms */
	$admin_bar->add_node(
		array(
			'id'     => 'forms-wpmailsmtp',
			'parent' => 'tbex-sitegroup-tools',		//'tbex-sitegroup-forms',
			'title'  => esc_attr__( 'WP Mail SMTP', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=wp-mail-smtp' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Post SMTP (Postman)', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-wpmailsmtp-settings',
				'parent' => 'forms-wpmailsmtp',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-mail-smtp&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-wpmailsmtp-test',
				'parent' => 'forms-wpmailsmtp',
				'title'  => esc_attr__( 'Email Test', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-mail-smtp&tab=test' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Email Test', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'forms-wpmailsmtp-misc',
				'parent' => 'forms-wpmailsmtp',
				'title'  => esc_attr__( 'Miscellaneous', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=wp-mail-smtp&tab=misc' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Miscellaneous', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpmailsmtp-resources',
					'parent' => 'forms-wpmailsmtp',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'wpmailsmtp-support',
				'group-wpmailsmtp-resources',
				'https://wordpress.org/support/plugin/wp-mail-smtp'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'wpmailsmtp-translate',
				'group-wpmailsmtp-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-mail-smtp'
			);

		}  // end if

}  // end function
