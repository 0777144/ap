<?php
//session_start();
include_once "application/func/db_connect.php";
include_once 'application/controllers/functions.php';

/*

$query = "SELECT * FROM users";
$result = $mysqli->query($query);
echo "<table>";
while($row =$result->fetch_assoc()){
	echo "<tr><td>".$row['user_id']."</td><td>".$row['user_phone']."</td><td>".$row['user_name']."</td><td>";
}
echo "</table>";

exit();

*/

sec_session_start();
ini_set('display_errors', 1);


if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

$URL = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		//print_r($URL);
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

//loding resourses
		$args['scripts']="";
		$args['links']="";

		$string = file_get_contents("js/resources.json");
		$json=json_decode($string,true);
		//print_r($json[$controller][$action]['js']);
		if(array_key_exists ( $controller , $json ) ){
			if(array_key_exists ( $action , $json[$controller] ) ) {
				if(array_key_exists ( 'js' , $json[$controller][$action] )) {
					foreach ($json[$controller][$action]['js'] as $key => $value) {
						$args['scripts'].="<script src='$value' type='text/javascript'></script>\n";
					}
				}
				if(array_key_exists ( 'css' , $json[$controller][$action] )) {
					foreach ($json[$controller][$action]['css'] as $key => $value) {
						$args['links'].="<link href='$value' rel='stylesheet'>\n";
					}
				}
			}		
					
		}

		// echo "Controller: $controller <br>Action: $action <br>Arg:  ";
		// echo current($args); //index
		// echo key($args); //main
		



		$controller_path="application/controllers/$controller.php";

		if(file_exists($controller_path))include $controller_path;
		//else Route::ErrorPage404();//правильно было бы кинуть здесь исключение,но для упрощения сразу сделаем редирект на страницу 404
			
		if(function_exists($action))$action($mysqli,$args,$logged);
		//else Route::ErrorPage404();// здесь также разумнее было бы кинуть исключение
				

// print_r(session_id());echo "<br>";
// print_r($_COOKIE);echo "<br>";
// print_r($_SESSION);echo "<br>";