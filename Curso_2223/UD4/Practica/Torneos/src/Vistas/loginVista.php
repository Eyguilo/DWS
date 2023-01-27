<?php
    require ("../Negocio/usuarioReglasNegocio.php");

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $usuarioBL = new UsuarioReglasNegocio();
        $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

        if($perfil==="Administrador") {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location: torneosVistaAdmin.php");
        } elseif($perfil==="Jugador") {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location: torneosVistaJugador.php");
        } else{
            $error = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../../css/loginVista.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="inicio">
                <div class="titulo">Bienvenido</div>
                <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input id="usuario" name = "usuario" type = "text" placeholder="Usuario">
                    <input id = "clave" name = "clave" type = "password" placeholder="Contraseña">
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