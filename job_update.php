<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$job_id = $_POST["jid"];
$deleted="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT job_name, job_description,department FROM job_create where job_id='$job_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		              $jobname=$row["job_name"];
		              $job_description=$row["job_description"];
					  $department=$row["dep"];
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
<h1 align="center">Job Info Edit</h1>
       <table cellpadding="10px" align="center" >
           <form name="f1" action="" method="post">
           <tr><td><b>Job Name</td></b><td><input type="text" name="jname" value="<?php echo "$jobname";?>"></td></tr>
           <tr><td><b> Job Description</td> </b><td><input type="text" name="desc" value="<?php echo "$job_description";?>"></td></tr>
		   <tr><td><b>Designation</td></b><td>
			<?php
if($department=="Health"){
echo'
<select name="dep">
  <option value="Health" selected>Health</option>
  <option value="Investment">Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
elseif($department=="Investment"){
echo'
<select name="dep">
  <option value="Health">Health</option>
  <option value="Investment" selected>Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
elseif($department=="Car Insurance"){
echo'
<select name="dep">
  <option value="Health">Health</option>
  <option value="Investment" >Investment</option>
  <option value="Car Insurance" selected>Car Insurance</option>
  <option value="Travel">Travel</option>
</select>  ';
}
else{
echo'
<select name="dep">
  <option value="Health">Health</option>
  <option value="Investment" >Investment</option>
  <option value="Car Insurance" >Car Insurance</option>
  <option value="Travel" selected>Travel</option>
</select>  ';
}
?>
</td></tr>
<tr><td><input type="submit" value="Update"></td><td><input type="Button" value="Cancel" onClick="document.location.href='.php';"/></td></tr>           
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