<?php
$routeAdmin = [
	//Authenticate
	[
		"url" => "/admin/login",
		"handler" => "/app/handlers/admin/auth/authenticate.php",
		"action" => "index",
		"method" => GET_METHOD,
		"namespace" => "admin"
	],
	[
		"url" => "/admin/login",
		"handler" => "/app/handlers/admin/auth/authenticate.php",
		"action" => "singIn",
		"method" => POST_METHOD,
		"namespace" => "admin"
	],
	[
		"url" => "/admin/logout",
		"handler" => "/app/handlers/admin/auth/authenticate.php",
		"action" => "signOut",
		"method" => POST_METHOD,
	],

	//users
	[
		"url" => "/admin/users",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "index",
		"method" => GET_METHOD,
		"middleware" => 'auth',
		"namespace" => "admin"
	],
	[
		"url" => "/admin/users/create",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "create",
		"method" => GET_METHOD,
		"middleware" => 'auth',
		"namespace" => "admin"
	],
	[
		"url" => "/admin/users/store",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "store",
		"method" => POST_METHOD,
		"middleware" => 'auth',
		"namespace" => "admin"
	],
	[
		"url" => "/admin/users/:id",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "show",
		"method" => GET_METHOD,
		"namespace" => "admin",
		"middleware" => 'auth'
	],
];
