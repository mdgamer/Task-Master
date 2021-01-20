<?php
session_start();
if(!empty($_SESSION["logged_in"])){
$eid=$_SESSION["empid"];
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



$sql = "SELECT emp_firstName,emp_lastname from employee where emp_id='$eid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$emp_firstName=$row["emp_firstName"];
$emp_lastname=$row["emp_lastname"];}}
?>		
		

<html>
<head>
<title>
Employee Home
</title>


<style>
td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

.selected {
    background-color: brown;
    color: #FFF;
}
	
	.pro-icon{
		margin-left: 950px;
		border-radius: 50px;
		width: 50px;
		height:50px;
	}
	
</style>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  </script>
  
  <script type="text/javascript">
	$(".commen").click(function () {
  var job_idjs = $(this).closest("tr").find(".job_id").text();
});
</script>
</head>
<body>

   <nav class="navbar navbar-light bg-primary">
   <div class="container-fluid">
   <div class="row">
   	<div class="col-12">
    <h1>
    <span class="Pro-name"><?php
	echo " Welcome ".$emp_firstName." ".$emp_lastname."";
	?>  
  	</span>
   			<img class="pro-icon" src="Pro-icon.png" style="width:50px"/>
   	</h1> 		
   	</div>
   	</div>
	</div>
	</nav>

<!--Sign Up Modal-->
<div class="modal fade" id="showModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<span><h3 align="center">Comment</h3></span>
			<button type="button" class="close" data-dismiss="modal"  aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    		</button>
		</div>

<!--      php code for comment in modal            -->


<div class="container-fluid mx-auto" >

<?php 
$emp_id=$_SESSION['empid'];
if(isset($_POST['submit'])){ //check if form was submitted
   //get input text


$link = mysqli_connect("localhost", "root", "1234", "Form");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO comment (job_id,emp_id,comment,time) VALUES (?,?, ?,?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssss",$job_id,$emp_id,$comment,$date);
    
    // Set parameters
    $job_id = "JOB0001";
	$comment = $_POST['comment'];
	date_default_timezone_set("Asia/Calcutta");
	$date=date("Y-m-d h:i:s");
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
}
?>
<html>
<head></head>
<style>
.comment{
background-color:#C4DFF8;
overflow: auto;
height: 400px;
width:100%;
}
</style>
<body>
<?php
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
$emp_id=$_SESSION['empid'];
$sql1="select comment,time from comment where emp_id='$emp_id'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$comment1[]=" ".$row["comment"];
		$time[]=" ".$row["time"];
}
}
 $conn->close();
?>
<div class="comment" >
<?php
$arrlength=count($comment1);
for($x = 0; $x < $arrlength; $x++) {
echo "<b>"."$time[$x]"."</b>| "."$comment1[$x]".'<br>';
}
?>
</div>
<br>
<form name="f1" action="" method="post">
<textarea rows="4" cols="75"
 name="comment"></textarea>
<br>
<input type="submit" value="Post" name="submit">
</form>

</b>

</body>
</html>









</div>


<!--      php code for comment in modal   end         -->
		

</div>
</div>
</div>

<p style="color:blue;font-size:25px;margin-top:50px;" align="center">To Do List</p>
<table  class="table table-bordered table-hover">
<tr><th>Task id</th><th>Task Name</th><th>Assigned By</th><th>Priority</th><th>Details of Task</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Remarks</th></tr>

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



$sql = "SELECT job_create.job_id,job_create.job_name,operation_table.assigned_by,operation_table.priority,job_create.job_description,job_create.date_created,job_create.deadline_date,operation_table.status,operation_table.isdeleted FROM job_create join operation_table on operation_table.job_id=job_create.job_id and operation_table.emp_id='EMP0004'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$isdeleted=$row["isdeleted"];
		$job_id=$row["job_id"];
		$job_name=$row["job_name"];
		$assigned_by=$row["assigned_by"];
		$priority=$row["priority"];
		$job_description=$row["job_description"];
		$date_created=$row["date_created"];
		$deadline_date=$row["deadline_date"];
		$status=$row["status"];
		
		if($isdeleted!='T' and $status!='Completed'){
echo '<tr><td>'.$job_id.'</td><td>'.$job_name.'</td><td>'.$assigned_by.'</td><td>'.$priority.'</td><td>'.$job_description.'</td><td>'.$date_created.'</td><td>'.$deadline_date.'</td><td>'.$status.'</td><td><button data-toggle="modal" data-target="#showModal">Show</button></td></tr>'		;	 
		}                    					  
}}
?>
</table><br><br>
<p style="color:blue;font-size:25px;margin-top:50px;" align="center">Previous Task</p>
<table border="2px" class="table table-bordered table-hover">
<tr><th>Task id</th><th>Task Name</th><th>Assigned By</th><th>Priority</th><th>Details of Task</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Remarks</th></tr>
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



$sql = "SELECT job_create.job_id,job_create.job_name,operation_table.assigned_by,operation_table.priority,job_create.job_description,job_create.date_created,job_create.deadline_date,operation_table.status,operation_table.isdeleted FROM job_create join operation_table on operation_table.job_id=job_create.job_id and operation_table.emp_id='EMP0004'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$isdeleted=$row["isdeleted"];
		$job_id=$row["job_id"];
		$job_name=$row["job_name"];
		$assigned_by=$row["assigned_by"];
		$priority=$row["priority"];
		$job_description=$row["job_description"];
		$date_created=$row["date_created"];
		$deadline_date=$row["deadline_date"];
		$status=$row["status"];
		$comment="";
		$time="";
		
		if($isdeleted!='T' and $status=='Completed'){
echo '<tr><td class="job_id">'.$job_id.'</td><td>'.$job_name.'</td><td>'.$assigned_by.'</td><td>'.$priority.'</td><td>'.$job_description.'</td><td>'.$date_created.'</td><td>'.$deadline_date.'</td><td>'.$status.'</td><td><button data-toggle="modal" data-target="#showModal" class="commen">Show</button></td></tr>'		;	 
		}                    					  
}}
?>
</table>
<div align="center">
<form name="f1" action="logout.php" method="post">
<button type="submit" class="btn btn-primary">Logout</button>
</form>
</div>
<p class="show"></p>
<script>
  function fn1()
{
	<?php
	header();
	?>
	
}
</script>	
<!--Footer-->
<footer class="footer">
<div class="container-fluid padding">
<div class="row text-center padding">

	<div class="col-12">
		<h2><a class="js-scroll-trigger" href="#logo">&copy; Footer</a></h2>
	</div>

</div>
</div>
</footer>
</body>
</html>

<?php
}
else
{
	header("Location: login.html");
}
?>