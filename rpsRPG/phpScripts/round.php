<?php

$lastMove = $defMove . "V" . $atMove;

if (empty($defMove) or empty($atMove)) {

    $lastMove = "rps";
}

// echo $defMove;
// echo $atMove;
function results()
{
    global $mysqliRPS;
    global $defMove;
    global $atMove;
    global $user;
    global $seshID;
    global $defenderUsername;
    global $attackerUsername;
    $current_time = date("Y-m-d H:i:s");

    if ($defMove == "rock" && $atMove == "rock") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    } else if ($defMove == "rock" && $atMove == "paper") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$attackerUsername', '$defenderUsername','$atMove', '$defMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        }
    } else if ($defMove == "rock" && $atMove == "scissors") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    }else if ($defMove == "paper" && $atMove == "rock") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$attackerUsername', '$defenderUsername','$atMove', '$defMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        }
    }  else if ($defMove == "paper" && $atMove == "paper") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    } else if ($defMove == "paper" && $atMove == "scissors") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    }else if ($defMove == "scissors" && $atMove == "rock") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$attackerUsername', '$defenderUsername','$atMove', '$defMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        }
    } else if ($defMove == "scissors" && $atMove == "paper") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    }else if ($defMove == "scissors" && $atMove == "scissors") {
        $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, winMove, lossMove, time, claimed) 
    VALUES ('$seshID','$defenderUsername', '$attackerUsername','$defMove', '$atMove', '$current_time', '0')";
        $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";
//voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
        if ($user == $defenderUsername) {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=winner");
        } else {
            header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
        }
    }
}

function wuss()
{
    global $mysqliRPS;
    global $enemyUser;
    global $user;
    global $seshID;

    $current_time = date("Y-m-d H:i:s");

    $WUSS = "INSERT INTO passedSessions (sessionKey, winner, loser, time, claimed) 
VALUES ('$seshID','$enemyUser', '$user', '$current_time', '1')";
    $WUSSY = "DELETE FROM sessions WHERE `sessions`.`sessionKey` = '$seshID'";

    //voer de queery uit en kijk of het resutlaat is gelukt
    //het resultaat geeft aan of eht wel of niet is gelukt
    $jip = mysqli_query($mysqliRPS, $WUSS);
    $jipie = mysqli_query($mysqliRPS, $WUSSY);
    //controle ovf het is gelukt
    // if ($jip) {
    //     echo "het item is toegevoegd <br>";
    // } else {
    //     echo "FOUT bij toevegen<br>";
    //     echo mysqli_error($mysqliRPS); //toont tijdelijk de foutmelding
    // }

    //send user to loser page
    header("Location: https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?reward=loser");
}


if ($currentStance == "defender") {
    $doneQ = "defDone";
} else if ($currentStance == "attacker") {
    $doneQ = "atDone";
}


function rock()
{
    global $mysqliRPS;
    global $seshID;
    global $doneQ;
    global $currentStance;
    // if ($currentStance == "defender") {
    // $rok = "UPDATE `sessions` SET `defMove` = 'rock' WHERE `sessions`.`sessionKey` = $seshID;";
    // $rox = mysqli_query($mysqliRPS, $rok);
    // $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
    // $isDone = mysqli_query($mysqliRPS, $amDone);} else{
    //     $rok = "UPDATE `sessions` SET `atMove` = 'rock' WHERE `sessions`.`sessionKey` = $seshID;";
    // $rox = mysqli_query($mysqliRPS, $rok);
    // $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
    // $isDone = mysqli_query($mysqliRPS, $amDone);
    // }

    //temporary simplification
    if ($currentStance == "defender") {
        $rok = "UPDATE `sessions` SET `defMove` = 'rock' WHERE `sessions`.`sessionKey` = $seshID;";
        $rox = mysqli_query($mysqliRPS, $rok);
        $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
        $isDone = mysqli_query($mysqliRPS, $amDone);} else{
            $rok = "UPDATE `sessions` SET `atMove` = 'rock' WHERE `sessions`.`sessionKey` = $seshID;";
        $rox = mysqli_query($mysqliRPS, $rok);
        $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
        $isDone = mysqli_query($mysqliRPS, $amDone);
        }
}

function paper()
{
    global $mysqliRPS;
    global $seshID;
    global $doneQ;
    global $currentStance;
    if ($currentStance == "defender") {
    $papper = "UPDATE `sessions` SET `defMove` = 'paper' WHERE `sessions`.`sessionKey` = $seshID;";
    $pasper = mysqli_query($mysqliRPS, $papper);
    $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
    $isDone = mysqli_query($mysqliRPS, $amDone);} else{

        $papper = "UPDATE `sessions` SET `atMove` = 'paper' WHERE `sessions`.`sessionKey` = $seshID;";
    $pasper = mysqli_query($mysqliRPS, $papper);
    $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
    $isDone = mysqli_query($mysqliRPS, $amDone);
    }
}

function scissors()
{
    global $mysqliRPS;
    global $seshID;
    global $doneQ;
    global $currentStance;
    if ($currentStance == "defender") {
    $sisor = "UPDATE `sessions` SET `defMove` = 'scissors' WHERE `sessions`.`sessionKey` = $seshID;";
    $scisdor = mysqli_query($mysqliRPS, $sisor);
    $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
    $isDone = mysqli_query($mysqliRPS, $amDone);} else {
        $sisor = "UPDATE `sessions` SET `atMove` = 'scissors' WHERE `sessions`.`sessionKey` = $seshID;";
        $scisdor = mysqli_query($mysqliRPS, $sisor);
        $amDone = "UPDATE `sessions` SET `$doneQ` = '1' WHERE `sessions`.`sessionKey` = $seshID;";
        $isDone = mysqli_query($mysqliRPS, $amDone);
    }
}
