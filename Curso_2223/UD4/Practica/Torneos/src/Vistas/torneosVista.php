<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require("../Negocio/torneosReglasNegocio.php");
        ini_set('display_errors', 'On');
        ini_set('html_errors', 1);

        $torneosNombres = new TorneosReglasNegocio();
        $datosTorneos = $torneosNombres->obtener();
        
        foreach ($datosTorneos as $torneos){
            var_dump($torneos->getID(), $torneos->getNOMBRE(),$torneos->getNUMJUGADORES(), $torneos->getFECHA(), $torneos->getESTADO(), $torneos->getCAMPEON());
            echo "<br><br><br>";
        }
    ?>        
</body>
</html>