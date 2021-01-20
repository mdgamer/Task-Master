<?php 
$d1=date("Y-m-d");
$d2=$_POST["date"];
$date1=date_create("$d1");
$date2=date_create("$d2");
$diff=date_diff($date1,$date2);
$df=$diff->format("%a");
$df1=(int)$df;
$link = mysqli_connect("localhost", "root", "1234", "Form");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO job_create (job_name, job_description, date_created, deadline_date,days_remaining,deaprtment,isdeleted) VALUES (?, ?, ?,?,?,?,?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssssss", $job_name, $job_description, $date_created, $deadline_date,$days_remaining,$deaprtment,$isdeleted);
    
    // Set parameters
    $job_name = $_POST["jname"];
    $job_description = $_POST["desc"];
    $date_created=$d1; 
    $deadline_date=$d2;
	$days_remaining=$df1;
	$deaprtment=$_POST["dep"];
	$isdeleted="F";
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
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