<?php

require_once "config.php";

try {

    $conexion = new PDO(
        "mysql:host=".DB_HOST.";port=3306;dbname=".DB_NAME.";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {

    die("Error de conexión: ".$e->getMessage());

}

?>
