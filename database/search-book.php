<?php 
header('Content-Type:text/html; charset=UTF-8');
include 'db_connect.php';
include 'db_clientes_connect.php';
include 'functions.php';

$data = array();

if(isset($_POST['isbn'])){

	$isbn_post = $_POST['isbn'];

	//Validade ISBN
	$isbn_filter = "[0-9]{13}";

	//Query LAGE2 for book
	$stmt = $mysqli_client->stmt_init();
	if($stmt->prepare('SELECT name, author1, author2 FROM book WHERE isbn=?')){

		$stmt->bind_param("s", $isbn_bind);
		$isbn_bind = $isbn_post;
		$stmt->execute();

		$title 	 = 'none';
		$author1 = 'none';
		$author2 = 'none';

		$stmt->bind_result($title, $author1, $author2_res);

		$stmt->fetch();
		$stmt->close();

		$title 	 = utf8_encode($title);
		$author1 = utf8_encode($author1);
		$author2 = utf8_encode($author2);

		$data = array('error'=> 0, 'title'=> $title, 'author1'=> $author1, 'author2' => $author2);
		echo json_encode($data);
		die;
	}else{
		$data = array('error'=>2);
		echo json_encode($data);
		die;
	}

	//Query http://isbndb.com/ for book
	//TODO

}else{
	$data = array('error'=>1);
	echo json_encode($data);
	die;
}

?>