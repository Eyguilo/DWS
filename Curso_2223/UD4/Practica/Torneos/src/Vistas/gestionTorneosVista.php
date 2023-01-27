<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar torneo</title>
    <link rel="stylesheet" href="../../css/gestionTorneosVista.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="inicio">
                <div class="titulo">Creación de torneo</div>
                <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input id="usuario" name = "usuario" type = "text" placeholder="Nombre">
                    <input id = "fecha" name = "fecha" type = "date">
                    <select name="estado" id="estado">
                        <option selected="true" disabled="disabled">Seleccione el estado del torneo</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="enCurso">En curso</option>
                    <input type = "submit">
                </form> 
                <?php
                    if(isset($error)) {
                        print("<div class='pie'>No tienes acceso.</div>");
                    }
                ?>               
            </div>
        </div>
    </div>    
</body>
</html>