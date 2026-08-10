<?php
namespace ShopPlugins\WCSS;

class Shortcodes {

	/**
	 * @var object The single instance of the class
	 */
	protected static $instance = null;

	public function __construct() {
		add_shortcode( 'wcss-first-payment-date', array( $this, 'product_first_payment_date' ) );
	}

	/**
	 * Class Instance
	 *
	 * @static
	 * @return object instance
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Shortcode that outputs product next payment date.
	 * It can take arguments product_id and format
	 *
	 * format: date format
	 * product_id: Product ID. It can also be variation ID. Variable product ID only works on product page.
	 *
	 * @param $args
	 *
	 * @return false|string
	 */
	public function product_first_payment_date( $args ) {

		global $post;

		if ( isset( $args['product_id'] ) ) {
			$product_id = $args['product_id'];
		} else {

			if ( ! is_object( $post ) ) {
				return '';
			}

			$product_id = $post->ID;
		}

		$product = wc_get_product( $product_id );
		if ( $product && ! is_wp_error( $product ) ) {

			$format = isset( $args['format'] ) ? $args['format'] : 'F j, Y';

			if ( $product->is_type( array( 'subscription', 'subscription_variation' ) ) ) {

				$next_scheduled_renewal = Helper_Functions::get_next_renewal_date_from_product( $product, $format );

				if ( ! $next_scheduled_renewal ) {
					return '';
				}

				ob_start();
				?>
					<span class="wcss-next-payment-date">
						<?php echo esc_attr( $next_scheduled_renewal ); ?>
					</span>
				<?php

				return ob_get_clean();
			} elseif ( $product->is_type( 'variable-subscription' ) ) {

				// Only show this on the product page.
				if ( ! is_object( $post ) || $post->ID !== $product->get_id() ) {
					return '';
				}

				$children = $product->get_children();
				$children = array_map(
					function ( $child_id ) use ( $format ) {
						return array(
							'child_id'     => $child_id,
							'next_payment' => Helper_Functions::get_next_renewal_date_from_product( wc_get_product( $child_id ), $format ),
						);
					},
					$children
				);

				ob_start();
				?>
					<span class="wcss-next-payment-date" data-variations-next-payment-date='<?php echo wp_json_encode( $children ); ?>'></span>
				<?php

				return ob_get_clean();
			}
		}

		return '';
	}

}

Shortcodes::instance();
