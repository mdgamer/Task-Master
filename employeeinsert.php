<html>
<body>
<?php 
session_start();
$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO employee (emp_id,emp_firstname, emp_lastName, gender, designation,email,ph_no,isdeleted) VALUES (?,?, ?, ?,?,?,?,?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $emp_id,$emp_fn, $emp_ln, $gender, $designation,$email,$ph_no,$isdeleted);
    
    // Set parameters
	$emp_id=$_POST["eid"];
    $emp_fn = $_POST["fname"];
    $emp_ln = $_POST["lname"];
    $gender=$_POST["gender"]; 
     $designation=$_POST['desg'];
	$email=$_POST["email"];
	$ph_no=$_POST["phno"];
	$isdeleted="F";
	$_SESSION['eid']=$emp_id;
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        header("Location: signup1.php");
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


?></b>
</body>
</html>
