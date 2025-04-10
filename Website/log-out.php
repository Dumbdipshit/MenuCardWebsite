<?php
    session_start();   
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

    <p>Log out</p>
    <form action="log-out-verwerken.php" method="post">
        <input type="submit" value="Confirm">
    </form>
</body>
</html>