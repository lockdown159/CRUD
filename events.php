
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
                <h3>Events Grid</h3>
            </div>
                <p>
                    <a href="event_create.php" class="btn btn-success">Create</a>
                    <a href="event_read.php" class="btn btn-success">Read</a>
                    <a href="event_update.php" class="btn btn-success">Update</a>
                    <a href="event_delete.php" class="btn btn-success">Delete</a>
					<a href="tournaments.php" class="btn btn-success">Back to tournaments</a>
                </p>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Event Name</th>
                      <th>Age range</th>
                      <th>Belt Range</th>
                      <th>Date</th>
                      <th>Location</th>
                      <th>Time</th>
                      <th>Discription</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../database/database_pdo.php';
                   $sql = 'SELECT * FROM events ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['event_name'] . '</td>';
                            echo '<td>'. $row['age_range'] . '</td>';
                            echo '<td>'. $row['belt_range'] . '</td>';
                            echo '<td>'. $row['event_date'] . '</td>';
                            echo '<td>'. $row['event_location'] . '</td>';
                            echo '<td>'. $row['event_time'] . '</td>';
                            echo '<td>'. $row['event_dis'] . '</td>';
                            echo '<td width=250>';
                                echo '<a class="btn" href="event_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="event_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="event_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>