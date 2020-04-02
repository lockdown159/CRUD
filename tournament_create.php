<?php
    require '../database/database_pdo.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $dateError = null;
        $addressaddressError = null;
        $cityError = null;
        $stateError = null;
        $hostError = null; 

        // keep track post values
        $name = $_POST['tr_name'];
        $date = $_POST['tr_date'];
        $address = $_POST['tr_address'];
        $city = $_POST['tr_city'];
        $state = $_POST['tr_state'];
        $host = $_POST['tr_host'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Tournament name';
            $valid = false;
        }
         
        if (empty($date)) {
            $dateError = 'Please enter the tournaments date';
            $valid = false;
        }
         
        if (empty($address)) {
            $addressError = 'Please enter an address for the tournament';
            $valid = false;
        }
        
        if (empty($city)) {
            $cityError = 'Please enter the city the tournament is located in';
            $valid = false;
        }

        if (empty($state)) {
            $stateError = 'Please enter the state the tournament is located in';
            $valid = false;
        }

        if (empty($host)) {
            $hostError = 'Please enter a host of the tournament';
            $valid = false;
        }

        // insert data
			echo $valid;
        if ($valid==true) {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tournaments (tr_name,tr_date,tr_address,tr_city,tr_state,tr_host) VALUES (?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$date,$address,$city,$state,$host));
			print_r($pdo->errorInfo());
            header("Location: tournaments.php");
        }
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
                        <h3>Create a Tournament</h3>
                    </div>
             
                    <form class="form-horizontal" action="tournament_create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Tournament name</label>
                        <div class="controls">
                            <input name="tr_name" type="text"  placeholder="Tournament name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <input name="tr_date" type="date" placeholder="01/01/2020" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="tr_address" type="text"  placeholder="1234 Tournament Ave." value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <input name="tr_city" type="text"  placeholder="Saginaw " value="<?php echo !empty($city)?$city:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($hostError)?'error':'';?>">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <input name="tr_state" type="text"  placeholder="Michigan " value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($hostError)?'error':'';?>">
                        <label class="control-label">Host</label>
                        <div class="controls">
                            <input name="tr_host" type="text"  placeholder="Gold Medal Martial Arts " value="<?php echo !empty($host)?$host:'';?>">
                            <?php if (!empty($hostError)): ?>
                                <span class="help-inline"><?php echo $hostError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="tournaments.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>