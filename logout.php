<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$eid=$_SESSION["empid"];




date_default_timezone_set("Asia/Calcutta");
$lt=date("H:i:s");      
$ld=date("Y/m/d");

	$sql = "update audit set logout_date='$ld', logout_time='$lt',session='F' where username='$eid' and session='T'";


mysqli_query($conn, $sql);



session_destroy();
header("Location: login.html");
?>