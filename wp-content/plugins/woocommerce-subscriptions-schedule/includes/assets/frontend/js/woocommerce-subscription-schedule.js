jQuery(document).ready(function($) {
	var WCSS_Frontend = {
		init: function () {
			WCSS_Frontend.changeShortcodeValue();

			$('input.variation_id').change( function() {
				WCSS_Frontend.changeShortcodeValue();
			});
		},
		changeShortcodeValue: function () {

			var selectedID = $('input.variation_id').val();

			$( '.wcss-next-payment-date' ).each( function (i, el) {

				var dateHolder = $( el ),
						data = dateHolder.data( 'variations-next-payment-date' );

				if ( data ) {

					if ( ! selectedID ) {
						dateHolder.text('');
					}

					data = $( el ).data( 'variations-next-payment-date' );

					$( data ).each( function (i1, el1) {

						if ( el1.child_id == selectedID ) {

							if ( el1.next_payment ) {
								dateHolder.text( el1.next_payment );
							} else {
								dateHolder.text('');
							}
						}
					} );
				}
			} );
		}
	};

	WCSS_Frontend.init();
});