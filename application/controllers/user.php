<?
	function login($args){
		//print_r($args);
		echo SID;
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
			$_SESSION['USER_ID']=$row['user_id'];
			$_SESSION['USER_NAME']=$row['user_name'];
			print_r($_SESSION);
		}
		
	}

	function logout($args){
		//print_r($args);
		unset($_SESSION['AUTH']);
	}

	function add($args){
		//print_r($_POST);

		$phone = $_POST['user_phone'];
		$name = $_POST['user_name'];
		$lastname = $_POST['user_lastname'];
		$email = $_POST['user_email'];
		$pass = $_POST['password'];
		$priveleges = 0;

		$result = mysql_query("INSERT INTO `users`(`user_phone`,`password`,`user_name`,`user_lastname`,`user_priveleges`,`user_email`) VALUES('$phone', '$pass', '$name', '$lastname', '$priveleges', '$email');");
	}