<?php
$receivedVariable = "";
require '../hihi/config.php';

$loginPage = "Location: ../../registration/login.php";

include("../../important/auth.php");
$user = $_SESSION["username"];

//load current sessions
include("phpScripts/loadSessions.php");

//session creator
include("phpScripts/makeAtSesh.php");
include("phpScripts/makeDefSesh.php");

//check if current user is in a session
if ($controlResult === false) {
    // echo "Query error: " . $conn->error;
} elseif ($controlResult->num_rows > 0) {
    $isDefender = false;
    $isAttacker = false;

    while ($row = $controlResult->fetch_assoc()) {
        $defenderUsername = $row["defender"];
        $attackerUsername = $row["attacker"];

        if ($defenderUsername === $user) {
            $isDefender = true;
            if ($attackerUsername === '') {
                
            } else {
              
                header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php");
            }
        } elseif ($attackerUsername === $user) {
            $isAttacker = true;
            if ($defenderUsername === '') {
              
            } else {
               
                header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php");
            }
        }
    }

   
} 


//insert the current page url into a variable
$currentURL = "https://swrath.unbound.top$_SERVER[REQUEST_URI]";
//the user variable from the previous page


//check if user is already attacking in a fight
foreach ($allAttacking as $element) {
    if ($element[1] == $user) {
        // echo "  | you're already attacking";
        if ($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php") {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php");
        }
    }
}

//check if user is already defending in a fight
foreach ($alldefending[0] as $element) {
    if ($element[1] == $user) {
        // echo "  | you're already defending";
        if ($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php") {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sophia's rpsRPG</title>
    <link rel="stylesheet" href="styling/index.css">
</head>

<body>
    <header>
        <div class="header">
            <ul>
                <center>
                    <li><b><a href="../../index.php" class="transcend">transcend to spirit realm</a></b></li>
            </ul>
            </center>
        </div>
    </header>
    <div class="parent">
        <div class="div1">
            <h2>
                <center>RPS BATTLE</center>
            </h2>
        </div>
        <div class="div2" id="rpsStatus">
            <h2>
                <center>CHOOSE OPPONENT</center>
            </h2>
        </div>
        <div class="div3"><img src="media/rps.png" class="image"> </div>
        <div class="div4" id="meow">
            <!-- <center><b class="player">START AS ATTACKER</b>
                <center><b class="opponent" id="defenderTitleID">[<= $attack[1] ?>]</b><br>
                    <p id="defenderID">{strength: <= $atStrength ?>}<br>
                        {health: <= $atMaxHP ?>}
                </center><br> </p>
                <a href="index.php?data=<php echo urlencode($attack[1]); ?>&mood=attacking">START</a> -->
        </div>
        <div class="div5" id="woof">
            <center><b class="player">START AS DEFENDER</b>
                <center><b class="player" id="atttackerTitleID">[<?= $defend[2] ?>]</b><br>
                    <p id="atttackerID">{strength: <?= $defStrength ?>}<br>
                        {health: <?= $defMaxHP ?>}
                </center><br> </p>
                <a href="index.php?data=<?php echo urlencode($defend[2]); ?>&mood=defending">START</a>
        </div>
    </div>

    <?php echo "<div class='footer'>
        <p class='footTXT'>&copy; 2023 - Sophia's silly rps twist - 1v1 RPS GAME</p>
    </div>" ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        if ("<?= $attack[1] ?>" == "DEFENDER") {
            document.getElementById('defenderTitleID').innerHTML = '[EMPTY QUEUE]';
            document.getElementById('defenderID').innerHTML = 'WAIT FOR A FIGHTER TO SELECT YOU';
        }
        if ("<?= $defend[2] ?>" == "ATTACKER") {
            document.getElementById('atttackerTitleID').innerHTML = '[EMPTY QUEUE]';
            document.getElementById('atttackerID').innerHTML = 'WAIT FOR A FIGHTER TO SELECT YOU';
        }
    </script>
    <?php if (isset($_GET['data']) && isset($_GET['mood'])) {
    $data = urldecode($_GET['data']);
    $mood = urldecode($_GET['mood']);
    //join session if not already joined
    // echo "Received user variable: " . $data;
        
    if ($mood == "attacking") {
        if($data == "DEFENDER"){
            makeDefSesh();
            
        echo "<script>document.body.innerHTML = '';</script>";
        echo '<div style="text-align: center;">';
        echo '<a href="https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php" class="rpsButtons">go to fight!</a>';
        echo '</div>';
        } else{

        //search for a free defender spot
        $defendSESH = 'SELECT * FROM `sessions` WHERE `defender` != "" AND `attacker` = "";';
        //fetch of defend queue
        $defend =  mysqli_fetch_all(mysqli_query($mysqliRPS, $defendSESH));
        
        //select one collection of player data out of the current defender array
        $defend = $defend[0];
        // echo "   name of the defender: " . $defend[2];
        if ($defend[2] == $data) {

            $joining = "UPDATE `sessions` SET `attacker` = '$user' WHERE `defender` = '$data';";
            $join = mysqli_query($mysqliRPS, $joining);

            echo "<script>document.body.innerHTML = '';</script>";
            echo '<div style="text-align: center;">';
            echo '<a href="https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php" class="rpsButtons">go to fight!</a>';
            echo '</div>';
        }
    } }else if ($mood == "defending") {

        if($data == "ATTACKER"){
            makeAtSesh();
            
        echo "<script>document.body.innerHTML = '';</script>";
        echo '<div style="text-align: center;">';
        echo '<a href="https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php" class="rpsButtons">go to fight!</a>';
        echo '</div>';
        } else{
 //search for a free defender spot
 $attackSESH = 'SELECT * FROM `sessions` WHERE `defender` = "" AND `attacker` != "";';
 //fetch of defend queue
 $attack =  mysqli_fetch_all(mysqli_query($mysqliRPS, $attackSESH));

 //select one collection of player data out of the current defender array
 $attack = $attack[0];
 echo "   name of the attacker: " . $attack[2];
 if ($attack[2] == $data) {
        $joining = "UPDATE `sessions` SET `defender` = '$user' WHERE `attacker` = '$data';";
        $join = mysqli_query($mysqliRPS, $joining);

        echo "<script>document.body.innerHTML = '';</script>";
        echo '<div style="text-align: center;">';
        echo '<a href="https://swrath.unbound.top/experiment/rpsRPG/pages/sesh.php" class="rpsButtons">go to fight!</a>';
        echo '</div>';
    }}
} }else {
    // echo "No user variable received.";
}
?>
</body>

</html>