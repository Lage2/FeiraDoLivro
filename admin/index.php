<?php
include 'db_connect.php';
include 'functions.php';
sec_session_start();
if(login_check($mysqli) == true){

$pesquisa = "email= '".$_SESSION['email']."'";

$qry = mysqli_query($mysqli,"select admin from members where ".$pesquisa);
$r = mysqli_fetch_array($qry);

if($r['admin']==1){
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
    <button type="submit" style="height: 50px; width: 200px">Cria Utilizador</button>
</form>
<>
<form method="get" action="removeruser.php">
    <button type="submit" style="height: 50px; width: 200px">Remover Utilizador</button>
</form>
<>
<form method="get" action="consultauser_admin.php">
    <button type="submit" style="height: 50px; width: 200px">Consultar Utilizador</button>
</form>
<br><br>
<form method="get" action="registalivro.php">
    <button type="submit" style="height: 50px; width: 200px">Registar Livro</button>
</form>
<>
<form method="get" action="removerlivro.php">
    <button type="submit" style="height: 50px; width: 200px">Remover Livro</button>
</form>
<>
<form method="get" action="consultalivros.php">
    <button type="submit" style="height: 50px; width: 200px">Consultar todos os Livros</button>
</form>
<br><br>
<form method="get" action="validarvenda.php">
    <button type="submit" style="height: 50px; width: 200px">Validar Venda</button>
</form>
<>
<form method="get" action="registavenda.php">
    <button type="submit" style="height: 50px; width: 200px">Registar Venda</button>
</form>
<>
<form method="get" action="removervenda.php">
    <button type="submit" style="height: 50px; width: 200px">Remover Venda</button>
</form>
<>
<form method="get" action="consultalivrosvenda.php">
    <button type="submit" style="height: 50px; width: 200px">Consultar Livros para Venda</button>
</form>
<br></br>
<form method="get" action="registarvenda.php">
    <button type="submit" style="height: 50px; width: 200px">Realizar Venda ao Cliente</button>
</form>
<>
<form method="get" action="consultavendas.php">
    <button type="submit" style="height: 50px; width: 200px">Consultar Vendas</button>
</form>
<br></br>
</table>
</BODY>
</HTML>

<?php
}
else {
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
<form method="get" action="registalivro.php">
    <button type="submit" style="height: 50px; width: 200px">Registar Livro</button>
</form>
<>
<form method="get" action="registavenda.php">
    <button type="submit" style="height: 50px; width: 200px">Registar Venda</button>
</form>
<>
<form method="get" action="consultauser.php">
    <button type="submit" style="height: 50px; width: 200px">Consultar Utilizador</button>
</form>
</table>
</BODY>
</HTML>
<?php
}
} else {
   header('Location: ./login.php');
}
?>