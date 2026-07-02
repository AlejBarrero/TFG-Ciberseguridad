<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $prioridad = $_POST["prioridad"];
    $usuario = 1; // simplificado para TFG

    // ⚠️ intencional (sin validación avanzada)
    $sql = "INSERT INTO incidencias (titulo, descripcion, prioridad, estado, usuario_id)
            VALUES ('$titulo', '$descripcion', '$prioridad', 'Abierta', $usuario)";

    $conexion->exec($sql);

    header("Location: incidents.php");
    exit();
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Nueva incidencia</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Prioridad</label>
            <select name="prioridad" class="form-control">
                <option>Baja</option>
                <option>Media</option>
                <option>Alta</option>
                <option>Crítica</option>
            </select>
        </div>

        <button class="btn btn-success">Crear</button>

    </form>

</div>

</div>

<?php require_once "templates/footer.php"; ?>