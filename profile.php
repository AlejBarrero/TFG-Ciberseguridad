<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$nombre = $_SESSION["usuario"];
$rol = $_SESSION["rol"];
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Perfil de usuario</h2>

    <div class="card p-3">

        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Rol:</strong> <?php echo $rol; ?></p>

    </div>

</div>

</div>

<?php require_once "templates/footer.php"; ?>