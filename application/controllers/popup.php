<?
		function open($args){
			switch ($args['content_name']) {
				case 'form_enter':
					include "application/content/-pdialog-form_enter.php";
					break;
				
				default:
					# code...
					break;
			}
			
		}
	