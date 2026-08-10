<?php
namespace ShopPlugins\WCSS;

class Frontend {

	/**
	 * @var object The single instance of the class
	 * @since 1.0.0
	 */
	protected static $instance = null;

	public $wcs_cart_price_string_index  = 0;
	public $carts_keys                   = false;
	public $is_recurring_totals_template = false;

	public function __construct() {

		// Remove filters
		remove_filter( 'wcs_cart_totals_order_total_html', 'wcs_add_cart_first_renewal_payment_date' );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Add filters
		add_filter( 'woocommerce_subscription_price_string', array( $this, 'woocommerce_subscription_price_string' ), 10 );
		add_filter( 'wcs_cart_totals_order_total_html', array( $this, 'cart_renewal_payment_html' ), 20, 2 );
		add_filter( 'woocommerce_before_template_part', array( $this, 'woocommerce_before_template_part' ), 10, 4 );
		add_filter( 'woocommerce_after_template_part', array( $this, 'woocommerce_after_template_part' ) );
		add_filter( 'woocommerce_subscriptions_recurring_cart_key', array( $this, 'add_schedule_to_cart_key' ), 10, 2 );
		add_filter( 'jgtb_next_payment_date_after_skip', array( $this, 'change_date_after_skipping_month' ), 10, 2 );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'wcss-frontend', SP_WCSS_URL . '/includes/assets/frontend/js/woocommerce-subscription-schedule.js', array( 'jquery' ), filemtime( SP_WCSS_PATH . '/includes/assets/frontend/js/woocommerce-subscription-schedule.js' ), false );
	}

	/**
	 * Make sure we only do this stuff inside templates
	 *
	 * @param $template_name
	 * @param $template_path
	 * @param $located
	 * @param $args
	 * @return void
	 */
	public function woocommerce_before_template_part( $template_name, $template_path, $located, $args ) {

		// Store subscriptions globally.
		// This will help us replace period string later
		if ( 'checkout/recurring-totals.php' === $template_name ) {
			$this->carts_keys                   = self::get_carts_for_price_output();
			$this->is_recurring_totals_template = true;
		}
		if ( 'myaccount/my-subscriptions.php' === $template_name ) {
			$GLOBALS['subscriptions-list'] = $args['subscriptions'];
		}
		if ( 'myaccount/related-subscriptions.php' === $template_name ) {
			$GLOBALS['subscriptions-list'] = $args['subscriptions'];
		}
	}

	/**
	 * @param $template_name
	 */
	public function woocommerce_after_template_part( $template_name ) {
		if ( 'checkout/recurring-totals.php' === $template_name ) {
			$this->is_recurring_totals_template = false;
		}
	}

	/**
	 * Check if cart has next scheduled day and modify output html
	 *
	 * @param $subscription_string
	 *
	 * @return mixed
	 */
	public function woocommerce_subscription_price_string( $subscription_string ) {

		if ( ! $this->is_recurring_totals_template ) {
			return $subscription_string;
		}

		$next_scheduled_renewal = Helper_Functions::get_next_scheduled_renewal_from_cart_key( $this->carts_keys['wcs_cart_price_string'][ $this->wcs_cart_price_string_index ] );

		if ( $next_scheduled_renewal ) {
			$subscription_string = Helper_Functions::replace_period_html( $subscription_string );
		}

		$this->wcs_cart_price_string_index++;

		return $subscription_string;
	}

	/**
	 * Show the box schedule's next renewal date
	 *
	 * @param $order_total_html
	 * @param $cart
	 *
	 * @return string $order_total_html
	 */
	public function cart_renewal_payment_html( $order_total_html, $cart ) {

		if ( $cart->next_payment_date ) {

			$first_renewal_date = date_i18n( wc_date_format(), wcs_date_to_time( get_date_from_gmt( $cart->next_payment_date ) ) );
			// translators: This is the first time a subscription is charged after the first order.
			$order_total_html .= '<br><div class="first-payment-date"><small>' . sprintf( __( 'First Installment Payment: %s', 'wc-subs-schedule' ), $first_renewal_date ) . '</small></div><div class="first-payment-date"><small>' . sprintf( __( 'Second Installment Payment: %s', 'wc-subs-schedule' ), 'July 1, 2023' ) . '</small></div><div class="first-payment-date"><small>' . sprintf( __( 'Third Installment Payment: %s', 'wc-subs-schedule' ), 'September 1, 2023' ) . '</small></div><div class="first-payment-date"><small>' . sprintf( __( 'Fourth Installment Payment: %s', 'wc-subs-schedule' ), 'October 23, 2023' ) . '</small></div>';
		}

		return $order_total_html;
	}

	/**
	 * Mimic all the loops in checkout/recurring-totals.php template.
	 * This way we have info about current recurring cart in 'wcs_cart_price_string' and 'woocommerce_cart_totals_fee_html' hooks
	 *
	 * @return array
	 */
	private static function get_carts_for_price_output() {

		$recurring_carts = WC()->cart->recurring_carts;

		$carts = array(
			'wcs_cart_price_string' => array(),
		);

		$enabled_carts = self::add_carts( $recurring_carts );

		$carts['wcs_cart_price_string'] = array_merge( $carts['wcs_cart_price_string'], $enabled_carts );

		if ( WC()->cart->get_tax_price_display_mode() === 'excl' ) {
			if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
				foreach ( WC()->cart->get_taxes() as $tax_id => $tax_total ) {
					foreach ( $recurring_carts as $recurring_cart_key => $recurring_cart ) {
						if ( 0 === $recurring_cart->next_payment_date ) {
							continue;
						}
						foreach ( $recurring_cart->get_tax_totals() as $recurring_code => $recurring_tax ) {
							if ( ! isset( $recurring_tax->tax_rate_id ) || $recurring_tax->tax_rate_id !== $tax_id ) {
								continue;
							}
							$carts['wcs_cart_price_string'][] = $recurring_cart->recurring_cart_key;
						}
					}
				}
			} else {
				$carts['wcs_cart_price_string'] = array_merge( $carts['wcs_cart_price_string'], $enabled_carts );
			}
		}

		$carts['wcs_cart_price_string'] = array_merge( $carts['wcs_cart_price_string'], $enabled_carts, $enabled_carts );

		return $carts;
	}

	/**
	 * Add recurring carts to array
	 *
	 * @param $recurring_carts
	 *
	 * @return array
	 */
	private static function add_carts( $recurring_carts ) {

		$return = array();

		foreach ( $recurring_carts as $recurring_cart_key => $recurring_cart ) {
			if ( 0 === $recurring_cart->next_payment_date ) {
				continue;
			}
			$return[] = $recurring_cart->recurring_cart_key;
		}

		return $return;
	}

	/**
	 * Add _schedule_id to recurring cart key
	 *
	 * @param $cart_key
	 * @param $cart_item
	 *
	 * @return string
	 */
	public function add_schedule_to_cart_key( $cart_key, $cart_item ) {

		$product  = $cart_item['data'];
		$schedule = Helper_Functions::get_schedule_id_from_product( $product );

		if ( intval( $schedule ) >= 0 && '' !== $schedule ) {
			return $cart_key . '_schedule_' . $schedule;
		}

		return $cart_key;
	}

	/**
	 * When a customer skips a renewal, use payment date from the subscription schedule.
	 * This function will make this plugin compatible with `Toolbox for WooCommerce Subscriptions` plugin.
	 *
	 * @param $next_payment_date
	 * @param $subscription
	 *
	 * @return string
	 */
	public function change_date_after_skipping_month( $next_payment_date, $subscription ) {
		$schedule_id = Helper_Functions::get_subscription_schedule_id( $subscription );

		if ( false === $schedule_id ) {
			return $next_payment_date;
		}

		$box_schedule           = Helper_Functions::get_schedule_by_schedule_id( $schedule_id );
		$next_scheduled_renewal = Helper_Functions::get_next_renewal( $box_schedule, $next_payment_date );

		if ( $next_scheduled_renewal ) {
			return sprintf( '%s %s', $next_scheduled_renewal, gmdate( 'H:i:s', strtotime( $next_payment_date ) ) );
		}

		return $next_payment_date;
	}

	/**
	 * Class Instance
	 *
	 * @static
	 * @return object $instance
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

Frontend::instance();
