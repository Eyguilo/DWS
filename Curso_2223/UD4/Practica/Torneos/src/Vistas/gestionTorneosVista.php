<?php
    require_once('../Negocio/gestionTorneosReglasNegocio.php');

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $gestionBL = new GestionTorneosReglasNegocio();
        $datosTorneo =  $gestionBL->insertarTorneo($_POST['nombre'],$_POST['fecha'],$_POST['estado']);
        $idUltimo = $gestionBL->obtenerUltimoIdTorneo();
        $insertarPartidosCuartos = $gestionBL->insertarPartidosCuartos($idUltimo[0][0]);
        header('Location: torneosVistaAdmin.php');
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Insertar torneo</title>
    <?php
        $modo = $_GET['modo'];
        if($modo == 'crear'){
            echo "<link rel='stylesheet' href='../../css/gestionTorneosVistaCrear.css'>";
        } else{
            echo "<link rel='stylesheet' href='../../css/gestionTorneosVistaEditar.css'>";
        }
    ?>
</head>
<body>
    <?php
    if($modo == 'crear'){
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Creación de torneo</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <input id='nombre' name = 'nombre' type = 'text' placeholder='Nombre' required='required'>
                            <label for='fecha'>Seleccione una fecha:</label>
                            <input id = 'fecha' name = 'fecha' type = 'date' required='required'>
                            <input value='En curso' id = 'estado' name = 'estado' type = 'hidden' required='required'>
                            <input class='boton' type = 'submit'>
                        </form>
                        <a class='volver' href='torneosVistaAdmin.php'>Volver</a>";                                                   
        echo "      </div>
                </div>
            </div>";
    } else{
        $idTorneo = $_GET['idTorneo'];
        $gestionBL1 = new GestionTorneosReglasNegocio();
        $datosPartidos =  $gestionBL1->seleccionarPartidos($idTorneo);
        $gestionBL2 = new GestionTorneosReglasNegocio();
        $o = $gestionBL2->obtenerNombreTorneo($idTorneo);
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <div class='cerrar'><a href='logOutVista.php'>Cerrar sesión</a></div>                        
                        <div class='bienvenido'><p>Bienvenido: ".$_SESSION['usuario']."</p></div>
                        <div class='volver'><a href='torneosVistaAdmin.php'>Volver</a></div>
                        <div class='registro'><p>Número de registros: ".count($datosPartidos)."</p></div>";
                        if(count($datosPartidos) < 7){
                         echo "<div class='crear'><a href='resultadoPartidaVista.php?idTorneo=".$idTorneo."'>Nueva partida</a></div>";
                        }
        echo "
                    </div>
                    <div id='caja2'>
                        <table class='default'>
                            <caption>".$o[0][0]." Torneo de Tenis de Mesa</caption>
                            <thead>
                                <tr>
                                    <th>ID del Torneo</th>
                                    <th>ID del Partido</th>
                                    <th>Jugador A</th>
                                    <th>Jugador B</th>
                                    <th>Ronda</th>
                                    <th>Ganador</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>";
        foreach ($datosPartidos as $partidos){
            echo "
                                <tr>
                                    <td class='letras'>".$idTorneo."</td>
                                    <td class='letras'>".$partidos[0]."</td>
                                    <td class='letras'>".$partidos[2]."</td>
                                    <td class='letras'>".$partidos[3]."</td>
                                    <td class='letras'>".$partidos[1]."</td>
                                    <td class='letras'>".$partidos[4]."</td>
                                    <td><a class='editar' href='editarPartidaVista.php?idTorneo=".$idTorneo."&idPartida=".$partidos[0]."'>Editar</a></td>
                                    <td><a class='editar' href='mensajeBorrarPartidaVista.php?idTorneo=".$idTorneo."&idPartida=".$partidos[0]."'>Borrar</a></td>
                                </tr>";
        }
        echo "              </tbody>
                        </table>
                    </div>
                </div>
            </div>";
    }
    ?>    
</body>
</html>