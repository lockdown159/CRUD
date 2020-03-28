<?php
# 1. connect to Database
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
//session_start();
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12249719_customers', 
    'id12249719_cis355', 
    'cis355'

# 2. assign user info to a variable
$l = $_POST['lname']; $f = $_POST['fname']; $p = $_POST['phone'];

# 3. assign MySQL quert code to a variable
$sql = "INSERT INTO customer (fname,lname,phone) VALUES ('$l','$f','$p')";


# 4. Inset the message into the database
$pdo >query($sql); #execute the query
echo "<p>Your info has been added</p><br>";
#echo "<a href ='display_list.php'>Back to list </a>";