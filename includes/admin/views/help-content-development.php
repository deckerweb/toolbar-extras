<?php

// includes/admin/views/help-content-development

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
 * @since 1.4.0
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_string_local_dev_environment()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_development() {

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-editor-code"></span> %s</h2>',
		__( 'For Development', 'toolbar-extras' )
	);

	$output .= '<p class="description">' . __( 'These features are intended to make the life of Site Builders a little easier.', 'toolbar-extras' ) . '</p>';

	/** Local Dev */
	$output .= '<h5 class="tbex-help-step">' . __( 'Local Development Environment', 'toolbar-extras' ) . '</h5>';

	$output .= sprintf(
		/* translators: %s - name of the plugin, "Toolbar Extras" */
		'<p class="tbex-step-info">' . __( 'Differentiating your various environments for development, staging and production helps you to get more productive and avoid mistakes. Therefore %s can autodetect if you are currently developing on a local install and mark your Toolbar appropriately. Of course, this feature can be disabled.', 'toolbar-extras' ) . '</p>',
		ddw_tbex_string_toolbar_extras()
	);

	$output .= sprintf(
		/* translators: %1$s - label "Local Development Website" / %2$s - value of 1030px */
		'<p class="tbex-step-info">' . __( 'Please note that the additional label on the right side of the Toolbar, %1$s, by default will only be shown for viewport sizes of %2$s or wider. This can also be adjusted via settings.', 'toolbar-extras' ) . '</p>',
		'<em>' . ddw_tbex_string_local_dev_environment() . '</em>',
		'<code>1030px</code>'
	);


	/** Dev Mode */
	$output .= '<h5 class="tbex-help-step">' . __( 'Development Mode', 'toolbar-extras' ) . '</h5>';

	$output .= '<p class="tbex-step-info">' . __( 'The Dev Mode is an elegant way to make some features of this plugin more optional. Some features may not be needed all the time or for all use cases. Also, this allows for some more advanced, code-savvy features to have them optionally available.', 'toolbar-extras' ) . '</p>';

	$output .= '<p class="tbex-step-info">' . __( 'Just enable the Dev Mode if you want and this will bring additional plugin support, Plugin and Theme uploader sub menus as well as some additional options you can enable or disable.', 'toolbar-extras' ) . '</p>';


	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
