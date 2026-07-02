<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "templates/header.php";
require_once "config/auth.php";

// Contadores
$total = $conexion->query("SELECT COUNT(*) FROM incidencias")->fetchColumn();
$abiertas = $conexion->query("SELECT COUNT(*) FROM incidencias WHERE estado='Abierta'")->fetchColumn();
$cerradas = $conexion->query("SELECT COUNT(*) FROM incidencias WHERE estado='Cerrada'")->fetchColumn();

// Últimas incidencias
$incidencias = $conexion->query("SELECT * FROM incidencias ORDER BY fecha_creacion DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

    <?php include "templates/sidebar.php"; ?>

    <div class="container mt-4">

        <h2>Dashboard</h2>

        <div class="row mt-4">

            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total incidencias</h5>
                        <h2><?php echo $total; ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5>Abiertas</h5>
                        <h2><?php echo $abiertas; ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5>Cerradas</h5>
                        <h2><?php echo $cerradas; ?></h2>
                    </div>
                </div>
            </div>

        </div>

        <h4 class="mt-4">Últimas incidencias</h4>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Prioridad</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($incidencias as $i): ?>
                <tr>
                    <td><?php echo $i["id"]; ?></td>
                    <td><?php echo $i["titulo"]; ?></td>
                    <td><?php echo $i["estado"]; ?></td>
                    <td><?php echo $i["prioridad"]; ?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<?php require_once "templates/footer.php"; ?>