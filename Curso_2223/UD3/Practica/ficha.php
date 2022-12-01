<!DOCTYPE html>
<html lang='es'>
<head>
    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        require("pelicula.php");

        echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='css/ficha_terror.css'>
        <title>Ficha: </title>";
    ?>
</head>
<body>
    <?php
            
        mostrarPelicula($peliculas);
    ?>
</body>
</html>