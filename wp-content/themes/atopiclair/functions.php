<?php
define('ATOPICLAIR_THEME_VERSION', '1.0');
define('ATOPICLAIR_THEME_URL', get_template_directory_uri());
define('ATOPICLAIR_THEME_DIR', plugin_dir_url(__FILE__));
define('ATOPICLAIR_THEME_LANGUAGES', dirname(plugin_basename(__FILE__)) . '/languages');

require_once 'libs/atopiclair.class.php';
require_once 'wp_bootstrap_navwalker.php';
Atopiclair_theme::run();

