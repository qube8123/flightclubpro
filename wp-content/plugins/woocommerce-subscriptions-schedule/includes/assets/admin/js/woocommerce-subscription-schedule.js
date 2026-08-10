document.addEventListener("DOMContentLoaded", function() {

    var $ = jQuery;

	var hiddenInput = $( '#sp_wcss_box_schedule' );

	if ( ! hiddenInput && ! hiddenInput.length ) {
		return;
	}

	var inputs = hiddenInput.val();

	if ( ! inputs ) {
		hiddenInput.parent().append( wcssGenerateRenewalBoxMarkup( 0 ) );
	} else{

		inputs = JSON.parse( inputs );

		if ( ! Array.isArray(inputs) || ! inputs.length ) {
			hiddenInput.parent().append( wcssGenerateRenewalBoxMarkup( 0 ) );
		} else {
			wcssCleanStoredValues();

			for ( var i = 0; i < inputs.length; i++ ) {
				hiddenInput.parent().append( wcssGenerateRenewalBoxMarkup( inputs[i].id ) );
			}
		}
	}

	hiddenInput.parent().append( '<span class="wcss-add-schedule">+</span>' );

	wcssInitiateDatepickers();
	wcssCheckIfCanRemove();

	$( 'body' )
		// On date add
		.on( 'click', '.wcss-add-btn', function (e) {
			e.preventDefault();

			var currentParent = $( this ).parent( '.add-wcss-date-wrapper' ),
				dateInput = currentParent.find( '.wcss-date' ),
				dateValue = dateInput.val(),
				repeaterID = currentParent.data('id'),
				inputs = hiddenInput.val();

			if ( ! inputs ) {
				inputs = [];
			} else {
				inputs = JSON.parse( hiddenInput.val() );
			}

			var valuesIndex = wcssGetValueIndex( repeaterID, inputs );

			if ( false === valuesIndex ) {
				inputs.push( {
					id: repeaterID,
					values: [dateValue],
					name: ''
				} );
				valuesIndex = 0;
			} else {
				// If already added, stop
				if ( -1 !== $.inArray( dateValue, inputs[valuesIndex].values ) ) {
					return;
				}

				// Add to array and sort
				inputs[valuesIndex].values.push(dateValue);

				inputs[valuesIndex].values = inputs[valuesIndex].values.sort( function( a, b ){
					return new Date( a ) - new Date( b );
				});

				// clean out empty values
				for (i = 0; i < inputs[valuesIndex].values.length; i++) {
					if ( inputs[valuesIndex].values[i] === '' ) {
						inputs[valuesIndex].values.splice(i, 1);
						i--;
					}
				}
			}

			currentParent.siblings( '.wcss-dates-box' ).html( inputs[valuesIndex].values.map( function ( el, i ) {
				return '<span class="wcss-single-date"><span class="select2-selection__choice__remove wcss-remove" role="presentation" aria-hidden="true">×</span>' + el + '</span>';
			} ).join('') );

			hiddenInput.val( JSON.stringify( inputs ) );

			dateInput.val( '' );

		} )
		// On date remove
		.on( 'click', '.wcss-remove', function (e) {
			e.preventDefault();

			var currentParent = $( this ).parents('.wcss-dates-box').siblings( '.add-wcss-date-wrapper' ),
				repeaterID = currentParent.data('id'),
				dateValue = $( this ).parent().clone().children().remove().end().text(),
				inputs = JSON.parse( hiddenInput.val() ),
				valuesIndex = wcssGetValueIndex( repeaterID, inputs ),
				currentInputs = inputs[valuesIndex].values;

			// Remove value from array
			currentInputs = $.grep( currentInputs, function(value) {
				return value !== dateValue;
			});

			if ( currentInputs && undefined !== currentInputs && currentInputs.length !== 0 ) {

				// Sort array
				currentInputs = currentInputs.sort( function( a, b ){
					return new Date( a ) - new Date( b );
				});

				// If there are still dates in schedule, save them
				inputs[valuesIndex].values = currentInputs;
			} else if ( inputs[valuesIndex].values ) {

				// If there are no dates in schedule, empty array
				inputs[valuesIndex].values = [];
			}

			hiddenInput.val( JSON.stringify( inputs ) );

			$( this ).parent().remove();
		} )
		// On load
		.on( 'init', '#sp_wcss_box_schedule', function () {

			var inputs = hiddenInput.val();

			if ( ! inputs ) {
				return;
			}

			inputs = JSON.parse( hiddenInput.val() );

			if ( ! Array.isArray(inputs) || ! inputs.length ) {
				return;
			}

			$.each( inputs, function ( i, el ) {

				var dateWrapper = $( '.add-wcss-date-wrapper[data-id="' + el.id + '"]' );

				// Appends html of dates
				dateWrapper.siblings('.wcss-dates-box').append( el.values.map( function ( el, i ) {
					return '<span class="wcss-single-date"><span class="select2-selection__choice__remove wcss-remove" role="presentation" aria-hidden="true">×</span>' + el + '</span>';
				} ).join('') );

				// Populate the value of schedule name
				dateWrapper.siblings( '.wcss-name' ).val( el.name );

			} );
		} )
		// On schedule name input
		.on( 'input', '.wcss-name', function (e) {

			if ( $( this ).val() ) {
				$( this ).removeClass( 'is-error' );
			}

			var inputs = hiddenInput.val(),
				currentParent = $( this ).siblings( '.add-wcss-date-wrapper' ),
				repeaterID = currentParent.data('id');

			if ( ! inputs ) {
				inputs = [];
			} else {
				inputs = JSON.parse( inputs );
			}

			var valuesIndex = wcssGetValueIndex( repeaterID, inputs );

			if ( false === valuesIndex ) {
				inputs.push( {
					id: repeaterID,
					values: [],
					name: ''
				} );
				valuesIndex = 0;
			}

			// Set value in stored object
			var value = $( this ).val();
			if ( value ) {
				inputs[valuesIndex].name = $( this ).val();
			} else if ( inputs[valuesIndex].name ) {
				inputs[valuesIndex].name = '';
			}

			hiddenInput.val( JSON.stringify( inputs ) );

		})
		// Add a new schedule
		.on( 'click', '.wcss-add-schedule', function () {

			inputs = JSON.parse( hiddenInput.val() );

			var index = wcssGetMaxIndex() + 1;

			$( '.wcss-add-schedule' ).before( wcssGenerateRenewalBoxMarkup( index ) );

			inputs.push( {
				id: index,
				values: [],
				name: ''
			} );

			hiddenInput.val( JSON.stringify( inputs ) );

			wcssInitiateDatepickers();

			wcssCheckIfCanRemove();

		} )
		// Remove schedule
		.on( 'click', '.wcss-remove-box', function () {

			var repeaterID = $( this ).siblings( '.add-wcss-date-wrapper' ).data( 'id' );

			var inputs = hiddenInput.val();

			if ( inputs ) {

				inputs = JSON.parse( inputs );

				var valuesIndex = wcssGetValueIndex( repeaterID, inputs );

				if ( inputs[valuesIndex] ) {
					inputs.splice( valuesIndex, 1 );
				}

				hiddenInput.val( JSON.stringify( inputs ) );
			}

			$( this ).parent().remove();

			wcssCheckIfCanRemove();

		} )
		// On save settings
		.on( 'click', '.woocommerce-save-button', function (e) {

			var inputs = hiddenInput.val();

			if ( inputs ) {

				inputs = JSON.parse( inputs );

				if ( ! Array.isArray(inputs) || ! inputs.length ) {
					return;
				}

				var shouldPrevent = false;
				for ( var i = 0; i < inputs.length; i++ ) {
					if ( ! inputs[i].name && inputs[i].values.length > 0 ) {
						$( '.add-wcss-date-wrapper[data-id="' + inputs[i].id + '"]' ).siblings( '.wcss-name' ).addClass( 'is-error' );
						shouldPrevent = true;
					}
				}

				if ( shouldPrevent ) {
					e.preventDefault();
				} else {
					wcssCleanStoredValues();
				}
			}

		} )
		.on( 'woocommerce_variations_loaded', function () {
			$( '.variable_subscription_schedule-input' ).each( function ( i, el ) {
				wcssShowHidePeriodInputsVariable( el );
			} );
		} )
		.on( 'change', '.variable_subscription_schedule-input', function () {

			var syncValue = $( this ).parents( '.woocommerce_variable_attributes' ).find( '.wc_input_subscription_payment_sync' ).val();

			if ( 'undefined' === typeof syncValue || '0' == syncValue ) {
				wcssShowHidePeriodInputsVariable( this );
			} else {

				if ( confirm( 'If you select a schedule, saved synchronisation value will be deleted. Are you sure?' ) ) {
					wcssShowHidePeriodInputsVariable( this );
				} else {
					$( this ).val( '' );
				}
			}

		} )
		.on( 'init', '#_subscription_schedule_id', function () {
			wcssOnScheduleChange( $( this ).val() );
		} )
		.on( 'change', '#_subscription_schedule_id', function () {

			if ( ! $('#_subscription_payment_sync_date').length || '0' == $('#_subscription_payment_sync_date').val() ) {
				wcssOnScheduleChange( $( this ).val() );
			} else {

				if ( confirm( 'If you select a schedule, saved synchronisation value will be deleted. Are you sure?' ) ) {
					wcssOnScheduleChange( $( this ).val() );
				} else {
					$( '#_subscription_schedule_id' ).val( '' );
				}
			}
		} )
		.on( 'init', '#_billing_period', function () {
			if ( $( 'body' ).hasClass( 'post-type-shop_subscription' ) ) {
				if ( 'period' === $( this ).find( 'option' ).first().text() ) {
					$( this ).parents( '#billing-schedule' ).hide();
				}
			}
		} );

	$( '#sp_wcss_box_schedule, #_subscription_schedule_id, #_billing_period' ).trigger( 'init' );

	function wcssOnScheduleChange( newVal ) {

		if ( ! ( $('#product-type').val().indexOf( 'subscription' ) >= 0 ) ) {
			return;
		}

		var periodSelects = $( '.wc_input_subscription_period, .wc_input_subscription_period_interval, #sale-price-period' );
		var doNotChargeInput = $( '._subscription_schedule_first_free_order' );
		var syncBox = $( '.subscription_sync' );

		if ( '' !== newVal ) {
			periodSelects.addClass( 'hidden' );
			doNotChargeInput.removeClass( 'hidden' );
			syncBox.hide();
			syncBox.find( '#_subscription_payment_sync_date' ).val( '0' );
		} else {
			periodSelects.removeClass( 'hidden' );
			syncBox.show();
			doNotChargeInput.addClass( 'hidden' );
		}
	}

	function wcssShowHidePeriodInputsVariable( el ) {

		if ( ! ( $('#product-type').val().indexOf( 'subscription' ) >= 0 ) ) {
			return;
		}

		var parent = $( el ).parents( '.woocommerce_variable_attributes' );
		var periodSelects = parent.find( '.wc_input_subscription_period, .wc_input_subscription_period_interval' );
		var doNotChargeInput = parent.find( '._variable_ss_first_free_order' );
		var syncBox = parent.find( '.variable_subscription_sync' );

		if ( '' !== $( el ).val() ) {
			periodSelects.addClass( 'hidden' );
			doNotChargeInput.removeClass( 'hidden' );
			syncBox.hide();
			syncBox.find( '.wc_input_subscription_payment_sync' ).val( '0' );
		} else {
			periodSelects.removeClass( 'hidden' );
			doNotChargeInput.addClass( 'hidden' );
			syncBox.show();
		}
	}

	/**
	 * Bet highest box index.
	 * We need this because all the box id-s need to be unique.
	 *
	 * @returns {number}
	 */
	function wcssGetMaxIndex() {
		var inputs = hiddenInput.val();

		if ( ! inputs ) {
			return 0;
		}

		inputs = JSON.parse( inputs );

		if ( ! Array.isArray(inputs) || ! inputs.length ) {
			return 0;
		}

		var max = 0;
		for ( var i = 0; i < inputs.length; i++ ) {
			if ( inputs[i].id > max ) {
				max = inputs[i].id;
			}
		}

		return max;
	}

	/**
	 * Check and fix keys of object that are not in order (not sequential)
	 */
	function wcssCleanStoredValues() {

		var inputs = hiddenInput.val();

		if ( inputs ) {
			inputs = JSON.parse( inputs );

			for (var i = 0; i < inputs.length; i++) {
				if ( inputs[i].values.length === 0 && ! inputs[i].name ) {
					inputs.splice( i, 1 );
				}
			}
		}

		hiddenInput.val( JSON.stringify( inputs ) );
	}

	/**
	 * Checks if we need remove buttons.
	 * No need if there's only one box
	 */
	function wcssCheckIfCanRemove() {

		var wrappers = $( '.add-wcss-outer-wrapper' );
		wrappers.removeClass( 'hide-x' );

		if ( 2 > wrappers.length ) {
			wrappers.addClass( 'hide-x' );
		} else {
			wrappers.removeClass( 'hide-x' );
		}
	}

	/**
	 * Generates markup for individual schedule box
	 *
	 * @param id
	 * @returns {string}
	 */
	function wcssGenerateRenewalBoxMarkup( id ) {
		return '<div class="add-wcss-outer-wrapper"><span class="wcss-id">ID: #' + id + '</span><span class="wcss-remove-box">x</span><span class="description">Schedule name</span><span class="red">*</span><input type="text" class="wcss-name"><span class="description">Add box renewal dates:</span><div class="add-wcss-date-wrapper" data-id="' + id + '"><input type="text" placeholder="Select Date" class="wcss-date"><a href="javascript:;" class="wcss-add-btn button-primary">Add</a></div><span class="description wcss-description">Subscriptions will renew on these dates:</span><div class="wcss-dates-box"></div><br></div>';
	}

	/**
	 * Initiate jQuery datepickers
	 */
	function wcssInitiateDatepickers() {

		var dateInputs = $(".wcss-date");

		// Force date picker to be in English
		$.datepicker.setDefaults($.datepicker.regional['en']);

		dateInputs.datepicker( {
			dateFormat: 'MM d',
			changeYear: false,
		} ).focus(function () {
			$(".ui-datepicker-year").hide();
		});
	}

	/**
	 * Check if schedule with id is stored
	 */
	function wcssGetValueIndex( id, inputs ) {
		for (var i = 0; i < inputs.length; i++) {
			if ( inputs[i].id == id ) {
				return i;
			}
		}
		return false;
	}

});
