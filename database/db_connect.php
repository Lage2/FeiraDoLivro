<?php
define("HOST", 'db.tecnico.ulisboa.pt'); // O host no qual você deseja se conectar.
define("USER", 'g00961_secure'); // O nome de usuário do banco de dados.
define("PASSWORD", 'lage22015'); // A senha do usuário do banco de dados. 
define("DATABASE", 'g00961_secure'); // O nome do banco de dados.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>
