<?php
require_once 'models/Usuario.php';

class UsuarioController
{
    public function index()
    {
        echo 'Controlador Usuarios, Accion Index';
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }


    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            if ($nombre && $apellidos && $email && $password) {
                try {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre;
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);

                    $save = $usuario->save();
                    if ($save) {
                        $_SESSION['register'] = "complete";
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                } catch (mysqli_sql_exception $e) {
                    $_SESSION['register'] = "failed";
                    $_SESSION['error_message'] = "Error: " . $e->getMessage();
                }
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        // Redirigir a la página de registro
        header("Location:".base_url.'Usuario/registro');
    }

}