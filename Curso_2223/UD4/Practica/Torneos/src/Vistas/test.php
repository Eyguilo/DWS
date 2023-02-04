
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    function test_alta_usuario() {
        $u = new UsuarioAccesoDatos();
        return $u->insertar('Marc', 'Jugador', "12345678");        
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'Jugador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Marc','12345678');
        return $perfil === $perfil_esperado;
    }
    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());
