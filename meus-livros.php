<!DOCTYPE html>
<?php 
  //header("Content-Type: text/html; charset=charset=utf-8",true);
  //header('Content-Type:text/xml; charset=UTF-8', true);
  header("Content-Type: text/html; charset=UTF-8");
  include 'database/db_connect.php';
  include 'database/db_clientes_connect.php';
  include 'database/functions.php';
  
  $logged = false;
  sec_session_start();
  if(login_check($mysqli) == true)
    $logged = true;

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    
    <title>Feira do Livro - LAGE2</title>

    <link href="css/style.css" type="text/css" rel="stylesheet"/> 
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
              <?php if($logged) { ?><li><a href="vender-livro.php">Vender Livro</a></li><?php } ?>
              <?php if(!$logged){ ?><li><a href="login.php">Entrar</a></li><?php } ?>
              <?php if($logged) { ?><li><a href="database/process-logout.php">Sair</a></li> <?php } ?>
              <?php if(!$logged){ ?><li><li><a href="registar.php">Registar</a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="mybooks-container" class="container">
      <div class="row">
        <div id="mybooks-sidebar-holder" class="col-md-2">
          <div id="mybooks-sidebar">
            <div class="row">
              <a id="mybooks-invalid-link" class="" href="#mybooks-invalid">Livros por validar</a>
            </div>
            <div class="row">
              <a id="mybooks-valid-link" class="section-link" href="#mybooks-valid">Livros validados</a>
            </div>
            <div class="row">
              <a id="mybooks-sold-link" class="section-link" href="#mybooks-sold">Livros vendidos</a>
            </div>
          </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
              <div class="panel-heading">Os meus livros por validar</div>
              <table id="mybooks-invalid" class="table" id="available-books">
                  <th>#</th>
                  <th>Informações</th>
                  <th>Preço</th>
              </table>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Os meus livros validados</div>
              <table id="mybooks-valid" class="table" id="available-books">
                  <th>#</th>
                  <th>Informações</th>
                  <th>Preço</th>
              </table>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Os meus livros vendidos</div>
              <table id="mybooks-sold" class="table" id="available-books">
                  <th>#</th>
                  <th>Informações</th>
                  <th>Preço</th>
              </table>
            </div>
          </div>
        </div>
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
    <script type="text/javascript" src="js/mybooks.js"></script>
  </body>
</html>