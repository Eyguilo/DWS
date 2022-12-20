<!DOCTYPE html>
<html lang='es'>
<head>
    <?php

        ini_set('display_errors',0);
        ini_set('html_errors', 0 );

        require("pelicula.php");

        $id_categoria = $_GET['id_categoria'];

        if($id_categoria == 1){
            $categoria = "terror";
        }elseif($id_categoria == 2){
            $categoria = "anime";
        }

        echo "
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='css/peliculas_".$categoria.".css'>
            <title>Películas</title>";
    ?>
</head>
<body>
    <?php
    
        $ordenacion = $_GET['ordenacion'];
        $valor_ordenacion;

        switch ($ordenacion) {
            case 1:
                $valor_ordenacion = "ORDER BY votos ASC";
                break;
            case 2:
                $valor_ordenacion = "ORDER BY votos DESC";
                break;
            case 3:
                $valor_ordenacion = "ORDER BY titulo ASC";
                break;
            case 4:
                $valor_ordenacion = "ORDER BY titulo DESC";
                break;
            default:
                $valor_ordenacion = "";
                break;
        }

        $pelicula = new Pelicula();
        $pelicula->pintar_cabezera($categoria, $id_categoria);
        $pelicula->pintar($id_categoria, $categoria, $valor_ordenacion);

        echo "</div>";
    ?>      
</body>
</html>