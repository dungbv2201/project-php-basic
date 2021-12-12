<?php
require_once "../helpers/const.php";

$routeAdmin = [
	[
		"url" => "/admin/login",
		"handler" => "/app/handlers/admin/auth/authenticate.php",
		"action" => "index",
		"method" => GET_METHOD,
	],
	[
		"url" => "/admin/users",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "index",
		"method" => GET_METHOD,
//		"middleware" => 'auth'
	],
	[
		"url" => "/admin/users/create",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "create",
		"method" => GET_METHOD,
//		"middleware" => 'auth'
	],
	[
		"url" => "/admin/users/:id",
		"handler" => "/app/handlers/admin/userHandler.php",
		"action" => "show",
		"method" => GET_METHOD,
//		"middleware" => 'auth'
	],
];
