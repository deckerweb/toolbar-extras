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
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
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
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Freelancer DevKit', 'toolbar-extras' ) )
			)
		)
	);

		/** For DevKit specific child themes include the design settings etc. */
		if ( file_exists( get_stylesheet_directory() . '/devkit-init.php' ) ) {
			
			/** Custom Design */
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
						'id'     => 'freelancer-devkit-design-customize',
						'parent' => 'freelancer-devkit-design',
						'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-design-options' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'freelancer-devkit-design-fullview',
						'parent' => 'freelancer-devkit-design',
						'title'  => esc_attr__( 'Full View', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-design-options&iframe=expanded' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Full View', 'toolbar-extras' )
						)
					)
				);

			/** Custom Options */
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
						'id'     => 'freelancer-devkit-custom-code',
						'parent' => 'freelancer-devkit-custom',
						'title'  => esc_attr__( 'Custom CSS, JS, Code', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-custom-options' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Custom CSS, JS, Code', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'freelancer-devkit-custom-fullview',
						'parent' => 'freelancer-devkit-custom',
						'title'  => esc_attr__( 'Full View', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-custom-options&iframe=expanded' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Full View', 'toolbar-extras' )
						)
					)
				);

			/** Image Manager */
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

		/** Theme Creator */
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

		/** General settings */
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

		/** Help videos */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'freelancer-devkit-helpvideos',
				'parent' => 'freelancer-devkit',
				'title'  => esc_attr__( 'Help Videos', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=freelancer-devkit-docs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help Videos (Inline)', 'toolbar-extras' )
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
				esc_url( admin_url( 'admin.php?page=freelancer-devkit-docs' ) )
			);

			ddw_tbex_resource_item(
				'community-forum',
				'fldevkit-forums',
				'group-fldevkit-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function
