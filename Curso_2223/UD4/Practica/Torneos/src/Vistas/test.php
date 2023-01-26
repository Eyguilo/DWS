
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    function test_alta_usuario(){
        $u = new UsuarioAccesoDatos();
        return $u->insertar('Aba','jugador','1234');
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'jugador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Aba','1234');
        return $perfil === $perfil_esperado;
    }

    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());