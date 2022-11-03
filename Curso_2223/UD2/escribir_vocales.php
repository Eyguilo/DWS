<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <div><h1>Curso PHP </h1>
        <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);
        
            $frase = "el sapo no se lava el pie...";
            $vocales = array("a", "e", "i", "o", "u");
            
            function escribir_frase($frase, $vocales){
                
                $sinvocales = "";
                for($i = 0; $i < count($vocales); $i++){
                    $sentencia = str_replace($vocales, $vocales[$i], $frase);
                    $sinvocales = $sinvocales."<br>".$sentencia;
                }

                return $sinvocales;
            }

             echo escribir_frase($frase, $vocales);
        ?>
    </div>

                <!-- CÓDIGO CARLOS -->

            <br><br>
    <div> Curso de PHP - Práctica: canción infantil.</div>
<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);
    $palabras = ["el", "sapo", "no", "se","lava","el","pie."];
    $vocales = ["a", "e", "i", "o","u"];
?>


<?php
    function escribir($word,$vocal)
    {
        $length = strlen($word);
        for ($i=0; $i<$length;$i++)
            if (in_array($word[$i], array("a", "e", "i", "o","u")))
                echo $vocal;
            else
                echo $word[$i];
    }
?>

<?php
    echo "<div>";
    foreach ($palabras as $p)
        echo $p." ";
    echo "</div>";

    foreach ($vocales as $v)
    {   echo "<div>";
        foreach ($palabras as $p)
            echo escribir($p,$v)." ";
        echo "</div>";
    }
?>
    
</body>
</html>