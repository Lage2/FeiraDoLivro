<?php
define("HOST", "db.tecnico.ulisboa.pt"); // O host no qual você deseja se conectar.
define("USER", "g00961_secure"); // O nome de usuário do banco de dados.
define("PASSWORD", "lage2admin"); // A senha do usuário do banco de dados. 
define("DATABASE", "g00961_secure"); // O nome do banco de dados.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

// Se você estiver se conectando via TCP/IP ao invés de um socket UNIX, lembre-se de adicionar o número da porta como um parâmetro.
?>