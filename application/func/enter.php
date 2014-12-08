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

	$result = mysql_query("SELECT * FROM `users` WHERE `users`.`user_phone`=$phone");
	if (!$result) {
		    die('Неверный запрос: ' . mysql_error());
		}
	$row = mysql_fetch_array($result);
	if ($row['password'] == $pass){
		echo "yes";
		$_SESSION['AUTH']=1;
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['user_name'];
	}
	