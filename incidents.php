<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$incidencias = $conexion->query("SELECT * FROM incidencias ORDER BY fecha_creacion DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

    <?php include "templates/sidebar.php"; ?>

    <div class="container mt-4">

        <div class="d-flex justify-content-between">
            <h2>Incidencias</h2>
            <a href="create_incident.php" class="btn btn-primary">Nueva incidencia</a>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($incidencias as $i): ?>
                <tr>
                    <td><?php echo $i["id"]; ?></td>
                    <td><?php echo $i["titulo"]; ?></td>
                    <td><?php echo $i["prioridad"]; ?></td>
                    <td><?php echo $i["estado"]; ?></td>
                    <td>

                        <a href="incident.php?id=<?php echo $i['id']; ?>" class="btn btn-sm btn-info">Ver</a>

                        <a href="edit_incident.php?id=<?php echo $i['id']; ?>" class="btn btn-sm btn-warning">Editar</a>

                        <a href="delete_incident.php?id=<?php echo $i['id']; ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('¿Eliminar incidencia?')">
                           Eliminar
                        </a>

                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>

<?php require_once "templates/footer.php"; ?>