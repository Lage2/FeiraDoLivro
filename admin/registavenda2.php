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

<?php

$pesquisa = "isbn=".$_POST['isbn'];
$pesquisa2 = "email= '".$_SESSION['email']."'";

$qry = mysqli_query($mysqli_client,"select * from book where ".$pesquisa);
$qry_user = mysqli_query($mysqli,"select username from members where ".$pesquisa2);

if (mysqli_num_rows($qry)==0){
?>
<center>
<br><br><br>
<font size=5> Não existe livro com esse ISBN. Por favor registe primeiro o livro!!!!</font>
</center>
<?php
}
else{
$r = mysqli_fetch_array($qry);
$r_user = mysqli_fetch_array($qry_user);
?>

<form name="senddata" method="post" enctype="multipart/form-data" action="insvenda.php">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<td width="50%">
<input name="seller" type="hidden" value="<?php echo $r_user['username'];?>">
ISBN: <input name="isbn" type="text" size="40" maxlength="13" value="<?php echo $r['isbn']; ?> " readonly="readonly"/><br><br>
Nome: <input name="nome" type="text" size="40" maxlength="50" value="<?php echo $r['name']; ?> " readonly="readonly"><br><br>
Autor 1: <input name="autor1" type="text" size="40" maxlength="50" value="<?php echo $r['author1']; ?> " readonly="readonly"><br><br>
Autor 2: <input name="autor2" type="text" size="40" maxlength="50" value="<?php echo $r['author2']; ?> " readonly="readonly"/><br><br>
Valor: <input name="price" step="0.01" min="0.01" max="249.99" type="number" size="40" autofocus required/> Euro
<br>
</td>
<td width="50%" style="border:0px; padding:0px;"><image src="images/<?php echo $r['isbn'];?>.jpg" align="middle" height="250px"></td>
<tr>
<td><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Regista Venda"/></td><br><br>
</tr>
</table>
</form>
</BODY>
</HTML>
<?php
}
} else {
   header('Location: ./login.php');
}
?>