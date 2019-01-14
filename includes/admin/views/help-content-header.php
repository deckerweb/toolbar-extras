<?php

// includes/admin/views/help-content-header

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Prepare the help tab header content.
 *
 * @since 1.0.0
 * @since 1.4.0 Migrated header content into its own function.
 *
 * @uses ddw_tbex_string_toolbar_extras()
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translateable strings and markup.
 */
function ddw_tbex_help_tab_content_header( $render = '' ) {

	/** Help tab header content */
	//$tbex_info = (array) ddw_tbex_info_values();

	/** Content: Toolbar Extras plugin */
	$header = sprintf(
		'<h4 class="tbex-help-header">%1$s: <span class="dashicons-before dashicons-arrow-up-alt"></span> %2$s <small class="tbex-help-version">v%3$s</small></h4>',
		__( 'Plugin', 'toolbar-extras' ),
		ddw_tbex_string_toolbar_extras(),
		TBEX_PLUGIN_VERSION
	);

	/** Optional echo header */
	if ( 'echo' === sanitize_key( $render ) ) {
		echo $header;
	}

	/** Return header */
	return $header;

}  // end function
