
<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    function test_alta_usuario() {
        $u = new UsuarioAccesoDatos();
        return $u->insertar('Roberto', 'Administrador', '12345');
    }

    function test_verificar_usuario_encontrado() {
        $perfil_esperado = 'Administrador';
        $u = new UsuarioAccesoDatos();
        $perfil = $u->verificar('Roberto','12345');
        return $perfil === $perfil_esperado;
    }

    var_dump(test_alta_usuario());
    var_dump(test_verificar_usuario_encontrado());