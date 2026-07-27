<?php
require_once "config/session.php";
require_once "config/database.php";

$error = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email    = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    // ✅ CORREGIDO: consulta parametrizada — elimina SQL Injection
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ✅ CORREGIDO: verificación segura con password_verify (compatible con password_hash/bcrypt)
    if($user && password_verify($password, $user["password"])){

        $_SESSION["usuario"] = $user["nombre"];
        $_SESSION["rol"]     = $user["rol"];

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Credenciales incorrectas";
    }
}

require_once "templates/header.php";
?>

<div class="container mt-5" style="max-width:400px;">

    <h3 class="mb-3">Login SecureDesk</h3>

    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Entrar</button>

    </form>

</div>

<?php require_once "templates/footer.php"; ?>
