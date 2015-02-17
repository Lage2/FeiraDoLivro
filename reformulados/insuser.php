<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>

<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';

$password = hash('sha512',$_POST['password']);

// Crie um salt aleatório
$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

// Crie uma senha com salt 
$password = hash('sha512', $password . $random_salt);

$pedido = "INSERT INTO members (username, email, password, salt, admin)VALUES (";
$pedido .= "'".$_POST['username']."',";
$pedido .= "'".$_POST['email']."',";
$pedido .= "'".$password."',";
$pedido .= "'".$random_salt."',";
$pedido .= "0)";
mysqli_query($mysqli,$pedido) or die(mysqli_error($mysqli));

header('Location: ./userok.php');

?>
