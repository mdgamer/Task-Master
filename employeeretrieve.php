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
<h1 align="center">Employee Data Edit</h1>
        <h5 align="center" ><font color="red">Required Fields*</font></h5>
       <table cellpadding="10px" align="center" >
           <form name="f1" action="EmployeeUpdate.php" method="post">
           <tr><td><b> First Name *</td></b><td><input type="text" name="fname" value="<?php echo "$fn";?>"></td></tr>
		   <tr><td></td><td><p id="fn" style="color:red;"></p><td></tr>
           <tr><td><b> Last Name*</td> </b><td><input type="text" name="lname" value="<?php echo "$ln";?>"></td></tr>
            <tr><td><b> Gender*</td></b>
			<?php 
			if($gender=='M'){
				echo'
			<td><input type="radio" name="gender" value="M" checked> Male 
                 <input type="radio" name="gender" value="F"> Female
                <input type="radio" name="gender" value="O"> Other<td></td></tr>';		
			}
			elseif($gender=='F'){
				echo'
			<td><input type="radio" name="gender" value="M" > Male 
                 <input type="radio" name="gender" value="F" checked> Female
                <input type="radio" name="gender" value="O"> Other<td></td></tr>';		
			}
			
			else{
				echo'
			<td><input type="radio" name="gender" value="M" > Male 
                 <input type="radio" name="gender" value="F" > Female
                <input type="radio" name="gender" value="O" checked> Other<td></td></tr>';		
			}
			?>
                
			<tr><td><b>Designation</td></b><td>
			<?php
if($designation=="Health"){
echo'
<select name="desg">
  <option value="Health" selected>Health</option>
  <option value="Investment">Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
elseif($designation=="Investment"){
echo'
<select name="desg">
  <option value="Health">Health</option>
  <option value="Investment" selected>Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
elseif($designation=="Car Insurance"){
echo'
<select name="desg">
  <option value="Health">Health</option>
  <option value="Investment" >Investment</option>
  <option value="Car Insurance" selected>Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
else{
echo'
<select name="desg">
  <option value="Health">Health</option>
  <option value="Investment" >Investment</option>
  <option value="Car Insurance" >Car Insurance</option>
  <option value="Travel" selected>Travel</option>
</select>  ';
}
?>
</td></tr>
			<tr><td><b>Phone No*</td></b><td><input type="phno" name="phno" value='<?php echo "$ph_no";?>' ></td></tr>
            <tr><td><b> E-Mail*</td></b><td><input type="email" name="email" value="<?php echo "$email";?>"></td></tr>
<tr><td><input type="submit" value="Edit"></td><td><input type="Button" value="Cancel" onClick="document.location.href='dataretrievesearch.php';"/></td></tr>           
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