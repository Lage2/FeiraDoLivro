<meta charset="utf-8">
<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>

<center>
<image src="logo.png" align="middle" height="150"><br>
<font size=5> Feira do Livro </font>
<br><br>
<?php
if(isset($_GET['error'])) { 
?>
   <br><font size=3 color = #FF0000> Dados Incorrectos. Tente Novamente! </font>
<?php
}
?>
<form action="process_login.php" method="post" name="login_form">
   Email: <input type="email" name="email" autofocus><br><br>
   Password: <input type="password" name="password" id="password"><br><br>
   <input type="submit" value="Login" style="height: 50px; width: 150px" onclick="formhash(this.form, this.form.password);" />
</form>