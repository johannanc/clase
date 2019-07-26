<!DOCTYPE html>

<?php

if ($_POST) {
  if (!isset($_COOKIE["contador"])) {
    $count = 0;
  }
    if ($_POST["boton"] == "incrementar") {
      $count = $_COOKIE["contador"] + 1;
      setcookie("contador", $count);
    } else {
      setcookie("contador", 0);
    }
    header("Location: contador.php");
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modificar</title>
  </head>
  <body>
    <form class="" action="modificar.php" method="post">
      <div class="reiniciar">
        <input type="submit" name="boton" value="reiniciar">
      </div>
      <br>
      <div class="incrementar">
        <input type="submit" name="boton" value="incrementar">
      </div>
    </form>
  </body>
</html>
