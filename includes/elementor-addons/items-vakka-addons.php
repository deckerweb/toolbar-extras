<?php

// includes/elementor-addons/items-vakka-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_vakka_addons', 100 );
/**
 * Items for Add-On: Vakka Addons for Elementor (Premium, by MaxxTheme)
 *
 * @since 1.3.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_vakka_addons( $admin_bar ) {

	/** JetReviews Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-vakka-addons',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Vakka Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=vakka_options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'Vakka Content', 'toolbar-extras' ) ),
			)
		)
	);

		/** Tabs */
		$admin_bar->add_group(
			array(
				'id'     => 'group-vakka-tabs',
				'parent' => 'ao-vakka-addons',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-tabs-all',
					'parent' => 'group-vakka-tabs',
					'title'  => esc_attr__( 'All Tabs', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=vakka_tab' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Tabs', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-tabs-new',
					'parent' => 'group-vakka-tabs',
					'title'  => esc_attr__( 'New Tab', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=vakka_tab' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Tab', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'vakka_tab' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-vakka-tabs-builder',
						'parent' => 'group-vakka-tabs',
						'title'  => esc_attr__( 'New Tab Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'vakka_tab' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Tab Builder', 'toolbar-extras' )
						)
					)
				);

				if ( ddw_tbex_display_items_new_content() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'vakka-tab-with-builder',
							'parent' => 'new-vakka_tab',
							'title'  => ddw_tbex_string_newcontent_with_builder(),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'vakka_tab' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_newcontent_create_with_builder(),
							)
						)
					);

				}  // end if

			}  // end if

		/** Sliders */
		$admin_bar->add_group(
			array(
				'id'     => 'group-vakka-sliders',
				'parent' => 'ao-vakka-addons',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-sliders-all',
					'parent' => 'group-vakka-sliders',
					'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=vakka_slider' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Sliders', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-sliders-new',
					'parent' => 'group-vakka-sliders',
					'title'  => esc_attr__( 'New Slider', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=vakka_slider' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Slider', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'vakka_slider' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-vakka-sliders-builder',
						'parent' => 'group-vakka-sliders',
						'title'  => esc_attr__( 'New Slider Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'vakka_slider' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Slider Builder', 'toolbar-extras' ),
						)
					)
				);

				if ( ddw_tbex_display_items_new_content() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'vakka-slider-with-builder',
							'parent' => 'new-vakka_slider',
							'title'  => ddw_tbex_string_newcontent_with_builder(),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'vakka_slider' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => ddw_tbex_string_newcontent_create_with_builder(),
							)
						)
					);

				}  // end if

			}  // end if

		/** Galleries */
		$admin_bar->add_group(
			array(
				'id'     => 'group-vakka-galleries',
				'parent' => 'ao-vakka-addons',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-galleries-all',
					'parent' => 'group-vakka-galleries',
					'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=vakka_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Galleries', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-galleries-new',
					'parent' => 'group-vakka-galleries',
					'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=vakka_gallery' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Gallery', 'toolbar-extras' ),
					)
				)
			);

		/** Vakka Addons Settings etc. */
		$admin_bar->add_group(
			array(
				'id'     => 'group-vakka-settings',
				'parent' => 'ao-vakka-addons',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-vakka-settings-elements',
					'parent' => 'group-vakka-settings',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=vakka_options' ) ),
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
					'id'     => 'group-vakka-resources',
					'parent' => 'ao-vakka-addons',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'vakka-addons-docs',
				'group-vakka-resources',
				'https://maxxtheme.com/wp/codecanyon/vakka-addons/documents/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'vakka-addons-site',
				'group-vakka-resources',
				'https://maxxtheme.com/wp/codecanyon/vakka-addons/'
			);

		}  // end if

}  // end function
