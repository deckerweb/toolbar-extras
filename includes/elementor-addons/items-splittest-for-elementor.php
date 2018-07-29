<?php

// includes/elementor-addons/items-splittest-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_splittest_for_elementor', 100 );
/**
 * Items for Add-On: Split Test For Elementor (free, by Rocket Elements)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_splittest_for_elementor() {

	/** Plugin's Templates Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-splittestfe',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Split Tests', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Split Tests for Elementor', 'toolbar-extras' ) )
			)
		)
	);

		/**
		 * Add each individual split test as an item. Database query is
		 *   necessary.
		 *   Note: Namespaced classes since Split Tests plugin version 1.0.2
		 *         (2018-07-22).
		 * @since 1.3.2
		 */
		$splittest_manager = new \SplitTestForElementor\classes\repo\TestManager();
		$split_tests       = $splittest_manager->getAllTests();

		/** Proceed only if there are any split tests */
		if ( $split_tests ) {

			/** Add group */
			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-splittestfe-edit-tests',
					'parent' => 'ao-splittestfe'
				)
			);

			foreach ( $split_tests as $test ) {

				$test_name = $test->name;

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-splittestfe-test-' . $test->id,
						'parent' => 'group-splittestfe-edit-tests',
						'title'  => $test_name,
						'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor&scope=test&action=edit&id=' . $test->id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Test', 'toolbar-extras' ) . ': ' . $test_name
						)
					)
				);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'ao-splittestfe-test-' . $test->id . '-edit',
							'parent' => 'ao-splittestfe-test-' . $test->id,
							'title'  => esc_attr__( 'Edit Test', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor&scope=test&action=edit&id=' . $test->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Test', 'toolbar-extras' )
							)
						)
					);

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'ao-splittestfe-test-' . $test->id . '-statistics',
							'parent' => 'ao-splittestfe-test-' . $test->id,
							'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor&scope=statistics&action=index&id=' . $test->id ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Statistics', 'toolbar-extras' )
							)
						)
					);

			}  // end foreach

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-splittestfe-all',
				'parent' => 'ao-splittestfe',
				'title'  => esc_attr__( 'All Tests', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Tests', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-splittestfe-new',
				'parent' => 'ao-splittestfe',
				'title'  => esc_attr__( 'New Test', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor&scope=test&action=create' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Test', 'toolbar-extras' )
				)
			)
		);

		/** Group: Plugin's Resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-splittestfe-resources',
					'parent' => 'ao-splittestfe',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'splittestfe-support',
				'group-splittestfe-resources',
				'https://wordpress.org/support/plugin/splittest-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'splittestfe-translate',
				'group-splittestfe-resources',
				'https://translate.wordpress.org/projects/wp-plugins/splittest-for-elementor'
			);

			ddw_tbex_resource_item(
				'official-site',
				'splittestfe-site',
				'group-splittestfe-resources',
				'https://www.rocketelements.io/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_splittest_for_elementor' );
/**
 * Items for "New Content" section: New Split Test for Elementor
 *
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_splittest_for_elementor() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-new-splittestfe',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Split Test', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=splittest-for-elementor&scope=test&action=create' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Split Test for Elementor', 'toolbar-extras' )
			)
		)
	);

}  // end if