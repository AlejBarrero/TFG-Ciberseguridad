<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rol = $_POST["rol"];

    // ⚠️ intencional (sin hash para TFG)
    $sql = "INSERT INTO usuarios (nombre,email,password,rol)
            VALUES ('$nombre','$email','$password','$rol')";

    $conexion->exec($sql);

    header("Location: users.php");
    exit();
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Crear usuario</h2>

    <form method="POST">

        <input name="nombre" class="form-control mb-2" placeholder="Nombre">
        <input name="email" class="form-control mb-2" placeholder="Email">
        <input name="password" class="form-control mb-2" placeholder="Password">

        <select name="rol" class="form-control mb-2">
            <option>Usuario</option>
            <option>Analista</option>
            <option>Administrador</option>
        </select>

        <button class="btn btn-success">Crear</button>

    </form>

</div>

</div>

<?php require_once "templates/footer.php"; ?>