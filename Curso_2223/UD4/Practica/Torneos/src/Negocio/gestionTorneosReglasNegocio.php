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

        function obtener() {
            $torneosDAL = new GestionTorneosAccesoDatos();
            $results = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($results as $torneo) {
                $oTorneosReglasNegocio = new GestionTorneosReglasNegocio();
                $oTorneosReglasNegocio->init($torneo['id_jugador'], $torneo['nombre']);
                array_push($listaTorneos,$oTorneosReglasNegocio);            
            }
            
            return $listaTorneos;
        }
    }