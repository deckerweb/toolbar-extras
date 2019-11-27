<?php

// OTGS: Toolset Suite - Resources
// includes/plugins-otgs/items-toolset-resources

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolset_resources', 100 );
/**
 * Resource items: External resources for the Toolset Suite.
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolset_resources( $admin_bar ) {

	/** Group: Plugin's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-toolsetsuite-resources',
			'parent' => 'tbex-toolset-suite',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'toolsetresources-docs',
			'group-toolsetsuite-resources',
			'https://toolset.com/documentation/'
		);

		ddw_tbex_resource_item(
			'support-forum',
			'toolsetresources-support-forum',
			'group-toolsetsuite-resources',
			'https://toolset.com/forums/forum/professional-support/'
		);

		ddw_tbex_resource_item(
			'changelog',
			'toolsetresources-changelog',
			'group-toolsetsuite-resources',
			'https://toolset.com/version/',
			ddw_tbex_string_version_history( 'pro-plugin' )
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'toolsetresources-youtube-channel',
			'group-toolsetsuite-resources',
			'https://www.youtube.com/channel/UCkXU96V638K0OQ-297dL2qA/videos'
		);

		ddw_tbex_resource_item(
			'official-blog',
			'toolsetresources-blog',
			'group-toolsetsuite-resources',
			'https://toolset.com/blog/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'toolsetresources-site',
			'group-toolsetsuite-resources',
			'https://toolset.com/'
		);

		/** Developer documentation */
		if ( ddw_tbex_display_items_dev_mode() ) {

			ddw_tbex_resource_item(
				'documentation-dev',
				'toolsetresources-docs-dev',
				'group-toolsetsuite-resources',
				'https://toolset.com/documentation/programmer-reference/'
			);

		}  // end if

}  // end function
