<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/teddylau168
 * @since             1.0.0
 * @package           Wp_Publish_Request
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Publish Request
 * Plugin URI:        https://github.com/teddylau168/wp-publish-request/
 * Description:       Publish Request is a WordPress Plugin which is designed for publishing the post with an approval process like Git Pull Request.
 * Version:           1.0.0
 * Author:            Teddy Lau
 * Author URI:        https://github.com/teddylau168
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-publish-request
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_PUBLISH_REQUEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-publish-request-activator.php
 */
function activate_wp_publish_request() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-publish-request-activator.php';
	Wp_Publish_Request_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-publish-request-deactivator.php
 */
function deactivate_wp_publish_request() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-publish-request-deactivator.php';
	Wp_Publish_Request_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_publish_request' );
register_deactivation_hook( __FILE__, 'deactivate_wp_publish_request' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-publish-request.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_publish_request() {

	$plugin = new Wp_Publish_Request();
	$plugin->run();

}
run_wp_publish_request();
