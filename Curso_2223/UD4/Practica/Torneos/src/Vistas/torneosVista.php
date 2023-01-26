<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos</title>
    <link rel="stylesheet" href="../../css/torneosVista.css">
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['usuario']))
        {
            header("Location: login.php");
        }
    ?>

    <?php
        require("../Negocio/torneosReglasNegocio.php");
        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtener();        
            
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <p class='crear'>Crear torneo</p>
                        <p class='crear'>Número de registros: ".count($datosTorneos)."</p>
                    </div>
                    <div id='caja2'>
                        <table class='default'>
                            <caption>Torneos</caption>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Número de Jugadores</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Campeón</th>
                                <th></th>
                                <th></th>
                            </tr>";

        foreach ($datosTorneos as $torneos){
            echo "
                            <tr>
                                <td>".$torneos->getID()."</td>
                                <td class='letras'>".$torneos->getNOMBRE()."</td>
                                <td>".$torneos->getNUMJUGADORES()."</td>
                                <td>".$torneos->getFECHA()."</td>
                                <td class='letras'>".$torneos->getESTADO()."</td>
                                <td class='letras'>".$torneos->getCAMPEON()."</td>
                                <td>Editar</td>
                                <td>Borrar</td>
                            </tr>";
        }

        echo "          </table>
                    </div>
                </div>
            </div>";
    ?>
</body>
</html>