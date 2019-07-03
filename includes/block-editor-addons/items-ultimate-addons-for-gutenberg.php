<?php

// includes/block-editor-addons/items-ultimate-addons-for-gutenberg

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_uagb', 10 );
/**
 * Add-On items for Plugin:
 *   Ultimate Addons for Gutenberg (free, by Brainstorm Force) (UAG)
 *
 * @since 1.4.0
 * @since 1.4.2 Changed admin URL to newest version of UAG.
 *
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_uagb( $admin_bar ) {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );
	
	$admin_bar->add_node(
		array(
			'id'     => 'tbex-uagutenberg',
			'parent' => 'group-tbex-addons-blockeditor',
			'title'  => esc_attr__( 'Ultimate Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=uag' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_free_addon_title_attr( esc_attr__( 'Ultimate Addons for Gutenberg', 'toolbar-extras' ) ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'uagutenberg-options',
				'parent' => 'tbex-uagutenberg',
				'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=uag' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Blocks', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-uagutenberg-resources',
					'parent' => 'tbex-uagutenberg',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'uagutenberg-support',
				'group-uagutenberg-resources',
				'https://wordpress.org/support/plugin/ultimate-addons-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'documentation',
				'uagutenberg-support',
				'group-uagutenberg-resources',
				'https://www.ultimategutenberg.com/docs/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'uagutenberg-translate',
				'group-uagutenberg-resources',
				'https://translate.wordpress.org/projects/wp-plugins/ultimate-addons-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'changelog',
				'uagutenberg-changelog',
				'group-uagutenberg-resources',
				'https://www.ultimategutenberg.com/changelog/',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'github',
				'uagutenberg-github',
				'group-uagutenberg-resources',
				'https://github.com/brainstormforce/ultimate-addons-for-gutenberg'
			);

			ddw_tbex_resource_item(
				'official-site',
				'uagutenberg-site',
				'group-uagutenberg-resources',
				'https://www.ultimategutenberg.com/'
			);

		}  // end if

}  // end function
