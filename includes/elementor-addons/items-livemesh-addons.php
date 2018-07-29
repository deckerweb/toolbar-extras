<?php

// includes/elementor-addons/items-livemesh-addons

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_livemesh_addons', 100 );
/**
 * Items for Add-On: Addons for Elementor (free/Premium, by Livemesh)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_aoitems_livemesh_addons() {

	/** Use Add-On hook place */
	add_filter( 'tbex_filter_is_addon', '__return_empty_string' );

	/** Check for active Pro version of the Add-On */
	$is_livemesh_pro = FALSE;

	if ( class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons_Pro' )
		|| ( function_exists( 'lae_fs' ) && lae_fs()->can_use_premium_code__premium_only() )
	) {
		$is_livemesh_pro = TRUE;
	}

	/** Get title/ title attribute */
	$livemesh_title_attr = sprintf(
		/* translators: %1$s - Version "Lite" or "Pro" / %2$s - Type "free" or "Premium" */
		esc_attr__( 'Livemesh Elementor Addons %1$s (%2$s Add-On)', 'toolbar-extras' ),
		( $is_livemesh_pro ) ? __( 'Pro', 'toolbar-extras' ) : __( 'Lite', 'toolbar-extras' ),
		( $is_livemesh_pro ) ? __( 'Premium', 'toolbar-extras' ) : __( 'free', 'toolbar-extras' )
	);

	/** Livemesh Settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'ao-livemeshaddons',
			'parent' => 'tbex-addons',
			'title'  => esc_attr__( 'Livemesh Addons', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=livemesh_el_addons' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => $livemesh_title_attr
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-livemeshaddons-elements',
				'parent' => 'ao-livemeshaddons',
				'title'  => esc_attr__( 'Elements &amp; Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=livemesh_el_addons' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Elements &amp; Settings', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'ao-livemeshaddons-inline-docs',
				'parent' => 'ao-livemeshaddons',
				'title'  => esc_attr__( 'Inline Documentation', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=livemesh_el_addons_documentation' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Inline Documentation', 'toolbar-extras' )
				)
			)
		);

		/** For older versions of Pro */
		if ( class_exists( '\LivemeshAddons\Livemesh_Elementor_Addons_Pro' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'ao-livemeshaddons-license',
					'parent' => 'ao-livemeshaddons',
					'title'  => esc_attr__( 'License', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=livemesh_el_addons_license' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'License', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		/** Group: Resources for Livemesh Addons */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-livemeshaddons-resources',
					'parent' => 'ao-livemeshaddons',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			if ( ! $is_livemesh_pro ) {

				ddw_tbex_resource_item(
					'support-forum',
					'livemeshaddons-support',
					'group-livemeshaddons-resources',
					'https://wordpress.org/support/plugin/addons-for-elementor'
				);

			}  // end if

			ddw_tbex_resource_item(
				'facebook-group',
				'livemeshaddons-facebook',
				'group-livemeshaddons-resources',
				'https://www.facebook.com/groups/364780903969891/'
			);

			if ( ! $is_livemesh_pro ) {

				ddw_tbex_resource_item(
					'translations-community',
					'livemeshaddons-translate',
					'group-livemeshaddons-resources',
					'https://translate.wordpress.org/projects/wp-plugins/addons-for-elementor'
				);

			}  // end if

			ddw_tbex_resource_item(
				'support-contact',
				'livemeshaddons-contact',
				'group-livemeshaddons-resources',
				'https://www.livemeshthemes.com/elementor-addons/contact-us/'
			);

			ddw_tbex_resource_item(
				'official-site',
				'livemeshaddons-site',
				'group-livemeshaddons-resources',
				'https://www.livemeshthemes.com/elementor-addons/'
			);

		}  // end if

}  // end function