﻿<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();

if(login_check($mysqli) == true) {
$pesquisa = "email= '".$_SESSION['email']."'";

$qry = mysqli_query($mysqli,"select admin from members where ".$pesquisa);
$r = mysqli_fetch_array($qry);

if($r['admin']==1){
?>
<HTML>
<meta charset="utf-8">
  <HEAD>
  <TITLE>Feira do Livro - LAGE2</TITLE>
  </HEAD>
  <BODY>
  <table width="100%" style="border:0px; padding:0px;">
  <tr>
  <th style="border:0px; padding:0px; background-color:#FFFFFF;">
  <image src="logo.png" align="middle" height="75">
  </th>
  <th style="border:0px; padding:0px; background-color:#FFFFFF;">
  <font size=5> Feira do Livro</font><br>
  <font size=4> Consulta Livros para Venda</font>
  </th>
  <th style="border:0px; padding:0px; background-color:#FFFFFF;">
  <form method="get" action="index.php">
    <button type="submit" style="height: 50px; width: 150px">Menu Principal</button>
  </form>
  <form method="get" action="logout.php">
    <button type="submit" style="height: 50px; width: 150px">Sair</button>
  </form>
  </th>
  </tr>  
  </table>

<?

$qry = mysqli_query($mysqli_client,"select * from product_book where valid=1 and sold=0");
if (mysqli_num_rows($qry)==0){
?>
<center>
<br><br><br>
<font size=5> Não existem Livros para Venda!!!!</font>
</center>
<?

}else{
while($r = mysqli_fetch_array($qry)){
$pesquisa3 = "isbn= '".$r['isbn']."'";
$qry2 = mysqli_query($mysqli_client,"select name from book where ".$pesquisa3);
$r2 = mysqli_fetch_array($qry2);
?>


<table width="100%">
<tr>
<th width="50%" align="left" style="border:0px; padding:0px;">
<br>ID: <?php echo $r['id']; ?><br><br>Nome: <?php echo $r2['name']; ?><br><br>ISBN: <?php echo $r['isbn']; ?><br><br>Vendedor: <?php echo $r['seller']; ?><br><br>Preço: <?php echo $r['price']; ?><br>
</th>
<td width="25%" align="center" style="border:0px; padding:0px;"><image src="../images/<?php echo $r['isbn'];?>.jpg" align="middle" height="150px"></td>
</tr>  
</table>
<br>
<?
}}
?>
<?php
}
else {
   header('Location: ./index.php');
}
}
else {
   header('Location: ./login.php');
}
?>

<style>
table, td, th, tfoot {border:solid 1px #000; padding:5px;}
th {background-color:#999;}
caption {font-size:x-large;}
colgroup {background:#F60;}
.coluna1 {background:#F66;}
.coluna2  {background:#F33;}
.coluna3  {background:#F99;}
</style>