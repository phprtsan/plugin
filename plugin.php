<?php // phpcs:ignore

/**
 * Your Plugin Name
 *
 * @package           PluginPackage
 * @author            PHP Artisan
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Your Plugin Name
 * Plugin URI:        https://phprtsan.com/your-plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      7.4
 * Author:            PHP Artisan
 * Author URI:        https://phprtsan.com
 * Text Domain:       your-plugin-name
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
|--------------------------------------------------------------------------
| If this file is called directly, abort.
|--------------------------------------------------------------------------
*/
if ( ! defined( 'WPINC' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Load class autoload
|--------------------------------------------------------------------------
*/
require_once __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Define default constants
|--------------------------------------------------------------------------
*/
define( 'PluginPackage\SLUG', 'your-plugin-name' );
define( 'PluginPackage\VERSION', '1.0.0' );
define( 'PluginPackage\FILE', __FILE__ );


/*
|--------------------------------------------------------------------------
| Activation, deactivation and uninstall event.
|--------------------------------------------------------------------------
*/
register_activation_hook( __FILE__, array( \PluginPackage\Plugin::class, 'activate' ) );
register_deactivation_hook( __FILE__, array( \PluginPackage\Plugin::class, 'deactivate' ) );
register_uninstall_hook( __FILE__, array( \PluginPackage\Plugin::class, 'uninstall' ) );

/*
|--------------------------------------------------------------------------
| Start the plugin
|--------------------------------------------------------------------------
*/
try {
	\PluginPackage\Plugin::init();
} catch ( Exception $e ) {
	\PluginPackage\Controllers\LogController::instance()->write( 'error', $e->getMessage() );
}
