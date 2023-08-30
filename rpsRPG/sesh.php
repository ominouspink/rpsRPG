<?php

require '../hihi/config.php';

$loginPage = "Location: ../../registration/login.php";

include("../../important/auth.php");
$user = $_SESSION["username"];

include("phpScripts/loadSessions.php");
//insert the current page url into a variable
$currentURL = "https://swrath.unbound.top$_SERVER[REQUEST_URI]";

//check the current page url (had to constantly check bc i was stuck in a page redirect loop lol)
// echo "Current URL: " . $currentURL;
//check if user is already attacking in a fight
foreach ($allAttacking as $element) {
    if ($element[1] == $user){
        echo "  | you're already attacking";
        if($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/sesh.php"){
        header( "Location: https://swrath.unbound.top/experiment/rpsRPG/sesh.php" );}
    } 
    // else {
    //     header( "Location: https://swrath.unbound.top/experiment/rpsRPG" );
    // }
}

//check if user is already defending in a fight
foreach ($alldefending[0] as $element) {
    if ($element[1] == $user){
        echo "  | you're already defending";
        if($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/sesh.php"){
        header( "Location: https://swrath.unbound.top/experiment/rpsRPG/sesh.php" );}
    } 
    // else {
    //     header( "Location: https://swrath.unbound.top/experiment/rpsRPG" );
    // }
}

//the user variable from the previous page
if (isset($_GET['data'])) {
    $receivedVariable = urldecode($_GET['data']);
    echo "Received variable: " . $receivedVariable;
} else {
    echo "No variable received.";
}

if($receivedVariable == "ATTACKER"){
include("phpScripts/makeAtSesh.php");}
if($receivedVariable == "DEFENDER"){
    include("phpScripts/makeDefSesh.php");}

//game code under, above is the code to start and process the session
include("phpScripts/meow.php");
include("phpScripts/woof.php");
if (isset($_GET['rps']) && isset($_GET['number'])) {
    $rps = $_GET['rps'];
    $round = $_GET['number'];
    echo "You selected: $selectedOption with number $selectedNumber";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sophia's rpsRPG</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="parent">
        <div class="div1"> <h2><center>RPS BATTLE</center></h2> </div>
        <div class="div2" id="rpsStatus"> <h2><center>FIGHT</center></h2> </div>
        <div class="div3"><img src="media/rps.png"  class="image"> 
        <a href="sesh.php?rps=rock&number=" class="rpsButtons">Rock</a>
<a href="sesh.php?rps=paper&number=" class="rpsButtons">Paper</a>
<a href="sesh.php?rps=scissors&number=" class="rpsButtons">Scissors</a>
</div>
        <div class="div4" id="meow"> <center><b class="player">{<?= $user?>}</b><br>
            <p>{strength: <?= $myStrength?>}<br>
               {health: <?= $myCurrentHP?>/<?= $myMaxHP?>}</center><br>    </p></div>
        <div class="div5" id="woof"> <center><b class="opponent">{poepje}</b><br>
            <p>{strength: <?= $attackingStrength?>}<br>
               {health: <?= $attackingMaxHP?>/<?= $attackingCurrentHP?>}</center><br>    </p></div>
        </div>

<?= $footer ?>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
</body>
</html>