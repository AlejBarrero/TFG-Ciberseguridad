<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$resultados = [];

if(isset($_GET["q"])){

    $q = $_GET["q"];

    // ⚠️ intencional (vulnerable para TFG)
    $sql = "SELECT * FROM incidencias WHERE titulo LIKE '%$q%'";

    $resultados = $conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Buscar incidencias</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
    </form>

    <?php foreach($resultados as $r): ?>
        <div class="border p-2 mb-2">
            <strong><?php echo $r["titulo"]; ?></strong>
            <p><?php echo $r["descripcion"]; ?></p>
        </div>
    <?php endforeach; ?>

</div>

</div>

<?php require_once "templates/footer.php"; ?>