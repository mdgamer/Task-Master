 <div id="w" >
 
 <table class="table  table-hover">
 
 <form name="f3" action="taskdelete.php" method="post">
<tr>
<th>
 Employee Name</th><td> <?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
$deleted="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT isdeleted,emp_id,emp_firstname,emp_lastName FROM employee";
$result = $conn->query($sql);

$empid = array();
$empname = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$isdeleted=$row["isdeleted"];
					  if($isdeleted!='T'){
			 $empname[]= " ".$row["emp_firstname"]." ".$row["emp_lastName"];
			  $empid[]=$row["emp_id"];
		}
					 
                      					  
}}
$arrlength = count($empid);
echo '<select  name="empid">
<option>--select--</option>'
;
for($x = 0; $x < $arrlength; $x++) {
echo '
     <option value="'.$empid[$x].'">'.$empid[$x].$empname[$x].'</option>';
}
echo '</select>';
?> </td>
</tr>

<tr>
<th>
Job Id </th>
<td>
 <?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Form";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT isdeleted,job_id FROM job_create ";
$result = $conn->query($sql);

$job = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$isdeleted=$row["isdeleted"];
		if($isdeleted!='T'){
			 $job[]=$row["job_id"];
		}
		             
                      					  
}}
$arrlength = count($job);
echo '<select  name="jobid">
<option>--select--</option>
';

for($x = 0; $x < $arrlength; $x++) {
echo '
     <option value="'.$job[$x].'">'.$job[$x].'</option>';
}
echo '</select>';
?>
</td>
</tr>
<tr>
<td>
<div class="btn btn-primary "  onClick="submit">Delete</div>
<input type="submit" value="Delete">
<td></td>

</tr>
 </form>
 </table>
 
 </div>