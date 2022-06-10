<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
use Model\Common;


include './config.php';
include './vendor/autoload.php';

$url = $_SERVER['REQUEST_URI'];
new Router($url);

$_module = Application::$_Module;
$_controllerName = Application::$_Controller;
// var_dump($_controllerName);
if ($_module) {
    $strController = "Module\\{$_module}\\Controller\\{$_controllerName}";
} else {
    $strController = "Controller\\{$_controllerName}";
}
$_actionName = Application::$_Action;
//$strController;
//$_actionName;
// echo $strController;
if (class_exists($strController)) {
    $_Controller = new $strController();
    if (method_exists($_Controller, $_actionName)) {
        $_Controller->$_actionName();
    }
} else {
    Common::ToUrl('index/loi404');
}
?>

  