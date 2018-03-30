/**
 * // assets/js/iris-config
 * @package Toolbar Extras - Assets
 * @since 1.0.0
 */

jQuery( document ).ready( function () {

	if ( jQuery.isFunction( jQuery.fn.wpColorPicker ) ) {
		jQuery( 'input.tbex-color-picker' ).wpColorPicker();
	}

} );