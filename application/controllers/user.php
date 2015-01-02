<?
	/*function reg_form($mysqli, $args, $logged){
		$header="Регистрация";
		$content="user_reg.php";
		include "application/template.php";
	}*/

	function login_form($mysqli, $args, $logged = 0) {
		$header="Регистрация";
		$content="user_login_form.php";
		include "application/template.php";
	}

	function logout($mysqli, $args, $logged = 0) {
		//print_r($args);
		$_SESSION = array();

		// get session parameters 
		$params = session_get_cookie_params();

		// Delete the actual cookie. 
		setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

		// Destroy session 
		session_destroy();
		
	}

	function login($mysqli, $args, $logged = 0) {
		$user_phone = $_POST['user_phone'];
		$user_password = $_POST['user_password'];

	    // Using prepared statements means that SQL injection is not possible. 
	    if ($stmt = $mysqli->prepare("SELECT user_id, user_name, user_password, user_salt FROM users WHERE user_phone = ? LIMIT 1")) {
	        $stmt->bind_param('s', $user_phone);  // Bind "$email" to parameter.
	        $stmt->execute();    // Execute the prepared query.
	        $stmt->store_result();

	        // get variables from result.
	        $stmt->bind_result($user_id, $user_name, $db_password, $user_salt);
	        $stmt->fetch();

	        // hash the password with the unique salt.
	        $user_password = hash('sha512', $user_password . $user_salt);
	        if ($stmt->num_rows == 1) {
	            // If the user exists we check if the account is locked
	            // from too many login attempts 
	            if (checkbrute($mysqli, $user_id) == true) {
	                // Account is locked 
	                // Send an email to user saying their account is locked 
	                //echo "// Account is locked ";
	                return false;
	            } else {
	                // Check if the password in the database matches 
	                // the password the user submitted.
	                if ($db_password == $user_password) {
	                    // Password is correct!
	                    // Get the user-agent string of the user.
	                    $user_browser = $_SERVER['HTTP_USER_AGENT'];

	                    // XSS protection as we might print this value
	                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
	                    $_SESSION['user_id'] = $user_id;

	                    // XSS protection as we might print this value
	                    //$user_name = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $user_name);

	                    $_SESSION['user_name'] = $user_name;
	                    $_SESSION['login_string'] = hash('sha512', $user_password . $user_browser);

	                    echo "// Login successful." ;
	                    return true;
	                } else {
	                    // Password is not correct 
	                    // We record this attempt in the database 
	                    $now = time();
	                    if (!$mysqli->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')")) {
	                        echo "Database error: login_attempts";
	                        exit();
	                    }

	                    echo "// Password is not correct ";
	                    return false;
	                }
	            }
	        } else {
	            echo " No user exists. ";
	            return false;
	        }
	    } else {
	        // Could not create a prepared statement
	        echo "Database error: cannot prepare statement";
	        exit();
	    }	
	}


	function add($mysqli,$args = 0, $logged = 0){
		//print_r($_POST);
		if(isset($_POST['user_phone'], $_POST['user_password'])){
			$user_phone = $_POST['user_phone'];
			$user_password = $_POST['user_password'];
			$user_name = $_POST['user_name'];
			$user_lastname = '';//$_POST['user_lastname'];
			$user_priveleges = 1;
			$user_email = $_POST['user_email'];

			$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
        	$user_password = hash('sha512', $user_password . $random_salt);

			//echo "$user_phone $user_password $user_name $user_lastname $user_priveleges $user_email";
			// Insert the new user into the database 
	        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (user_phone, user_password, user_salt, user_name, user_lastname, user_priveleges, user_email) VALUES (?, ?, ?, ?, ?, ?, ?)")) {

	            $insert_stmt->bind_param("sssssis", $user_phone, $user_password, $random_salt, $user_name, $user_lastname, $user_priveleges, $user_email);
	            // Execute the prepared query.
	            if (! $insert_stmt->execute()) {
	            	printf("\nErrormessage: %s\n", $mysqli->error);
					//echo "unsuccess";
	                //header('Location: ../error.php?err=Registration failure: INSERT');
	                exit();
	            }
	        }

	        //printf("\nErrormessage: %s\n", $mysqli->error);
	        //header('Location: ./register_success.php');
	        exit();
		}
	}

	function checkbrute($mysqli, $user_id) {
    // Get timestamp of current time 
    $now = time();

    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time 
                                  FROM login_attempts 
                                  WHERE user_id = ? AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);

        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    } else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot prepare statement");
        exit();
    }
}