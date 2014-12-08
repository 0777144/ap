<?
	session_start();
	$link = mysql_connect('localhost', 'root', 'root');
	if (!$link) {
	    die('Ошибка соединения: ' . mysql_error());
	}
	//echo 'Успешно соединились';

	$db_selected = mysql_select_db('ap', $link);
	if (!$db_selected) {
	    die ('Не удалось выбрать базу foo: ' . mysql_error());
	}
	
	$phone = $_POST['phone'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$priveleges = 0;

	$result = mysql_query("INSERT INTO `users`(`user_phone`,`password`,`user_name`,`user_priveleges`,`user_email`) VALUES('$phone', '$pass', '$name', '$priveleges', '$email');");

