<?php
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

//insert all useful query things
include("../phpScripts/queryCollection.php");



//load all sessions (not epic optimised if alot of sessions are active)
include("../phpScripts/loadSessions.php");





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
            $currentStance = "defender";
           
            if ($attackerUsername === '') {
         
                header( "Location: https://swrath.unbound.top/experiment/rpsRPG/pages/defWaiting" );
            } else {
           
                if (isset($_GET['continue'])) {
                    $continue = $_GET['yes'];
                  if($defRound < $atRound)  {
                    $defRound++;
                  } else if($defRound == $atRound)  {
                    $defRound++;
                  }
                   
                }
            }
        } elseif ($attackerUsername === $user) {
            $isAttacker = true;
            if ($defenderUsername === '') {
        
                header( "Location: https://swrath.unbound.top/experiment/rpsRPG/pages/atWaiting" );
            }else {
            
                $enemyUser = $defenderUsername;
                $currentStance = "attacker";
                if (isset($_GET['continue'])) {
                    $continue = $_GET['yes'];
                  if($defRound > $atRound)  {
                    $atRound++;
                  } else if($defRound == $atRound)  {
                    $atRound++;
                  }
                   
                }
            }
        }
    }

    if (!$isDefender && !$isAttacker) {
        header( "Location: https://swrath.unbound.top/experiment/rpsRPG");
      
    }
} else {
    header( "Location: https://swrath.unbound.top/experiment/rpsRPG");
 
}







//the user variable from the previous page
if (isset($_GET['data'])) {
    $receivedVariable = urldecode($_GET['data']);
 
} else {

}

if($receivedVariable == "ATTACKER"){
include("../phpScripts/makeAtSesh.php");}
if($receivedVariable == "DEFENDER"){
    include("../phpScripts/makeDefSesh.php");}

//game code under, above is the code to start and process the session
include("../phpScripts/meow.php");
include("../phpScripts/woof.php");




// SQL query to retrieve defMove and atMove values
$boDone = "SELECT defMove, atMove FROM `sessions`";
$frDone = $mysqliRPS->query($boDone);

if ($frDone === false) {
    // echo "Query error: " . $conn->error;
} else {
    if ($frDone->num_rows > 0) {
        // echo $frDone[0];
        while ($row = $frDone->fetch_assoc()) { 
            $defMove = $row["defMove"];
            $atMove = $row["atMove"];

            if (!empty($defMove) && !empty($atMove)) {
                // echo "defender used " . $defMove . " and the attacker used " . $atMove;
            } else if (empty($defMove) && !empty($atMove)){
                // echo "only attacker is done.";
            }
            else if(!empty($defMove) && empty($atMove)){
                // echo "last defender move was: " . $defMove;
            }
            else {
                // echo "both of defMove and atMove are not filled.";
            }
        }
    } else {
        // echo "No results found.";
    }
}

include("../phpScripts/round.php");


//destroy session 
if (isset($_GET['rps'])) {
    $receivedVariable = urldecode($_GET['rps']);
    // echo "Received variable: " . $receivedVariable;
    if($receivedVariable == "SCARED"){
        wuss();
    } else if ($receivedVariable == "rock"){
        rock();
    }
    else if ($receivedVariable == "paper"){
        paper();
    }else if ($receivedVariable == "scissors"){
        scissors();
    }
} else {
    // echo "No variable received.";
}

if (isset($_GET['continue'])) {
    if ($defDone == 1 && $atDone == 1) {

    results();
}
}

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
        <div class="div3"><img src="../media/<?= $lastMove ?>.png"  class="image">
        <center> <p class="time">time left: ∞</p></center>
       <div id="choices"> <a href="sesh.php?rps=rock&number=" class="rpsButtons">Rock</a>
<a href="sesh.php?rps=paper&number=" class="rpsButtons">Paper</a>
<a href="sesh.php?rps=scissors&number=" class="rpsButtons">Scissors</a>
<a href="sesh.php?rps=SCARED" class="wussButton">I'M SCARED</a></div>
</div>
        <div class="div4" id="meow"> <center><b class="player">{<?= $defenderUsername?>}</b><br>

    <span id="defDone"><b style="color:red;">Loading...</b></span>
<!-- 
            <p>{strength: <= $seshDefStrength?>}<br>
               {health: <= $seshDefHP?>/<= $seshDefMaxHP?>}--></center><br>    </p></div> 
        <div class="div5" id="woof"> <center><b class="opponent">{<?= $attackerUsername?>}</b><br>
    
    <span id="atDone"><b style="color:red;">Loading...</b></span>

            <!-- <p>{strength: <= $seshAtStrength?>}<br> 
               {health: <= $seshAtHP?>/<= $seshAtMaxHP?>}--></center><br>    </p></div>
        </div>
        <br>

       <div class='footer'>
        <p class='footTXT'>&copy; 2023 - Sophia's silly rps twist - 1v1 RPS GAME</p>
    </div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script > </script>
   <script src="../jsScripts/liveUpdate.js"> </script>
    
</body>
</html>