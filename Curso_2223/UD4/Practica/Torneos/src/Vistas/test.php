
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    function test_alta_usuario() {
        $u = new UsuarioAccesoDatos();
        return $u->insertar('Charles', 'Jugador', '1234');
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'Jugador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Charles','1234');
        return $perfil === $perfil_esperado;
    }

    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());