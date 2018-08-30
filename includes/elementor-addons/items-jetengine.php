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


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_jetengine', 100 );
/**
 * Items for Add-On: JetEngine (Premium, by Zemez Jet/ CrocoBlock)
 *
 * @since  1.3.2
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_jetengine() {

	/** JetEngine Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-jetengine',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'JetEngine Content', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jet-engine' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_premium_addon_title_attr( __( 'JetEngine Content', 'toolbar-extras' ) )
			)
		)
	);

		/** JetEngine Listings */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-jetengine-listings',
				'parent' => 'ao-jetengine'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-listings-all',
					'parent' => 'group-jetengine-listings',
					'title'  => esc_attr__( 'All Listings', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Listings', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-listings-new',
					'parent' => 'group-jetengine-listings',
					'title'  => esc_attr__( 'New Listing', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=jet-engine' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Listing', 'toolbar-extras' )
					)
				)
			);

			if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( 'jet-engine' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'ao-jetengine-listings-builder',
						'parent' => 'group-jetengine-listings',
						'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' ),
						'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( 'jet-engine' ) ),
						'meta'   => array(
							'target' => ddw_tbex_meta_target( 'builder' ),
							'title'  => esc_attr__( 'New Listing Builder', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** JetEngine Custom Post Types & Taxonomies */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-jetengine-posttypes',
				'parent' => 'ao-jetengine'
			)
		);

			/** Register Post Types */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-cpts-all',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=jet-engine-cpt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-cpts-new',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt&cpt_action=add' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' )
					)
				)
			);

			/** Register Taxonomies */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-tax-all',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-tax-new',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-cpt-tax&cpt_tax_action=add-tax' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' )
					)
				)
			);

			/** Register Metaboxes & Fields */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-metabox-all',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'All Meta Boxes', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Meta Boxes', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-jetengine-metabox-new',
					'parent' => 'group-jetengine-posttypes',
					'title'  => esc_attr__( 'New Meta Box', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jet-engine-meta&cpt_meta_action=add-meta' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Meta Box', 'toolbar-extras' )
					)
				)
			);

		/** JetEngine Settings etc. */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-jetengine-settings',
				'parent' => 'ao-jetengine'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
						)
					)
				)
			);

		/** Group: Resources for JetEngine */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetengine-resources',
					'parent' => 'ao-jetengine',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
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
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_new_content_jetengine() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
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

}  // end function