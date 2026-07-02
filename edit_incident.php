<?php
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";
require_once "templates/header.php";

$id = $_GET["id"];

// ⚠️ intencional para TFG (sin preparación)
$incidencia = $conexion->query("SELECT * FROM incidencias WHERE id=$id")->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];
    $prioridad = $_POST["prioridad"];

    $sql = "UPDATE incidencias SET
            titulo='$titulo',
            descripcion='$descripcion',
            estado='$estado',
            prioridad='$prioridad'
            WHERE id=$id";

    $conexion->exec($sql);

    header("Location: incidents.php");
    exit();
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Editar incidencia</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" value="<?php echo $incidencia['titulo']; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"><?php echo $incidencia['descripcion']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option>Abierta</option>
                <option>En progreso</option>
                <option>Cerrada</option>
            </select>
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

        <button class="btn btn-primary">Guardar</button>

    </form>

</div>

</div>

<?php require_once "templates/footer.php"; ?>