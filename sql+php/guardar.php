<?php
include("conexion.php");
if ($_POST) {
  $title = $_POST["title"];
  $rating = $_POST["rating"];
  $premios = $_POST["awards"];
  $duracion = $_POST["length"];
  $fechaEstreno = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"]." 00:00:00";
}

 ?>
