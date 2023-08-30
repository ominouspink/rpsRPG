<?php

//query for current playerData
$thisPlayers = "SELECT * FROM playerData WHERE `username` = '" . $user . "'";

// //fetch of current player
$attackingPlayer =  mysqli_fetch_all(mysqli_query($mysqliWRATH, $thisPlayers));


// //select the playerArray out of the current player arrays
$attackingPlayer = $attackingPlayer[0];


// max player health
$attackingMaxHP = $attackingPlayer[12];

// current player health
$attackingCurrentHP = $attackingPlayer[13];

// current player strength
$attackingStrength = $attackingPlayer[14];

?>