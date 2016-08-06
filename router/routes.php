<?php
	//inspired by http://stackoverflow.com/questions/16388959/url-rewriting-with-php
	$routes = array( 
		'users'   => "/users/(?'id'\d?)",    //  '/users/$id'
		'home'  => "/"                                   // '/'
	);
	
	$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
	$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI'] ), '/');
	$uri = urldecode($uri);
	
	foreach($routes as $controller => $route)
	{
		if(preg_match( '~^'.$route.'$~i', $uri, $params ))
		{
			$action = isset($params["action"]) ? $params["action"] : "index";
			$_GET["action"] = $action;
			$_GET["controller"] = $controller;
			
			//invoke the appropriate controller
			include "controller/" . $controller . "_controller.php";
	
			// exit to avoid the 404 message 
			exit();
		}
	}
	
	// nothing is found so handle the 404 error
	include "util/404.php";
?>