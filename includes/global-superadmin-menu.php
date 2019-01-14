<?php

// includes/global-super-admin-menu

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Helper function to return filterable hook priority for the super admin nav menu.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_get_option()
 *
 * @return int Hook priority for super admin nav menu.
 */
function ddw_tbex_menu_hook_priority() {

	/**
	 * Make function output filterable:
	 *   Our default value for priority: '9999' (value was always the default of
	 *   this plugin). This way it will be the last item of the left section of
	 *   the toolbar.
	 *
	 * Customizeable via filter hook 'tbex_filter_super_admin_nav_menu_priority'.
	 */
	return absint(
		apply_filters(
			'tbex_filter_super_admin_nav_menu_priority',
			ddw_tbex_get_option( 'general', 'tbex_tbmenu_priority' )	// 9999
		)
	);

}  // end function


add_action( 'init', 'ddw_tbex_super_admin_menu_init', 15 );
/**
 * Setup a custom nav menu intended towards Site Admins (and editable by (Super)
 *    Admins only).
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_string_super_admin_menu_location()
 * @uses ddw_tbex_menu_hook_priority()
 */
function ddw_tbex_super_admin_menu_init() {

	/** Register the menu */
	register_nav_menu(
		'tbex_menu',
		ddw_tbex_string_super_admin_menu_location()
	);

	/** Add menu logic/ structure etc. */
	add_action(
		'admin_bar_menu',
		'ddw_tbex_build_custom_menu',
		ddw_tbex_menu_hook_priority()
	);

}  // end function


/**
 * Build the custom menu for the Toolbar and hook it in.
 *
 * @since 1.0.0
 *
 * @uses has_nav_menu()           To check if menu is registered.
 * @uses get_nav_menu_locations() To get menu locations.
 * @uses wp_get_nav_menu_object() To get menu object.
 * @uses wp_get_nav_menu_items()  To get menu args.
 *
 * @param object $wp_admin_bar
 *
 * @global mixed $wp_admin_bar
 */
function ddw_tbex_build_custom_menu( $wp_admin_bar ) {

	global $wp_admin_bar;
	
	/** Set unique menu slug */
	$tbex_menu_name = 'tbex_menu';

	/** Only add menu items if location exists and an actual menu is applied to it */
	if ( has_nav_menu( 'tbex_menu' ) ) {

		if ( ( $tbex_menu_locations = get_nav_menu_locations() )
			&& isset( $tbex_menu_locations[ $tbex_menu_name ] )
		) {

			$tbex_menu_locations = get_nav_menu_locations();
			$tbex_menu           = wp_get_nav_menu_object( $tbex_menu_locations[ $tbex_menu_name ] );
			$tbex_menu_items     = (array) wp_get_nav_menu_items( $tbex_menu->term_id );

			foreach( $tbex_menu_items as $tbex_menu_item ) {

				/** Retrieve the args from the custom menu */
				$tbex_menu_args = array(
					'id'    => 'tbex_' . absint( $tbex_menu_item->ID ),
					'title' => ddw_tbex_item_title_with_settings_icon( esc_html( $tbex_menu_item->title ), 'general', 'tbex_tbmenu_icon' ),
					'href'  => esc_url_raw( $tbex_menu_item->url ),
					'meta'  => array(
						'target' => $tbex_menu_item->target,
						'title'  => esc_html( $tbex_menu_item->attr_title ),
            			'class'  => 'tbex-tbmenu ' . implode( ' ', $tbex_menu_item->classes ),
            		)
            	);  // end of array

				/** Check for parent menu items to allow for threaded menus */
				if ( $tbex_menu_item->menu_item_parent ) {

					$tbex_menu_args[ 'parent' ] = 'tbex_' . $tbex_menu_item->menu_item_parent;

				}  // end if

				/** Only hook items if the menu is setup for our menu location */
				if ( $tbex_menu_item ) {

					$wp_admin_bar->add_node( $tbex_menu_args );

				}  // end if

				unset( $tbex_menu_args );

			}  // end foreach

		}  // end if menu location check

	}  // end if check if a 'tbex_menu' menu exists

}  // end function
