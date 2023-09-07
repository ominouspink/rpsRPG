<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
//insert the current page url into a variable
$currentURL = "https://swrath.unbound.top$_SERVER[REQUEST_URI]";

//check the current page url (had to constantly check bc i was stuck in a page redirect loop lol)
// echo "Current URL: " . $currentURL;


//make a check for if user is in a session, if not send to main screen KEYWORD:  header( "Location:

    $enemyUser = "uwu";
    $currentStance;
    
//configuration file for sql/database
require '../../hihi/config.php';

//login type of stuff
$loginPage = "Location: ../../../registration/login.php";
include("../../../important/auth.php");
$user = $_SESSION["username"];

//epic reward php scripts
include("../phpScripts/rewardValues.php");
if (isset($_GET['reward'])) {
    $reward = urldecode($_GET['reward']);
    if ($reward == "winner"){
    winner();
} else if ($reward == "loser") {
        loser();
    } else {
        tie();
    }
}
global $winner;
global $loser;
global $myStatus;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sophia's rpsRPG</title>
    <link rel="stylesheet" href="../styling/index.css">
</head>
<body>
    <div class="parent">
        <div class="div1"> <h2><center>RPS BATTLE</center></h2> </div>
        <div class="div2" id="rpsStatus">  </div>
        <div class="div3"><img src="../media/<?= $myStatus ?>.png"  class="image">
        <center> <p class="time">your last win on <?= $time ?> </p></center>
       <div id="choices"> <a href="../index.php" class="rpsButtons">new fight!</a>
</div>
        <div class="div4" id="meow"> <center><b class="player">WINNER</b><br>

    <span id="winner"><b style="color:green;"><?= $winner?></b></span>
<!-- 
            <p>{strength: <= $seshDefStrength?>}<br>
               {health: <= $seshDefHP?>/<= $seshDefMaxHP?>}--></center><br>    </p></div> 
        <div class="div5" id="woof"> <center><b class="opponent">LOSER</b><br>
    
    <span id="loser"><b style="color:red;"><?= $loser?></b></span>

            <!-- <p>{strength: <= $seshAtStrength?>}<br> 
               {health: <= $seshAtHP?>/<= $seshAtMaxHP?>}--></center><br>    </p></div>
        </div>
        <br>

       <div class='footer'>
        <p class='footTXT'>&copy; 2023 - Sophia's silly rps twist - 1v1 RPS GAME</p>
    </div>
    
    
</body>
</html>