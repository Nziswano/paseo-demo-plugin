<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.johan-martin.com
 * @since             0.0.1
 * @package           Paseo_Wp_Form_Api
 *
 * @wordpress-plugin
 * Plugin Name:       Paseo Demo Plugin
 * Plugin URI:        https://github.com/catenare/paseo-demo-plugin
 * Description:       Demo plugin using php namespacing and autoloading
 * Version:           0.0.1
 * Author:            Johan Martin
 * Author URI:        http://www.johan-martin.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       paseo-demo-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$exit_message = 'Requires Wordpress 4.8 or newer or PHP 7+';

// Check PHP Version
if (version_compare( PHP_VERSION, '7.0.0', '<')) {
	exit ($exit_message);
}

// Check Wordpress Version
global $wp_version;
if (version_compare($wp_version, "4.7", "<")){
	exit( $exit_message );
}

define( 'PASEO_DEMO_PLUGIN_VERSION', '0.0.1' );

require __DIR__ . DIRECTORY_SEPARATOR. 'vendor/autoload.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in src/Lib/Activator.php
 */
function activate_paseo_demo_plugin() {
	Demo\Lib\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in src/Lib/Deactivator.php
 */
function deactivate_paseo_demo_plugin() {
	Demo\Lib\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_paseo_demo_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_paseo_demo_plugin' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin() {

	$plugin = new Demo\Main();
	$plugin->run();

}
run_plugin();
