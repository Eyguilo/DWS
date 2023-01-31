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

        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }

        require_once("../Negocio/torneosReglasNegocio.php");
        require_once("../Negocio/gestionTorneosReglasNegocio.php");

        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtener();
        

            
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <div class='cerrar'><a href='logOutVista.php'> Cerrar sesión </a></div>                        
                        <div class='bienvenido'><p>Bienvenido: ".$_SESSION['usuario']."</p></div>
                        <div class='crear'><a href='gestionTorneosVista.php?modo=crear'>Crear torneo</a></div>                                              
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
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $gestionBL = new GestionTorneosReglasNegocio();
                $id_torneo =  $gestionBL->borrar($_POST['id_torneo']);
                var_dump($id_torneo);
            }
            echo "
                                <tr>
                                    <td class='letras'>".$torneos->getID()."</td>
                                    <td class='letras'>".$torneos->getNOMBRE()."</td>
                                    <td class='letras'>".$torneos->getNUMJUGADORES()."</td>
                                    <td class='letras'>".$torneos->getFECHA()."</td>
                                    <td class='letras'>".$torneos->getESTADO()."</td>
                                    <td class='letras'>".$torneos->getCAMPEON()."</td>
                                    <td><a class='editar' href='gestionTorneosVista.php?modo=editar'>Editar</a></td>
                                    <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                                    <input type = 'hidden' name='id_torneo' value='".$torneos->getID()."'>   
                                    <td class='letras'><input id='boton' type = 'submit' value='Borrar'></td>
                                    </form>
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