<?php
    require ("../Negocio/resultadoPartidaReglasNegocio.php");

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $foo = new ResultadoPartidaReglasNegocio();
        $u = $foo->insertarPartida($_POST['idTorneo'], $_POST['idJugadorA'], $_POST['idJugadorB'], $_POST['fase']);
        header("Location: torneosVistaAdmin.php");
    }else{
        $idTorneo = $_GET['idTorneo'];
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

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Resultado de partida</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <select name='idJugadorA' id='jugador' required>
                                <option selected='true' disabled='disabled'>Jugador A</option>
                                <option value='1'>Charles Negro</option>
                                <option value='2'>Ylijendri Canas</option>
                                <option value='3'>Lerdian Ganu</option>
                                <option value='4'>Lucio Okolo</option>
                                <option value='5'> Jorge Agüila</option>
                                <option value='6'>Ghizermo Quesiii</option>
                                <option value='7'>Marai Motos</option>
                                <option value='8'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='idJugadorB' id='jugador' required>
                                <option selected='true' disabled='disabled'>Jugador B</option>
                                <option value='1'>Charles Negro</option>
                                <option value='2'>Ylijendri Canas</option>
                                <option value='3'>Lerdian Ganu</option>
                                <option value='4'>Lucio Okolo</option>
                                <option value='5'> Jorge Agüila</option>
                                <option value='6'>Ghizermo Quesiii</option>
                                <option value='7'>Marai Motos</option>
                                <option value='8'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='fase' id='jugador' required>
                                <option selected='true' disabled='disabled'>Fase</option>
                                <option value='Semifinales'>Semifinales</option>
                                <option value='Final'>Final</option>
                            </select>
                            <input type='hidden' value='".$idTorneo."' name='idTorneo'>
                            <input class='boton' onclick='mensajeErrorCrearPartidaVista.php' type = 'submit'>
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