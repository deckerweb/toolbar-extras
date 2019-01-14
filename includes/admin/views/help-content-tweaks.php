<?php

// includes/admin/views/help-content-tweaks

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
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_help_tab_content_header()
 * @uses ddw_tbex_help_tab_content_footer()
 *
 * @return string HTML markup of help tab content.
 */
function ddw_tbex_help_tab_content_tweaks() {

	/** Setup tweak examples */
	$examples = array(
		'wplogo'  => __( 'Don\'t like the WordPress logo and its link items at top left corner? Just remove it completely or replace it with the smart web group. Keep your workspace more useful.', 'toolbar-extras' ),
		'wphowdy' => __( 'Finally, edit the Welcome Item and remove or replace the ridicioulos %s at the top right corner. Keep your workspace more individually customized.', 'toolbar-extras' ),
		'plugins' => __( 'Have a plugin placing an annoying list of items into the Toolbar? Chances are that we have a Smart Tweak to re-hook as a sub item somwhere else or completely remove it. Keep your workspace optimized.')
	);

	if ( ddw_tbex_is_elementor_active() ) {
		$examples[ 'translations' ] = __( 'Managing multilingual websites for foreign clients and don\'t need Elementor translations in a language you don\'t know and speak? No problem, just unload translations for Elementor (Pro)', 'toolbar-extras' );
	}

	/** Header */
	ddw_tbex_help_tab_content_header( 'echo' );

	/** Title */
	$output = sprintf(
		'<h2><span class="dashicons-before dashicons-lightbulb"></span> %s</h2>',
		__( 'Smart Tweaks', 'toolbar-extras' )
	);

	/** Prepare tweak examples output */
	$output .= '<p>' . __( 'This settings section is all about tweaking existing behavior regarding the Toolbar: So you can tweak the behavior of WordPress itself, of third-party plugins or even special things independent from the Toolbar. This will help tailor your site building experience to your own needs.', 'toolbar-extras' ) . '</p>';

	$output .= '<h5>' . __( 'Some examples', 'toolbar-extras' ) . ':</h5>';

	/** Render tweak examples */
	$output .= '<ul class="tbex-help-tweak-examples">';

	foreach ( $examples as $example ) {
		
		$output .= sprintf(
			'<li class="tbex-help-tweak-example-item">%s</li>',
			$example
		);

	}  // end foreach

	$output .= '</ul>';

	/** Render content */
	echo $output;

	/** Footer */
	ddw_tbex_help_tab_content_footer( 'echo' );

}  // end function
