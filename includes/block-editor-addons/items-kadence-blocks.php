<?php

// includes/block-editor-addons/items-kadence-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if Kadance Blocks Pro Add-On plugin is active or not.
 *
 * @since 1.4.9
 *
 * @return bool TRUE if function exists, FALSE otherwise.
 */
function ddw_tbex_is_kadence_blocks_pro_active() {

	return function_exists( 'kadence_blocks_pro_updating' );

}  // end function


/**
 * Create & render resource items for Kadence Blocks (Pro).
 *
 * @since 1.4.0
 * @since 1.4.9 Moved into function for reusage.
 *
 * @uses ddw_tbex_is_pafe_pro_active()
 * @uses ddw_tbex_resource_item()
 *
 * @param string $suffix String for suffix for Toolbar node ID and group ID.
 * @param string $parent String for Toolbar parent node.
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_kadence_blocks_resources( $admin_bar, $suffix = '', $parent = '' ) {

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	$admin_bar->add_group(
		array(
			'id'     => 'group-kadenceblocks-resources' . $suffix,
			'parent' => sanitize_key( $parent ),
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

		ddw_tbex_resource_item(
			'support-forum',
			'kadenceblocks-support' . $suffix,
			'group-kadenceblocks-resources' . $suffix,
			'https://wordpress.org/support/plugin/kadence-blocks'
		);

		ddw_tbex_resource_item(
			'documentation',
			'kadenceblocks-docs' . $suffix,
			'group-kadenceblocks-resources' . $suffix,
			'https://www.kadenceblocks.com/docs/'
		);

		ddw_tbex_resource_item(
			'translations-community',
			'kadenceblocks-translate' . $suffix,
			'group-kadenceblocks-resources' . $suffix,
			'https://translate.wordpress.org/projects/wp-plugins/kadence-blocks'
		);

		ddw_tbex_resource_item(
			'github',
			'kadenceblocks-github' . $suffix,
			'group-kadenceblocks-resources' . $suffix,
			'https://github.com/kadencethemes/kadence-blocks'
		);

		ddw_tbex_resource_item(
			'official-site',
			'kadenceblocks-site' . $suffix,
			'group-kadenceblocks-resources' . $suffix,
			'https://www.kadenceblocks.com/'
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_kadence_blocks', 10 );
/**
 * Site items for Plugins:
 *   - Kadence Blocks - Gutenberg Page Builder Toolkit (free, by Kadence Themes)
 *   - Kadence Blocks Pro (Add-On) (Premium, by Kadence Themes)
 *
 * @since 1.4.0
 * @since 1.4.9 Improved Pro integration & support.
 *
 * @uses ddw_tbex_is_kadence_blocks_pro_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_aoitems_kadence_blocks_resources()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_kadence_blocks( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	$kb_url = ddw_tbex_is_kadence_blocks_pro_active()
		? esc_url( admin_url( 'admin.php?page=kadence-blocks' ) )
		: esc_url( admin_url( 'options-general.php?page=kadence_blocks' ) );

	$kb_title = __( 'Kadence Blocks', 'toolbar-extras' );

	$kb_title_attr = ddw_tbex_is_kadence_blocks_pro_active()
		? ddw_tbex_string_premium_addon_title_attr( $kb_title )
		: ddw_tbex_string_free_addon_title_attr( $kb_title );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-kadenceblocks',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr( $kb_title ),
			'href'   => $kb_url,
			'meta'   => array(
				'target' => '',
				'title'  => $kb_title_attr,
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'kadenceblocks-options',
				'parent' => 'tbex-kadenceblocks',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => $kb_url,
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				)
			)
		);

		/** Optional: Pro License */
		if ( ddw_tbex_is_kadence_blocks_pro_active() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'kadenceblocks-formentries',
					'parent' => 'tbex-kadenceblocks',
					'title'  => esc_attr__( 'Form Entries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=kadence-blocks-entries' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Form Entries', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'kadenceblocks-license',
					'parent' => 'tbex-kadenceblocks',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=kadence_plugin_activation' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {
			ddw_tbex_aoitems_kadence_blocks_resources( $admin_bar, 'aoplace', 'tbex-kadenceblocks' );
		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_kbpro_forms', 10 );
/**
 * Site items for Plugin: Kadence Blocks Forms - all Forms that have saved DB entries (via Pro version only).
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_is_kadence_blocks_pro_active()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_aoitems_kadence_blocks_resources()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_kbpro_forms( $admin_bar ) {

	/** Bail early if no Kadence Blocks Pro (which has the Form Entry saving) */
	if ( ! ddw_tbex_is_kadence_blocks_pro_active() ) {
		return $admin_bar;
	}

	/** Check if Forms Block is deactivated or not */
	$kb_deactivations  = get_option( 'kt_blocks_unregistered_blocks' );
	$kb_forms_disabled = array_search( 'kadence/form', $kb_deactivations );

	/** Bail early if Forms Block deactivated */
	if ( $kb_forms_disabled ) {
		return $admin_bar;
	}

	/**
	 * Add each individual form as an item. Database query is necessary.
	 * @since 1.4.9
	 */
	global $wpdb;
	$kbp_table_name = $wpdb->prefix . 'kbp_form_entry';
	$forms          = $wpdb->get_results( "SELECT form_id, post_id, name FROM $kbp_table_name ORDER BY post_id DESC" );

	/** Proceed only if there are any forms with saved DB entries */
	if ( $forms ) {

		$admin_bar->add_node(
			array(
				'id'     => 'forms-kbproforms',
				'parent' => 'tbex-sitegroup-forms',
				'title'  => ddw_tbex_string_forms_system( esc_attr__( 'Kadence Blocks', 'toolbar-extras' ) ),
				'href'   => esc_url( admin_url( 'admin.php?page=kadence-blocks-entries' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => ddw_tbex_string_forms_system( esc_attr__( 'Kadence Blocks', 'toolbar-extras' ) ),
				)
			)
		);

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-kbproforms-edit-forms',
					'parent' => 'forms-kbproforms',
				)
			);

				foreach ( $forms as $form ) {
					
					$form_id   = sanitize_text_field( $form->form_id );
					$form_name = esc_attr( $form->name );
					$form_post = absint( $form->post_id );	// Post ID containing the Form Block

					$admin_bar->add_node(
						array(
							'id'     => 'forms-kbproforms-form-' . $form_id,
							'parent' => 'group-kbproforms-edit-forms',
							'title'  => $form_name,
							'href'   => esc_url( admin_url( 'post.php?post=' . $form_id . '&action=edit' ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Edit Form', 'toolbar-extras' ) . ': ' . $form_name,
							)
						)
					);

						$admin_bar->add_node(
							array(
								'id'     => 'forms-kbproforms-form-' . $form_id . '-block',
								'parent' => 'forms-kbproforms-form-' . $form_id,
								'title'  => esc_attr__( 'Form Block Settings', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'post.php?post=' . $form_post . '&action=edit' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Form Block Settings', 'toolbar-extras' ),
								)
							)
						);

						$admin_bar->add_node(
							array(
								'id'     => 'forms-kbproforms-form-' . $form_id . '-preview',
								'parent' => 'forms-kbproforms-form-' . $form_id,
								'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								'href'   => esc_url( get_permalink( $form_post ) ),
								'meta'   => array(
									'target' => ddw_tbex_meta_target(),
									'title'  => esc_attr__( 'Preview', 'toolbar-extras' ),
								)
							)
						);

						$admin_bar->add_node(
							array(
								'id'     => 'forms-kbproforms-form-' . $form_id . '-entries',
								'parent' => 'forms-kbproforms-form-' . $form_id,
								'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'admin.php?page=kadence-blocks-entries&form_id=' . $form_id ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Entries', 'toolbar-extras' ),
								)
							)
						);

				}  // end foreach Forms loop

			$admin_bar->add_node(
				array(
					'id'     => 'forms-kbproforms-all-entries',
					'parent' => 'forms-kbproforms',
					'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=kadence-blocks-entries' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'All Entries', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'forms-kbproforms-options',
					'parent' => 'forms-kbproforms',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=kadence-blocks' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
					)
				)
			);

			/** Group: Plugin's resources */
			if ( ddw_tbex_display_items_resources() ) {
				ddw_tbex_aoitems_kadence_blocks_resources( $admin_bar, 'formsplace', 'forms-kbproforms' );
			}  // end if

	}  // end if Forms check

}  // end function
