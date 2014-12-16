<?php
session_start();
//ini_set('display_errors', 1);

print_r(session_id());echo "<br>";
print_r($_COOKIE);echo "<br>";
print_r($_SESSION);echo "<br>";




	include_once "application/func/db_connect.php";

$URL = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($URL[2]) )$controller = $URL[2];
		else $controller = 'main';
		
		// получаем имя экшена
		$args = array();
		if ( !empty($URL[3]) ){
			if(strpos($URL[3], '?')){
				$args = explode('?', $URL[3]);
				$action = $args[0];
				$args = explode("&", $args[1]);
				foreach ($args as $i => $arg) {
					list($key, $value) = explode('=', $arg);
					$args[$key]=$value;
					unset($args[$i]);
				}
			}
			else $action = $URL[3];

		}
		else $action = 'index';

		//echo "Controller: $controller <br>Action: $action <br>Arg: $args ";

		$controller_path="application/controllers/$controller.php";

		if(file_exists($controller_path))include $controller_path;
		//else Route::ErrorPage404();//правильно было бы кинуть здесь исключение,но для упрощения сразу сделаем редирект на страницу 404
			
		if(function_exists($action))$action($args);
		//else Route::ErrorPage404();// здесь также разумнее было бы кинуть исключение
			
	
