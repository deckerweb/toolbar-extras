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
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_settings_show_only_for_active_plugins()
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
 * Tab Smart Tweaks - 3rd settings section: Description.
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
	<?php

}  // end function


/**
 * Tab Smart Tweaks - 4th settings section: Description.
 *
 * @since 1.2.0
 *
 * @uses  ddw_tbex_string_settings_show_only_for_active_plugins()
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
 * Setting (Select): Frontend Toolbar Color
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_toolbar_front_color() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select name="tbex-options-tweaks[toolbar_front_color]" id="tbex-options-tweaks-toolbar_front_color">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'toolbar_front_color' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'toolbar_front_color' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[toolbar_front_color]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[use_web_group]" id="tbex-options-tweaks-use_web_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_web_group' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_web_group' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[use_web_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_wp_logo]" id="tbex-options-tweaks-remove_wp_logo">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_wp_logo' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_wp_logo' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_wp_logo]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_front_customizer]" id="tbex-options-tweaks-remove_front_customizer">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_front_customizer' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_front_customizer' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_front_customizer]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_media_newcontent]" id="tbex-options-tweaks-remove_media_newcontent">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_media_newcontent' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_media_newcontent' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_media_newcontent]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_user_newcontent]" id="tbex-options-tweaks-remove_user_newcontent">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_user_newcontent' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_user_newcontent' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_user_newcontent]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
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
		<select name="tbex-options-tweaks[rehook_gravityforms]" id="tbex-options-tweaks-rehook_gravityforms">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_gravityforms' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_gravityforms' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_gravityforms]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_smartslider]" id="tbex-options-tweaks-rehook_smartslider">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_smartslider' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_smartslider' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_smartslider]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_nextgen]" id="tbex-options-tweaks-rehook_nextgen">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_nextgen' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_nextgen' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_nextgen]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_ithsec]" id="tbex-options-tweaks-rehook_ithsec">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_ithsec' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_ithsec' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_ithsec]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_wprocket]" id="tbex-options-tweaks-rehook_wprocket">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_wprocket' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_wprocket' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_wprocket]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_autoptimize]" id="tbex-options-tweaks-rehook_autoptimize">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_autoptimize' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_autoptimize' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_autoptimize]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[rehook_swiftperformance]" id="tbex-options-tweaks-rehook_swiftperformance">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'rehook_swiftperformance' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'rehook_swiftperformance' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[rehook_swiftperformance]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_woo_posttypes]" id="tbex-options-tweaks-remove_woo_posttypes">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_woo_posttypes' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_woo_posttypes' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_woo_posttypes]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_aioseo]" id="tbex-options-tweaks-remove_aioseo">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_aioseo' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_aioseo' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_aioseo]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_updraftplus]" id="tbex-options-tweaks-remove_updraftplus">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_updraftplus' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_updraftplus' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_updraftplus]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
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
		<select name="tbex-options-tweaks[remove_members]" id="tbex-options-tweaks-remove_members">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_members' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_members' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_members]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf( __( 'This tweak removes the %s sub-item from the New Content Group of the Toolbar. This saves a bit more space for other items in this group.', 'toolbar-extras' ), __( 'Role', 'toolbar-extras' ) ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Cobalt Apps?
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_cobaltapps() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select name="tbex-options-tweaks[remove_cobaltapps]" id="tbex-options-tweaks-remove_cobaltapps">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_cobaltapps' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_cobaltapps' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_cobaltapps]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf( __( 'This tweak removes the top-level Toolbar link including sub-items on the frontend as Toolbar Extras already places those links as a sub-item under the Site Group and %s Group anyways.', 'toolbar-extras' ), ddw_tbex_string_main_item() ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Custom CSS Pro?
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_customcsspro() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select name="tbex-options-tweaks[remove_customcsspro]" id="tbex-options-tweaks-remove_customcsspro">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_customcsspro' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_customcsspro' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_customcsspro]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf( __( 'This tweak removes the top-level Toolbar link on the frontend as Toolbar Extras already places this link as a sub-item under the %s Group anyways.', 'toolbar-extras' ), ddw_tbex_string_main_item() ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Remove Admin Page Spider (Pro Pack)?
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_main_item()
 */
function ddw_tbex_settings_cb_remove_apspider() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select name="tbex-options-tweaks[remove_apspider]" id="tbex-options-tweaks-remove_apspider">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_apspider' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_apspider' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_apspider]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php echo sprintf( __( 'This tweak removes the Toolbar sub-item from the Site Group as Toolbar Extras already places those quick links as sub-items under Site Group as well as the %s Group anyways.', 'toolbar-extras' ), ddw_tbex_string_main_item() ); ?>
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
		<select name="tbex-options-tweaks[remove_mstba_siteextgroup]" id="tbex-options-tweaks-remove_mstba_siteextgroup">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_mstba_siteextgroup' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_mstba_siteextgroup' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_mstba_siteextgroup]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the items of the "Site Extend Group" as Toolbar Extras already places a lot of these or similar links as sub-items under Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Unload the Elementor (Pro) translations?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_unload_td_elementor() {

	$tbex_options = get_option( 'tbex-options-tweaks' );

	?>
		<select name="tbex-options-tweaks[unload_td_elementor]" id="tbex-options-tweaks-unload_td_elementor">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'unload_td_elementor' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'unload_td_elementor' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[unload_td_elementor]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for Elementor, and if active also for Elementor Pro, so it falls back to the English default strings.', 'toolbar-extras' ); ?>
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
		<select name="tbex-options-tweaks[unload_td_toolbar_extras]" id="tbex-options-tweaks-unload_td_toolbar_extras">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'unload_td_toolbar_extras' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'unload_td_toolbar_extras' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[unload_td_toolbar_extras]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak unloads the translations for Toolbar Extras, so it falls back to the English default strings.', 'toolbar-extras' ); ?>
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
		<select name="tbex-options-tweaks[remove_elementor_wpwidgets]" id="tbex-options-tweaks-remove_elementor_wpwidgets">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'remove_elementor_wpwidgets' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'remove_elementor_wpwidgets' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-tweaks[remove_elementor_wpwidgets]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This tweak removes the WordPress Widgets from the Elementor Live Editor (within the left-hand Elementor Panel).', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function