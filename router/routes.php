<?php
	//inspired by http://stackoverflow.com/questions/16388959/url-rewriting-with-php
	$routes = array(
		'users' => "/users/?(?'action'(create|read|update|destroy)?)/?(?'id'\d+)?", //  users/create, users/read/$id, users/update/$id, users/destroy/$id
		'home'  => "/"                                   								  														  // '/'
	);
	
	$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
	$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI'] ), '/');
	$uri = urldecode($uri);
	
	foreach($routes as $controller => $route)
	{
		if(preg_match( '~^'.$route.'$~i', $uri, $params ))
		{
			$id = isset($params["id"]) ? $params["id"] : NULL;
			$action = isset($params["action"]) ? $params["action"] : NULL;
			
			if($id && !$action)
				$action = "display";
			else if(!$id && !$action)
				$action = "index";

			$_GET["action"] = $action;
			$_GET["controller"] = $controller;
			$_GET["id"] = $id;

			//invoke the appropriate controller
			include "controller/" . $controller . "_controller.php";
	
			// exit to avoid the 404 message 
			exit();
		}
	}
	
	// nothing is found so handle the 404 error
	include "util/404.php";
?>