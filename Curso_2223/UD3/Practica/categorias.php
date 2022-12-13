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

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        require("categoria.php");

        echo "
            <div class='lines'>
                <div class='line'>::after</div>
                <div class='line'>::after</div>
                <div class='line'>::after</div>";
        

        $categoria1 = new Categoria();
        $categoria1->mostrarCabezera();
        $categoria1->mostrarCategorias();

        echo "</div>";

    ?>  
</body>
</html>