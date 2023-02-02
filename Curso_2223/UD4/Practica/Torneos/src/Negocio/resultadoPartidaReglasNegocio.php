<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/torneosAccesoDatos.php");

    class ResultadoPartidaReglasNegocio {

        function __construct() {
        }

        function obtener() {
            $torneosDAL = new TorneosAccesoDatos();
            $results = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($results as $torneos) {
                $oTorneosReglasNegocio = new TorneosReglasNegocio();
                $oTorneosReglasNegocio->init($torneos['id_torneo'], $torneos['nombre'], $torneos['num_jugadores'], $torneos['fecha'], $torneos['estado'], $torneos['campeon']);
                array_push($listaTorneos,$oTorneosReglasNegocio);            
            }
            
            return $listaTorneos;
        }
    }