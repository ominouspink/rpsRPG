<?php
// broken rn
//all current session variables
$sqlMySesh = "SELECT * FROM `sessions` WHERE `attacker` = '$user' or `defender` = '$user'";
$mysesh = $mysqliRPS->query($sqlMySesh);
if ($mysesh) {
    while ($row = $mysesh->fetch_assoc()) {
      $seshID = $row['sessionKey'];
        $defDone =$row['defDone'] ;
        $atDone = $row['atDone'] ;
        $refresh= $row['refresh'] ;
        $spare = $row['spare'] ;
        $timeLeft = $row['timeLeft'] ;
        $seshStatus = $row['status'] ;

        if($atDone == 1 && $defDone == 1){
            $bothDone = "yes";
        } else{
            $bothDone = "no";
        }
    }
} else {
    // echo "No results found.";
}
//all passed session variables


//upload current attacker round values

//upload current defender round values