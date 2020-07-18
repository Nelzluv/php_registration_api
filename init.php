<?php
//Header functions
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//config file
require_once 'Config/config.php';
require 'validation.php';

//Autoloader
function __autoload($class_name){
    require_once 'Models/'.$class_name.'.php';
}
