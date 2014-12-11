<?
function db_connect(){
	$link = mysql_connect('localhost', 'root', 'root');
	if (!$link) {
	    die('Ошибка соединения: ' . mysql_error());
	}
	//echo 'Успешно соединились';

	$db_selected = mysql_select_db('ap', $link);
	if (!$db_selected) {
	    die ('Не удалось выбрать базу foo: ' . mysql_error());
	}
};