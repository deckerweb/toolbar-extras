/**
 * // assets/js/tbex-settings
 * @package Toolbar Extras - Assets
 *
 * Admin Settings
 *
 * Based on: Genesis Framework "admin.js" by StudioPress (studiopress.com)
 * @link    https://toolbarextras.com/go/genesis/
 * @license GPLv2-or-later
 *
 * @since 1.4.0
 */


/* global tbex, tbexL10n, tbex_toggles, confirm */

/**
 * Holds Toolbar Extras (TBEX) values in an object to avoid polluting global
 *   namespace.
 *
 * @since 1.4.0
 *
 * @constructor
 */
window[ 'tbex' ] = {

	settingsChanged: false,

	/**
	 * Grabs the array of toggle settings and loops through them to hook in
	 * the behaviour.
	 *
	 * The tbex_toggles array is filterable in /includes/admin/tbex-settings.php
	 *   before being passed over to JS via wp_localize_script().
	 *
	 * @since 1.4.0
	 *
	 * @function
	 */
	toggleSettingsInit: function() {

		'use strict';

		jQuery.each( tbex_toggles, function( k, v ) {

			/** Prepare data */
			var data = { selector: v[ 0 ], showSelector: v[ 1 ], checkValue: v[ 2 ] };

			/** Setup toggle binding */
			jQuery( 'form.tbex-settings-page' )
				.on( 'change.tbex.tbex_toggle', v[ 0 ], data, tbex.toggleSettings );

			/**
			 * Trigger the check when page loads too.
			 *   Can't use triggerHandler here, as that doesn't bubble the event
			 *   up to form.tbex-settings-page.
			 *   We namespace it, so that it doesn't conflict with any other
			 *   change event attached that we don't want triggered on document
			 *   ready.
			 */
			jQuery( v[ 0 ]).trigger( 'change.tbex_toggle', data );
		});

	},


	/**
	 * Provides the behaviour for the change event for certain settings.
	 *
	 * Three bits of event data is passed - the jQuery selector which has the
	 * behaviour attached, the jQuery selector which to toggle, and the value to
	 * check against.
	 *
	 * The checkValue can be a single string or an array (for checking against
	 * multiple values in a dropdown) or a null value (when checking if a checkbox
	 * has been marked).
	 *
	 * @since 1.4.0
	 *
	 * @function
	 *
	 * @param {jQuery.event} event
	 */
	toggleSettings: function( event ) {

		'use strict';

		/** Cache selectors */
		var $selector = jQuery( event.data.selector ),
		    $showSelector = jQuery( event.data.showSelector ),
		    checkValue = event.data.checkValue;

		/**
		 * Compare if a checkValue is an array, and one of them matches the value of the selected option
		 *   OR the checkValue is _unchecked, but the checkbox is not marked
		 *   OR the checkValue is _checked, but the checkbox is marked
		 *   OR it's a string, and that matches the value of the selected option.
		 */
		if (
			( jQuery.isArray( checkValue ) && jQuery.inArray( $selector.val(), checkValue ) > -1) ||
				( '_unchecked' === checkValue && $selector.is( ':not(:checked)' ) ) ||
				( '_checked' === checkValue && $selector.is( ':checked' ) ) ||
				( '_unchecked' !== checkValue && '_checked' !== checkValue && $selector.val() === checkValue )
		) {

			jQuery( $showSelector ).slideDown( 'fast' );

		} else {

			jQuery( $showSelector ).slideUp( 'fast' );

		}  // end if

	},


	/**
	 * Have all form fields in TBEX settings fields set a dirty flag when
	 *   changed.
	 *
	 * @since 1.4.0
	 *
	 * @function
	 */
	attachUnsavedChangesListener: function() {

		'use strict';

		jQuery( 'form.tbex-settings-page :input' ).change( function() {
			tbex.registerChange();
		});
		window.onbeforeunload = function(){
			if ( tbex.settingsChanged ) {
				return tbexL10n.saveAlert;
			}
		};
		jQuery( 'form.tbex-settings-page input[type="submit"]' ).click( function() {
			window.onbeforeunload = null;
		});

	},


	/**
	 * Set a flag, to indicate settings form fields have changed.
	 *
	 * @since 1.4.0
	 *
	 * @function
	 */
	registerChange: function() {

		'use strict';

		tbex.settingsChanged = true;
		
	},


	/**
	 * Initialises all aspects of the scripts.
	 *
	 * Generally ordered with stuff that inserts new elements into the DOM first,
	 *   then stuff that triggers an event on existing DOM elements when ready,
	 *   followed by stuff that triggers an event only on user interaction. This
	 *   keeps any screen jumping from occurring later on.
	 *
	 * @since 1.4.0
	 *
	 * @function
	 */
	ready: function() {

		'use strict';

		/** Initialise settings that can toggle the display of other settings */
		tbex.toggleSettingsInit();

		/** Initialise form field changing flag */
		tbex.attachUnsavedChangesListener();

	}

};

jQuery( tbex.ready );


/* jshint ignore:start */
/**
 * Helper function for confirming a user action.
 *
 * This function is deprecated in favour of tbex.confirm( text ) which provides
 *   the same functionality.
 *
 * @since 1.4.0
 * @deprecated 1.4.0
 */
function tbex_confirm( text ) {
	'use strict';
	return tbex.confirm( text );
}
/* jshint ignore:end */
