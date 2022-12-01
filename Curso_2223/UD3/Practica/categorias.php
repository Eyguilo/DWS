<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/categorias.css'>    
    <title>Categorías</title>
</head>
<body>

<?php
    echo"
    <div class='contenedor'>
        <div class='caja_uno'><h1>Categorías</h1></div>
        <div class='caja_dos'>
            <div class='columna_uno'>
                <div class='caja_imagen'>
                    <a href='peliculas.php?id_categoria=1'>
                        <img src='imagenes/simbolo_terror.png' alt='simbolo_terror'>
                    <p>Terror</p></a>
                </div>
            </div>
            
            <div class='columna_dos'>
                <div class='caja_imagen'>
                    <a href='peliculas.php?id_categoria=2'>
                        <img src='imagenes/one_piece.png' alt='simbolo_anime'>
                        <p>Anime</p>
                    </a>
                </div>                
            </div>
        </div>
    </div>"
    ?>  
</body>
</html>