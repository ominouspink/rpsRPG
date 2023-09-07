<?php

//query for current playerData
$thisPlayers = "SELECT * FROM playerData WHERE `username` = '" . $attackerUsername . "'";

// //fetch of current player
$seshAtPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $thisPlayers));


// //select the playerArray out of the current player arrays
$seshAtPlayer = $seshAtPlayer[0];


// max player health
$seshAtMaxHP = $seshAtPlayer[12];

// current player health
$seshAtHP = $seshAtPlayer[13];

// current player strength
$seshAtStrength = $seshAtPlayer[14];

function atDone() {
    global $mysqliRPS;
global $isAttacker;
global $bothDone;
global $attackerUsername;

    if($isAttacker == true && $bothDone == "no"){
        $done=   "UPDATE `sessions` SET `atDone` = '1' WHERE `attacker` = '" .$attackerUsername."';";
        $doneProcess = mysqli_query($mysqliRPS, $done);
       }}
function atUndone() {
    global $mysqliRPS;
    global $isAttacker;
    global $bothDone;
    global $attackerUsername;
if($isAttacker == true && $bothDone == "yes"){
    $undone=   "UPDATE `sessions` SET `atDone` = '0' WHERE `attacker` = '" .$attackerUsername."';";
    $undoneProcess =  mysqli_query($mysqliRPS, $undone);
   }}
?>