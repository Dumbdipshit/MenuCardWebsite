<?php
    session_start();
    
    include ("connect.php");

    $db = $conn->prepare("
        DELETE FROM menuKaart WHERE id=" . $_POST['id'] . ";
    ");
    header("Location: index.php");

    $db->execute();
?>