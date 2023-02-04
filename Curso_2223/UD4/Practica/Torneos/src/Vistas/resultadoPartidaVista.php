<?php
    require ("../Negocio/resultadoPartidaReglasNegocio.php");

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: loginVista.php");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $foo = new ResultadoPartidaReglasNegocio();
        $u = $foo->insertarPartida($_POST['idTorneo'], $_POST['idJugadorA'], $_POST['idJugadorB'], $_POST['fase']);
        $direccion = "?modo=editar&idTorneo=".$_POST['idTorneo']."";
        header("Location: gestionTorneosVista.php".$direccion);
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
                            <select name='idJugadorA' id='jugadorA' required>
                                <option value='1'>Charles Negro</option>
                                <option value='2'>Ylijendri Canas</option>
                                <option value='3'>Lerdian Ganu</option>
                                <option value='4'>Lucio Okolo</option>
                                <option value='5'> Jorge Agüila</option>
                                <option value='6'>Ghizermo Quesiii</option>
                                <option value='7'>Marai Motos</option>
                                <option value='8'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='idJugadorB' id='jugadorB' required>
                                <option value='1'>Charles Negro</option>
                                <option value='2'>Ylijendri Canas</option>
                                <option value='3'>Lerdian Ganu</option>
                                <option value='4'>Lucio Okolo</option>
                                <option value='5'> Jorge Agüila</option>
                                <option value='6'>Ghizermo Quesiii</option>
                                <option value='7'>Marai Motos</option>
                                <option value='8'>Fernidio Mecagoendia</option>
                            </select>
                            <select name='fase' id='fase' required>
                                <option value='Cuartos'>Cuartos</option>
                                <option value='Semifinales'>Semifinales</option>
                                <option value='Final'>Final</option>
                            </select>
                            <input type='hidden' value='".$idTorneo."' name='idTorneo'>
                            <input class='boton' type = 'submit'>
                        </form>
                        <a class='volver' href='gestionTorneosVista.php?modo=editar&idTorneo=".$idTorneo."'>Volver</a>";                                                  
        echo "      </div>
                </div>
            </div>";
    ?>    
</body>
</html>