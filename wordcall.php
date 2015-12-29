<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ijas.me/
 * @since             1.0.0
 * @package           Wordcall
 *
 * @wordpress-plugin
 * Plugin Name:       WordCall
 * Plugin URI:        https://ijas.me/wordcall/
 * Description:       Make phone calls via Twilio.
 * Version:           1.0.0
 * Author:            Jacob Schweitzer
 * Author URI:        https://ijas.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordcall
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordcall-activator.php
 */
function activate_wordcall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordcall-activator.php';
	Wordcall_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordcall-deactivator.php
 */
function deactivate_wordcall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordcall-deactivator.php';
	Wordcall_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wordcall' );
register_deactivation_hook( __FILE__, 'deactivate_wordcall' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordcall.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordcall() {

	$plugin = new Wordcall();
	$plugin->run();

}
run_wordcall();
