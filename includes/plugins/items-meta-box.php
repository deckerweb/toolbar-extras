<?php

// includes/plugins/items-meta-box

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Detect some Meta Box specific Add-On plugins.
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_detect_plugin()
 *
 * @return bool TRUE if a plugin exists, or FALSE if no plugin constant, class
 *              or function detected.
 */
function ddw_tbex_detect_metabox_plugins() {

	return ddw_tbex_detect_plugin(

		array(

			/** Classes to detect */
			'classes'   => array(
				'MB_Template_Register',
			),

			/** Functions to detect */
			'functions' => array(
				'mb_cpt_load',
				'mb_custom_taxonomy_load',
				'mb_builder_load',
			),

		)  // end array

	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_meta_box_suite', 15 );
/**
 * Items for plugin: Meta Box (free, by MetaBox.io) + Add-Ons
 *
 * @since 1.4.4
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_meta_box_suite( $admin_bar ) {

	$is_mb_alone = ( ! ddw_tbex_detect_metabox_plugins() ) ? TRUE : FALSE;

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-metabox',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr_x( 'Meta Box', 'Plugin title of "Meta Box" plugin (MetaBox.io)', 'toolbar-extras' ),
			'href'   => $is_mb_alone ? esc_url( admin_url( 'plugins.php?page=meta-box' ) ) : esc_url( admin_url( 'admin.php?page=meta-box' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Meta Box - Field Groups', 'toolbar-extras' ) ),
			)
		)
	);

		/** MB alone - when no Add-On (with admin pages) is active */
		if ( $is_mb_alone ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-info',
					'parent' => 'tbex-metabox',
					'title'  => esc_attr__( 'Plugin Info', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'plugins.php?page=meta-box' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Plugin Info - Dashboard', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Add-On: Builder 2.x */
		if ( function_exists( 'mb_builder_load' ) ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-metaboxbuilder',
					'parent' => 'tbex-metabox',
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-builder',
						'parent' => 'group-metaboxbuilder',
						'title'  => esc_attr__( 'Field Groups', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=meta-box' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Meta Box Field Groups - Custom Fields Builder', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-metabox-builder-all',
							'parent' => 'tbex-metabox-builder',
							'title'  => esc_attr__( 'All Field Groups', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=meta-box' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Meta Box Field Groups', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-metabox-builder-new',
							'parent' => 'tbex-metabox-builder',
							'title'  => esc_attr__( 'New Field Group', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post-new.php?post_type=meta-box' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'New Meta Box Field Group', 'toolbar-extras' ),
							)
						)
					);

					/** Field categories, via BTC plugin */
					if ( ddw_tbex_is_btcplugin_active() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'tbex-metabox-builder-categories',
								'parent' => 'tbex-metabox-builder',
								'title'  => ddw_btc_string_template( 'field' ),
								'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=meta-box' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_html( ddw_btc_string_template( 'field' ) ),
								)
							)
						);

					}  // end if

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-builder-import',
						'parent' => 'group-metaboxbuilder',
						'title'  => esc_attr__( 'Import Field Groups', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=meta-box-import' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Import Meta Box Field Groups', 'toolbar-extras' ),
						)
					)
				);

		}  // end if

		/** Add-On: Template */
		if ( class_exists( 'MB_Template_Register' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-template',
					'parent' => 'tbex-metabox',
					'title'  => esc_attr__( 'Template', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=meta-box-template' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Meta Box Template', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Add-On: Post Types */
		if ( function_exists( 'mb_cpt_load' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-posttypes',
					'parent' => 'tbex-metabox',
					'title'  => esc_attr__( 'Post Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=mb-post-type' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Register Post Types', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-posttypes-all',
						'parent' => 'tbex-metabox-posttypes',
						'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=mb-post-type' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Registered Post Types', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-posttypes-new',
						'parent' => 'tbex-metabox-posttypes',
						'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=mb-post-type' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Register New Post Type', 'toolbar-extras' ),
						)
					)
				);

				/** Post Type categories, via BTC plugin */
				if ( ddw_tbex_is_btcplugin_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-metabox-posttypes-categories',
							'parent' => 'tbex-metabox-posttypes',
							'title'  => ddw_btc_string_template( 'post-type' ),
							'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=mb-post-type' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_html( ddw_btc_string_template( 'post-type' ) ),
							)
						)
					);

				}  // end if

		}  // end if

		/** Add-On: Taxonomies */
		if ( function_exists( 'mb_custom_taxonomy_load' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-taxonomies',
					'parent' => 'tbex-metabox',
					'title'  => esc_attr__( 'Taxonomies', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=mb-taxonomy' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Register Taxonomies', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-taxonomies-all',
						'parent' => 'tbex-metabox-taxonomies',
						'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=mb-taxonomy' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Registered Taxonomies', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-metabox-taxonomies-new',
						'parent' => 'tbex-metabox-taxonomies',
						'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=mb-taxonomy' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Register New Taxonomy', 'toolbar-extras' ),
						)
					)
				);

				/** Post Type categories, via BTC plugin */
				if ( ddw_tbex_is_btcplugin_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'tbex-metabox-taxonomies-categories',
							'parent' => 'tbex-metabox-taxonomies',
							'title'  => ddw_btc_string_template( 'post-type' ),
							'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=mb-taxonomy' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_html( ddw_btc_string_template( 'post-type' ) ),
							)
						)
					);

				}  // end if

		}  // end if

		/** General: Online Field Generator */
		$admin_bar->add_group(
			array(
				'id'     => 'group-metaboxgenerator',
				'parent' => 'tbex-metabox',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-online-generator',
					'parent' => 'group-metaboxgenerator',
					'title'  => esc_attr__( 'Online Generator', 'toolbar-extras' ),
					'href'   => 'https://metabox.io/online-generator/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'Online Generator - Generate Field Groups', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-my-field-groups',
					'parent' => 'group-metaboxgenerator',
					'title'  => esc_attr__( 'My Saved Field Groups', 'toolbar-extras' ),
					'href'   => 'https://metabox.io/my-account/meta-boxes/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'My Saved Meta Box Field Groups', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-metabox-my-account',
					'parent' => 'group-metaboxgenerator',
					'title'  => esc_attr__( 'My Account', 'toolbar-extras' ),
					'href'   => 'https://metabox.io/my-account/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'My User Account at MetaBox.io', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-metaboxsuite-resources',
					'parent' => 'tbex-metabox',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'metaboxsuite-docs',
				'group-metaboxsuite-resources',
				'https://docs.metabox.io/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'metaboxsuite-support',
				'group-metaboxsuite-resources',
				'https://metabox.io/support/'
			);

			ddw_tbex_resource_item(
				'youtube-channel',
				'metaboxsuite-youtube',
				'group-metaboxsuite-resources',
				'https://www.youtube.com/channel/UC5azrxHYW9x8404hqTcUIAg/videos'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'metaboxsuite-translate',
				'group-metaboxsuite-resources',
				'https://translate.wordpress.org/projects/wp-plugins/meta-box/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'metaboxsuite-changelog',
				'group-metaboxsuite-resources',
				'https://metabox.io/changelog/',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'github',
				'metaboxsuite-github',
				'group-metaboxsuite-resources',
				'https://github.com/wpmetabox/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'metaboxsuite-site',
				'group-metaboxsuite-resources',
				'http://metabox.io/'
			);

		}  // end if

}  // end function
