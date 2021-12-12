<?php
require_once __DIR__."/middleware.php";

function resolve($routes){
    $notFound = true;
    foreach ($routes as $route){
		if(!$notFound){
			break;
		}
        $arrayUrl = explode('/',$route['url']);
        unset($arrayUrl[0]);
		$uri = $_SERVER['REQUEST_URI'];
		if(strpos($uri, "?")){
			$uri = explode("?",$uri);
			$uri = $uri[0];
		}
        $arrayUri = explode(	'/',$uri);
		unset($arrayUri[0]);

		if($_SERVER['REQUEST_METHOD'] === $route['method'] && (count($arrayUrl)) === count($arrayUri)){
            $params = [];
            foreach ($arrayUrl as $key => $value){
				$isLast = $key === (count($arrayUrl));
				$hasParam = strpos($value,":") === 0;
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
