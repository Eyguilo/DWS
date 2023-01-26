<?php
$mysqli = new mysqli('localhost', 'root', '1234', 'torneos_tenis_mesa');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}

//$stmt = $mysqli->prepare("INSERT INTO T_Usuario (usuario, clave) VALUES ( ?, ?)");
$stmt = $mysqli->prepare("SELECT usuario, clave, id_usuario FROM  T_Usuario WHERE id_usuario = ?;");
var_dump($stmt);
$stmt->bind_param('i', $numero);

$numero = 1;
$clave = '1234';


/* ejecuta sentencias prepradas */
$stmt->execute();

printf("%d Fila insertada.\n", $stmt->affected_rows);

/* cierra sentencia y conexión */
//$stmt->close();

/* Limpia la tabla CountryLanguage */
//$mysqli->query("DELETE FROM T_Usuario WHERE id_usario = 1");
//printf("%d Fila borrada.\n", $mysqli->affected_rows);

/* cierra la conexión */
//$mysqli->close();
?>