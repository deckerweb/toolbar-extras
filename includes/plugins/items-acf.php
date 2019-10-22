<?php

// includes/plugins/items-acf

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_advanced_custom_fields', 15 );
/**
 * Items for plugin: Advanced Custom Fields (free, by Elliot Condon)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_acf_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_advanced_custom_fields( $admin_bar ) {

	$type = 'acf-field-group';

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'advanced-custom-fields',
			'parent' => 'tbex-sitegroup-elements',
			'title'  => esc_attr__( 'ACF Field Groups', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( __( 'Advanced Custom Fields (ACF) - Field Groups', 'toolbar-extras' ) ),
			)
		)
	);

		/** Field Groups */
		$admin_bar->add_group(
			array(
				'id'     => 'group-acf-fields',
				'parent' => 'advanced-custom-fields',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'advanced-custom-fields-all',
				'parent' => 'group-acf-fields',
				'title'  => esc_attr__( 'All Field Groups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Field Groups', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'advanced-custom-fields-new',
				'parent' => 'group-acf-fields',
				'title'  => esc_attr__( 'New Field Group', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Field Group', 'toolbar-extras' ),
				)
			)
		);

		/** Field categories, via BTC plugin */
		if ( ddw_tbex_is_btcplugin_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'advanced-custom-fields-categories',
					'parent' => 'group-acf-fields',
					'title'  => ddw_btc_string_template( 'field' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=' . $type ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_html( ddw_btc_string_template( 'field' ) ),
					)
				)
			);

		}  // end if

		/** Categories, via ACF Extended plugin */
		if ( ddw_tbex_is_acf_extended_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'advanced-custom-fields-acfe-categories',
					'parent' => 'group-acf-fields',
					'title'  => esc_attr__( 'Categories', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=acf-field-group-category' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Categories (via ACF Extended)', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Hook place for Add-Ons */
		do_action( 'tbex_after_acf_field_groups', $admin_bar );

		/** Settings etc. */
		$admin_bar->add_group(
			array(
				'id'     => 'group-acf-settings',
				'parent' => 'advanced-custom-fields',
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'advanced-custom-fields-tools',
				'parent' => 'group-acf-settings',
				'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=acf-tools' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Export &amp; Import', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_acf_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'advanced-custom-fields-updates',
					'parent' => 'group-acf-settings',
					'title'  => esc_attr__( 'Pro: Updates', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=' . $type . '&page=acf-settings-updates' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Pro: Updates &amp; License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-acfplugin-resources',
					'parent' => 'advanced-custom-fields',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'acfplugin-docs',
				'group-acfplugin-resources',
				'https://www.advancedcustomfields.com/resources/'
			);

			ddw_tbex_resource_item(
				'support-contact',
				'acfplugin-support-resources',
				'group-acfplugin-resources',
				'https://www.advancedcustomfields.com/support/'
			);

			ddw_tbex_resource_item(
				'support-forum',
				'acfplugin-support',
				'group-acfplugin-resources',
				'https://wordpress.org/support/plugin/advanced-custom-fields'
			);

			ddw_tbex_resource_item(
				'changelog',
				'acfplugin-changelog',
				'group-acfplugin-resources',
				'https://www.advancedcustomfields.com/changelog/',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'acfplugin-translate',
				'group-acfplugin-resources',
				'https://translate.wordpress.org/projects/wp-plugins/advanced-custom-fields'
			);

			ddw_tbex_resource_item(
				'github',
				'acfplugin-github',
				'group-acfplugin-resources',
				'https://github.com/AdvancedCustomFields/acf'
			);

			ddw_tbex_resource_item(
				'official-site',
				'acfplugin-site',
				'group-acfplugin-resources',
				'https://www.advancedcustomfields.com/'
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_new_content_acf_field_group', 100 );
/**
 * Items for "New Content" section: New ACF Field Group
 *
 * @since 1.4.3
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_new_content_acf_field_group( $admin_bar ) {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content() ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-acf-field-group',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'ACF Field Group', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=acf-field-group' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( esc_attr__( 'Field Group - Advanced Custom Fields', 'toolbar-extras' ) ),
			)
		)
	);

}  // end function


//
