<?php

function winner(){
global $mysqliRPS;
global $user;
global $winner;
global $loser;
global $myStatus;
global $time;
// SQL query to retrieve the row with the highest key where the winner is user
$query = "SELECT * FROM passedSessions WHERE winner = '$user' ORDER BY sessionKey DESC LIMIT 1";

$result = mysqli_query($mysqliRPS, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($mysqliRPS));
}

if (mysqli_num_rows($result) > 0) {
    // Fetch the row with the highest key and winner user
    $row = mysqli_fetch_assoc($result);

    // Access the values from the row
    $key = $row['sessionKey'];
    $winner = $row['winner'];
    $loser = $row['loser'];
    $time = $row['time'];
    // epic stuff

    $myStatus = "winner";

} else {
    // echo "No rows found with the highest key where the winner is user.";
}

// Close the database connection when done
mysqli_close($mysqliRPS);
}

function loser(){
    global $mysqliRPS;
    global $user;
    global $winner;
global $loser;
global $myStatus;
// SQL query to retrieve the row with the highest key where the loser is user
$query = "SELECT * FROM passedSessions WHERE loser = '$user' ORDER BY sessionKey DESC LIMIT 1";

$result = mysqli_query($mysqliRPS, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($mysqliRPS));
}

if (mysqli_num_rows($result) > 0) {
    // Fetch the row with the highest key and loser user
    $row = mysqli_fetch_assoc($result);

    // Access the values from the row
    $key = $row['sessionKey'];
    $winner = $row['winner'];
    $loser = $row['loser'];

    $myStatus = "loser";
} else {
    // echo "No rows found with the highest key where the loser is user.";
}

mysqli_close($mysqliRPS);}

function tie(){
    global $mysqliRPS;
    global $user;
    global $winner;
global $loser;
global $myStatus;
// SQL query to retrieve the row with the highest key where the loser is user
$query = "SELECT * FROM passedSessions WHERE winner = '$user' ORDER BY sessionKey DESC LIMIT 1";

$result = mysqli_query($mysqliRPS, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($mysqliRPS));
}

if (mysqli_num_rows($result) > 0) {
    // Fetch the row with the highest key and loser user
    $row = mysqli_fetch_assoc($result);

    // Access the values from the row
    $key = $row['sessionKey'];
    $winner = $row['winner'];
    $loser = $row['loser'];

    $myStatus = "tie";
} else {
    // echo "No rows found with the highest key where the loser is user.";
}

mysqli_close($mysqliRPS);}



?>