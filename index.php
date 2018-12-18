<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/17
 * Time: 9:29
 */

define('DS',DIRECTORY_SEPARATOR);
define('ROOT_PATH',__DIR__.DS);
define('APP_PATH',ROOT_PATH.'Application'.DS);
define('FRAME_PATH',ROOT_PATH.'Frame'.DS);
define('VIEW_PATH',APP_PATH.'View'.DS);
define('CONFIG_PATH',APP_PATH.'Config'.DS);


require CONFIG_PATH.'application.Config.php';

$p = $_GET['p'] ?? PLATFORM;
$c = $_GET['c'] ?? CONTROLLER;
$a = $_GET['a'] ?? ACTION;

$className = "\\Application\\Controller\\{$p}\\{$c}Controller";


$obj = new $className();
$obj->$a();

function __autoload($cls){
//    var_dump("./{$cls}.class.php");exit;
    $cls = str_replace('\\',DS,$cls);
    require "./{$cls}.class.php";

}


