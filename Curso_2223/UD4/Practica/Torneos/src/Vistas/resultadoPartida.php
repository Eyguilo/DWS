<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Partida</title>
    <link rel="stylesheet" href="../../css/resultadoPartidaVista.css">
</head>
<body>
    <?php
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='inicio'>
                        <div class='titulo'>Creación de torneo</div>
                        <form method = 'POST' action = '".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <input id='nombre' name = 'nombre' type = 'text' placeholder='Nombre'>
                            <input id = 'fecha' name = 'fecha' type = 'date'>
                            <select name='estado' id='estado'>
                                <option selected='true' disabled='disabled'>Seleccione el estado del torneo</option>
                                <option value='Finalizado'>Finalizado</option>
                                <option value='En curso'>En curso</option>
                            </select>
                            <input type='text' name='ganador' id='ganador' placeholder='Nombre del ganador'>
                            <input class='boton' type = 'submit'>
                        </form>
                        <a class='volver' href='torneosVistaAdmin.php'>Atrás</a>";                    
                            if(isset($error)) {
                                print('<div class="pie">Completa los datos correctamente.</div>');
                            }                                  
        echo "      </div>
                </div>
            </div>";
    ?>    
</body>
</html>