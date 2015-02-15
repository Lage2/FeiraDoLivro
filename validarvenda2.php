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
  <font size=5> Validar Venda</font>
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

$pesquisa = "email='".$_POST['email']."'";
$qry_user = mysqli_query($mysqli,"select username from members where ".$pesquisa);
$r_user = mysqli_fetch_array($qry_user);
$pesquisa2 = "seller= '".$r_user['username']."'";

$qry = mysqli_query($mysqli_client,"select * from product_book where ".$pesquisa2);

if (mysqli_num_rows($qry)==0){
?>
<center>
<br><br><br>
<font size=5> Este user não tem livros pré-registados!!!!</font>
</center>
<?php
}
else{
?>
<form name="senddata" method="post" enctype="multipart/form-data" action="validavenda.php">
<?php
while($r = mysqli_fetch_array($qry)){
$pesquisa3 = "isbn= '".$r['isbn']."'";

$qry2 = mysqli_query($mysqli_client,"select name from book where ".$pesquisa3);
$r2 = mysqli_fetch_array($qry2);
?>

<input type="checkbox" name="activar[]" value="<?php echo $r['id'];?>" />ID: <?php echo $r['id'];?>........ISBN: <?php echo $r['isbn'];?>........Nome: <?php echo $r2['name'];?>........Preço: <?php echo $r['price'];?>........Valido: <?php if($r['valid']=='0') echo 'Nao'; else echo 'Sim';?> <br />

<?php
}
?>

<br><br><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Activar livros"/></td><br><br>
<font size=5> ATENÇÃO MARCAR O ID NOS LIVROS!!!!!!</font><br>

</form>
</BODY>
</HTML>
<?php
}
} else {
   header('Location: ./login.php');
}
?>