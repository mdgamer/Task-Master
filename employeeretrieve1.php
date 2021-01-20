<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$emp_id = $_POST["eid"];
$_SESSION['eid']=$emp_id;
$deleted="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT emp_firstname, emp_lastName, gender, designation,email,ph_no,isdeleted FROM employee where emp_id='$emp_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		              $fn=$row["emp_firstname"];
		              $ln=$row["emp_lastName"];
		              $gender=$row["gender"];
		              $designation=$row["designation"];
		              $email=$row["email"];
		              $ph_no=$row["ph_no"];
		              $deleted=$row["isdeleted"];
		
}}
if($deleted=="F"){
	
?>

<HTML>
<HEAD>
<TITLE>
Employee Data Entry
</TITLE>
</HEAD>
<BODY>
<h1 align="center">Employee Info</h1>
        
       <table cellpadding="10px" align="center" >
           <form name="f1" action="employeedatadelete.php" method="post">
           <tr><td><b> First Name </td></b><td><?php echo "$fn";?></td></tr>
           <tr><td><b> Last Name</td> </b><td><?php echo "$ln";?></td></tr>
            <tr><td><b> Gender</td></b><td>
				<?php 
				if($gender=='M'){
				echo"Male";		
			}
				else if($gender=='F'){
				echo"Female";		
			}
			
			else{
				echo "Other";		
			}
				?></td></tr>
                
			<tr><td><b>Designation</td></b><td>		
<?php echo "$designation";?>
</td></tr>
			<tr><td><b>Phone No</td></b><td><?php echo "$ph_no";?></td></tr>
            <tr><td><b> E-Mail</td></b><td><?php echo "$email";?></td></tr>
<tr><td><input type="submit" value="Delete"></td><td><input type="Button" value="Cancel" onClick="document.location.href='employeedeletesearch.php';"/></td></tr>           
      </form></table> 
</BODY>
</HTML>
<?php
}



else {
    echo "0 results";
}


$conn->close();
?>