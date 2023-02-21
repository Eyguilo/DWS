<?php
    require_once('../infraestructura/direccionIPAccesoDatos.php');
    class DireccionIPReglasNegocio{

        function __construct(){
        }

        function compararIP(){

            $direccionDAL1 = new DireccionIPAccesoDatos();
            $direcc = $direccionDAL1->obtenerDirecciones();
            $blocked = $direccionDAL2->obtenerDireccionesBloqueadas();

            foreach($direcc as $dir){
                if($dir == $blocked){
                    return true;
                }
            }

        }
    }