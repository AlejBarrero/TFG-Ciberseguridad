<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$resultados = [];

if(isset($_GET["q"])){

    $q = $_GET["q"];

    // CORREGIDO: consulta parametrizada — elimina SQL Injection
    $stmt = $conexion->prepare("SELECT * FROM incidencias WHERE titulo LIKE ?");
    $stmt->execute(["%$q%"]);

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <!-- CORREGIDO: htmlspecialchars elimina XSS reflejado -->
            <strong><?php echo htmlspecialchars($r["titulo"], ENT_QUOTES, "UTF-8"); ?></strong>
            <p><?php echo htmlspecialchars($r["descripcion"], ENT_QUOTES, "UTF-8"); ?></p>
        </div>
    <?php endforeach; ?>

</div>

</div>

<?php require_once "templates/footer.php"; ?>
