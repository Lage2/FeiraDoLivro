<?php
include 'db_connect.php';
include 'db_clientes_connect.php';
include 'functions.php';

sec_session_start();

//Check if logged in
if(login_check($mysqli) == true)

	//Check if all variables are set
	if(isset(	$_POST['isbn'], 
				$_POST['name'],
				$_POST['author1'],
				$_POST['author2'],
				$_POST['price'],
				$_SESSION['username'])){

		
		$isbn_post 		= $_POST['isbn'];
		$name_post 		= $_POST['name'];
		$author1_post 	= $_POST['author1'];
		$author2_post 	= $_POST['author2'];
		$price_post 	= $_POST['price'];
		$seller_session	= $_SESSION['email'];

		//TODO: check if posted isbn matches values provided
		$stmt1 = $mysqli_client->stmt_init();
		if($stmt1->prepare('SELECT name FROM book WHERE isbn=?')){ //TODO: must contemplate also author1 and 2
			$stmt1->bind_param("s", $isbn_bind);
			$isbn_bind = $isbn_post;

			$stmt1->execute();
			$stmt1->bind_result($name);
			
			$res = $stmt1->fetch();
			$stmt1->close();
			
			//TODO: also check author values
			if($res && $name != $name_post){
				$data = array('error'=>4);
				echo json_encode($data);
				die;
			}

		}else{
			$data = array('error'=>2.1);
			echo json_encode($data);
			die;
		}

		
		$stmt2 = $mysqli_client->stmt_init();
		if($stmt2->prepare("INSERT INTO product_book (isbn, seller, price, valid, sold) VALUES (?,?,? 0,0)")){
			$stmt2->bind_param("ssd", $isbn_bind, $seller_bind, $price_bind);
			$isbn_bind 		= $isbn_post;
			$seller_bind 	= $seller_session;
			$price_bind		= $price_post;

			$stmt2->execute();
			$stmt2->close();

			$data = array('error'=>0);
			echo json_encode($data);
			die;	

		}else{
			$data = array('error'=>2.2);
			echo json_encode($data);
			die;	
		}

	}else{
		$data = array('error'=>1);
		echo json_encode($data);
		die;
	}

else{
	$data = array('error'=>3);
	echo json_encode($data);
	die;
}

?>