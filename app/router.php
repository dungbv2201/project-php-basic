<?php
require_once __DIR__."/middleware.php";

function resolve($routes){
    $notFound = true;
    foreach ($routes as $route){
		if(!$notFound){
			break;
		}
        $arrayUrl = explode('/',ltrim($route['url'], '/'));
		$uri = $_SERVER['PATH_INFO'] ?? '/';
		if(strpos($uri, "?")){
			$uri = explode("?",$uri);
			$uri = $uri[0];
		}
        $arrayUri = explode(	'/',ltrim($uri, '/'));
		if($_SERVER['REQUEST_METHOD'] === $route['method'] && (count($arrayUrl)) === count($arrayUri)){
			$params = [];
            foreach ($arrayUrl as $key => $value){
				$isLast = $key === (count($arrayUrl)-1);
				$hasParam = $value[0] === ':';
                $uri =  $arrayUri[$key];
                if($hasParam){
                    $params[] = $uri;
                    if(!$isLast){
						continue;
					}
                }
                if(($value === $uri || $hasParam ) && $isLast){
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
