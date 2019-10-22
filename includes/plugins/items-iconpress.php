<?php

// includes/plugins/items-iconpress

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if IconPress Pro version plugin is active or not.
 *
 * @since 1.4.0
 *
 * @return bool TRUE if class exists, FALSE otherwise.
 */
function ddw_tbex_is_iconpress_pro_active() {

	return class_exists( '\IconPress\Base' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_iconpress', 105 );
/**
 * Items for Add-On: IconPress Lite (free, by IconPress Team)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_iconpress( $admin_bar ) {

	$title = ddw_tbex_is_iconpress_pro_active() ? esc_attr__( 'IconPress', 'toolbar-extras' ) : esc_attr__( 'IconPress Lite', 'toolbar-extras' );
	$type  = ddw_tbex_is_iconpress_pro_active() ? '' : 'lite';

	/** Plugin's items */
	$admin_bar->add_node(
		array(
			'id'     => 'ao-iconpress',
			'parent' => 'group-active-theme',
			'title'  => $title,
			'href'   => esc_url( admin_url( 'admin.php?page=iconpress' . $type ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_addon_title_attr( $title ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-iconpress-select-icons',
				'parent' => 'ao-iconpress',
				'title'  => esc_attr__( 'Select Icons', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=iconpress' . $type ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Select Icons from Library', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-iconpress-my-collection',
				'parent' => 'ao-iconpress',
				'title'  => esc_attr__( 'My Collection', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=iconpress' . $type . '_my_collection' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'My Collection', 'toolbar-extras' ),
				)
			)
		);

		if ( ddw_tbex_is_iconpress_pro_active() && \IconPress\Dashboard\Base::isConnected() ) {

			$admin_bar->add_node(
				array(
					'id'     => 'ao-iconpress-upload-icons',
					'parent' => 'ao-iconpress',
					'title'  => esc_attr__( 'Upload Icons', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=iconpress_upload' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Upload Icons', 'toolbar-extras' ),
					)
				)
			);

		}  // end if

		$admin_bar->add_node(
			array(
				'id'     => 'ao-iconpress-options',
				'parent' => 'ao-iconpress',
				'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=iconpress' . $type . '_options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Options', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'ao-iconpress-integrations',
				'parent' => 'ao-iconpress',
				'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=iconpress_integrations' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Integrations', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-iconpress-resources',
					'parent' => 'ao-iconpress',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			if ( ! ddw_tbex_is_iconpress_pro_active() ) {

				ddw_tbex_resource_item(
					'support-forum',
					'iconpress-support',
					'group-iconpress-resources',
					'https://wordpress.org/support/plugin/iconpress-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'knowledge-base',
				'iconpress-docs-kb',
				'group-iconpress-resources',
				'https://customers.iconpress.io/knowledge-base/'
			);

			if ( ! ddw_tbex_is_iconpress_pro_active() ) {

				ddw_tbex_resource_item(
					'translations-community',
					'iconpress-translate',
					'group-iconpress-resources',
					'https://translate.wordpress.org/projects/wp-plugins/iconpress-lite'
				);

			}  // end if

			ddw_tbex_resource_item(
				'official-site',
				'iconpress-site',
				'group-iconpress-resources',
				'https://iconpress.io/'
			);

		}  // end if

}  // end function
