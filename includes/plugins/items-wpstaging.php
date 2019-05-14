<?php

// includes/plugins/items-wpstaging

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if WP-Staging Pro plugin is active or not.
 *
 * @since 1.3.4
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_wpstaging_pro_active() {

	return defined( 'WPSTGPRO_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpstaging', 10 );
/**
 * Items for Plugin: WP-Staging (free, by WP-Staging & Rene Hermenau)
 *
 * @since 1.0.0
 * @since 1.3.4 Added list of clones as items.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpstaging( $admin_bar ) {

	$wpstaging_title = ( ddw_tbex_is_wpstaging_pro_active() ) ? esc_attr__( 'WP-Staging Pro', 'toolbar-extras' ) : esc_attr__( 'WP-Staging', 'toolbar-extras' );

	$admin_bar->add_node(
		array(
			'id'     => 'wpstaging',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => $wpstaging_title,
			'href'   => esc_url( admin_url( 'admin.php?page=wpstg_clone' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $wpstaging_title
			)
		)
	);

		/**
		 * Add each individual clone as an item. Database query is necessary.
		 * @since 1.4.0
		 */
        $available_clones = get_option( 'wpstg_existing_clones_beta', array() );

		/** Proceed only if there are any clones */
		if ( isset( $available_clones ) && ! empty( $available_clones ) ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-wpstaging-clones',
					'parent' => 'wpstaging'
				)
			);

			foreach ( $available_clones as $clone_name => $clone_data ) {

				$clone_title  = sanitize_key( $clone_name );
				$clone_id     = $clone_data[ 'directoryName' ];

				/** Add item per install */
				$admin_bar->add_node(
					array(
						'id'     => 'wpstaging-clone-' . $clone_id,
						'parent' => 'group-wpstaging-clones',
						'title'  => $clone_title,
						'href'   => esc_url( $clone_data[ 'url' ] . '/?' ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Open Clone', 'toolbar-extras' ) . ': ' . $clone_title
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'wpstaging-clone-' . $clone_id . '-open',
							'parent' => 'wpstaging-clone-' . $clone_id,
							'title'  => esc_attr__( 'Open', 'toolbar-extras' ),
							'href'   => esc_url( $clone_data[ 'url' ] . '/?' ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Open', 'toolbar-extras' )
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'wpstaging-clone-' . $clone_id . '-login',
							'parent' => 'wpstaging-clone-' . $clone_id,
							'title'  => esc_attr__( 'Admin Login', 'toolbar-extras' ),
							'href'   => esc_url( $clone_data[ 'url' ] . '/wp-login.php' ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target(),
								'title'  => esc_attr__( 'Admin Login', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'wpstaging-create-clone',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Create Staging Clone', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg_clone' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Create Staging Clone', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpstaging-settings',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'wpstaging-tools',
				'parent' => 'wpstaging',
				'title'  => esc_attr__( 'Tools', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=wpstg-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Tools', 'toolbar-extras' )
				)
			)
		);

		if ( ddw_tbex_is_wpstaging_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'wpstaging-license',
					'parent' => 'wpstaging',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=wpstg-license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for WP-Staging */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-wpstaging-resources',
					'parent' => 'wpstaging',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( ! ddw_tbex_is_wpstaging_pro_active() ) {

				ddw_tbex_resource_item(
					'support-forum',
					'wpstaging-support',
					'group-wpstaging-resources',
					'https://wordpress.org/support/plugin/wp-staging'
				);

			}  // end if

			ddw_tbex_resource_item(
				'documentation',
				'wpstaging-docs',
				'group-wpstaging-resources',
				'https://wp-staging.com/docs/install-wp-staging/'
			);

			if ( ! ddw_tbex_is_wpstaging_pro_active() ) {

				ddw_tbex_resource_item(
					'translations-community',
					'wpstaging-translate',
					'group-wpstaging-resources',
					'https://translate.wordpress.org/projects/wp-plugins/wp-staging'
				);

			}  // end if

			ddw_tbex_resource_item(
				'github',
				'wpstaging-github',
				'group-wpstaging-resources',
				'https://github.com/rene-hermenau/wp-staging'
			);

			ddw_tbex_resource_item(
				'official-site',
				'wpstaging-site',
				'group-wpstaging-resources',
				'https://wp-staging.com/'
			);

		}  // end if

}  // end function
