<?php
    require ('../Negocio/gestionTorneosReglasNegocio.php');
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $gestionBL = new GestionTorneosReglasNegocio();
        $perfil =  $gestionBL->insertar($_POST['nombre'],$_POST['fecha'],$_POST['estado'],$_POST['ganador']);
        header('Location: torneosVistaAdmin.php');
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Insertar torneo</title>
    <?php
        $modo = $_GET['modo'];
        if($modo == 'crear'){
            echo "<link rel='stylesheet' href='../../css/gestionTorneosVistaCrear.css'>";
        } else{
            echo "<link rel='stylesheet' href='../../css/gestionTorneosVistaEditar.css'>";
        }
    ?>
</head>
<body>
    <?php
    if($modo == 'crear'){
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
                            <input type = 'submit'>
                        </form>";                    
                            if(isset($error)) {
                                print('<div class="pie">Completa los datos correctamente.</div>');
                            }                                  
        echo "      </div>
                </div>
            </div>";
    } else{
        require_once("../Negocio/gestionTorneosReglasNegocio.php");

        $gestionBL = new GestionTorneosReglasNegocio();
        $datosPartido = $gestionBL->crearPartido();
        echo "
            <div id='contenedor'>
                <div id='central'>
                    <div id='caja1'>
                        <div class='cerrar'><a href='logOutVista.php'> Cerrar sesión </a></div>                        
                        <div class='bienvenido'><p>Bienvenido: ".$_SESSION['usuario']."</p></div>
                        <div class='registro'><p>Número de registros: ".count($datosPartido)."</p></div>
                    </div>
                    <div id='caja2'>
                        <table class='default'>
                            <caption>Torneos de Tenis de Mesa</caption>
                            <thead>
                                <tr>
                                    <th>ID del Torneo</th>
                                    <th>Jugador A</th>
                                    <th>Jugador B</th>
                                    <th>Ronda</th>
                                    <th>Ganador</th>
                                </tr>
                            </thead>
                            <tbody>";
        foreach ($datosPartido as $partidos){
            var_dump($datosPartido);
            var_dump($partidos);
            $cont=0;
            echo "
                                <tr>
                                    <td class='letras'></td>
                                    <td class='letras'>".$partidos[$cont]->getNOMBRE()."</td>
                                    <td class='letras'>".$partidos[$cont + 1]->getNOMBRE()."</td>
                                    <td class='letras'></td>
                                    <td class='letras'></td>
                                </tr>";
            $cont++;
        }
        echo "              </tbody>
                        </table>
                    </div>
                </div>
            </div>";
    }
    ?>    
</body>
</html>