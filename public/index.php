<?php
session_start();
require_once dirname(__DIR__)."/helpers/utils.php";
require_once dirname(__DIR__)."/app/connectDb.php";
require_once dirname(__DIR__)."/routes/web.php";
require_once dirname(__DIR__)."/routes/admin.php";
require_once dirname(__DIR__)."/app/router.php";
require_once dirname(__DIR__)."/vendor/autoload.php";
require_once dirname(__DIR__)."/app/middleware.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
/**
 * @var $routeWeb
 * @var $routeAdmin
 */
$routes = array_merge($routeWeb, $routeAdmin);
echo resolve($routes);
