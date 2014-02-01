<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Crockett_Test_Plugin
 * @author    Stephen Crockett <crockett95@gmail.com>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Stephen Crockett
 *
 * @wordpress-plugin
 * Plugin Name:       Crockett Test Plugin
 * Plugin URI:       
 * Description:       
 * Version:           1.0.0
 * Author:       Stephen Crockett
 * Author URI:       
 * Text Domain:       crockett-test-plugin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/crockett95/Updater-Test
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-crockett-test-plugin.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-crockett-test-plugin.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Crockett_Test_Plugin with the name of the class defined in
 *   `class-crockett-test-plugin.php`
 */
register_activation_hook( __FILE__, array( 'Crockett_Test_Plugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Crockett_Test_Plugin', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Crockett_Test_Plugin with the name of the class defined in
 *   `class-crockett-test-plugin.php`
 */
add_action( 'plugins_loaded', array( 'Crockett_Test_Plugin', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-crockett-test-plugin-admin.php` with the name of the plugin's admin file
 * - replace Crockett_Test_Plugin_Admin with the name of the class defined in
 *   `class-crockett-test-plugin-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-crockett-test-plugin-admin.php' );
	add_action( 'plugins_loaded', array( 'Crockett_Test_Plugin_Admin', 'get_instance' ) );

}

function CrockettTestPlugin_github_updater () {
    include('updater/GithubPluginUpdater.php');
    $updater = new WpGithubPluginUpdater(__FILE__);
}
add_action('admin_init', "CrockettTestPlugin_github_updater");