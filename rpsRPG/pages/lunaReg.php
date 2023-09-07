<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <title>temporary registration</title>
        <link rel="stylesheet" href="../../css/index.css" />
        <link rel="icon" type="image/x-icon" href="../../media/favicon.ico">
</head>

<body>
        <!-- header of the page -->
        <header>
                <div class="sophia">
                        <ul>
                                <li>
                                        <b> <img class="sophiaIMG" src="../../media/small_sophia.png"></b>
                                </li>
                        </ul>
                </div>
        </header>
        <?php
        require('../config.php');
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])) {
                $cost = 10;

                // removes backslashes
                $password = stripslashes($_REQUEST['password']);
                //escapes special characters in a string
                $password = mysqli_real_escape_string($mysqli, $password);

                $password = password_hash($password, PASSWORD_BCRYPT, ["cost" => $cost]);
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($mysqli, $username);
                //set current date
                $trn_date = date("Y-m-d H:i:s");
                $query1 = "INSERT INTO `playerData` (username) 
                        VALUES ('$username')";
                $query2 = "INSERT INTO `playerBools` (username) 
                         VALUES ('$username')";
                $query3 = "INSERT INTO `inventory` (username) 
                          VALUES ('$username')";
                $query4 = "INSERT INTO `equipment` (username) 
                           VALUES ('$username')";
                $query2 = "INSERT INTO `boringPlayerData` (username) 
                            VALUES ('$username')";
                $query = "INSERT into `users` (username, password, trn_date)
                VALUES ('$username', '$password', '$trn_date')";
                mysqli_query($mysqli, $query1);
                $result = mysqli_query($mysqli, $query);
        }
        if ($result) {
                //check if password is being sent right
                // echo "$query1 <br> $query"

                echo "
                        <div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='../../registration/login.php'>Login</a></div>";
                $file_pointer = fopen(__FILE__, 'w+');
                if (!unlink($file_pointer)) {
                        echo ("$file_pointer cannot be deleted due to an error");
                } else {
                        echo ("$file_pointer has been deleted");
                }
        } else {
        ?>
                <div class="form">
                        <!-- <h1 id="verif">Join feature not yet available during pre-alpha <a href='login.php'>enter info here if you're a special tester</a></h1> -->
                        <form name="registration" action="" method="post">
                                <input type="text" name="username" placeholder="Username" required />
                                <input type="password" name="password" placeholder="Password" required />

                                <input type="submit" name="submit" value="join" />
                        </form>
                        <p>have you already joined? <a href='../../registration/login.php'>Come Here</a></p>
                </div>
        <?php } ?>
</body>

</html>