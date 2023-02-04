
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }

    function test_alta_usuario() {
        $u = new UsuarioAccesoDatos();

        $passwd = '12345678';
        $mensajeError = 'La contraseña es inferior a 8 carácteres.';

        if(strlen($passwd) < 8){
            return $mensajeError;
        } else{
            test_verificar_usuario_encontrado($passwd);
            return $u->insertar('Ada', 'Administrador', $passwd);
        }
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'Administrador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Ada','12345678');
        return $perfil === $perfil_esperado;
    }
    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());
