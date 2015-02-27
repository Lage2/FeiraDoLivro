<?php
define("HOST1", 'db.tecnico.ulisboa.pt'); // O host no qual você deseja se conectar.
define("USER1", 'g00961_book'); // O nome de usuário do banco de dados.
define("PASSWORD1", 'lage22015'); // A senha do usuário do banco de dados. 
define("DATABASE1", 'g00961_book'); // O nome do banco de dados.

$mysqli_client = new mysqli(HOST1, USER1, PASSWORD1, DATABASE1);
?>
