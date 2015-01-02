<?
	function open($mysqli, $args, $logged) {
		include "application/content/".key($args)."_".current($args).".php";
	}