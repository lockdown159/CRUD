<?php
$servername = "10.8.30.49";
$username = "355wi20";
$password = "0000";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=rspena355wi20", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>