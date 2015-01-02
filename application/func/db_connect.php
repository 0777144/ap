<?php
include_once 'application/config/psl-config.php';   // Needed because functions.php is not included

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    //echo "Location: ../error.php?err=Unable to connect to MySQL";
    exit();
}
if (!$mysqli->set_charset("utf8")) {
    //printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
} else {
    //printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
}

//echo "connect";