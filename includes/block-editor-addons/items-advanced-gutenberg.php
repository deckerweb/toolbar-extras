<?php

// includes/block-editor-addons/items-advanced-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_advanced_gutenberg', 150 );
/**
 * Site items for Plugin: Advanced Gutenberg (free, by JoomUnited)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_aoitems_advanced_gutenberg() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-advanced-gutenberg',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Advanced Gutenberg Profiles', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=advgb_main' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( __( 'Advanced Gutenberg', 'toolbar-extras' ) )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-profiles-all',
				'parent' => 'tbex-advanced-gutenberg',
				'title'  => esc_attr__( 'All Profiles', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#profiles' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Profiles', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-profiles-new',
				'parent' => 'tbex-advanced-gutenberg',
				'title'  => esc_attr__( 'New Profile', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advgb_main&view=profile&id=new' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Profile', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'advanced-gutenberg-settings',
				'parent' => 'tbex-advanced-gutenberg',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'advanced-gutenberg-settings-configuration',
					'parent' => 'advanced-gutenberg-settings',
					'title'  => esc_attr__( 'Configuration', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Configuration', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'advanced-gutenberg-settings-email-form',
					'parent' => 'advanced-gutenberg-settings',
					'title'  => esc_attr__( 'Email &amp; Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#email-form' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Email &amp; Form', 'toolbar-extras' )
					)
				)
			);
			
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'advanced-gutenberg-settings-styles',
					'parent' => 'advanced-gutenberg-settings',
					'title'  => esc_attr__( 'Custom Styles', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#custom-styles' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Styles', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'advanced-gutenberg-settings-translation',
					'parent' => 'advanced-gutenberg-settings',
					'title'  => esc_attr__( 'Translation Tools', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=advgb_main#translation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Translation Tools', 'toolbar-extras' )
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-advancedgutenberg-resources',
					'parent' => 'tbex-advanced-gutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'advancedgutenberg-support',
				'group-advancedgutenberg-resources',
				'https://wordpress.org/support/plugin/advanced-gutenberg'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'advancedgutenberg-translate',
				'group-advancedgutenberg-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-gutenberg'
			);

			ddw_tbex_resource_item(
				'official-site',
				'advancedgutenberg-site',
				'group-advancedgutenberg-resources',
				'https://www.joomunited.com/wordpress-products/advanced-gutenberg'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_new_content_advanced_gutenberg' );
/**
 * Items for "New Content" section: New Profile for Advanced Gutenberg
 *
 * @since 1.4.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_new_content_advanced_gutenberg() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-new-advgb-profile',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'Block Editor Profile', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=advgb_main&view=profile&id=new' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Add new Block Editor Profile via Advanced Gutenberg Add-On', 'toolbar-extras' )
			)
		)
	);

}  // end function
