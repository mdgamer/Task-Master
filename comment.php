
<?php 
session_start();
$emp_id=$_SESSION['empid'];
if(isset($_POST['submit'])){ //check if form was submitted
   //get input text


$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO comment (job_id,emp_id,comment,time) VALUES (?,?, ?,?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssss",$job_id,$emp_id,$comment,$date);
    
    // Set parameters
    $job_id = "JOB0001";
	$comment = $_POST['comment'];
	date_default_timezone_set("Asia/Calcutta");
	$date=date("Y-m-d h:i:s");
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);

 
// Close connection
mysqli_close($link);
}
?>
<html>
<head>
<title>Comment</title></head>
<style>
.comment{
background-color:#C4DFF8;
overflow: auto;
height: 400px;
width:25%;
}
</style>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$deleted="";
// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$emp_id=$_SESSION['empid'];
$sql1="select comment,time from comment where emp_id='$emp_id'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$comment1[]=" ".$row["comment"];
		$time[]=" ".$row["time"];
}
}
 $conn->close();
?>
<div class="comment" >
<?php
$arrlength=count($comment1);
for($x = 0; $x < $arrlength; $x++) {
echo "<b>"."$time[$x]"."</b>| "."$comment1[$x]".'<br>';
}
?>
</div>
<br>
<form name="f1" action="" method="post">
<textarea rows="4" cols="50" name="comment"></textarea>
<br>
<input type="submit" value="Post" name="submit">
</form>

</b>
</body>
</html>
