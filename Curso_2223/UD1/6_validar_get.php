<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso PHP </div>

<div>
    <?php

      function obtenerParametro($parametro)
      {
        $result = "";
        if (!empty($_GET[$parametro]))
          $result = $_GET[$parametro];

        return $result;
 
      }
    ?>


    <?php
      ini_set('display_errors', 'On');
      ini_set('html_errors', 0);
          
      $variable_letra = obtenerParametro("letra");

      if ($variable_letra == "")
      {
        echo "Parámetro vacío.";
      }
      else
      {
        require("funciones_y_condiciones.php"); 

        $mensaje = 'La letra: '.$variable_letra;
        $mensaje_es_vocal = esVocal($variable_letra) ? ' es una vocal.' : ' no es una vocal.';
        echo $mensaje.$mensaje_es_vocal;
      }
    ?>
</div>

</body>
</html>