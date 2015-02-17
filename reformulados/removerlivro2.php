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
  <font size=5> Remover Livro</font>
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


$pesquisa_book = "isbn= '".$_POST['isbn']."'";

$qry_book = mysqli_query($mysqli_client,"select * from book where ".$pesquisa_book);
$r_book = mysqli_fetch_array($qry_book);


?>

<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr>
<td><b>ISBN</b></td>
<td><b>Nome</b></td>
<td><b>Autor 1</b></td>
<td><b>Autor 2</b></td> 
</tr>
<tr>
<td><?php echo $r_book['isbn'];?></td>
<td><?php echo $r_book['name'];?></td>
<td><?php echo $r_book['author1'];?></td>
<td><?php echo $r_book['author2'];?></td>


</tr>
</table>

<form name="senddata" method="post" enctype="multipart/form-data" action="removelivro.php">
<input name="isbn" type="hidden" size="100" maxlength="98" value="<?php echo $r_book['isbn'];?>"/>
<td><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Remove Livro"/></td><br><br>
</form>

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