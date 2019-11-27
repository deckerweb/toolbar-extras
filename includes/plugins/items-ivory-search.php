<?php

// includes/plugins-forms/items-ivory-search

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_ivory_search' );
/**
 * Items for Plugin: Ivory Search (free, by Ivory Search)
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_ivory_search( $admin_bar ) {

	$type = 'is_search_form';

	/** For: Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'tools-ivsforms',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Ivory Search', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ivory-search' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Ivory Search', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual seaarch form as an item.
		 *   Search forms are saved as a post type therefore a query necessary.
		 * @since 1.4.9
		 */
		$args = array(
			'post_type'      => $type,
			'posts_per_page' => -1,
		);

		$searches = get_posts( $args );

		/** Proceed only if there are any search forms */
		if ( $searches ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-ivsforms-edit-search',
					'parent' => 'tools-ivsforms',
				)
			);

			foreach ( $searches as $search ) {

				$search_id   = absint( $search->ID );
				$search_name = esc_attr( $search->post_title );

				/** Add item per search form */
				$admin_bar->add_node(
					array(
						'id'     => 'tools-ivsforms-search-' . $search_id,
						'parent' => 'group-ivsforms-edit-search',
						'title'  => $search_name,
						'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Search', 'toolbar-extras' ) . ': ' . $search_name,
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tools-ivsforms-search-' . $search_id . '-builder',
							'parent' => 'tools-ivsforms-search-' . $search_id,
							'title'  => esc_attr__( 'Search Form Builder', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Search Form Builder', 'toolbar-extras' ),
							)
						)
					);

					$search_customize = (array) get_post_meta( $search_id, '_is_customize', TRUE );
					$search_ajax      = (array) get_post_meta( $search_id, '_is_ajax', TRUE );

					if ( '1' === $search_customize[ 'enable_customize' ] || '1' === $search_ajax[ 'enable_ajax' ] ) {

						$admin_bar->add_node(
							array(
								'id'     => 'tools-ivsforms-search-' . $search_id . '-customize',
								'parent' => 'tools-ivsforms-search-' . $search_id,
								'title'  => esc_attr__( 'Customize', 'toolbar-extras' ),
								'href'   => ddw_tbex_customizer_focus( 'section', 'is_section_' . $search_id ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target(),
									'title'  => esc_attr__( 'Customize', 'toolbar-extras' ),
								)
							)
						);

					}  // end if

					$admin_bar->add_node(
						array(
							'id'     => 'tools-ivsforms-search-' . $search_id . '-includes',
							'parent' => 'tools-ivsforms-search-' . $search_id,
							'title'  => esc_attr__( 'Includes', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit&tab=includes' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Includes', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tools-ivsforms-search-' . $search_id . '-excludes',
							'parent' => 'tools-ivsforms-search-' . $search_id,
							'title'  => esc_attr__( 'Excludes', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit&tab=excludes' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Excludes', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tools-ivsforms-search-' . $search_id . '-ajax',
							'parent' => 'tools-ivsforms-search-' . $search_id,
							'title'  => esc_attr__( 'Ajax', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit&tab=ajax' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Ajax', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tools-ivsforms-search-' . $search_id . '-options',
							'parent' => 'tools-ivsforms-search-' . $search_id,
							'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=ivory-search&post=' . $search_id . '&action=edit&tab=options' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
							)
						)
					);

			}  // end foreach

		}  // end if

		/** All Search Forms */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-ivsforms-all-searches',
				'parent' => 'tools-ivsforms',
				'title'  => esc_attr__( 'All Search Forms', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ivory-search' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Search Forms', 'toolbar-extras' ),
				)
			)
		);

		/** New Search Form */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-ivsforms-new-search',
				'parent' => 'tools-ivsforms',
				'title'  => esc_attr__( 'New Search Form', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ivory-search-new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Search Form', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-ivsforms-settings',
				'parent' => 'tools-ivsforms',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=ivory-search-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-ivsforms-resources',
					'parent' => 'tools-ivsforms',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'ivsforms-support',
				'group-ivsforms-resources',
				'https://wordpress.org/support/plugin/add-search-to-menu'
			);

			ddw_tbex_resource_item(
				'documentation',
				'ivsforms-docs',
				'group-ivsforms-resources',
				'https://ivorysearch.com/documentation/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'ivsforms-translate',
				'group-ivsforms-resources',
				'https://translate.wordpress.org/projects/wp-plugins/add-search-to-menu'
			);

			ddw_tbex_resource_item(
				'official-site',
				'ivsforms-site',
				'group-ivsforms-resources',
				'https://ivorysearch.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_ivs_search_form', 80 );
/**
 * Items for "New Content" section: New Ivory Search Form
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_display_items_new_content()
 *
 * @param object $admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_ivs_search_form( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() || is_network_admin() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-new-ivory-search-form',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Ivory Search', 'New Content Group', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=ivory-search-new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( esc_attr_x( 'Ivory Search', 'New Content Group', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
