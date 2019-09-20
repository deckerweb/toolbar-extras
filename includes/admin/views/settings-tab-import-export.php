<?php

// includes/admin/views/settings-tab-import-export

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'tbex_before_import_export_form_table', 'ddw_tbex_settings_tab_import_export_heading' );
/**
 * Render heading & description for the "Import & Export" settings tab.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_string_toolbar_extras()
 */
function ddw_tbex_settings_tab_import_export_heading() {

	?>
		<div class="tbex-addon-header dashicons-before dashicons-controls-repeat">
			<h3 class="tbex-addon-title">
				<?php _e( 'Import &amp; Export Plugin Settings', 'toolbar-extras' ); ?>
				<span class="tbex-version"><?php echo sprintf(
					'%s v%s',
					__( 'For plugin', 'toolbar-extras' ),
					TBEX_PLUGIN_VERSION
				); ?></span>
			</h3>
			<p class="description">
				<?php echo sprintf(
					/* translators: %s - name of plugin, "Toolbar Extras" */
					__( 'Here you can export and import the settings of the %s plugin. This also applies to all currently active add-ons (if they are integrated).', 'toolbar-extras' ),
					ddw_tbex_string_toolbar_extras()
				); ?> <?php _e( 'In this way you can easily migrate the plugin or add-on settings between several websites or simply create a backup for yourself. Of course it is also possible to export or import only certain groups of settings.', 'toolbar-extras' ); ?>
			</p>
			<br /> 
		</div>
	<?php

}  // end function


add_action( 'tbex_after_import_export_form_table', 'ddw_tbex_settings_tab_import_export_admin_menu_info' );
/**
 * Info content for Admin Toolbar menus regarding export & import.
 *
 *   Note: This gets only displayed if the user has proper permissions, the
 *         Admin Toolbar menu is not disabled and our plugin menu location
 *         actually has a menu assigned to it.
 *
 * @since 1.4.7
 *
 * @uses ddw_tbex_get_menu_id_from_menu_location()
 * @uses ddw_tbex_display_items_super_admin_nav_menu()
 * @uses ddw_tbex_string_toolbar_extras()
 * @uses ddw_tbex_string_super_admin_menu_location()
 * @uses ddw_tbex_string_maybe_super_admin()
 */
function ddw_tbex_settings_tab_import_export_admin_menu_info() {

	$menu_id = ddw_tbex_get_menu_id_from_menu_location( 'tbex_menu' );

	if ( ! ddw_tbex_display_items_super_admin_nav_menu()
		|| ! is_super_admin()
		|| ( is_null( $menu_id ) || version_compare( absint( $menu_id ), '0', '<=' ) )
	) {
		return;
	}

	/** Build string for feature... */
	$string_feature = sprintf(
		/* translators: 1 - word "Admin" (for Site) or "Super Admin" (for Multisite) / 2 - label, "Import/Export" / 3 - name of the plugin, "Toolbar Extras" */
		__( 'These %1$s Toolbar Menus are not a part of the above %2$s feature, as they do not belong to the %3$s plugin\'s settings.', 'toolbar-extras' ),
		ddw_tbex_string_maybe_super_admin( 'singular' ),
		__( 'Import/Export', 'toolbar-extras' ),
		ddw_tbex_string_toolbar_extras()
	);

	$plugin_install = current_user_can( 'install_plugins' ) ? ddw_tbex_plugin_install_link( 'export-import-menus' ) : 'https://wordpress.org/plugins/export-import-menus/';
	$plugin_url     = ddw_tbex_is_export_import_menus_active() ? esc_url( admin_url( 'themes.php?page=dsp_export_import_menus' ) ) : $plugin_install;
	$plugin_meta    = ( ddw_tbex_is_export_import_menus_active() || current_user_can( 'install_plugins' ) ) ? '' : ' target="_blank" rel="nofollow noopener noreferrer"';

	$plugin = sprintf(
		'<a class="thickbox" href="%1$s"%2$s title="%3$s"><span class="dashicons-before dashicons-controls-repeat"></span> <strong>%3$s</strong></a>',
		$plugin_url,
		$plugin_meta, 
		esc_html__( 'Export Import Menus (free, by Akshay Menariya)', 'toolbar-extras' )
	);

	/** Build string for recommended plugin... */
	$string_recommended = sprintf(
		/* translators: %s - linked name of a plugin, "Export Import Menus" */
		__( 'However, I can highly recommend to use the plugin %s.', 'toolbar-extras' ),
		$plugin
	);

	/** Build string for menu location... */
	$string_location = sprintf(
		/* translators: 1 - linked label "WordPress Nav Menu" / 2 - label for "Site/Multisite Toolbar Menu" */
		__( 'This will allow you to export and import any %1$s easily, including any menu used for the %2$s location.', 'toolbar-extras' ),
		'<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '"><span class="dashicons-before dashicons-menu"></span> ' . __( 'WordPress Nav Menu', 'toolbar-extras' ) . '</a>',
		'<em>' . ddw_tbex_string_super_admin_menu_location() . '</em>'
	);

	/** Prepare the output */
	$output = sprintf(
		'<p>%s %s %s</p>',
		$string_feature,
		$string_recommended,
		$string_location
	);

	/** Creating the markup */
	?>
		<div class="tbex-settings-section"></div>
		<table class="form-table">
			<tbody>
				<tr class="tbex-import-export">
					<td>
						<th scope="row">
							<div class="tbex-explain-icon dashicons-before dashicons-info"></div>
							<div class="tbex-explain-heading"><strong><?php echo sprintf(
								/* translators: %s - word "Admin" (for Site) or "Super Admin" (for Multisite) */
								__( 'Import & Export of %s Toolbar Menus', 'toolbar-extras' ),
								ddw_tbex_string_maybe_super_admin( 'singular' )
							); ?></strong></div>
						</th>
					</td>
					<td>
						<?php echo $output; ?>
					</td>
				</tr>
			</tbody>
		</table>
	<?php

}  // end function
