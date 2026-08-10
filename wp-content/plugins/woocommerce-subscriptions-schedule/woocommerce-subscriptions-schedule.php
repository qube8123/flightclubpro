<?php
/**
 * Plugin Name:     WooCommerce Subscriptions Schedule
 * Plugin URI:      https://shopplugins.com/plugins/woocommerce-subscriptions-schedule/
 * Description:     Adds a schedule of delivery for WooCommerce Subscription products.
 * Author:          Shop Plugins
 * Author URI:      https://shopplugins.com
 * WC requires at least: 3.0
 * WC tested up to: 7
 * Text Domain:     wc-subs-schedule
 * Domain Path:     /languages
 * Version:         1.0.10
 *
 * @package         WooCommerce_Subscription_Schedule
 */
/**
 * Copyright 2014-2023 Shop Plugins  (email: support@shopplugins.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */
namespace ShopPlugins\WCSS;

define( 'SP_WCSS_PLUGINS_DIR', dirname( __FILE__ ) );
define( 'SP_WCSS_PATH', plugin_dir_path( __FILE__ ) );
define( 'SP_WCSS_URL', plugin_dir_url( __FILE__ ) );
define( 'SP_WCSS_FILE', __FILE__ );
define( 'SP_WCSS_VERSION', '1.0.10' );
define( 'SP_WCSS_REQ_WC_VERSION', '3.0.0' );
define( 'SP_WCSS_REQ_WCS_VERSION', '2.3.0' );
define( 'SP_WCSS_OPTION_PREFIX', 'sp_wcss_' );

add_action( 'plugins_loaded', __NAMESPACE__ . '\\init', 0 );
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\load_custom_styles_scripts' );
add_action( 'admin_init', __NAMESPACE__ . '\\auto_updater' );

/**
 * All distinct functionality are in their own files, in a namespace, and with no classes.
 */
function init() {
	if ( ! check_prerequisites() ) {
		return false;
	}

	load_plugin_textdomain( 'wc-subs-schedule', false, untrailingslashit( SP_WCSS_PLUGINS_DIR ) . '/languages' );

	require_once 'includes/class-helper-functions.php';
	require_once 'includes/class-free-first-order.php';

	if ( is_admin() ) {
		include_admin_functions();
	} else {
		include_frontend_functions();
	}

	return true;
}

/**
 * Load admin specific functionality.
 */
function include_admin_functions() {
	require_once 'includes/admin/settings.php';
	require_once 'includes/admin/product-settings.php';
}

/**
 * Load files / functionality that are only required on the front end. That's most of it.
 */
function include_frontend_functions() {
	require_once 'includes/frontend/class-frontend.php';
	require_once 'includes/frontend/class-shortcodes.php';
}

/**
 * Load admin assets
 */
function load_custom_styles_scripts() {
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_style( 'woocommerce-subscriptions-schedule', SP_WCSS_URL . '/includes/assets/admin/css/woocommerce-subscription-schedule.css', array(), SP_WCSS_VERSION );
	wp_enqueue_script( 'woocommerce-subscriptions-schedule', SP_WCSS_URL . '/includes/assets/admin/js/woocommerce-subscription-schedule.js', array( 'jquery', 'jquery-ui-datepicker' ), SP_WCSS_VERSION, true );
}

/**
 * Wrapper function to check whether WooCommerce and Subscriptions are active.
 */
function check_prerequisites() {
	// Subs 2.1+ check.
	if ( ! class_exists( 'WC_Subscriptions' ) || version_compare( \WC_Subscriptions::$version, SP_WCSS_REQ_WCS_VERSION ) < 0 ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\\wcs_admin_notice' );
		return false;
	}

	// WC version check. version compare returns -1 if the first version is lower, 0 if they're equal, 1 if the second is higher
	if ( ! class_exists( 'WooCommerce' ) || version_compare( WC()->version, SP_WCSS_REQ_WC_VERSION ) < 0 ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\\wc_admin_notice' );
		return false;
	}

	return true;
}

/**
 * Display a warning message if Subs version check fails.
 *
 * @return void
 */
function wc_admin_notice() {
	/* translators: This is a notice that the WooCommerce version does not meet the requirement. */
	echo wp_kses_post( '<div class="error"><p>' . sprintf( __( 'WooCommerce Subscriptions Schedule requires at least WooCommerce %s in order to function. Please activate or upgrade WooCommerce.', 'wc-subs-schedule' ), SP_WCSS_REQ_WC_VERSION ) . '</p></div>' );
}

/**
 * Display a warning message if WC version check fails.
 *
 * @return void
 */
function wcs_admin_notice() {
	/* translators: This is a notice that the WooCommerce Subscriptions version does not meet the requirement. */
	echo wp_kses_post( '<div class="error"><p>' . sprintf( __( 'WooCommerce Subscriptions Schedule requires WooCommerce Subscriptions version %s or higher. Please activate or update Subscriptions.', 'wc-subs-schedule' ), SP_WCSS_REQ_WCS_VERSION ) . '</p></div>' );
}

/**
 * Is only run on plugins_loaded when it's an admin request, and we haven't saved any options yet. It checks whether
 * the 'skip_next_available' option is present or not to determine whether it's been run.
 */
function first_run() {
	Settings\add_default_settings();
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\trigger_flush_rewrite_rules' );
}

/**
 * Hooked into after_setup_theme, because its previous position within first_run was too early. WP_Rewrite isn't populated / loaded
 * at plugins_loaded.
 */
function trigger_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/**
 * Shop Plugins Updater
 */
function auto_updater() {

	// Updater.
	if ( ! class_exists( '\ShopPlugins\Updater\WP_Updater' ) ) {
		require 'vendor/shopplugins/wp-updater/class-wp-updater.php';
	}
	new \ShopPlugins\Updater\WP_Updater(
		array(
			'file'    => __FILE__,
			'name'    => 'WooCommerce Subscriptions Schedule',
			'version' => SP_WCSS_VERSION,
			'api_url' => 'https://shopplugins.com',

		)
	);
}

$GLOBALS['wc_subs_schedule_namespace'] = __NAMESPACE__;
