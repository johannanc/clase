<?php
include("conexion.php");
$consulta = $database -> prepare("SELECT id, title FROM series");
$consulta -> execute();
$series = $consulta -> fetchAll(PDO::FETCH_ASSOC);
$count = 1;
//var_dump($series);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="div_series">
      <?php foreach ($series as $serie): ?>
        <a <?php echo "href=serie.php?id=" . $serie["id"] ?> > <?php echo $serie["title"] . "<br>"; ?></a>
        <?php $count++; ?>
      <?php endforeach; ?>
    </div>
  </body>
</html>
