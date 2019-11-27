<?php

// includes/items-plugins-sitegroup-manage-content

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: WooCommerce (free, by Automattic)
 * @since 1.0.0
 */
if ( ddw_tbex_is_woocommerce_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-woocommerce.php';
}


/**
 * Plugin: Popup Maker (free, by WP Popup Maker & Daniel Iser)
 * @since 1.0.0
 */
if ( class_exists( 'Popup_Maker' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-popup-maker.php';
}


/**
 * Plugin: Sermon Manager for WordPress (free, by WP for Church)
 * @since 1.4.9
 */
if ( class_exists( 'SermonManager' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-sermon-manager.php';
}


/**
 * Plugin: Simple Links (free, by Mat Lipe)
 * @since 1.4.0
 */
if ( defined( 'SIMPLE_LINKS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-links.php';
}


/**
 * Plugin: WP Document Revisions (free, by Ben Balter)
 *   Add-On Plugin: WP Document Revisions Simple Downloads (free, by David Decker - DECKERWEB)
 * @since 1.3.9
 */
if ( class_exists( 'WP_Document_Revisions' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-wp-document-revisions.php';
}


/**
 * Plugin: Delightful Downloads (free, by Ashley Rich)
 * @since 1.0.0
 */
if ( class_exists( 'Delightful_Downloads' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-delightful-downloads.php';
}


/**
 * Plugin: Download Monitor (free, by Never5)
 * @since 1.0.0
 */
if ( defined( 'DLM_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-download-monitor.php';
}


/**
 * Plugin: Thirsty Affiliates (free, by Rymera Web Co.)
 * @since 1.0.0
 */
if ( class_exists( 'ThirstyAffiliates' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-thirsty-affiliates.php';
}


/**
 * Plugin: Simple URLs (free, by StudioPress)
 * @since 1.0.0
 */
if ( class_exists( 'SimpleURLs' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-simple-urls.php';
}


/**
 * Plugin: Easy Digital Downloads (free)
 * @since 1.0.0
 */
if ( ddw_tbex_is_edd_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-edd.php';
}


/**
 * Plugin: TablePress (free, by Tobias Bäthge)
 * @since 1.0.0
 */
if ( class_exists( 'TablePress' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-tablepress.php';
}


/**
 * Plugin: Cherry Testimonials (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-testimonials.php';
}


/**
 * Plugin: Cherry Team Members (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Team_Members' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-team-members.php';
}


/**
 * Plugin: Cherry Services List (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Services_List' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-services-list.php';
}


/**
 * Plugin: Cherry Projects (free, by Zemez)
 * @since 1.1.0
 */
if ( class_exists( 'Cherry_Projects' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-cherry-projects.php';
}


/**
 * Plugin: TM Timline (free, by Jetimpex/ Zemez)
 * @since 1.2.0
 */
if ( defined( 'TM_TIMELINE_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins/items-tm-timeline.php';
}
