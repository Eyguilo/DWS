<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/gestionTorneosAccesoDatos.php");
    
    class GestionTorneosReglasNegocio {
        private $_ID;
        private $_NOMBRE;

        function __construct() {
        }

        function init($id, $nombre) {
            $this->_ID = $id;
            $this->_NOMBRE = $nombre;
        }

        function getID() {
            return $this->_ID;
        }
        function getNOMBRE() {
            return $this->_NOMBRE;
        }

        function insertar($nombre, $fecha, $estado, $ganador) {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->insertar($nombre,$fecha, $estado, $ganador);           
            return $res;            
        }

        function borrar($idTorneo){            
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->borrar($idTorneo);           
            return $res;
        }

        function crearPartido(){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->crearPartido();
            shuffle($res);
            $arrayPartidos = [];
            $listaJugadores =  array();

            foreach ($res as $jugador) {
                $oGestionReglasNegocio = new GestionTorneosReglasNegocio();
                $oGestionReglasNegocio->init($jugador['id_jugador'], $jugador['nombre']);
                array_push($listaJugadores,$oGestionReglasNegocio);
            }

            for ($i=0; $i < 4; $i++) { 
                $arrayPartidos[$i] = [$jugadorA = $res[$i*2], $jugadorB = $res[$i*2+1]];
            }
            return $arrayPartidos;
        }

    }