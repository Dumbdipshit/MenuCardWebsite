<?php
    session_start();   
    include ("connect.php");
    $_SESSION["logInError"] = "false";
    if($_SESSION["logged-in"] == "false"){
        header("Location: acces-denied.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
        <div class="header-container-row">
            <h1 class="logo">food</h1>
            <a href="index.php" class="page">menu</a>
            <?php
                if($_SESSION["logged-in"] == "false"){
            ?>
                    <a href="log-in.php" class="page"><?php echo "log in"?></a>
                    <a href="admin.php" class="page"></a>
            <?php
                }else{
            ?>
                    <a href="log-out.php" class="page"><?php echo "log out"?></a>
                    <a href="admin.php" class="page"><?php echo "admin"?></a>
            <?php
                }
            ?>
        </div>
    </header>
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
            <img class="food-image"  src="assets/images/<?php echo $result[0]['id'].".png";?>" alt="<?php echo $result[0]['naam'];?>">
        </div>
    </body>
</body>
</html>