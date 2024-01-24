<?php
$user = 'root';
$pass = "";
$host = 'localhost';
$dbname = "bd_cosmtt_php";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check(vérifier) connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
