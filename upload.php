<?php
require_once "config/session.php";
require_once "config/auth.php";
require_once "templates/header.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $file = $_FILES["archivo"]["name"];
    $tmp = $_FILES["archivo"]["tmp_name"];

    // ⚠️ intencional (sin validación para TFG)
    move_uploaded_file($tmp, "uploads/".$file);

    $_SESSION["success"] = "Archivo subido";
    header("Location: upload.php");
    exit();
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Subir evidencia</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="archivo" class="form-control mb-2">

        <button class="btn btn-primary">Subir</button>

    </form>

</div>

</div>

<?php require_once "templates/footer.php"; ?>