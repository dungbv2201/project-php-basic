<?php
require_once "../helpers/utils.php";
require_once dirname(__DIR__)."/routes/web.php";
require_once dirname(__DIR__)."/app/router.php";


//$url = $_GET['url'] ?? '/';
 echo resolve($routes);
//dd($_SERVER["REQUEST_URI"]);
