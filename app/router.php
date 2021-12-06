<?php

function resolve($routes){
    foreach ($routes as $key => $route){
        if($_SERVER['REQUEST_METHOD'] === $route['method'] && $_SERVER['REQUEST_URI'] === $route['url']){
            try{
                require_once dirname(__DIR__).$route['handler'];
                return call_user_func($route['action']);
            }catch (ErrorException $exception){
                dd($exception);
            }
        }
    }
    include_once dirname(__DIR__).'/resources/views/errors/_404.php';
    return null;
}
