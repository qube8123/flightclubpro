<?php
namespace ShopPlugins\WCSS;

class Free_First_Order {

	/**
	 * @var object The single instance of the class
	 * @since 1.0.1
	 */
	protected static $instance = null;

	public function __construct() {

		// Maybe mock a free trial on the product for calculating totals and displaying correct shipping costs
		add_action( 'woocommerce_before_calculate_totals', __CLASS__ . '::maybe_set_free_trial', 0, 1 );
		add_action( 'woocommerce_subscription_cart_before_grouping', __CLASS__ . '::maybe_unset_free_trial' );
		add_action( 'woocommerce_subscription_cart_after_grouping', __CLASS__ . '::maybe_set_free_trial' );
		add_filter( 'wcs_recurring_cart_start_date', __CLASS__ . '::maybe_unset_free_trial', 0, 1 );
		add_filter( 'wcs_recurring_cart_end_date', __CLASS__ . '::maybe_set_free_trial', 101, 1 );
		add_filter( 'woocommerce_subscriptions_calculated_total', __CLASS__ . '::maybe_unset_free_trial', 10001, 1 );
		add_action( 'woocommerce_cart_totals_before_shipping', __CLASS__ . '::maybe_set_free_trial' );
		add_action( 'woocommerce_cart_totals_after_shipping', __CLASS__ . '::maybe_unset_free_trial' );
		add_action( 'woocommerce_review_order_before_shipping', __CLASS__ . '::maybe_set_free_trial' );
		add_action( 'woocommerce_review_order_after_shipping', __CLASS__ . '::maybe_unset_free_trial' );
	}

	/**
	 * If product has a free first order setup, create free trial in cart.
	 *
	 * @since 1.0.1
	 * @param string $total
	 * @return mixed|string
	 * @throws \Exception
	 */
	public static function maybe_set_free_trial( $total = '' ) {

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$product = $cart_item['data'];

			if ( self::is_first_free_order_for_product( $product ) && ! self::is_next_renewal_today( $product ) ) {
				$days_to_next_renewal = Helper_Functions::get_interval_days_from_today( $product );
				wcs_set_objects_property( WC()->cart->cart_contents[ $cart_item_key ]['data'], 'subscription_trial_length', $days_to_next_renewal, 'set_prop_only' );
			}
		}

		return $total;
	}

	/**
	 * If product has a free first order setup, create free trial in cart.
	 *
	 * @since 1.0.1
	 *
	 * @param string $total
	 *
	 * @return string
	 */
	public static function maybe_unset_free_trial( $total = '' ) {

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if ( self::is_first_free_order_for_product( $cart_item['data'] ) && ! self::is_next_renewal_today( $cart_item['data'] ) ) {
				wcs_set_objects_property( WC()->cart->cart_contents[ $cart_item_key ]['data'], 'subscription_trial_length', \WC_Subscriptions_Product::get_trial_length( wcs_get_canonical_product_id( $cart_item ) ), 'set_prop_only' );
			}
		}
		return $total;
	}

	/**
	 * @param $product
	 *
	 * @since 1.0.1
	 *
	 * @return bool
	 */
	public static function is_first_free_order_for_product( $product ) {
		if ( ! is_object( $product ) ) {
			$product = wc_get_product( $product );
		}

		$schedule     = Helper_Functions::get_schedule_id_from_product( $product );
		$has_schedule = '0' === $schedule || 0 < intval( $schedule );

		if ( ! is_object( $product ) || ! \WC_Subscriptions_Product::is_subscription( $product ) || ! $has_schedule ) {
			return false;
		}

		return 'yes' === get_post_meta( $product->get_id(), 'subscription_variation' === $product->get_type() ? '_variable_ss_first_free_order' : '_subscription_schedule_first_free_order', true );
	}

	/**
	 * Check if renewal date is today. If it is, there is no need to set trial period.
	 *
	 * @param $product
	 *
	 * @since 1.0.1
	 *
	 * @return bool
	 */
	public static function is_next_renewal_today( $product ) {

		$schedule_id            = Helper_Functions::get_schedule_id_from_product( $product );
		$box_schedule           = Helper_Functions::get_schedule_by_schedule_id( $schedule_id );
		$next_scheduled_renewal = Helper_Functions::get_next_renewal( $box_schedule, null, true );

		return gmdate( 'Y-m-d', time() ) === $next_scheduled_renewal;
	}

	/**
	 * Class Instance
	 *
	 * @static
	 * @return object $instance
	 *
	 * @since  1.0.1
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Free_First_Order::instance();
