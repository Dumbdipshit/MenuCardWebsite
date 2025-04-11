<?php
    include ("connect.php");

    $db = $conn->prepare("
        DELETE FROM menuKaart WHERE id=" . $_POST['id'] . ";
    ");
    header("Location: edit-item.php");

    $db->execute();
?>