<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Torneo</title>
    <link rel='stylesheet' href='../../css/torneoVista.css'>
</head>
<body>

    <?php

        require("../Negocio/torneoReglasNegocio.php");

        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        $torneoNombres = new TorneoReglasNegocio();
        $nombres = $torneoNombres->obtener();

        echo "
        <div class='contenedor'>
            <div class='caja1'><h1>Mundial de Tenis de Mesa</h1></div>
            <div class='caja2'>
                <div class='col1'></div>
                <div class='col2'>
                    <h2>CUARTOS</h2>";

        function imprimirCuartos(){

            $primero = 1;
            $segundo = 2;

            for ($i=0; $i < 4; $i++) {
                echo"<div class='parejasC'>
                    <div class='jugadorC'>Charles Negro</div>
                    <div class='jugadorC'>Ylijendri Canas</div>
                </div>";                
            }
            
        }
        echo "</div>";

        echo"
                <div class='col1'></div>
                <div class='col2'>
                    <h2>SIMIFINALES</h2>
                    <div class='parejasSF'>
                        <div class='jugadorSF'>Charles Negro</div>
                        <div class='jugadorSF'>Fernidio Mecagoendia</div>
                    </div>
                    <div class='parejasSF'>
                        <div class='jugadorSF'>Lucio Okolo</div>
                        <div class='jugadorSF'>Ghizermo Quesiii</div>
                    </div>
                </div>
                <div class='col1'></div>
                <div class='col2'>
                    <h2>FINAL</h2>
                    <div class='parejasF'>
                        <div class='jugadorF'>Charles Negro</div>
                        <div class='jugadorF'>Ghizermo Quesiii</div>
                    </div>
                </div>
                <div class='col1'></div>
                <div class='col2'>
                    <h2>CAMPEÓN</h2>
                    <div class='jugadorG'>Charles Negro</div>
                </div>
                <div class='col1'></div>
                <div class='imagen'></div>
            </div>
        </div>";
    ?>    
</body>
</html>