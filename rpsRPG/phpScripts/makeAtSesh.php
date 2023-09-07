<?php

function makeAtSesh(){
global $mysqliRPS;
global $user;

$atSesh = "INSERT INTO `sessions` (`sessionKey`, `defender`, `attacker`, `defMove`, `atMove`, `defDone`, `atDone`, `timeLeft`, `status`) VALUES (NULL, '', '" . $user . "', '', '', '0', '0', '', '1');";
$result = mysqli_query($mysqliRPS, $atSesh);}
?>