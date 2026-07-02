<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$usuarios = $conexion->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Usuarios</h2>

    <a href="create_user.php" class="btn btn-primary mb-3">Nuevo usuario</a>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>

        <?php foreach($usuarios as $u): ?>
        <tr>
            <td><?php echo $u["id"]; ?></td>
            <td><?php echo $u["nombre"]; ?></td>
            <td><?php echo $u["email"]; ?></td>
            <td><?php echo $u["rol"]; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>

</div>

<?php require_once "templates/footer.php"; ?>