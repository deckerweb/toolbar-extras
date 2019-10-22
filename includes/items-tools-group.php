<?php

// includes/items-tools-group.php

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'admin_bar_menu', 'ddw_tbex_tools_items_base_groups', 99 );
/**
 * Set base groups for "own" Tools Group as "hook places".
 *   Set additional action hooks to enable custom groups.
 *
 * @since 1.4.8
 *
 * @uses ddw_tbex_parent_id_tools_group()
 *
 * @param object $admin_bar Object of Toolbar nodes.
 */
function ddw_tbex_tools_items_base_groups( $admin_bar ) {

	do_action( 'tbex_before_tools_group_content', $admin_bar );

	/** Group: Privacy ... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-toolsgroup-privacy',
			'parent' => ddw_tbex_parent_id_tools_group(),
		)
	);

	do_action( 'tbex_after_tools_group_privacy', $admin_bar );


	/** Group: GDPR ... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-toolsgroup-gdpr',
			'parent' => ddw_tbex_parent_id_tools_group(),
		)
	);

	do_action( 'tbex_after_tools_group_gdpr', $admin_bar );

	/** Group: Site Health ... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-toolsgroup-sitehealth',
			'parent' => ddw_tbex_parent_id_tools_group(),
		)
	);

	do_action( 'tbex_after_tools_group_sitehealth', $admin_bar );

	/** Group: Add-Ons ... */
	$admin_bar->add_group(
		array(
			'id'     => 'tbex-toolsgroup-addons',
			'parent' => ddw_tbex_parent_id_tools_group(),
		)
	);

	do_action( 'tbex_after_tools_group_addons', $admin_bar );

}  // end function
