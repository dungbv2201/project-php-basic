<?php
function dd($arg)
{
	echo "<pre>";
	var_dump($arg);
	die;
}

function assets($path = "/")
{
	return "http://$_SERVER[HTTP_HOST]" . $path;
}

function getDataRequest()
{
	$data = [];
	if ($_SERVER["REQUEST_METHOD"] === GET_METHOD) {
		foreach ($_GET as $key => $value) {
			$data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}
	if ($_SERVER["REQUEST_METHOD"] === POST_METHOD) {
		foreach ($_POST as $key => $value) {
			$data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}

	return $data;
}

function renderView($view, $data, $configPage = [])
{
	$viewContent = renderOnlyView($view, $data);
	$layoutContent = layoutContent($configPage);
	return str_replace('{{content}}', $viewContent, $layoutContent);
}

function layoutContent($configPage)
{
	$layout = $configPage['layout'] ?? '/admin/layout/main';
	$title = $configPage['title'] ?? null;
	$scripts = $configPage['scripts'] ?? [];
	$styles = $configPage['styles'] ?? [];
	ob_start();
	include_once ROOT_DIR . "/resources/views$layout.php";
	return ob_get_clean();
}

function renderOnlyView($view, $data)
{
	ob_start();
	foreach ($data as $key => $value) {
		$$key = $value;
	}
	include_once ROOT_DIR . "/resources/views/$view.php";
	return ob_get_clean();
}

function back()
{
	header("Location: " . $_SERVER['HTTP_REFERER']);
	return null;
}

function redirect($route)
{
	header("Location: " . $route);
	return null;
}

function renderError($field)
{
	if (isset($_SESSION[ERROR_VALIDATE][$field])) {
		return '<span class="invalid">' . $_SESSION[ERROR_VALIDATE][$field][0] . '</span>';
	}
}

function old($field)
{
	return $_SESSION[OLD_DATA][$field] ?? null;
}

function setOldData($data)
{
	$_SESSION[OLD_DATA] = $data;
}

function authUser()
{
	return $_SESSION['auth'] ?? [
		"fullName" => null,
		"id" => null,
	];
}

function setSession($key, $value)
{
	$_SESSION[$key] = $value;
}

function getSession($key)
{
	return $_SESSION[$key] ?? null;
}

function unsetSession(...$agrs)
{
	foreach ($agrs as $session) {
		unset($_SESSION[$session]);
	}
}
