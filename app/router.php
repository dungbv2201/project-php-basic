<?php

function resolve($routes){
    $notFound = false;
    foreach ($routes as $route){
        $arrayUrl = explode('/',$route['url']);
        unset($arrayUrl[0]);
        $arrayUri = explode('/',$_SERVER['REQUEST_URI']);
        unset($arrayUri[0]);
        if($_SERVER['REQUEST_METHOD'] === $route['method'] && (count($arrayUrl)) === count($arrayUri)){
            $params = [];
            foreach ($arrayUrl as $key => $value){
                $uri =  $arrayUri[$key];
                if(strpos($arrayUrl[$key],":") === 0 && $uri){
                    array_push($params,$uri);
                    continue;
                }
                if($value  !== $uri){
                    $notFound = true;
                    break;
                }
            }
            if($notFound){
                break;
            }

            try{
                require_once dirname(__DIR__).$route['handler'];
                return call_user_func($route['action'], ...$params);
            }catch (ErrorException $exception){
                dd($exception);
            }
        }
    }
    include_once dirname(__DIR__).'/resources/views/errors/_404.php';
    return null;
}
