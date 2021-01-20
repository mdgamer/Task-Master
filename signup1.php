<?php
session_start();
$eid=$_SESSION['eid'];
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$conn = new mysqli($servername, $username, $password, $dbname); // Establishing Connection with Server
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select emp_id,emp_firstname,emp_lastName from employee where emp_id='$eid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$fn=$row["emp_firstname"];
		$ln=$row["emp_lastName"];
    }
} else {
    echo "0 results";
}
echo "<h1>"."Hello ".$fn." ".$ln."</h1>";
echo "Your Employee ID: <b>".$eid."</b>";
$conn->close();
?>
<html>
<body>


<h2 align="center"> Create your Account Password</h2>
 <table cellpadding="10px" align="center" >
           <form name="f1" action="signup.php" method="post">
           <tr><td><b> Password *</td></b><td><input type="text" name="pass"></td></tr>
		      <tr><td><b> Confirm Password *</td></b><td><input type="text" name="pass1"></td></tr>
<tr><td><input type="submit" value="Submit"></td><td><input type="reset" value="Reset"></td></tr>           
      </form></table> 

</body>

</html>
