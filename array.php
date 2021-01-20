
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$deleted="";

$eid="";
$fullname="";

$name=array("$eid"=>"$fullname");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT emp_id,emp_firstname, emp_lastName from employee";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$eid=$row["emp_id"];
		              $fn=$row["emp_firstname"];
		              $ln=$row["emp_lastName"];
	$fullname=$fn." ".$ln;
	
array_push($name,"$eid","$fullname");		
}}
foreach($name as $x=>$x_value){
echo "key = ".$x.",Value=".$x_value;
echo "<br>";
}

$conn->close();
?>