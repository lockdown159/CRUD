<?php
session_start();
include_once "../database/database.php";
$db = mysqli_connect("10.8.30.49", "rspena355wi20", "Kbjx475w15900", "rspena355wi20");

function validate_input($input, $length){
    if (isset($input)){
        if(!empty($input)){
            if(strlen($input)>=$length){
                return true;
            }
            return false;
        }
    }
    return false;
}

function is_valid_username($db, $username){
	/*
    $query = "SELECT uuid from users WHERE username = ? LIMIT 1";
    if ($statment = $db -> prepare($query)){
        $statment->bind_param("s",$username);
        $statment->execute();
        $results = $statment->get_result();
        $statment.close();
        if ($result->num_rows > 0) {
                return false;
        } else {
            return true;
        }
    return false;
    } 
	*/
	return true;
}

function signup_user($db,$username,$password){
    $query="INSERT INTO users (username, hash, uuid) VALUES (?,?,?)";
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $uuid = uuidv4();

    if($statement = $db->prepare($query)){
		$statement = $db->prepare($query);
				//var_dump($statement); exit();
        $statement->bind_param("sss",$username, $hash, $uuid);
        $statement->execute();
        $statement->close();

    }
}

$ERROR_USERNAME = false;

//Post check
if(isset($_POST["submit"])){
    $pass=true;
	
    if(validate_input($_POST["username"], 5)){
        if(!is_valid_username($db, $_POST["username"])){
            $pass=false;
            echo "Username already taken";
            $ERROR_USERNAME = true;
        }
    } else {
        $pass=false;
    }
    if(validate_input($_POST["password"], 5)){
        if($_POST["password"] !=$_POST["cpassword"]){
            $pass=false;
            echo "Invalid password enterd";
        }
    }else{
        $pass=false;
    }
    if($pass){
        //this code will create a new user
        signup_user($db, $_POST["username"], $_POST["password"]);
		header("Location: ../CRUD/tournaments.php");
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
             
                    <form class="form-horizontal" action="" method="post">
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
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Confirm Password</label>
                        <div class="controls">
                        <input type="password" placeholder="00000" name ="cpassword"/>
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                      <button type="submit" name="signup">Sign Up</button>
                          <a href = "index.php">Home</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>