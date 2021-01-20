
<?php
session_start();
$jid=$_SESSION['jid'];

$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $deleted="T";
// Prepare an insert statement
$sql = "update job_create set isdeleted='$deleted' where job_id='$jid'";
 
if($stmt = mysqli_prepare($link, $sql)){
    
   
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
          echo  "$jid"." has been successfully deleted";
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