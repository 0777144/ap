<?php
function add($mysqli, $args, $logged ){
	if($logged == 'out'){
		$header = "Ошибка";
		$content = "error.php";
		$error = "Вы не можете добавлять объекты так как не зарегестрированны";
	}
	else {
		$content='object_add.php';
		$header="Добавить объект в базу";
	}
		
		include "application/template.php";
}