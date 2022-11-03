<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        $numero_entero = 5;

        try{
            echo $numero_entero/0;
        } catch(DivisionByZeroError $e){
            echo "ERROR: $e";
        }
    ?>
</body>
</html>