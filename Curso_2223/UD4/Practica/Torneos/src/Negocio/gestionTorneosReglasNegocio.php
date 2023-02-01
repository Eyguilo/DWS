<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/gestionTorneosAccesoDatos.php");
    
    class GestionTorneosReglasNegocio {
        private $_ID;

        function __construct() {
        }

        function init($id) {
            $this->_ID = $id;
        }

        function getID() {
            return $this->_ID;
        }

        function insertarTorneo($nombre, $fecha, $estado, $ganador) {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->insertarTorneo($nombre,$fecha, $estado, $ganador);           
            return $res;            
        }

        function obtenerId() {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->obtenerId();
            return $res;            
        }

        function borrar($idTorneo){            
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->borrar($idTorneo);           
            return $res;
        }

        function crearPartidoCuartos($idTorneo){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->crearPartido();
            shuffle($res);
            $arrayPartidos = [];
            $listaJugadores =  array();

            foreach ($res as $jugador) {
                $oGestionReglasNegocio = new GestionTorneosReglasNegocio();
                $oGestionReglasNegocio->init($jugador['id_jugador']);
                array_push($listaJugadores,$oGestionReglasNegocio);
            }

            for ($i=0; $i < 8; $i++) { 
                $arrayPartidos[$i] = $listaJugadores[$i];
            }

            $res1 = [$idTorneo, 'Cuartos', $arrayPartidos[0], $arrayPartidos[1]];
            $res2 = [$idTorneo, 'Cuartos', $arrayPartidos[2], $arrayPartidos[3]];
            $res3 = [$idTorneo, 'Cuartos', $arrayPartidos[4], $arrayPartidos[5]];
            $res4 = [$idTorneo, 'Cuartos', $arrayPartidos[6], $arrayPartidos[7]];
            
            $result = [$res1, $res2, $res3, $res4];
            $resultFinal = $gestionDAL->insertarPartidoCuartos($result);

            return $resultadoFinal;
        }
    }