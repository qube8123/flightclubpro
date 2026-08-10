<?php
namespace ShopPlugins\WCSS\Settings;

add_filter( 'woocommerce_settings_tabs_array', __NAMESPACE__ . '\\add_settings_tab', 60 );
add_action( 'woocommerce_settings_tabs_wc-subs-schedule', __NAMESPACE__ . '\\settings_page' );
add_action( 'woocommerce_update_options_wc-subs-schedule', __NAMESPACE__ . '\\update_settings' );
add_filter( 'plugin_action_links_' . plugin_basename( SP_WCSS_FILE ), __NAMESPACE__ . '\\plugin_action_links' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\\remove_jquery_localize' );

/**
 * Add the Schedule settings tab to the WooCommerce settings tabs array.
 *
 * @param array      $settings_tabs  Array of WooCommerce setting tabs & their labels, excluding the Schedule tab.
 * @return array     $settings_tabs  Array of WooCommerce setting tabs & their labels, including the Schedule tab.
 * @since 0.1.0
 */
function add_settings_tab( $settings_tabs ) {

	/* translators: This is the label of the tab in WooCommerce settings. */
	$settings_tabs['wc-subs-schedule'] = __( 'Subscriptions Schedule', 'wc-subs-schedule' );

	return $settings_tabs;
}

/**
 * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
 *
 * @uses woocommerce_admin_fields()
 * @uses get_plugin_settings()
 * @since 0.1.0
 */
function settings_page() {
	woocommerce_admin_fields( get_plugin_settings() );
	wp_nonce_field( 'sp_wcss_settings', '_wcsnonce', false );
}

/**
 * Sets default values for all the Toolbox options. Called on plugin activation.
 *
 * @since 0.1.0
 */
function add_default_settings() {
	foreach ( get_plugin_settings() as $setting ) {
		if ( isset( $setting['default'] ) ) {
			update_option( $setting['id'], $setting['default'], false );
		}
	}
}

/**
 * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
 *
 * @uses woocommerce_update_options()
 * @uses get_settings()
 * @since 0.1.0
 */
function update_settings() {
	if ( empty( $_POST['_wcsnonce'] ) || ! wp_verify_nonce( $_POST['_wcsnonce'], 'sp_wcss_settings' ) ) {
		return;
	}
	woocommerce_update_options( get_plugin_settings() );
	flush_rewrite_rules();
}

/**
 * Get all the settings for the Subscriptions extension in the format required by the @see woocommerce_admin_fields() function.
 *
 * @return array Array of settings in the format required by the @see woocommerce_admin_fields() function.
 * @since 1.0
 */
function get_plugin_settings() {
	return apply_filters(
		'sp_wcss_settings',
		array(

			// begins a section
			array(
				'name' => __( 'Subscriptions Schedule', 'wc-subs-schedule' ),
				'type' => 'title',
				'desc' => __( 'Define subscription schedules below. Each schedule includes a name and renewal dates.<br/>Subscriptions assigned to a schedule will renew only on the dates defined in the schedule.', 'wc-subs-schedule' ),
				'id'   => SP_WCSS_OPTION_PREFIX . '_features',
			),
			array(
				'name'            => __( 'Schedules', 'wc-subs-schedule' ),
				'id'              => SP_WCSS_OPTION_PREFIX . 'box_schedule',
				'default'         => '',
				'type'            => 'text',
				'show_if_checked' => 'option',
				'css'             => 'display: none;',
			),
			array(
				'type' => 'sectionend',
				'id'   => SP_WCSS_OPTION_PREFIX . '_features',
			),
		)
	);
}

/**
 * Add a link to the plugins page linked to the settings area
 * @param $links
 *
 * @return array
 */
function plugin_action_links( $links ) {
	$setting_link = get_setting_link();

	$plugin_links = array(
		'<a href="' . $setting_link . '">' . __( 'Settings', 'wc-subs-schedule' ) . '</a>',
	);
	return array_merge( $plugin_links, $links );
}

/**
 * Return admin url plus settings page
 *
 * @return string
 */
function get_setting_link() {
	return admin_url( 'admin.php?page=wc-settings&tab=wc-subs-schedule' );
}

/*
 * Right now we rely on datepicker dates format. Therefore we cannot afford the datepicker to be translated.
 * Remove the localization from the Subscription Schedule settings screen.
 */
function remove_jquery_localize() {
	if ( isset( $_GET['tab'] ) && 'wc-subs-schedule' === $_GET['tab'] && is_admin() ) {
		remove_action( 'admin_enqueue_scripts', 'wp_localize_jquery_ui_datepicker', 1000 );
	}
}
