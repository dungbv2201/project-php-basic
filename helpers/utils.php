<?php
function dd($arg){
    echo "<pre>";
    var_dump($arg);
    die;
}
function assets($path = "/"){
    return "http://$_SERVER[HTTP_HOST]".$path;
}

function getDataRequest(){
	$data = [];
	if($_SERVER["REQUEST_METHOD"] === GET_METHOD){
		foreach($_GET as $key => $value){
			$data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}
	if($_SERVER["REQUEST_METHOD"] === POST_METHOD){
		foreach($_POST as $key => $value){
			$data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}

	return $data;
}

function renderView($view,$configPage){
	$viewContent = renderOnlyView($view);
	$layoutContent = layoutContent( $configPage);
	return str_replace('{{content}}', $viewContent, $layoutContent);
}

function layoutContent($configPage){
	$layout = $configPage['layout'] ?? '/admin/layout/main';
	$title = $configPage['title'] ?? null;
	$scripts = $configPage['scripts'] ?? [];
	$styles = $configPage['styles'] ?? [];
	ob_start();
	include_once ROOT_DIR."/resources/views$layout.php";
	return ob_get_clean();
}

function renderOnlyView($view){
	ob_start();
	include_once ROOT_DIR."/resources/views/$view.php";
	return ob_get_clean();
}
