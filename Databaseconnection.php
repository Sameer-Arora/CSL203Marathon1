<?php
// mysql account
$servername = "localhost";
$username = "root";
$password = "sameer";
$dbname="Books";

$conn = new mysqli($servername, $username, $password,$dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
}

?>