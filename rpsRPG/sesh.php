<?php

require '../hihi/config.php';

$loginPage = "Location: ../../registration/login.php";

include("../../important/auth.php");
$user = $_SESSION["username"];

include("session.php");

include("meow.php");
include("woof.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rpsRPG</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="parent">
        <div class="div1"> <h2><center>RPS BATTLE</center></h2> </div>
        <div class="div2" id="rpsStatus"> <h2><center>FIGHT</center></h2> </div>
        <div class="div3"><img src="media/rps.png"  class="image"> </div>
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