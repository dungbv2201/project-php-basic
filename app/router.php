<?php
require_once __DIR__."/middleware.php";

function resolve($routes){
    $notFound = true;
	$uri = $_SERVER['PATH_INFO'] ?? '/';
	if(strpos($uri, "?")){
		$uri = explode("?",$uri);
		$uri = $uri[0];
	}
	$arrayUri = explode(	'/',ltrim($uri, '/'));
    foreach ($routes as $route){
		if(!$notFound){
			break;
		}
        $arrayUrl = explode('/',ltrim($route['url'], '/'));
		if($_SERVER['REQUEST_METHOD'] === $route['method'] && (count($arrayUrl)) === count($arrayUri)){
			$params = [];
            foreach ($arrayUrl as $key => $value){
				$isLast = $value == end($arrayUrl);
				$hasParam = ($value[0] ?? null) === ':';
                $url =  $arrayUri[$key];
                if($hasParam){
                    $params[] = $url;
                    if(!$isLast){
						continue;
					}
                }
				if($url !== $value && !$isLast){
					break;
				}
                if(($value === $arrayUri[$key] || $hasParam ) && $isLast){
					$notFound = false;
					try{
						require_once dirname(__DIR__).$route['handler'];
						if($route['middleware'] ?? false){
							foreach (explode('|',$route['middleware']) as $middleware){
								$rs = call_user_func($middleware);
								if(!$rs){
									die;
								}
							}
						}else{
							if(($_SESSION['auth']?? false) && ($route['namespace']?? null) ==='admin'){
								header("Location: /admin/users");
								die;
							}
						}
						return call_user_func_array($route['action'], $params);
					}catch (Exception $exception){
						dd($exception);
					}
                }

            }

        }
    }
    if($notFound){
		include_once dirname(__DIR__).'/resources/views/errors/_404.php';
	}
	return null;

}
