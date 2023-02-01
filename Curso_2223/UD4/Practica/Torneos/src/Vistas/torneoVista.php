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
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: loginVista.php");
        }
        require("../Negocio/torneoReglasNegocio.php");
        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        $torneoNombres = new TorneoReglasNegocio();
        $datosTorneo = $torneoNombres->obtener();

        echo "
        <div class='contenedor'>
            <div class='caja1'><h1>Mundial de Tenis de Mesa</h1></div>
            <div class='caja2'>
                <div class='col1'></div>
                <div class='col2'>
                    <h2>CUARTOS</h2>";

        $contador = 2;
        foreach ($datosTorneo as $torneo){
            while($contador == 2){
                echo "<div class='espacio'></div>";
                $contador = 0;
            }
            echo "<div class='jugadorC'>".$torneo->getNombre()."</div>";
            $contador++;            
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