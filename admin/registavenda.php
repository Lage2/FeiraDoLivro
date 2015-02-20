<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
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
  <table width="100%" >
  <tr>
  <th>
  <image src="logo.png" align="middle" height="75">
  </th>
  <th>
  <font size=5> Regista Venda</font>
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
<br>
<form name="senddata" method="post" action="registavenda2.php">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
ISBN: <input name="isbn" type="number" size="40" maxlength="13" autofocus required/>
<br>
<tr>
<td><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Procurar Livro"/></td><br><br>
</tr>
</table>
</form>
</BODY>
</HTML>

<?php
} else {
   header('Location: ./login.php');
}
?>