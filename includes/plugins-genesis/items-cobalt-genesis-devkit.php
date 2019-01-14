<?php

// includes/plugins-genesis/items-cobalt-genesis-devkit

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_genesis_devkit', 140 );
/**
 * Items for Add-On: Genesis DevKit (Premium, by Cobalt Apps)
 *
 * @since 1.1.3
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_genesis_devkit() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'genesis-devkit',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Genesis DevKit', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Genesis DevKit', 'toolbar-extras' ) )
			)
		)
	);

		/** For DevKit specific child themes include the design settings etc. */
		if ( file_exists( get_stylesheet_directory() . '/devkit-init.php' ) ) {
			
			/** Custom design */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'genesis-devkit-design',
					'parent' => 'genesis-devkit',
					'title'  => esc_attr__( 'Design Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-design-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Design Options', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'genesis-devkit-design-customize',
						'parent' => 'genesis-devkit-design',
						'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-design-options' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'genesis-devkit-design-fullview',
						'parent' => 'genesis-devkit-design',
						'title'  => esc_attr__( 'Full View', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-design-options&iframe=expanded' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Full View', 'toolbar-extras' )
						)
					)
				);

			/** Custom options */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'genesis-devkit-custom',
					'parent' => 'genesis-devkit',
					'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-custom-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Options', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'genesis-devkit-custom-code',
						'parent' => 'genesis-devkit-custom',
						'title'  => esc_attr__( 'Custom CSS, JS, Code', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-custom-options' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Custom CSS, JS, Code', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'genesis-devkit-custom-fullview',
						'parent' => 'genesis-devkit-custom',
						'title'  => esc_attr__( 'Full View', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-custom-options&iframe=expanded' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target(),
							'title'  => esc_attr__( 'Full View', 'toolbar-extras' )
						)
					)
				);

			/** Image manager */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'genesis-devkit-images',
					'parent' => 'genesis-devkit',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-image-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Theme creator */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-devkit-creator',
				'parent' => 'genesis-devkit',
				'title'  => esc_attr__( 'Theme Creator', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Child Theme Creator', 'toolbar-extras' )
				)
			)
		);

		/** General settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-devkit-settings',
				'parent' => 'genesis-devkit',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

		/** Help videos */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'genesis-devkit-helpvideos',
				'parent' => 'genesis-devkit',
				'title'  => esc_attr__( 'Help Videos', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=genesis-devkit-docs' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Help Videos (Inline)', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Genesis DevKit */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-gendevkit-resources',
					'parent' => 'genesis-devkit',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'gendevkit-contact',
				'group-gendevkit-resources',
				'https://cobaltapps.com/my-account/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'gendevkit-docs',
				'group-gendevkit-resources',
				esc_url( admin_url( 'admin.php?page=genesis-devkit-docs' ) )
			);

			ddw_tbex_resource_item(
				'community-forum',
				'gendevkit-forums',
				'group-gendevkit-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function
