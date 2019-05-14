<?php

// includes/plugins/items-soliloquy-sliders

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_soliloquy', 15 );
/**
 * Site items for Plugin: Soliloquy Sliders Lite/Pro (free/Premium, by Soliloquy Team)
 *
 * @since 1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_soliloquy() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'soliloquy',
			'parent' => 'gallery-slider-addons',
			'title'  => esc_attr__( 'Soliloquy Slider', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=soliloquy' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Soliloquy Slider', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'soliloquy-all',
				'parent' => 'soliloquy',
				'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=soliloquy' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'soliloquy-new',
				'parent' => 'soliloquy',
				'title'  => esc_attr__( 'New Slider', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=soliloquy' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Slider', 'toolbar-extras' )
				)
			)
		);

		if ( class_exists( 'Soliloquy' ) ) {
			
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'soliloquy-settings',
					'parent' => 'soliloquy',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=soliloquy&page=soliloquy-settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'soliloquy-addons',
					'parent' => 'soliloquy',
					'title'  => esc_attr__( 'Add-Ons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=soliloquy&page=soliloquy-addons' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate/ Deactivate Add-Ons', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for Soliloquy */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-soliloquy-resources',
					'parent' => 'soliloquy',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( class_exists( 'Soliloquy' ) ) {
				
				ddw_tbex_resource_item(
					'support-contact',
					'soliloquy-contact',
					'group-soliloquy-resources',
					'https://soliloquywp.com/members-area/support/'
				);

			} else {

				ddw_tbex_resource_item(
					'support-forum',
					'soliloquy-support',
					'group-soliloquy-resources',
					'https://wordpress.org/support/plugin/soliloquy-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'documentation',
				'soliloquy-docs',
				'group-soliloquy-resources',
				'https://soliloquywp.com/docs/'
			);

			if ( ! class_exists( 'Soliloquy' ) ) {

				ddw_tbex_resource_item(
					'translations-community',
					'soliloquy-translate',
					'group-soliloquy-resources',
					'https://translate.wordpress.org/projects/wp-plugins/soliloquy-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'official-site',
				'soliloquy-site',
				'group-soliloquy-resources',
				'https://soliloquywp.com/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_soliloquy', 100 );
/**
 * Items for "New Content" section: New Soliloquy Slider
 *
 * @since 1.1.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_soliloquy() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-new-soliloquy',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'Soliloquy Slider', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=soliloquy' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'Add new Soliloquy Slider', 'Toolbar New Content section', 'toolbar-extras' )
			)
		)
	);

}  // end if
