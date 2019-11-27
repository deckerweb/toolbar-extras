<?php

// includes/plugins/items-toolbelt

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_toolbelt', 10 );
/**
 * Items for Plugin: WP Toolbelt (free, by Ben Gillbanks)
 *
 * @since 1.4.9
 *
 * @uses \DDW\TBEX\Items_CPT_Generic()
 * @uses TOOLBELT_PORTFOLIO_CUSTOM_POST_TYPE (from Toolbelt)
 * @uses TOOLBELT_TESTIMONIALS_CUSTOM_POST_TYPE (from Toolbelt)
 * @uses ddw_tbex_display_items_resources()
 * @uses ddw_tbex_resource_item()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_site_items_toolbelt( $admin_bar ) {

	$admin_bar->add_node(
		array(
			'id'     => 'tbex-toolbelt',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Toolbelt', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=toolbelt-modules' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Toolbelt', 'toolbar-extras' ),
			)
		)
	);

		/** Group: Post Types */
		$toolbelt_options = get_option( 'toolbelt_options' );

		if ( ( isset( $toolbelt_options[ 'projects' ] ) && 'on' === $toolbelt_options[ 'projects' ] )
			|| ( isset( $toolbelt_options[ 'testimonials' ] ) && 'on' === $toolbelt_options[ 'testimonials' ] )
		) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-toolbelt-posttypes',
					'parent' => 'tbex-toolbelt',
				)
			);

				/** Portfolio CPT */
				if ( isset( $toolbelt_options[ 'projects' ] ) && 'on' === $toolbelt_options[ 'projects' ] ) {

					$toolbelt_items_cpt_portfolio = new \DDW\TBEX\Items_CPT_Generic();
					$toolbelt_items_cpt_portfolio->init( TOOLBELT_PORTFOLIO_CUSTOM_POST_TYPE, '', 20, 'group-toolbelt-posttypes', 'tbprojects' );

						$admin_bar->add_node(
							array(
								'id'     => 'generic-cpt-tbprojects-toolbelt-portfolio-types',
								'parent' => 'generic-cpt-tbprojects-toolbelt-portfolio',
								'title'  => ddw_tbex_string_dynamic( [ 'prefix' => __( 'Taxonomy', 'toolbar-extras' ) . ' ', 'string' => __( 'Project Types', 'toolbar-extras' ) ] ),
								'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=toolbelt-portfolio-type&post_type=' . TOOLBELT_PORTFOLIO_CUSTOM_POST_TYPE ) ),
								'meta'   => array(
									'target' => '',
									'title'  => ddw_tbex_string_dynamic( [ 'prefix' => __( 'Taxonomy', 'toolbar-extras' ) . ' ', 'string' => __( 'Project Types', 'toolbar-extras' ) ] ),
								)
							)
						);

						$admin_bar->add_node(
							array(
								'id'     => 'generic-cpt-tbprojects-toolbelt-portfolio-tags',
								'parent' => 'generic-cpt-tbprojects-toolbelt-portfolio',
								'title'  => ddw_tbex_string_dynamic( [ 'prefix' => __( 'Taxonomy', 'toolbar-extras' ) . ' ', 'string' => __( 'Project Tags', 'toolbar-extras' ) ] ),
								'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=toolbelt-portfolio-tag&post_type=' . TOOLBELT_PORTFOLIO_CUSTOM_POST_TYPE ) ),
								'meta'   => array(
									'target' => '',
									'title'  => ddw_tbex_string_dynamic( [ 'prefix' => __( 'Taxonomy', 'toolbar-extras' ) . ' ', 'string' => __( 'Project Tags', 'toolbar-extras' ) ] ),
								)
							)
						);

				}  // end if Portfolio CPT check

				/** Testimonial CPT */
				if ( isset( $toolbelt_options[ 'testimonials' ] ) && 'on' === $toolbelt_options[ 'testimonials' ] ) {

					$toolbelt_items_cpt_portfolio = new \DDW\TBEX\Items_CPT_Generic();
					$toolbelt_items_cpt_portfolio->init( TOOLBELT_TESTIMONIALS_CUSTOM_POST_TYPE, '', 20, 'group-toolbelt-posttypes', 'tbtestimonials' );

				}  // end if Testimonial CPT check

		}  // end if Toolbelt Module check


		/** Group: General */
		$admin_bar->add_group(
			array(
				'id'     => 'group-toolbelt-general',
				'parent' => 'tbex-toolbelt',
			)
		);

			/** Modules */
			$admin_bar->add_node(
				array(
					'id'     => 'tbex-toolbelt-modules',
					'parent' => 'group-toolbelt-general',
					'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=toolbelt-modules' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Modules', 'toolbar-extras' ),
					)
				)
			);

			/** Optional: Settings */
			if ( has_action( 'toolbelt_module_settings_fields' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-toolbelt-settings',
						'parent' => 'group-toolbelt-general',
						'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=toolbelt-settings' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Settings', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

			/** Optional: Processes */
			if ( has_action( 'toolbelt_module_tools' ) ) {

				$admin_bar->add_node(
					array(
						'id'     => 'tbex-toolbelt-processes',
						'parent' => 'group-toolbelt-general',
						'title'  => esc_attr__( 'Processes', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=toolbelt-tools' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Processes', 'toolbar-extras' ),
						)
					)
				);

			}  // end if

		/** Group: Plugin's resources */
		if ( ddw_tbex_display_items_resources() ) {

			$admin_bar->add_group(
				array(
					'id'     => 'group-toolbelt-resources',
					'parent' => 'tbex-toolbelt',
					'meta'   => array( 'class' => 'ab-sub-secondary' ),
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'toolbelt-support',
				'group-toolbelt-resources',
				'https://wordpress.org/support/plugin/wp-toolbelt'
			);

			ddw_tbex_resource_item(
				'documentation',
				'toolbelt-docs',
				'group-toolbelt-resources',
				'https://github.com/BinaryMoon/wp-toolbelt/wiki'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'toolbelt-translate',
				'group-toolbelt-resources',
				'https://translate.wordpress.org/projects/wp-plugins/wp-toolbelt'
			);

			ddw_tbex_resource_item(
				'github',
				'toolbelt-github',
				'group-toolbelt-resources',
				'https://github.com/BinaryMoon/wp-toolbelt'
			);

		}  // end if

}  // end function
