<?php

// includes/compatibility/compatibility-manager

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/** Plugin compat, early */
require_once TBEX_PLUGIN_DIR . 'includes/compatibility/plugin-compatibility.php';

/** Deprecated functions */
require_once TBEX_PLUGIN_DIR . 'includes/compatibility/deprecated.php';

/** ClassicPress tweaks */
if ( ddw_tbex_is_classicpress_install() ) {
	require_once TBEX_PLUGIN_DIR . 'includes/compatibility/classicpress.php';
}
