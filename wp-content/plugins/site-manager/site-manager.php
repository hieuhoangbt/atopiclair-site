<?php
/*
Plugin Name: Site Manager
Plugin URI:  http://vuonxa.net
Description: Plugin create for manager website
Version:     5.0
Author:      Hieuhoangbt
Author URI:  http://info.vuonxa.net
Text Domain: vuonxa
 */

if(!function_exists('add_action')){
    echo "Please go out now!"; exit;
}

define('PLG_VERSION', '1.0');
define('PLG_MINIMUM_WP_VERSION', '4.2');
define('PLG_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLG_PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLG_PLUGIN_LANGUAGES', dirname(plugin_basename(__FILE__)) . '/languages');

require_once PLG_PLUGIN_DIR.'libs/class.site-manager-posttype.php';
require_once PLG_PLUGIN_DIR.'libs/class.site-manager.php';
register_activation_hook(__FILE__, array('SiteManager', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('SiteManager', 'plugin_deactivation'));

SiteManager::run();