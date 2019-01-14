<?php

// includes/plugins/items-cobalt-themer-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_themer_pro', 102 );
/**
 * Items for Add-On: Themer Pro (Premium, by Cobalt Apps)
 *
 * @since 1.1.0
 *
 * @uses themer_pro_get_settings()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_themer_pro() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ca-themerpro',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'Themer Pro', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-dashboard' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Themer Pro', 'toolbar-extras' )
			)
		)
	);

		if ( themer_pro_get_settings( 'enable_child_theme_editor' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ca-themerpro-editor-child',
					'parent' => 'ca-themerpro',
					'title'  => esc_attr__( 'Child Theme Editor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-child-editor' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Theme Editor', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ca-themerpro-editor-child-full',
					'parent' => 'ca-themerpro',
					'title'  => esc_attr__( 'Child Theme Editor Full View', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-child-editor&activefile=functions-php&subdir&fullscreen=1' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Child Theme Editor Full View', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( themer_pro_get_settings( 'enable_parent_theme_editor' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ca-themerpro-editor-parent',
					'parent' => 'ca-themerpro',
					'title'  => esc_attr__( 'Parent Theme Editor', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-parent-editor' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Parent Theme Editor', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		if ( themer_pro_get_settings( 'enable_child_image_manager' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ca-themerpro-image-manager',
					'parent' => 'ca-themerpro',
					'title'  => esc_attr__( 'Image Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-image-manager' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Child Theme Image Manager', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-themerpro-creatur',
				'parent' => 'ca-themerpro',
				'title'  => esc_attr__( 'Theme Creator', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-export' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Child Theme Creator', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ca-themerpro-general',
				'parent' => 'ca-themerpro',
				'title'  => esc_attr__( 'General Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-dashboard' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'General Settings', 'toolbar-extras' )
				)
			)
		);

		/** Group: Resources for Themer Pro */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-catpro-resources',
					'parent' => 'ca-themerpro',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-contact',
				'catpro-contact',
				'group-catpro-resources',
				'https://cobaltapps.com/my-account/'
			);

			ddw_tbex_resource_item(
				'documentation',
				'catpro-docs',
				'group-catpro-resources',
				'https://docs.cobaltapps.com/collection/382-themer-pro'
			);

			ddw_tbex_resource_item(
				'community-forum',
				'catpro-forums',
				'group-catpro-resources',
				'https://cobaltapps.com/community/index.php'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_devmode_themer_pro' );
/**
 * Dev Mode items for Plugin: Themer Pro
 *
 * @since 1.1.0
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses themer_pro_get_settings()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_devmode_themer_pro() {

	/** Bail early if Dev Mode is disabled */
	if ( ! ddw_tbex_display_items_dev_mode() ) {
		return;
	}

	add_filter( 'tbex_filter_is_dev_mode', '__return_empty_string' );

	/** Group */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-themer-pro',
			'parent' => 'rapid-dev'
		)
	);

	if ( themer_pro_get_settings( 'enable_child_theme_editor' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'catpro-editor-child',
				'parent' => 'group-themer-pro',
				'title'  => esc_attr__( 'Child Theme Editor', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-child-editor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Child Theme Editor', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	if ( themer_pro_get_settings( 'enable_parent_theme_editor' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'catpro-editor-parent',
				'parent' => 'group-themer-pro',
				'title'  => esc_attr__( 'Parent Theme Editor', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=themer-pro-parent-editor' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Parent Theme Editor', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function
