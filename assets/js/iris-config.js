/**
 * // assets/js/iris-config
 * @package Toolbar Extras - Assets
 * @since 1.0.0
 * @since 1.4.0 Added predefined palette.
 * @since 1.4.2 Made palette values dynamic.
 */

jQuery( document ).ready( function () {

	if ( jQuery.isFunction( jQuery.fn.wpColorPicker ) ) {
		jQuery( 'input.tbex-color-picker' ).wpColorPicker({
			palettes: palette
		});
	}

} );