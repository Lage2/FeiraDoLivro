<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <title>Feira do Livro - LAGE2</title>

	<link href="css/style.css" type="text/css" rel="stylesheet"/> 
    <!-- Fontawesome Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    
	</head>
	<body>
		<nav id="navigation" class="navbar navbar-fixed-top" role="navigation">
	      <div class="container-fluid">
	        <!-- -->
	        <div class="navbar-header">
	          <a class="navbar-brand" href="index.php">
	            <img alt="Brand" src="img/logo-feira-livro.png">
	            <h1>Feira do Livro</h1>
	          </a>
	        </div>

	        <!-- TODO: devo linkar o js para isto funcionar -->
	        <div class="collapse navbar-collapse" id="nav-collapse">
	          <ul class="nav navbar-nav navbar-right">
	             <li><a href="registar.php">Registar</a></li>
	             <li><a href="index.php"><i class="fa fa-undo"></i>  Regressar</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    <div id="login-container" class="container">

	    	<div id="img-holder">
	    		<img src="img/feira-do-livro.png">
	    	</div>

	    	<div id="alert-container" class="container">
				<div id="error" class="alert alert-danger" role="alert">
					<p class="alert-link">As credênciais submetidas encontram-se erradas, por favor tente novamente.</p>
				</div>
			</div>

		    <form id="login-form" method="post" name="login_form">
		    	<div class="input-group input-group-lg">
  					<span id="mail" class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></span>
  					<input type="email" name="email" class="form-control" placeholder="Endereço E-mail" aria-describedby="sizing-addon1" autofocus>
				</div>
				<div class="input-group input-group-lg">
				  <span id="pass" class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
				  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
				</div>
			   <input id="login" type="button" class="btn btn-default" value="Entrar"/>
			</form>
	    </div>

	    <footer>
	      <hr class="footer-divider"/>
	      <div class="container">
	        <div class="row">
	          <div id="lage2-logo" class="col-md-6">
	            <a href="http://lage2.tecnico.ulisboa.pt/">
	              <img src="img/logo.png" alt="LAGE2">
	            </a>
	          </div>
	            <div id="copyrights"class="col-md-6">
	            <p>
	              Copyright &copy; 2014 <a href="http://lage.tecnico.ulisboa.pt">LAGE2</a>.
	              Todos os direitos reservados.
	            </p>
	            <p>
	              <i>Built with</i> <a href="http://getbootstrap.com/">Bootstrap</a>
	            </p>
	          </div>
	        </div>
	        </div>
	    </footer>

		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/sha512.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</body>
</html>

