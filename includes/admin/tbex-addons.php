<?php

// includes/admin/tbex-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Get Add-On data from the ToolbarExtras.com API.
 *   The API response is stored in a transient.
 *
 * @since 1.4.2
 *
 * @return array|bool If there is a response from the API and we have data,
 *                    return the array of add-on data, FALSE otherwise.
 */
function ddw_tbex_tbexcom_api_get_addons() {

	/** Get the transient where the addons are stored on-site */
	$data = get_transient( 'toolbar-extras-addons' );

	/** If we already have data, return it */
	if ( ! empty( $data ) ) {
		return $data;
	}

	/** Make sure this matches the exact URL from your site. */
	$url = 'https://toolbarextras.com/api/tbex/v1/plugins?addons=tbex';

	/** Get data from the remote URL */
	$response = wp_remote_get( $url );

	if ( ! is_wp_error( $response ) ) {

		/** Decode the data that we got - in array format */
		$data = json_decode( wp_remote_retrieve_body( $response ), TRUE );

		if ( ! empty( $data ) && is_array( $data ) ) {

			/** Store the data for a week / MINUTE_IN_SECONDS */
			set_transient( 'toolbar-extras-addons', $data, 7 * DAY_IN_SECONDS );

			return $data;

		}  // end if

	}  // end if WP_Error/ response check

	return FALSE;

}  // end if


/**
 * Get Add-Ons by their type.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_tbexcom_api_get_addons() The API response.
 *
 * @param string $type Type of Add-On.
 * @return array|bool If array by type exists and is not empty, return it, FALSE
 *                    otherwise.
 */
function ddw_tbex_get_addons_type( $type = '' ) {

	$type = sanitize_key( $type );

	$addons = ddw_tbex_tbexcom_api_get_addons();

	$addons_official    = array();
	$addons_supported   = array();
	$addons_recommended = array();
	$addons_by_type     = array();

	/** Split Add-Ons by type */
	if ( ! empty( $addons ) && is_array( $addons ) ) {

		foreach ( $addons as $addon => $addon_data ) {
			
			if ( $type === sanitize_key( $addon_data[ 'meta' ][ 'type' ] ) ) {

				$search_slug = sanitize_key( $addon_data[ 'meta' ][ 'slug' ] );

				if ( ! ddw_tbex_is_genesis_active() && preg_match( '/genesis/', $search_slug ) ) {
					continue;
				}

				$addons_{$type}[ $addon ] = $addon_data;
				$addons_by_type = $addons_{$type};

			}  // end if

		}  // end foreach

		return $addons_by_type;

	}  // end if (array check)

	return FALSE;

}  // end function


add_action( 'tbex_settings_tab_addons_list', 'ddw_tbex_settings_tab_addons_list' );
/**
 * Display all sections with the various Add-On types.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_addons_list()
 */
function ddw_tbex_settings_tab_addons_list() {

	?>
		<div class="tbex-addons-preface">
			<p><?php _e( 'Supercharge your Toolbar even more with these awesome Add-Ons and Extensions. More features, more integrations to save more time and be more productive.', 'toolbar-extras' ); ?></p>
		</div>
		<div class="tbex-addons-block">
			<div class="tbex-addons-block-info">
				<h3 class="tbex-settings-section first"><?php _e( 'Official Add-Ons', 'toolbar-extras' ); ?></h3>
				<p class="description"><?php _e( 'The official Add-Ons I developed to extend the feature set of Toolbar Extras.', 'toolbar-extras' ); ?></p>
			</div>
			<?php ddw_tbex_addons_list( 'official' ); ?>
		</div>

		<div class="tbex-addons-block">
			<div class="tbex-addons-block-info">
				<h3 class="tbex-settings-section"><?php _e( 'Supported Add-Ons', 'toolbar-extras' ); ?></h3>
				<p class="description"><?php _e( 'Other plugins from me that perfectly fit with Toolbar Extras and where both plugins support each other. Plus, plugins from third-party developers which work perfectly fine with Toolbar Extras and improve the user experience or cover special needs.', 'toolbar-extras' ); ?></p>	
			</div>
			<?php ddw_tbex_addons_list( 'supported' ); ?>
		</div>

		<div class="tbex-addons-block">
			<div class="tbex-addons-block-info">
				<h3 class="tbex-settings-section"><?php _e( 'Recommended Extensions', 'toolbar-extras' ); ?></h3>
				<p class="description"><?php _e( 'These are plugins from third-party developers I can strongly recommend because they fit with Toolbar Extras, extend the functionality and user experience, plus, they are supported on the behalf of Toolbar Extras. Enjoy.', 'toolbar-extras' ); ?></p>
			</div>
			<?php ddw_tbex_addons_list( 'recommended' ); ?>
		</div>

	<?php

}  // end function


/**
 * Check for a plugin path if plugin is installed.
 *
 * @since 1.4.2
 *
 * @uses get_plugins()
 *
 * @param string $slug      Folder name slug of given plugin.
 * @param string $slug_file File name of given plugin main file.
 * @return bool TRUE if plugin path is set in WordPress, FALSE otherwise.
 */
function ddw_tbex_is_plugin_installed( $slug = '', $slug_file = '' ) {

	$slug      = sanitize_key( $slug );
	$slug_file = sanitize_file_name( $slug_file );

	$file_path = sprintf(
		'%1$s/%2$s.php',
		$slug,
		$slug_file
	);

	$installed_plugins = get_plugins();

	return isset( $installed_plugins[ $file_path ] );

}  // end function


/**
 * Get the list of Add-Ons - by type.
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_get_addons_type()
 * @uses ddw_tbex_is_plugin_installed()
 *
 * @param string $type Type of Add-On.
 * @return string Echoing markup/ string for all Add-Ons of given Add-On type.
 */
function ddw_tbex_addons_list( $type = '' ) {

	/** Get Add-On type, plus Add-Ons */
	$type   = sanitize_key( $type );
	$addons = ddw_tbex_get_addons_type( $type );

	/** No Add-Ons message */
	$message_no_addons = sprintf(
		'<div class="tbex-no-addons">%s</div>',
		__( 'There are currently no Add-Ons/ Extensions of this type available.', 'toolbar-extras' )
	);

	/** When there are no Add-Ons, display a message */
	if ( ! $addons || ( empty( $addons ) && ! is_array( $addons ) ) ) {
		echo $message_no_addons;
	}

	/** Start building the output */
	$output = '<div class="wp-list-table widefat plugin-install"><div id="the-list">';

	$plugin_type_collection = array();

	/** Loop through Add-Ons array */
	foreach ( $addons as $addon => $addon_data ) {
		
		/** Skp default dummy item */
		if ( 'default-none' === $addon ) {
			continue;
		}

		/** Build output for chosen type of Add-Ons */
		if ( $type === $addon_data[ 'meta' ][ 'type' ] ) {

			$plugin_type_collection[] = array( $addon => $addon_data );

			$plugin_slug = sanitize_key( $addon_data[ 'meta' ][ 'slug' ] );

			$plugin_slug_install = sprintf(
				'%1$s/%2$s.php',
				$plugin_slug,
				sanitize_file_name( $addon_data[ 'meta' ][ 'slug_file' ] )
			);

			$info_url = sprintf(
				'plugin-install.php?tab=plugin-information&amp;plugin=%s&amp;TB_iframe=true&amp;width=772&amp;height=794',
				$plugin_slug
			);

			$action_url    = $info_url;
			$classes       = '';
			$button_title  = '';
			$plugin_status = '';
			$target        = '';
			$card_active   = '';

			/**
			 * Check for the various statuses of plugins, do actions
			 *   accordingly
			 */
			if ( ddw_tbex_is_plugin_installed( $addon_data[ 'meta' ][ 'slug' ], $addon_data[ 'meta' ][ 'slug_file' ] )
				&& current_user_can( 'activate_plugins' )
			) {

				/** Activate the alredy installed plugin */
				if ( is_plugin_inactive( $plugin_slug_install ) ) {

					$action_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin_slug_install . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin_slug_install );

					$classes       = 'button tbex-card-button';
					$button_title  = '<span class="dashicons dashicons-yes"></span> ' . esc_attr__( 'Activate', 'toolbar-extras' );
					$plugin_status = __( 'Installed, not active', 'toolbar-extras' );

				}

				/** Already installed AND active */
				else {

					$plugin_status = __( 'Active', 'toolbar-extras' );
					$card_active   = ' tbex-card-active';

					if ( ! empty( $addon_data[ 'meta' ][ 'admin_url' ] ) ) {
						
						$action_url   = esc_url( $addon_data[ 'meta' ][ 'admin_url' ] );
						$classes      = 'button tbex-card-button';
						$button_title = '<span class="dashicons dashicons-admin-generic"></span> ' . esc_attr__( 'Admin settings', 'toolbar-extras' );

					} else {

						$classes      = 'button button-disabled thickbox open-plugin-details-modal tbex-card-button';
						$button_title = esc_attr__( 'All Good', 'toolbar-extras' ) . ' <span class="dashicons dashicons-smiley"></span>';

					}  // end if

				}  // end if

			} elseif ( ! ddw_tbex_is_plugin_installed( $addon_data[ 'meta' ][ 'slug' ], $addon_data[ 'meta' ][ 'slug_file' ] )
						&& current_user_can( 'install_plugins' )
			) {

				/** Install the plugin (as it is not yet installed!), OR: the buy URL */
				if ( empty( $addon_data[ 'meta' ][ 'buy_url' ] ) ) {

					$action_url = wp_nonce_url( admin_url( 'update.php?action=install-plugin&plugin=' . $plugin_slug ), 'install-plugin_' . $plugin_slug );

				} else {

					$action_url = esc_url( $addon_data[ 'meta' ][ 'buy_url' ] );
					$target     = 'target="_blank" rel="noopener noreferrer"';

				}  // end if

				$classes       = 'button button-primary';
				$button_title  = '<span class="dashicons dashicons-download"></span> ' . esc_attr__( 'Install', 'toolbar-extras' );
				$plugin_status = __( 'Not installed', 'toolbar-extras' );

			}  // end if

			/** Build the plugin card output */
			$output .= sprintf(
				'<div class="plugin-card plugin-card-%1$s">
					<div class="plugin-card-top">
						<div class="name column-name">
							<h3>
								<a href="%7$s" class="thickbox open-plugin-details-modal" title="%12$s: %2$s">
									%2$s<img src="%4$s" class="plugin-icon" alt="Logo of Add-On - Icon">
								</a>
							</h3>
						</div>
						<div class="desc column-description">
							<p>%3$s</p>
							<p class="authors"> <cite>%16$s <a href="%6$s" target="_blank" rel="noopener noreferrer">%5$s</a> / <a href="%18$s" target="_blank" rel="nofollow noopener noreferrer">%17$s</a></cite></p>
						</div>
					</div>
					<div class="plugin-card-bottom">
						<div class="vers column-rating%15$s">
							<strong>%13$s</strong>: %11$s
						</div>
						<div class="column-updated">
							<a class="%9$s" href="%8$s"%14$s>%10$s</a>
						</div>
					</div>
				</div>',
				sanitize_key( $addon_data[ 'slug' ] ),					// 1 - slug
				esc_attr( $addon_data[ 'title' ] ),						// 2 - Plugin name
				wp_strip_all_tags( $addon_data[ 'excerpt' ] ),			// 3 - Plugin description
				esc_url( $addon_data[ 'media' ][ 'icon' ][ 'url' ] ),	// 4 - .org icon URL
				esc_attr( $addon_data[ 'author' ][ 'name' ] ),			// 5 - Plugin author
				esc_url( $addon_data[ 'meta' ][ 'web_url' ] ),			// 6 - Plugin web URL
				esc_url( admin_url( $info_url ) ),						// 7 - Plugin info URL (Thickbox)
				$action_url,											// 8 - Action URL (install, activate, info)
				$classes,												// 9 - CSS button classes
				$button_title,											// 10 - Action button title
				$plugin_status,                              			// 11 - Plugin status
				esc_attr__( 'Plugin info', 'toolbar-extras' ),			// 12 - String "Plugin info"
				__( 'Status', 'toolbar-extras' ),						// 13 - String "Status"
				$target,												// 14 - link target
				$card_active,											// 15 - ?
				__( 'By', 'toolbar-extras' ),							// 16 - String "By"
				__( 'Add-On page', 'toolbar-extras' ),					// 17 - String "Add-On page" //"Website"
				esc_url( $addon_data[ 'url' ] )							// 18 - Add-On Page URL

			);

		}  // end if

	}  // end foreach

	if ( empty( $plugin_type_collection ) ) {

		$output .= $message_no_addons;

	}  // end if

	$output .= '</div></div>';

	/** Finally, render the output */
	echo $output;

}  // end function
