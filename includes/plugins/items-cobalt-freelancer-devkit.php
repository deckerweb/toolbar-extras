<?php

// includes/plugins/items-cobalt-freelancer-devkit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_freelancer_devkit', 140 );
/**
 * Items for Add-On: Freelancer DevKit (Premium, by Cobalt Apps)
 *
 * @since  1.1.0
 *
 * @uses   ddw_tbex_display_items_resources()
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_freelancer_devkit() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'freelancer-devkit',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Freelancer DevKit', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Freelancer DevKit (Premium Add-On)', 'toolbar-extras' )
			)
		)
	);

		/** For DevKit specific child themes include the design settings etc. */
		if ( file_exists( get_stylesheet_directory() . '/devkit-init.php' ) ) {
			
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'freelancer-devkit-design',
					'parent' => 'freelancer-devkit',
					'title'  => esc_attr__( 'Design Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-design-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Design Options', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'freelancer-devkit-custom',
					'parent' => 'freelancer-devkit',
					'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-custom-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'freelancer-devkit-images',
					'parent' => 'freelancer-devkit',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-image-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'freelancer-devkit-creator',
				'parent' => 'freelancer-devkit',
				'title'  => esc_attr__( 'Theme Creator', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Child Theme Creator', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'freelancer-devkit-settings',
				'parent' => 'freelancer-devkit',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Freelancer DevKit */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-fldevkit-resources',
					'parent' => 'freelancer-devkit',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'fldevkit-contact',
				'group-fldevkit-resources',
				'https://cobaltapps.com/my-account/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'fldevkit-docs',
				'group-fldevkit-resources',
				'https://docs.cobaltapps.com/collection/398-freelancer-framework'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'fldevkit-forums',
				'group-fldevkit-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function