<?php

// includes/toolbar-styles

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'wp_head', 'ddw_tbex_toolbar_styles', 100 );
add_action( 'admin_head', 'ddw_tbex_toolbar_styles', 100 );
/**
 * Add the needed CSS styles for Toolbar items of "Toolbar Extras" plugin.
 * 
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_site()
 * @uses   ddw_tbex_id_main_item()
 * @uses   ddw_tbex_id_sites_browser()
 *
 * @return string CSS styling for selected Toolbar items.
 */
function ddw_tbex_toolbar_styles() {
	
	/** Subtle styling tweaks for "Login Designer" plugin */
	$fix_logindesigner = '';

	if ( ddw_tbex_display_items_site() ) {

		$fix_logindesigner = sprintf(
			'#wpadminbar #wp-admin-bar-my-sub-item {
				color: inherit;
				margin-top: 7px;
			}

			#wpadminbar #wp-admin-bar-my-sub-item .ab-item:before {
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
				background-image: none !important;
				color: inherit;
				content: "%s";
				float: left;
				font: 400 20px/1 dashicons;
				margin-right: 6px;
				padding: 4px 0;
				position: relative;
				speak: none;
			}',
			'\f336'
		);

	}  // end if

	/** Add our few CSS styles inline: */
	?>
		<style type="text/css">
			/* Fix */
			#wpadminbar #wp-admin-bar-my-sites-super-admin.ab-submenu {
				border-top: 0 none !important;
			}

			/* TBEX: Main item */
			#wpadminbar #wp-admin-bar-<?php echo ddw_tbex_id_main_item(); ?> .ab-icon:before {
				top: 2px;
			}

			/* TBEX: Group Users */
			#wpadminbar #wp-admin-bar-group-tbex-users .tbex-users .ab-icon:before,
			#wpadminbar #wp-admin-bar-group-user-roles .tbex-users .ab-icon:before {
				content: '\f139';
				top: 2px;
			}

			#wpadminbar #wp-admin-bar-group-tbex-users .tbex-users,
			#wpadminbar #wp-admin-bar-group-user-roles .tbex-users {
				margin-bottom: 5px;
				margin-left: -6px;
			}

			.rtl #wpadminbar #wp-admin-bar-group-tbex-users .tbex-users .ab-icon:before,
			.rtl #wpadminbar #wp-admin-bar-group-user-roles .tbex-users .ab-icon:before {
				content: '\f141';
			}

			/* Plugin: Debug Elementor */
			#wpadminbar #wp-admin-bar-dm-debug-elementor {
				margin-bottom: 7px;
				margin-top: 5px;
			}

			#wpadminbar #wp-admin-bar-dm-debug-elementor .ab-icon:before {
				content: '\f348';
				top: 2px;
			}

			/* Customizer sub-items */
			#wpadminbar #wp-admin-bar-customize-wpwidgets {
				margin-bottom: 7px;
			}

			#wpadminbar #wp-admin-bar-customize-wpwidgets .ab-icon:before {
				content: '\f116';
				top: 2px;
			}

			#wpadminbar #wp-admin-bar-customize-wpmenus {
				margin-bottom: 7px;
			}

			#wpadminbar #wp-admin-bar-customize-wpmenus .ab-icon:before {
				content: '\f333';
				top: 2px;
			}

			#wpadminbar #wp-admin-bar-customize-css,
			#wpadminbar #wp-admin-bar-customize-simplecss,
			#wpadminbar #wp-admin-bar-customize-sccss {
				margin-bottom: 7px;
			}

			#wpadminbar #wp-admin-bar-customize-css .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-simplecss .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-sccss .ab-icon:before {
				content: '\f475';
				top: 2px;
			}

			#wpadminbar #wp-admin-bar-customize-cei {
				margin-bottom: 7px;
			}

			#wpadminbar #wp-admin-bar-customize-cei .ab-icon:before {
				content: '\f111';
				top: 2px;
			}

			#wpadminbar .tbex-customize-content .ab-icon:before {
				content: '\f540';
				top: 2px;
			}

			#wpadminbar .tbex-customize-content {
				bottom: 2px;
			}

			/* Dev Mode */
			#wpadminbar #wp-admin-bar-rapid-dev .ab-label {
				margin-top: -3px;
			}

			/* Sites Browser/ Demos */
			#wpadminbar #wp-admin-bar-<?php echo ddw_tbex_id_sites_browser(); ?> {
				margin-top: -3px;
			}

			/* Web Group */
			#wpadminbar #wp-admin-bar-tbex-web-resources .tbex-siteicon img {
				width: 16px;
				height: 16px;
			}

			#wpadminbar #wp-admin-bar-tbex-web-resources .tbex-siteicon img,
			#wpadminbar #wp-admin-bar-tbex-web-resources .ab-icon.tbex-globe:before {
				margin-right: -3px;
				padding: 0 0 0 5px;
			}

			.rtl #wpadminbar #wp-admin-bar-tbex-web-resources .tbex-siteicon img,
			.rtl #wpadminbar #wp-admin-bar-tbex-web-resources .ab-icon.tbex-globe:before {
				margin-left: -3px;
				padding: 0 5px 0 0;
			}

			#wpadminbar #wp-admin-bar-tbex-web-resources .ab-icon.tbex-globe:before {
				content: '\f319';
				top: 2px;
			}

			/* Superadmin Menu */
			#wp-admin-bar-root-default > .tbex-tbmenu .ab-icon:before {
				top: 2px;
			}

			#wp-admin-bar-root-default > .tbex-tbmenu .ab-sub-wrapper .ab-icon {
				display: none !important;
			}

			/* Tweaks for groups */
			#wp-admin-bar-group-devmode-resources,
			#wp-admin-bar-group-churchcontent-resources {
				border-top: 1px solid rgba(235, 235, 235, 0.35);
			}

			.admin-color-light #wp-admin-bar-group-devmode-resources,
			.admin-color-light #wp-admin-bar-group-churchcontent-resources {
				border-top: 1px solid rgba(7, 7, 7, 0.2);
			}

			/* Color fixes */
			#wpadminbar #wp-admin-bar-group-tbex-users .tbex-users .ab-icon:before,
			#wpadminbar #wp-admin-bar-group-tbex-users .tbex-users .ab-label,
			#wpadminbar #wp-admin-bar-group-user-roles .tbex-users .ab-icon:before,
			#wpadminbar #wp-admin-bar-group-user-roles .tbex-users .ab-label,
			#wpadminbar #wp-admin-bar-dm-debug-elementor .ab-icon:before,
			#wpadminbar #wp-admin-bar-dm-debug-elementor .ab-label,
			#wpadminbar #wp-admin-bar-customize-wpwidgets .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-wpwidgets .ab-label,
			#wpadminbar #wp-admin-bar-customize-wpmenus .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-wpmenus .ab-label,
			#wpadminbar #wp-admin-bar-customize-css .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-css .ab-label,
			#wpadminbar #wp-admin-bar-customize-simplecss .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-simplecss .ab-label,
			#wpadminbar #wp-admin-bar-customize-sccss .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-sccss .ab-label,
			#wpadminbar #wp-admin-bar-customize-cei .ab-icon:before,
			#wpadminbar #wp-admin-bar-customize-cei .ab-label,
			#wpadminbar .tbex-customize-content .ab-icon:before,
			#wpadminbar .tbex-customize-content .ab-label,
			#wpadminbar #wp-admin-bar-rapid-dev .ab-icon:before,
			#wpadminbar #wp-admin-bar-rapid-dev .ab-label,
			#wpadminbar #wp-admin-bar-<?php echo ddw_tbex_id_sites_browser(); ?> .ab-icon:before,
			#wpadminbar #wp-admin-bar-<?php echo ddw_tbex_id_sites_browser(); ?> .ab-label,
			#wpadminbar #wp-admin-bar-tbex-web-resources .ab-icon.tbex-globe:before,
			#wp-admin-bar-root-default > .tbex-tbmenu .ab-icon:before,
			#wp-admin-bar-root-default > .tbex-tbmenu .ab-label {
				color: inherit !important;
			}

			/* Icon Label Fixes */
			#wp-admin-bar-customize-sccss .ab-label,
			#wp-admin-bar-group-demo-import .ab-label {
				margin-right: 15px !important;
				padding-right: 15px !important;
			}

			#wpadminbar .tbex-customize-content .ab-label {
				padding-right: 25px;
			}
			<?php echo $fix_logindesigner; ?>

			/* Media Queries */
			@media only screen and (max-width: 782px) {

				#wpadminbar #wp-admin-bar-rapid-dev .ab-icon,
				#wpadminbar #wp-admin-bar-rapid-dev .ab-icon:before {
					display: none;
				}

				#wpadminbar #wp-admin-bar-rapid-dev .ab-item,
				#wpadminbar #wp-admin-bar-rapid-dev .ab-label,
				#wpadminbar #wp-admin-bar-tbex-sitegroup-manage-content .ab-item,
				#wpadminbar #wp-admin-bar-group-tbex-users .ab-label,
				#wpadminbar #wp-admin-bar-group-user-roles .ab-label {
					display: inline-block;
				}

				#wpadminbar #wp-admin-bar-rapid-dev .ab-label {
					font-size: 16px !important;
				}

				#wpadminbar #wp-admin-bar-group-tbex-users .tbex-users .ab-icon:before,
				#wpadminbar #wp-admin-bar-group-user-roles .tbex-users .ab-icon:before {
					font-size: 16px;
					/* display: inline-block; */
					top: -16px;
				}

			}
		</style>
	<?php

}  // end function