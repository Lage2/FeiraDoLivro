<!DOCTYPE html>
<?php 
  header("Content-Type: text/html; charset=utf-8",true);
  include 'database/db_connect.php';
  include 'database/db_clientes_connect.php';
  include 'database/functions.php';
  
  $logged = false;
  sec_session_start();
  if(login_check($mysqli) == true)
    $logged = true;

  
  if(!$logged)
    header('Location: ./login.php');
?>
<html>
  <head>
    <meta charset="utf-8">
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
              <?php if($logged) { ?><li><a href="meus-livros.php">Os Meus Livros</a></li> <?php } ?>
              <?php if($logged) { ?><li><a href="database/process-logout.php">Sair</a></li> <?php } ?>
              <li><a href="index.php"><i class="fa fa-undo"></i>  Regressar</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="sell-book-container" class="container">

      <div id="alert-container" class="container">
        <div id="success" class="alert alert-success" role="alert">
        </div>
        <div id="error" class="alert alert-danger" role="alert">
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <form>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="isbn-addon">ISBN</span>
              <input  type="text" class="form-control" id="isbn" name="isbn" placeholder="Introduza o ISBN do livro" aria-describedby="isbn-addon" 
                      pattern="[0-9]+" minlength="13" maxlength="13" required>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="title-addon">Título</span>
              <input type="text" class="form-control" id="title" name="title" placeholder="Introduza título do livro" aria-describedby="title-addon" required>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="autor1-addon">Autor</span>
              <input type="text" class="form-control" id="author1" name="author1" placeholder="Introduza o autor do livro" aria-describedby="author1-addon" required>
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="author2-addon">Autor</span>
              <input type="text" class="form-control" id="author2" name="author2" placeholder="Introduza o autor do livro (opcional)" aria-describedby="author2-addon">
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon">Preço</span>
              <input  id="price" name="price" type="number" class="form-control" aria-label="Introduza a quantia a qual gostaria de vender o livro"
                      pattern="[0-9]+([\.|,][0-9]+)?" step="0.1" min="0">
              <span class="input-group-addon">&euro;</span>
            </div>
            <button id="trash" type="button" class="btn btn-default"><i class="fa fa-trash"></i></button>
            <button id="submit" type="button" class="btn btn-default">Registar</button>

          </form>
        </div>
        <div class="col-md-4">
          <div id="book-cover-holder">
            <p><i class="fa fa-book"></i></p>
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
              Copyright &copy; 2014 <a href="http://lage2.tecnico.ulisboa.pt">LAGE2</a>.
              Todos os direitos reservados.
            </p>
            <p>
              <i>Built with</i> <a href="http://getbootstrap.com/">Bootstrap</a>
            </p>
          </div>
        </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
        <script type="text/javascript" src="js/sell-book.js"></script>
    </footer>
  </body>
</html>