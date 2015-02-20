<?php

include 'db_connect.php';
include 'functions.php';
sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 

if(isset($_POST['email'], $_POST['p'])) { 
   $email = $_POST['email'];
   $password = $_POST['p']; // A senha em hash.
   if(login($email, $password, $mysqli) == true) {
      // Login com sucesso
	  $_SESSION['email'] = $email; // Pega o valor da coluna 'id do registro encontrado no MySQL
      $_SESSION['password'] = $password; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
      header('Location: ./index.php');
   } else {
      // Falha de login
      header('Location: ./login.php?error=1');
   }
} else { 
   // As variáveis POST corretas não foram enviadas para esta página.
   echo 'Requisição Inválida';
}

?>