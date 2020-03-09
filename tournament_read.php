<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: tournaments.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tournaments where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read Tournament Information</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Tournament Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_address'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_city'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_state'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Host</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tr_host'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="tournaments.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>