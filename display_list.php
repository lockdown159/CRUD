<?php
//session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
# connect
$pdo = new PDO( 
    "mysql:host=".'localhost'.";"."dbname=".'id12249719_customers', 
    'id12249719_cis355', 
    'password'
);

# display link to "create" form
echo "<a href='display_create_form.php'>Create</a><br><br>";
# display all records
$sql = 'SELECT * FROM messages';
foreach ($pdo->query($sql) as $row) {
  $str = "";
  $str .= "<a href='display_read_form.php?id=" . $row['id'] . "'>Read</a> ";
  $str .= "<a href='display_update_form.php?id=" . $row['id'] . "'>Read</a> ";
  $str .= "<a href='display_delete_form.php?id=" . $row['id'] . "'>Read</a> ";
  $str .= ' (' . $row['id'] . ') ' . $row['message'];
  $str .=  '<br>';
  echo $str;
}
echo '<br />'; 