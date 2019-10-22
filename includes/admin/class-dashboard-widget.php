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


if ( ! class_exists( '\DDW\TBEX\Dashboard_Widget' ) ) :

	class Dashboard_Widget {

		/**
		 * Set the news feed URL.
		 *
		 * @since 1.4.8
		 */
		private static $feed = 'https://toolbarextras.com/feed/';


		/**
		 * Setup the class.
		 *
		 * @since 1.4.8
		 */
		public function __construct() {

			add_action( 'wp_dashboard_setup', array( $this, 'register_dashboard_widget' ) );
			add_action( 'wp_network_dashboard_setup', array( $this, 'register_dashboard_widget' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'styles' ) );

		}  // end method


		/**
		 * Register our Dashboard Overview widget.
		 *
		 * @since 1.4.8
		 */
		public function register_dashboard_widget() {

			/** Bail early if display disabled via filter */
			if ( apply_filters( 'tbex/filter/dashboard_news_enabled', FALSE ) ) {
				return;
			}

			wp_add_dashboard_widget(
				'tbex-dashboard-overview',
				_x( 'Toolbar Extras Overview', 'Title of Dashboard Widget', 'toolbar-extras' ),
				array( $this, 'dashboard_news_widget' ) );

		}  // end method


		/**
		 * Toolbar Extras Overview Widget - render its content.
		 *
		 * @since 1.4.8
		 *
		 * @uses ddw_tbex_get_main_site_blog_id()
		 * @uses ddw_tbex_get_info_url()
		 * @uses ddw_tbex_string_toolbar_extras()
		 */
		public function dashboard_news_widget() {

			$tbex_url = ( is_multisite() ) ? get_admin_url( ddw_tbex_get_main_site_blog_id(), 'options-general.php?page=toolbar-extras' ) : admin_url( 'options-general.php?page=toolbar-extras' );

			?>
				<div class="tbexdbw-dashboard-widget">
					<div class="tbexdbw-header">
						<div class="tbexdbw-logo">
							<a href="<?php echo esc_url( $tbex_url ); ?>">
								<img src="<?php echo esc_url( ddw_tbex_get_info_url( 'plugin_icon_svg' ) ); ?>" alt="Logo Icon Toolbar Extras" />
							</a>
						</div>
						<div class="tbexdbw-versions">
							<a href="<?php echo esc_url( $tbex_url ); ?>"><?php ddw_tbex_string_toolbar_extras( 'echo' ); ?> v<?php echo TBEX_PLUGIN_VERSION; ?></a>
							<?php
								/**
								 * Elementor dashboard widget after the version.
								 *
								 * Fires after Elementor version display in the dashboard widget.
								 *
								 * @since 1.4.8
								 */
								do_action( 'tbex/admin/dashboard_overview_widget/after_version' );
							?>
						</div>
						<div class="tbexdbw-action">
							<a href="<?php echo esc_url( $tbex_url ); ?>" class="button"><span aria-hidden="true" class="dashicons dashicons-admin-generic"></span> <?php _ex( 'Tweak Toolbar', 'Button label in Dashboard Widget', 'toolbar-extras' ); ?></a>
						</div>
					</div>
					<div class="rss-widget">
						<h3 class="tbexdbw-heading"><?php echo __( 'News & Updates', 'toolbar-extras' ); ?></h3>
						<?php
						$this->cached_rss_widget( 'tbex-dashboard-overview', array( $this, 'news_output' ) ); ?>
					</div>
					<div class="tbexdbw-news-footer">
						<?php foreach ( $this->get_dashboard_overview_widget_footer_actions() as $action_id => $action ) :
								printf(
									'<a href="%1$s" class="tbexdbw-post-link tbexdbw-post-link-%2$s" target="_blank" rel="noopener noreferrer">%3$s <span class="screen-reader-text">%4$s</span><span aria-hidden="true" class="dashicons dashicons-%5$s"></span></a>',
									esc_url( $action[ 'url' ] ),
									sanitize_key( $action_id ),
									esc_html( $action[ 'title' ] ),
									/* translators: accessibility text */
									_x( '(opens in a new window)', 'Label in Dashboard Widget', 'toolbar-extras' ),
									( ! isset( $action[ 'icon' ] ) || empty( $action[ 'icon' ] ) ) ? 'external' : sanitize_html_class( $action[ 'icon' ] )
								);
							endforeach;
						?>
					</div>
				</div>
			<?php

		}  // end method


		/**
		 * Display our RSS news feed.
		 *
		 * @since 1.4.8
		 */
		public function news_output() {

			$this->rss_output( self::$feed );

		}  // end method


		/**
		 * Display the RSS news feed entries in a list.
		 *
		 *   Note: Uses the CSS class 'rsswidget' - as WP Core also does!
		 *
		 * @since 1.4.8
		 *
		 * @uses fetch_feed() (from WP Core > SimplePie!)
		 *
		 * @see https://core.trac.wordpress.org/ticket/29204 -- yet unresolved bug in WP Core, regarding fetch_feed()!
		 */
		public function rss_output( $rss, $args = array() ) {

			if ( is_string( $rss ) ) {

				$rss = fetch_feed( $rss );

			} elseif ( is_array( $rss ) && isset( $rss[ 'url' ] ) ) {

				$args = $rss;
				$rss  = fetch_feed( $rss[ 'url' ] );

			} elseif ( ! is_object( $rss ) ) {

				return;

			}  // end if

			if ( is_wp_error( $rss ) ) {

				if ( is_admin() || current_user_can( 'manage_options' ) ) {
					echo '<p><strong>' . __( 'RSS Error:', 'toolbar-extras' ) . '</strong> ' . $rss->get_error_message() . '</p>';
				}

				return;

			}  // end if

			$default_args = array(
				'show_summary' => 1,
				'items'        => 4,
			);
			$args         = wp_parse_args( $args, $default_args );
			$items        = (int) $args[ 'items' ];
			$show_summary = (int) $args[ 'show_summary' ];

			if ( ! $rss->get_item_quantity() ) {

				echo '<ul><li>' . __( 'An error has occurred, which probably means the feed is down. Please try again later.', 'toolbar-extras' ) . '</li></ul>';

				$rss->__destruct();

				unset( $rss );

				return;

			}  // end if

			echo '<ul>';

				foreach ( $rss->get_items( 0, $items ) as $item ) {

					$link = $item->get_link();

					while ( stristr( $link, 'http' ) != $link ) {
						$link = substr( $link, 1 );
					}

					$link = esc_url( strip_tags( $link ) );

					$title = esc_html( trim( strip_tags( $item->get_title() ) ) );

					if ( empty( $title ) ) {
						$title = _x( 'Untitled', 'Label in Dashboard Widget', 'toolbar-extras' );
					}

					$desc = @html_entity_decode( $item->get_description(), ENT_QUOTES, get_option( 'blog_charset' ) );
					$desc = esc_attr( wp_trim_words( $desc, 25, ' [&hellip;]' ) );

					$summary = '';

					if ( $show_summary ) {

						$summary = $desc;
						$summary = '<div class="rssSummary">' . esc_html( $summary ) . '</div>';

					}  // end if

					echo sprintf(
						'<li><a class="rsswidget" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>%3$s</li>',
						$link,
						$title,
						$summary
					);

				}  // end foreach

			echo '</ul>';

			$rss->__destruct();

			unset( $rss );

		}  // end method


		/**
		 * Checks to see if all of the feed url in $check_urls are cached.
		 *
		 *   Note: For Multisite compat we leverage set_site_transient().
		 *
		 * @since 1.4.8
		 *
		 * @uses determine_locale()
		 * @uses get_user_locale()
		 * @uses get_site_transient / set_site_transient
		 *
		 * @param string   $widget_id
		 * @param callable $callback
		 * @param array    $check_urls RSS feeds
		 * @return bool FALSE on failure; TRUE on success.
		 */
		function cached_rss_widget( $widget_id, $callback ) {

			$loading    = '<p class="widget-loading hide-if-no-js">' . __( 'Loading&#8230;', 'toolbar-extras' ) . '</p><div class="hide-if-js notice notice-error inline"><p>' . __( 'This widget requires JavaScript.', 'toolbar-extras' ) . '</p></div>';
			$check_urls = self::$feed;

			$locale    = function_exists( 'determine_locale' ) ? determine_locale() : get_user_locale();
			$cache_key = 'tbex_news_feed_data_' . md5( $widget_id . '_' . $locale );

			if ( FALSE !== ( $output = get_site_transient( $cache_key ) ) ) {

				echo $output;
				return TRUE;

			}  // end if

			if ( empty( $check_urls ) ) {

				echo $loading;
				return FALSE;

			}  // end if

			if ( $callback && is_callable( $callback ) ) {

				$args = array_slice( func_get_args(), 3 );
				array_unshift( $args, $widget_id, $check_urls );
				ob_start();
				call_user_func_array( $callback, $args );
				set_site_transient( $cache_key, ob_get_flush(), 72 * HOUR_IN_SECONDS ); // Default lifetime in cache of 12 hours (same as the feeds)

			}  // end if

			return TRUE;

		}  // end method


		/**
		 * Get all footer actions for our Dashboard Overview widget.
		 *
		 *   This retrieves the - filterable - footer action links displayed in
		 *   our Dashboard widget.
		 *
		 *   Note: The icon IDs are WP Dashicons.
		 *
		 * @since 1.4.8
		 * @access private
		 *
		 * @uses ddw_tbex_get_info_url()
		 * @uses ddw_tbex_display_items_dev_mode()
		 *
		 * @return array $actions Array of action Links & Labels.
		 */
		private function get_dashboard_overview_widget_footer_actions() {

			$base_actions = [
				'blog' => [
					'title' => _x( 'Blog', 'Label in Dashboard Widget', 'toolbar-extras' ),
					'url'   => ddw_tbex_get_info_url( 'url_blog' ),
					'icon'  => 'admin-post',
				],
				'help' => [
					'title' => _x( 'Help', 'Label in Dashboard Widget', 'toolbar-extras' ),
					'url'   => ddw_tbex_get_info_url( 'url_plugin_docs' ),
					'icon'  => 'sos',
				],
				'newsletter' => [
					'title' => _x( 'Newsletter', 'Label in Dashboard Widget', 'toolbar-extras' ),
					'url'   => ddw_tbex_get_info_url( 'url_newsletter' ),
					'icon'  => 'thumbs-up',
				],
			];

			$additions_actions = [];

			if ( 'en_US' !== get_user_locale() ) {

				$additions_actions[ 'translations' ] = [
						'title' => _x( 'Translations', 'Label in Dashboard Widget', 'toolbar-extras' ),
						'url'   => ddw_tbex_get_info_url( 'url_translate' ),
						'icon'  => 'translation',
				];

			}  // end if

			/**
			 * Dashboard widget footer actions.
			 *
			 * Filters the additions actions displayed in Elementor dashboard widget.
			 *
			 * Developers can add new action links to Elementor dashboard widget
			 * footer using this filter.
			 *
			 * @since 1.4.8
			 *
			 * @param array $additions_actions Elementor dashboard widget footer actions.
			 */
			$additions_actions = apply_filters( 'tbex/filter/admin/dashboard_overview_widget/footer_actions', $additions_actions );

			$actions = $base_actions + $additions_actions;

			return $actions;

		}  // end method


		/**
		 * Register enqueue additional styles needed for the Dashboard widget.
		 *
		 * @since 1.4.8
		 */
		public function styles( $hook ) {

			$screen = get_current_screen();

			if ( 'dashboard' === $screen->id || 'dashboard-network' === $screen->id ) {

				wp_register_style(
					'tbex-dashboard-widget',
					plugins_url( '/assets/css/tbex-dashboard.css', dirname( dirname( __FILE__ ) ) ),
					array(),
					TBEX_PLUGIN_VERSION,
					'screen'
				);

				wp_enqueue_style( 'tbex-dashboard-widget' );

			}  // end if

		}  // end method

	}  // end of class

endif;


/** Instantiate the class */
new Dashboard_Widget();
