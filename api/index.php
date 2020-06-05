<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

include_once './server/App.php';

$app = new App();
//print_r($_SERVER);
$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

define('BASE_PATH', '/api/');
//define('BASE_PATH', '/');
//echo $method;
//echo $path;

if($method == 'POST'){
	switch ($path){
		case BASE_PATH . "getLogin";
			$data = $app->getLogin($_POST);
			$app->echoJSON($data);
			break;
		case BASE_PATH . "maindata":
			$data = $app->addMainData($_POST);
			$app->echoJSON($data);
			break;
		default:
			$app->BadRequest();
	}
}else if($method == 'GET'){
	switch ($path){
		case BASE_PATH . "maindata":
			$data = $app->getMainData();
			$app->echoJSON($data);
			break;
		default:
			$app->BadRequest();
	}
}

