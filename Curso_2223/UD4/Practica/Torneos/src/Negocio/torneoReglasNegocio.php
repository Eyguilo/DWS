<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("../Infraestructura/torneoAccesoDatos.php");

    class TorneoReglasNegocio {
        private $_ID;
        private $_NOMBRE;

        function __construct() {
        }

        function init($id) {
            $this->_ID = $id;
            $this->_NOMBRE = $nombre;
        }

        function getID() {
            return $this->_ID;
        }
        function getNOMBRE() {
            return $this->_NOMBRE;
        }

        function obtener() {
            $torneosDAL = new TorneoAccesoDatos();
            $results = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($results as $torneo) {
                $oTorneosReglasNegocio = new TorneosReglasNegocio();
                $oTorneosReglasNegocio->init($torneo['T_Jugador.id_jugador'], $torneo['T_Jugador.nombre']);
                array_push($listaTorneos,$oTorneosReglasNegocio);            
            }
            
            return $listaTorneos;
        }
    }