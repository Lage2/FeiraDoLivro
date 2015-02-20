<?php
include 'db_clientes_connect.php';
include 'db_connect.php';
include 'functions.php';

sec_session_start();

//Check if logged in
if(login_check($mysqli) == true){

	if(isset($_SESSION['username'])){

		$username_session = $_SESSION['username'];

		$stmt = $mysqli_client->stmt_init();
		if($stmt->prepare("SELECT isbn, name, author1, author2, seller, price, valid, sold FROM book NATURAL JOIN product_book WHERE seller=?")){
			$stmt->bind_param("s", $seller_bind);
			$seller_bind = $username_session;

			$stmt->execute();

			$stmt->bind_result($isbn, $title, $author1, $author2, $seller, $price, $valid, $sold);

			$myBooks_sold = array();
			$myBooks_valid = array();
			$myBooks_invalid = array();

			while ($stmt->fetch()) {

				if($valid != '1')
					array_push($myBooks_invalid, array('isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price));					
				else if($sold == '1')
					array_push($myBooks_sold, array('isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price));
				else
					array_push($myBooks_valid, array('isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price));										

				//array_push($myBooks, array('isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price, 'valid'=>$valid, 'sold'=>$sold));
			}

			$stmt->close();

			$data = array('error'=>0, 'invalid'=>$myBooks_invalid, 'valid'=>$myBooks_valid, 'sold'=>$myBooks_sold);
			echo json_encode($data);
			die;

		}else{
			$data = array('error'=>3);
			echo json_encode($data);
			die;	
		}
	}else{
		$data = array('error'=>2);
		echo json_encode($data);
		die;
	}
}else{
	$data = array('error'=>1);
	echo json_encode($data);
	die;
}

?>