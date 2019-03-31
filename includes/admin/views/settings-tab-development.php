<?php

// includes/admin/views/settings-tab-development

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
 * Tab Development - 1st settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_local_dev() {

	?>
		<p>
			<?php _e( 'When in a Local Development Environment use some elegant tweaks for the Toolbar.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab Development - 2nd settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_dev_mode() {

	?>
		<p>
			<?php _e( 'When in a Development Mode use some special links and tools geared towards code-savvy developers.', 'toolbar-extras' ); ?>
			<br /><?php _e( 'Most of the additional links are displayed in the Site Group.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function



/**
 * 2) All SETTING FIELDS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * Setting (Select): Is Local Dev
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_is_local_dev() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<select class="tbex-input tbex-is-local-dev" name="tbex-options-development[is_local_dev]" id="tbex-options-development-is_local_dev">
			<option value="auto" <?php selected( sanitize_key( $tbex_options[ 'is_local_dev' ] ), 'auto' ); ?>><?php _e( 'Auto', 'toolbar-extras' ); ?></option>
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'is_local_dev' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'is_local_dev' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-development[is_local_dev]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Auto', 'toolbar-extras' ) . '</code>' ); echo '<br />' . sprintf(
				/* translators: %s - Status of setting, "Auto" */
				__( 'Note: %s means automatic detection based on your current server/domain values.', 'toolbar-extras' ), __( 'Auto', 'toolbar-extras' )
				); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Color Picker): Local Dev BG Color for Toolbar
 *
 * @since 1.0.0
 * @since 1.4.0 Added action to the label for color examples.
 * @since 1.4.2 Made color items completely dynamic, including the default label.
 */
function ddw_tbex_settings_cb_local_dev_bg_color() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input type="text" class="tbex-color-picker tbex-input" id="tbex-options-development-local_dev_bg_color" name="tbex-options-development[local_dev_bg_color]" value="<?php echo sanitize_hex_color( $tbex_options[ 'local_dev_bg_color' ] ); ?>" data-default-color="#0073aa" />
		<?php
			do_action( 'tbex_settings_color_picker_items' );
			do_action( 'tbex_label_local_dev_color_picker' );
		?>
	<?php

}  // end function


/**
 * Setting (Dashicon picker): Local Dev Icon
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_local_dev_icon() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-development-local_dev_icon" name="tbex-options-development[local_dev_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'local_dev_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-development-local_dev_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-development[local_dev_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'local_dev_icon' ]
					);

					echo sprintf(
						/* translators: %s - a Dashicons CSS class name */
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
						/* translators: %s - a Dashicons CSS class name */
						__( 'Default: %s', 'toolbar-extras' ),
						'<code><span class="dashicons-before dashicons-warning"></span> dashicons-warning</code>'
					);
				?>
			</p>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, Text): Local Dev Name
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_local_dev_name() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-development-local_dev_name" name="tbex-options-development[local_dev_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'local_dev_name' ] ); ?>" />
		<label for="tbex-options-development[local_dev_name]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Local Development Website', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Number): Local Dev Viewport Min. Size
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_local_dev_viewport() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input type="number" class="small-text tbex-input" id="tbex-options-development-local_dev_viewport" name="tbex-options-development[local_dev_viewport]" value="<?php echo absint( $tbex_options[ 'local_dev_viewport' ] ); ?>" step="1" min="0" />
		<label for="tbex-options-development[local_dev_viewport]">
			<span class="description"><?php echo sprintf( __( 'Default: %s (in Pixel)', 'toolbar-extras' ), '<code>1030</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Browser viewport has to be equal or wider than the given size (in pixel) for the text to appear. The default should work perfectly fine for most desktops and notebooks. On small displays you want your browser real estate not to be stuffed with other things so it doesn\'t display there.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Use Dev Mode?
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_use_dev_mode() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<select class="tbex-input" name="tbex-options-development[use_dev_mode]" id="tbex-options-development-use_dev_mode">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_dev_mode' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_dev_mode' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-development[use_dev_mode]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Dashicon picker): Rapid Dev Icon
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_rapid_dev_icon() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-development-rapid_dev_icon" name="tbex-options-development[rapid_dev_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'rapid_dev_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-development-rapid_dev_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-development[rapid_dev_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'rapid_dev_icon' ]
					);

					echo sprintf(
						/* translators: %s - a Dashicons CSS class name */
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
						/* translators: %s - a Dashicons CSS class name */
						__( 'Default: %s', 'toolbar-extras' ),
						'<code><span class="dashicons-before dashicons-editor-code"></span> dashicons-editor-code</code>'
					);
				?>
			</p>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, Text): Rapid Dev Name
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_rapid_dev_name() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-development-rapid_dev_name" name="tbex-options-development[rapid_dev_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'rapid_dev_name' ] ); ?>" />
		<label for="tbex-options-development[rapid_dev_name]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Rapid Dev', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Use Element IDs (Post Type Singulars & Taxonomy Terms)?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_use_element_ids() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<select class="tbex-input" name="tbex-options-development[use_element_ids]" id="tbex-options-development-use_element_ids">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_element_ids' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_element_ids' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-development[use_element_ids]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Use additional Uploader Menus?
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_use_uploader_menus() {

	$tbex_options = get_option( 'tbex-options-development' );

	?>
		<select class="tbex-input" name="tbex-options-development[use_uploader_menus]" id="tbex-options-development-use_uploader_menus">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_uploader_menus' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_uploader_menus' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-development[use_uploader_menus]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function
