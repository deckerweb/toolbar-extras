<?php

// includes/plugins-forms/items-qtranslate-xt

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_qtranslate_xt' );
/**
 * Items for Plugin: qTranslate-XT (free, by qTranslate Community)
 *
 * @since 1.4.9
 *
 * @uses ddw_tbex_rand()
 * @uses qtranxf_getSortedLanguages()
 * @uses ddw_tbex_display_items_resources
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_qtranslate_xt( $admin_bar ) {

	$rand = ddw_tbex_rand();

	/** For: Tools */
	$admin_bar->add_node(
		array(
			'id'     => 'tools-qtlxt',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'qTranslate-XT', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'qTranslate-XT', 'toolbar-extras' ),
			)
		)
	);

		/**
		 * Add each individual seaarch form as an item.
		 *   Search forms are saved as a post type therefore a query necessary.
		 * @since 1.4.9
		 */
		$languages = qtranxf_getSortedLanguages();

		/** Proceed only if there are any search forms */
		if ( $languages ) {

			/** Add group */
			$admin_bar->add_group(
				array(
					'id'     => 'group-qtlxt-edit-language',
					'parent' => 'tools-qtlxt',
				)
			);

			foreach ( $languages as $language_key => $language ) {

				$language_id   = sanitize_key( $language );
				$language_name = esc_attr( $GLOBALS[ 'q_config' ][ 'language_name' ][ $language ] );

				$lang_code = sprintf(
					'&#91;:%s&#93;',
					$language_id
				);

				/** Add item per language */
				$admin_bar->add_node(
					array(
						'id'     => 'tools-qtlxt-language-' . $language_id,
						'parent' => 'group-qtlxt-edit-language',
						'title'  => $language_name . ' ' . ddw_tbex_code( $lang_code ),
						'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&edit=' . $language_id ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Edit Language', 'toolbar-extras' ) . ': ' . $language_name,
						)
					)
				);

			}  // end foreach

		}  // end if

		/** All Languages */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-qtlxt-all-languages',
				'parent' => 'tools-qtlxt',
				'title'  => esc_attr__( 'All Languages', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#languages' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'All Languages', 'toolbar-extras' ),
				)
			)
		);

		/** Settings */
		$admin_bar->add_node(
			array(
				'id'     => 'tools-qtlxt-settings',
				'parent' => 'tools-qtlxt',
				'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
				)
			)
		);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-qtlxt-settings-general',
					'parent' => 'tools-qtlxt-settings',
					'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#general' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'General', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-qtlxt-settings-advanced',
					'parent' => 'tools-qtlxt-settings',
					'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#advanced' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Advanced', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-qtlxt-settings-integration',
					'parent' => 'tools-qtlxt-settings',
					'title'  => esc_attr__( 'Custom Integration', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#integration' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Custom Integration', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-qtlxt-settings-import-export',
					'parent' => 'tools-qtlxt-settings',
					'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#import' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Import &amp; Export', 'toolbar-extras' ),
					)
				)
			);

			$admin_bar->add_node(
				array(
					'id'     => 'tools-qtlxt-settings-troubleshooting',
					'parent' => 'tools-qtlxt-settings',
					'title'  => esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'options-general.php?page=qtranslate-xt&rand=' . $rand . '#troubleshooting' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Troubleshooting', 'toolbar-extras' ),
					)
				)
			);

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-qtlxt-resources',
					'parent' => 'tools-qtlxt',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'documentation',
				'qtlxt-docs',
				'group-qtlxt-resources',
				'https://github.com/qtranslate/qtranslate-xt/wiki'
			);

			ddw_tbex_resource_item(
				'faq',
				'qtlxt-faq',
				'group-qtlxt-resources',
				'https://github.com/qtranslate/qtranslate-xt/wiki/FAQ'
			);

			ddw_tbex_resource_item(
				'changelog',
				'qtlxt-changelog',
				'group-qtlxt-resources',
				'https://github.com/qtranslate/qtranslate-xt/blob/master/CHANGELOG.md',
				ddw_tbex_string_version_history( 'plugin' )
			);

			ddw_tbex_resource_item(
				'github-issues',
				'qtlxt-github-issues',
				'group-qtlxt-resources',
				'https://github.com/qtranslate/qtranslate-xt/issues'
			);

			ddw_tbex_resource_item(
				'github',
				'qtlxt-github',
				'group-qtlxt-resources',
				'https://github.com/qtranslate/qtranslate-xt'
			);

		}  // end if

}  // end function
