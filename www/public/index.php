<?php 
require dirname(__DIR__)."/vendor/autoload.php";
/**
 * Error handling
 */
error_reporting(E_ALL);
set_error_handler('\Core\error::errorHandler');
set_exception_handler('\Core\error::exceptionHandler');
/**
 * Routing
*/
$router = new \Core\router;


$router->add("GET",["url"=>"/","controller"=>"index","action"=>"index","dynamic"=>1]);
$router->add("POST",["url"=>"/","controller"=>"index","action"=>"pageViewer","dynamic"=>1]);


$router->add("POST",["url"=>"/haber","controller"=>"index","action"=>"newsViewer","dynamic"=>1,"callback"=>function(){ echo "Haberler: ".rand(100,10000); }]);




/* 
Dynamic 

$router->add("GET",["url"=>"/dinamic/id","controller"=>"index","action"=>"dynamicroute","dynamic"=>1]);

$router->add("GET",["url"=>"/haberler","callback"=>function(){ echo "Haberler"; }]);
$router->add("GET",["url"=>"/uyelik","callback"=>function(){ echo "Üyelik"; }]);
$router->add("GET",["url"=>"/uyelik/profil","callback"=>function(){ echo "PROFİL"; }]);
$router->add("GET",["url"=>"/selam","callback"=>function(){ echo "SELAM"; }]);
*/


/* CallBack */



$router->run();