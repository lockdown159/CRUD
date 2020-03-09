<html>
    <head>
        <title> Competitor - Sign up </title>
        <h1> Competitor - Sign up </h1>
        <style>
            input {
                 margin: 5px;
            }
            button {
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            <input type="text" placeholder="Username" name ="username"/><br/>
            <!--<input type="text" placeholder="Competitor's name" name ="name"/><br/>-->
            <!--<input type="number" placeholder="Age" name ="age"/><br/>-->
            <!--<input type="text" placeholder="Belt" name ="belt"/><br/>-->
            <input type="password" placeholder="Password" name ="password"/><br/>
            <input type="password" placeholder="Confirm Password" name ="cpassword"/><br/>

            <button type="submit" name="signup">Sign Up</button>

            <?php if ($ERROR_USERNAME){
                echo "Username error"; }?>

                <a href = "../CRUD/index.php">Home</a>
        </form>
    </body>
</html>