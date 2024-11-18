<?php
    class Usuario extends Conectar {
        public function login(){
            $conectar = parent::Conexion();
            parent::set_names();
            if (isset($_POST["enviar"]) && $_POST["enviar"] == "ok") {
                // Obtener los valores de los campos
                $correo = $_POST["email"];
                $password = $_POST["password"];

                // Validar si los campos están vacíos
                if (empty($correo) || empty($password)) {
                    header("Location:" . Conectar::ruta() . "views/login.php?m=2");
                    exit();
                } else {
                    // Preparar la consulta
                    $sql = "SELECT * FROM usuarios WHERE usu_correo=? AND usu_pass=? AND est=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $password);
                    $stmt->execute();
                    $resultado = $stmt->fetch();

                    // Si el usuario es válido, redirigir a la página principal
                    if (is_array($resultado) && count($resultado) > 0) {
                        $_SESSION["usu_id"] = $resultado["usu_id"];
                        $_SESSION["usu_nom"] = $resultado["usu_nom"];
                        $_SESSION["usu_apep"] = $resultado["usu_apep"];
                        $_SESSION["usu_correo"] = $resultado["usu_correo"];
                        header("Location:" . Conectar::ruta() . "views/home.php");
                    } else {
                        // Si los datos son incorrectos, redirigir a login con mensaje
                        header("Location:" . Conectar::ruta() . "views/login.php?m=1");
                        exit();
                    }
                }
            }
        }
    }
?>
