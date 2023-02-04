<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Torneo</title>
    <link rel='stylesheet' href='../../css/torneoVista.css'>
</head>
<body>

    <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }
        require("../Negocio/torneoReglasNegocio.php");
        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        $idTorneo = $_GET['idTorneo'];
        $torneoBL1 = new TorneoReglasNegocio();
        $torneoNombresC = $torneoBL1->obtenerCuartos($idTorneo);

        $torneoBL2 = new TorneoReglasNegocio();
        $torneoNombresSF = $torneoBL2->obtenerSemifinales($idTorneo);

        $torneoBL3 = new TorneoReglasNegocio();
        $torneoNombresF = $torneoBL3->obtenerFinal($idTorneo);

        $torneoBL4 = new TorneoReglasNegocio();
        $nombreTorneo = $torneoBL4->nombreTorneo($idTorneo);

        echo "
        <div class='contenedor'>
            <div id='central'>
                <div class='caja1'><h1>".$nombreTorneo[0][0]." Torneo de Tenis de Mesa</h1></div>
                <div id='enlace'><a href='torneosVistaAdmin.php'>Volver</a></div>                
                <div class='caja2'>
                    <div class='col2'>
                        <h2>CUARTOS</h2>
                        <div class='parejasC'>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[0][0]."'>".$torneoNombresC[0][1]."</a></div>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[0][2]."'>".$torneoNombresC[0][3]."</a></div>
                        </div>
                        <div class='parejasC'>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[1][0]."'>".$torneoNombresC[1][1]."</a></div>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[1][2]."'>".$torneoNombresC[1][3]."</a></div>
                        </div>
                        <div class='parejasC'>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[2][0]."'>".$torneoNombresC[2][1]."</a></div>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[2][2]."'>".$torneoNombresC[2][3]."</a></div>
                        </div>
                        <div class='parejasC'>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[3][0]."'>".$torneoNombresC[3][1]."</a></div>
                            <div class='jugadorC'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresC[3][2]."'>".$torneoNombresC[3][3]."</a></div>
                        </div>
                    </div>";

        if($torneoNombresSF != null){                                
            echo"   <div class='col2'>
                        <h2>SIMIFINALES</h2>
                        <div class='parejasSF'>
                            <div class='jugadorSF'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresSF[0][0]."'>".$torneoNombresSF[0][1]."</a></div>
                            <div class='jugadorSF'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresSF[0][2]."'>".$torneoNombresSF[0][3]."</a></div>
                        </div>
                        <div class='parejasSF'>
                            <div class='jugadorSF'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresSF[1][0]."'>".$torneoNombresSF[1][1]."</a></div>
                            <div class='jugadorSF'><a href='fichaJugador.php?idTorneo=".$idTorneo."&idJugador=".$torneoNombresSF[1][2]."'>".$torneoNombresSF[1][3]."</a></div>
                        </div>
                    </div>";
        }
        if($torneoNombresF != null){
            echo"   <div class='col2'>
                        <h2>FINAL</h2>
                        <div class='parejasF'>
                            <div class='jugadorF'>".$torneoNombresF[0][1]."</div>
                            <div class='jugadorF'>".$torneoNombresF[0][3]."</div>
                        </div>
                    </div>";
        }
        echo"       <div class='col2'>
                        <h2>CAMPEÓN</h2>
                        <div class='jugadorG'></div>
                    </div>
                </div>
            </div>
        </div>";
    ?>    
</body>
</html>