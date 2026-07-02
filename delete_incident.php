<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";

$id = $_GET["id"];

// ⚠️ intencional (sin protección)
$conexion->exec("DELETE FROM incidencias WHERE id=$id");

header("Location: incidents.php");
exit();