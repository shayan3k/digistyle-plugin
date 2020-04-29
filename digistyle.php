
<?php
/**
 * Plugin Name:       Wordpress Digistyle plugin
 * Plugin URI:        https://Shayanmotalebi.ir/
 * Description:       Handle the Site plugin.
 * Version:           1.0.0
 * Author:            ShayaNNN
 * Author URI:        https://Shayanmotalebi.ir/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       shayan
 * Domain Path:       /languages
 * 
 * 
 */



// If this file is called firectly, abort!!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Init;
use Inc\Pages\Admin;
use Inc\Pages\MySettingsPage;
use Inc\RestApi\ProductRestApi;

/**
 * The code that runs during plugin activation
 */
function activate_alecaddd_plugin()
{
    Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecaddd_plugin()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_alecaddd_plugin');
register_deactivation_hook(__FILE__, 'deactivate_alecaddd_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
    Init::register_services();
}


// /**
//  * Initialize Widgets
//  */
// if (is_admin())
//     Settings::register_widgets();
/**
 * Initialize the settings for admin
 */
if (is_admin()) {
    $adminPage = new Admin();
    $adminPage->register();
}


/**
 * Initialize the settings for admin
 */

if (is_admin())
    $my_settings_page = new MySettingsPage();


/**
 * Register Rest Api
 */
$restApi = new ProductRestApi();
