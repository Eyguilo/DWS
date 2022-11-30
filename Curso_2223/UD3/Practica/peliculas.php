<!DOCTYPE html>
<html lang='es'>
<head>
    <?php

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        require("pelicula.php");

        $estilo;
        $categoria = $_GET['categoria'];

        if($categoria == "terror"){
            $id_categoria = 1;
        }elseif($categoria == "anime"){
            $id_categoria = 2;
        }

        echo "
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='css/estilos_".$categoria.".css'>
            <title>Películas: ".$categoria."</title>";
    ?>
</head>
<body>
    <?php

        $pelicula = new Pelicula();
        $pelicula->mostrarCabezera($categoria);
        $pelicula->mostrarPelicula($id_categoria, $categoria);

        echo "</div>";

    ?>      
</body>
</html>