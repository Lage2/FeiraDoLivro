<?php

include 'db_connect.php';
include 'functions.php';

$data = array();
$email_post    = $_POST['email'];
$password_post = $_POST['password'];

sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 


if(isset($_POST['email'], $_POST['password'])) { 
   if(login($email_post, $password_post, $mysqli) == true) {
      // Login com sucesso
      $_SESSION['email'] = $email; // Pega o valor da coluna 'id do registro encontrado no MySQL
      $_SESSION['password'] = $password; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
      echo json_encode($data);
   } else {
      $data = array('error' => 1);
      echo json_encode($data);
   }
} else { 
   $data = array('error' => 1);
   echo json_encode($data);
}
?>