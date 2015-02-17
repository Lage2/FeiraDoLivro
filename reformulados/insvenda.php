<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {

$pedido = "INSERT INTO product_book (isbn, seller, price, valid, sold)VALUES (";
$pedido .= "'".$_POST['isbn']."',";
$pedido .= "'".$_POST['seller']."',";
$pedido .= "'".$_POST['price']."',";
$pedido .= "0,";
$pedido .= "0)";
mysqli_query($mysqli_client,$pedido) or die(mysqli_error($mysqli_client));

header('Location: ./vendaok.php');

} else {
   header('Location: ./login.php');
}

?>