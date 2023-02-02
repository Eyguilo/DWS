<?php
    require ("../Negocio/usuarioReglasNegocio.php");
    $idTorneo = $_GET['idTorneo'];
    var_dump($_POST['idTorneo']);
    var_dump($_GET['idTorneo']);

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(($_POST['idJugadorA'] != null) && ($_POST['idJugadorB'] != null) && ($_POST['fase'] != null) && ($_POST['idGanador'] != null)){
            header("Location: torneosVistaAdmin.php");
        } else{
            $error = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Partida</title>
    <link rel="stylesheet" href="../../css/resultadoPartidaVista.css">
</head>
<body>
    <?php

        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Resultado de partida</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <select name='estado' id='jugador'>
                                <option selected='true' disabled='disabled'>Jugador A</option>
                                <option value='1' name='idJugadorA'>Charles Negro</option>
                                <option value='2' name='idJugadorA'>Ylijendri Canas</option>
                                <option value='3' name='idJugadorA'>Lerdian Ganu</option>
                                <option value='4' name='idJugadorA'>Lucio Okolo</option>
                                <option value='5' name='idJugadorA'> Jorge Agüila</option>
                                <option value='6' name='idJugadorA'>Ghizermo Quesiii</option>
                                <option value='7' name='idJugadorA'>Marai Motos</option>
                                <option value='8' name='idJugadorA'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='estado' id='jugador'>
                                <option selected='true' disabled='disabled'>Jugador B</option>
                                <option value='1' name='idJugadorB'>Charles Negro</option>
                                <option value='2' name='idJugadorB'>Ylijendri Canas</option>
                                <option value='3' name='idJugadorB'>Lerdian Ganu</option>
                                <option value='4' name='idJugadorB'>Lucio Okolo</option>
                                <option value='5' name='idJugadorB'> Jorge Agüila</option>
                                <option value='6' name='idJugadorB'>Ghizermo Quesiii</option>
                                <option value='7' name='idJugadorB'>Marai Motos</option>
                                <option value='8' name='idJugadorB'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='estado' id='jugador'>
                                <option selected='true' disabled='disabled'>Fase</option>
                                <option value='Semifinales' name='fase'>Semifinales</option>
                                <option value='Final' name='fase'>Final</option>
                            </select>
                            <select name='estado' id='jugador'>
                                <option selected='true' disabled='disabled'>Ganador</option>
                                <option value='1' name='idGanador'>Charles Negro</option>
                                <option value='2' name='idGanador'>Ylijendri Canas</option>
                                <option value='3' name='idGanador'>Lerdian Ganu</option>
                                <option value='4' name='idGanador'>Lucio Okolo</option>
                                <option value='5' name='idGanador'> Jorge Agüila</option>
                                <option value='6' name='idGanador'>Ghizermo Quesiii</option>
                                <option value='7' name='idGanador'>Marai Motos</option>
                                <option value='8' name='idGanador'>Fernidio Mecagoendia</option>
                            </select>
                            <input type='hidden' value='".$idTorneo."' name='idTorneo'>
                            <input class='boton' type = 'submit'>
                        </form>
                        <a class='volver' href='gestionTorneosVista.php?modo=editar&idTorneo=".$idTorneo."'>Volver</a>";
                        if(isset($error)){
                            print("<div class='pie'>Introduce los datos correctamente.</div>");
                        }                                                    
        echo "      </div>
                </div>
            </div>";
    ?>    
</body>
</html>