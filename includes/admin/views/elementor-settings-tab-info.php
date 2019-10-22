<?php

// includes/admin/views/elementor-settings-tab-info

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


if ( class_exists( '\Elementor\Settings' ) ) :

	add_action( 'elementor/admin/after_create_settings/' . \Elementor\Settings::PAGE_ID, 'ddw_tbex_register_elementor_admin_fields', 20 );
	/**
	 * Render our info page as settings tab of the Elementor General settings page.
	 *   Using the Elementor settings API.
	 *
	 * @since 1.4.8
	 *
	 * @see ddw_tbex_elementor_admin_fields_heading()
	 *
	 * @uses ddw_tbex_get_settings_url()
	 * @uses ddw_tbex_string_toolbar_extras()
	 *
	 * @param object $settings Holds all Elementor admin settings tabs & fields.
	 */
	function ddw_tbex_register_elementor_admin_fields( $settings ) {

		/** Add the tab */
		$settings->add_tab(
			'tbex-settings-elementor',
			[
				'label' => _x( 'Toolbar Extras for Elementor', 'Elementor General Settings tab title', 'toolbar-extras' ),
			]
		);

		/** Add the info sections (fields) */
		$settings->add_section(
			'tbex-settings-elementor',
			'elementor-panel-settings',
			[
				'callback' => 'ddw_tbex_elementor_admin_fields_heading',	// callback function to render the heading content
				'fields' => [
					'link_to_general_builder_name' => [
						'label' => __( 'Elementor Name', 'toolbar-extras' ),
						'field_args' => [
							'type' => 'raw_html',
							'html' => sprintf(
								'<a class="button" href="%s">%s &rarr;</a>',
								ddw_tbex_get_settings_url( 'general' ) . '#tbex-settings-builder-name',
								__( 'Go to General Settings', 'toolbar-extras' )
							),
							'desc' => sprintf(
								'%s %s',
								sprintf(
									/* translators: 1 - label, "Elementor" / 2 - name of the plugin, "Toolbar Extras" */
									__( 'With this setting you can set/ tweak the name %1$s for Toolbar items added by %2$s.', 'toolbar-extras' ),
									'Elementor',
									ddw_tbex_string_toolbar_extras()
								),
								__( 'Additionally you can set a default Page Builder.', 'toolbar-extras' )
							),
						],
					],

					'link_to_smart_tweaks' => [
						'label' => __( 'Tweak Elementor Behavior &amp; Toolbar Items', 'toolbar-extras' ),
						'field_args' => [
							'type' => 'raw_html',
							'html' => sprintf(
								'<a class="button" href="%s">%s &rarr;</a>',
								ddw_tbex_get_settings_url( 'smart-tweaks' ) . '#tbex-settings-builder-behavior',
								__( 'Go to Smart Tweak Settings', 'toolbar-extras' )
							),
							'desc' => sprintf(
								/* translators: %s - label, "Build Group" */
								__( 'With these settings you can determine if the regular WordPress Widgets will appear in the Elementor Live Editor, plus, if certain items for Elementor Pro will appear within the %s of the Toolbar. Additionally you can optionally unload all Elementor translations (to have only English original strings).', 'toolbar-extras' ),
								__( 'Build Group', 'toolbar-extras' )
							),
						],
					],

				],
			]
		);

	}  // end function


	/**
	 * Callback function to generate the heading markup output for our Elementor
	 *   Admin Settings tab page.
	 *
	 * @since 1.4.8
	 *
	 * @see ddw_tbex_register_elementor_admin_fields()
	 *
	 * @uses ddw_tbex_string_toolbar_extras()
	 */
	function ddw_tbex_elementor_admin_fields_heading() {

		$output = '<h2>' . esc_html__( 'Additional Settings and Tweaks for Your Elementor Workflow', 'toolbar-extras' ) . '</h2>';
		$output .= sprintf(
			'<p>%s</p>',
			sprintf(
				/* translators: %s - name of the plugin, "Toolbar Extras" */
				__( 'These settings here are only cross-linked to their original location on the %s settings page.', 'toolbar-extras' ),
				ddw_tbex_string_toolbar_extras()
			)
		);

		echo $output;

	}  // end function


	add_action( 'admin_enqueue_scripts', 'ddw_tbex_inline_styles_elementor_settings_page', 20 );
	/**
	 * Add additional inline styles for our Elementor settings tab info page.
	 *
	 * @since 1.4.8
	 *
	 * @uses wp_add_inline_style()
	 *
	 * @param string $hook_suffix The current admin page ID.
	 */
	function ddw_tbex_inline_styles_elementor_settings_page( $hook_suffix ) {

		/** Bail early if not on 'elementor' admin page */
		if ( 'elementor' === $hook_suffix ) {
			return;
		}

		/**
		 * For WordPress Admin Area
		 *   Style handle: 'wp-admin' (WordPress Core)
		 */
		$inline_css = sprintf(
			'
			form[action="options.php#tab-tbex-settings-elementor"] .submit {
				display: none;
			}'
		);

		wp_add_inline_style( 'wp-admin', $inline_css );

	}  // end function

endif;
