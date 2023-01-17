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
                <form id="loginform">
                    <input type="text" name="usuario" placeholder="Usuario" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <button type="submit" title="Ingresar" name="Ingresar">Iniciar</button>
                </form>
                <div class="pie">
                    <a href="#">¿Perdiste tu contraseña?</a>
                    <a href="#">¿No tienes cuenta? Regístrate</a>
                </div>
            </div>
            <div class="inferior">
                <a href="#">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>