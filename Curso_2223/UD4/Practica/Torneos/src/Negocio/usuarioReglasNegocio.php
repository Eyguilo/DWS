<?php
    require("../Infraestructura/usuarioAccesoDatos.php");

    class UsuarioReglasNegocio {
        function __construct() {
        }
        function verificar($usuario, $clave) {
            if(strlen($clave) < 8){
                $res = "La contraseña tiene que ser almenos de 8 carácteres.";
                return $res;
            }else{
            $usuariosDAL = new UsuarioAccesoDatos();
            $res = $usuariosDAL->verificar($usuario,$clave);           
            return $res;
            }           
        }
    }

