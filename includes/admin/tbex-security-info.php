<?php

// includes/admin/tbex-security-info

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_menu', 'ddw_tbex_add_classicpress_security_page' );
/**
 * Add a Security info page for ClassicPress (v1.1.0+).
 *
 * @since 1.4.8
 *
 * @uses \add_security_page()
 * @uses ddw_tbex_string_toolbar_extras()
 */
function ddw_tbex_add_classicpress_security_page() {

	add_security_page(
		ddw_tbex_string_toolbar_extras(),	// page title
		ddw_tbex_string_toolbar_extras(),	// Menu title
		'toolbar-extras',					// = plugin slug && settings slug of plugin!
		'ddw_tbex_render_classicpress_security_info'	// callback
	);

	add_action( 'admin_enqueue_scripts', 'ddw_tbex_enqueue_admin_styles_scripts' );
	add_action( 'load-security_page_toolbar-extras', 'ddw_tbex_toolbar_extras_help_content' );

}  // end function


/**
 * Callback render function for our ClassicPress security info page.
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_get_settings_url()
 */
function ddw_tbex_render_classicpress_security_info() {

	$string_administrator = sprintf(
		'<em>%s</em>',
		is_multisite() ? __( 'Super Administrator', 'toolbar-extras' ) : __( 'Administrator', 'toolbar-extras' )
	);

	$string_snippet = sprintf(
		'<a href="%s" target="_blank" rel="nofollow noopener noreferrer">%s</a>',
		ddw_tbex_get_info_url( 'url_snippet_user' ),
		__( 'code snippet on the plugin\'s website', 'toolbar-extras' )

	);

	/** Render settings page */
	?>
		<div class="wrap">
			<h1>
				<span class="dashicons-before dashicons-arrow-up-alt tbex-icon"></span>
				<span class="tbex-label">
					<?php
						/* translators: Settings page title in WP-Admin */
						_e( 'Toolbar Extras - Settings', 'toolbar-extras' );
					?>
				</span>
				<span class="tbex-version"><?php echo ( defined( 'TBEX_PLUGIN_VERSION' ) ) ? 'v' . TBEX_PLUGIN_VERSION : ''; ?></span>
			</h1>

			<div class="tbex-intro">
				<h2><?php _e( 'Let the Toolbar Work for You!', 'toolbar-extras' ); ?></h2>
				<p>
					<?php _e( 'Decide which additional items should be displayed or not. Also use some smart tweaks or enable development modes.', 'toolbar-extras' ); ?>
				<p>
			</div>

			<div class="tbex-settings-page">
				<h3 class="tbex-settings-section"><span class="dashicons-before dashicons-shield"></span> <?php _e( 'Plugin Security Info', 'toolbar-extras' ); ?></h3>
				<p class="tbex-sub-description">
					<span class="dashicons-before dashicons-info tbex-security-info"></span>
					<?php echo sprintf(
						/* translators: 1 - name of the plugin, "Toolbar Extras" / 2 - label for user role, "(Super) Administrator" */
						__( 'By default almost all items added by %1$s are only displaying for %2$s users.', 'toolbar-extras' ),
						ddw_tbex_string_toolbar_extras(),
						$string_administrator
					); ?> <?php _e( 'While this can be changed via filters for some edge cases it is not recommended so. The reason is simple: security. Therefore it can only be tweaked by those who are knowing what they are doing - in plain English: being aware of the consequences.', 'toolbar-extras' ); ?>
				</p>
				<p class="tbex-sub-description">
					<a href="<?php echo ddw_tbex_get_info_url( 'url_snippet_user' ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-editor-code tbex-security-info"></span></a>
					<?php
						$output = sprintf(
							/* translators: %1$s - label for user role, "(Super) Administrator" */
							__( 'On sites with more than one %1$s user it sometimes is recommended or even necessary to restrict the plugin\'s items to only a few or even only one %1$s user.', 'toolbar-extras' ),
							$string_administrator
						);
						$output .= ' ' . __( 'This is possible of course via a filter.', 'toolbar-extras' );
						$output .= sprintf(
							/* translators: %s - linked label, "code snippet on the plugin's website" */
							' ' . __( 'You find the proper %s and can tweak the user IDs appropriately.', 'toolbar-extras' ),
							$string_snippet
						);
						echo $output;
					?>
				</p>
				<p class="tbex-sub-description">
					<?php echo sprintf(
						/* translators: %1$s - label for user role, "(Super) Administrator" */
						__( '%s users can adjust the options of the plugin here', 'toolbar-extras' ) . ':',
						$string_administrator
					); ?> <a class="button" href="<?php ddw_tbex_get_settings_url( 'default', 'echo' ); ?>"><?php _e( 'Go to the Plugin\'s Settings', 'toolbar-extras' ); ?> &rarr;</a>
				</p>
			</div>
		</div>
	<?php

}  // end function
