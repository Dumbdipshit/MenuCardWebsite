<?php
    session_start();   
    include ("connect.php");
    $_SESSION["logInError"] = "false";
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
    <!-- comment for website wows -->
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
        <form action="index.php" method="post">
            <input placeholder="Search" type="text" autocomplete="off" name="search">
        </form>

        <div>
            <div class="hidden-content">
                <?php
                    $db = $conn->prepare("
                        SELECT * FROM menuKaart 
                        WHERE naam  LIKE '%". $_POST["search"] ."%';
                    ");

                    $db->execute();
                    $result = $db->fetchAll();
                ?>
            </div>
            <div class="menu-item-container">
                <?php
                    for($i  = 0; $i < count($result); $i++){
                ?>
                <div class="flex-row">
                            <div class="flex-column">
                                <div><?php echo "id: ". $result[$i]["id"]; ?></div>
                                <div><?php echo "naam: ". $result[$i]["naam"]; ?></div>
                                <div><?php echo "prijs: ". $result[$i]["prijs"]; ?></div>
                                <div><?php echo "omschrijving: ". $result[$i]["omschrijving"]; ?></div>
                                <img class="food-image" src="assets/images/<?php echo $result[$i]['id'].".png";?>" alt="<?php echo $result[$i]['naam'];?>">
                            </div>
                            <div class="button-flex-column">
                                <form method="post" action="remove-item-verwerken.php">
                                    <input class="hidden-content" type="number" name="id" value="<?php echo $result[$i]["id"]; ?>">
                                    <input class="delete" type="submit" value="X">
                                </form>

                                <form method="post" action="update-item-page.php">
                                    <input class="hidden-content" type="number" name="id" value="<?php echo $result[$i]["id"]; ?>">
                                    <input class="update" type="submit" value="UP">
                                </form>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>

        </div>
    </body>
</body>
</html>