<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      
<body>
<?php 

session_start();
$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $emp_fn = $_POST["fname"];
    $emp_ln = $_POST["lname"];
    $gender=$_POST["gender"]; 
     $designation=$_POST['desg'];
	$email=$_POST["email"];
	$ph_no=$_POST["phno"];
	$eid=$_SESSION['eid'];
// Prepare an insert statement
$sql = "update employee set emp_firstname='$emp_fn', emp_lastName='$emp_ln', gender='$gender', designation='$designation',email='$email',ph_no='$ph_no' where emp_id='$eid'";
 
if($stmt = mysqli_prepare($link, $sql)){
    
   
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
          echo  "$eid";
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

        