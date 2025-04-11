<?php
    include ("connect.php");

    $sql = "UPDATE menuKaart
            set id = :id, naam = :naam, prijs= :prijs, omschrijving= :omschrijving
            WHERE id = :id";

            $db = $conn->prepare($sql);
                $db->bindParam(":id", $_POST['id']);
                $db->bindParam(":naam", $_POST['naam']);
                $db->bindParam(":prijs", $_POST['prijs']);
                $db->bindParam(":omschrijving", $_POST['omschrijving']);
            $db->execute();
            header("Location: edit-item.php");
?>