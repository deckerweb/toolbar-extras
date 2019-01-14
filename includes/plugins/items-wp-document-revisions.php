<?php

// includes/plugins/items-wp-document-revisions

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if WPDR Simple Downloads Add-On plugin is active or not.
 *
 * @since 1.3.9
 *
 * @return bool TRUE if constant defined, FALSE otherwise.
 */
function ddw_tbex_is_wpdr_simple_downloads_active() {

	return defined( 'WPDRSD_VERSION' );

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_wp_document_revisions', 20 );
/**
 * Site items for Plugin: WP Document Revisions (free, by Ben Balter)
 *
 * @since 1.3.9
 *
 * @uses ddw_wpdrsd_get_options()
 * @uses ddw_tbex_is_wpdr_simple_downloads_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_site_items_wp_document_revisions() {

	/** For: Manage Content */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-document-revisions',
			'parent' => 'manage-content'
		)
	);

	/** Post type label */
	//$content_label = ddw_tbex_is_wpdr_simple_downloads_active() ? __( 'Downloads', 'toolbar-extras' ) : __( 'Documents', 'toolbar-extras' );
	$content_label = __( 'Documents', 'toolbar-extras' );

	$wpdrsd_options = get_option( 'wpdrsd_options' );

	if ( ddw_tbex_is_wpdr_simple_downloads_active() && $wpdrsd_options[ 'wpdrsd_downloads_translations' ] ) {
		$content_label = __( 'Downloads', 'toolbar-extras' );
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpdr-documents-edit',
			'parent' => 'group-document-revisions',
			'title'  => sprintf(
				/* translators: %s - post type label, "Documents" OR "Downloads" */
				esc_attr__( 'Edit %s', 'toolbar-extras' ),
				$content_label
			),
			'href'   => esc_url( admin_url( 'edit.php?post_type=document' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: %s - post type label, "Documents" OR "Downloads" */
					esc_attr__( 'Edit %s &amp; Revisions', 'toolbar-extras' ),
					$content_label
				)
			)
		)
	);

	if ( ddw_tbex_is_wpdr_simple_downloads_active() ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'wpdr-download-settings',
				'parent' => 'group-document-revisions',
				'title'  => esc_attr__( 'Downloads Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=document&page=wpdrsd-settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Downloads Settings', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'wpdr-media-settings',
			'parent' => 'group-document-revisions',
			'title'  => esc_attr__( 'File Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-media.php' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'File Settings', 'toolbar-extras' )
			)
		)
	);

}  // end function
