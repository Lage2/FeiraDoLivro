<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>

<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
sec_session_start();
if(login_check($mysqli) == true) {

$pedido = "DELETE FROM members WHERE username='".$_POST['username']."'";
mysqli_query($mysqli,$pedido) or die(mysqli_error($mysqli));

header('Location: ./userremoveok.php');

} else {
   header('Location: ./login.php');
}

?>