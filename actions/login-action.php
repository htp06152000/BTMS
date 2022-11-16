<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

	if ( isset($_POST['login']) ) {

		$username = sanitize_input($_POST['username']);
		$password = sanitize_input($_POST['password']);

		$result = $DB->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 0, 1");	
		$result->execute([ $username, md5($password) ]);
		
		if ($result && $result->rowCount() > 0) {
			$userinfo = $result->fetch();
			$_SESSION['user_info'] = array(
				'id' => $userinfo["user_id"]
			);
			redirect_to('dashboard');
		} else {
			$_SESSION['message'] 		= "Incorrect credentials!";
			$_SESSION['messagetype'] 	= "warning";
		}
	}