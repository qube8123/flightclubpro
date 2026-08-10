<?php
namespace ShopPlugins\WCSS;

class Helper_Functions {

	/**
	 * @var object The single instance of the class
	 * @since 1.0.0
	 */
	protected static $instance = null;

	/*
	 * Remember previous subscription date.
	 * We need this to be able to calculate the new date.
	 */
	public $stored_subscription_date = false;

	/**
	 * Helper_Functions constructor.
	 */
	public function __construct() {

		add_filter( 'wcs_recurring_cart_next_payment_date', array( $this, 'wcs_recurring_cart_next_payment_date' ), 10, 3 );

		// Modify updated dates
		add_filter( 'woocommerce_subscription_valid_date_types', array( $this, 'woocommerce_subscription_valid_date_types' ), 10, 2 );
		add_action( 'woocommerce_subscription_date_updated', array( $this, 'woocommerce_subscription_date_updated' ), 10, 3 );

		// Save post meta to new subscription
		add_action( 'woocommerce_checkout_create_subscription', array( $this, 'woocommerce_checkout_create_subscription' ), 20, 4 );

		// Remove period from html and replace it with "period"
		add_filter( 'woocommerce_subscriptions_product_price_string', array( $this, 'remove_period_from_price' ), 10, 3 );
		add_filter( 'woocommerce_get_formatted_subscription_total', array( $this, 'remove_period_from_subscription_total' ), 10, 2 );
		add_filter( 'woocommerce_subscription_periods', array( $this, 'woocommerce_subscription_periods' ), 99, 2 );
		add_filter( 'woocommerce_order_formatted_line_subtotal', array( $this, 'woocommerce_order_formatted_line_subtotal' ), 99, 3 );
	}

	/**
	 * Get subscription schedule ID. Return false, if there is no schedule. The function can also return '0' as schedule ID.
	 *
	 * @param $subscription
	 *
	 * @return false|string
	 */
	public static function get_subscription_schedule_id( $subscription ) {
		$schedule_id = get_post_meta( $subscription->get_id(), '_subscription_schedule', true );

		if ( '0' === $schedule_id || 0 < (int) $schedule_id ) {
			return (string) $schedule_id;
		}

		return false;
	}

	/**
	 * @param $subtotal
	 * @param $item
	 * @param \WC_Subscription $subscription
	 * @return mixed
	 */
	public function woocommerce_order_formatted_line_subtotal( $subtotal, $item, $subscription ) {
		$schedule_id = get_post_meta( $subscription->get_id(), '_subscription_schedule', true );
		if ( '0' === $schedule_id || 0 < intval( $schedule_id ) ) {
			$tax_display = get_option( 'woocommerce_tax_display_cart' );
			if ( 'excl' === $tax_display ) {
				$line_subtotal = $subscription->get_line_subtotal( $item );
			} else {
				$line_subtotal = $subscription->get_line_subtotal( $item, true );
			}
			$subtotal = wc_price( $line_subtotal, array( 'currency', $subscription->get_currency() ) );
			return $subtotal;
		}
		return $subtotal;
	}

	/**
	 * Update the First renewal date shown in the cart and on checkout.
	 *
	 * If product in cart has subscription schedule, we calculate first next_payment date ourselves.
	 * This is the date that gets displayed in the "Recurring total" section of the cart and checkout.
	 *
	 * @param $first_renewal_payment_date
	 * @param $recurring_cart
	 * @param $product
	 *
	 * @return bool|string
	 */
	public function wcs_recurring_cart_next_payment_date( $first_renewal_payment_date, $recurring_cart, $product ) {

		$schedule_id = self::get_schedule_id_from_product( $product->get_id() );

		if ( false === $schedule_id ) {
			return $first_renewal_payment_date;
		}

		$trial_end = \WC_Subscriptions_Product::get_trial_expiration_date( $product->get_id() );

		if ( $trial_end > 0 ) {
			$from_date = $trial_end;
		} else {
			$from_date = gmdate( 'Y-m-d H:i:s' );
		}

		$box_schedule = self::get_schedule_by_schedule_id( $schedule_id );

		$next_renewal = self::get_next_renewal( $box_schedule, $from_date );

		/**
		 * Set the time of day Hour-Minute-Second used for the Next Renewal.
		 * Format is H:i:s
		 *
		 * @since 1.0.8
		 * @param string $time_string
		 */
		$next_renewal = gmdate( 'Y-m-d', strtotime( $next_renewal ) ) . ' ' . apply_filters( 'sp_next_payment_time_of_day', '12:00:00' );

		if ( ! $next_renewal || strtotime( $next_renewal ) < strtotime( 'now' ) ) {
			return $first_renewal_payment_date;
		}

		return $next_renewal;
	}

	/**
	 * Store the original next payment date in the object.
	 *
	 * This is called from WC_Subscription::get_valid_date_types()
	 * which is called early in WC_Subscription::update_dates()
	 *
	 * @param $types
	 * @param $subscription
	 *
	 * @return mixed
	 */
	public function woocommerce_subscription_valid_date_types( $types, $subscription ) {
		$this->stored_subscription_date = get_post_meta( $subscription->get_id(), '_schedule_next_payment', true );
		return $types;
	}

	/**
	 * When "next scheduled" date is updated, let's check if
	 * subscription schedule is used. If it's used, let's
	 * modify next scheduled date accordingly.
	 *
	 * We are basically hijacking 'next_payment' date update.
	 *
	 * @param \WC_Subscription $subscription
	 * @param $date_type
	 * @param $datetime
	 */
	public function woocommerce_subscription_date_updated( $subscription, $date_type, $datetime ) {

		// Allow plugins to prevent updating next_payment date
		if ( ! apply_filters( 'wcss_can_update_next_payment_date', true ) ) {
			return;
		}

		if ( $this->stored_subscription_date && 'next_payment' === $date_type ) {

			$last_order = $subscription->get_last_order( 'all' );
			$is_renewal = $last_order ? get_post_meta( $last_order->get_id(), '_subscription_renewal' ) : false;

			// Renewal and early renewal
			if ( $is_renewal ) {

				$stored_subscription_date = strtotime( $this->stored_subscription_date );
				$next_scheduled_date      = strtotime( $datetime );

				// If non-scheduled date would be at least 1 day in the future
				// This is just to make sure we don't edit when update_dates gets the same date
				if ( $next_scheduled_date - $stored_subscription_date >= 86400 ) {
					$schedule_id = get_post_meta( $subscription->get_id(), '_subscription_schedule', true );
					$date        = $this->stored_subscription_date;

					// If next payment date is in the past, let's use today for calculation
					$today_midnight = strtotime( 'today midnight' );
					$date_timestamp = strtotime( $date );

					// If subscription next payment date is in the past,
					// let's use current date for the future calculation
					if ( $date_timestamp < $today_midnight ) {
						$date = gmdate( 'Y-m-d H:i:s', $date_timestamp );
					}
				}
			}
		}

		if ( isset( $schedule_id ) && false !== $schedule_id && '' !== $schedule_id ) {

			$box_schedule           = self::get_schedule_by_schedule_id( $schedule_id );
			$next_scheduled_renewal = self::get_next_renewal( $box_schedule, $date );
			$next_scheduled_date    = gmdate( 'Y-m-d', strtotime( $next_scheduled_renewal ) );
			$next_scheduled_his     = gmdate( 'H:i:s', strtotime( $datetime ) );
			$next_scheduled_renewal = "{$next_scheduled_date} {$next_scheduled_his}";

			remove_action( 'woocommerce_subscription_date_updated', array( $this, 'woocommerce_subscription_date_updated' ) );

			$subscription->update_dates(
				array(
					'next_payment' => $next_scheduled_renewal,
				)
			);
			$subscription->add_order_note( 'Next renewal date set to ' . $next_scheduled_renewal . ' based on schedule ' . $box_schedule['name'] );
		}
	}

	/**
	 * Save subscription schedule to subscription
	 *
	 * @see WC_Subscriptions_Checkout::create_subscription
	 *
	 * @param \WC_Subscription $subscription
	 * @param $posted_data
	 * @param \WC_Order $order
	 * @param $recurring_cart
	 */
	public function woocommerce_checkout_create_subscription( $subscription, $posted_data, $order, $recurring_cart ) {

		$next_scheduled_renewal = self::get_next_scheduled_renewal_from_cart_key( $recurring_cart->recurring_cart_key );

		if ( $next_scheduled_renewal ) {

			$schedule_id = self::get_schedule_from_cart_key( $recurring_cart->recurring_cart_key );

			update_post_meta( $subscription->get_id(), '_subscription_schedule', $schedule_id );
			$schedule = self::get_schedule_by_schedule_id( $schedule_id );
			$subscription->add_order_note( 'Next renewal date set to ' . $next_scheduled_renewal . ' based on schedule ' . $schedule['name'] );

		}
	}

	/**
	 * Remove period from HTML.
	 *
	 * @param $subscription_string
	 * @param $product
	 * @param $include
	 * @return mixed
	 * @throws \Exception
	 */
	public function remove_period_from_price( $subscription_string, $product, $include ) {

		$schedule_id = self::get_schedule_id_from_product( $product );

		if ( '0' === $schedule_id || 0 < intval( $schedule_id ) ) {
			return self::replace_period_html( $subscription_string, self::get_interval_days_from_today( $product ) );
		}

		if ( is_a( $product, \WC_Product_Variable_Subscription::class ) ) {

			$children = $product->get_children();
			foreach ( $children as $child ) {

				$schedule_id = self::get_schedule_id_from_product( $child );

				if ( '0' === $schedule_id || 0 < intval( $schedule_id ) ) {
					return self::replace_period_html( $subscription_string );
				}
			}
		}

		return $subscription_string;
	}

	/**
	 * Replace period string
	 *
	 * @param string $formatted_total
	 * @param \WC_Subscription $subscription
	 *
	 * @return string
	 */
	public function remove_period_from_subscription_total( $formatted_total, $subscription ) {
		$schedule_id = get_post_meta( $subscription->get_id(), '_subscription_schedule', true );
		if ( '0' === $schedule_id || 0 < intval( $schedule_id ) ) {
			return self::replace_period_html( $formatted_total );
		}
		return $formatted_total;
	}

	/**
	 * @param $translated_periods
	 * @param $number
	 *
	 * @return mixed
	 */

	public function woocommerce_subscription_periods( $translated_periods, $number ) {
		$subscription_id = 0;

		if ( isset( $GLOBALS['view-subscription'] ) ) {

			$subscription_id = $GLOBALS['view-subscription'];

		} elseif ( isset( $GLOBALS['subscriptions-list'] ) ) {

			global $wss_counter;

			$subscriptions = $GLOBALS['subscriptions-list'];

			if ( ! $wss_counter ) {
				$wss_counter = 0;
			}

			$counter = 0;
			foreach ( $subscriptions as $index => $subscription ) {
				if ( $counter === $wss_counter ) {
					$current_subscription = $subscriptions[ $index ];
					$subscription_id      = $current_subscription->get_id();
					break;
				}
				$counter++;
			}

			$wss_counter++;

		} elseif ( isset( $GLOBALS['post'] ) ) {
			$subscription_id = $GLOBALS['post']->ID;
		}

		if ( isset( $subscription_id ) && $subscription_id > 0 ) {

			$schedule_id = get_post_meta( $subscription_id, '_subscription_schedule_id', true );
			/* translators: This is the singular term for renewals displayed on the front end. */
			$period_single = apply_filters( 'sp_period_name_single', __( 'renewal', 'wc-subs-schedule' ) );
			/* translators: This is the plural term for renewals */
			$period_plural = apply_filters( 'sp_period_name_single', __( 'renewals', 'wc-subs-schedule' ) );

			if ( '0' === $schedule_id || 0 < intval( $schedule_id ) ) {
				return array(
					/* translators: %s: Plural name for the period of day. */
					'day'   => sprintf( _nx( $period_single, '%s ' . $period_plural, $number, 'Subscription billing period.', 'woocommerce-subscriptions' ), $number ),
					/* translators: %s: Plural name for the period of week. */
					'week'  => sprintf( _nx( $period_single, '%s ' . $period_plural, $number, 'Subscription billing period.', 'woocommerce-subscriptions' ), $number ),
					/* translators: %s: Plural name for the period of month. */
					'month' => sprintf( _nx( $period_single, '%s ' . $period_plural, $number, 'Subscription billing period.', 'woocommerce-subscriptions' ), $number ),
					/* translators: %s: Plural name for the period of year. */
					'year'  => sprintf( _nx( $period_single, '%s ' . $period_plural, $number, 'Subscription billing period.', 'woocommerce-subscriptions' ), $number ),
				);
			}
		}

		return $translated_periods;
	}

	/**
	 * Return the next scheduled shipment in YYYY-MM-DD format.
	 *
	 * @param array $box_schedule
	 * @param string|null $date
	 * @param bool $include_today
	 *
	 * @return bool|string
	 */
	public static function get_next_renewal( $box_schedule, $date = null, $include_today = false ) {

		if ( $date ) {
			$today = strtotime( $date );
		} else {
			$today = time();
		}

		if ( ! $box_schedule['values'] ) {
			return false;
		}

		// Check if today is a renewal date
		if ( $include_today ) {
			foreach ( $box_schedule['values'] as $value ) {
				if ( gmdate( 'F j', $today ) === $value ) {
					return gmdate( 'Y-m-d', $today );
				}
			}
		}

		$current_year   = gmdate( 'Y', $today );
		$tomorrow_start = strtotime( 'tomorrow', strtotime( 'midnight', $today ) );
		$diffs          = array();

		foreach ( $box_schedule['values'] as $key => $schedule ) {

			$schedule_timestamp = strtotime( $schedule . ' ' . $current_year );
			$diff               = $schedule_timestamp - $tomorrow_start;

			if ( $diff < 0 ) {
				$schedule_timestamp = strtotime( $schedule . ' ' . ( $current_year + 1 ) );
				$diff               = $schedule_timestamp - $tomorrow_start;
			}

			$diffs[ $key ] = $diff;
		}

		if ( ! $diffs ) {
			return false;
		}

		return gmdate( 'Y-m-d', $tomorrow_start + $diffs[ array_search( min( $diffs ), $diffs, true ) ] );
	}

	/**
	 * Get schedule by id
	 *
	 * A Schedule is an object with the following contents:
	 * - id - integer
	 * - values - array of strings of dates
	 * - name - string
	 *
	 * @param $id
	 *
	 * @return array|bool
	 */
	public static function get_schedule_by_schedule_id( $id ) {
		$schedules = self::get_subscription_schedules();

		if ( ! $schedules ) {
			return false;
		}

		foreach ( $schedules as $schedule ) {

			if ( is_object( $schedule ) ) {

				$schedule_a = get_object_vars( $schedule );

				if ( absint( $id ) === absint( $schedule_a['id'] ) ) {
					return $schedule_a;
				}
			}
		}

		return false;
	}

	/**
	 * Get all schedules
	 *
	 * @return array|bool
	 */
	public static function get_subscription_schedules() {
		$stored_schedules = get_option( SP_WCSS_OPTION_PREFIX . 'box_schedule' );

		if ( ! $stored_schedules ) {
			return false;
		}

		$stored_schedules = json_decode( $stored_schedules );

		if ( ! $stored_schedules ) {
			return false;
		}

		return $stored_schedules;
	}

	/**
	 * Get schedule id from subscription
	 *
	 * @param $subscription_product \WC_Product
	 *
	 * @return bool|mixed
	 */
	public static function get_schedule_id_from_product( $subscription_product ) {

		if ( is_int( $subscription_product ) ) {
			$subscription_product = wc_get_product( $subscription_product );
		}

		$schedule_id = get_post_meta( $subscription_product->get_id(), 'subscription_variation' === $subscription_product->get_type() ? '_variable_subscription_schedule_id' : '_subscription_schedule_id', true );

		if ( ! $schedule_id && '0' !== $schedule_id ) {
			return false;
		}

		return $schedule_id;
	}

	/**
	 * Get schedule index from cart key
	 *
	 * @param $cart_key
	 *
	 * @return bool|string
	 */
	public static function get_schedule_from_cart_key( $cart_key ) {
		$split = explode( '_schedule_', $cart_key );

		if ( 2 !== count( $split ) ) {
			return false;
		}

		$schedule_id = substr( $split[1], 0, strspn( $split[1], '0123456789' ) );

		if ( '' === $schedule_id ) {
			return false;
		}

		return $schedule_id;
	}

	/**
	 * Get next scheduled renewal date from recurring cart key
	 *
	 * @param $cart_key
	 * @param $date
	 *
	 * @return bool|string
	 */
	public static function get_next_scheduled_renewal_from_cart_key( $cart_key, $date = null ) {
		$cart_schedule_id = self::get_schedule_from_cart_key( $cart_key );

		if ( false !== $cart_schedule_id && intval( $cart_schedule_id ) >= 0 ) {
			$box_schedule = self::get_schedule_by_schedule_id( $cart_schedule_id );

			return self::get_next_renewal( $box_schedule, $date );
		}

		return false;
	}

	/**
	 * If we have custom schedule, we don't want to show ( / month, /week, / year ) on cart/checkout
	 *
	 * @param $order_total_html
	 *
	 * @param bool|int $diff
	 *
	 * @return mixed
	 */
	public static function replace_period_html( $order_total_html, $diff = false ) {
		/* translators: This is the singular term for renewals displayed on the front end. */
		$period_name     = apply_filters( 'sp_period_name_single', __( 'renewal', 'wc-subs-schedule' ) );
		$default_periods = apply_filters(
			'sp_periods_to_remove',
			array(
				'day',
				'week',
				'month',
				'year',
			)
		);

		if ( $diff ) {
			$order_total_html = str_replace( $diff . ' days', $period_name, $order_total_html );
		}

		foreach ( $default_periods as $default_period ) {
			$interval = self::get_interval_from_html( $order_total_html );
			/* translators: %s: Plural name for the periods. */
			$default_period = sprintf( _nx( $default_period, "%s {$default_period}s", $interval, 'Subscription billing period.', 'woocommerce-subscriptions' ), $interval );

			$order_total_html = str_replace(
				array( ' / ' . $default_period, ' / ' . $default_period . 's', ' every ' . $default_period, ' each ' . $default_period ),
				array( ' / ' . $period_name, ' / ' . $period_name, ' every ' . $period_name, ' each ' . $period_name ),
				$order_total_html
			);
		}

		return $order_total_html;
	}

	/**
	 * From the price HTML, get the digits which is the period.
	 * We are expecting the period to be 1 but just in case.
	 *
	 * @param $html
	 *
	 * @return int|string|string[]
	 */
	protected static function get_interval_from_html( $html ) {
		$exploded = explode( '/', $html );

		if ( count( $exploded ) !== 2 ) {
			return 1;
		}

		$digits = preg_replace( '/[^0-9]/', '', $exploded[1] );

		if ( ! $digits ) {
			return 1;
		}

		return $digits;
	}

	/**
	 * Calculate how many days from today in the future is next renewal date from the product schedule.
	 *
	 * @param $product
	 *
	 * @return false|int
	 * @throws \Exception
	 */
	public static function get_interval_days_from_today( $product ) {
		$schedule_id = self::get_schedule_id_from_product( $product );

		if ( $schedule_id || '0' === $schedule_id ) {
			// Calculate next renewal
			$box_schedule = self::get_schedule_by_schedule_id( $schedule_id );
			$next_renewal = self::get_next_renewal( $box_schedule );
			$today        = new \DateTime();
			$next_renewal = new \DateTime( $next_renewal );
			$interval     = $next_renewal->diff( $today );
			$interval     = $interval->days + 1;

			return $interval;
		}

		return false;
	}

	/**
	 * Get next payment date from product.
	 *
	 * @param \WC_Product $product
	 * @param string $format PHP date format
	 *
	 * @return bool|false|string
	 */
	public static function get_next_renewal_date_from_product( $product, $format ) {

		if ( ! $product->is_type( array( 'subscription', 'subscription_variation' ) ) ) {
			return false;
		}

		$meta_key         = $product->is_type( 'subscription' ) ? '_subscription_schedule_id' : '_variable_subscription_schedule_id';
		$current_schedule = get_post_meta( $product->get_id(), $meta_key, true );

		// If there is no schedule
		if ( ! $current_schedule && '0' !== $current_schedule ) {
			return false;
		}

		$box_schedule           = self::get_schedule_by_schedule_id( $current_schedule );
		$next_scheduled_renewal = self::get_next_renewal( $box_schedule, gmdate( 'Y-m-d H:i:s', time() ) );
		$next_scheduled_renewal = gmdate( $format, strtotime( $next_scheduled_renewal ) );

		return $next_scheduled_renewal;
	}

	/**
	 * Class Instance
	 *
	 * @static
	 * @return object instance
	 *
	 * @since  1.0.0
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Helper_Functions::instance();
