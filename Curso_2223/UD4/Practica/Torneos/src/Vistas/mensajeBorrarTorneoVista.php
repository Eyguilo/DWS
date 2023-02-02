<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación borrado torneo</title>
    <link rel="stylesheet" href="../../css/mensajeBorrarTorneoVista.css">
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }
        
        $idTorneo = $_GET['idTorneo'];

        require_once("../Negocio/torneosReglasNegocio.php");

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $torneosBL = new TorneosReglasNegocio();
            $id =  $torneosBL->borrarTorneo($_POST['idTorneo']);
            header('Location: torneosVistaAdmin.php');
        }

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Confirmación borrado de torneo</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <input type = 'hidden' name = 'idTorneo' value='".$idTorneo."'>
                            <input type = 'submit' value='Borrar'>
                        </form>
                        <a href='torneosVistaAdmin.php'>No borrar</a>";                                
        echo "      </div>
                </div>
            </div>";
    ?>
</body>
</html>