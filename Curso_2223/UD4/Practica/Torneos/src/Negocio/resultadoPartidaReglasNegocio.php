<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/resultadoPartidaAccesoDatos.php");

    class ResultadoPartidaReglasNegocio {

        function __construct() {
        }

        function insertarPartida($idTorneo, $idJugadorA, $idJugadorB, $fase, $idGanador){
            $foo = new ResultadoPartidaAccesoDatos();
            $u = $foo->insertarPartida($idTorneo, $idJugadorA, $idJugadorB, $fase, $idGanador);
            return $u;
        }
    }