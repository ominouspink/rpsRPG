<?php
session_start();
// Add this at the beginning of your PHP script
header('Content-Type: application/json');



//configuration file for sql/database
require '../../hihi/config.php';

$user = $_SESSION["username"];

include("../phpScripts/queryCollection.php");

// Perform a database query to retrieve the variables
$sql = "SELECT defDone, atDone FROM sessions WHERE `sessionKey` = $seshID";
$result = $mysqliRPS->query($sql);

if ($result) {
    // Fetch and return the variables as JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["defDone" => "Error fetching defDone", "atDone" => "Error fetching atDone"]);
}

// Close the database connection (if necessary)
?>