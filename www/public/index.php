<?php 
require dirname(__DIR__)."/vendor/autoload.php";
/** 
 * Session
 */
\Core\classes\session::start();
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
// DynamicPages
$router->add("POST",["url"=>"/","controller"=>"index","action"=>"pageViewer","dynamic"=>1]);
$router->add("POST",["url"=>"/news","controller"=>"news_Controller","action"=>"index","dynamic"=>1]);
$router->add("POST",["url"=>"/category","controller"=>"news_Controller","action"=>"category","dynamic"=>1]);



/* Membership */
$router->add("POST",["url"=>"/api/members/signup","controller"=>"signup_Controller","action"=>"Signup"]);
$router->add("POST",["url"=>"/api/members/signin","controller"=>"signin_Controller","action"=>"Signin"]);

/* Comments */
$router->add("POST",["url"=>"/api/comments/add","controller"=>"comments_Controller","action"=>"add"]);




/* Panel */
$router->add("POST",["url"=>"/panel","controller"=>"panel_Controller","action"=>"index","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);
$router->add("POST",["url"=>"/logout","controller"=>"panel_Controller","action"=>"logout","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);
/* News  Index */
$router->add("POST",["url"=>"/panel/news","controller"=>"panel_Controller","action"=>"editor","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
/* Categories */
$router->add("POST",["url"=>"/panel/news/categoryAdd","controller"=>"panel_Controller","action"=>"categoryAdd","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
$router->add("POST",["url"=>"/panel/news/categoryDelete","controller"=>"panel_Controller","action"=>"categoryDelete","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
/* News */
$router->add("POST",["url"=>"/panel/news/newsAdd","controller"=>"panel_Controller","action"=>"newsAdd","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);
$router->add("POST",["url"=>"/panel/news/newsDelete","controller"=>"panel_Controller","action"=>"newsDelete","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["editor"]]); } ]);


/* Moderator or Admin */
$router->add("POST",["url"=>"/panel/users","controller"=>"panel_Controller","action"=>"moderator_admin","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["moderator","admin"]]); } ]);
/* Recent Activities */
$router->add("POST",["url"=>"/panel/latest","controller"=>"panel_Controller","action"=>"latest","middleware"=>function(){ return (new \Core\middleware\auth)->rule(["permissions"=>["user"]]); } ]);

/* Router Test :) */
$router->add("GET",["url"=>"/test","callback"=>function(){ echo 'Teknasyon.Com GetContact Panteon.games '; }]);

/* CallBack */
$router->run();