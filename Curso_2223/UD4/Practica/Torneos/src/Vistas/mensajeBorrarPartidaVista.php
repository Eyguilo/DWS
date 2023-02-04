<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación borrado partida</title>
    <link rel="stylesheet" href="../../css/mensajeBorrarTorneoVista.css">
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }
        
        $idPartida = $_GET['idPartida'];
        $idTorneo = $_GET['idTorneo'];

        require_once("../Negocio/gestionTorneosReglasNegocio.php");

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $gestionBL = new GestionTorneosReglasNegocio();
            $id =  $gestionBL->borrarPartida($_POST['idPartida']);
            $direccion = "?modo=editar&idTorneo=".$_POST['idTorneo']."";
            header('Location: gestionTorneosVista.php'.$direccion);
        }

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Confirmación borrado de partida</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <input type = 'hidden' name = 'idPartida' value='".$idPartida."'>
                            <input type = 'hidden' name = 'idTorneo' value='".$idTorneo."'>
                            <input type = 'submit' value='Borrar'>
                        </form>
                        <a href='gestionTorneosVista.php?modo=editar&idTorneo=".$idTorneo."'>No borrar</a>";                                
        echo "      </div>
                </div>
            </div>";
    ?>
</body>
</html>