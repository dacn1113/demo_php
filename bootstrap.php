<?php
// define('_DIR_ROOT', __DIR__);
define('_DIR_ROOT', str_replace('\\', '/', __DIR__));

//Xử lý Http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$folder  = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));

$web_root = $web_root . $folder;
//tạo đường dẩn cho js,css
define('_WEB_ROOT', $web_root);

/**
 * Tự động load configs
 */

$configs_dir = scandir('config');

if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('config/' . $item)) {
            require_once 'config/' . $item;
        }
    }
}

// require_once 'config/routers.php'; //Load router config
require_once 'core/Router.php'; //Load router class
require_once 'app/App.php'; //Load App

//Kiểm tra config và load Database
if (!empty($config['database'])) {

    $db_config = array_filter($config['database']);

    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
    }
}
require_once 'core/Model.php'; //Load Model
require_once  'core/Controller.php'; //Load base Controller