<?php

include 'db_connect.php';
include 'functions.php';

$data = array();

sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 


if(isset($_POST['email'], $_POST['password'])) { 

   $email_post    = $_POST['email'];
   $password_post = $_POST['password'];

   if(login($email_post, $password_post, $mysqli) == true) {
      // Login com sucesso
      $_SESSION['email'] = $email_post; // Pega o valor da coluna 'id do registro encontrado no MySQL
      //$_SESSION['password'] = $password_post; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
      echo json_encode($data);
   } else {
      $data = array('error' => 1, 'message'=>'Credênciais erradas, por favor tente novamente');
      echo json_encode($data);
   }
} else { 
   $data = array('error' => 1, 'message'=>'Por favor preencha os campos e tente novamente.');
   echo json_encode($data);
}
?>