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
 */
function ddw_tbex_settings_section_info_plugins() {

	?>
		<p>
			<?php _e( 'Re-hook or remove Toolbar items from certain plugins. These settings below will only appear below if the supported plugins are installed and activated.', 'toolbar-extras' ); ?>
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
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
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