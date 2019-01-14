<?php

// includes/plugins-forms/items-redirection

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_jg_redirection', 30 );
/**
 * Items for Plugin: Redirection (free, by John Godley)
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_jg_redirection() {

	/** For: Tools */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'jg-redirection',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr_x( 'Redirection', 'A plugin name', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'tools.php?page=redirection.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Redirection', 'A plugin name', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-all',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Redirections', 'toolbar-extras' )
				)
			)
		);

		/** Groups (dynamic) */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-groups',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=groups' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Groups', 'toolbar-extras' )
				)
			)
		);

			/** List each group as individual sub item */
			$groups = class_exists( 'Red_Group' ) ? Red_Group::get_all() : null;

			if ( ! is_null( $groups ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_group(
					array(
						'id'     => 'group-jgredirect-groups',
						'parent' => 'jg-redirection-groups',
					)
				);

				foreach ( $groups as $group ) {
					
					$group_id   = absint( $group[ 'id' ] );
					$group_name = esc_attr( $group[ 'name' ] );

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'jg-redirection-group-' . $group_id,
							'parent' => 'group-jgredirect-groups',
							'title'  => $group_name,
							'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&filterby=group&filter=' . $group_id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Group', 'toolbar-extras' ) . ': ' . $group_name
							)
						)
					);

				}  // end foreach

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'jg-redirection-groups-all',
						'parent' => 'jg-redirection-groups',
						'title'  => esc_attr__( 'All Groups', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=groups' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Groups', 'toolbar-extras' )
						)
					)
				);

			}  // end if


		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-logs',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'Logs', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=log' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Logs', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-404s',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( '404 Errors', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=404s' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( '404 Error Logs', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-import-export',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=io' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-options',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'jg-redirection-support',
				'parent' => 'jg-redirection',
				'title'  => esc_attr__( 'Support &amp; Tester', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'tools.php?page=redirection.php&sub=support' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Support &amp; Tester', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jgredirection-resources',
					'parent' => 'jg-redirection',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);
			
			ddw_tbex_resource_item(
				'support-forum',
				'jgredirection-support',
				'group-jgredirection-resources',
				'https://wordpress.org/support/plugin/redirection'
			);

			ddw_tbex_resource_item(
				'documentation',
				'jgredirection-docs',
				'group-jgredirection-resources',
				'https://redirection.me/support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'jgredirection-translate',
				'group-jgredirection-resources',
				'https://translate.wordpress.org/projects/wp-plugins/redirection'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jgredirection-site',
				'group-jgredirection-resources',
				'https://redirection.me/'
			);

		}  // end if

}  // end function
