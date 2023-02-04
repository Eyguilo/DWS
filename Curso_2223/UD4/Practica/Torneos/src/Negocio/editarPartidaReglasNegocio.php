<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/editarPartidaAccesoDatos.php");

    class EditarPartidaReglasNegocio {

        function __construct() {
        }

        function modificarPartido($idPartida, $idTorneo, $fase, $idJugadorA, $idJugadorB, $idGanador){
            $editarDAL = new EditarPartidaAccesoDatos();
            $u = $editarDAL->insertarPartida($idPartida, $idTorneo, $fase, $idJugadorA, $idJugadorB, $idGanador);
            return $u;
        }
    }