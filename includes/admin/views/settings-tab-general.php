<?php

// includes/admin/views/settings-tab-general

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
 * Tab General - 1st settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_main_item() {

	?>
		<p>
			<?php _e( 'Preferences of the main item added by the plugin - top level in Toolbar.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 2nd settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_elementor() {

	?>
		<p>
			<?php _e( 'Name of Elementor Page Builder throughout some places of the Toolbar/ this plugin.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 3rd settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_display() {

	?>
		<p>
			<?php _e( 'Decide which group of items should be shown in the Toolbar - or not.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 4th settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_demo_import() {

	?>
		<p>
			<?php _e( 'Use Demo Import/ Site Browser Items or not?', 'toolbar-extras' ); ?>
		</p>
		<p>
			<?php echo sprintf(
				/* translators: %1$s - List of supported Themes (names) / %2$s - Name of supported plugin */
				__( 'Currently supported for the Themes %1$s and the plugin %2$s.', 'toolbar-extras' ),
				'<em>Astra, OceanWP, GeneratePress</em>',
				'<em>One Click Demo Import</em>'
			); ?> (<?php _e( 'Note: These settings are only in effect once a supported entity is active and installed.'); ?>)
		</p>
	<?php

}  // end function


/**
 * Tab General - 5th settings section: Description.
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_section_info_links() {

	?>
		<p>
			<?php _e( 'Decide if link title attributes (Tooltips) should be displayed and which target should be used for external links.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 6th settings section: Description.
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_customizer_focus()
 */
function ddw_tbex_settings_section_info_tbexmenu() {

	?>
		<p>
			<?php _e( 'Change priority and set a optional icon for this additional menu.', 'toolbar-extras' ); ?>
		</p>
		<p>
			<?php echo sprintf(
				/* translators: %1$s - String "Menus admin page" / %2$s - String "via the Customizer" */
				__( 'The menu itself can be build and edited on the %1$s or also %2$s.', 'toolbar-extras'),
				sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'nav-menus.php' ) ), __( 'Menus admin page', 'toolbar-extras' ) ),
				sprintf( '<a href="%1$s">%2$s</a>', ddw_tbex_customizer_focus( 'panel', 'nav_menus' ), __( 'via the Customizer', 'toolbar-extras' ) )
			); ?>
		</p>
	<?php

}  // end function



/**
 * 2) All SETTING FIELDS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * Setting (Dashicon picker): Main Item Icon
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_main_item_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input class="regular-text" type="text" id="tbex-options-general-main_item_icon" name="tbex-options-general[main_item_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'main_item_icon' ] ) ); ?>" />
		<input class="button dashicons-picker" type="button" data-target="#tbex-options-general-main_item_icon" value="<?php _e( 'Choose Icon', 'toolbar-extras' ); ?>" />
		<br />
		<label for="tbex-options-general[main_item_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'main_item_icon' ]
					);

					echo sprintf(
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					'<code><span class="dashicons-before dashicons-text"></span> dashicons-text</code>'
					);
				?>
			</span>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, Text): Main Item Name
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_main_item_name() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="text" class="regular-text" id="tbex-options-general-main_item_name" name="tbex-options-general[main_item_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'main_item_name' ] ); ?>" />
		<label for="tbex-options-general[main_item_name]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					'<code>' . __( 'Build', 'toolbar-extras' ) . '</code>'
				); ?>
			</span>
		</label>
	<?php

}  // end function


/**
 * Setting (Number): Main Item Priority
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_main_item_priority() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="number" class="small-text" id="tbex-options-general-main_item_priority" name="tbex-options-general[main_item_priority]" value="<?php echo absint( $tbex_options[ 'main_item_priority' ] ); ?>" step="1" min="0" />
		<label for="tbex-options-general[main_item_priority]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>71</code>' ); ?></span>
		</label>
		<p class="description tbex-align-middle">
			<?php echo sprintf( __( 'The default value means display directly after the New Content %s section.', 'toolbar-extras' ), '(<span class="dashicons-before dashicons-plus tbex-align-middle tbex-desc-newcontent"></span> ' . __( 'New', 'toolbar-extras' ) . ')' ); ?> <?php _e( 'The smaller the value gets the more on the left the item will be displayed.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Input, Text): Elementor Name
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_elementor_name() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="text" class="regular-text" id="tbex-options-general-elementor_name" name="tbex-options-general[elementor_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'elementor_name' ] ); ?>" />
		<label for="tbex-options-general[elementor_name]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					'<code>' . __( 'Elementor', 'toolbar-extras' ) . '</code>'
				); ?>
			</span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display Resources Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_resources() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_resources]" id="tbex-options-general-display_items_resources">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_resources' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_resources' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_resources]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'All external resource links for the Page Builder, supported Themes and Plugins', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display Theme Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_theme() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_theme]" id="tbex-options-general-display_items_theme">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_theme' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_theme' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_theme]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'All items of the current active theme', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display Plugin's Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_plugins() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_plugins]" id="tbex-options-general-display_items_plugins">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_plugins' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_plugins' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_plugins]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'All items of the supported general plugins', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display Add-On's Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_addons() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_addons]" id="tbex-options-general-display_items_addons">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_addons' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_addons' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_addons]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'All items of the supported Add-On Plugins for the Page Builder', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display New Content Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_new_content() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_new_content]" id="tbex-options-general-display_items_new_content">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_new_content' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_new_content' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_new_content]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display Site Group Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_site_group() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_site_group]" id="tbex-options-general-display_items_site_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_site_group' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_site_group' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_site_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display Edit/ View Content Items
 *
 * @since 1.3.0
 */
function ddw_tbex_settings_cb_display_items_edit_content() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_edit_content]" id="tbex-options-general-display_items_edit_content">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_content' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_content' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_edit_content]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display Edit Menus Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_edit_menus() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_edit_menus]" id="tbex-options-general-display_items_edit_menus">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_menus' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_menus' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_edit_menus]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display User Group Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_user_group() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_user_group]" id="tbex-options-general-display_items_user_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_user_group' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_user_group' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_user_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display TBEX Settings Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_tbex_settings() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_tbex_settings]" id="tbex-options-general-display_items_tbex_settings">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_tbex_settings' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_tbex_settings' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_tbex_settings]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Display Demo Import Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_demo_import() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_items_demo_import]" id="tbex-options-general-display_items_demo_import">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_demo_import' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_demo_import' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_demo_import]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Dashicon picker): Demo Import Icon
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_demo_import_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input class="regular-text" type="text" id="tbex-options-general-demo_import_icon" name="tbex-options-general[demo_import_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'demo_import_icon' ] ) ); ?>" />
		<input class="button dashicons-picker" type="button" data-target="#tbex-options-general-demo_import_icon" value="<?php _e( 'Choose Icon', 'toolbar-extras' ); ?>" />
		<br />
		<label for="tbex-options-general[demo_import_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'demo_import_icon' ]
					);

					echo sprintf(
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					'<code><span class="dashicons-before dashicons-visibility"></span> dashicons-visibility</code>'
					);
				?>
			</span>
		</label>
	<?php

}  // end function


/**
 * Setting (Select): Remove link title attributes?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_display_title_attributes() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[display_title_attributes]" id="tbex-options-general-display_title_attributes">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_title_attributes' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_title_attributes' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[display_title_attributes]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php
				/* translators: %1$s - Word "No", %2$s - Plugin name "Toolbar Extras */
				echo sprintf( __( 'Determine if the link title attributes (Tooltips) should be used within the Toolbar or not. When set to %1$s then no title attribute will be used in the source code for all links in the Toolbar, including from this plugin, %2$s.', 'toolbar-extras' ), '<code>' . __( 'No', 'toolbar-extras' ) . '</code>', __( 'Toolbar Extras', 'toolbar-extras' ) );
			?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): External links _blank target?
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_string_link_target_description()
 */
function ddw_tbex_settings_cb_external_links_blank() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[external_links_blank]" id="tbex-options-general-external_links_blank">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'external_links_blank' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'external_links_blank' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[external_links_blank]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php ddw_tbex_string_link_target_description(); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): "Create with Builder" links _blank target?
 *
 * @since 1.3.0
 *
 * @uses  ddw_tbex_string_link_target_description()
 */
function ddw_tbex_settings_cb_builder_links_blank() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select name="tbex-options-general[builder_links_blank]" id="tbex-options-general-builder_links_blank">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'builder_links_blank' ] ), 'yes' ); ?>><?php _e( 'Yes', 'toolbar-extras' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'builder_links_blank' ] ), 'no' ); ?>><?php _e( 'No', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[builder_links_blank]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Yes', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php ddw_tbex_string_link_target_description(); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Number): Admin Toolbar Menu Priority
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_tbex_tbmenu_priority() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="number" class="small-text" id="tbex-options-general-tbex_tbmenu_priority" name="tbex-options-general[tbex_tbmenu_priority]" value="<?php echo absint( $tbex_options[ 'tbex_tbmenu_priority' ] ); ?>" step="1" min="0" />
		<label for="tbex-options-general[tbex_tbmenu_priority]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>9999</code>' ); ?></span>
		</label>
		<p class="description tbex-align-middle">
			<?php _e( 'The default value sets this additional Toolbar menu at the last item of the left part of the Toolbar.', 'toolbar-extras' ); ?> <?php _e( 'The smaller the value gets the more on the left the item will be displayed.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Dashicon picker): Admin Toolbar Menu Icon
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_tbex_tbmenu_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	$current = __( 'None (empty)', 'toolbar-extras' );

	if ( ! empty( $tbex_options[ 'tbex_tbmenu_icon' ] ) ) {
		$current = sprintf(
			'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
			$tbex_options[ 'tbex_tbmenu_icon' ]
		);
	}

	?>
		<input class="regular-text" type="text" id="tbex-options-general-tbex_tbmenu_icon" name="tbex-options-general[tbex_tbmenu_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'tbex_tbmenu_icon' ] ) ); ?>" />
		<input class="button dashicons-picker" type="button" data-target="#tbex-options-general-tbex_tbmenu_icon" value="<?php _e( 'Choose Icon', 'toolbar-extras' ); ?>" />
		<br />
		<label for="tbex-options-general[tbex_tbmenu_icon]">
			<p class="description">
				<?php
					echo sprintf(
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					__( 'None (empty)', 'toolbar-extras' )
					);
				?>
			</span>
		</label>
	<?php

}  // end function