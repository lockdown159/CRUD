<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
//session_start();
include_once "../database/database.php";

function verify_user($db, $username, $password){
    $query= "SELECT hash, uuid FROM users WHERE username = ? LIMIT 1";
    if($statement =$db->prepare($query)){
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        if($statement->num_rows > 0){
            $statement->bind_result($hash, $uuid);
            $statement->fetch();
            if(password_verify($password, $hash)){
                $_SESSION["uuid"] = $uuid;
                $_SESSION["username"] = $username;
                return true;
            } else {
                return false;
            }
            $statement->close();
            return false;
        }
        return false;
    }
    return false;
}

if(isset($_POST["signin"])){
    if(!verify_user($db, $_POST["username"],$_POST["password"])){
        echo "Invalid username or password";
    } else {
        header("Location: ../CRUD/tournament.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h1>Sign Up</h1>
                    </div>
             
                    <form class="form-horizontal" action="tournaments.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Username</label>
                        <div class="controls">
                        <input type="text" placeholder="Zipedee" name ="username"/>
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                        <input type="password" placeholder="00000" name ="password"/>
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                      <button type="submit" name="signin">Sign Up</button>
                          <a href = "index.php">Home</a>
                        </div>
                    </form>
                </div>      
    </div> <!-- /container -->
  </body>
</html>