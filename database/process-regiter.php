<?php

	include 'db_connect.php';
	include 'functions.php';

	$username_post  = $_POST['username'];
	$email_post 	= $_POST['email'];
	$password_post  = $_POST['password'];

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

		$res = 0;
		while ($stmt1->fetch()){

			if ($res_username == $username_post) {
				$dup_username = true;
				break;
			}

			if ($res_email == $email_post) {
				$dup_email = true;
				break;
			}

			$res++;
		}

		$stmt1->close();

		if($dup_username) $data = array('error' => 'O nome de utilizador já se encontra registado.' . $res );
		if($dup_email) 	  $data = array('error' => 'O email já se encontra registado.' . $res );
		
		if($dup_username || $dup_email){
			echo json_encode($data);
			die;
		}					
	}else{

	}

	
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
		header(userok.php);
	}else{

	}
?>
