<?php

require_once "session.php";

if(!isset($_SESSION["usuario"])){

    header("Location: login.php");

    exit();

}

?>