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
    <link rel="shortcut icon" href="img/logo-feira-livro.ico">

    <link href="css/style.css" type="text/css" rel="stylesheet"/> 
    <link href="css/font-awesome.min.css" rel="stylesheet"/>

    <!-- Facebook -->
    <meta property="og:url" content="http://lage2.tecnico.ulisboa.pt/~lage2.daemon/feiradolivro/"/>
    <meta property="og:title" content="Feira do Livro 2015"/>
    <meta property="og:description" content="Feira do Livro do LAGE2, edição 2015"/>
    <meta property="og:image" content="http://lage2.tecnico.ulisboa.pt/~lage2.daemon/feiradolivro/img/feira-do-livro.png"/>


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
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input id="isbn" type="text" class="form-control" placeholder="Procurar ISBN">
            </div>
            <button id="search" type="button" class="btn btn-default">
              <i class="fa fa-search"></i>
            </button>
          </form>

          <ul class="nav navbar-nav navbar-right">
              <?php if($logged) { ?><li><a href="vender-livro.php">Vender Livro</a></li><?php } ?>
              <?php if($logged) { ?><li><a href="meus-livros.php">Os meus Livros</a></li><?php } ?>
              <?php if(!$logged){ ?><li><a href="login.php">Entrar</a></li><?php } ?>
              <?php if($logged) { ?><li><a href="database/process-logout.php">Sair</a></li> <?php } ?>
              <?php if(!$logged){ ?><li><li><a href="registar.php">Registar</a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="main" class="container">
      <div id="alert-container" class="container">
        <div id="error" class="alert alert-danger" role="alert">
          <a href="#" class="alert-link">...</a>
        </div>
      </div>
      <div id="sale-container" class="panel panel-default">
        <div class="panel-body">
          Lamentamos mas de momento não se encontram disponíveis livros para venda com o ISBN especificado.
          <img src="img/feira-do-livro.png">
        </div>
        <table id="available-books-4sale" class="table" id="available-books">
            <th>#</th>
            <th>Informações</th>
            <th>Preço</th>
        </table>
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
              Copyright &copy; 2014 <a href="http://lage2.tecnico.ulisboa.pt">LAGE2</a>.
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
    <script type="text/javascript" charset="utf-8" src="js/book-sale.js"></script>
  </body>
</html>