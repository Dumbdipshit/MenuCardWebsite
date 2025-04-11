<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include ("connect.php");

        $db = $conn->prepare('
            SELECT * FROM menuKaart WHERE id=' . $_POST["id"] . ' 
        ');

        $db->execute();

        $result = $db->fetchAll();
    ?>

    <div class="flex-column">
        <form class="input-menu-items-forum" action="update-item-verwerken.php" method="post">
            <input placeholder="name" type="text" autocomplete="off" id="name" class="short-input" name="naam" value="<?php echo $result[0]["naam"]; ?>">
            <input placeholder="price" type="number" min="0.00" max="10000.00" step="0.01" id="price" class="short-input" name="prijs" value="<?php echo $result[0]["prijs"]; ?>">
            <textarea placeholder="description" type="text" autocomplete="off" id="description" class="large-input" name="omschrijving" value=""><?php echo $result[0]["omschrijving"]; ?></textarea>
            <input class="remove-input" type="number" name="id" value="<?php echo $result[0]["id"]; ?>">
            <input class="update" type="submit" value="UP">
        </form>
        <img class="food-image"  src="images/<?php echo $result[0]['id'].".png";?>" alt="<?php echo $result[0]['naam'];?>">
    </div>


    
    <script src="script/functions.js"></script>
</body>
</html>