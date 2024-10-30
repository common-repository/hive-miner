<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://devoncmather.com
 * @since             1.0.0
 * @package           Hive_Miner
 *
 * @wordpress-plugin
 * Plugin Name:       Coin Hive Miner
 * Plugin URI:        http://devoncmather.com/wp-coin-hive-miner/
 * Description:       Coin Hive Miner implements the Coin Hive Javascript browser Monero mining script into your WordPress website.
 * Version:           1.0.0
 * Author:            Devon Mather
 * Author URI:        http://devoncmather.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hive-miner
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hive-miner-activator.php
 */
function activate_hive_miner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hive-miner-activator.php';
	Hive_Miner_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hive-miner-deactivator.php
 */
function deactivate_hive_miner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hive-miner-deactivator.php';
	Hive_Miner_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hive_miner' );
register_deactivation_hook( __FILE__, 'deactivate_hive_miner' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hive-miner.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hive_miner() {

	$plugin = new Hive_Miner();
	$plugin->run();

}
run_hive_miner();
