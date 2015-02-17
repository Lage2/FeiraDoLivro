<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <title>Feira do Livro - LAGE2</title>
	<script type="text/javascript" src="sha512.js"></script>
	<script type="text/javascript" src="forms.js"></script>

	<link href="css/style.css" type="text/css" rel="stylesheet"/> 
    <!-- Fontawesome Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    
	</head>
	<body>
		<nav id="navigation" class="navbar navbar-fixed-top" role="navigation">
	      <div class="container-fluid">
	        <!-- -->
	        <div class="navbar-header">
	          <a class="navbar-brand" href="">
	            <img alt="Brand" src="img/logo-feira-livro.png">
	            <h1>Feira do Livro</h1>
	          </a>
	        </div>

	        <!-- TODO: devo linkar o js para isto funcionar -->
	        <div class="collapse navbar-collapse" id="nav-collapse">
	          <form class="navbar-form navbar-right" role="search">
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="Procurar ISBN">
	            </div>
	            <button type="submit" class="btn btn-default">
	              <i class="fa fa-search"></i>
	            </button>
	          </form>
	          <ul class="nav navbar-nav navbar-right">
	             <li><a href="#">Entrar</a></li>
	             <li><a href="registrar.php">Registrar</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
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
	</body>
</html>

