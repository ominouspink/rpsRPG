<?php

//query for current playerData
$thisPlayers = "SELECT * FROM playerData WHERE `username` = '" . $defenderUsername . "'";

// //fetch of current player
$seshDefPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $thisPlayers));


// //select the playerArray out of the current player arrays
$seshDefPlayer = $seshDefPlayer[0];


// max player health
$seshDefMaxHP = $seshDefPlayer[12];

// current player health
$seshDefHP = $seshDefPlayer[13];

// current player strength
$seshDefStrength = $seshDefPlayer[14];


function defDone() {
    if($isDefender == true && $bothDone == "no"){
        $done=   "UPDATE `sessions` SET `defDone` = '1' WHERE `defender` = '" .$defenderUsername."'";
        $doneProcess =  mysqli_fetch_all(mysqli_query($mysqliRPS, $done));
    }}

function defUndone() {
if($isDefender == true && $bothDone == "yes"){
    $undone=   "UPDATE `sessions` SET `defDone` = '0' WHERE `defender` = '" .$defenderUsername."'";
    $undoneProcess =  mysqli_fetch_all(mysqli_query($mysqliRPS, $undone));
}}