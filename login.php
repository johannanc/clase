<!DOCTYPE html>

<?php

$temail = "";
$tpassword = "";
if ($_POST) {
  $val = 0;
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  /* VALIDO EMAIL Y CONTRASEÑA */
  if (strlen($email) == 0) {
    $temail = "Complete el email <br>";
    $val++;
  }
  if (strlen($contrasenia) == 0) {
    $tpass = "Complete la contraseña <br>";
    $val++;
  }

  /* RECUPERO DATOS DEL JSON */
  $json = file_get_contents("json.json"); //recupero el archivo
  $array = json_decode($json, true); //lo transformo de json a array

  /* VALIDO QUE EL USUARIO EXISTA */
  foreach ($array as $datos) {
    if ($datos["email"] == $email) {
      $usuario = $datos; //me estoy quedando con el array de datos de un usuario
      break;
    }
  }

}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form class="login" action="exito.php" method="post">
      <div class="email">
        <label for="email">Email: </label>
        <input type="email" name="email" value="">
        <?php echo $temail; ?>
      </div>
      <div class="password">
        <label for="password">Contraseña: </label>
        <input type="password" name="password" value="">
        <?php echo $tpassword; ?>
      </div>
      <div class="submit">
        <input type="submit" name="submit" value="Enviar">
      </div>
    </form>
  </body>
</html>
