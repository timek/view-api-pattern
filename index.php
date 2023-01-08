<?php 
header_remove("X-Powered-By");

define('ROUTES', "routes/");
define('BASEPATH', "api/"); 

require_once __DIR__ . '/vendor/autoload.php'; 
use Steampixel\Route;

/**
 * validator
*/
use Rakit\Validation\Validator;
$validator = new Validator;

/**
 * validate paths
*/
$path = __DIR__ ."/config/";  
include $path."connection.php";

/*
* include api files
*/
foreach (glob(BASEPATH."*.php") as $api):
  include $api; 
endforeach;

/*
* json payload
 */
$payload = json_decode(file_get_contents('php://input'), true); 
    
/**
 * include all routes and urlsk
*/
foreach (glob(ROUTES."*.php") as $routes):
  include $routes; 
endforeach; 

Route::run('/');

?>