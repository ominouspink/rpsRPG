<?php

//query for current playerData
$thisPlayers = "SELECT * FROM playerData WHERE `username` = '" . $user . "'";

// //fetch of current player
$currentPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $thisPlayers));


// //select the playerArray out of the current player arrays
$currentPlayer = $currentPlayer[0];


// max player health
$myMaxHP = $currentPlayer[12];

// current player health
$myCurrentHP = $currentPlayer[13];

// current player strength
$myStrength = $currentPlayer[14];
