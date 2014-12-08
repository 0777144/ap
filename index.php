<?php
session_start();
//ini_set('display_errors', 1);

	$link = mysql_connect('localhost', 'root', 'root');
	if (!$link) {
	    die('Ошибка соединения: ' . mysql_error());
	}
	//echo 'Успешно соединились';

	$db_selected = mysql_select_db('ap', $link);
	if (!$db_selected) {
	    die ('Не удалось выбрать базу foo: ' . mysql_error());
	}


$URL = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($URL[2]) )$controller = $URL[2];
		else $controller = 'main';
		
		// получаем имя экшена
		if ( !empty($URL[3]) )$action = $URL[3];
		else $action = 'index';

		//echo "Controller: $controller <br>Action: $action <br>";

		$controller_path="application/controllers/$controller.php";

		if(file_exists($controller_path))include $controller_path;
		//else Route::ErrorPage404();//правильно было бы кинуть здесь исключение,но для упрощения сразу сделаем редирект на страницу 404
			
		if(function_exists($action))$action();
		//else Route::ErrorPage404();// здесь также разумнее было бы кинуть исключение
			
	
