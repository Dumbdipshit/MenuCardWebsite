<?php
    session_start();   
    include ("connect.php");
    if($_SESSION["logged-in"] == "false"){
        header("Location: acces-denied.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face</title>
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
        <form class="input-menu-items-forum" action="added-item-verwerken.php" method="post">
            <input placeholder="id" type="number" id="id" class="short-input" name="id">
            <input placeholder="name" type="text" autocomplete="off" id="name" class="short-input" name="naam">
            <input placeholder="price" type="number" min="0.00" max="10000.00" step="0.01" id="price" class="short-input" name="prijs">
            <textarea placeholder="description" type="text" autocomplete="off" id="description" class="large-input" name="omschrijving"></textarea>
            <input type="submit" value="confirm" class="short-input">
        </form>
    </body>
</body>
</html>