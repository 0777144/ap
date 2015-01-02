<?
		function open($mysqli,$args, $logged = 0){
			switch ($args['content_name']) {
				case 'login':
					include "application/content/-pdialog-form_login.php";
					break;
				
				default:
					# code...
					break;
			}
			
		}
	