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


require_once 'config/routers.php';
require_once 'core/Router.php';
require_once 'app/App.php'; //Load App
require_once  'core/Controller.php'; //Load base Controller