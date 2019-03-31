<?php

// includes/admin/views/help-content-addons

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
 * @since 1.4.2
 *
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_string_local_dev_environment()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_addons() {

	$info_standalone = '&mdash; ' . __( 'Note, these Add-Ons/ Extensions are standalone plugins which do not require Toolbar Extras.', 'toolbar-extras' );

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-plus-alt"></span> %s</h2>',
		__( 'Add-Ons &amp; Extensions', 'toolbar-extras' )
	);

	$output .= '<p class="description">' . __( 'A central feature of Toolbar Extras is that it plays nice with other plugins and themes. Extensibility is created - and wanted - in the core of the plugin. Therefore, it is only logical that Add-Ons and Extensions constantly extend the features and the horizon of the core plugin. So that you as Site Builder can save even more time and work more efficiently.', 'toolbar-extras' ) . '</p>';

	/** Official Add-Ons */
	$output .= '<h5 class="tbex-help-step">' . __( 'Official Add-Ons', 'toolbar-extras' ) . '</h5>';

	$output .= sprintf(
		'<p class="tbex-step-info">%1$s %2$s</p>',
		__( 'The official Add-Ons I developed to extend the feature set of Toolbar Extras.', 'toolbar-extras' ),
		__( 'So you can even better integrate with other popular Page Builders, plugins and themes.', 'toolbar-extras' )
	);

	$output .= sprintf(
		'<p class="tbex-step-info"><strong>%1$s:</strong> %2$s</p>',
		__( 'Please note', 'toolbar-extras' ),
		__( 'These official Add-Ons were specifically developed for Toolbar Extras and therefore require it.', 'toolbar-extras' )
	);


	/** Supported Add-Ons */
	$output .= '<h5 class="tbex-help-step">' . __( 'Supported Add-Ons', 'toolbar-extras' ) . '</h5>';

	$output .= sprintf(
		'<p class="tbex-step-info">%1$s %2$s</p>',
		__( 'Other plugins from me that perfectly fit with Toolbar Extras and where both plugins support each other. Plus, plugins from third-party developers which work perfectly fine with Toolbar Extras and improve the user experience or cover special needs.', 'toolbar-extras' ),
		$info_standalone
	);


	/** Recommended Extensions */
	$output .= '<h5 class="tbex-help-step">' . __( 'Recommended Extensions', 'toolbar-extras' ) . '</h5>';

	$output .= sprintf(
		'<p class="tbex-step-info">%1$s %2$s</p>',
		__( 'These are plugins from third-party developers I can strongly recommend because they fit with Toolbar Extras, extend the functionality and user experience, plus, they are supported on the behalf of Toolbar Extras. Enjoy.', 'toolbar-extras' ),
		$info_standalone
	);


	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
