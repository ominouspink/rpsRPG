<?php
$receivedVariable= "";
require '../hihi/config.php';

$loginPage = "Location: ../../registration/login.php";

include("../../important/auth.php");
$user = $_SESSION["username"];

include("phpScripts/loadSessions.php");
//insert the current page url into a variable
$currentURL = "https://swrath.unbound.top$_SERVER[REQUEST_URI]";
//the user variable from the previous page
if (isset($_GET['data'])) {
    $receivedVariable = urldecode($_GET['data']);
    echo "Received variable: " . $receivedVariable;
    if($receivedVariable == "wuss"){
        wuss();
    }
} else {
    echo "No variable received.";
}

//check if user is already attacking in a fight
foreach ($allAttacking as $element) {
    if ($element[1] == $user){
        echo "  | you're already attacking";
        if($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/sesh.php"){
        header( "Location: https://swrath.unbound.top/experiment/rpsRPG/sesh.php" );}
    } 
}

//check if user is already defending in a fight
foreach ($alldefending[0] as $element) {
    if ($element[1] == $user){
        echo "  | you're already defending";
        if($currentURL != "https://swrath.unbound.top/experiment/rpsRPG/sesh.php"){
        header( "Location: https://swrath.unbound.top/experiment/rpsRPG/sesh.php" );}
    } 
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
<header>
    <div class="header">
      <ul><center>
        <li><b><a href="../../index.php" class="transcend">transcend to spirit realm</a></b></li>
      </ul></center>
    </div>
  </header>
    <div class="parent">
        <div class="div1"> <h2><center>RPS BATTLE</center></h2> </div>
        <div class="div2" id="rpsStatus"> <h2><center>CHOOSE OPPONENT</center></h2> </div>
        <div class="div3"><img src="media/rps.png"  class="image"> </div>
        <div class="div4" id="meow"> 
        <center><b class="player">START AS ATTACKER</b>
        <center><b class="opponent"  id="defenderTitleID">[<?= $attack[1]?>]</b><br>
            <p id="defenderID">{strength: <?= $atStrength?>}<br>
               {health: <?= $atMaxHP?>}</center><br>    </p>
            <a href="sesh.php?data=<?php echo urlencode($attack[1]); ?>">START</a></div>
        <div class="div5" id="woof">
        <center><b class="player">START AS DEFENDER</b>    
        <center><b class="player" id="atttackerTitleID">[<?= $defend[2]?>]</b><br>
            <p id="atttackerID">{strength: <?= $defStrength?>}<br>
               {health: <?= $defMaxHP?>}</center><br>    </p>
               <a href="sesh.php?data=<?php echo urlencode($defend[2]); ?>">START</a></div>
        </div>

<?php echo "$footer" ?>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        if("<?= $attack[1] ?>" == "DEFENDER"){
            document.getElementById('defenderTitleID').innerHTML = '[EMPTY QUEUE]';
            document.getElementById('defenderID').innerHTML = 'WAIT FOR A FIGHTER TO SELECT YOU';
        }
        if("<?= $defend[2] ?>" == "ATTACKER"){
            document.getElementById('atttackerTitleID').innerHTML = '[EMPTY QUEUE]';
            document.getElementById('atttackerID').innerHTML = 'WAIT FOR A FIGHTER TO SELECT YOU';
        }
    </script>
</body>
</html>