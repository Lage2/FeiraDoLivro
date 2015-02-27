<?php
define("HOST", 'localhost'); // O host no qual você deseja se conectar.
define("USER", 'root'); // O nome de usuário do banco de dados.
define("PASSWORD", 'root'); // A senha do usuário do banco de dados. 
define("DATABASE", 'g00961_secure'); // O nome do banco de dados.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>
