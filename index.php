<?php
session_start();
require_once 'bootstrap.php';

$app = new App();

// require './Core/Database.php';
// require './Models/BaseModel.php';
// require './Controllers/BaseController.php';
// $controllerName = ucfirst(strtolower(
//     $_REQUEST['controller']
// ) ?? '404') . 'Controller';

// require "./Controllers/{$controllerName}.php";

// $actionName = ucfirst(strtolower(
//     $_REQUEST['action']
// ));

// $controllerObject = new $controllerName;

// $controllerObject->$actionName();