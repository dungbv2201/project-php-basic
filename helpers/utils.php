<?php
function dd($arg){
    echo "<pre>";
    var_dump($arg);
    die;
}
function assets($path = "/"){
//    $absoluteUrl = strtok("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'?');
//    if($_SERVER["REQUEST_URI"] !== '/'){
//        $absoluteUrl = str_replace("$absoluteUrl", "", $absoluteUrl);
//    }
//    return $path === "/" ? $absoluteUrl : $absoluteUrl.$path;
    return "http://$_SERVER[HTTP_HOST]".$path;
}
//echo assets('admin');
