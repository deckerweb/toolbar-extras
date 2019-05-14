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
 * Tab General - 1st settings section: Main item - Description.
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
 * Tab General - *optional* 1st settings section: Fallback item - Description.
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_section_info_fallback_item() {

	?>
		<p>
			<?php _e( 'Preferences of the fallback (main) item added by the plugin - top level in Toolbar.', 'toolbar-extras' ); ?>
		</p>
		<p>
			<?php _e( 'Note: This fallback context is shown as you currently have no supported Page Builder installed and/ or activated.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 2nd settings section: Default Page Builder - Description.
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_section_info_page_builder() {

	?>
		<p>
			<?php _e( 'Set a default Page Builder - or none at all.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 3rd settings section: Page Builder name - Description.
 *
 * @since 1.0.0
 * @since 1.4.0 Generalized for more Page Builders.
 */
function ddw_tbex_settings_section_info_builder_name() {

	// tbex-desc-elementor-name
	?>
		<p class="tbex-desc-builder-name">
			<?php _e( 'Name of the set default Page Builder throughout some places of the Toolbar/ this plugin.', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 4th settings section: Display or not - Description.
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
 * Tab General - 5th settings section: Block Editor support - Description.
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_section_info_blockeditor_support() {

	$status_blockeditor = ( ddw_tbex_is_block_editor_active() && ddw_tbex_is_block_editor_wanted() ) ? ' plugin-blockeditor-preface' : ' plugin-inactive';

	?>
		<p class="tbex-setting-conditional<?php echo $status_blockeditor; ?>">
			<?php _e( 'Use special enhancements and tweaks for an improved Block Editor support?', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Tab General - 6th settings section: Demo imports - Description.
 *
 * @since 1.0.0
 * @since 1.4.0 Enhanced descriptions with more supported entities.
 */
function ddw_tbex_settings_section_info_demo_import() {

	?>
		<p>
			<?php _e( 'Use Demo Import/ Site Browser Items or not?', 'toolbar-extras' ); ?>
		</p>
		<p>
			<?php echo sprintf(
				/* translators: %1$s - List of supported Themes (names) / %2$s - Name of supported plugin */
				__( 'Currently supported for the Themes %1$s and the plugins %2$s.', 'toolbar-extras' ),
				'<em>Astra, OceanWP, GeneratePress, Customify, Phlox, Kava Pro (CrocoBlock), BuildWall, Mai Child Themes (Genesis)</em>',
				'<em>One Click Demo Import, Envato Elements Template Kits</em>'
			); ?> (<?php _e( 'Note: These settings are only in effect once a supported entity is active and installed.'); ?>)
		</p>
	<?php

}  // end function


/**
 * Tab General - 7th settings section: Link behavior - Description.
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
 * Tab General - 8th settings section: Admin Toolbar menu - Description.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_meta_target()
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
				sprintf(
					'<a href="%1$s">%2$s</a>',
					esc_url( admin_url( 'nav-menus.php' ) ),
					__( 'Menus admin page', 'toolbar-extras' )
				),
				sprintf(
					'<a href="%1$s" target="%3$s" rel="noopener noreferrer">%2$s</a>',
					ddw_tbex_customizer_focus( 'panel', 'nav_menus' ),
					__( 'via the Customizer', 'toolbar-extras' ),
					ddw_tbex_meta_target()
				)
			); ?>
		</p>
	<?php

}  // end function



/**
 * 2) All SETTING FIELDS callbacks (rendering)
 * -----------------------------------------------------------------------------
 */

/**
 * 1st section: Main item:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Dashicon picker): Main Item Icon
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_main_item_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-general-main_item_icon" name="tbex-options-general[main_item_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'main_item_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-general-main_item_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-general[main_item_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'main_item_icon' ]
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
						'<code><span class="dashicons-before dashicons-text"></span> dashicons-text</code>'
					);
				?>
			</p>
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
		<input type="text" class="regular-text tbex-input" id="tbex-options-general-main_item_name" name="tbex-options-general[main_item_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'main_item_name' ] ); ?>" />
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
 * Setting (Input, URL): Main Item URL
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_get_pagebuilders()
 * @uses ddw_tbex_custom_url_test()
 * @uses ddw_tbex_string_no_custom_url()
 * @uses ddw_tbex_string_ensure_input_https()
 */
function ddw_tbex_settings_cb_main_item_url() {

	$tbex_options = get_option( 'tbex-options-general' );

	/** Build default link, based on default Page Builder */
	$default_builder = ddw_tbex_get_default_pagebuilder();
	$all_builders    = (array) ddw_tbex_get_pagebuilders();

	$default_link = sprintf(
		'<a href="%s">%s</a>',
		isset( $all_builders[ $default_builder ][ 'admin_url' ] ) ? esc_url( $all_builders[ $default_builder ][ 'admin_url' ] ) : '#',
		__( 'Page Builder Admin URL', 'toolbar-extras' )
	);

	?>
		<input type="url" class="regular-text tbex-input" id="tbex-options-general-main_item_url" name="tbex-options-general[main_item_url]" placeholder="https://" value="<?php echo esc_url( $tbex_options[ 'main_item_url' ] ); ?>" /> <?php echo ddw_tbex_custom_url_test( 'general', 'main_item_url' ); ?>
		<label for="tbex-options-general[main_item_url]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					ddw_tbex_string_no_custom_url()
				); ?>
			</span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - string "profile URL" (linked) */
				__( 'When you let the above field empty the default %s will be used. Only when you enter a valid custom URL, that will actually be used. That could be a full external URL or even a (full) frontend or backend URL from your WordPress install. In most cases it should be efficient to use the default behavior.', 'toolbar-extras' ),
				$default_link
			); ?>
		</p>
		<p class="description">
			<?php echo ddw_tbex_string_ensure_input_https(); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Main Item link target
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_main_item_target() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[main_item_target]" id="tbex-options-general-main_item_target">
			<option value="_self" <?php selected( sanitize_key( $tbex_options[ 'main_item_target' ] ), '_self' ); ?>><?php _e( 'Same Tab/ Window', 'toolbar-extras' ); ?></option>
			<option value="_blank" <?php selected( sanitize_key( $tbex_options[ 'main_item_target' ] ), '_blank' ); ?>><?php _e( 'New Tab/ Window', 'toolbar-extras' ); ?></option>
		</select>
		<label for="tbex-options-general[main_item_target]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . __( 'Same Tab/ Window', 'toolbar-extras' ) . '</code>' ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Number): Main Item Priority
 *
 * @since 1.0.0
 * @since 1.4.0 Enhanced setting's description.
 *
 * @uses ddw_tbex_get_info_link()
 */
function ddw_tbex_settings_cb_main_item_priority() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="number" class="small-text tbex-input" id="tbex-options-general-main_item_priority" name="tbex-options-general[main_item_priority]" value="<?php echo absint( $tbex_options[ 'main_item_priority' ] ); ?>" step="1" min="0" />
		<label for="tbex-options-general[main_item_priority]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>71</code>' ); ?></span>
		</label>
		<p class="description tbex-align-middle">
			<?php echo sprintf(
				__( 'The default value means display directly after the New Content %s section.', 'toolbar-extras' ),
				'(<span class="dashicons-before dashicons-plus tbex-align-middle tbex-desc-newcontent"></span> ' . __( 'New', 'toolbar-extras' ) . ')'
			); ?> <?php _e( 'The smaller the value gets the more on the left the item will be displayed.', 'toolbar-extras' ); ?> <?php echo sprintf(
				/* translators: 1 - linked label, "Toolbar Groups within the Admin" / 2 - linked label, "Toolbar Groups on the Frontend" */
				__( 'See the attached image links to get the whole thing visually: %1$s and %2$s.', 'toolbar-extras' ),
				ddw_tbex_get_info_link( 'url_tb_admin', esc_html__( 'Toolbar Groups within the Admin', 'toolbar-extras' ), 'dashicons-before dashicons-external tbex-inline' ),
				ddw_tbex_get_info_link( 'url_tb_frontend', esc_html__( 'Toolbar Groups on the Frontend', 'toolbar-extras' ), 'dashicons-before dashicons-external tbex-inline' )
			); ?>
		</p>
	<?php

}  // end function


/**
 * OPTIONAL: 1st section: Fallback (Main) item:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Dashicon picker): Fallback (Main) Item Icon
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_fallback_item_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-general-fallback_item_icon" name="tbex-options-general[fallback_item_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'fallback_item_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-general-fallback_item_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-general[fallback_item_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'fallback_item_icon' ]
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
						'<code><span class="dashicons-before dashicons-text"></span> dashicons-text</code>'
					);
				?>
			</p>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, Text): Fallback (Main) Item Name
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_fallback_item_name() {

	$tbex_options = get_option( 'tbex-options-general' );

	$default_fallback = sprintf(
		'<code>%s</code>',
		/* translators: Toolbar main item, fallback if no supported Page Builder active */
		_x(
			'Customize',
			'Toolbar main item, fallback if no supported Page Builder active',
			'toolbar-extras'
		)
	);

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-general-fallback_item_name" name="tbex-options-general[fallback_item_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'fallback_item_name' ] ); ?>" />
		<label for="tbex-options-general[fallback_item_name]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					$default_fallback
				); ?>
			</span>
		</label>
	<?php

}  // end function


/**
 * Setting (Input, URL): Fallback (Main) Item URL
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_custom_url_test()
 * @uses ddw_tbex_string_no_custom_url()
 * @uses ddw_tbex_string_ensure_input_https()
 */
function ddw_tbex_settings_cb_fallback_item_url() {

	$tbex_options = get_option( 'tbex-options-general' );

	$default_link = sprintf(
		'<a href="%s" target="%s">%s</a>',
		ddw_tbex_customizer_start(),
		ddw_tbex_meta_target(),
		__( 'Customizer URL', 'toolbar-extras' )
	);

	?>
		<input type="url" class="regular-text tbex-input" id="tbex-options-general-fallback_item_url" name="tbex-options-general[fallback_item_url]" placeholder="https://" value="<?php echo esc_url( $tbex_options[ 'fallback_item_url' ] ); ?>" /> <?php echo ddw_tbex_custom_url_test( 'general', 'fallback_item_url' ); ?>
		<label for="tbex-options-general[fallback_item_url]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					ddw_tbex_string_no_custom_url()
				); ?>
			</span>
		</label>
		<p class="description">
			<?php echo sprintf(
				/* translators: %s - string "profile URL" (linked) */
				__( 'When you let the above field empty the default %s will be used. Only when you enter a valid custom URL, that will actually be used. That could be a full external URL or even a (full) frontend or backend URL from your WordPress install. In most cases it should be efficient to use the default behavior.', 'toolbar-extras' ),
				$default_link
			); ?>
		</p>
		<p class="description">
			<?php echo ddw_tbex_string_ensure_input_https(); ?>
		</p>
	<?php

}  // end function


/**
 * 2nd section: Default Page Builder:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Set default Page Builder
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_pagebuilders()
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_is_block_editor_wanted()
 * @uses ddw_tbex_use_block_editor_support()
 */
function ddw_tbex_settings_cb_default_page_builder() {

	$tbex_options = get_option( 'tbex-options-general' );

	/**
	 * Build the select option fields
	 *   'foreach' logic in markup below
	 */
	$all_builders = ddw_tbex_get_pagebuilders();

	/** Default setting -> label */
	$default = $all_builders[ 'default-none' ][ 'label' ];

	if ( ddw_tbex_is_elementor_active() ) {

		$default = $all_builders[ 'elementor' ][ 'label' ];

	} elseif ( ddw_tbex_is_block_editor_wanted() && ddw_tbex_use_block_editor_support() ) {

		$default = $all_builders[ 'block-editor' ][ 'label' ];

	}  // end if

	?>
		<select class="tbex-input" name="tbex-options-general[default_page_builder]" id="tbex-options-general-default_page_builder">
			<?php foreach ( $all_builders as $builder => $builder_data ) :
					if ( 'block-editor' === $builder
						&& ( ! ddw_tbex_is_block_editor_wanted() || ! ddw_tbex_use_block_editor_support() )
					) :
						continue;
					endif;
			?>
				<option value="<?php echo sanitize_key( $builder ); ?>" <?php selected( sanitize_key( $tbex_options[ 'default_page_builder' ] ), sanitize_key( $builder ) ); ?>><?php echo $builder_data[ 'label' ]; ?></option>
			<?php endforeach; ?>
		</select>
		<label for="tbex-options-general[default_page_builder]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), '<code>' . $default . '</code>' ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This is for items and labels appearing with the the Main Item and its sub items.', 'toolbar-extras' ); ?>
		</p>
		<p class="description">
			<?php _e( 'When no Page Builder is registered, the fallback mode for the Main Item gets active automatically.', 'toolbar-extras' ); ?>
		</p>	
	<?php

}  // end function


/**
 * 3rd section: Elementor name:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Input, Text): Elementor Name
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_elementor_name() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-general-elementor_name" name="tbex-options-general[elementor_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'elementor_name' ] ); ?>" />
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
 * Setting (Input, Text): Block Editor Name
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_block_editor_name() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="text" class="regular-text tbex-input" id="tbex-options-general-block_editor_name" name="tbex-options-general[block_editor_name]" value="<?php echo wp_filter_nohtml_kses( $tbex_options[ 'block_editor_name' ] ); ?>" />
		<label for="tbex-options-general[block_editor_name]">
			<span class="description">
				<?php echo sprintf(
					__( 'Default: %s', 'toolbar-extras' ),
					'<code>' . __( 'Block Editor', 'toolbar-extras' ) . '</code>'
				); ?>
			</span>
		</label>
	<?php

}  // end function


/**
 * 4th section: Display or not:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Display Resources Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_resources() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[display_items_resources]" id="tbex-options-general-display_items_resources">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_resources' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_resources' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_resources]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_theme]" id="tbex-options-general-display_items_theme">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_theme' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_theme' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_theme]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_plugins]" id="tbex-options-general-display_items_plugins">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_plugins' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_plugins' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_plugins]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_addons]" id="tbex-options-general-display_items_addons">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_addons' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_addons' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_addons]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'All items of the supported Add-On Plugins for the Page Builder', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): Display WP Comments Items
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_display_items_wpcomments() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[display_items_wpcomments]" id="tbex-options-general-display_items_wpcomments">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_wpcomments' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_wpcomments' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_wpcomments]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Additional and tweaked sub items', 'toolbar-extras' ); ?>
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
		<select class="tbex-input" name="tbex-options-general[display_items_new_content]" id="tbex-options-general-display_items_new_content">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_new_content' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_new_content' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_new_content]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'Additional and tweaked sub items', 'toolbar-extras' ); ?>
		</p>
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
		<select class="tbex-input" name="tbex-options-general[display_items_site_group]" id="tbex-options-general-display_items_site_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_site_group' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_site_group' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_site_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_edit_content]" id="tbex-options-general-display_items_edit_content">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_content' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_content' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_edit_content]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_edit_menus]" id="tbex-options-general-display_items_edit_menus">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_menus' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_edit_menus' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_edit_menus]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_user_group]" id="tbex-options-general-display_items_user_group">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_user_group' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_user_group' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_user_group]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
		<select class="tbex-input" name="tbex-options-general[display_items_tbex_settings]" id="tbex-options-general-display_items_tbex_settings">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_tbex_settings' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_tbex_settings' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_tbex_settings]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * 5th section: Block Editor support:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Use Block Editor Support
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_use_blockeditor_support() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[use_blockeditor_support]" id="tbex-options-general-use_blockeditor_support">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'use_blockeditor_support' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'use_blockeditor_support' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[use_blockeditor_support]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'This will make the Block Editor available as a registered Page Builder within Toolbar Extras. So it could be used within the Main Item and optionally for other purposes.', 'toolbar-extras' ); ?>
		</p>
		<?php if ( defined( 'TBEX_USE_BLOGK_EDITOR_SUPPORT' ) ) : ?>
			<p class="notice notice-warning inline description">
				<?php echo sprintf(
					/* translators: %s - a PHP constant, "TBEX_USE_BLOGK_EDITOR_SUPPORT" */
					__( 'Please note: Currently the constant %s is defined (this could be in your WP-Config, in your Theme function file, in a plugin or via a code snippet). Since this constant has a higher priority it will override this setting here!', 'toolbar-extras' ),
					'<code>TBEX_USE_BLOGK_EDITOR_SUPPORT</code>'
				); ?>
			</p>
		<?php endif; ?>
	<?php

}  // end function


/**
 * Setting (Select): Display Block Editor Add-Ons
 *
 * @since 1.4.0
 */
function ddw_tbex_settings_cb_display_blockeditor_addons() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[display_blockeditor_addons]" id="tbex-options-general-display_blockeditor_addons">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_blockeditor_addons' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_blockeditor_addons' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_blockeditor_addons]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php _e( 'If enabled the Block Editor Add-On support gets loaded side by side with any other Page Builder\'s Add-Ons (because it is the default editor in WordPress).', 'toolbar-extras' ); ?>
		</p>
	<?php

}  // end function


/**
 * 6th section: Demo imports:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Display Demo Import Items
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_display_items_demo_import() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[display_items_demo_import]" id="tbex-options-general-display_items_demo_import">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_items_demo_import' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_items_demo_import' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_items_demo_import]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
	<?php

}  // end function


/**
 * Setting (Dashicon picker): Demo Import Icon
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_demo_import_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-general-demo_import_icon" name="tbex-options-general[demo_import_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'demo_import_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-general-demo_import_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-general[demo_import_icon]">
			<p class="description">
				<?php
					$current = sprintf(
						'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
						$tbex_options[ 'demo_import_icon' ]
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
						'<code><span class="dashicons-before dashicons-visibility"></span> dashicons-visibility</code>'
					);
				?>
			</p>
		</label>
	<?php

}  // end function


/**
 * 7th section: Link behavior:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Select): Remove link title attributes?
 *
 * @since 1.2.0
 */
function ddw_tbex_settings_cb_display_title_attributes() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[display_title_attributes]" id="tbex-options-general-display_title_attributes">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'display_title_attributes' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'display_title_attributes' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[display_title_attributes]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php
				/* translators: %1$s - Word "No", %2$s - Plugin name "Toolbar Extras */
				echo sprintf( __( 'Determine if the link title attributes (Tooltips) should be used within the Toolbar or not. When set to %1$s then no title attribute will be used in the source code for all links in the Toolbar, including from this plugin, %2$s.', 'toolbar-extras' ), ddw_tbex_string_no( 'return', 'code' ), ddw_tbex_string_toolbar_extras() );
			?>
		</p>
	<?php

}  // end function


/**
 * Setting (Select): External links _blank target?
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_link_target_description()
 */
function ddw_tbex_settings_cb_external_links_blank() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[external_links_blank]" id="tbex-options-general-external_links_blank">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'external_links_blank' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'external_links_blank' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[external_links_blank]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
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
 * @uses ddw_tbex_string_link_target_description()
 */
function ddw_tbex_settings_cb_builder_links_blank() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<select class="tbex-input" name="tbex-options-general[builder_links_blank]" id="tbex-options-general-builder_links_blank">
			<option value="yes" <?php selected( sanitize_key( $tbex_options[ 'builder_links_blank' ] ), 'yes' ); ?>><?php ddw_tbex_string_yes( 'echo' ); ?></option>
			<option value="no" <?php selected( sanitize_key( $tbex_options[ 'builder_links_blank' ] ), 'no' ); ?>><?php ddw_tbex_string_no( 'echo' ); ?></option>
		</select>
		<label for="tbex-options-general[builder_links_blank]">
			<span class="description"><?php echo sprintf( __( 'Default: %s', 'toolbar-extras' ), ddw_tbex_string_yes( 'return', 'code' ) ); ?></span>
		</label>
		<p class="description">
			<?php ddw_tbex_string_link_target_description(); ?>
		</p>
	<?php

}  // end function


/**
 * 8th section: Admin Toolbar menu:
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/**
 * Setting (Number): Admin Toolbar Menu Priority
 *
 * @since 1.0.0
 */
function ddw_tbex_settings_cb_tbex_tbmenu_priority() {

	$tbex_options = get_option( 'tbex-options-general' );

	?>
		<input type="number" class="small-text tbex-input" id="tbex-options-general-tbex_tbmenu_priority" name="tbex-options-general[tbex_tbmenu_priority]" value="<?php echo absint( $tbex_options[ 'tbex_tbmenu_priority' ] ); ?>" step="1" min="0" />
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
 *
 * @uses ddw_tbex_string_none_empty()
 * @uses ddw_tbex_string_choose_icon()
 */
function ddw_tbex_settings_cb_tbex_tbmenu_icon() {

	$tbex_options = get_option( 'tbex-options-general' );

	$current = ddw_tbex_string_none_empty();

	if ( ! empty( $tbex_options[ 'tbex_tbmenu_icon' ] ) ) {
		$current = sprintf(
			'<code><span class="dashicons-before %1$s"></span> %1$s</code>',
			$tbex_options[ 'tbex_tbmenu_icon' ]
		);
	}

	?>
		<input class="regular-text tbex-input" type="text" id="tbex-options-general-tbex_tbmenu_icon" name="tbex-options-general[tbex_tbmenu_icon]" value="<?php echo strtolower( sanitize_html_class( $tbex_options[ 'tbex_tbmenu_icon' ] ) ); ?>" />
		<button class="button dashicons-picker" type="button" data-target="#tbex-options-general-tbex_tbmenu_icon"><span class="dashicons-before dashicons-plus-alt"></span> <?php ddw_tbex_string_choose_icon( 'echo' ); ?></button>
		<br />
		<label for="tbex-options-general[tbex_tbmenu_icon]">
			<p class="description">
				<?php
					echo sprintf(
						/* translators: %s - a Dashicons CSS class name */
						__( 'Current: %s', 'toolbar-extras' ),
						$current
					);
					echo '<br />';
					echo sprintf(
						/* translators: %s - the string "None (empty)" */
						__( 'Default: %s', 'toolbar-extras' ),
						ddw_tbex_string_none_empty()
					);
				?>
			</p>
		</label>
	<?php

}  // end function
