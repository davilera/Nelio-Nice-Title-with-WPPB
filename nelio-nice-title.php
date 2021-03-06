<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://neliosoftware.com
 * @since             1.0.0
 * @package           Nelio_Nice_Title
 *
 * @wordpress-plugin
 * Plugin Name:       Nelio Nice Title (WPPB)
 * Plugin URI:        http://neliosoftware.com/create-better-plugins-with-the-plugin-boilerplate/
 * Description:       This plugin tells all your visitors they're cool.
 * Version:           1.0.0
 * Author:            David Aguilera
 * Author URI:        http://neliosoftware.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nelio-nice-title
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nelio-nice-title-activator.php
 */
function activate_nelio_nice_title() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nelio-nice-title-activator.php';
	Nelio_Nice_Title_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nelio-nice-title-deactivator.php
 */
function deactivate_nelio_nice_title() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nelio-nice-title-deactivator.php';
	Nelio_Nice_Title_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nelio_nice_title' );
register_deactivation_hook( __FILE__, 'deactivate_nelio_nice_title' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nelio-nice-title.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nelio_nice_title() {

	$plugin = new Nelio_Nice_Title();
	$plugin->run();

}
run_nelio_nice_title();
