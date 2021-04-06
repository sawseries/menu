<?php

require_once './app/general.php';
define("BASE_PATH", home_base_url());


require_once BASE_PATH.'/app/BaseController.php';
require_once BASE_PATH.'/app/route.php';
require_once BASE_PATH.'/app/Redirect.php';
require_once BASE_PATH.'/app/view.php';

require_once BASE_PATH.'/app/helpper/helpers.php';
require_once BASE_PATH.'/app/Controller.php';


$route = new Route();

if(isset($_GET['controller'])&&isset($_GET['action'])){
		$controller = $_GET['controller'];
		$action = $_GET['action'];
		$route->add($controller, $action);                
}else{
    $controller = 'Master';
    $action = 'index';
    $route->add($controller,$action);
}

$route->add($controller,$action);
$route->submit();
