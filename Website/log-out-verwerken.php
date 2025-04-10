<?php
    session_start();

    include ("connect.php");
    $_SESSION["user"] = "none";
    $_SESSION["logged-in"] = "false";
    header("Location: index.php");
?>