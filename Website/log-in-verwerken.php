<?php
    session_start();

    include ("connect.php");

    $db = $conn->prepare("
        SELECT * FROM user
    ");

    $db->execute();
    $result = $db->fetchAll();

    if($result[0]['username'] == $_POST["username"] && $result[0]['password'] == $_POST["password"]){
        $_SESSION["logInError"] = "false";
        header("Location: index.php");
    }else{
        $_SESSION["logInError"] = "true";
        header("Location: log-in.php");
    }
?>