<?php

// includes/themes/items-atomic-blocks

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_atomic_blocks', 100 );
/**
 * Items for Theme: Atomic Blocks (free, by Atomic Blocks/ Array Themes)
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_theme_title()
 * @uses ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_atomic_blocks() {

	/** Theme creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title( 'title', 'child' ),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'atomicblockscmz-theme-options',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Theme Options', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'atomic_blocks_theme_options' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Theme Options', 'toolbar-extras' ) )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'atomicblockscmz-colors',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Colors', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'colors' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Colors', 'toolbar-extras' ) )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'atomicblockscmz-background-image',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Background Image', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'background_image' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Background Image', 'toolbar-extras' ) )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'atomicblockscmz-site-identity',
					'parent' => 'theme-creative-customize',
					/* translators: Autofocus section in the Customizer */
					'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
					'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_atomic_blocks_resources', 120 );
/**
 * General resources items for Atomic Blocks Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_atomic_blocks_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for Atomic Blocks */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/atomic-blocks'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://atomicblocks.com/theme-help-file'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/atomic-blocks'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/ArrayHQ/atomic-blocks-theme'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://atomicblocks.com/'
	);

}  // end function
