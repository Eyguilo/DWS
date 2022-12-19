<!DOCTYPE html>
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

        require("categoria.php");

        echo "
        
            <div class='lines'>
                <div class='line'>::after</div>
                <div class='line'>::after</div>
                <div class='line'>::after</div>
                ";
        

        $categoria1 = new Categoria();
        $categoria1->pintarCabezera();
        $categoria1->pintar();

        echo "</div>";

    ?>  
</body>
</html>