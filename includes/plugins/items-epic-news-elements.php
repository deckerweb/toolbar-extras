<?php

// includes/elementor-addons/items-epic-news-elements

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_epic_news_elements', 150 );
/**
 * Items for Add-On: Opal Widgets for Elementor (free, by wpopal)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_epic_news_elements( $admin_bar ) {

	$type_post    = 'custom-post-template';
	$type_archive = 'archive-template';

	$admin_bar->add_node(
		array(
			'id'     => 'ao-epicnewsel',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Epic News Elements', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'epic_module_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => esc_attr__( 'Epic News Elements', 'toolbar-extras' ),
			)
		)
	);

		/** Post Template Builder */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-posttemplate',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'Post Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_post ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Post Templates', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-posttemplate-all',
					'parent' => 'ao-epicnewsel-posttemplate',
					'title'  => esc_attr__( 'All Post Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_post ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Templates', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-posttemplate-new',
					'parent' => 'ao-epicnewsel-posttemplate',
					'title'  => esc_attr__( 'New Post Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_post ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Template', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_post ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-epicnewsel-posttemplate-builder',
						'parent' => 'ao-epicnewsel-posttemplate',
						'title'  => esc_attr__( 'New Post Template Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_post ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Post Template Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Post Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-epicnewsel-posttemplate-categories',
						'parent' => 'ao-epicnewsel-posttemplate',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type_post ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
						)
					)
				);

			}  // end if

		/** Archive Template Builder */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-archivetemplate',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'Archive Templates', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_archive ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Archive Templates', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-archivetemplate-all',
					'parent' => 'ao-epicnewsel-archivetemplate',
					'title'  => esc_attr__( 'All Archive Templates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type_archive ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Archive Templates', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-archivetemplate-new',
					'parent' => 'ao-epicnewsel-archivetemplate',
					'title'  => esc_attr__( 'New Archive Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type_archive ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Archive Template', 'toolbar-extras' ),
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $type_archive ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-epicnewsel-archivetemplate-builder',
						'parent' => 'ao-epicnewsel-archivetemplate',
						'title'  => esc_attr__( 'New Archive Template Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_archive ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Archive Template Builder', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Archive Template categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-epicnewsel-archivetemplate-categories',
						'parent' => 'ao-epicnewsel-archivetemplate',
						'title'  => ddw_btc_string_template( 'template' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type_archive ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'template' ) ),
						)
					)
				);

			}  // end if

		/** Module Options */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-moduleoptions',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'Module Element Options', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'epic_module_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Module Element Options', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-image',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Image Setting', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_image_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Image Setting', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-loader',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Loader', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_loader_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Loader', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-meta',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Meta Option', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_meta_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Meta Option', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-widget',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Widget', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_widget_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Widget', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-cpt',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Custom Post Type', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_custom_post_type_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Custom Post Type', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-moduleoptions-font',
					'parent' => 'ao-epicnewsel-moduleoptions',
					'title'  => esc_attr__( 'Module Global Font', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_module_font_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Module Global Font', 'toolbar-extras' ),
					)
				)
			);

		/** Custom Template Options */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-templateoptions',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'Custom Template Options', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'epic_single_post_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'rel'    => ddw_tbex_meta_rel(),
					'title'  => esc_attr__( 'Custom Template Options', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-templateoptions-single',
					'parent' => 'ao-epicnewsel-templateoptions',
					'title'  => esc_attr__( 'Single Post Template', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_single_post_template_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Single Post Template', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-epicnewsel-templateoptions-archive',
					'parent' => 'ao-epicnewsel-templateoptions',
					'title'  => esc_attr__( 'Single Archive Template', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'epic_single_archive_template_section' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'rel'    => ddw_tbex_meta_rel(),
						'title'  => esc_attr__( 'Single Archive Template', 'toolbar-extras' ),
					)
				)
			);

		/** System Status */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-system-status',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=epic_system' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'System Status', 'toolbar-extras' ),
				)
			)
		);

		/** License */
		$admin_bar->add_node(
			array(
				'id'     => 'ao-epicnewsel-license',
				'parent' => 'ao-epicnewsel',
				'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=epic' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-epicnewsel-resources',
					'parent' => 'ao-epicnewsel',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'epicnewsel-docs',
				'group-epicnewsel-resources',
				'http://support.jegtheme.com/theme/epic-news-element/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'epicnewsel-support',
				'group-epicnewsel-resources',
				'http://support.jegtheme.com/forums/forum/epic-news-elements/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'epicnewsel-site',
				'group-epicnewsel-resources',
				'http://epic.jegtheme.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_epic_news_elements' );
/**
 * Items for "New Content" section: New Post/ Archive Template
 *
 * @since 1.4.0
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_epic_news_elements( $admin_bar ) {

	$type_post    = 'custom-post-template';
	$type_archive = 'archive-template';

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! \Elementor\User::is_current_user_can_edit_post_type( $type_post )
		|| ! \Elementor\User::is_current_user_can_edit_post_type( $type_archive )
	) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'epicnewsel-' . $type_post . '-with-builder',
			'parent' => 'new-' . $type_post,
			'title'  => esc_attr__( 'Post Template Builder', 'toolbar-extras' ),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_post ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Post Template Builder', 'toolbar-extras' ) ),
			)
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'epicnewsel-' . $type_archive . '-with-builder',
			'parent' => 'new-' . $type_archive,
			'title'  => esc_attr__( 'Archive Template Builder', 'toolbar-extras' ),
			'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $type_archive ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Archive Template Builder', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
