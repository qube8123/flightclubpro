<?php
namespace ShopPlugins\WCSS\Settings;

// Add subscription schedule select to the Subscription box
add_action( 'woocommerce_subscriptions_product_options_pricing', __NAMESPACE__ . '\\subscription_pricing_fields' );

// Add subscription schedule select to the Subscription variations
add_action( 'woocommerce_variable_subscription_pricing', __NAMESPACE__ . '\\subscription_variation_schedule_fields', 10, 3 );

// Save post meta
add_action( 'save_post', __NAMESPACE__ . '\\save_subscription_meta', 11 );

// Save post meta for variation
add_action( 'woocommerce_save_product_variation', __NAMESPACE__ . '\\woocommerce_save_product_variation', 10, 2 );

/**
 * Add schedule dropdown to simple subscription
 */
function subscription_pricing_fields() {
	global $post;
	$schedule_name_tooltip = _x( 'This subscription\'s renewals will adhere to the box schedule.', 'wc-subs-schedule' );

	$current_schedule = get_post_meta( $post->ID, '_subscription_schedule_id', true );
	$schedules        = \ShopPlugins\WCSS\Helper_Functions::get_subscription_schedules();
	// Box Subscription
	?>
	<p class="form-field _subscription_schedule_id_field">
		<label for="_subscription_schedule_id">
		<?php
			/* translators: This is the label on the schedule settings page. */
			esc_html_e( 'Schedule', 'wc-subs-schedule' );
		?>
			</label>
		<span class="wrap">
			<?php if ( ! $schedules ) { ?>
				You don't have any schedules yet. <a href="<?php echo admin_url( 'admin.php?page=wc-settings&tab=wc-subs-schedule' ); ?>">Add schedules here</a>.
			<?php } else { ?>
				<select id="_subscription_schedule_id" name="_subscription_schedule_id" class="variable_subscription_schedule-input">
					<option value="">
					<?php
						/* translators: This the option when no schedule is selected. */
						esc_html_e( 'No Schedule', 'wc-subs-schedule' );
					?>
						</option>
					<?php
					foreach ( $schedules as $schedule ) {
						$schedule = get_object_vars( $schedule );
						?>
						<option value="<?php echo $schedule['id']; ?>" <?php selected( $current_schedule, $schedule['id'] ); ?>><?php echo $schedule['name']; ?></option>
						<?php
					}
					?>
				</select>
				<?php echo wcs_help_tip( $schedule_name_tooltip ); // phpcs:ignore. ?>
			<?php } ?>
		</span>
	</p>
	<?php if ( $schedules ) { ?>
		<p class="form-field _subscription_schedule_first_free_order">
			<label for="_subscription_schedule_first_free_order">First order</label>
			<input id="_subscription_schedule_first_free_order" type="checkbox" class="checkbox"
				name="_subscription_schedule_first_free_order"
				value="yes" <?php checked( 'yes' === get_post_meta( $post->ID, '_subscription_schedule_first_free_order', true ), true, true ); ?>>
			<span>&nbsp;Do not charge for first order. Customer will be charged on next subscription schedule date.</span>
		</p>
	<?php } ?>
	<?php
}

/**
 * Add schedule dropdown to variable subscription
 *
 * @param $loop
 * @param $variation_data
 * @param $variation
 */
function subscription_variation_schedule_fields( $loop, $variation_data, $variation ) {
	$box_schedule = get_post_meta( $variation->ID, '_variable_subscription_schedule_id', true );
	if ( '0' === $box_schedule ) {
		$box_schedule = 0;
	} elseif ( intval( $box_schedule ) > 0 ) {
		$box_schedule = intval( $box_schedule );
	}
	$schedules = \ShopPlugins\WCSS\Helper_Functions::get_subscription_schedules();
	?>
	<p class="form-field _variable_subscription_schedule_id<?php echo $loop; // phpcs:ignore. ?>_field form-row form-row-full">
		<label for="_variable_subscription_schedule_id<?php echo $loop; // phpcs:ignore. ?>"><?php esc_html_e( 'Schedule', 'wc-subs-schedule' ); ?></label>
		<?php if ( ! $schedules ) { ?>
			You don't have any schedules yet. <a href="<?php echo admin_url( 'admin.php?page=wc-settings&tab=wc-subs-schedule' ); // phpcs:ignore. ?>">Add schedules here</a>.
		<?php } else { ?>
			<select id="_variable_subscription_schedule_id<?php echo $loop; ?>" name="_variable_subscription_schedule_id[<?php echo $loop; ?>]" class="variable_subscription_schedule-input">
				<option value="">No Schedule</option>
				<?php
				foreach ( $schedules as $schedule ) {
					$schedule = get_object_vars( $schedule );
					?>
					<option value="<?php echo $schedule['id']; ?>" <?php selected( $box_schedule, $schedule['id'] ); ?>><?php echo $schedule['name']; ?></option>
					<?php
				}
				?>
			</select>
		<?php } ?>
	</p>
	<?php if ( $schedules ) { ?>
	<p class="form-field _variable_ss_first_free_order _variable_ss_first_free_order<?php echo $loop; // phpcs:ignore. ?>_field">
		<input id="_variable_ss_first_free_order[<?php echo $loop; ?>]" type='checkbox' class='checkbox'
			   name="_variable_ss_first_free_order[<?php echo $loop; ?>]"
			   value='yes' <?php checked( 'yes' === get_post_meta( $variation->ID, '_variable_ss_first_free_order', true ), true, true ); ?>>
		<label style="margin-left: 5px;" class="description" for="_variable_ss_first_free_order[<?php echo $loop; ?>]">Do not charge for first order. Customer will be charged on the next subscription schedule date.</label>
	</p>
	<?php } ?>
	<?php
}

/**
 * Save simple subscription schedule box meta
 *
 * @param $post_id
 */
function save_subscription_meta( $post_id ) {
	if ( empty( $_POST['_wcsnonce'] ) || ! wp_verify_nonce( $_POST['_wcsnonce'], 'wcs_subscription_meta' ) ) {
		return;
	}
	if ( isset( $_REQUEST['_subscription_schedule_id'] ) ) {
		update_post_meta( $post_id, '_subscription_schedule_id', $_REQUEST['_subscription_schedule_id'] );
	}
	if ( isset( $_REQUEST['_variable_subscription_schedule_id'] ) ) {
		update_post_meta( $post_id, '_variable_subscription_schedule_id', $_REQUEST['_variable_subscription_schedule_id'] );
	}
	if ( isset( $_REQUEST['_subscription_schedule_first_free_order'] ) ) {
		update_post_meta( $post_id, '_subscription_schedule_first_free_order', $_REQUEST['_subscription_schedule_first_free_order'] );
	} else {
		delete_post_meta( $post_id, '_subscription_schedule_first_free_order' );
	}
}

/**
 * Save variation subscription schedule box meta
 *
 * @param $variation_id
 * @param $i
 */
function woocommerce_save_product_variation( $variation_id, $i ) {
	if ( isset( $_POST['_variable_subscription_schedule_id'][ $i ] ) ) {
		update_post_meta( $variation_id, '_variable_subscription_schedule_id', $_POST['_variable_subscription_schedule_id'][ $i ] );
	}
	if ( isset( $_POST['_variable_ss_first_free_order'][ $i ] ) ) {
		update_post_meta( $variation_id, '_variable_ss_first_free_order', $_POST['_variable_ss_first_free_order'][ $i ] );
	} else {
		delete_post_meta( $variation_id, '_variable_ss_first_free_order' );
	}
}
