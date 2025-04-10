<?php
    session_start();

    include ("connect.php");
    $db = $conn->prepare("
        SELECT * FROM user
        WHERE username=:username AND password=:password;
    ");
    $db->bindParam(":username", $_POST['username']);
    $db->bindParam(":password", $_POST['password']);
    
    $db->execute();
    $result = $db->fetchAll();

    for($i  = 0; $i < count($result); $i++){
        $username = $result[$i]['username'];
        $password = $result[$i]['password'];
    }

    if($username == $_POST['username'] &&  $password == $_POST['password']){
        header("Location: index.php");
        $_SESSION["user"] = $_POST['username'];
        $_SESSION["logged-in"] = "true";
        $_SESSION["logInError"] = "false";
    }else{
        header("Location: log-in.php");
        $_SESSION["logInError"] = "true";
    }
?>