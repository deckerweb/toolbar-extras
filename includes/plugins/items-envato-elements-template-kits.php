<?php

// includes/plugins/items-envato-elements-template-kits

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Logic to get and set labels and flag strings based on the current set default
 *   Page Builder.
 *
 * @since 1.4.0
 *
 * @uses ddw_tbex_get_default_pagebuilder()
 *
 * @return array Array of different types - labels etc.
 */
function ddw_tbex_envatoelements_type() {

	/** Get defaults */
	$default_builder = ddw_tbex_get_default_pagebuilder();
	$label           = '';
	$builder         = '';

	$types = array();

	/** Logic for supported Page Builders */
	if ( 'elementor' === $default_builder ) {

		$types[ 'label' ]   = ddw_tbex_string_elementor();
		$types[ 'builder' ] = 'elementor';

	} elseif ( 'beaver-builder' === $default_builder ) {

		$types[ 'label' ]   = __( 'Beaver Builder', 'toolbar-extras' );
		$types[ 'builder' ] = 'beaver-builder';

	} else {

		$types[ 'label' ]   = '';
		$types[ 'builder' ] = 'none';

	}  // end if

	$types[ 'title_kits' ]   = sprintf(
		/* translators: %s - Name of default Page Builder, for example "Elementor" */
		esc_attr__( '%s Template Kits', 'toolbar-extras' ),
		$types[ 'label' ]
	);
	$types[ 'title_blocks' ] = sprintf(
		/* translators: %s - Name of default Page Builder, for example "Elementor" */
		esc_attr__( '%s Blocks', 'toolbar-extras' ),
		$types[ 'label' ]
	);

	return $types;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_aoitems_envato_elements_template_kits', 100 );
/**
 * Items for Add-On: Envato Elements – Template Kits (free, by Envato)
 *
 * @since 1.4.0
 * @since 1.4.3 Changed URLs; added new sub items & resources.
 *
 * @uses ddw_tbex_envatoelements_type()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_aoitems_envato_elements_template_kits( $admin_bar ) {

	/** Get types logic for default builder & labels */
	$types = ddw_tbex_envatoelements_type();

	/** Bail early if no supported default Page Builder set */
	if ( 'none' === $types[ 'builder' ] ) {
		return $admin_bar;
	}

	/** Template import */
	$admin_bar->add_node(
		array(
			'id'     => 'envato-elements-start',
			'parent' => 'group-demo-import',
			'title'  => ddw_tbex_item_title_with_settings_icon( esc_attr__( 'Envato Elements', 'toolbar-extras' ), 'general', 'demo_import_icon' ),
			'href'   => esc_url( admin_url( 'admin.php?page=envato-elements' ) ),
			'meta'   => array(
				'class'  => 'tbex-import-templates',
				'target' => '',
				'title'  => esc_attr__( 'Template Kits via Envato Elements', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * 1st Sub Item: Template Kits
		 */

		/** Set item title for "Kits" type */
		$title_kits = sprintf(
			/* translators: %s - Name of default Page Builder, for example "Elementor" */
			esc_attr__( '%s Template Kits', 'toolbar-extras' ),
			$types[ 'label' ]
		);

		$admin_bar->add_node(
			array(
				'id'     => 'envato-elements-template-kits-' . $types[ 'builder' ],
				'parent' => 'envato-elements-start',
				'title'  => $types[ 'title_kits' ],
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/' . $types[ 'builder' ] ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ) . ': ' . $types[ 'title_kits' ],
				)
			)
		);


		/**
		 * 2nd Sub Item: Blocks
		 */

		/** Set item title for "Blocks" type */
		$title_blocks = sprintf(
			/* translators: %s - Name of default Page Builder, for example "Elementor" */
			esc_attr__( '%s Blocks', 'toolbar-extras' ),
			$types[ 'label' ]
		);

		$admin_bar->add_node(
			array(
				'id'     => 'envato-elements-blocks-' . $types[ 'builder' ],
				'parent' => 'envato-elements-start',
				'title'  => $types[ 'title_blocks' ],
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/' . $types[ 'builder' ] . '-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ) . ': ' . $types[ 'title_blocks' ],
				)
			)
		);


		/**
		 * 3rd Sub Item: Photos
		 */

		$admin_bar->add_node(
			array(
				'id'     => 'envato-elements-photos',
				'parent' => 'envato-elements-start',
				'title'  => esc_attr__( 'Photos', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/photos' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import', 'toolbar-extras' ) . ': ' . esc_attr__( 'Photos', 'toolbar-extras' ),
				)
			)
		);


		/**
		 * 4th Sub Item: Settings
		 */

		$admin_bar->add_node(
			array(
				'id'     => 'envato-elements-settings',
				'parent' => 'envato-elements-start',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/settings' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Plugin\'s Settings', 'toolbar-extras' ),
				)
			)
		);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-envatoelements-resources',
					'parent' => 'envato-elements-start',
					'meta'   => array( 'class' => 'ab-sub-secondary tbex-group-resources-divider' ),
				)
			);

			ddw_tbex_resource_item(
				'my-account',
				'envatoelements-account',
				'group-envatoelements-resources',
				'https://elements.envato.com/',
				esc_attr__( 'My Envato Elements Account', 'toolbar-extras' )
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'envatoelements-help-kb',
				'group-envatoelements-resources',
				'https://help.elements.envato.com/hc/en-us',
				esc_attr__( 'Help Portal for Envato Elements Service', 'toolbar-extras' )
			);

			ddw_tbex_resource_item(
				'support-forum',
				'envatoelements-support',
				'group-envatoelements-resources',
				'https://wordpress.org/support/plugin/envato-elements',
				esc_attr__( 'Plugin\'s Support Forum', 'toolbar-extras' )
			);

			ddw_tbex_resource_item(
				'translations-community',
				'envatoelements-translate',
				'group-envatoelements-resources',
				'https://translate.wordpress.org/projects/wp-plugins/envato-elements',
				esc_attr__( 'Plugin\'s Translations', 'toolbar-extras' )
			);

		}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_items_new_content_installer_envato_elements', 100 );
/**
 * Add "Envato Elements" installer below Plugins/ Themes installer items in
 *   "New Content" Group.
 *
 * @since 1.4.0
 * @since 1.4.3 Changed URLs.
 *
 * @uses ddw_tbex_envatoelements_type()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_items_new_content_installer_envato_elements( $admin_bar ) {

	/** Get types logic for default builder & labels */
	$types = ddw_tbex_envatoelements_type();

	/** Bail early if no supported default Page Builder set */
	if ( 'none' === $types[ 'builder' ] ) {
		return $admin_bar;
	}

	$admin_bar->add_node(
		array(
			'id'     => 'envatoelements-installer',
			'parent' => 'tbex-installer',
			'title'  => esc_attr__( 'Install Envato Elements', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=envato-elements' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Install Envato Elements', 'toolbar-extras' ),
			)
		)
	);

		$admin_bar->add_node(
				array(
				'id'     => 'envatoelements-installer-kits-' . $types[ 'builder' ],
				'parent' => 'envatoelements-installer',
				'title'  => $types[ 'title_kits' ],
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/' . $types[ 'builder' ] ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install', 'toolbar-extras' ) . ': ' . $types[ 'title_kits' ],
				)
			)
		);

		$admin_bar->add_node(
				array(
				'id'     => 'envatoelements-installer-blocks-' . $types[ 'builder' ],
				'parent' => 'envatoelements-installer',
				'title'  => $types[ 'title_blocks' ],
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/' . $types[ 'builder' ] . '-blocks' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install', 'toolbar-extras' ) . ': ' . $types[ 'title_blocks' ],
				)
			)
		);

		$admin_bar->add_node(
				array(
				'id'     => 'envatoelements-installer-photos',
				'parent' => 'envatoelements-installer',
				'title'  => esc_attr__( 'Photos', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'admin.php?page=envato-elements#/photos' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Install', 'toolbar-extras' ) . ': ' . esc_attr__( 'Photos', 'toolbar-extras' ),
				)
			)
		);

}  // end function
