<?php

// includes/admin/views/settings-tab-about-support

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}

/**
 * Tab About & Support - "About" content.
 *
 * @since 1.0.0
 * @since 1.4.0 Optimizations.
 * @since 1.4.3 Integrate with Site Healt feature (WP 5.2+).
 *
 * @uses ddw_tbex_get_info_url()
 * @uses ddw_tbex_get_info_link()
 * @uses ddw_tbex_is_elementor_active()
 * @uses ddw_tbex_coding_years()
 * @uses ddw_tbex_string_toolbar_extras()
 * @uses ddw_tbex_is_wp52_install()
 */

$tbex_info = (array) ddw_tbex_info_values();

?>
	<div class="tbex-about-support">
		<div class="tbex-as-column first-as">
			<h3 class="tbex-as-section"><?php _e( 'My Plugin Story', 'toolbar-extras' ); ?></h3>
			<blockquote class="tbex-quote">
				<span class="dashicons-before dashicons-format-quote tbex-quote-icon"></span>
				<?php echo sprintf(
					/* translators: %1$s - Plugin title (Multisite Toolbar Additions / %2$s - Plugin title (Toolbar Extras) */
					__( 'When I was building a lot of sites over the last ten years I had the need for a Toolbar helper plugin where all essential links would be easily accessible and there when I need them. So, I built this plugin to scratch my own itch. The first code was written in 2012 and relased as %1$s. That plugin matured during the next two years and was used on all my install as a foundation. In 2017 I discovered the Elementor Page Builder and immediately fell in love with this tool. Over the months it was more than clear I needed to update or completely rebuild my favorite plugin to work perfectly with my Elementor site building process. Of course, I opted for the latter way. So, based on that proven foundation %2$s was born in February and March of 2018 after lots of coding days, sleepless nights and way too much coffee. All my passion and my experience went into it to make an awesome little helper tool for us Site Builders out there. I hope you find it as useful and like it as much as I do. Happy site building, yeah!', 'toolbar-extras' ),
					sprintf(
						'<a href="%1$s" target="_blank" rel="nofollow noopener noreferrer">&#x00BB;%2$s&#x00AB;</a>',
						ddw_tbex_get_info_url( 'url_mstba' ),
						/* translators: Plugin title */
						__( 'Multisite Toolbar Additions', 'toolbar-extras' )
					),
					/* translators: Plugin title */
					'<strong>&#x00BB;' . ddw_tbex_string_toolbar_extras() . '&#x00AB;</strong>'
				); ?>
				<div class="tbex-author">
					<div class="tbex-author-image"><a href="<?php echo ddw_tbex_get_info_url( 'url_donate' ); ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo sprintf(
						'<img src="%1$s" width="%2$s" height="%2$s" alt="Profile picture" title="%3$s" />',
						ddw_tbex_get_info_url( 'author_avatar' ),
						80,
						esc_attr__( 'David Decker, Plugin author', 'toolbar-extras' )
					); ?></a></div>
					<div class="tbex-author-meta">
						<cite class="tbex-cite cite-first">&ndash; <?php echo esc_html( $tbex_info[ 'author' ] ); ?> (<?php _e( 'Plugin author', 'toolbar-extras' ); ?>)</cite>
						<cite class="tbex-cite"><?php _e( 'March &amp; April of 2018', 'toolbar-extras' ); ?></cite>
					</div>
					<div class="clear clearfix"></div>
				</div>
			</blockquote>

			<h3 class="tbex-as-section tbex-inner"><?php _e( 'Share the Love', 'toolbar-extras' ); ?></h3>
			<p>
				<strong><span class="tbex-review">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <?php _e( 'If you find it useful please add a 5-star review for the plugin at WordPress.org', 'toolbar-extras' ); ?></strong>
				<br /><?php echo ddw_tbex_get_info_link( 'url_wporg_review', __( 'Write Review', 'toolbar-extras' ), 'button tbex-button dashicons-before dashicons-external' ); ?>
			</p>
			<p>
				<strong><?php _e( 'Subscripe to our YouTube Channel and give our videos a thumbs up', 'toolbar-extras' ); ?></strong>
				<br /><?php echo sprintf(
					'<a class="button tbex-button" href="%1$s" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-video-alt3 tbex-videos"></span> %2$s</a>',
					ddw_tbex_get_info_url( 'url_video_channel' ),
					esc_attr__( 'Subscribe YouTube Channel', 'toolbar-extras' )
				); ?> <?php echo sprintf(
					'<a class="button tbex-button" href="%1$s" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-playlist-video tbex-videos"></span> %2$s</a>',
					ddw_tbex_get_info_url( 'url_video_plist' ),
					esc_attr__( 'See Playlist for Toolbar Extras', 'toolbar-extras' )
				); ?>
			</p>
			<p>
				<strong><?php _e( 'Share at Social Media', 'toolbar-extras' ); ?></strong>
				<br /><?php echo sprintf(
					'<a class="tbex-share" href="%s" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-twitter"></span> Twitter</a>',
					ddw_tbex_is_german() ? ddw_tbex_get_info_url( 'url_tweet_de', 'tbex', TRUE ) : ddw_tbex_get_info_url( 'url_tweet_en', 'tbex', TRUE )
				); ?> <?php echo sprintf(
					'<a class="tbex-share" href="%s" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-facebook"></span> Facebook</a>',
					ddw_tbex_get_info_url( 'url_fb_share', 'tbex', TRUE )
				); ?> <?php echo sprintf(
					'<a class="tbex-share" href="%s" target="_blank" rel="noopener noreferrer"><span class="dashicons-before dashicons-share"></span> LinkedIn</a>',
					ddw_tbex_get_info_url( 'url_lin_share', 'tbex', TRUE )
				); ?>
			</p>
		</div>

		<div class="tbex-as-column second-as">
			<h3 class="tbex-as-section"><?php _e( 'I Need Your Support', 'toolbar-extras' ); ?></h3>
			<a href="<?php echo ddw_tbex_get_info_url( 'url_donate' ); ?>" target="_blank" rel="nofollow noopener noreferrer"><span class="dashicons-before dashicons-heart tbex-heart-icon"></span></a>
			<p>
				<?php _e( 'Your contribution makes the difference! To support further development and support/ maintenance of the plugin, please consider donating.', 'toolbar-extras' ); ?>
			</p>
			<p>
				<?php echo ddw_tbex_get_info_link( 'url_donate', __( 'Donate Now!', 'toolbar-extras' ), 'button button-primary button-hero tbex-donate' ); ?>
			</p>
			<p class="description">
				<?php _e( 'Thanks in advance for any donations and support!', 'toolbar-extras' ); ?>
			</p>
			<p>
				<?php _e( 'Stay tuned: I want to add more plugin and theme support and hopefully a few add-ons.', 'toolbar-extras' ); ?>
			</p>

			<h3 class="tbex-as-section tbex-inner"><?php _e( 'Join a thriving Community of Site Builders', 'toolbar-extras' ); ?></h3>
			<p>
				<?php echo sprintf(
					/* translators: %s - name of the plugin, "Toolbar Extras" */
					__( 'Get all future insider news about the %s plugin and more fine WordPress plugins from DECKERWEB.', 'toolbar-extras' ),
					'<em>' . ddw_tbex_string_toolbar_extras() . '</em>'
				); ?> 
				<?php _e( 'On top of that get useful tutorials and awesome deals for great WordPress plugins and services.', 'toolbar-extras' ); ?> 
				<strong><?php echo __( 'Subscribe to my Newsletter', 'toolbar-extras' ) . ':'; ?></strong>
			</p>
			<p>
				<?php echo sprintf(
					'<a class="button button-secondary button-hero" href="%1$s" target="_blank" rel="nofollow noopener noreferrer">%2$s</a>',
					ddw_tbex_get_info_url( 'url_newsletter' ),
					__( 'Join my Newsletter Now!', 'toolbar-extras' )
				); ?>
			</p>

			<h3 class="tbex-as-section tbex-inner"><?php _e( 'How To Get Support', 'toolbar-extras' ); ?></h3>
			<p>
				<?php _e( 'Thank you for using my plugin! I am happy to help and assist with any question or feedback you have for this plugin.', 'toolbar-extras' ); ?>
			</p>
			<p>
				<strong><span class="dashicons-before dashicons-admin-page"></span> <?php _e( 'Plugin documentation &amp; Knowledge Base articles', 'toolbar-extras' ); ?></strong>
				<br /><?php echo ddw_tbex_get_info_link( 'url_plugin_docs', __( 'Documentation', 'toolbar-extras' ), 'button tbex-button' ); ?>
			</p>
			<p>
				<strong><span class="dashicons-before dashicons-groups"></span> <?php _e( 'Facebook Community Group for Toolbar Extras plugin', 'toolbar-extras' ); ?></strong>
				<br /><?php echo ddw_tbex_get_info_link( 'url_fb_group', __( 'Facebook Group', 'toolbar-extras' ), 'button tbex-button' ); ?>
			</p>
			 <p>
				<strong><span class="dashicons-before dashicons-editor-help"></span> <?php _e( 'Free product support @ WordPress.org plugin forum', 'toolbar-extras' ); ?></strong>
				<br /><?php echo ddw_tbex_get_info_link( 'url_wporg_forum', __( 'Support Forum', 'toolbar-extras' ), 'button tbex-button' ); ?>
			</p>
			<?php if ( ddw_tbex_is_wp52_install() ) : ?>
				<p>
					<strong><span class="dashicons-before dashicons-info"></span> <?php _e( 'Site Health System Debug information - for Support purposes', 'toolbar-extras' ); ?></strong>
					<br /><?php echo sprintf(
						'<a class="button tbex-button" href="%1$s" target="_blank" rel="noopener noreferrer" title="%2$s (%3$s)">%2$s <small>(%3$s)</small></a>',
						esc_url( admin_url( 'site-health.php?tab=debug' ) ),
						esc_html__( 'Show Debug Info', 'toolbar-extras' ),
						esc_html__( 'by WordPress', 'toolbar-extras' )
					); ?>
				</p>
			<?php endif; ?>
			<?php if ( ddw_tbex_is_elementor_active() ) : ?>
				<p>
					<strong><span class="dashicons-before dashicons-info"></span> <?php _e( 'Inspect system information - or use for Support purposes', 'toolbar-extras' ); ?></strong>
					<br /><?php echo sprintf(
						'<a class="button tbex-button" href="%1$s" target="_blank" rel="noopener noreferrer" title="%2$s (%3$s)">%2$s <small>(%3$s)</small></a>',
						esc_url( admin_url( 'admin.php?page=elementor-system-info' ) ),
						esc_html__( 'Show System Info', 'toolbar-extras' ),
						esc_html__( 'by Elementor', 'toolbar-extras' )
					); ?> <?php echo sprintf(
						'<a class="button tbex-button" href="%1$s" title="%2$s" download>%2$s</a>',
						esc_url( admin_url( 'admin-ajax.php?action=elementor_system_info_download_file' ) ),
						esc_html__( 'Download', 'toolbar-extras' )
					); ?>
				</p>
			<?php endif; ?>
		</div>

		<div class="tbex-copyright">
			<p>
				<?php echo sprintf(
					'<a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a>',
					esc_url( $tbex_info[ 'url_license' ] ),
					esc_attr( $tbex_info[ 'license' ] ),
					ddw_tbex_coding_years(),
					esc_url( $tbex_info[ 'author_uri' ] ),
					esc_html( $tbex_info[ 'author' ] )
				); ?>
			</p>
		</div>
	</div>
	<div class="clear clearfix"></div>
