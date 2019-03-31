<?php

// includes/plugins/items-shariff

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_shariff', 15 );
/**
 * Site Group Items from Plugin:
 *   Shariff Wrapper (free, by Jan-Peter Lambeck & 3UU)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_shariff() {

	/** Code Snippets Items */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elements-shariff',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'Shariff', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Shariff Wrapper Sharing Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-basic',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Basic Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_basic' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Basic Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-design',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Design Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_design' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Design Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-advanced',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_advanced' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Advanced Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-statistic',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Statistic Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_statistic' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Statistic Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-help-params',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Shortcode Params', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_help' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Get Help: Overview of Shortcode Parameters', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-status',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_status' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Status', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elements-shariff-ranking',
				'parent' => 'elements-shariff',
				'title'  => esc_attr__( 'Ranking', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=shariff3uu&tab=shariff3uu_ranking' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Ranking', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-shariff-resources',
					'parent' => 'elements-shariff',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'shariff-support',
				'group-shariff-resources',
				'https://wordpress.org/support/plugin/shariff'
			);

			ddw_tbex_resource_item(
				'documentation',
				'shariff-faq-docs',
				'group-shariff-resources',
				'https://wordpress.org/plugins/shariff/#faq'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'shariff-translate',
				'group-shariff-resources',
				'https://translate.wordpress.org/projects/wp-plugins/shariff'
			);

			/** Legal info (in German only) */
			if ( ddw_tbex_is_german() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'shariff-legal-info',
						'parent' => 'group-shariff-resources',
						'title'  => esc_attr__( 'Legal Info &amp; Background', 'toolbar-extras' ),
						'href'   => 'http://ct.de/-2467514',
						'meta'   => array(
							'rel'    => ddw_tbex_meta_rel(),
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Legal Info &amp; Background', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		}  // end if

}  // end function
