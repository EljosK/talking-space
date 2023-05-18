<?php
session_start();
//Include configuration
require_once ('config/config.php');

require_once ('helpers/system_helper.php');
require_once ('helpers/format_helper.php');
require_once ('helpers/db_helper.php');

//Autoload Class
function autoloader($class_name){
    require_once "libraries/{$class_name}.php";
}
spl_autoload_register('autoloader');