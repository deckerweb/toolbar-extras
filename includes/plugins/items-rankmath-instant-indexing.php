<?php

// includes/plugins/items-rankmath-instant-indexing

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


//add_action( 'admin_bar_menu', 'ddw_tbex_site_items_rankmath_instant_indexing', 100 );
/**
 * Additional items for Plugin: Instant Indexing for Google (free, by Rank Math)
 *
 * @since 1.4.8
 *
 * @param object $admin_bar Object of Toolbar nodes.
 * @param string $suffix    String for suffix for Toolbar node IDs and group IDs.
 * @param object $admin_bar Object of Toolbar nodes.
 * @return Void.
 */
function ddw_tbex_create_items_rankmath_instant_indexing( $admin_bar, $suffix = '', $parent = '' ) {

	/** Set suffix */
	$suffix = '-' . sanitize_key( $suffix );

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-rankmath-singles-instant-indexing' . $suffix,
			'parent' => sanitize_key( $parent ),		// 'tbex-rankmath-singles',
			'title'  => esc_attr__( 'Instant Indexing', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=instant-indexing' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Instant Indexing for Google', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-instant-indexing-settings' . $suffix,
				'parent' => 'tbex-rankmath-singles-instant-indexing' . $suffix,
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=instant-indexing&tab=settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-instant-indexing-console' . $suffix,
				'parent' => 'tbex-rankmath-singles-instant-indexing' . $suffix,
				'title'  => esc_attr__( 'Console', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=instant-indexing&tab=console' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Console', 'toolbar-extras' ),
				)
			)
		);

		$admin_bar->add_node(
			array(
				'id'     => 'tbex-rankmath-singles-instant-indexing-setup-guide' . $suffix,
				'parent' => 'tbex-rankmath-singles-instant-indexing' . $suffix,
				'title'  => esc_attr__( 'Setup Guide', 'toolbar-extras' ),
				'href'   => 'https://rankmath.com/blog/google-indexing-api/',
				'meta'   => array(
					'class'  => 'ab-sub-secondary tbex-group-resources-divider',
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Setup Guide', 'toolbar-extras' ),
				)
			)
		);

}  // end function


if ( ddw_tbex_is_rankmath_seo_active() || ddw_tbex_detect_rankmath_single_plugins() ) {

	add_action( 'tbex_hookplace_rankmath', 'ddw_tbex_items_instant_indexing_for_rankmath', 100 );
	/**
	 * Items for "Instant Indexing" plugin, hooked in under Rank Math SEO, or
	 *   one of their single plugins, whichever is active.
	 *
	 * @since 1.4.8
	 *
	 * @uses ddw_tbex_create_items_rankmath_instant_indexing()
	 *
	 * @param object $admin_bar Object of Toolbar nodes.
	 */
	function ddw_tbex_items_instant_indexing_for_rankmath( $admin_bar ) {

		ddw_tbex_create_items_rankmath_instant_indexing( $admin_bar, 'rmsplace', 'tbex-rankmath' );

	}  // end function

} else {

	add_action( 'admin_bar_menu', 'ddw_tbex_items_instant_indexing_for_standalone', 100 );
	/**
	 * Items for "Instant Indexing" plugin, hooked as stand alone within the
	 *   Site Group - under "Tools" hook place.
	 *
	 * @since 1.4.8
	 *
	 * @uses ddw_tbex_create_items_rankmath_instant_indexing()
	 *
	 * @param object $admin_bar Object of Toolbar nodes.
	 */
	function ddw_tbex_items_instant_indexing_for_standalone( $admin_bar ) {

		ddw_tbex_create_items_rankmath_instant_indexing( $admin_bar, 'standalone', 'tbex-sitegroup-tools' );

	}  // end function

}  // end if
