<?php

// OTGS: WPML Suite - Resources
// includes/plugins-otgs/items-wpml-resources

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wpml_resources', 100 );
/**
 * Resource items: External resources for the WPML Suite.
 *
 * @since 1.4.9
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_wpml_resources( $admin_bar ) {

	/** Group: Plugin's resources */
	$admin_bar->add_group(
		array(
			'id'     => 'group-wpmlsuite-resources',
			'parent' => 'tbex-wpml-suite',
			'meta'   => array( 'class' => 'ab-sub-secondary' ),
		)
	);

		ddw_tbex_resource_item(
			'documentation',
			'wpmlresources-docs',
			'group-wpmlsuite-resources',
			'https://wpml.org/documentation/'
		);

		ddw_tbex_resource_item(
			'faq',
			'wpmlresources-faq',
			'group-wpmlsuite-resources',
			'https://wpml.org/documentation/faq/'
		);

		ddw_tbex_resource_item(
			'support-contact',
			'wpmlresources-support-contact',
			'group-wpmlsuite-resources',
			'https://wpml.org/forums/forum/english-support/'
		);

		ddw_tbex_resource_item(
			'changelog',
			'wpmlresources-changelog',
			'group-wpmlsuite-resources',
			'https://wpml.org/category/changelog/',
			ddw_tbex_string_version_history( 'pro-plugin' )
		);

		ddw_tbex_resource_item(
			'youtube-channel',
			'wpmlresources-youtube-channel',
			'group-wpmlsuite-resources',
			'https://www.youtube.com/channel/UC0-st_ubApkPzzgxuBh2T0A/videos'
		);

		ddw_tbex_resource_item(
			'official-blog',
			'wpmlresources-blog',
			'group-wpmlsuite-resources',
			'https://wpml.org/blog/'
		);

		ddw_tbex_resource_item(
			'official-site',
			'wpmlresources-site',
			'group-wpmlsuite-resources',
			'https://wpml.org/'
		);

		/** Developer documentation */
		if ( ddw_tbex_display_items_dev_mode() ) {

			ddw_tbex_resource_item(
				'documentation-dev',
				'wpmlresources-docs-dev',
				'group-wpmlsuite-resources',
				'https://wpml.org/documentation/support/'
			);

			ddw_tbex_resource_item(
				'code-reference',
				'wpmlresources-code-reference',
				'group-wpmlsuite-resources',
				'https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/'
			);

		}  // end if

}  // end function
