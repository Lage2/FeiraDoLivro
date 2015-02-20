<?php
include 'db_clientes_connect.php';
include 'functions.php';

$data = array();

if(isset($_POST['isbn'])){

	$isbn_post = $_POST['isbn'];

	$stmt = $mysqli_client->stmt_init();
	if($stmt->prepare("SELECT id, isbn, name, author1, author2, seller, price FROM book NATURAL JOIN product_book WHERE isbn=? and valid='1' and sold='0'")){
		$stmt->bind_param("s", $isbn_bind);
		$isbn_bind = $isbn_post;

		$stmt->execute();

		$stmt->bind_result($id, $isbn, $title, $author1, $author2, $seller, $price);

		$books_4sale = array();
		while ($stmt->fetch()) {
			array_push($books_4sale, array('id'=>$id,'isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price));
		}

		$stmt->close();

		$data = array('error'=>0, 'books'=>$books_4sale);
		echo json_encode($data);
		die;

	}else{
		$data = array('error'=>2);
		echo json_encode($data);
		die;	
	}
}else{
	$stmt = $mysqli_client->stmt_init();
	if($stmt->prepare("SELECT id, isbn, name, author1, author2, seller, price FROM book NATURAL JOIN product_book WHERE valid='1' and sold='0'")){
		$stmt->execute();

		$stmt->bind_result($id, $isbn, $title, $author1, $author2, $seller, $price);

		
		$books_4sale = array();
		while ($stmt->fetch()) {
			array_push($books_4sale, array('id'=>$id, 'isbn'=>$isbn, 'title'=>utf8_encode($title), 'author1'=>utf8_encode($author1), 'author2'=>utf8_encode($author2), 'seller'=>$seller, 'price'=>$price));
		}

		$stmt->close();

		$data = array('error'=>0, 'books'=>$books_4sale);
		echo json_encode($data);
		die;
	}else{
		$data = array('error'=>2);
		echo json_encode($data);
		die;
	}
}
?>