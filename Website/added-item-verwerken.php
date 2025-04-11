<?php
        include ("connect.php");


        $sql = "INSERT INTO menuKaart (id, naam, prijs, omschrijving)
            VALUES (:id, :naam, :prijs, :omschrijving)";
                $db = $conn->prepare($sql);
                $db->bindParam(":id", $_POST['id']);
                $db->bindParam(":naam", $_POST['naam']);
                $db->bindParam(":prijs", $_POST['prijs']);
                $db->bindParam(":omschrijving", $_POST['omschrijving']);
                header("Location: index.php");

                $db->execute();
?>