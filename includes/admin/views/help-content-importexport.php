<?php

// includes/admin/views/help-content-importexport

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Create and display plugin help tab content.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_string_toolbar_extras()
 * @uses ddw_tbex_string_json()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_importexport() {

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-controls-repeat"></span> %s</h2>',
		__( 'Import &amp; Export', 'toolbar-extras' )
	);

	$output .= '<p class="description">' . __( 'This feature helps you use this plugin even easier and smarter.', 'toolbar-extras' ) . '</p>';

	/** Workflow example */
	$output .= '<h4><em>' . __( 'A Typical Workflow Example', 'toolbar-extras' ) . '</em></h4>' .
		'<p class="description">' . __( 'Transfer settings from a development or blueprint install to the live/ production install.', 'toolbar-extras' ) . '</p>' .
		'<h5>' . __( 'Prerequisites/ Requirements', 'toolbar-extras' ) . ':</h5>' .
		'<ul>' .
			'<li>' . sprintf(
				/* translators: %s - name of the plugin, "Toolbar Extras" */
				__( 'On BOTH sites/ installations you have installed & activated this plugin, %s.', 'toolbar-extras' ),
				'&raquo;' . ddw_tbex_string_toolbar_extras() . '&laquo;'
			) . '</li>' .
			'<li>' . __( 'It\'s recommended to have THE VERY SAME VERSIONS installed on the original site and also the receiving site. Reason: sometimes settings differ between plugin or Add-On versions. So with making sure you have the same versions installed and activated you just ensure the correct settings are included within the export file.', 'toolbar-extras' ) . '</li>' .
			'</ul>' .
		'<h5>' . __( 'Transfer', 'toolbar-extras' ) . ':</h5>' .
		'<ul>' .
			'<li>' . sprintf(
				/* translators: %s - linked label, "Import/Export" */
				__( 'On the development install: Just make an Export file via the %s settings tab:', 'toolbar-extras' ),
				'<a href="' . esc_url( admin_url( 'options-general.php?page=toolbar-extras&tab=import-export' ) ) . '">&raquo;' . __( 'Import/Export', 'toolbar-extras' ) . '&laquo;</a>'
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - label "Export" */
				__( 'In the %s section there enable only the checkboxes you need.', 'toolbar-extras' ),
				'&raquo;' . __( 'Export', 'toolbar-extras' ) . '&laquo;'
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - file extension name, ".json" */
				__( 'Save the %s file to your computer.', 'toolbar-extras' ),
				ddw_tbex_string_json()
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - file extension name, ".json" */
				__( 'On the live/ production site, just import this %s file and you\'re done!', 'toolbar-extras' ),
				ddw_tbex_string_json()
			) . ' ;-)</li>' .
		'</ul>';


	//$output .= '<h5>' . __( 'Please note', 'toolbar-extras' ) . ':</h5>';
	//$output .= 'You can use this for all supported, official Add-Ons as well. For the Admin Toolbar Menu, I highly recommend the ? plugin.';

	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
