

<?php
session_start();
if(!empty($_SESSION["logged_in"])){
$eid=$_SESSION["empid"];






?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>


.header {
  padding: 10px;
  text-align: center;
  background:#8A0651;
  color: Black;
  font-size: 15px;
}

#b{
margin-top:15px;
margin-left:500px;
}
.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button:hover {
background-color: #e7e7e7;
color:black;
}
	
.dropdown {
  position: relative;
  display: inline-block;
	padding-bottom:20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.pro-icon{
		margin-left: 950px;
		border-radius: 50px;
		width: 50px;
		height:50px;
		position: absolute;
		right:25px;
		padding-bottom: 5px;
		top:auto;
	}
</style>
 <script>
	 
 function EmployeeAdd() {
		document.getElementById("employee_add").style.display="block";
  document.getElementById("job_assign").style.display="none";
	  document.getElementById("employee_search").style.display="none";	
}
	 
	 function EmployeeSearch() {
		document.getElementById("employee_add").style.display="none";
  document.getElementById("job_assign").style.display="none";
	 document.getElementById("employee_search").style.display="block";	 
		 
}
</script>
  </head>




<body>


<div class="container">

<nav class="navbar navbar-light bg-primary">
   <div class="container-fluid">
   <div class="row">
   	<div class="col-12">
    <h1>
    <span class="Pro-name">
    <?php
	echo " Welcome ".$eid."";
	?>  
  	</span>
   			<img class="pro-icon" src="Pro-icon.png" style="width:50px"/>
   	</h1> 		
   	</div>
   	</div>
	</div>
	</nav>

<div class="container">
<div class="row">
	<div class="dropdown col-md-3">
		<a href="" class="dropbtn">Employee</a>
		<div class="dropdown-content">
		<a href="#" onClick="EmployeeAdd()">Employee Add</a>
		<a href="#" onClick="EmployeeSearch()">Employee Search</a>
		<a href="#" onClick="">Employee Update</a>
		<a href="#">Employee Delete</a>
 		</div>
	</div>
	<div class="dropdown col-md-3">
		<a href="" class="dropbtn">Job</a>
		<div class="dropdown-content">
		<a href="#">Job Add</a>
		<a href="#">Job Update</a>
		<a href="#">Job Delete</a>
  		</div>
	</div>
	<div class="dropdown col-md-3">
		<a href="" class="dropbtn">Task</a>
		<div class="dropdown-content">
		<a href="#">Task Add</a>
		<a href="#">Task Update</a>
		<a href="#">Task Delete</a>
  		</div>
	</div>
	<div class="dropdown col-md-3">
		<a href="" class="dropbtn">Task Assign</a>
		<div class="dropdown-content">
  		</div>
	</div>
</div>	
</div>

<div class="row">

<div class="col-md-4">

<form action="search.php" method="post">
    <input type="text" name="eid" placeholder="Enter Employee ID"/>
    <input type="submit" value="Search" />
</form>

</div>
</div>

<br><br>
<div id="job_assign"  >

<table class="table  table-hover">
<form name="f3" action="job_assign.php" method="post">
<tr>
 <th >Employee Name </th>
 <td><?php
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
?> 
</td>
</tr>
<tr>
<th>
Job Id</th><td>
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

$sql = "SELECT isdeleted,job_id FROM job_create";
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
?></td>
</tr>
<tr>
<th>
Priority</th><td>
    <select  name="priority">
     <option value="High">High</option>
  <option value="Medium">Medium</option>
  <option value="Low">Low</option>
  
    </select>
</td></tr>
<tr>
	<td>
	<button class="btn btn-primary " type="submit">Assign</button>
 </td>
 <td>
 </td>
 </tr>
 </form>
 
</table>
 
 </div>
 
 </div>

 
 <div id="employee_add" style="display: none">
 
	<h1 align="center">Employee Registration Form</h1>


 <table class="table  table-hover">
  <form name="f1" action="employeeinsert.php" method="post">
 <tr><td>
  <label for="fname"><b>Employee Id *</b></label></td>
    <td><input type="text" id="eid" name="eid" placeholder="Employee Id.." required></td></tr>
	
	 <tr><td>
    <label for="fname"><b>First Name *</b></label></td>
   <td> <input type="text" id="fname" name="fname" placeholder="Your name.." required></td></tr>

   <tr><td>
     <label for="lname"><b>Last Name*</b></label></td><td>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." required></td></tr>
    
      <tr><td>
<label for="gender"><b>Gender*</b></label></td>
<td>
<input type="radio" name="gender" value="M" checked > Male </td>
                <td> <input type="radio" name="gender" value="F"> Female</td>
               <td> <input type="radio" name="gender" value="O"> Other</td></tr>
               <tr><td>
    <label for="designation"><b>Designation*</b></label></td>
   <td> <select id="designation" name="desg">
     <option value="Health">Health</option>
  <option value="Investment">Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
    </select>
</td></tr>
   <tr><td> <label for="phno"><b>Phone No*</b></label></td>
   <td> <input type="phno" name="phno" placeholder="Your Phone No.." required></td></tr>
	<tr><td><label for="email"><b>E-Mail*</b></label></td>
    <td><input type="email" name="email" required placeholder="Your Email.."> </td></tr>
   <tr><td> <input type="submit" value="Submit"></td></tr>
  </form>
 
	 
 </div>
  <div id="employee_search" style="display: none" >
 <h1 align="center">Employee List</h1>
       <table cellpadding="10px" align="center" class="table">
           <form name="f1" action="employeeretrieve.php" method="post">
           <tr><td><b> Employee Id</td></b><td><input type="text" name="eid"></td></tr>
		   
<tr><td><input type="submit" value="Search"></td><td><input type="reset" value="Reset"></td></tr>           
      </form></table> 
 
 </div>
 
<form name="f1" action="logout.php" method="post">
<button type="submit" class="btn btn-primary">Logout</button>
</form>
</body>
</html>
<?php
}
else
{
	header("Location: login.html");
}
?>