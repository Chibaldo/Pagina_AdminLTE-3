<?php
require_once("../config/conexion.php");

if (isset($_POST["enviar"]) && $_POST["enviar"] == "ok") {
    // Verificar si los campos email y password están vacíos
    if (empty(trim($_POST["email"])) || empty(trim($_POST["password"]))) {
        // Redireccionar con mensaje de error "Formulario vacío"
        header("Location: login.php?m=2");
        exit();
    }

    require_once("../models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}

if (isset($_POST["enviar"]) && $_POST["enviar"] == "ok") {
    if (empty(trim($_POST["email"])) || empty(trim($_POST["password"]))) {
        // Error si el formulario está vacío
        header("Location: login.php?m=2");
        exit();
    }

    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    // Llamamos al método login que debería validar el usuario
    if ($usuario->login()) {
        // Si el login es exitoso, asignamos el nombre del usuario a la sesión
        $_SESSION["usu_nom"] = $usuario->getNombre();  // Ajusta esto al método correcto para obtener el nombre
        header("Location: home.php");
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Archivos CSS de AdminLTE -->
  <?php require_once("modulos/css.php"); ?> 

  <!-- Tu archivo CSS personalizado -->
  <link rel="stylesheet" href="cssMenuUsuarios.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in para iniciar tu sesión</p>

      <form method="post">
        <?php
        // Mostrar mensajes de error según el valor de "m" en la URL
        if (isset($_GET["m"])) {
            switch ($_GET["m"]) {
                case "1":
        ?>
                  <div class="alert alert-danger" role="alert">
                    Los datos del formulario son incorrectos.
                  </div>
        <?php
                  break;

                case "2":
        ?>
                  <div class="alert alert-warning" role="alert">
                    El formulario está vacío. Por favor, ingresa tu email y contraseña.
                  </div>
        <?php
                  break;
            }
        }
        ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuérdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="hidden" name="enviar" value="ok">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">Olvidar Contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrar usuario nuevo</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php require_once("modulos/js.php"); ?>
</body>
</html>
