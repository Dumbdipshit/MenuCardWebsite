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
            <a href="log-in.php" class="page">log in</a><!-- remove if user is logged in-->
            <a href="admin.php" class="page">admin</a> <!-- remove if not logged in as admin -->
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
                <div class="menu-item-info">
                    <div>
                        <div><?php echo $result[$i]['naam'];?></div>
                        <div><?php echo $result[$i]['prijs'];?></div>
                    </div>
                    
                    <img class="food-image" src="assets/images/<?php echo $result[$i]['id'].".png";?>" alt="<?php echo $result[$i]['naam'];?>">
                </div>
                <?php
                    }
                ?>
            </div>

        </div>
    </body>
</body>
</html>