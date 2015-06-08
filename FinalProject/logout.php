<?php
$servername = "oniddb.cws.oregonstate.edu";
$username = "jungjo-db";
$password = "NH3L80XY5GDhtIZc";
$dbname = "jungjo-db";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_destroy();
header("Location: login.php");

?>
