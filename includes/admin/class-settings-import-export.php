<?php

namespace DDW\TBEX;

// includes/admin/class-settings-import-export

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Class for Import & Export functionality.
 *
 * @since 1.4.7
 */
class Settings_Import_Export {

	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 * @since 1.4.7
	 */
	private static $instance;


	/**
	 * Initiator.
	 *
	 * @since 1.4.7
	 *
	 * @return object Initialized object of class.
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;

	}  // end method


	/**
	 * Add necessary actions.
	 *
	 * @since 1.4.7
	 */
	public function __construct() {

		add_action( 'tbex_settings_tab_import_export', array( $this, 'build_html' ), 15 );
		add_action( 'admin_init', array( $this, 'export' ) );
		add_action( 'admin_init', array( $this, 'import' ) );
		add_action( 'admin_notices', array( $this, 'notices' ) );

	}  // end method


	/**
	 * Build our export and import HTML markup.
	 *
	 * @since 1.4.7
	 *
	 * @uses ddw_tbex_string_toolbar_extras()
	 * @uses ddw_tbex_string_json()
	 * @uses ddw_tbex_string_base_plugin()
	 */
	public static function build_html() {

		do_action( 'tbex_before_import_export_form_table' );

		?>

			<table class="form-table">
				<tbody>

					<tr class="tbex-import-export">
						<th scope="row"><strong><?php printf(
							/* translators: %s - name of the plugin, "Toolbar Extras" */
							esc_html__( 'Export %s Settings File', 'toolbar-extras' ),
							ddw_tbex_string_toolbar_extras()
							); ?></strong></th>
						<td>
							<p>
								<?php printf(
									/* translators: 1 - name of the plugin, "Toolbar Extras" / 2 - JSON file extension */
									esc_html__( 'When you click the button below, %1$s will generate a data file (%2$s) for you to save to your computer.', 'toolbar-extras' ),
									ddw_tbex_string_toolbar_extras(),
									ddw_tbex_string_json()
								); ?>
							</p>
							<p>
								<?php esc_html_e( 'Once you have saved the download file, you can use the import function on another site to import this data.', 'toolbar-extras' ); ?>
							</p>
							<form method="post">
								<div class="tbex-export-choices">
									<p>
										<label for="selectall" class="button"><input type="checkbox" id="selectall" value="selectallbutton" style="display: none;" />&rarr; <?php _e( 'Select / Unselect ALL Checkboxes:', 'toolbar-extras' ); ?></label>
									</p>
									<label>
										<input class="tbex-selectall" type="checkbox" name="module_group[]" value="tbex-options-general" checked />
										<strong><?php ddw_tbex_string_base_plugin( 'echo' ); ?>:</strong> <?php _ex( 'General Settings', 'Toolbar Extras settings module namee', 'toolbar-extras' ); ?> <small>(v<?php echo TBEX_PLUGIN_VERSION; ?>)</small>
									</label>
									<label>
										<input class="tbex-selectall" type="checkbox" name="module_group[]" value="tbex-options-tweaks" checked />
										<strong><?php ddw_tbex_string_base_plugin( 'echo' ); ?>:</strong> <?php _ex( 'Smart Tweaks Settings', 'Toolbar Extras settings module name', 'toolbar-extras' ); ?> <small>(v<?php echo TBEX_PLUGIN_VERSION; ?>)</small>
									</label>
									<label>
										<input class="tbex-selectall" type="checkbox" name="module_group[]" value="tbex-options-development" checked />
										<strong><?php ddw_tbex_string_base_plugin( 'echo' ); ?>:</strong> <?php _ex( 'For Development Settings', 'Toolbar Extras settings module name', 'toolbar-extras' ); ?> <small>(v<?php echo TBEX_PLUGIN_VERSION; ?>)</small>
									</label>

									<?php do_action( 'tbex_settings_export_items' ); ?>
								</div>
								<p><input type="hidden" name="tbex_action" value="export_settings" /></p>
								<p style="margin-bottom:0;">
									<?php wp_nonce_field( 'tbex_export_nonce', 'tbex_export_nonce' ); ?>
									<?php submit_button(
										__( 'Download Export File', 'toolbar-extras' ),
										'button-primary',
										'download',
										TRUE,
										array( 'id' => '' )
									); ?>
								</p>
							</form>
						</td>
					</tr>

					<tr class="tbex-import-export">
						<th scope="row">
							<strong><?php printf(
								/* translators: %s - name of the plugin, "Toolbar Extras" */
								esc_html__( 'Import %s Settings File', 'toolbar-extras' ),
								ddw_tbex_string_toolbar_extras()
							); ?></strong>
						</th>
						<td>
							<p>
								<?php printf(
									/* translators: %s - JSON file extension */
									esc_html__( 'Upload the data file (%s) from your computer and we\'ll import your settings.', 'toolbar-extras' ),
									ddw_tbex_string_json()
								); ?>
							</p>
							<p>
								<?php esc_html_e( 'Choose the file from your computer and click "Upload File and Import"', 'toolbar-extras' ); ?>
							</p>

							<form method="post" enctype="multipart/form-data">
								<label for="import_file">
									<?php printf(
										/* translators: %s: Maximum size import files can have. */
										esc_html__( 'Upload File (Maximum Size: %s):', 'toolbar-extras' ) . ' ',
										esc_html( ini_get( 'post_max_size' ) )
									); ?>
								</label>
								<p>
									<input type="file" id="import_file" name="import_file" />
								</p>
								<p style="margin-bottom:0;">
									<input type="hidden" name="tbex_action" value="import_settings" />
									<?php wp_nonce_field( 'tbex_import_nonce', 'tbex_import_nonce' ); ?>
									<?php submit_button(
										__( 'Upload File and Import', 'toolbar-extras' ),
										'button-primary',
										'upload',
										TRUE,
										array( 'id' => '' )
									); ?>
								</p>
							</form>
						</td>
					</tr>

				</tbody>
			</table>
		<?php

		do_action( 'tbex_after_import_export_form_table' );

	}  // end method


	/**
	 * Export our chosen options.
	 *
	 * @since 1.4.7
	 */
	public static function export() {

		if ( empty( $_POST[ 'tbex_action' ] ) || 'export_settings' != $_POST[ 'tbex_action' ] ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST[ 'tbex_export_nonce' ], 'tbex_export_nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings = self::get_settings();

		$data = array(
			'options' => array()
		);

		foreach ( $settings as $setting ) {

			if ( in_array( $setting, $_POST[ 'module_group' ] ) ) {
				$data[ 'options' ][ $setting ] = get_option( $setting );
			}

		}  // end foreach

		$data = apply_filters( 'tbex_filter_settings_export_data', $data );

		nocache_headers();
		header( 'Content-Description: File Transfer' );
		header( 'Content-Type: application/json; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=toolbar-extras-settings-export-' . date( 'Y-m-d-His' ) . '.json' );
		header( "Expires: 0" );

		echo json_encode( $data );
		exit;

	}  // end method


	/**
	 * Import our exported file.
	 *
	 * @since 1.4.7
	 *
	 * @uses ddw_tbex_string_toolbar_extras()
	 * @uses wp_die()
	 */
	public static function import() {

		/** Bail early if no proper request, nonce or permission */
		if ( empty( $_POST[ 'tbex_action' ] ) || 'import_settings' != $_POST[ 'tbex_action' ] ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST[ 'tbex_import_nonce' ], 'tbex_import_nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) || ! current_user_can( 'upload_files' ) ) {
			return;
		}

		$filename  = $_FILES[ 'import_file' ][ 'name' ];
		$extension = end( explode( '.', $_FILES[ 'import_file' ][ 'name' ] ) );

		/** Prepare for error handling */
		$wpdie_title = sprintf(
			'%s: %s - %s',
			esc_html__( 'Plugin', 'toolbar-extras' ),
			ddw_tbex_string_toolbar_extras(),
			esc_html__( 'Import Feature', 'toolbar-extras' )
		);

		$wpdie_message = sprintf(
			'<h2>%s: %s - <em>%s</em></h2><br />',
			__( 'Plugin', 'toolbar-extras' ),
			ddw_tbex_string_toolbar_extras(),
			__( 'Import Feature', 'toolbar-extras' )
		);

		$wpdie_args = array(
			'back_link' => TRUE,
			'link_url'  => 'https://google.de',
			'link_text' => 'more help in our documentation',
		);

		/** Error handling: no .json file extension */
		if ( $extension != 'json' ) {

			wp_die(
				$wpdie_message . __( 'Please upload a valid .json file', 'toolbar-extras' ),
				$wpdie_title,
				$wpdie_args
			);

		}  // end if

		$import_file = $_FILES[ 'import_file' ][ 'tmp_name' ];

		/** Error handling: empty or no import file */
		if ( empty( $import_file ) ) {

			wp_die(
				$wpdie_message . __( 'Please upload a file to import', 'toolbar-extras' ),
				$wpdie_title,
				$wpdie_args
			);

		}  // end if

		/** Error handling: other error */
		if ( $_FILES[ 'import_file' ][ 'error' ] ) {

			wp_safe_redirect( admin_url( 'options-general.php?page=toolbar-extras&tab=import-export&status=import-error' ) );
			exit;

		}  // end if

		/** Retrieve the settings from the file and convert the json object to an array. */
		$settings = json_decode( file_get_contents( $import_file ), TRUE );

		foreach ( ( array ) $settings[ 'options' ] as $key => $value ) {

			if ( in_array( $key, self::get_settings() ) ) {
				update_option( $key, $value );
			}

		}  // end foreach

		wp_safe_redirect( admin_url( 'options-general.php?page=toolbar-extras&tab=import-export&status=imported' ) );
		exit;

	}  // end method


	/**
	 * List out our available settings.
	 *
	 * @since 1.4.7
	 *
	 * @return array Array of setting fields, filterable.
	 */
	public static function get_settings() {

		$settings_fields = apply_filters(
			'tbex_filter_export_settings_fields',
			array(
				'tbex-options-general',
				'tbex-options-tweaks',
				'tbex-options-development',
			)
		);

		return array_map( 'sanitize_key', $settings_fields );

	}  // end method


	/**
	 * Output admin notices based on import status.
	 *
	 * @since 1.4.7
	 *
	 * @uses ddw_tbex_string_toolbar_extras()
	 */
	public static function notices() {

		if ( isset( $_REQUEST[ 'status' ] ) && 'imported' === sanitize_key( wp_unslash( $_REQUEST[ 'status' ] ) ) ) {

			printf(
				'<div id="message" class="updated" role="alert"><p><span class="dashicons-before dashicons-yes-alt" style="color: #46b450;"></span> <strong>%s</strong></p></div>',
				sprintf(
					/* translators: %s - name of plugin, "Toolbar Extras" */
					esc_html__( '%s settings were successfully imported/ updated.', 'toolbar-extras' ),
					ddw_tbex_string_toolbar_extras()
				)
			);

		} elseif ( isset( $_REQUEST[ 'status' ] ) && 'import-error' === sanitize_key( wp_unslash( $_REQUEST[ 'status' ] ) ) ) {

			printf(
				'<div id="message" class="error" role="alert"><p><span class="dashicons-before dashicons-warning" style="color: #c00;></span> <strong>%s</strong></p></div>',
				esc_html__( 'There was a problem importing your settings. Please try again.', 'toolbar-extras' )
			);

		}  // end if

	}  // end method

}  // end of class

\DDW\TBEX\Settings_Import_Export::get_instance();
