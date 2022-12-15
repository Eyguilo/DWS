<!DOCTYPE html>
<html lang='es'>
<head>
    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        require("ficha.php");

        $id_categoria = $_GET['id_categoria'];
        $id_pelicula = $_GET['id_pelicula'];        

        if($id_categoria == 1){
            $categoria = "terror";
        } else{
            $categoria = "anime";
        }

        echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='css/ficha_".$categoria.".css'>
        <title>Ficha</title>";

    ?>
</head>
<body>
    <?php

        $ficha1 = new Ficha();
        $ficha1->mostrarCabezera($id_categoria, $categoria);
        $ficha1->mostrarFicha($id_pelicula, $categoria);
    ?>
</body>
</html>