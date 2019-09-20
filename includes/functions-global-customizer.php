<?php

// includes/functions-global-customizer

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Build custom autofocus link for the Customizer.
 *
 * @since 1.0.0
 *
 * @param string $type        Type of the autofocus (panel, section, control).
 * @param string $focus       Actual thing to autofocs on.
 * @param string $preview_url URL for preview.
 * @param string $return_url  URL for return after customizing.
 * @return string URL to Customizer with optional query arguments.
 */
function ddw_tbex_customizer_focus( $type = '', $focus = '', $preview_url = '', $return_url = '' ) {

	/** Check autofocus type for the 3 possible values */
	switch ( sanitize_key( $type ) ) {

		case 'panel':
			$type = 'autofocus[panel]';
			break;
		case 'section':
			$type = 'autofocus[section]';
			break;
		case 'control':
			$type = 'autofocus[control]';
			break;
		default:
			$type = '';

	}  // end switch

	/** Get the autofocus element for the set type */
	$query[ $type ] = sanitize_key( $focus );

	/** Determine an optional preview URL */
	$url = ( empty( $preview_url ) ) ? '' : 'url';

	$query[ $url ] = ( empty( $preview_url ) ) ? NULL : esc_url( $preview_url );

	/** Determine an optional return URL */
	$return = ( empty( $return_url ) ) ? '' : 'return';

	$query[ $return ] = ( empty( $return_url ) ) ? NULL : esc_url( $return_url );

	/** Return the new customized Customizer URL */
	return esc_url(
		add_query_arg(
			$query,
			admin_url( 'customize.php' )
		)
	);

}  // end function


/**
 * Build default link to the Customizer.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_customizer_focus()
 *
 * @return string URL to Customizer with homepage as preview page (as query args).
 */
function ddw_tbex_customizer_start() {

	return esc_url(
		apply_filters(
			'tbex_filter_fallback_admin_url',
			ddw_tbex_customizer_focus( '', '', site_url( '/' ) )
		)
	);

}  // end function


/**
 * String "Customize" for use in title attribute.
 *
 * @since 1.0.0
 *
 * @param string $string_element Translated string.
 * @return string String for use in linked title attribute.
 */
function ddw_tbex_string_customize_attr( $string_element ) {

	return sprintf(
		/* translators %s - Element to be customized -- whole text used as title attribute for linked text */
		esc_attr__( 'Customize %s', 'toolbar-extras' ),
		esc_attr( $string_element )
	);

}  // end function


/**
 * Customizer default deep link for a theme - as reusable item function.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_string_customize_design()
 * @uses ddw_tbex_customizer_start()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $id     Unique ID of the Toolbar item.
 * @param string $parent Parent ID to hook this item to.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_theme_creative_customize( $id = '', $parent = '' ) {

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize' : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative' : $parent;

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			'title'  => ddw_tbex_string_customize_design(),
			'href'   => ddw_tbex_customizer_start(),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_design()
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * Customizer deep link for "Site Identity" section (a WordPress default) - as
 *   a reusable item function.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus()
 * @uses ddw_tbex_string_customize_attr()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $id     Unique ID of the Toolbar item.
 * @param string $parent Parent ID to hook this item to.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_site_identity( $id = '', $parent = '' ) {

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize-section-site-identity' : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative-customize' : $parent;

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			/* translators: Autofocus section in the Customizer */
			'title'  => esc_attr__( 'Site Identity', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'section', 'title_tagline' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Site Identity', 'toolbar-extras' ) )
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * Build Customizer deep link item for the Toolbar, based on certain params.
 *   For a few typical panels/sections/controls of WordPress defaults a logic
 *   for predefined params is included.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_customizer_focus() For rendering the URL/preview logic.
 * @uses ddw_tbex_string_customize_attr() For rendering the title attribute.
 * @uses ddw_tbex_meta_target()
 * @uses ddw_tbex_meta_rel()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 *
 * @param string $type        Type of Customizer item (panel/section/control).
 * @param string $item        Unique handle of the actual item.
 * @param string $title       Label of the Toolbar item.
 * @param string $id          Unique ID of the Toolbar item.
 * @param string $parent      Parent ID to hook this item to.
 * @param string $preview_url Optional preview URL within the Customizer.
 * @return object Toolbar item object.
 */
function ddw_tbex_item_customizer( $type = '', $item = '', $title = '', $id = '', $parent = '', $preview_url = '' ) {

	$type = sanitize_key( $type );
	$item = sanitize_key( $item );

	$id      = sanitize_html_class( $id );
	$item_id = empty( $id ) ? 'theme-creative-customize-' . $type . '-' . $item : $id;

	$parent      = sanitize_html_class( $parent );
	$item_parent = empty( $parent ) ? 'theme-creative-customize' : $parent;

	/** Check autofocus type for the 3 possible values */
	switch ( $item ) {

		case 'title_tagline':
			$title = __( 'Site Identity', 'toolbar-extras' );
			break;

		case 'header_image':
			$title = __( 'Header Image', 'toolbar-extras' );
			break;

		case 'background_image':
			$title = __( 'Background Image', 'toolbar-extras' );
			break;

		case 'colors':
			$title = __( 'Colors', 'toolbar-extras' );
			break;

	}  // end switch

	$toolbar_item = $GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => $item_id,
			'parent' => $item_parent,
			/* translators: Autofocus panel/section/control in the Customizer */
			'title'  => esc_attr( $title ),
			'href'   => ddw_tbex_customizer_focus( $type, $item, $preview_url ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'rel'    => ddw_tbex_meta_rel(),
				'title'  => ddw_tbex_string_customize_attr( $title )
			)
		)
	);

	return $toolbar_item;

}  // end function


/**
 * To get filterable hook priority for the optional Customizer deep link items
 *   of a Theme if using the filter 'tbex_filter_items_theme_customizer_deep'.
 *   Default: 90 - that means before various third-party plugin integrations
 *   supported by Toolbar Extras.
 *
 * @since 1.4.0
 *
 * @see plugin file /includes/items-themes.php (at the bottom)
 * @see ddw_tbex_items_theme_customizer_deep()
 *
 * @return int Hook priority for Customizer deep link item.
 */
function ddw_tbex_customizer_deep_items_priority() {

	return absint(
		apply_filters(
			'tbex_filter_customizer_deep_items_priority',
			90
		)
	);

}  // end function


//add_action( 'admin_bar_menu', 'ddw_tbex_items_theme_customizer_deep', 100 );
/**
 * Optionally add Customizer deep links for a supported Theme if it declares an
 *   appropriate array for the filter 'tbex_filter_items_theme_customizer_deep'.
 *   Note: All declared handles will be added as Toolbar nodes. This is achieved
 *         via the wrapper function ddw_tbex_item_customizer() which creates the
 *         individual Toolbar nodes.
 *
 *  This function gets fired at hook 'admin_bar_menu' in (plugin file)
 *  /includes/items-themes.php , at a priority determined via the function
 *  ddw_tbex_customizer_deep_items_priority().
 *
 * @since 1.4.0
 *
 * @see ddw_tbex_item_customizer()
 * @see ddw_tbex_customizer_deep_items_priority()
 * @see plugin file /includes/items-themes.php (at the bottom)
 *
 * @uses ddw_tbex_item_customizer() For rendering the items.
 */
function ddw_tbex_items_theme_customizer_deep() {

	/** Setup the filterable array for Themes/ Plugins to hook in */
	$theme_items = apply_filters(
		'tbex_filter_items_theme_customizer_deep',
		array()
	);

	/**
	 * Set additional declaration for the "Site Identity" item, to have it
	 *   always at the last position.
	 */
	$theme_items[ 'title_tagline' ] = array(
		'type' => 'section',
	);

	/**
	 * Loop through all declared items and add them as Toolbar nodes via our
	 *   helper function ddw_tbex_item_customizer().
	 */
	foreach ( $theme_items as $item_handle => $item_values ) {

		/**
		 * If certain keys not declared in array, have a fallback in place so
		 *   the function ddw_tbex_item_customizer() always gets proper params
		 *   passed.
		 */
		$title       = ! isset( $item_values[ 'title' ] ) || empty( $item_values[ 'title' ] ) ? '' : esc_attr( $item_values[ 'title' ] );
		$id          = ! isset( $item_values[ 'id' ] ) || empty( $item_values[ 'id' ] ) ? '' : sanitize_html_class( $item_values[ 'id' ] );
		$parent      = ! isset( $item_values[ 'parent' ] ) || empty( $item_values[ 'parent' ] ) ? '' : sanitize_html_class( $item_values[ 'parent' ] );
		$preview_url = ! isset( $item_values[ 'preview_url' ] ) || empty( $item_values[ 'preview_url' ] ) ? '' : esc_url( $item_values[ 'preview_url' ] );

		ddw_tbex_item_customizer(
			sanitize_key( $item_values[ 'type' ] ),
			sanitize_key( $item_handle ),
			$title,
			$id,
			$parent,
			$preview_url
		);

	}  // end foreach

}  // end function
