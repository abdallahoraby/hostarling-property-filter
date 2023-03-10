<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://github.com/abdallahoraby
 * @since             1.0.7
 * @package           Pro_Filter
 *
 * @wordpress-plugin
 * Plugin Name:       Property Filter
 * Plugin URI:        http://github.com/abdallahoraby
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.7
 * Author:            Rokaya & Abdallah
 * Author URI:        http://github.com/abdallahoraby
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pro-filter
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
define( 'PRO_FILTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pro-filter-activator.php
 */
function activate_pro_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pro-filter-activator.php';
	Pro_Filter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pro-filter-deactivator.php
 */
function deactivate_pro_filter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pro-filter-deactivator.php';
	Pro_Filter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pro_filter' );
register_deactivation_hook( __FILE__, 'deactivate_pro_filter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pro-filter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pro_filter() {

	$plugin = new Pro_Filter();
	$plugin->run();

}
run_pro_filter();




