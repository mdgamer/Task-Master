<?php
session_start();
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
$username = $_POST['username'];
      $password =$_POST['password']; 
$_SESSION["empid"]=$username;
	  $sql1 = "SELECT * FROM login where username='$username' and password='$password'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {

	$_SESSION["logged_in"]="true";
date_default_timezone_set("Asia/Calcutta");
$lt=date("H:i:s");      
$ld=date("Y/m/d");

$sql = "INSERT INTO audit (username,login_date,login_time,session)
VALUES ('$username', '$ld', '$lt','T')";

mysqli_query($conn, $sql);

       if($username=="admin"){
		  header("Location: AdminHome.php");
	   }
	   else{
		   
		   header("Location: EmployeeHome.php");
	   }
    }
} else {?>
 
 
 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  width:50%;
  margin-left:350px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<script>
	  function fn1()
	  {
	   window.open("employeeDataEntry1.html");
	  }
	  </script>
<h2 align="center">Login </h2>

<form action="login_check.php" method="post" name="login">
  <div class="imgcontainer">
    <img src="132facb413cc6cdbbdbd3f3012329b7d.jpg" alt="Avatar" class="avatar" >
  </div>
<p style="color:red" align="center">*Password or username not found</p>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <input type = "button"  value="Signup" onclick="fn1()" class="cancelbtn">
    <span class="psw">Forgot <a href="passwordchange.php">password?</a></span>
  </div>
</form>

</body>
</html>
  
  
  
  
   <?php 
   
}




$conn->close();
?>