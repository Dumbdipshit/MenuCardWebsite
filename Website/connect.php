<?php
    $servername = "db";
    $username = "user";
    $password = "password";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mydatabase", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOEXCEPTION $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>