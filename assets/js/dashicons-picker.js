/**
 * // assets/js/dashicons-picker
 * @package Toolbar Extras - Assets
 *
 * Dashicons Picker
 *
 * Based on: "dashicons-picker" (jQuery plugin) by Brad Vincent
 * @link    https://github.com/bradvin/dashicons-picker
 * @license GPLv2-or-later
 *
 * @since 1.0.0
 * @since 1.4.4 Made Dashicons list filterable; added new ones (WP 5.2+).
 */

( function ( $ ) {

	/**
	 *
	 * @returns {void}
	 */
	$.fn.dashiconsPicker = function () {

		/**
		 * Dashicons, in CSS order
		 *
		 * @type Array
		 */
		var icons = dashicons_list;

		return this.each( function () {

			var button = $( this ),
				offsetTop,
				offsetLeft;

			button.on( 'click.dashiconsPicker', function ( e ) {
				offsetTop = $( e.currentTarget ).offset().top;
				offsetLeft = $( e.currentTarget ).offset().left;
				createPopup( button );
			} );

			function createPopup( button ) {

				var target = $( button.data( 'target' ) ),
					preview = $( button.data( 'preview' ) ),
					popup  = $( '<div class="dashicon-picker-container"> \
						<div class="dashicon-picker-control" /> \
						<ul class="dashicon-picker-list" /> \
					</div>' )
						.css( {
							'top':  offsetTop,
							'left': offsetLeft
						} ),
					list = popup.find( '.dashicon-picker-list' );

				for ( var i in icons ) {
					list.append( '<li data-icon="' + icons[i] + '"><a href="#" title="' + icons[i] + '"><span class="dashicons dashicons-' + icons[i] + '"></span></a></li>' );
				};

				$( 'a', list ).click( function ( e ) {
					e.preventDefault();
					var title = $( this ).attr( 'title' );
					target.val( 'dashicons-' + title );
					preview
						.prop('class', 'dashicons')
						.addClass( 'dashicons-' + title );
					removePopup();
				} );

				var control = popup.find( '.dashicon-picker-control' );

				control.html( '<a data-direction="back" href="#"> \
					<span class="dashicons dashicons-arrow-left-alt2"></span></a> \
					<input type="text" class="" placeholder="' + dashicons_search + '" /> \
					<a data-direction="forward" href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>'
				);

				$( 'a', control ).click( function ( e ) {
					e.preventDefault();
					if ( $( this ).data( 'direction' ) === 'back' ) {
						$( 'li:gt(' + ( icons.length - 26 ) + ')', list ).prependTo( list );
					} else {
						$( 'li:lt(25)', list ).appendTo( list );
					}
				} );

				popup.appendTo( 'body' ).show();

				$( 'input', control ).on( 'keyup', function ( e ) {
					var search = $( this ).val();
					if ( search === '' ) {
						$( 'li:lt(25)', list ).show();
					} else {
						$( 'li', list ).each( function () {
							if ( $( this ).data( 'icon' ).toLowerCase().indexOf( search.toLowerCase() ) !== -1 ) {
								$( this ).show();
							} else {
								$( this ).hide();
							}
						} );
					}
				} );

				$( document ).bind( 'mouseup.dashicons-picker', function ( e ) {
					if ( ! popup.is( e.target ) && popup.has( e.target ).length === 0 ) {
						removePopup();
					}
				} );
			}

			function removePopup() {
				$( '.dashicon-picker-container' ).remove();
				$( document ).unbind( '.dashicons-picker' );
			}
		} );
	};

	$( function () {
		$( '.dashicons-picker' ).dashiconsPicker();
	} );

}( jQuery ) );
