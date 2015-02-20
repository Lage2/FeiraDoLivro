<?php

	include 'db_connect.php';
	include 'functions.php';

	$data = array();

	$username_post  = trim($_POST['username']);
	$email_post 	= trim($_POST['email']);
	$password_post 	= trim($_POST['password']);

	//Validate Fields
	if (!filter_var($email_post, FILTER_VALIDATE_EMAIL)) {
    	$data = array('error' => 'Por favor introduza um endereço e-mail correcto.' , 'erro-code' => 3);
		echo json_encode($data);
		die;	
	}

	//Check for duplicate values
	$dup_username 	= false;
	$dup_email		= false; 		
	$stmt1 = $mysqli->stmt_init();
	if($stmt1->prepare("SELECT username, email FROM members WHERE username=? OR email=?")){
		$stmt1->bind_param("ss", $username_bind, $email_bind);
		$username_bind 	= $username_post;
		$email_bind 	= $email_post;
		
		$stmt1->execute();
		$stmt1->bind_result($res_username, $res_email);

		while ($stmt1->fetch()){

			if ($res_username == $username_post) {
				$dup_username = true;
				break;
			}

			if ($res_email == $email_post) {
				$dup_email = true;
				break;
			}
		}

		$stmt1->close();

		if($dup_username) $data = array('error' => 'O nome de utilizador já se encontra registado.' , 'erro-code' => 1);
		if($dup_email) 	  $data = array('error' => 'O email já se encontra registado.', 'error-code' => 2);
		
		if($dup_username || $dup_email){
			echo json_encode($data);
			die;
		}		
	}else{
		$data = array('error' => 'De momento é impossível completar o registo, por favor tente mais tarde.' , 'erro-code' => 0);
		echo json_encode($data);
		die;
	}


	//Register User
	$password = hash('sha512',$_POST['password']);

	// Crie um salt aleatório
	$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

	// Crie uma senha com salt 
	$password = hash('sha512', $password . $random_salt);

	$stmt2 = $mysqli->stmt_init();
	if($stmt2->prepare("INSERT INTO members (username, email, password, salt, admin)VALUES (?,?,?,?,'0')")){
		$stmt2->bind_param("ssss", $username_bind, $email_bind, $password_bind, $salt_bind);
		$username_bind 	= $username_post;
		$email_bind 	= $email_post;
		$password_bind	= $password;
		$salt_bind		= $random_salt;
		$stmt2->execute();
		$stmt2->close();

		echo json_encode($data);
		
	}else{
		$data = array('error' => 'De momento é impossível completar o registo, por favor tente mais tarde.' , 'erro-code' => 0);
		echo json_encode($data);
		die;
	}
?>
