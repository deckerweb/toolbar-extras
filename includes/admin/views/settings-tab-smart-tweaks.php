<?php

// includes/admin/views/settings-tab-smart-tweaks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * 1) All SECTION INFOS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * Tab Smart Tweaks - 1st settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_wordpress() {

	?>
		<p>
			<?php _e( 'Remove or replace default WordPress items and change frontend Toolbar color.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab Smart Tweaks - 2nd settings section: Description.
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_section_info_welcome() {

	?>
		<p>
			<?php _e( 'Finally, remove or replace the ridiculous "Howdy". Or use a completely custom welcome wording.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab Smart Tweaks - 3rd settings section: Description.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_settings_show_only_for_active_plugins()
 */
function ddw_tbex_settings_section_info_plugins() {

	?>
		<p>
			<?php
				_e( 'Re-hook or remove Toolbar items from certain plugins.', 'toolbar-extras' );
				echo ' ';
				ddw_tbex_string_settings_show_only_for_active_plugins();
			?>
		</p>
	<?php

}  // end function


/**
 * Tab Smart Tweaks - 4th settings section: Description.
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_section_info_translations() {

	?>
		<p>
			<?php _e( 'Unload translations for specific plugins so that you can work in an English-language environment. This could be very useful for multilingual installs.', 'toolbar-extras' ); ?>
		</p>
		<p class="description">
			<?php echo '<strong>' . __( 'Usage example', 'toolbar-extras' ) . ':</strong> ' . __( 'The site of your client is completely in French. You as the Administrator and site builder speak no French, only English, and the site cannot be switched to English. The user profile language setting doesn’t help as it is only for the WP-Admin. So, in this case when you need to edit stuff in Elementor and want to use Toolbar Extras as well: Then the tweaks below help you to get a English-language environment for Elementor.', 'toolbar-extras' ); ?>
		</p>
		<p>
			<?php echo sprintf(
				/* translators: %s - a capability, 'manage_options' */
				__( 'Please note: this feature is limited to logged-in users which have the capability %s.', 'toolbar-extras' ),
				'<code>manage_options</code>'
			); ?> <?php _e( 'By default these are administrator user roles only. However, developers can use a filter and set a different capability if needed.', 'toolbar-extras' ); ?> <?php echo sprintf(
				/* translators: %s - word "documentation", linked to plugin's knowledge base */
				__( 'Have a look in our %s for a code snippet.', 'toolbar-extras' ),
				'<a href="https://toolbarextras.com/docs/custom-capability-for-unloading-translations/" target="_blank" rel="noopener noreferrer">' . __( 'documentation', 'toolbar-extras' ) . '</a>'
			); ?>
		</p>
	<?php

}  // end function


/**
 * Tab Smart Tweaks - 5th settings section: Description.
 *
 * @since 1.2.0
 *
 * @uses ddw_tbex_string_settings_show_only_for_active_plugins()
 */
function ddw_tbex_settings_section_info_pagebuilder() {

	?>
		<p>
			<?php
				_e( 'Tweak a few things regarding the active Page Builder.', 'toolbar-extras' );
				echo ' ';
				ddw_tbex_string_settings_show_only_for_active_plugins();
			?>
		</p>
	<?php

}  // end function



/**
 * 2) All SETTING FIELDS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * 1st section: WordPress bevavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Frontend Toolbar Color
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_toolbar_front_color() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[toolbar_front_color]" id="tbex-options-tweaks-toolbar_front_color">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'toolbar_front_color' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'toolbar_front_color' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[toolbar_front_color]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php
				$profile_settings = sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'profile.php' ) ), __( 'Profile Settings', 'toolbar-extras' ) );
				echo sprintf( __( 'Note: This tweak currently works only with the 8 built-in color schemes in WordPress core which are set in your %s.', 'toolbar-extras' ), $profile_settings );
			?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Use Web Group?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_use_web_group() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[use_web_group]" id="tbex-options-tweaks-use_web_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_web_group' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_web_group' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[use_web_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak replaces The WordPress Logo icon (top-left corner in Toolbar) with your Site Icon (Favicon) if set. If no Site Icon is set, the Globe icon gets used as a fallback. The Resource links of WordPress are removed and replaced with external resources for site-builders like Pingdom, Google Search Console etc. This is very useful to check stuff regarding your site quickly.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove WP Logo?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_remove_wp_logo() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_wp_logo]" id="tbex-options-tweaks-remove_wp_logo">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_wp_logo' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_wp_logo' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_wp_logo]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Remove Frontend Customize?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_remove_front_customizer() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_front_customizer]" id="tbex-options-tweaks-remove_front_customizer">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_front_customizer' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_front_customizer' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_front_customizer]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Remove Media in New Content Group?
 *
 * @since 1.3.0
 */
function ddw_tbex_settings_cb_remove_media_newcontent() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_media_newcontent]" id="tbex-options-tweaks-remove_media_newcontent">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_media_newcontent' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_media_newcontent' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_media_newcontent]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Remove User in New Content Group?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_remove_user_newcontent() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_user_newcontent]" id="tbex-options-tweaks-remove_user_newcontent">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_user_newcontent' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_user_newcontent' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_user_newcontent]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Use the My Account item tweak?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_use_myaccount_tweak() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[use_myaccount_tweak]" id="tbex-options-tweaks-use_myaccount_tweak">
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_myaccount_tweak' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_myaccount_tweak' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[use_myaccount_tweak]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * 2nd section: My Account (Howdy) bevavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Use the My Account item tweak?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_use_howdy_replace() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[use_howdy_replace]" id="tbex-options-tweaks-use_howdy_replace">
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_howdy_replace' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
			<option value="replace" <?php selected( sanitize_key( $tbex_options[ 'use_howdy_replace' ] ), 'replace' ); ?>><?php _e( 'Yes, replace the word', 'toolbar-extras' ); ?></option>
			<option value="custom" <?php selected( sanitize_key( $tbex_options[ 'use_howdy_replace' ] ), 'custom' ); ?>><?php _e( 'Yes, custom welcome', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[use_howdy_replace]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, Text): "Howdy" replacement
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_howdy_replacement() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$string_hello = __( 'Hello,', 'toolbar-extras' );

	/** Get current user */
	$user      = wp_get_current_user();
	$user_name = ! empty( $user->user_firstname ) ? esc_attr( $user->user_firstname ) : esc_attr( $user->display_name );

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-tweaks-howdy_replacement" name="tbex-options-tweaks[howdy_replacement]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'howdy_replacement' ] ); ?>" />
		<label for="tbex-options-tweaks[howdy_replacement]">
			<span class="description">
				<?php echo sprintf(
					/* translators: %s - the string "Howdy" */
					__( 'Default: %s', 'toolbar-extras' ),
					'<code>' . __( 'Howdy,', 'toolbar-extras' ) . '</code>'
				); ?>
			</span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - the string "Hello," */
				__( 'Example: %s', 'toolbar-extras' ) . ' &rarr; <code>%s %s</code>',
				'<code>' . $string_hello . '</code>',
				$string_hello,
				$user_name		//'Dave'	// @TODO settings integration
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Input, Text): Custom welcome wording
 *
 * @since 1.4.0
 *
 * @uses do_shortcode()
 * @uses ddw_tbex_string_none_empty()
 */
function ddw_tbex_settings_cb_custom_welcome() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$shortcodes = array(
		'tbex-userid'      => _x( 'User ID', 'Shortcode description', 'toolbar-extras' ),
		'tbex-email'       => _x( 'User email', 'Shortcode description', 'toolbar-extras' ),
		'tbex-login'       => _x( 'User login name', 'Shortcode description', 'toolbar-extras' ),
		'tbex-displayname' => _x( 'User display name', 'Shortcode description', 'toolbar-extras' ),
		'tbex-firstname'   => _x( 'User first name', 'Shortcode description', 'toolbar-extras' ),
		'tbex-lastname'    => _x( 'User last name', 'Shortcode description', 'toolbar-extras' ), 
	);

	$output = '';

	foreach ( $shortcodes as $shortcode => $label ) {

		$current = do_shortcode( '[' . $shortcode . ']');
		$current = empty( $current ) ? '<em>{' . __( 'not set', 'toolbar-extras' ) . '}</em>' : $current;

		$output .= sprintf(
			'<li>%1$s: %2$s (<small>%3$s: %4$s</small>)</li>',
			$label,
			'<code>[' . $shortcode . ']</code>',
			__( 'Current value', 'toolbar-extras' ),
			$current
		);

	}  // end foreach

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-tweaks-custom_welcome" name="tbex-options-tweaks[custom_welcome]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'custom_welcome' ] ); ?>" />
		<label for="tbex-options-tweaks[custom_welcome]">
			<span class="description">
				<?php echo sprintf(
					/* translators: %s - the string "None (empty)" */
					__( 'Default: %s', 'toolbar-extras' ),
					ddw_tbex_string_none_empty()
				); ?>
			</span>
		</label>
		<p class="description">
			<?php _e( 'This will replace the complete welcome plus display name title and only use your custom wording.', 'toolbar-extras' ); ?> <?php _e( 'The following Shortcodes can be used within this field:', 'toolbar-extras' ); ?>
		</p>
		<ul>
			<?php echo $output; ?>
		</ul>
	<?php

}  // end function


/**
 * Setting (Input, URL): Custom "My Account" URL
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_custom_url_test()
 * @uses ddw_tbex_string_no_custom_url()
 * @uses ddw_tbex_string_ensure_input_https()
 */
function ddw_tbex_settings_cb_custom_myaccount_url() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$profile_link = sprintf(
		'<a href="%s">%s</a>',
		esc_url( admin_url( 'profile.php' ) ),
		__( 'profile URL', 'toolbar-extras' )
	);

	?>
		<input type="url" class="regular-text tbex-input" id="tbex-options-tweaks-custom_myaccount_url" name="tbex-options-tweaks[custom_myaccount_url]" placeholder="https://" value="<?php echo esc_url( $tbex_options[ 'custom_myaccount_url' ] ); ?>" /> <?php echo ddw_tbex_custom_url_test( 'tweaks', 'custom_myaccount_url' ); ?>
		<label for="tbex-options-tweaks[custom_myaccount_url]">
			<span class="description">
				<?php echo sprintf(
					/* translators: %s - the string "None (no custom URL)" */
					__( 'Default: %s', 'toolbar-extras' ),
					ddw_tbex_string_no_custom_url()
				); ?>
			</span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - string "profile URL" (linked) */
				__( 'When you let the above field empty the default %s will be used. Only when you enter a valid URL, that will actually be used. That could be a full external URL or even a (full) frontend or backend URL from your WordPress install.', 'toolbar-extras' ),
				$profile_link
			); ?>
		</p>
		<p class="description">
			<?php echo ddw_tbex_string_ensure_input_https(); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Which link target to use?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_custom_myaccount_target() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[custom_myaccount_target]" id="tbex-options-tweaks-custom_myaccount_target">
			<option value="_self" <?php selected( sanitize_key( $tbex_options[ 'custom_myaccount_target' ] ), '_self' ); ?>><?php /* translators: %s - Target _self */ printf( __( 'Same Tab/ Window %s', 'toolbar-extras' ), '<code>_self</code>' ); ?></option>
			<option value="_blank" <?php selected( sanitize_key( $tbex_options[ 'custom_myaccount_target' ] ), '_blank' ); ?>><?php /* translators: %s - Target _blank */ printf( __( 'New Tab/ Window %s', 'toolbar-extras' ), '<code>_blank</code>' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[custom_myaccount_target]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>_self</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * 3rd section: Plugin bevavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Re-hook Elementor Inspector feature?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_rehook_elementor_inspector() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$elementor_tools_link = sprintf(
		'<a href="%s">%s</a>',
		esc_url( admin_url( 'admin.php?page=elementor-tools#tab-general' ) ),
		__( 'Elementor Tools settings', 'toolbar-extras' )
	);

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_elementor_inspector]" id="tbex-options-tweaks-rehook_elementor_inspector">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_elementor_inspector' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_elementor_inspector' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_elementor_inspector]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: 1 - string "Elementor Tools settings" (linked) / 2 - label of our plugin's main group (default: "Build Group") */
				__( 'This tweak re-hooks the Elementor Inspector item (if enabled in %1$s) as a sub-item of the %2$s Group.', 'toolbar-extras' ),
				$elementor_tools_link,
				ddw_tbex_string_main_item()
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook StylePress?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_rehook_stylepress() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$stylepress_link = sprintf(
		'<a href="%s">%s</a>',
		esc_url( admin_url( 'admin.php?page=dtbaker-stylepress-settings' ) ),
		__( 'StylePress for Elementor', 'toolbar-extras' )
	);

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_stylepress]" id="tbex-options-tweaks-rehook_stylepress">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_stylepress' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_stylepress' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_stylepress]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: 1 - plugin name "StylePress for Elementor" (linked) / 2 - label of our plugin's main group (default: "Build Group") */
				__( 'This tweak re-hooks the %1$s item as a sub-item of the %2$s Group.', 'toolbar-extras' ),
				$stylepress_link,
				ddw_tbex_string_main_item()
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook Yoast SEO?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_rehook_yoastseo() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_yoastseo]" id="tbex-options-tweaks-rehook_yoastseo">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_yoastseo' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_yoastseo' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_yoastseo]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete Yoast SEO Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook SEOPress?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_rehook_seopress() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_seopress]" id="tbex-options-tweaks-rehook_seopress">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_seopress' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_seopress' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_seopress]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete SEOPress Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook Gravity Forms?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_rehook_gravityforms() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_gravityforms]" id="tbex-options-tweaks-rehook_gravityforms">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_gravityforms' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_gravityforms' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_gravityforms]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete Gravity Forms Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook Smart Slider 3?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_rehook_smartslider() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_smartslider]" id="tbex-options-tweaks-rehook_smartslider">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_smartslider' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_smartslider' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_smartslider]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete Smart Slider 3 Toolbar group as a sub-item of the Site Group (Manage Content).', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook NextGen Gallery?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_rehook_nextgen() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_nextgen]" id="tbex-options-tweaks-rehook_nextgen">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_nextgen' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_nextgen' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_nextgen]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete NextGen Gallery Toolbar group as a sub-item of the Site Group (Manage Content Media).', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook iThemes Security?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_rehook_ithsec() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_ithsec]" id="tbex-options-tweaks-rehook_ithsec">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_ithsec' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_ithsec' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_ithsec]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete iThemes Security Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook WP Rocket?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_rehook_wprocket() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_wprocket]" id="tbex-options-tweaks-rehook_wprocket">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_wprocket' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_wprocket' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_wprocket]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete WP Rocket Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook Autoptimize?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_rehook_autoptimize() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_autoptimize]" id="tbex-options-tweaks-rehook_autoptimize">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_autoptimize' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_autoptimize' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_autoptimize]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete Autoptimize Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Re-hook Swift Performance (Lite)?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_rehook_swiftperformance() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[rehook_swiftperformance]" id="tbex-options-tweaks-rehook_swiftperformance">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_swiftperformance' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_swiftperformance' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_swiftperformance]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak re-hooks the complete Swift Performance (Lite) Toolbar group as a sub-item of the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove WooCommerce post type entries?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_remove_woo_posttypes() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_woo_posttypes]" id="tbex-options-tweaks-remove_woo_posttypes">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_woo_posttypes' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_woo_posttypes' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_woo_posttypes]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the items New Order and New Coupon from the New Content Group as these two are rarely used.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove All In One SEO Pack?
 *
 * @since 1.1.0
 */
function ddw_tbex_settings_cb_remove_aioseo() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_aioseo]" id="tbex-options-tweaks-remove_aioseo">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_aioseo' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_aioseo' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_aioseo]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the top-level Toolbar link including sub-items as these items are not useful at all.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove UpdraftPlus?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_remove_updraftplus() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_updraftplus]" id="tbex-options-tweaks-remove_updraftplus">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_updraftplus' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_updraftplus' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_updraftplus]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the top-level Toolbar link including sub-items on the frontend as Toolbar Extras already places those links as a sub-item under the Site Group anyways.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Members?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_remove_members() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_members]" id="tbex-options-tweaks-remove_members">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_members' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_members' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_members]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - string "Role" (user role) */
				__( 'This tweak removes the %s sub-item from the New Content Group of the Toolbar. This saves a bit more space for other items in this group.', 'toolbar-extras' ),
				__( 'Role', 'toolbar-extras' )
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Cobalt Apps?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_cobaltapps() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_cobaltapps]" id="tbex-options-tweaks-remove_cobaltapps">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_cobaltapps' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_cobaltapps' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_cobaltapps]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - label of our plugin's main group (default: "Build Group") */
				__( 'This tweak removes the top-level Toolbar link including sub-items on the frontend as Toolbar Extras already places those links as a sub-item under the Site Group and %s Group anyways.', 'toolbar-extras' ),
				ddw_tbex_string_main_item()
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Custom CSS Pro?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_customcsspro() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_customcsspro]" id="tbex-options-tweaks-remove_customcsspro">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_customcsspro' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_customcsspro' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_customcsspro]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - label of our plugin's main group (default: "Build Group") */
				__( 'This tweak removes the top-level Toolbar link on the frontend as Toolbar Extras already places this link as a sub-item under the %s Group anyways.', 'toolbar-extras' ),
				ddw_tbex_string_main_item()
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Easy Updates Manager?
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_easy_um() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_easy_um]" id="tbex-options-tweaks-remove_easy_um">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_easy_um' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_easy_um' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_easy_um]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - label of a Toolbar Group, "Site Group" */
				__( 'This tweak removes the top-level Toolbar items as Toolbar Extras already places those links as a sub-items under the %s Group anyways.', 'toolbar-extras' ),
				__( 'Site Group', 'toolbar-extras' )
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Admin Page Spider (Pro Pack)?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_apspider() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_apspider]" id="tbex-options-tweaks-remove_apspider">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_apspider' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_apspider' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_apspider]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - label of our plugin's main group (default: "Build Group") */
				__( 'This tweak removes the Toolbar sub-item from the Site Group as Toolbar Extras already places those quick links as sub-items under Site Group as well as the %s Group anyways.', 'toolbar-extras' ),
				ddw_tbex_string_main_item()
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Multisite Toolbar Additions - Site Extend Group?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_remove_mstba_siteextgroup() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_mstba_siteextgroup]" id="tbex-options-tweaks-remove_mstba_siteextgroup">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_mstba_siteextgroup' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_mstba_siteextgroup' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_mstba_siteextgroup]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the items of the "Site Extend Group" as Toolbar Extras already places a lot of these or similar links as sub-items under Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * 4th section: Translations bevavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Unload the Elementor (Pro) translations?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_unload_td_elementor() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	$domains = ddw_tbex_is_elementor_pro_active() ? '<code>elementor, elementor-pro</code>' : '<code>elementor</code>';

	?>
		<select class="tbex-input" name="tbex-options-tweaks[unload_td_elementor]" id="tbex-options-tweaks-unload_td_elementor">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'unload_td_elementor' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'unload_td_elementor' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[unload_td_elementor]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for Elementor, and if active also for Elementor Pro, so it falls back to the English default strings.', 'toolbar-extras' ); ?>
		</p>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - text domain(s), 'elementor' (and 'elementor-pro') */
				__( 'Effected text domains: %s', 'toolbar-extras' ),
				$domains
			); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Unload the Toolbar Extras translations?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_unload_td_toolbar_extras() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[unload_td_toolbar_extras]" id="tbex-options-tweaks-unload_td_toolbar_extras">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'unload_td_toolbar_extras' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'unload_td_toolbar_extras' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[unload_td_toolbar_extras]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for Toolbar Extras, so it falls back to the English default strings.', 'toolbar-extras' ); ?>
		</p>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - a text domain string, 'toolbar-extras' */
				__( 'Effected text domain: %s', 'toolbar-extras' ),
				'<code>toolbar-extras</code>'
			); ?>
		</p>
	<?php

}  // end function


/**
 * 5th section: Page Builder bevavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Display Theme Builder item in Build Group?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_display_elementor_tbuilder() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[display_elementor_tbuilder]" id="tbex-options-tweaks-display_elementor_tbuilder">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_elementor_tbuilder' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_elementor_tbuilder' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[display_elementor_tbuilder]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the Theme Builder item from the Build Group. The links are also covered in the Elementor Library item.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display Popups item in Build Group?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_display_elementor_popups() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[display_elementor_popups]" id="tbex-options-tweaks-display_elementor_popups">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_elementor_popups' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_elementor_popups' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[display_elementor_popups]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the Popups item from the Build Group. The links are also covered in the Elementor Library item.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove WordPress Widgets from Elementor Live Editor?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_remove_elementor_wpwidgets() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select class="tbex-input" name="tbex-options-tweaks[remove_elementor_wpwidgets]" id="tbex-options-tweaks-remove_elementor_wpwidgets">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_elementor_wpwidgets' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_elementor_wpwidgets' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_elementor_wpwidgets]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the WordPress Widgets from the Elementor Live Editor (within the left-hand Elementor Panel).', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function
