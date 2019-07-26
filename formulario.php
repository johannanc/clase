<!DOCTYPE html>

<?php

$nombre = "";
$apellido = "";
$email = "";
$contrasenia = "";
$tname = "";
$tapellido = "";
$temail = "";
$tpass = "";
$tpassconfirm = "";
$tarchivo = "";

if ($_POST) {
  $nombre = trim($_POST["nombre"]);
  $apellido = trim($_POST["apellido"]);
  $email = trim($_POST["email"]);
  $contrasenia = $_POST["pass"];
  $confirmpass = $_POST["confirm_pass"];
  $hash = password_hash($contrasenia, PASSWORD_DEFAULT);

  $val = 0;

  if (strlen($nombre) == 0) {
    $tname = "Complete el nombre <br>";
    $val++;
  }
  if (strlen($apellido) == 0) {
    $tapellido = "Complete el apellido <br>";
    $val++;
  }
  if (strlen($email) == 0) {
    $temail = "Complete el email <br>";
    $val++;
  }
  if (strlen($contrasenia) == 0) {
    $tpass = "Complete la contraseña <br>";
    $val++;
  } else {
    if (password_verify($confirmpass, $hash) == false) {
      $tpassconfirm = "Las contraseñas no coinciden";
      $val++;
    }
  }

  if ($_FILES) {
    if ($_FILES["foto"]["error"] != 0) { //me fijo si hubo error al cargar el archivo
      $tarchivo = "Hubo un error al cargar el archivo";
      $val++;
    } else {
      $ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") { //me fijo que la extensión del archivo sea correcta
        $tarchivo = "El archivo debe ser jpg, jpeg o png";
        $val++;
      } else { //ya no hay más errores creo
        move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/".$_FILES["foto"]["name"].".".$ext);
      }
    }

  }
  if ($val == 0) {
    echo "<h2>Gracias por registrarse!</h2>";
    // $array = [
    //   "nombre" => $nombre,
    //   "apellido" => $apellido,
    //   "email" => $email,
    //   "contrasenia" => $hash,
    // ];
    unset($_POST["confirm_pass"]);
    unset($_POST["submit"]);
    $_POST["pass"]=$hash;
    $json = file_get_contents("json.json"); //recupero el archivo
    $array = json_decode($json, true); //lo transformo de json a array
    $array[] = $_POST; //agrego info nueva
    $array = json_encode($array); //lo vuelvo json
    file_put_contents("json.json", $array); //vuelvo a meter en el archivo

    // var_dump($json);
  }
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
  </head>
  <body>
    <form class="" enctype="multipart/form-data" action="formulario.php" method="post">
      <div class="nombre">
        <label for="name">Nombre: </label>
        <input type="text" name="nombre" value="<?=$nombre?>">
        <?php echo $tname; ?>
      </div>
      <div class="apellido">
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" value="<?=$apellido?>">
        <?php echo $tapellido; ?>
      </div>
      <div class="email">
        <label for="email">Email: </label>
        <input type="email" name="email" value="<?=$email?>">
        <?php echo $temail; ?>
      </div>
      <div class="foto">
        <label for="foto">Foto de perfil: </label>
        <input type="file" name="foto" value="">
        <?php echo $tarchivo; ?>
      </div>
      <div class="pass">
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" value="">
        <?php echo $tpass; ?>
      </div>
      <div class="confirm_pass">
        <label for="confirm_pass">Confirmar contraseña: </label>
        <input type="password" name="confirm_pass" value="">
        <?php echo $tpassconfirm; ?>
      </div>
      <div class="submit">
        <input type="submit" name="submit" value="Enviar">
      </div>
    </form>
  </body>
</html>
