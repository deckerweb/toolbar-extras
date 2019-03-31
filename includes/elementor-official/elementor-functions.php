<?php

// includes/elementor-official/elementor-functions

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get the proper "Add New" URL for a new Elementor Template.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_elementor_version()
 *
 * @return string Escaped URL for adding new Elementor template.
 */
function ddw_tbex_get_elementor_new_template_url() {

	/** Default before Elementor v2.3.0 */
	$url_new = 'post-new.php?post_type=elementor_library';

	/** New default since Elementor 2.3.0+ */
	if ( ddw_tbex_is_elementor_version( 'core', '2.3.0', '>=' ) ) {
		$url_new = 'edit.php?post_type=elementor_library#add_new';
	}

	/** Return the URL */
	return esc_url( admin_url( $url_new ) );

}  // end function


/**
 * Get the proper Toolbar parent ID for Elementor Template "Add New" for
 *   Elementor before v2.4.0 and since v2.4.0+.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_elementor_version()
 *
 * @return string Parent ID for Toolbar nodes.
 */
function ddw_tbex_elementor_addnew_parent() {

	return ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' ) ? 'new-elementor_library' : 'tbex-elementor-template';

}  // end function


/**
 * Build string "Elementor Template".
 *
 * @since 1.0.0
 * @since 1.4.0 Moved into own function.
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string Translateable string for "Elementor Template".
 */
function ddw_tbex_string_elementor_template() {

	return sprintf(
		/* translators: %1$s - Word Elementor (page builder) */
		esc_attr_x( '%1$s Template', 'Toolbar New Content section', 'toolbar-extras' ),
		ddw_tbex_string_elementor()
	);

}  // end function


/**
 * Build string "New Elementor Template".
 *
 * @since 1.0.0
 * @since 1.4.0 Moved into own function.
 *
 * @uses ddw_tbex_string_elementor()
 *
 * @return string Translateable string for "New Elementor Template".
 */
function ddw_tbex_string_elementor_template_new() {

	return sprintf(
		/* translators: %1$s - Word Elementor (page builder) */
		esc_attr_x( 'New %1$s Template', 'Toolbar New Content section', 'toolbar-extras' ),
		ddw_tbex_string_elementor()
	);

}  // end function


/**
 * Build "via" string based on plugin context - "Elementor" and "Builder
 *   Template Categories" - when *both together* are active.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_is_btcplugin_active()
 *
 * @param string $type Type of plugin to build string for.
 * @return string Markup and translateable string based on plugin context.
 */
function ddw_tbex_string_elementor_categories_via( $type = '' ) {

	$via_string  = '';
	$plugin_name = '';

	if ( ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' )
		&& ddw_tbex_is_btcplugin_active()
	) {

		switch ( sanitize_key( $type) ) {

			case 'elementor':
				$plugin_name = ddw_tbex_string_elementor();
				break;
			
			case 'btc':
				$plugin_name = __( 'Builder Template Categories', 'toolbar-extras' );
				break;

		}  // end switch

		$via_string = sprintf(
			/* translators: %s - name of the plugin, "Elementor" or Builder Template Categories" */
			' (' . __( 'via %s plugin', 'toolbar-extras' ) . ')',
			$plugin_name
		);

	}  // end if

	return $via_string;

}  // end function
