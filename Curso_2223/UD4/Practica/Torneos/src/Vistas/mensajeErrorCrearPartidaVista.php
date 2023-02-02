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

        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Introduce los datos correctamente</div>
                        <a href='torneosVistaAdmin.php'>Aceptar</a>";                              
        echo "      </div>
                </div>
            </div>";
    ?>
</body>
</html>