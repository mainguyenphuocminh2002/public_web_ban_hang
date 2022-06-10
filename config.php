<?php

session_start();
ob_start();

spl_autoload_register(function($className) {
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
    $className = __DIR__."/{$className}.php";
    if (file_exists($className)) {
        include $className;
    }
});
define("DEFAULT_ACTION", "index");
define("DEFAULT_CONTROLLER", "Index");
define("URL","http://localhost:8080/");
define("SPMD","http://localhost:8080/danhmuc/Trà.html");
define("QuanLy", "quanly");
define("LoginPage", "login");
global $INI;
    $INI['dburl'] = "mysql:host=localhost;dbname=ban_hang_nhat_nghe;charset=utf8";
    $INI['username'] = "root";
    $INI['password'] = "";

//#mbne6Y3&foG
?>