<?php

require_once "../helpers/const.php";

$routes = [
    [
        "url" => "/hello",
        "handler" => "/app/handlers/client/homePage.php",
        "action" => "index",
        "method" => GET_METHOD
    ],
    [
        "url" => "/admin/users",
        "handler" => "/app/handlers/admin/userHandler.php",
        "action" => "index",
        "method" => GET_METHOD
    ],
];
