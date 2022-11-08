<?php

/**
 *
 * @link              https://www.github.com/yigitus/
 * @since             1.0.5
 * @package           Yts_Fab
 *
 * @wordpress-plugin
 * Plugin Name:       YTS Floating action button
 * Plugin URI:        https://www.github.com/yigitus/yts-fab
 * Description:       This plugin adds a floating action to your website.
 * Version:           1.0.6
 * Author:            yigitus
 * Author URI:        https://www.github.com/yigitus/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yts-fab
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
define( 'YTS_FAB_VERSION', '1.0.6' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yts-fab-activator.php
 */
function activate_yts_fab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yts-fab-activator.php';
	Yts_Fab_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yts-fab-deactivator.php
 */
function deactivate_yts_fab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yts-fab-deactivator.php';
	Yts_Fab_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yts_fab' );
register_deactivation_hook( __FILE__, 'deactivate_yts_fab' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yts-fab.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yts_fab() {

	$plugin = new Yts_Fab();
	$plugin->run();

}
run_yts_fab();
