<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {

$pedido = "DELETE FROM book WHERE isbn='".$_POST['isbn']."'";

mysqli_query($mysqli_client,$pedido) or die(mysqli_error($mysqli));

header('Location: ./livroremoveok.php');

} else {
   header('Location: ./login.php');
}

?>