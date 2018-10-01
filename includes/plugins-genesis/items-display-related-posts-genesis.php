<?php

// includes/plugins-genesis/items-display-related-posts-genesis

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_customize_genesis_related_posts', 200 );
/**
 * Customizer items for Plugin: Display Related Posts for Genesis (free, by SEO Themes)
 *
 * @since  1.3.5
 *
 * @uses   ddw_tbex_customizer_focus()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_customize_genesis_related_posts() {

	/** Setup for getting the latest public post (ID) */
    $args = array(
        'numberposts' => 1,
        'offset'      => 0,
        'orderby'     => 'post_date',
        'order'       => 'DESC',
        'post_status' => 'publish'
    );

    $latest_post = get_posts( $args );

    /** Add Toolbar item */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-drpg-plugin',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Display Related Posts', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'display_related_posts_for_genesis', get_permalink( $latest_post[0]->ID ) ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Display Related Posts', 'toolbar-extras' ) )
			)
		)
	);

}  // end function