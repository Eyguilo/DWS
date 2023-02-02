
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    function test_alta_usuario() {
        $u = new UsuarioAccesoDatos();
        return $u->insertar('Ada', 'Administrador', '1234');
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'Administrador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Ada','1234');
        return $perfil === $perfil_esperado;
    }

    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());