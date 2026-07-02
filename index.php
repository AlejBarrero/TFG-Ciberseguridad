<?php
require_once "config/session.php";

if(isset($_SESSION["usuario"])){
    header("Location: dashboard.php");
    exit();
}

header("Location: login.php");
exit();