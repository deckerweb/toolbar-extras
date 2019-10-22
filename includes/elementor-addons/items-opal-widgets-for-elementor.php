<?php

// includes/elementor-addons/items-opal-widgets-for-elementor

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_opal_widgets_for_elementor', 150 );
/**
 * Items for Add-On: Opal Widgets for Elementor (free, by wpopal)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_opal_widgets_for_elementor( $admin_bar ) {

	$type_header = 'header';
	$type_footer = 'footer';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-opalhfbuilder',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Opal Header Footer', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_header ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Opal Header &amp; Footer Builder', 'toolbar-extras' ),
			)
		)
	);

		/** Header Builder */
		$admin_bar->add_group(
			array(
				'id'     => 'group-opalhfbuilder-header',
				'parent' => 'ao-opalhfbuilder',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-opalhfbuilder-header-all',
					'parent' => 'group-opalhfbuilder-header',
					'title'  => esc_attr__( 'All Headers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_header ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Headers', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-opalhfbuilder-header-new',
					'parent' => 'group-opalhfbuilder-header',
					'title'  => esc_attr__( 'New Header', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_header ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Header', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_header ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-opalhfbuilder-header-builder',
						'parent' => 'group-opalhfbuilder-header',
						'title'  => esc_attr__( 'New Header Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_header ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Header Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Header Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-opalhfbuilder-header-categories',
						'parent' => 'group-opalhfbuilder-header',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type_header ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
						)
					)
				);

			}  // end if

		/** Footer Builder */
		$admin_bar->add_group(
			array(
				'id'     => 'group-opalhfbuilder-footer',
				'parent' => 'ao-opalhfbuilder',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-opalhfbuilder-footer-all',
					'parent' => 'group-opalhfbuilder-footer',
					'title'  => esc_attr__( 'All Footers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_footer ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Footers', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-opalhfbuilder-footer-new',
					'parent' => 'group-opalhfbuilder-footer',
					'title'  => esc_attr__( 'New Footer', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_footer ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Footer', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_footer ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-opalhfbuilder-footer-builder',
						'parent' => 'group-opalhfbuilder-footer',
						'title'  => esc_attr__( 'New Footer Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_footer ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Footer Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Footer Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-opalhfbuilder-footer-categories',
						'parent' => 'group-opalhfbuilder-footer',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type_footer ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
						)
					)
				);

			}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-opalhfbuilder-resources',
					'parent' => 'ao-opalhfbuilder',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'opalhfbuilder-support',
				'group-opalhfbuilder-resources',
				'https://wordpress.org/support/plugin/opal-widgets-for-elementor'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'opalhfbuilder-translate',
				'group-opalhfbuilder-resources',
				'https://translate.wordpress.org/projects/wp-plugins/opal-widgets-for-elementor'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_opal_widgets_for_elementor' );
/**
 * Items for "New Content" section: New Header/ Footer Template
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_opal_widgets_for_elementor( $admin_bar ) {

	$type_header = 'header';
	$type_footer = 'footer';

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! \Elementor\User::is_current_user_can_edit_post_type( $type_header )
		|| ! \Elementor\User::is_current_user_can_edit_post_type( $type_footer )
	) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'opal-' . $type_header . '-with-builder',
			'parent' => 'new-' . $type_header,
			'title'  => esc_attr__( 'Header Builder', 'toolbar-extras' ),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_header ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Header Builder', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'opal-' . $type_footer . '-with-builder',
			'parent' => 'new-' . $type_footer,
			'title'  => esc_attr__( 'Footer Builder', 'toolbar-extras' ),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_footer ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Footer Builder', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
