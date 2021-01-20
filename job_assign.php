<?php

session_start();
$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO operation_table (job_id,status,emp_id,assigned_by,priority,isdeleted) VALUES (?, ?, ?,?,?,?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $job_id,$status,$emp_id,$assigned_by,$priority,$isdeleted);
    
    // Set parameters
    $emp_id = $_POST["empid"];
    $job_id = $_POST["jobid"];
    $status="Assigned"; 
	$assigned_by="Admin"; 
	$priority=$_POST["priority"];
	$isdeleted="F";
     
echo "$emp_id";
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


?>