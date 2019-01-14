/**
 * // assets/js/iris-config
 * @package Toolbar Extras - Assets
 * @since 1.0.0
 * @since 1.4.0 Added predefined palette.
 */

jQuery( document ).ready( function () {

	if ( jQuery.isFunction( jQuery.fn.wpColorPicker ) ) {
		jQuery( 'input.tbex-color-picker' ).wpColorPicker({
			palettes: ['#0073aa', '#7e49c2', '#d30c5c', '#555d66', '#7fb100', '#000']
		});
	}

} );