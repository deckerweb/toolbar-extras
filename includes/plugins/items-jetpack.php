<?php

// includes/plugins/items-jetpack

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Remove unethical Jetpack search results Ads as no one needs these anyway.
 *   Additionally remove other promotions and Ads from Jetpack.
 *
 * @link https://wptavern.com/jetpack-7-1-adds-feature-suggestions-to-plugin-search-results#comment-284531
 *
 * @since 1.4.3
 */
add_filter( 'jetpack_show_promotions', '__return_false', 20 );
add_filter( 'can_display_jetpack_manage_notice', '__return_false', 20 );
add_filter( 'jetpack_just_in_time_msgs', '__return_false', 20 );


add_action( 'admin_bar_menu', 'ddw_tbex_site_items_jetpack', 10 );
/**
 * Items for Plugin: Jetpack (free/Premium, by Automattic, Inc./ WordPress.com)
 *
 * @since 1.4.2
 *
 * @uses ddw_tbex_resource_item()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar']
 */
function ddw_tbex_site_items_jetpack() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'tbex-jetpack',
			'parent' => 'tbex-sitegroup-tools',
			'title'  => esc_attr__( 'Jetpack', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'admin.php?page=jetpack#/settings' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'Jetpack', 'toolbar-extras' ),
			)
		)
	);

		/** Group: Contact Form */
		if ( Jetpack::is_module_active( 'contact-form' ) ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetpack-contactform',
					'parent' => 'tbex-jetpack',
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-contactform',
						'parent' => 'group-jetpack-contactform',
						'title'  => esc_attr__( 'Contact Form: Feedback', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'edit.php?post_type=feedback' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Contact Form: Feedback', 'toolbar-extras' )
						)
					)
				);

		}  // end if

		/** Group: Post Types */
		$jetpack_portfolio    = get_option( 'jetpack_portfolio' );
		$jetpack_testimonials = get_option( 'jetpack_testimonial' );

		if ( '1' === $jetpack_portfolio || '1' === $jetpack_testimonials ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetpack-posttypes',
					'parent' => 'tbex-jetpack',
				)
			);

				/** Portfolio CPT */
				if ( '1' === $jetpack_portfolio ) {

					$jp_type_portfolio = 'jetpack-portfolio';

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'tbex-jetpack-portfolio',
							'parent' => 'group-jetpack-posttypes',
							'title'  => esc_attr_x( 'Portfolio', 'Jetpack Portfolio', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_portfolio ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr_x( 'Portfolio', 'Jetpack Portfolio', 'toolbar-extras' )
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'tbex-jetpack-portfolio-all',
								'parent' => 'tbex-jetpack-portfolio',
								'title'  => esc_attr_x( 'All Projects', 'Jetpack Portfolio', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_portfolio ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr_x( 'All Projects', 'Jetpack Portfolio', 'toolbar-extras' )
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'tbex-jetpack-portfolio-new',
								'parent' => 'tbex-jetpack-portfolio',
								'title'  => esc_attr_x( 'New Project', 'Jetpack Portfolio', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr_x( 'New Project', 'Jetpack Portfolio', 'toolbar-extras' )
								)
							)
						);

						/** For: Manage Content */
						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'manage-content-jetpack-portfolio',
								'parent' => 'manage-content',
								'title'  => esc_attr_x( 'Edit Projects', 'Jetpack Portfolio', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_portfolio ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr_x( 'Edit Projects', 'Jetpack Portfolio', 'toolbar-extras' )
								)
							)
						);

						/** Elementor builder */
						if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $jp_type_portfolio ) ) {

							$GLOBALS[ 'wp_admin_bar' ]->add_node(
								array(
									'id'     => 'tbex-jetpack-portfolio-builder',
									'parent' => 'tbex-jetpack-portfolio',
									'title'  => esc_attr_x( 'New Portfolio Builder', 'Jetpack Portfolio', 'toolbar-extras' ),
									'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $jp_type_portfolio ) ),
									'meta'   => array(
										'target' => ddw_tbex_meta_target( 'builder' ),
										'title'  => esc_attr_x( 'New Portfolio Builder', 'Jetpack Portfolio', 'toolbar-extras' )
									)
								)
							);

							if ( ddw_tbex_display_items_new_content() ) {

								$GLOBALS[ 'wp_admin_bar' ]->add_node(
									array(
										'id'     => 'new-jpportfolio-with-builder',
										'parent' => 'new-' . $jp_type_portfolio,
										'title'  => ddw_tbex_string_newcontent_with_builder(),
										'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $jp_type_portfolio ) ),
										'meta'   => array(
											'target' => ddw_tbex_meta_target( 'builder' ),
											'title'  => ddw_tbex_string_newcontent_create_with_builder(),
										)
									)
								);

							}  // end if New Content check

						}  // end if Elementor Builder check

				}  // end if Portfolio CPT check

				/** Testimonial CPT */
				if ( '1' === $jetpack_testimonials ) {

					$jp_type_testimonial = 'jetpack-testimonial';

					$GLOBALS[ 'wp_admin_bar' ]->add_node(
						array(
							'id'     => 'tbex-jetpack-testimonials',
							'parent' => 'group-jetpack-posttypes',
							'title'  => esc_attr__( 'Testimonials', 'toolbar-extras' ),
							'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_testimonial ) ),
							'meta'   => array(
								'target' => '',
								'title'  => esc_attr__( 'Testimonials', 'toolbar-extras' )
							)
						)
					);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'tbex-jetpack-testimonials-all',
								'parent' => 'tbex-jetpack-testimonials',
								'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_testimonial ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'All Testimonials', 'toolbar-extras' )
								)
							)
						);

						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'tbex-jetpack-testimonials-new',
								'parent' => 'tbex-jetpack-testimonials',
								'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'post-new.php?post_type=' . $jp_type_testimonial ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'New Testimonial', 'toolbar-extras' )
								)
							)
						);

						/** For: Manage Content */
						$GLOBALS[ 'wp_admin_bar' ]->add_node(
							array(
								'id'     => 'manage-content-jetpack-testimonial',
								'parent' => 'manage-content',
								'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' ),
								'href'   => esc_url( admin_url( 'edit.php?post_type=' . $jp_type_testimonial ) ),
								'meta'   => array(
									'target' => '',
									'title'  => esc_attr__( 'Edit Testimonials', 'toolbar-extras' )
								)
							)
						);

						/** Elementor builder */
						if ( ddw_tbex_is_elementor_active() && \Elementor\User::is_current_user_can_edit_post_type( $jp_type_testimonial ) ) {

							$GLOBALS[ 'wp_admin_bar' ]->add_node(
								array(
									'id'     => 'tbex-jetpack-testimonials-builder',
									'parent' => 'tbex-jetpack-testimonials',
									'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' ),
									'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $jp_type_testimonial ) ),
									'meta'   => array(
										'target' => ddw_tbex_meta_target( 'builder' ),
										'title'  => esc_attr__( 'New Testimonial Builder', 'toolbar-extras' )
									)
								)
							);

							if ( ddw_tbex_display_items_new_content() ) {

								$GLOBALS[ 'wp_admin_bar' ]->add_node(
									array(
										'id'     => 'new-jptestimonial-with-builder',
										'parent' => 'new-' . $jp_type_testimonial,
										'title'  => ddw_tbex_string_newcontent_with_builder(),
										'href'   => esc_attr( \Elementor\Utils::get_create_new_post_url( $jp_type_testimonial ) ),
										'meta'   => array(
											'target' => ddw_tbex_meta_target( 'builder' ),
											'title'  => ddw_tbex_string_newcontent_create_with_builder(),
										)
									)
								);

							}  // end if New Content check

						}  // end if Elementor Builder check

				}  // end if Testimonial CPT check

		}  // end if Jetpack Module check

		/** Group: General */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-jetpack-general',
				'parent' => 'tbex-jetpack',
			)
		);

			/** Overview/ Dashboard */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-jetpack-overview',
					'parent' => 'group-jetpack-general',
					'title'  => esc_attr__( 'Overview', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jetpack#/dashboard' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Overview', 'toolbar-extras' )
					)
				)
			);

			/** Stats */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-jetpack-stats',
					'parent' => 'group-jetpack-general',
					'title'  => esc_attr__( 'Statistics', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=stats' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Statistics', 'toolbar-extras' )
					)
				)
			);

			/** Sharing buttons */
			if ( Jetpack::is_module_active( 'sharedaddy' ) ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-sharing-buttons',
						'parent' => 'group-jetpack-general',
						'title'  => esc_attr__( 'Sharing Buttons', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'options-general.php?page=sharing' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Sharing Buttons', 'toolbar-extras' )
						)
					)
				);

			}  // end if

		/** Group: Settings */
		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'group-jetpack-settings',
				'parent' => 'tbex-jetpack',
			)
		);

			/** Settings - Modules/ Features */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-jetpack-settings',
					'parent' => 'group-jetpack-settings',
					'title'  => esc_attr__( 'Modules &amp; Features', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jetpack#/settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Modules &amp; Features', 'toolbar-extras' )
					)
				)
			);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-modules',
						'parent' => 'tbex-jetpack-settings',
						'title'  => esc_attr__( 'Full Modules List', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack_modules' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Full Modules List', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_group(
					array(
						'id'     => 'group-jetpack-categories',
						'parent' => 'tbex-jetpack-settings',
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-performance',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Performance', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#performance' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Performance', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-writing',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Writing', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#writing' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Writing', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-sharing',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Sharing', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#sharing' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Sharing', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-discussion',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Discussion', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#discussion' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Discussion', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-traffic',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Traffic', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#traffic' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Traffic', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-security',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Security', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#security' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Security', 'toolbar-extras' )
						)
					)
				);

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'tbex-jetpack-settings-privacy',
						'parent' => 'group-jetpack-categories',
						'title'  => esc_attr__( 'Privacy', 'toolbar-extras' ),
						'href'   => esc_url( admin_url( 'admin.php?page=jetpack#privacy' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_attr__( 'Privacy', 'toolbar-extras' )
						)
					)
				);

			/** Settings: WordPress.com */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-jetpack-settings-wpcom',
					'parent' => 'group-jetpack-settings',
					'title'  => esc_attr__( 'WordPress.com Settings', 'toolbar-extras' ),
					'href'   => 'https://wordpress.com/settings/',
					'meta'   => array(
						'target' => ddw_tbex_meta_target(),
						'title'  => esc_attr__( 'WordPress.com Settings', 'toolbar-extras' )
					)
				)
			);

			/** Settings: Debugging Center */
			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'tbex-jetpack-debugging-center',
					'parent' => 'group-jetpack-settings',
					'title'  => esc_attr__( 'Debugging Center', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'admin.php?page=jetpack-debugger' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Debugging Center', 'toolbar-extras' )
					)
				)
			);

		/** Group: Resources for Jetpack */
		if ( ddw_tbex_display_items_resources() ) {

			$GLOBALS[ 'wp_admin_bar' ]->add_group(
				array(
					'id'     => 'group-jetpack-resources',
					'parent' => 'tbex-jetpack',
					'meta'   => array( 'class' => 'ab-sub-secondary' )
				)
			);

			ddw_tbex_resource_item(
				'support-forum',
				'jetpack-support',
				'group-jetpack-resources',
				'https://wordpress.org/support/plugin/jetpack'
			);

			ddw_tbex_resource_item(
				'knowledge-base',
				'jetpack-kb-docs',
				'group-jetpack-resources',
				ddw_tbex_is_german() ? 'https://de.jetpack.com/support/' : 'https://jetpack.com/support/'
			);

			ddw_tbex_resource_item(
				'translations-community',
				'jetpack-translate',
				'group-jetpack-resources',
				'https://translate.wordpress.org/projects/wp-plugins/jetpack'
			);

			ddw_tbex_resource_item(
				'github',
				'jetpack-github',
				'group-jetpack-resources',
				'https://github.com/Automattic/jetpack'
			);

			ddw_tbex_resource_item(
				'official-site',
				'jetpack-site',
				'group-jetpack-resources',
				'https://jetpack.com/'
			);

			/** Developer documentation */
			if ( ddw_tbex_display_items_dev_mode() ) {

				ddw_tbex_resource_item(
					'documentation-dev',
					'jetpack-developer-docs',
					'group-jetpack-resources',
					'https://jetpack.com/support/jetpack-for-developers/'
				);

				ddw_tbex_resource_item(
					'code-reference',
					'jetpack-code-reference',
					'group-jetpack-resources',
					'https://developer.jetpack.com/'
				);

			}  // end if

		}  // end if

}  // end function


add_filter( 'jetpack_get_available_modules', 'ddw_tbex_disable_jetpack_masterbar', 20, 3 );
/**
 * Explicitely disabling the "Masterbar" module (aka "WordPress.com Toolbar")
 *   because it conflicts with the regular WordPress Toolbar and therefore with
 *   our Toolbar Extras plugin.
 *
 * @since 1.4.2
 *
 * @link https://toolbarextras.com/docs/how-to-use-toolbar-extras-plugin-on-wordpress-com/
 *
 * @param array  $modules     Array of available modules.
 * @param string $min_version Minimum version number required to use modules.
 * @param string $max_version Maximum version number required to use modules.
 * @return array Tweaked array of available modules.
 */
function ddw_tbex_disable_jetpack_masterbar( $modules, $min_version, $max_version ) {

    unset( $modules[ 'masterbar' ] );

    return $modules;

}  // end function


add_action( 'admin_menu', 'ddw_tbex_add_submenu_tweaks_jetpack', 999 );
/**
 * Add these very useful - but missing - submenus items to the Jetpack left-hand
 *   admin menu:
 *   - All Modules (full list, the alternative view)
 *   - Debugging Center
 *
 * @since 1.4.2
 *
 * @uses add_submenu_page()
 */
function ddw_tbex_add_submenu_tweaks_jetpack() {

	remove_submenu_page( null, 'jetpack_modules' );
	remove_submenu_page( null, 'jetpack-debugger' );

	add_submenu_page(
		'jetpack',
		esc_attr__( 'All Modules', 'toolbar-extras' ),
		esc_attr__( 'All Modules', 'toolbar-extras' ),
		'jetpack_manage_modules',	//'manage_options',
		esc_url( admin_url( 'admin.php?page=jetpack_modules' ) )
	);

	add_submenu_page(
		'jetpack',
		esc_attr__( 'Debugging Center', 'toolbar-extras' ),
		esc_attr__( 'Debugging Center', 'toolbar-extras' ),
		'manage_options',
		esc_url( admin_url( 'admin.php?page=jetpack-debugger' ) )
	);

}  // end function


add_filter( 'parent_file', 'ddw_tbex_parent_submenu_tweaks_jetpack' );
/**
 * When adding the additional Jetpack submenu items set the proper $parent_file
 *   and $submenu_file relationship for those items.
 *
 * @since 1.4.2
 *
 * @see ddw_tbex_add_submenu_tweaks_jetpack()
 *
 * @uses get_current_screen()
 *
 * @global string $GLOBALS[ 'submenu_file' ]
 *
 * @param string $parent_file The filename of the parent menu.
 * @return string $parent_file The tweaked filename of the parent menu.
 */
function ddw_tbex_parent_submenu_tweaks_jetpack( $parent_file ) {

	/** For: All Modules */
	if ( 'admin_page_jetpack_modules' === get_current_screen()->id ) {

		$GLOBALS[ 'submenu_file' ] = esc_url( admin_url( 'admin.php?page=jetpack_modules' ) );
		$parent_file = 'jetpack';

	}  // end if

	/** For: Debugging Center */
	if ( 'admin_page_jetpack-debugger' === get_current_screen()->id ) {

		$GLOBALS[ 'submenu_file' ] = esc_url( admin_url( 'admin.php?page=jetpack-debugger' ) );
		$parent_file = 'jetpack';

	}  // end if

	return $parent_file;

}  // end function
