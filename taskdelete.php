
<?php
session_start();

$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $deleted="T";
 $emp_id=$_POST["empid"];
    $job_id = $_POST["jobid"];
// Prepare an insert statement
$sql = "update operation_table set isdeleted='$deleted' where job_id='$job_id' and emp_id='$emp_id'";
 
if($stmt = mysqli_prepare($link, $sql)){
    
   
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
          echo  "$job_id"." has been successfully deleted";
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