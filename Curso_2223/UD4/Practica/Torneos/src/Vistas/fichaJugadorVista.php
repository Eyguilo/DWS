<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ficha Jugador</title>    
    <link rel='stylesheet' href='../../css/fichaJugadorVista.css'>    
</head>
<body>
    <?php
        $idJugador = $_GET['idJugador'];
        $idTorneo = $_GET['idTorneo'];

        require_once('../Negocio/fichaJugadorReglasNegocio.php');
        $fichaBL1 = new FichaJugadorReglasNegocio();
        $totalPartidos = $fichaBL1->totalPartidos($idJugador);

        $fichaBL2 = new FichaJugadorReglasNegocio();
        $totalPartidosGanados = $fichaBL2->totalPartidosGanados($idJugador);
        $porcentajeVictorias = $totalPartidosGanados[0][0]/$totalPartidos[0][1]*100;

        $fichaBL3 = new FichaJugadorReglasNegocio();
        $totalTorneos = $fichaBL3->totalTorneos();

        $fichaBL4 = new FichaJugadorReglasNegocio();
        $totalTorneosGanados = $fichaBL4->totalTorneosGanados($idJugador);

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Jugador/a  con el ID ".$idJugador."</div>
                        <p id='datos'>Nombre: ".$totalPartidos[0][0]."</p>
                        <p id='datos'>Total de partidos jugados: ".$totalPartidos[0][1]."</p>
                        <p id='datos'>Partidos ganados: ".$totalPartidosGanados[0][0]."</p>
                        <p id='datos'>Porcentaje de victorias: ".round($porcentajeVictorias, 2)."%</p>
                        <p id='datos'>Total torneos jugados: ".$totalTorneos[0][0]."</p>
                        <p id='datos'>Torneos ganados: ".$totalTorneosGanados[0][0]."</p>
                        <a class='volver' href='torneoVista.php?idTorneo=".$idTorneo."'>Volver</a>                                
                    </div>
                </div>
            </div>";
    
    ?>    
</body>
</html>