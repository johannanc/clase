<?php

$dsn = "mysql:host=localhost;dbname=movies_db;port=3306";
$usuario = "root";
$pass = "root";

try {
  $database = new PDO ($dsn, $usuario, $pass);
  $database -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  echo "Hubo un error en la conexión a la base de datos";
}


 ?>
