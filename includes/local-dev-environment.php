<?php

// includes/local-dev-environment

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_local_dev_environment' );
/**
 * Add Local Development Environment text to the right side of the Toolbar.
 *
 * @since 1.0.0
 * @since 1.4.0 Added filter for title attribute.
 *
 * @uses ddw_tbex_string_local_dev_environment()
 * @uses ddw_tbex_item_title_with_settings_icon()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_local_dev_environment( $admin_bar ) {

	$environment_text = ddw_tbex_string_local_dev_environment();

	$title_attr = esc_attr(
		apply_filters(
			'tbex_filter_local_dev_tooltip',
			__( 'Note: You Are Currently In a Local Development Environment', 'toolbar-extras' )
		)
	);

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-local-dev-text',
			'parent' => 'top-secondary',	/** Puts the text on the right side of the Toolbar! */
			'title'  => ddw_tbex_item_title_with_settings_icon( strtoupper( $environment_text ), 'development', 'local_dev_icon' ),
			'meta'   => array(
				'title'  => $title_attr,
			)
		)
	);

}  // end function


add_action( 'wp_head', 'ddw_tbex_local_dev_toolbar_styles' );
add_action( 'admin_head', 'ddw_tbex_local_dev_toolbar_styles' );
/**
 * Add the styles for new Local Dev Environment Text.
 * 
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 */
function ddw_tbex_local_dev_toolbar_styles() {
	
	/** Set color */
	$environment_color = ddw_tbex_get_option( 'development', 'local_dev_bg_color' );

	if ( defined( 'TBEX_LOCAL_DEV_COLOR' ) && TBEX_LOCAL_DEV_COLOR ) {
		$environment_color = sanitize_hex_color( TBEX_LOCAL_DEV_COLOR );
	}

	/** Set minimum viewport width */
	$min_vieport = ddw_tbex_get_option( 'development', 'local_dev_viewport' );		// '1030';

	if ( defined( 'TBEX_LOCAL_DEV_VIEWPORT' ) && TBEX_LOCAL_DEV_VIEWPORT ) {
		$min_vieport = absint( TBEX_LOCAL_DEV_VIEWPORT );
	}

	/** Inline CSS styles */
	?>
		<!-- TBEX Local Dev Admin Bar Notice -->
		<style type='text/css'>
			#wp-admin-bar-tbex-local-dev-text > div,
			#wpadminbar {
				background-color: <?php echo $environment_color; ?> !important;
			}

			#wp-admin-bar-tbex-local-dev-text {
				display: none;
			}

			@media only screen and (min-width: <?php echo $min_vieport; ?>px) {

				#wpadminbar #wp-admin-bar-tbex-local-dev-text .ab-icon:before {
					top: 2px;
				}

				#wp-admin-bar-tbex-local-dev-text {
					display: block;
					text-decoration: none !important;
				}

				#wp-admin-bar-tbex-local-dev-text .ab-label,
				#wp-admin-bar-tbex-local-dev-text {
					font-size: 115% !important;
				}

				#wp-admin-bar-tbex-local-dev-text .ab-icon:before,
				#wp-admin-bar-tbex-local-dev-text .ab-label {
					color: #eee !important;
				}

				#wp-admin-bar-tbex-local-dev-text:hover {
					color: inherit !important;
				}

			}

			#adminbarsearch:before,
			.ab-icon:before,
			.ab-item:before {
				color: #eee !important;
			}
		</style>
	<?php

}  // end function
