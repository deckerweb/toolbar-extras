<?php

// includes/elementor-official/items-elementor-pro

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_theme_builder', 99 );
/**
 * Add sub items for "Elementor Pro" plugin: Theme Builder templates.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_use_tweak_elementor_display_tbuilder()
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_theme_builder() {

	/** Bail early if Elementor is not set as default page builder */
	if ( 'elementor' !== ddw_tbex_get_default_pagebuilder()
		|| ! ddw_tbex_use_tweak_elementor_display_tbuilder()
		|| ! ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' )
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-themebuilder',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Theme Builder', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=theme' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: %s - word "Elementor" */
					esc_attr__( '%s Theme Builder', 'toolbar-extras' ),
					ddw_tbex_string_elementor()
				)
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-themebuilder-all',
				'parent' => 'elementor-themebuilder',
				'title'  => esc_attr__( 'All Theme Areas', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=theme' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Theme Areas', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-themebuilder-new',
				'parent' => 'elementor-themebuilder',
				'title'  => esc_attr__( 'New Theme Area', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=theme#add_new' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Theme Area', 'toolbar-extras' )
				)
			)
		);

		/** New Theme Area type - splitted in single items */
		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-themebuilder-type',
				'parent' => 'elementor-themebuilder',
				'title'  => esc_attr__( 'New Theme Area Type', 'toolbar-extras' ),
				'href'   => '',
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'New Theme Area Type', 'toolbar-extras' )
				)
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-header',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Header', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=header#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Header Sections', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-footer',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Footer', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=footer#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Footer Sections', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-single',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Single', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=single#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Single Content Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-archives',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Archive', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=archive#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Archive Content Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-product',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Product', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=product#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Product Content Blocks', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-themebuilder-type-product-archives',
					'parent' => 'elementor-themebuilder-type',
					'title'  => esc_attr_x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=product-archive#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr__( 'Template Type: Product Archive Content Blocks', 'toolbar-extras' )
					)
				)
			);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_popups', 99 );
/**
 * Add sub items for "Elementor Pro" plugin: Popup templates.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_default_pagebuilder()
 * @uses ddw_tbex_is_elementor_version()
 * @uses ddw_tbex_use_tweak_elementor_display_popups()
 * @uses ddw_tbex_string_elementor()
 * @uses ddw_tbex_meta_target()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_popups() {

	/** Bail early if Elementor is not set as default page builder */
	if ( 'elementor' !== ddw_tbex_get_default_pagebuilder()
		|| ! ddw_tbex_use_tweak_elementor_display_popups()
		|| ! ddw_tbex_is_elementor_version( 'core', TBEX_ELEMENTOR_240_BETA, '>=' )
	) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-popups',
			'parent' => 'group-creative-content',
			'title'  => esc_attr__( 'Popups', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=popup&elementor_library_type=popup' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => sprintf(
					/* translators: %s - word "Elementor" */
					esc_attr__( '%s Popups', 'toolbar-extras' ),
					ddw_tbex_string_elementor()
				)
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-popups-all',
				'parent' => 'elementor-popups',
				'title'  => esc_attr__( 'All Popups', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=popup&elementor_library_type=popup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Popups', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-popups-new',
				'parent' => 'elementor-popups',
				'title'  => esc_attr__( 'New Popup', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=popup#add_new' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => esc_attr__( 'New Popup', 'toolbar-extras' )
				)
			)
		);

		if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-popups-with-builder',
					'parent' => 'elementor-popups',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) ),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'popup' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) )
					)
				)
			);

		}  // end if

}  // end function


add_action( 'tbex_before_elementor_library_new', 'ddw_tbex_items_elementor_pro_library_types' );
/**
 * Items for Elementor Library - Pro-only Item(s).
 *   Note: Use of tbex_ action hook to place higher/lower within Elementor
 *         Library stack.
 *
 * @since 1.0.0
 * @since 1.4.0 Added Popup template type.
 *
 * @uses ddw_tbex_is_elementor_version()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_library_types() {

	/** Display only for Elementor 2.0+ */
	if ( ! ddw_tbex_is_elementor_version( 'pro', '2.0.0', '>=' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-widgets',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Widgets', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=widget' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Widget Blocks', 'toolbar-extras' )
			)
		)
	);

	if ( ddw_tbex_is_elementor_version( 'pro', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-library-popups',
				'parent' => 'elibrary-types',
				/* translators: Elementor Template type */
				'title'  => esc_attr_x( 'Popups', 'Elementor Template type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&tabs_group=popup&elementor_library_type=popup' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Type: Popups', 'toolbar-extras' )
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-headers',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Header', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=header' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Header Sections', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-footers',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Footer', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=footer' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Footer Sections', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-single',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Single', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=single' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Single Content Blocks', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-library-archives',
			'parent' => 'elibrary-types',
			/* translators: Elementor Template type */
			'title'  => esc_attr_x( 'Archive', 'Elementor Template type', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=archive' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Template Type: Archive Content Blocks', 'toolbar-extras' )
			)
		)
	);

	if ( ddw_tbex_is_elementor_version( 'pro', '2.1.0', '>=' )
		&& ddw_tbex_is_woocommerce_active()
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-library-product-single',
				'parent' => 'elibrary-types',
				/* translators: Elementor Template type */
				'title'  => esc_attr_x( 'Product', 'Elementor Template type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=prodcut' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Type: Product Content Blocks', 'toolbar-extras' )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'elementor-library-product-archives',
				'parent' => 'elibrary-types',
				/* translators: Elementor Template type */
				'title'  => esc_attr_x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=product-archive' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Template Type: Product Archive Content Blocks', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'tbex_after_elementor_library_builder', 'ddw_tbex_items_elementor_pro_add_library_types_with_builder' );
/**
 * Items for Elementor Library - Pro-only template types.
 *   Note: Use of tbex_ action hook to place higher/lower within Elementor
 *         Library stack.
 *
 * @since 1.1.0
 * @since 1.4.0 Added Popup template type.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_add_library_types_with_builder() {

	if ( ddw_tbex_is_elementor_version( 'pro', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'et-build-template-popup',
				'parent' => 'elementor-library-new-builder',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'popup' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'et-build-template-header',
			'parent' => 'elementor-library-new-builder',
			'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Header', 'Elementor Template type', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_get_elementor_template_add_new_url( 'header' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Header', 'Elementor Template type', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'et-build-template-footer',
			'parent' => 'elementor-library-new-builder',
			'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Footer', 'Elementor Template type', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_get_elementor_template_add_new_url( 'footer' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Footer', 'Elementor Template type', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'et-build-template-single',
			'parent' => 'elementor-library-new-builder',
			'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Single', 'Elementor Template type', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_get_elementor_template_add_new_url( 'single' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Single', 'Elementor Template type', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'et-build-template-archive',
			'parent' => 'elementor-library-new-builder',
			'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Archive', 'Elementor Template type', 'toolbar-extras' ) ),
			'href'   => ddw_tbex_get_elementor_template_add_new_url( 'archive' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target( 'builder' ),
				'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Archive', 'Elementor Template type', 'toolbar-extras' ) )
			)
		)
	);

	if ( ddw_tbex_is_elementor_version( 'pro', '2.1.0', '>=' )
		&& ddw_tbex_is_woocommerce_active()
	) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'et-build-template-product',
				'parent' => 'elementor-library-new-builder',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Product', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'product' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Product', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'et-build-template-product-archive',
				'parent' => 'elementor-library-new-builder',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'product-archive' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro', 100 );
/**
 * Add Elementor Pro items
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro() {

	/** Pro: Integrations */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-settings-integrations',
			'parent' => 'elementor-settings',
			'title'  => esc_attr__( 'Pro: Integrations', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor#tab-integrations' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Pro: Integrations &amp; APIs', 'toolbar-extras' )
			)
		)
	);

	/** Pro: License */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-tools-license',
			'parent' => 'elementor-tools',
			'title'  => esc_attr__( 'Pro: License', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=elementor-license' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Pro: License', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_fonts', 130 );
/**
 * Add Elementor Pro - Custom Fonts items
 *   NOTE: Later hook priority to place lower within the active theme stack.
 *
 * @since 1.0.0
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_fonts() {

	/** Group: Pro Custom Fonts */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-elementor-fonts',
			'parent' => 'elementor-library'
		)
	);

	/** Pro: Custom Fonts */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-fonts-all',
			'parent' => 'group-elementor-fonts',
			'title'  => esc_attr__( 'All Fonts', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_font' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'All Fonts', 'toolbar-extras' )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'elementor-fonts-new',
			'parent' => 'group-elementor-fonts',
			'title'  => esc_attr__( 'New Font', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=elementor_font' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Upload New Font', 'toolbar-extras' )
			)
		)
	);

}  // end function


add_action( 'tbex_after_elementor_resources', 'ddw_tbex_items_elementor_pro_resources' );
/**
 * Items for Elementor Pro resources.
 *   NOTE: Use of tbex_ action hook to place lower within Elementor Resources stack.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_resources() {

	/** Bail early if resources display is disabled */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Add Toolbar nodes */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'epro-resources',
			'parent' => 'group-pagebuilder-resources',
			'title'  => esc_attr__( 'Pro Resources', 'toolbar-extras' ),
			'href'   => ddw_tbex_get_resource_url( 'elementor', 'url_docs_pro' ),
			'meta'   => array(
				'rel'    => ddw_tbex_meta_rel(),
				'target' => ddw_tbex_meta_target(),
				'title'  => esc_attr__( 'Pro Resources', 'toolbar-extras' )
			)
		)
	);

		ddw_tbex_resource_item(
			'pro-docs',
			'epro-resources-docs',
			'epro-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_docs_pro' )
		);

		ddw_tbex_resource_item(
			'translations-pro',
			'epro-resources-translate',
			'epro-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_translations_pro' )
		);

		ddw_tbex_resource_item(
			'my-account',
			'epro-my-account',
			'epro-resources',
			ddw_tbex_get_resource_url( 'elementor', 'url_myaccount' ),
			/* translators: %s - static string "@ elementor.com" (My Account @ elementor.com) */
			sprintf( esc_attr__( 'My Account %s', 'toolbar-extras' ), '@ elementor.com' )
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_developers', 99 );
/**
 * Add Elementor Pro external developers items
 *   NOTE: Only when Dev Mode & Resources are activated.
 *
 * @since 1.0.0
 *
 * @uses ddw_tbex_display_items_dev_mode()
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 * @uses ddw_tbex_get_resource_url()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_developers() {

	/** Bail early if Dev Mode & Resources display are disabled */
	if ( ! ddw_tbex_display_items_dev_mode() && ! ddw_tbex_display_items_resources() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-apis',
		'elementor-developers-apis',
		'elementor-developers',
		ddw_tbex_get_resource_url( 'elementor', 'url_apis_pro' )
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_elementor_pro_new_content', 130 );
/**
 * Add Elementor Pro template types with Page Builder to the "New Content" group.
 *
 * @since 1.1.0
 * @since 1.4.0 Added Popup template type.
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_items_elementor_pro_new_content() {

	/** Bail early if items display is not wanted */
	if ( ! ddw_tbex_display_items_new_content()
		|| ! class_exists( '\Elementor\User' )
	) {
		return;
	}

	if ( \Elementor\User::is_current_user_can_edit_post_type( 'elementor_library' ) ) {

		/** "Popup" templates since Elementor 2.4.0+ */
		if ( ddw_tbex_is_elementor_version( 'pro', TBEX_ELEMENTOR_240_BETA, '>=' ) ) {

			/** For: Build Group as sub item */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'eltpl-popup-with-builder',
					'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) ),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'popup' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Popup', 'Elementor Template type', 'toolbar-extras' ) )
					)
				)
			);

			/** For: New Content as sub item */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'elementor-nclib-new-popup',
					'parent' => 'group-elementor-nclib',
					'title'  => esc_attr_x( 'Popup', 'Elementor - in Toolbar New Content section', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=elementor_library&elementor_library_type=popup#add_new' ) ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => esc_attr_x( 'Popup', 'Elementor - in Toolbar New Content section', 'toolbar-extras' )
					)
				)
			);

		}  // end if

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'eltpl-header-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Header', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'header' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Header', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'eltpl-footer-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Footer', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'footer' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Footer', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'eltpl-single-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Single', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'single' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Single', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'eltpl-archive-with-builder',
				'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
				'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Archive', 'Elementor Template type', 'toolbar-extras' ) ),
				'href'   => ddw_tbex_get_elementor_template_add_new_url( 'archive' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target( 'builder' ),
					'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Archive', 'Elementor Template type', 'toolbar-extras' ) )
				)
			)
		);

		/** "Product" templates for WooCommerce since Elementor 2.1.0+ */
		if ( ddw_tbex_is_elementor_version( 'pro', '2.1.0', '>=' )
			&& ddw_tbex_is_woocommerce_active()
		) {

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'eltpl-product-with-builder',
					'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Product', 'Elementor Template type', 'toolbar-extras' ) ),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'product' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Product', 'Elementor Template type', 'toolbar-extras' ) )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'eltpl-product-archive-with-builder',
					'parent' => ddw_tbex_elementor_addnew_parent(),		//'tbex-elementor-template',
					'title'  => ddw_tbex_string_elementor_template_with_builder( _x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ) ),
					'href'   => ddw_tbex_get_elementor_template_add_new_url( 'product-archive' ),
					'meta'   => array(
						'target' => ddw_tbex_meta_target( 'builder' ),
						'title'  => ddw_tbex_string_elementor_template_create_with_builder( _x( 'Product Archive', 'Elementor Template type', 'toolbar-extras' ) )
					)
				)
			);

		}  // end if

	}  // end if

}  // end function
