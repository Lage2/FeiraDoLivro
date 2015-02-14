<?php
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();

if(login_check($mysqli) == true) {
?>
<HTML>
<meta charset="utf-8">
  <HEAD>
  <TITLE>Criação de Clientes - LIVELOBSTER</TITLE>
  </HEAD>
  <BODY>
  <table width="100%" >
  <tr>
  <th>
  <image src="logo.bmp" align="middle" height="75">
  </th>
  <th>
  <font size=5> Gestão de Clientes</font><br>
  <font size=4> Cria Cliente</font>
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
<br><br><br>
<font size=5> Cliente Criado com Sucesso!!!!</font>
</center>
</BODY>
</HTML>

<?php
} else {
   header('Location: ./login.php');
}
?>