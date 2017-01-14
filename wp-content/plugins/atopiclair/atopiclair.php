<?php
/**
 * Plugin Name: Atopiclair
 * Description: Custom fields atopiclair
 * Version: 1.0
 * Author: XuanAnh 
 * License: Atopiclair Team
 * Text Domain: atopiclair
 */
if(!function_exists('add_action')){
    echo "Vui lòng quay lại!"; exit;
}

define('ATOPICLAIR_VERSION', '1.0');
define('ATOPICLAIR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ATOPICLAIR_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ATOPICLAIR_PLUGIN_LANGUAGES', dirname(plugin_basename(__FILE__)) . '/languages');

require_once ATOPICLAIR_PLUGIN_DIR.'libs/class.atopiclair.php';
require_once ATOPICLAIR_PLUGIN_DIR.'libs/class.atopiclair-doctor.php';
register_activation_hook(__FILE__, array('Atopiclair', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('Atopiclair', 'plugin_deactivation'));

Atopiclair::run();
