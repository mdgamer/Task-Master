<?php 
$link = mysqli_connect("localhost", "root", "1234", "Form");
 session_start();
 $eid=$_SESSION["eid"];
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO login(username, password) VALUES (?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    
    // Set parameters
    $username = $eid;
    $password = $_POST["pass"];
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "<p style='color:green;'>Your registration is successful<p>";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);
session_destroy();
// Close connection
mysqli_close($link);


?>