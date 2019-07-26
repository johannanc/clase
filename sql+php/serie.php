<?php
include("conexion.php");
$consulta = $database -> prepare("SELECT series.id, series.title, genres.name FROM series LEFT JOIN genres ON genre_id = genres.id");
$consulta -> execute();
$series = $consulta -> fetchAll(PDO::FETCH_ASSOC);
if ($_GET) {
  $idSerie = $_GET["id"];
} else {
  echo "Ingresar el id de la serie en el queryString";
  exit;
}

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
        <?php if ($serie["id"] == $idSerie): ?>
          <div class="div_datosserie">
            <p><?php echo "Nombre: " . $serie["title"] ?></p>
            <p><?php echo "Género: " . $serie["name"] ?></p>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </body>
</html>
