<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();

if(login_check($mysqli) == true) {
$pesquisa_admin = "email= '".$_SESSION['email']."'";

$qry_admin = mysqli_query($mysqli,"select admin from members where ".$pesquisa_admin);
$r_admin = mysqli_fetch_array($qry_admin);

if($r_admin['admin']==1){
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
  <font size=5> Dados Utilizador</font>
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


$pesquisa_user = "email= '".$_POST['email']."'";

$qry_user = mysqli_query($mysqli,"select username from members where ".$pesquisa_user);
$r_user = mysqli_fetch_array($qry_user);
$email_user = $_POST['email'];
$username_user = $r_user['username'];


?>



<table width="50%" border="1" cellspacing="2" cellpadding="2">
<tr>
<td><b>Username</b></td>
<td><b>Email</b></td> 
</tr>
<tr>
<td><?php echo $username_user;?></td>
<td><?php echo $email_user;?></td> 
</tr>
</table>
<br><br>
<font size=5>Livros registados</font>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr>
<td><b>ID</b></td>
<td><b>ISBN</b></td>
<td><b>Nome</b></td>
<td><b>Preço de Venda</b></td>
<td><b>Em venda?</b></td>
<td><b>Vendido?</b></td> 
</tr>
<?php
$pesquisa2 = "seller= '".$username_user."'";
$qry = mysqli_query($mysqli_client,"select * from product_book where ".$pesquisa2);
if (mysqli_num_rows($qry)!=0){
$valor_vendas=0;
	while($r = mysqli_fetch_array($qry)){
		$pesquisa3 = "isbn= '".$r['isbn']."'";

		$qry2 = mysqli_query($mysqli_client,"select name from book where ".$pesquisa3);
		$r2 = mysqli_fetch_array($qry2);
	if($r['sold']=='1')
		$valor_vendas += $r['price'];
?>
<tr>
<td><?php echo $r['id'];?></td>
<td><?php echo $r['isbn'];?></td>
<td><?php echo $r2['name'];?></td>
<td><?php echo $r['price'];?></td>
<td><?php if($r['valid']=='0') echo 'Nao'; else echo 'Sim';?></td> 
<td><?php if($r['sold']=='0') echo 'Nao'; else echo 'Sim';?></td>
</tr>
<?php
}
}else{
?>
<td>Não Livros registados</font></td>
<?php
}
?>
</table>
<br><font size=5>Valor total de Vendas: <?php echo $valor_vendas ?></font>

</BODY>
</HTML>

<?php
}else {
   header('Location: ./index.php');
}
} else {
   header('Location: ./login.php');
}
?>