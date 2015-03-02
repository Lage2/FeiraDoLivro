<?php
include 'database/db_connect.php';
include 'database/functions.php';

sec_session_start();

if(login_check($mysqli) == true) { header('Location: index.php'); }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Feira do Livro - LAGE2</title>

    <link href="css/style.css" type="text/css" rel="stylesheet"/> 

    <!-- Fontawesome Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet"/>

    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" scr="js/validate.js"></script>
    <script type="text/javascript" src="js/sha512.js"></script>
    <script type="text/javascript" src="js/registar.js"></script>
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
             <li>
              <a href="index.php">
                <i class="fa fa-undo"></i>  Regressar
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="register-user-container" class="container">
      <div class="well">
        <h3>Regulamentos e Instruções</h3>
        <ol>
          <li>A Feira do Livro decorrerá a partir de <span>2 de Março de 2015</span>, na sala do LAGE2 (0.43).</li>
          <li>Todos os interessados em participar na Feira do Livro Usado devem entregar os livros para venda na sala do LAGE2 (0.43) entre as 9h e as 17h.</li>
          <li>As inscrições para a venda dos livros e a recepção dos mesmos decorrem de <span>2 de Março a 6 de Março</span>.</li>
          <li>10% das receitas obtidas na venda dos livros reverte para despesas da organização.</li>
          <li>A devolução dos livros não vendidos e entrega de dinheiro das vendas decorrerá nos dias <span>30 de Março a 3 de Abril de 2015 entre as 9h e as 17h</span>, na sala do LAGE2 (0.43).</li>
          <li>Todos os livros e/ou respectivas receitas que não sejam reclamados até às 17h do dia <span>3 de Abril de 2015</span> reverterão para a organização.</li>
        </ol>
      </div>

      <div id="alert-container" class="container">
        <div id="success" class="alert alert-success" role="alert">
          <p>O seu registo foi concretizado com sucesso. Irá ser redireccionado para a página inicial onde poderá entrar.</p>
        </div>
        <div id="error" class="alert alert-danger" role="alert">
          <a href="#" class="alert-link">...</a>
        </div>
      </div>

      <form>
        <div class="form-group">
          <label for="username">Nome de utilizador</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Introduza o seu nome de utilizador" required>
        </div>
        <div class="form-group">
          <label for="email">Endereço e-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Introduza o seu email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Introduza a sua password" required>
        </div>
        <div class="form-group">
          <label for="password">Confirmar Password</label>
          <input type="password" class="form-control" id="passwordc" name="passwordc" placeholder="Introduza a sua password" required>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" required> Li e aceito os regulamentos acima descritos
          </label>
        </div>
        <button id="submit" name="registrar" type="button" class="btn btn-default">Registar</button>
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
  </body>
</html>
