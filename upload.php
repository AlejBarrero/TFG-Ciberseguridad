<?php
require_once "config/session.php";
require_once "config/auth.php";
require_once "templates/header.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    // CORREGIDO: allowlist de extensiones permitidas
    $extensiones_permitidas = ["pdf", "png", "jpg", "jpeg", "docx"];

    // CORREGIDO: allowlist de tipos MIME permitidos
    $mime_permitidos = [
        "application/pdf",
        "image/png",
        "image/jpeg",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ];

    $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));

    // CORREGIDO: verificación del MIME real del fichero (no el declarado por el cliente)
    $mime = mime_content_type($_FILES["archivo"]["tmp_name"]);

    if(!in_array($extension, $extensiones_permitidas) || !in_array($mime, $mime_permitidos)){
        $_SESSION["error"] = "Tipo de fichero no permitido. Solo se aceptan: PDF, PNG, JPG, JPEG, DOCX.";
        header("Location: upload.php");
        exit();
    }

    // CORREGIDO: nombre aleatorio para evitar predicción de rutas y sobrescritura de ficheros
    $nombre_seguro = bin2hex(random_bytes(16)) . "." . $extension;

    move_uploaded_file($_FILES["archivo"]["tmp_name"], "uploads/" . $nombre_seguro);

    $_SESSION["success"] = "Archivo subido correctamente.";
    header("Location: upload.php");
    exit();
}
?>

<?php include "templates/navbar.php"; ?>

<div class="d-flex">

<?php include "templates/sidebar.php"; ?>

<div class="container mt-4">

    <h2>Subir evidencia</h2>

    <?php if(isset($_SESSION["error"])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION["error"], ENT_QUOTES, "UTF-8"); unset($_SESSION["error"]); ?></div>
    <?php endif; ?>

    <?php if(isset($_SESSION["success"])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION["success"], ENT_QUOTES, "UTF-8"); unset($_SESSION["success"]); ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="archivo" class="form-control mb-2"
               accept=".pdf,.png,.jpg,.jpeg,.docx">

        <small class="text-muted">Formatos permitidos: PDF, PNG, JPG, JPEG, DOCX</small>

        <br><br>

        <button class="btn btn-primary">Subir</button>

    </form>

</div>

</div>

<?php require_once "templates/footer.php"; ?>
