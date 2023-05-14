<?php
namespace App;

use App;

class Route
{

	static function start()
	{

		$controller_name = 'main';
		$action_name = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$routes[2] = explode('?', $routes[2])[0];


		if (!empty($routes[1])) {
			$controller_name = $routes[1];
		}


		if (!empty($routes[2])) {
			$action_name = $routes[2];
		}


		$model_name = 'Model_' . $controller_name;
		$controller_name = 'Controller_' . $controller_name;
		$action_name = 'action_' . $action_name;





		$model_file = strtolower($model_name) . '.php';
		$model_path = "app/models/" . $model_file;
		if (file_exists($model_path)) {
			require_once "app/models/" . $model_file;
		}


		$controller_file = strtolower($controller_name) . '.php';
		$controller_path = "app/controllers/" . $controller_file;
		if (file_exists($controller_path)) {
			require_once "app/controllers/" . $controller_file;
		} else {

			Route::ErrorPage404();
		}


		$controller = new $controller_name;
		$action = $action_name;

		if (method_exists($controller, $action)) {

			$controller->$action(Route::getQuery());
		} else {
			echo $controller_name . "<br>";
			echo $action_name;
			// Route::ErrorPage404();
		}

	}

	static function ErrorPage404()
	{
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
	}
	static function getQuery(){
		$query=[];
		foreach (explode('&', $_SERVER['QUERY_STRING']) as $param) {
			$query[explode('=', $param, 2)[0]]=urldecode(explode('=', $param, 2)[1]);
		}
		return $query;
	}

}