<meta charset="utf-8">
<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>

<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();

if(login_check($mysqli) == true) {
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
  <table width="100%" >
  <tr>
  <th>
  <image src="logo.png" align="middle" height="75">
  </th>
  <th>
  <font size=5> Regista Utilizador</font>
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
<form name="senddata" method="post" enctype="multipart/form-data" action="insuser.php">
<table width="100%" border="0" cellspacing="2" cellpadding="2">

<table width="100%">
Username: <input name="username" type="text" size="40" maxlength="30" autofocus required/><br><br>
Email: <input name="email" type="text" size="40" maxlength="50" required/><br><br>
Password: <input name="password" type="text" id="password" size="40" maxlength="50" required/>
</table>
<br>
<tr>
<td><input name="enviar" type="submit" style="height: 50px; width: 150px" value="Regista Utilizador"/></td><br><br>
</tr>
</table>
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