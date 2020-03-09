
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Tournaments Grid</h3>
            </div>
                <p>
                    <a href="tournament_create.php" class="btn btn-success">Create</a>
                    <a href="tournament_read.php" class="btn btn-success">Read</a>
                    <a href="tournament_update.php" class="btn btn-success">Update</a>
                    <a href="tournament_delete.php" class="btn btn-success">Delete</a>
                </p>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Tournament Name</th>
                      <th>Date</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Host of tournament</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   //$pdo = Database::connect();
                   $sql = 'SELECT * FROM tournaments ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['tr_name'] . '</td>';
                            echo '<td>'. $row['tr_date'] . '</td>';
                            echo '<td>'. $row['tr_address'] . '</td>';
                            echo '<td>'. $row['tr_city'] . '</td>';
                            echo '<td>'. $row['tr_state'] . '</td>';
                            echo '<td>'. $row['tr_host'] . '</td>';
                            echo '<td width=250>';
                                echo '<a class="btn" href="tournament_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="tournament_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="tournament_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   //Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>