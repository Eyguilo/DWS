<?php
    require_once('../Negocio/gestionTorneosReglasNegocio.php');

    $idTorneo = $_GET['idTorneo'];

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $gestionBL = new GestionTorneosReglasNegocio();
        $datosTorneo =  $gestionBL->insertar($_POST['nombre'],$_POST['fecha'],$_POST['estado'],$_POST['ganador']);
        $insetarPartido = $gestionBL->crearPartidoCuartos($idTorneo);
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
                            <input id='nombre' name = 'nombre' type = 'text' placeholder='Nombre'>
                            <input id = 'fecha' name = 'fecha' type = 'date'>
                            <select name='estado' id='estado'>
                                <option selected='true' disabled='disabled'>Seleccione el estado del torneo</option>
                                <option value='Finalizado'>Finalizado</option>
                                <option value='En curso'>En curso</option>
                            </select>
                            <input type='text' name='ganador' id='ganador' placeholder='Nombre del ganador'>
                            <input class='boton' type = 'submit'>
                        </form>
                        <a class='volver' href='torneosVistaAdmin.php'>Volver</a>";                    
                            if(isset($error)) {
                                print('<div class="pie">Completa los datos correctamente.</div>');
                            }                                  
        echo "      </div>
                </div>
            </div>";
    } else{

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <div class='cerrar'><a href='logOutVista.php'>Cerrar sesión</a></div>                        
                        <div class='bienvenido'><p>Bienvenido: ".$_SESSION['usuario']."</p></div>
                        <div class='volver'><a href='torneosVistaAdmin.php'>Volver</a></div>
                        <div class='registro'><p>Número de registros: </p></div>
                        <div class='crear'><a href='resultadoPartida.php?idTorneo=".$idTorneo."'>Nueva partida</a></div>
                        </div>
                    <div id='caja2'>
                        <table class='default'>
                            <caption>Torneos de Tenis de Mesa</caption>
                            <thead>
                                <tr>
                                    <th>ID del Torneo</th>
                                    <th>Jugador A</th>
                                    <th>Jugador B</th>
                                    <th>Ronda</th>
                                    <th>Ganador</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>";
        //foreach ($datosPartido as $partidos){
            echo "
                                <tr>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'>Cuartos</td>
                                    <td class='letras'></td>
                                    <td><a class='editar' href='gestionTorneosVista.php?modo=editar'>Editar</a></td>
                                    <td><a class='editar' href='mensajeBorrarTorneoVista.php'>Borrar</a></td>
                                </tr>";
        //}
        echo "
                                <tr>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'>Semifinales</td>
                                    <td class='letras'></td>
                                    <td><a class='editar' href='gestionTorneosVista.php?modo=editar'>Editar</a></td>
                                    <td><a class='editar' href='mensajeBorrarTorneoVista.php'>Borrar</a></td>
                                </tr>
                                <tr>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'>Semifinales</td>
                                    <td class='letras'></td>
                                    <td><a class='editar' href='gestionTorneosVista.php?modo=editar'>Editar</a></td>
                                    <td><a class='editar' href='mensajeBorrarTorneoVista.php'>Borrar</a></td>
                                </tr>
                                <tr>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                    <td class='letras'>Final</td>
                                    <td class='letras'></td>
                                    <td><a class='editar' href='gestionTorneosVista.php?modo=editar'>Editar</a></td>
                                    <td><a class='editar' href='mensajeBorrarTorneoVista.php'>Borrar</a></td>
                                </tr>";
        echo "              </tbody>
                        </table>
                    </div>
                </div>
            </div>";
    }
    ?>    
</body>
</html>