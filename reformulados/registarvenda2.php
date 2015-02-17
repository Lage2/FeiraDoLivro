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
  <font size=5> Registar Venda</font>
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

$pesquisa = "id='".$_POST['id']."'";

$qry = mysqli_query($mysqli_client,"select * from product_book where ".$pesquisa);
if (mysqli_num_rows($qry)==0){
?>
<center>
<br><br><br>
<font size=5>O livro não existe!!!!</font>
</center>
<?php
}
else{
$r = mysqli_fetch_array($qry);
$pesquisa3 = "isbn= '".$r['isbn']."'";

$qry2 = mysqli_query($mysqli_client,"select name from book where ".$pesquisa3);
$r2 = mysqli_fetch_array($qry2);
?>
<form name="senddata" method="post" enctype="multipart/form-data" action="finalizavenda.php">
<input type="checkbox" name="registar[]" value="<?php echo $r['id'];?>" />ID: <?php echo $r['id'];?>........ISBN: <?php echo $r['isbn'];?>........Nome: <?php echo $r2['name'];?>........Preço: <?php echo $r['price'];?>........Valido: <?php if($r['valid']=='0') echo 'Nao'; else echo 'Sim';?>........Vendido: <?php if($r['sold']=='0') echo 'Nao'; else echo 'Sim';?>
<br><br><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Finalizar Venda"/></td><br><br>
</form>
<?php
}
?>
</BODY>
</HTML>
<?php
} else {
   header('Location: ./login.php');
}
?>