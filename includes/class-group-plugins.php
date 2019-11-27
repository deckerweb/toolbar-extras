<?php

namespace DDW\TBEX;

// includes/class-group-plugins

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Class to make filtered views on the Plugins page possible.
 *   With given parameters a new view can be instantiated.
 *
 *   Note: The views will be displayed on the Plugins page for regular single
 *         installs as well as on the Plugins page on Multisite Networks.
 *
 * @since 1.4.9
 */
class Group_Plugins {

	public $slug;
	public $name;
	public $args;

	/**
	 * Init the class with the parameters and set the admin bar hook.
	 *
	 * @since 1.4.9
	 *
	 * @param string $slug  Unique ID, used as the slug of the view.
	 * @param string $label Unique display name for the view; as short as possible.
	 * @param array  $args  Array of arguments to check the plugins list against.
	 */
	public function init( $slug = '', $name = '', array $args = [] ) {

		/** Assign parameters to our local variables */
		$this->slug = $slug;
		$this->name = $name;
		$this->args = (array) $args;

		/** Add filter to the list above table */
		add_filter( 'show_advanced_plugins',       array( $this, 'filter_plugins' ), 90 );
		add_filter( 'show_network_active_plugins', array( $this, 'filter_plugins' ), 100 );

		/** Check referrer */
		add_action( 'check_admin_referer', array( $this, 'filter_plugins_referer' ), 10, 2 );

		/** Add view to Plugins page */
		add_filter( 'views_plugins',         array( $this, 'plugins_view' ) );
		add_filter( 'views_plugins-network', array( $this, 'plugins_view' ) );

		/** Set filter for view */
		add_filter( 'all_plugins', array( $this, 'prepare_plugins_view' ) );

	}  // end method


	/**
	 * For new view on Plugins page create the filter logic - this will group/
	 *   show all plugins for the given parameters.
	 *
	 * @since 1.4.9
	 *
	 * @global object $plugins
	 *
	 * @param bool $plugin_menu Whether to show advanced menu or not.
	 */
	public function filter_plugins( $plugin_menu ) {

		global $plugins;

		/** Get variables from class */
		$slug = $this->slug;
		$args = (array) $this->args;

		$check_type = sanitize_key( $args[ 'check-type' ] );

		/** Iterate through the plugins */
		if ( is_array( $plugins ) && isset( $plugins[ 'all' ] ) ) {

			foreach ( $plugins[ 'all' ] as $plugin_slug => $plugin_data ) {

				/** 1) Check type - Author OR Plugin Name OR Description word */
				if ( 'or' === $check_type ) {

					if (
						( ! empty( $args[ 'author-name' ] ) && ( isset( $plugin_data[ 'AuthorName' ] ) && FALSE !== strpos( $plugin_data[ 'AuthorName' ], $args[ 'author-name' ] ) ) )
						|| ( ! empty( $args[ 'plugin-name' ] ) && ( isset( $plugin_data[ 'Name' ] ) && FALSE !== strpos( $plugin_data[ 'Name' ], $args[ 'plugin-name' ] ) ) )
						|| ( ! empty( $args[ 'description-word' ] ) && ( isset( $plugin_data[ 'Description' ] ) && FALSE !== strpos( $plugin_data[ 'Description' ], $args[ 'description-word' ] ) ) )
					) {

						$plugins[ $slug ][ $plugin_slug ]             = $plugins[ 'all' ][ $plugin_slug ];
						$plugins[ $slug ][ $plugin_slug ][ 'plugin' ] = $plugin_slug;

						/** replicate the next step. */
						if ( current_user_can( 'update_plugins' ) ) {

							$current = get_site_transient( 'update_plugins' );

							if ( isset( $current->response[ $plugin_slug ] ) ) {
								$plugins[ $slug ][ $plugin_slug ][ 'update' ] = TRUE;
							}

						}  // end if user permission check

					}  // end if Plugin Data check - in plugin author OR name OR description

				}

				/** 2) Check type 'and' - Author AND Plugin/Name or Description */
				elseif ( 'and' === $check_type ) {

					if (
						( ! empty( $args[ 'author-name' ] ) && ( isset( $plugin_data[ 'AuthorName' ] ) && FALSE !== strpos( $plugin_data[ 'AuthorName' ], $args[ 'author-name' ] ) ) )
						&& (
							( ! empty( $args[ 'plugin-name' ] ) && ( isset( $plugin_data[ 'Name' ] ) && FALSE !== strpos( $plugin_data[ 'Name' ], $args[ 'plugin-name' ] ) ) )
							|| ( ! empty( $args[ 'description-word' ] ) && ( isset( $plugin_data[ 'Description' ] ) && FALSE !== strpos( $plugin_data[ 'Description' ], $args[ 'description-word' ] ) ) )
						)
					) {

						$plugins[ $slug ][ $plugin_slug ]             = $plugins[ 'all' ][ $plugin_slug ];
						$plugins[ $slug ][ $plugin_slug ][ 'plugin' ] = $plugin_slug;

						/** replicate the next step. */
						if ( current_user_can( 'update_plugins' ) ) {

							$current = get_site_transient( 'update_plugins' );

							if ( isset( $current->response[ $plugin_slug ] ) ) {
								$plugins[ $slug ][ $plugin_slug ][ 'update' ] = TRUE;
							}

						}  // end if user permission check

					}  // end if Plugin Data check - in plugin author AND name/description

				}

				/** 3) Check type 'name-only' - Plugin name */
				elseif ( 'name-only' === $check_type ) {

					if ( ( ! empty( $args[ 'plugin-name' ] ) && ( isset( $plugin_data[ 'Name' ] ) && FALSE !== strpos( $plugin_data[ 'Name' ], $args[ 'plugin-name' ] ) ) )
					) {

						$plugins[ $slug ][ $plugin_slug ]             = $plugins[ 'all' ][ $plugin_slug ];
						$plugins[ $slug ][ $plugin_slug ][ 'plugin' ] = $plugin_slug;

						/** replicate the next step. */
						if ( current_user_can( 'update_plugins' ) ) {

							$current = get_site_transient( 'update_plugins' );

							if ( isset( $current->response[ $plugin_slug ] ) ) {
								$plugins[ $slug ][ $plugin_slug ][ 'update' ] = TRUE;
							}

						}  // end if user permission check

					}  // end if Plugin Data check - in plugin name only

				}  // end if Check type

			}  // end foreach

		}  // end if Array check

		return $plugin_menu;

	}  // end method


	/**
	 * Check for proper admin referer to only set view for given parameter (slug)
	 *   if conditions are met.
	 *
	 * @since 1.4.9
	 *
	 * @global string $status
	 *
	 * @param string    $action The nonce action.
	 * @param false|int $result Result of the nonce.
	 */
	public function filter_plugins_referer( $action, $result ) {

		if ( ! function_exists( 'get_current_screen' ) ) {
			return;
		}

		$screen = get_current_screen();

		/** Get variables from class */
		$slug = $this->slug;

		if ( is_object( $screen )
			&& 'plugins' === $screen->base
			&& ! empty( $_REQUEST[ 'plugin_status' ] ) && $slug === sanitize_key( wp_unslash( $_REQUEST[ 'plugin_status' ] ) )
		) {

			global $status;

			$status = $slug;

		}  // end if

	}  // end method


	/**
	 * Make the view for the given parameters (slug & name) as a default view
	 *   (menu) and update the view/ menu name.
	 *
	 * @since 1.4.9
	 *
	 * @global string $status
	 * @global object $plugins
	 *
	 * @param array $views Array that holds all views.
	 * @return mixed
	 */
	public function plugins_view( $views ) {

		global $status, $plugins;

		/** Get variables from class */
		$slug = $this->slug;
		$name = $this->name;

		if ( ! empty( $plugins[ $slug ] ) ) {

			$class = '';

			if ( $slug === $status ) {
				$class = 'current';
			}

			/** Preare view URL */
			$view_url = add_query_arg(
				array(
					'plugin_status' => $slug,
				),
				network_admin_url( 'plugins.php' )
			);

			/** Create view markup */
			$views[ $slug ] = sprintf(
				'<a class="%1$s" href="%2$s" title="%5$s"> %3$s <span class="count">(%4$s) </span></a>',
				$class,
				$view_url,
				esc_attr( $name ),
				absint( count( $plugins[ $slug ] ) ),
				sprintf(
					/* translators: %s - name of the view filter on the Plugins page (for example "MainWP") */
					esc_html__( 'Show all %s Plugins and Extensions', 'toolbar-extras' ),
					esc_html( $name )
				)
			);

		}  // end if

		return $views;

	}  // end method


	/**
	 * Set the given view as the main view (menu) when admin click on the view's
	 *   name on the Plugins page.
	 *
	 * @since 1.4.9
	 *
	 * @global string $status
	 *
	 * @param array $plugins Array of plugins to display in the list table.
	 * @return mixed
	 */
	public function prepare_plugins_view( $plugins ) {

		global $status;

		/** Get variables from class */
		$slug = $this->slug;

		if ( isset( $_REQUEST[ 'plugin_status' ] ) && $slug === sanitize_key( wp_unslash( $_REQUEST[ 'plugin_status' ] ) ) ) {
			$status = $slug;
		}

		return $plugins;

	}  // end method

}  // end of class
