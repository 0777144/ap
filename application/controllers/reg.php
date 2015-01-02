<?
function index($mysqli, $args, $logged){
		if($logged = 'in'){
			$header = "Ошибка";
			$content = "error.php";
			$error = "Вы уже зарегестрированны";
		}
		else{
			$header="Регистрация";
			$content="reg_index.php";
		}
		
		include "application/template.php";
	}