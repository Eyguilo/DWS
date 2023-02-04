<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/fichaJugadorAccesoDatos.php");

    class FichaJugadorReglasNegocio {

        function __construct() {
        }

        function totalPartidos($idJugador){
            $fichaDAL = new FichaJugadorAccesoDatos();
            $u = $fichaDAL->totalPartidos($idJugador);
            return $u;
        }

        function totalPartidosGanados($idJugador){
            $fichaDAL = new FichaJugadorAccesoDatos();
            $u = $fichaDAL->totalPartidosGanados($idJugador);
            return $u;
        }

        function totalTorneos(){
            $fichaDAL = new FichaJugadorAccesoDatos();
            $u = $fichaDAL->totalTorneos();
            return $u;
        }
    }
    