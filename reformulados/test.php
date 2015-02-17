<?php

define("HOST", "db.tecnico.ulisboa.pt"); // O host no qual você deseja se conectar.
define("USER", "g00961_secure"); // O nome de usuário do banco de dados.
define("PASSWORD", "lage22015"); // A senha do usuário do banco de dados. 
define("DATABASE", "g00961_secure"); // O nome do banco de dados.

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Error " . mysqli_error($link));

$query = "SELECT * FROM members" or die("Error in the consult.." . mysqli_error($link));

$result = $link->query($query);

while($row = mysqli_fetch_array($result)) { 
  echo $row["id"] . "<br>"; 
}

?>