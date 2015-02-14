<?php
include 'db_connect.php';
include 'functions.php';
sec_session_start();

if(login_check($mysqli) == true) {
echo 'User: ';echo $_SESSION['email'];
?>
<HTML>
<meta charset="utf-8">
  <HEAD>
  <TITLE>Feira do Livro - LAGE2</TITLE>
  </HEAD>
  <BODY>
  <table width="100%">
  <tr>
  <th>
  <image src="logo.bmp" align="middle" height="75">
  </th>
  <th>
  <font size=5> Feira do Livro </font>
  </th>
  <th>
  <form method="get" action="index.php">
    <button type="submit" style="height: 50px; width: 150px">Menu Principal</button>
  </form>
  <form method="get" action="logout.php">
    <button type="submit" style="height: 50px; width: 150px">Sair</button>
  </form>
  </th>
  </tr>  
  </table>
<center>

<table width="100%">
<form method="get" action="criacliente.php">
    <button type="submit" style="height: 50px; width: 150px">Ver dados Utilizador</button>
</form>
<>
<form method="get" action="registalivro.php">
    <button type="submit" style="height: 50px; width: 150px">Registar Livros</button>
</form>
<>
<form method="get" action="consultacliente.php">
    <button type="submit" style="height: 50px; width: 150px">Consultar Livros</button>
</form>

</table>
</table>


</BODY>
</HTML>

<?php
} else {
   header('Location: ./login.php');
}
?>