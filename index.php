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
  <image src="logo.png" align="middle" height="75">
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
<br></br>
<form method="get" action="registauser.php">
    <button type="submit" style="height: 50px; width: 150px">Cria Utilizador</button>
</form>
<>
<form method="get" action="registalivro.php">
    <button type="submit" style="height: 50px; width: 150px">Registar Livro</button>
</form>
<>
<form method="get" action="registavenda.php">
    <button type="submit" style="height: 50px; width: 150px">Registar Venda</button>
</form>
<br></br>
<form method="get" action="consultauser.php">
    <button type="submit" style="height: 50px; width: 150px">Consultar Utilizador</button>
</form>
<>
<form method="get" action="consultalivros.php">
    <button type="submit" style="height: 50px; width: 150px">Consultar todos os Livros</button>
</form>
<>
<form method="get" action="consultalivrosvenda.php">
    <button type="submit" style="height: 50px; width: 150px">Consultar Livros para Venda</button>
</form>
<br></br>
<form method="get" action="consultavendas.php">
    <button type="submit" style="height: 50px; width: 150px">Consultar Vendas</button>
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