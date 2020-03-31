<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link        https://dmtrmrv.com
 * @since       0.1.0
 * @package     Portfolio Toolkit
 *
 * Plugin Name: Portfolio Toolkit
 * Description: Adds portfolio functionality to your WordPress website.
 * Version:     0.1.8
 * Author:      Dmitry Mayorov
 * Author URI:  https://dmtrmrv.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: portfolio-toolkit
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-portfolio-toolkit-activator.php
 */
function activate_portfolio_toolkit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-toolkit-activator.php';
	Portfolio_Toolkit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-portfolio-toolkit-deactivator.php
 */
function deactivate_portfolio_toolkit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-toolkit-deactivator.php';
	Portfolio_Toolkit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_portfolio_toolkit' );
register_deactivation_hook( __FILE__, 'deactivate_portfolio_toolkit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-toolkit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 0.1.0
 */
function run_portfolio_toolkit() {

	$plugin = new Portfolio_Toolkit();
	$plugin->run();

}
run_portfolio_toolkit();
