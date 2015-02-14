<?php
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();

if(login_check($mysqli) == true) {

$pedido = "INSERT INTO book (isbn, name, author1, author2)VALUES (";
$pedido .= "'".$_POST['isbn']."',";
$pedido .= "'".$_POST['nome']."',";
$pedido .= "'".$_POST['autor1']."',";
$pedido .= "'".$_POST['autor2']."')";
echo 'ok';
mysqli_query($mysqli_client,$pedido) or die(mysqli_error($mysqli_client));
echo 'ok';
header('Location: ./clienteok.php');

} else {
   header('Location: ./login.php');
}


?>