<?php

// includes/plugins/items-acf-extended

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_after_acf_field_groups', 'ddw_tbex_aoitems_acf_extended' );
/**
 * Items for Add-On: Advanced Custom Fields: Extended (free, by ACF Extended)
 *
 * @since 1.4.3
 *
 * @uses ddw_tbex_is_acf_extended_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_acf_extended( $admin_bar ) {

	/** Bail early, if Add-On not active */
	if ( ! ddw_tbex_is_acf_extended_active() ) {
		return $admin_bar;
	}

	/** ACF Extended group */
	$admin_bar->add_group(
		array(
			'id'     => 'group-acf-extended',
			'parent' => 'advanced-custom-fields',
		)
	);

	/** Block Types (ACF Pro 5.8+) */
	if ( version_compare( ACF_VERSION, '5.8.0', '>=' )
		&& ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() )
	) {

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-blocktypes',
				'parent' => 'group-acf-extended',
				'title'  => esc_attr__( 'Block Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dbt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Block Types', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'acfextended-blocktypes-all',
					'parent' => 'acfextended-blocktypes',
					'title'  => esc_attr__( 'All Block Types', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dbt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Block Types', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'acfextended-blocktypes-new',
					'parent' => 'acfextended-blocktypes',
					'title'  => esc_attr__( 'New Block Type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=acfe-dbt' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Block Type', 'toolbar-extras' ),
					)
				)
			);

	}  // end if

	/** Option Pages */
	$admin_bar->add_node(
		array(
			'id'     => 'acfextended-optionpages',
			'parent' => 'group-acf-extended',
			'title'  => esc_attr__( 'Option Pages', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dop' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Option Pages', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-optionpages-all',
				'parent' => 'acfextended-optionpages',
				'title'  => esc_attr__( 'All Option Pages', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dop' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Option Pages', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-optionpages-new',
				'parent' => 'acfextended-optionpages',
				'title'  => esc_attr__( 'New Option Page', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=acfe-dop' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Option Page', 'toolbar-extras' ),
				)
			)
		);

	/** Dynamic Post Types */
	$admin_bar->add_node(
		array(
			'id'     => 'acfextended-posttypes',
			'parent' => 'group-acf-extended',
			'title'  => esc_attr__( 'Dynamic Post Types', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dpt' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Dynamic Post Types', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-posttypes-all',
				'parent' => 'acfextended-posttypes',
				'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dpt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Post Types', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-posttypes-new',
				'parent' => 'acfextended-posttypes',
				'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=acfe-dpt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Post Type', 'toolbar-extras' ),
				)
			)
		);

	/** Dynamic Taxonomies */
	$admin_bar->add_node(
		array(
			'id'     => 'acfextended-taxonomies',
			'parent' => 'group-acf-extended',
			'title'  => esc_attr__( 'Dynamic Taxonomies', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dt' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Dynamic Taxonomies', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-taxonomies-all',
				'parent' => 'acfextended-taxonomies',
				'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acfe-dt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Taxonomies', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-taxonomies-new',
				'parent' => 'acfextended-taxonomies',
				'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'post-new.php?post_type=acfe-dt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Taxonomy', 'toolbar-extras' ),
				)
			)
		);

	/** Settings */
	$admin_bar->add_node(
		array(
			'id'     => 'acfextended-settings',
			'parent' => 'group-acf-extended',
			'title'  => esc_attr__( 'ACF Extended', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=acf-field-group&page=acfe-settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'ACF Extended', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'acfextended-settings-options',
				'parent' => 'acfextended-settings',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=acf-field-group&page=acfe-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		if ( current_user_can( 'manage_options' ) ) {

			$admin_bar->add_node(
				array(
					'id'     => 'acfextended-settings-options-table',
					'parent' => 'acfextended-settings',
					'title'  => esc_attr__( 'Options Table', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=acfe-options' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Options Table', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-acfextended-resources',
					'parent' => 'acfextended-settings',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'acfextended-support',
				'group-acfextended-resources',
				'https://wordpress.org/support/plugin/acf-extended'
			);

			ddw_tbex_resource_item(
				'tutorials',
				'acfextended-tutorials',
				'group-acfextended-resources',
				'https://www.acf-extended.com/tutorials'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'acfextended-translate',
				'group-acfextended-resources',
				'https://translate.wordpress.org/projects/wp-plugins/acf-extended'
			);

			ddw_tbex_resource_item(
				'official-site',
				'acfextended-site',
				'group-acfextended-resources',
				'https://www.acf-extended.com/'
			);

		}  // end if

}  // end function
