<?php
     
    require '../database/database_pdo.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $ageError = null;
        $beltError = null;
        $dateError = null;
        $locationError = null;
        $timeError = null;
        $disError = null; 

        // keep track post values
        $name = $_POST['event_name'];
        $age = $_POST['age_range'];
        $belt = $_POST['belt_range'];
        $date = $_POST['event_date'];
        $location = $_POST['event_location'];
        $time = $_POST['event_time'];
        $dis = $_POST['event_dis'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter the events name';
            $valid = false;
        }
         
        if (empty($age)) {
            $ageError = 'Please enter the age range for the event';
            $valid = false;
        }

        if (empty($belt)) {
            $beltError = 'Please enter a belt level for the event';
            $valid = false;
        }

        if (empty($date)) {
            $dateError = 'Please enter the events date';
            $valid = false;
        }
         
        if (empty($location)) {
            $locationError = 'Please enter a location for the event';
            $valid = false;
        }
        
        if (empty($time)) {
            $timeError = 'Please enter the time for the event';
            $valid = false;
        }

        if (empty($dis)) {
            $disError = 'Please enter the discription for the event';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO events (event_name,age_range,belt_range,event_date,event_location,event_time,event_dis) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$age,$belt,$date,$location,$time,$dis));
            header("Location: events.php");
        }
    } else {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM events where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $_POST['event_name'];
        $age = $_POST['age_range'];
        $belt = $_POST['belt_range'];
        $date = $_POST['event_date'];
        $location = $_POST['event_location'];
        $time = $_POST['event_time'];
        $dis = $_POST['event_dis'];
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
                        <h3>Create an Event</h3>
                    </div>
             
                    <form class="form-horizontal" action="event_update.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Event name</label>
                        <div class="controls">
                            <input name="event_name" type="text"  placeholder="Board breaking" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ageError)?'error':'';?>">
                        <label class="control-label">Age Range</label>
                        <div class="controls">
                            <input name="age_range" type="text"  placeholder="5-8" value="<?php echo !empty($age)?$age:'';?>">
                            <?php if (!empty($ageError)): ?>
                                <span class="help-inline"><?php echo $ageError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($beltError)?'error':'';?>">
                        <label class="control-label">Belt level</label>
                        <div class="controls">
                            <input name="belt_range" type="text"  placeholder="Black belt" value="<?php echo !empty($belt)?$belt:'';?>">
                            <?php if (!empty($beltError)): ?>
                                <span class="help-inline"><?php echo $beltError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <input name="event_date" type="date" placeholder="01/01/2020" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($locationError)?'error':'';?>">
                        <label class="control-label">Location</label>
                        <div class="controls">
                            <input name="event_location" type="text"  placeholder="Main gym floor" value="<?php echo !empty($location)?$location:'';?>">
                            <?php if (!empty($locationError)): ?>
                                <span class="help-inline"><?php echo $locationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($timeError)?'error':'';?>">
                        <label class="control-label">Time of event</label>
                        <div class="controls">
                            <input name="event_time" type="text"  placeholder="1:00pm " value="<?php echo !empty($time)?$time:'';?>">
                            <?php if (!empty($timeError)): ?>
                                <span class="help-inline"><?php echo $timeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($disError)?'error':'';?>">
                        <label class="control-label">Discription</label>
                        <div class="controls">
                            <input name="event_dis" type="text"  placeholder="Breaking boards is judged by creativity aand amount broken " value="<?php echo !empty($dis)?$dis:'';?>">
                            <?php if (!empty($disError)): ?>
                                <span class="help-inline"><?php echo $disError;?></span>
                            <?php endif;?>
                        </div>
                      </div>                 
    </div> <!-- /container -->
  </body>
</html>