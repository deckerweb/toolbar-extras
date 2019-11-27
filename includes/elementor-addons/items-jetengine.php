<?php

// includes/elementor-addons/items-jetengine

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if JetEngine "Booking Forms" feature is active or not.
 *
 * @since 1.4.2
 * @since 1.4.7 Refactored logic.
 *
 * @uses jet_engine()->modules->is_module_active()
 *
 * @return bool TRUE if setting is enabled, FALSE otherwise.
 */
function ddw_tbex_is_jetengine_forms_active() {

	/** Bail early if function does not exist */
	if ( ! function_exists( 'jet_engine' ) ) {
		return FALSE;
	}

	return jet_engine()->modules->is_module_active( 'booking-forms' );

}  // end function


/**
 * Check if JetBooking plugin is active or not.
 *   Note: JetBooking is a special JetEngine Add-On.
 *
 * @since 1.4.4
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_jetbooking_active() {

	return defined( 'JET_ABAF_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetengine', 100 );
/**
 * Items for Add-On: JetEngine (Premium, by Zemez Jet/ Crocoblock)
 *
 * @since 1.3.2
 * @since 1.3.5 Added BTC plugin support.
 * @since 1.4.0 Added Meta Box and Posts Relations support.
 * @since 1.4.2 Added Booking Forms module.
 * @since 1.4.7 Added new items, tweaked some existing ones.
 *
 * @uses ddw_tbex_is_jetengine_forms_active()
 * @uses ddw_tbex_is_jetbooking_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_jetengine( $admin_bar ) {

	/** JetEngine Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-jetengine',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'JetEngine Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-engine' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetEngine Content', 'toolbar-extras' ) ),
			)
		)
	);

		/** JetEngine Listings */
		$admin_bar->add_group(
			array(
				'id'     => 'group-jetengine-listings',
				'parent' => 'ao-jetengine',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-listings',
					'parent' => 'group-jetengine-listings',
					'title'  => esc_attr__( 'Listings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Listings', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-listings-all',
						'parent' => 'ao-jetengine-listings',
						'title'  => esc_attr__( 'All Listings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Listings', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-listings-new',
						'parent' => 'ao-jetengine-listings',
						'title'  => esc_attr__( 'New Listing', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-engine' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Listing', 'toolbar-extras' ),
						)
					)
				);

				if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'jet-engine' ) ) {

					$admin_bar->add_node(
						array(
							'id'     => 'ao-jetengine-listings-builder',
							'parent' => 'ao-jetengine-listings',
							'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' ),
							'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-engine' ) ),
							'meta'   => array(
								'target' => ddw_tbex_meta_target( 'builder' ),
								'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' ),
							)
						)
					);

				}  // end if

				/** Listing categories, via BTC plugin */
				if ( ddw_tbex_is_btcplugin_active() ) {

					$admin_bar->add_node(
						array(
							'id'     => 'ao-jetengine-listings-categories',
							'parent' => 'ao-jetengine-listings',
							'title'  => ddw_btc_string_template( 'listing' ),
							'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=jet-engine' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_html( ddw_btc_string_template( 'listing' ) ),
							)
						)
					);

				}  // end if

		/** JetEngine Custom Post Types & Taxonomies */
		$admin_bar->add_group(
			array(
				'id'     => 'group-jetengine-posttypes',
				'parent' => 'ao-jetengine',
			)
		);

			/** Register Post Types */
			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-cpts',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'Custom Post Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Post Types', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-cpts-all',
						'parent' => 'ao-jetengine-cpts',
						'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-cpts-new',
						'parent' => 'ao-jetengine-cpts',
						'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt&cpt_action=add' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
						)
					)
				);

			/** Register Taxonomies */
			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-tax',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'Custom Taxonomies', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Taxonomies', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-tax-all',
						'parent' => 'ao-jetengine-tax',
						'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-tax-new',
						'parent' => 'ao-jetengine-tax',
						'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax&cpt_tax_action=add-tax' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
						)
					)
				);

			/** Register Metaboxes & Fields */
			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-metabox',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'Custom Meta Boxes', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Meta Boxes', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-metabox-all',
						'parent' => 'ao-jetengine-metabox',
						'title'  => esc_attr__( 'All Meta Boxes', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Meta Boxes', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-metabox-new',
						'parent' => 'ao-jetengine-metabox',
						'title'  => esc_attr__( 'New Meta Box', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta&cpt_meta_action=add-meta' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Meta Box', 'toolbar-extras' ),
						)
					)
				);

		/** JetEngine More Modules hook place */
		$admin_bar->add_group(
			array(
				'id'     => 'group-jetengine-modules',
				'parent' => 'ao-jetengine',
			)
		);

			/** Add Posts Relations */
			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-relations',
					'parent' => 'group-jetengine-modules',
					'title'  => esc_attr__( 'Posts Relations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-relations' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Posts Relations', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-relations-all',
						'parent' => 'ao-jetengine-relations',
						'title'  => esc_attr__( 'All Relations', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-relations' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Relations', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-relations-new',
						'parent' => 'ao-jetengine-relations',
						'title'  => esc_attr__( 'New Relation', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-relations&cpt_relation_action=add-relation' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Relation', 'toolbar-extras' ),
						)
					)
				);

			/** Add Options Pages */
			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-optionspages',
					'parent' => 'group-jetengine-modules',
					'title'  => esc_attr__( 'Options Pages', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-options-pages' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Options Pages', 'toolbar-extras' ),
					)
				)
			);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-optionspages-all',
						'parent' => 'ao-jetengine-optionspages',
						'title'  => esc_attr__( 'All Options Pages', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-options-pages' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'All Options Pages', 'toolbar-extras' ),
						)
					)
				);

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-optionspages-new',
						'parent' => 'ao-jetengine-optionspages',
						'title'  => esc_attr__( 'New Options Page', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-options-pages&cpt_action=add' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'New Options Page', 'toolbar-extras' ),
						)
					)
				);

			/** Add Forms */
			if ( ddw_tbex_is_jetengine_forms_active() ) {

				$admin_bar->add_node(
					array(
						'id'     => 'ao-jetengine-forms',
						'parent' => 'group-jetengine-modules',
						'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine-booking' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Forms', 'toolbar-extras' ),
						)
					)
				);

					$admin_bar->add_node(
						array(
							'id'     => 'ao-jetengine-forms-all',
							'parent' => 'ao-jetengine-forms',
							'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine-booking' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'All Forms', 'toolbar-extras' ),
							)
						)
					);

					$admin_bar->add_node(
						array(
							'id'     => 'ao-jetengine-forms-new',
							'parent' => 'ao-jetengine-forms',
							'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-engine-booking' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'New Form', 'toolbar-extras' ),
							)
						)
					);

					/** Form categories, via BTC plugin */
					if ( ddw_tbex_is_btcplugin_active() ) {

						$admin_bar->add_node(
							array(
								'id'     => 'ao-jetengine-forms-categories',
								'parent' => 'ao-jetengine-forms',
								'title'  => ddw_btc_string_template( 'form' ),
								'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=jet-engine-booking' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_html( ddw_btc_string_template( 'form' ) ),
								)
							)
						);

					}  // end if

			}  // end if

		/** JetBooking Add-On: Apartments Booking */
		if ( ddw_tbex_is_jetbooking_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-apartment-booking-settings',
					'parent' => 'group-jetengine-modules',
					'title'  => esc_attr__( 'Apartment Booking', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-abaf' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Apartment Booking Settings', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** JetEngine Settings etc. */
		$admin_bar->add_group(
			array(
				'id'     => 'group-jetengine-settings',
				'parent' => 'ao-jetengine',
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'ao-jetengine-skins-manager',
					'parent' => 'group-jetengine-settings',
					'title'  => esc_attr__( 'Skins Manager', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => sprintf(
							/* translators: %s - the words "Import & Export" */
							esc_attr__( 'Skins Manager: %s', 'toolbar-extras' ),
							__( 'Import &amp; Export', 'toolbar-extras' )
						),
					)
				)
			);

		/** Group: Resources for JetEngine */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-jetengine-resources',
					'parent' => 'ao-jetengine',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'jetengine-kb-articles',
				'group-jetengine-resources',
				'https://crocoblock.com/knowledge-base/article-category/jet-engine/' . ddw_tbex_afcroc()
			);

			ddw_tbex_resource_item(
				'documentation',
				'jetengine-docs',
				'group-jetengine-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetengine'
			);

			ddw_tbex_resource_item(
				'youtube-tutorials',
				'jetengine-youtube-tutorials',
				'group-jetengine-resources',
				'https://www.youtube.com/watch?v=BNBdTs4sTLI&list=PLdaVCVrkty72p0ZbeBpHRKR2Y3maUd34M'
			);

			ddw_tbex_resource_item(
				'facebook-group',
				'jetengine-facebook',
				'group-jetengine-resources',
				'https://www.facebook.com/groups/CrocoblockCommunity/'
			);

			ddw_tbex_resource_item(
				'changelog',
				'jetengine-changelog',
				'group-jetengine-resources',
				'https://documentation.zemez.io/wordpress/index.php?project=jetengine&lang=en&section=jetengine-changelog',
				ddw_tbex_string_version_history( 'addon' )
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetengine-site',
				'group-jetengine-resources',
				'https://jetengine.zemez.io/'
			);

		}  // end if

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_aoitems_new_content_jetengine' );
/**
 * Items for "New Content" section: New Jet Engine Content
 *
 * @since 1.3.2
 * @since 1.4.0 Added Meta Box and Post Relation.
 * @since 1.4.2 Added Booking Form.
 *
 * @uses ddw_tbex_is_jetengine_forms_active()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_new_content_jetengine( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-jetengine-content',
			'parent' => 'new-content',
			'title'  => esc_attr_x( 'JetEngine Content', 'Toolbar New Content section', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr_x( 'New JetEngine Content', 'Toolbar New Content section', 'toolbar-extras' ),
			)
		)
	);

		/** Listings */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-listing-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Listing', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-engine' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Listing', 'toolbar-extras' ) )
				)
			)
		);

		if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'jet-engine' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-jetengine-content-listing-builder',
					'parent' => 'tbex-jetengine-content',
					'title'  => esc_attr__( 'Listing Builder', 'toolbar-extras' ),
					'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-engine' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Listing Builder', 'toolbar-extras' ) )
					)
				)
			);

		}  // end if

		/** Custom Post Type */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-cpt-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Post Type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt&cpt_action=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Post Type', 'toolbar-extras' ) )
				)
			)
		);

		/** Custom Taxonomy */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-tax-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Taxonomy', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax&cpt_tax_action=add-tax' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Taxonomy', 'toolbar-extras' ) )
				)
			)
		);

		/** Custom Meta Box */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-metabox-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Meta Box', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta&cpt_meta_action=add-meta' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Meta Box', 'toolbar-extras' ) )
				)
			)
		);

		/** Post Relation */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-post-relation-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Post Relation', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-relations&cpt_relation_action=add-relation' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Post Relation', 'toolbar-extras' ) )
				)
			)
		);

		/** Options Page */
		$admin_bar->add_node(
			array(
				'id'     => 'tbex-jetengine-content-options-page-new',
				'parent' => 'tbex-jetengine-content',
				'title'  => esc_attr__( 'Options Page', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-options-pages&cpt_action=add' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Options Page', 'toolbar-extras' ) )
				)
			)
		);

		/** JetEngine Form */
		if ( ddw_tbex_is_jetengine_forms_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'tbex-jetengine-content-form-new',
					'parent' => 'tbex-jetengine-content',
					'title'  => esc_attr__( 'Form', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-engine-booking' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => ddw_tbex_string_add_new_item( __( 'Form', 'toolbar-extras' ) )
					)
				)
			);

		}  // end if

}  // end function


add_filter( 'admin_bar_menu', 'ddw_tbex_aoitems_new_content_jetengine_form', 80 );
/**
 * Items for "New Content" section: New JetEngine Booking Form
 *   Note: Filter the existing Toolbar node to tweak the item's title.
 *
 * @since 1.4.2
 * @since 1.4.7 Label tweaks.
 *
 * @uses ddw_tbex_is_jetengine_forms_active()
 *
 * @param object $wp_admin_bar Holds all nodes of the Toolbar.
 */
function ddw_tbex_aoitems_new_content_jetengine_form( $wp_admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! ddw_tbex_is_jetengine_forms_active()
	) {
		return $wp_admin_bar;
	}

	$wp_admin_bar->add_node(
		array(
			'id'     => 'new-jet-engine-booking',	// same as original!
			'title' => esc_attr__( 'JetEngine Form', 'toolbar-extras' ),
			'meta'   => array(
				'title' => ddw_tbex_string_add_new_item( __( 'JetEngine Form', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function
