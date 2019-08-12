<?php

// includes/items-plugins-forms

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Plugin: Gravity Forms (Premium, by Rocketgenius, Inc.)
 * @since 1.0.0
 */
if ( ddw_tbex_is_gravityforms_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-gravity-forms.php';
}


/**
 * Plugin: WPForms Lite/Pro (free/Premium, by WPForms)
 * @since 1.3.1
 */
if ( ddw_tbex_is_wpforms_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-wpforms.php';
}


/**
 * Plugin: Formidable Forms (Premium, by Strategy11)
 * @since 1.3.1
 */
if ( function_exists( 'load_formidable_forms' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-formidable-forms.php';
}


/**
 * Plugin: Ninja Forms (free, by The WP Ninjas)
 * @since 1.3.1
 */
if ( ddw_tbex_is_ninjaforms_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-ninja-forms.php';
}


/**
 * Plugin: Caldera Forms (Premium, by Caldera Labs)
 * @since 1.3.1
 */
if ( ddw_tbex_is_calderaforms_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-caldera-forms.php';
}


/**
 * Plugin: Contact Form 7 (free, by Takayuki Miyoshi)
 * @since 1.3.1
 */
if ( ddw_tbex_is_cf7_active() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-contact-form-7.php';
}


/**
 * Plugin: Quform (Premium, by ThemeCatcher)
 * @since 1.3.1
 */
if ( defined( 'QUFORM_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-quform.php';
}


/**
 * Plugin: Everest Forms (free, by WPEverest)
 * @since 1.3.2
 */
if ( class_exists( 'EverestForms' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-everest-forms.php';
}


/**
 * Plugin: FormCraft 3 (Premium, by nCrafts)
 * @since 1.3.2
 */
if ( function_exists( 'formcraft3_activate' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-formcraft.php';
}


/**
 * Plugin: ARForms (Premium, by Repute InfoSystems)
 * @since 1.3.2
 */
if ( defined( 'ARFPLUGINTITLE' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-arforms.php';
}


/**
 * Plugin: Mailchimp for WordPress (free, by ibericode)
 * @since 1.3.2
 */
if ( class_exists( 'MC4WP_Form_Manager' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-mailchimp-for-wp.php';
}


/**
 * Plugin: Forminator (Pro) (free/Premium, by WPMU DEV)
 * @since 1.4.0
 */
if ( class_exists( 'Forminator_API' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-forminator.php';
}


/**
 * Plugin: HappyForms (free, by The Theme Foundry)
 * @since 1.3.2
 */
if ( defined( 'HAPPYFORMS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-happyforms.php';
}


/**
 * Plugin: Form Maker (free, by WebDorado Form Builder Team)
 * @since 1.4.0
 */
if ( class_exists( 'WDFM' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-form-maker.php';
}


/**
 * Plugin: Advanced Forms (free, by Fabian Lindfors/ Hookturn Digital Pty Ltd)
 * @since 1.4.3
 */
if ( ddw_tbex_is_acf_pro_active() && class_exists( 'AF' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-advanced-forms.php';
}


/**
 * Plugin: BuddyForms (free, by ThemeKraft)
 * @since 1.4.2
 */
if ( class_exists( 'BuddyForms' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-buddyforms.php';
}


/**
 * Plugin: Torro Forms (free, by Awesome UG)
 * @since 1.4.2
 */
if ( class_exists( 'Torro_Forms' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-torro-forms.php';
}


/**
 * Plugin: HTML Forms (free, by ibericode)
 * @since 1.4.2
 */
if ( defined( 'HTML_FORMS_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-html-forms.php';
}


/**
 * Plugin: Contact Form X (free, by Jeff Starr)
 * @since 1.4.2
 */
if ( class_exists( 'ContactFormX' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-contactformx.php';
}


/**
 * Plugin: Form Vibes (free, by WPVibes)
 * @since 1.4.4
 */
if ( ( ddw_tbex_is_cf7_active() || ddw_tbex_is_elementor_pro_active() || ddw_tbex_is_calderaforms_active() )		// depends on CF7 Forms OR Caldera Forms OR Elementor Pro Forms
	&& defined( 'WPV_FV_VERSION' )
) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-form-vibes.php';
}


/**
 * Plugin: Mailster (Premium, by EverPress)
 * @since 1.4.0
 */
if ( defined( 'MAILSTER_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-mailster.php';
}


/**
 * Plugin: MailPoet 3 (free, by MailPoet)
 * @since 1.4.0
 */
if ( defined( 'MAILPOET_VERSION' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-mailpoet.php';
}


/**
 * Plugin: MailPoet Newsletters (Previous) (Version 2, Legacy) (free, by MailPoet)
 * @since 1.4.0
 */
if ( class_exists( 'WYSIJA' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-mailpoet-legacy.php';
}


/**
 * Plugin: OptinMonster API (free/Premium, by OptinMonster Team/ Retyp, LLC)
 * @since 1.2.0
 */
if ( class_exists( 'OMAPI' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-optinmonster.php';
}


/**
 * Plugin: Convert Pro (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( function_exists( 'cp_load_convertpro' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-convertpro.php';
}


/**
 * Plugin: Convert Plus (Premium, by Brainstorm Force)
 * @since 1.2.0
 */
if ( class_exists( 'Convert_Plug' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-convertplus.php';
}


/**
 * Plugin: Hustle (free, by WPMU DEV)
 * @since 1.3.1
 */
if ( class_exists( 'Hustle_Init' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-hustle.php';
}


/**
 * Plugin: Bloom (Premium, by Elegant Themes)
 * @since 1.3.1
 */
if ( class_exists( 'ET_Bloom' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-bloom.php';
}


/**
 * Plugin: Post SMTP (free, by Yehuda Hassine)
 * @since 1.4.2
 */
if ( function_exists( 'post_start' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-post-smtp.php';
}


/**
 * Plugin: WP Mail SMTP (free, by WPForms)
 * @since 1.4.2
 */
if ( defined( 'WPMS_PLUGIN_VER' ) ) {
	require_once TBEX_PLUGIN_DIR . 'includes/plugins-forms/items-wp-mail-smtp.php';
}
