<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos</title>
    <link rel="stylesheet" href="../../css/torneosVistaAdmin.css">
</head>
<body>
    <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        require_once("../Negocio/torneosReglasNegocio.php");

        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtenerTorneos();
                    
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <div class='cerrar'><a href='logOutVista.php'> Cerrar sesión </a></div>                        
                        <div class='bienvenido'><p>Bienvenido: ".$_SESSION['usuario']."</p></div>
                        <div class='crear'><a href='gestionTorneosVista.php?modo=crear&idTorneo=0'>Crear torneo</a></div>                                              
                        <div class='registro'><p>Número de registros: ".count($datosTorneos)."</p></div>
                    </div>
                    <div id='caja2'>
                        <table class='default'>
                            <caption>Torneos de Tenis de Mesa</caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Torneo</th>
                                    <th>Número de Jugadores</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Campeón</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>";
        foreach ($datosTorneos as $torneos){
            echo "
                                <tr>
                                    <td class='letras'>".$torneos->getID()."</td>
                                    <td class='letras'><a href='torneoVista.php?idTorneo=".$torneos->getID()."' class='enlaceTorneo'>".$torneos->getNOMBRE()."</a></td>
                                    <td class='letras'>".$torneos->getNUMJUGADORES()."</td>
                                    <td class='letras'>".$torneos->getFECHA()."</td>
                                    <td class='letras'>".$torneos->getESTADO()."</td>
                                    <td class='letras'>".$torneos->getCAMPEON()."</td>
                                    <td><a id='editar' href='gestionTorneosVista.php?modo=editar&idTorneo=".$torneos->getID()."'>Editar</a></td>
                                    <td><a id='editar' href='mensajeBorrarTorneoVista.php?idTorneo=".$torneos->getID()."'>Borrar</a></td>
                                </tr>";
        }
        echo "              </tbody>
                        </table>
                    </div>
                </div>
            </div>";
    ?>
</body>
</html>