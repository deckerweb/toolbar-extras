<?php

// includes/admin/views/help-content-footer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Prepare the help tab footer content.
 *
 * @since 1.0.0
 * @since 1.4.0 Migrated footer content into its own function.
 *
 * @uses ddw_tbex_info_values() To get some strings of info values.
 * @uses ddw_tbex_get_info_link()
 * @uses ddw_tbex_coding_years()
 *
 * @param string $render Flag string to optionally echo string (not returning).
 * @return string Returning or echoing the translateable strings and markup.
 */
function ddw_tbex_help_tab_content_footer( $render = '' ) {

	$tbex_info = (array) ddw_tbex_info_values();

	/** Help tab footer content */
	$footer = ddw_tbex_space_helper() . '<h4 class="tbex-help-footer">' . __( 'Important plugin links:', 'toolbar-extras' ) . '</h4>' .

		ddw_tbex_get_info_link( 'url_plugin', esc_html__( 'Plugin website', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_plugin_faq', esc_html_x( 'FAQ', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Help tab info', 'toolbar-extras' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Help tab info', 'toolbar-extras' ), 'button tbex' ) .

		'&nbsp;&nbsp;' . ddw_tbex_get_info_link( 'url_newsletter', esc_html_x( 'Join our Newsletter', 'Help tab info', 'toolbar-extras' ), 'button button-primary tbex' ) .

		sprintf(
			'<p><a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a></p>',
			esc_url( $tbex_info[ 'url_license' ] ),
			esc_attr( $tbex_info[ 'license' ] ),
			ddw_tbex_coding_years(),
			esc_url( $tbex_info[ 'author_uri' ] ),
			esc_html( $tbex_info[ 'author' ] )
		);

	/** Optional echo footer */
	if ( 'echo' === sanitize_key( $render ) ) {
		echo $footer;
	}

	/** Return footer */
	return $footer;

}  // end function
