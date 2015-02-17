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
              <?php if($logged) { ?><li><a href="vender-livro.php">Vender Livro</a></li><?php } ?>
              <?php if(!$logged){ ?><li><a href="login.php">Entrar</a></li><?php } ?>
              <?php if($logged) { ?><li><a href="database/process-logout.php">Sair</a></li> <?php } ?>
              <?php if(!$logged){ ?><li><li><a href="registrar.php">Registrar</a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="main" class="container">
      <div class="panel panel-default">

        <?php
        $qry = mysqli_query($mysqli_client,"select * from book");
        if (mysqli_num_rows($qry)<=0){
        ?>
          <p>
            A Feira do Livro Técnico Usado vai decorrer entre os dias 15 de Setembro a 3 de Outubro e é dirigida aos estudantes que queiram vender ou comprar livros técnicos.
          </p>
          <p>
            É uma oportunidade tanto para "reciclar" os vossos antigos livros como para comprar os novos livros de que precisam com descontos de feira!
          </p>
        <?php 
          }else{
        ?>
          <table id="available-books" class="table">
            <th>#</th>
            <th>Informações</th>
            <th>Preço</th>
        <?php
            while($r = mysqli_fetch_array($qry)){

  
        ?>
            <tr>
              <td class='book-cover'><image src="images/<?php echo $r['isbn'];?>.jpg" align="middle"></td>
              <td>
                <div class="book-info">
                <ul>
                  <li><span>ISBN:</span> <?php echo $r['isbn']; ?></li>
                  <li><span>Título:</span> <?php echo utf8_encode($r['name']); ?></li>
                  <li><span>Autores:</span> <?php echo utf8_encode($r['author1']); ?> , <?php echo $r['author2']; ?></li>
                  <!-- TODO: corrigir para caso não exista autor2 -->
                </ul>
                </div>
              </td>
              <td class="book-price">0.00&euro;</td>
            </tr>
        <?php
          }}
            
        ?>
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
  </body>
</html>