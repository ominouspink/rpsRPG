<?php
//current max sessions, easy way to keep the server running okay with this unoptimised php script. (will implement at some point)
$maxSessions = 10;



//check if you are currently in a session
// SQL query
$sqlControl = "SELECT defender, attacker FROM `sessions`";
$controlResult = $mysqliRPS->query($sqlControl);

//search for a free defender spot
$defendSESH = 'SELECT * FROM `sessions` WHERE `defender` = "" AND `attacker` != "";';


//fetch of defend queue
$defend =  mysqli_fetch_all(mysqli_query($mysqliRPS, $defendSESH));
$alldefending = $defend;


//select one collection of player data out of the current defender array
$defend = $defend[0];



//search for a free attacker spot
$attackSESH = 'SELECT * FROM `sessions` WHERE `defender` != "" AND `attacker` = "";';


//fetch of attack queue
$attack =  mysqli_fetch_all(mysqli_query($mysqliRPS, $attackSESH));
$allAttacking = $attack;

//select the playerArray out of the current player arrays
$attack = $attack[0];




//lets fetch their player data
//query for the attacking player (if user wants to defend)
$defPlayer = "SELECT * FROM playerData WHERE `username` = '" . $defend[2] . "'";

//fetch for the attacking player (if user wants to defend)
$defendingPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $defPlayer));

//select the playerArray out of the current player arrays
$defendingPlayer = $defendingPlayer[0];

// max player health
$defMaxHP = $defendingPlayer[12];

// player health
$defHP = $defendingPlayer[13];

// current player strength
$defStrength = $defendingPlayer[14];

//query for the attacking player (if user wants to defend)
$atPlayer = "SELECT * FROM playerData WHERE `username` = '" . $attack[1] . "'";

//fetch for the attacking player (if user wants to defend)
$attackingPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $atPlayer));

//select the playerArray out of the current player arrays
$attackingPlayer = $attackingPlayer[0];

// max player health
$atMaxHP = $attackingPlayer[12];

// current player health
$atHP = $attackingPlayer[13];

// current player strength
$atStrength = $attackingPlayer[14];


//set variables for new session if there is no user waiting (index page will get other information and stuff :3)
if($attack[1] == ""){
    $attack[1] = "DEFENDER";
}
if($defend[2] == ""){
    $defend[2] = "ATTACKER";
}
