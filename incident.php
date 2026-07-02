<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$id = $_GET["id"];

// ⚠️ intencional (para análisis de vulnerabilidades en TFG)
$incidencia = $conexion->query("SELECT * FROM incidencias WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

    <?php include "templates/sidebar.php"; ?>

    <div class="container mt-4">

        <h2><?php echo $incidencia["titulo"]; ?></h2>

        <p><strong>Estado:</strong> <?php echo $incidencia["estado"]; ?></p>
        <p><strong>Prioridad:</strong> <?php echo $incidencia["prioridad"]; ?></p>

        <hr>

        <p><?php echo $incidencia["descripcion"]; ?></p>

    </div>

</div>

<?php require_once "templates/footer.php"; ?>