<?php

$routeWeb = [
	[
		"url" => "/",
		"handler" => "/app/handlers/client/homePage.php",
		"action" => "index",
		"method" => GET_METHOD,
//		"middleware" => 'auth'
	],
];
